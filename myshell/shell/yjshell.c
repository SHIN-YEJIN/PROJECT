#include "yjshell.h"

int count; 
int pcount;
int flag;

void main()
{
	char cmd[BUFSIZ];
	char *argv[BUFSIZ];
	char *path[BUFSIZ];
	int i;

	savepath(path);
	while(1)	
	{
		signal(SIGALRM,sigalrm_handler);
		count = 0;
		flag = 0;
		memset(argv,0,BUFSIZ);
		printf("~$ ");
		alarm(11);
		fgets(cmd,sizeof(cmd),stdin);
		alarm(0);
		cmd[strlen(cmd)-1] = '\0';
		
		if(*cmd == '\n')
			continue;

		if(cmd_divide(cmd,argv))
			continue;
		if(!strcmp(*argv,"setpath"))
			if(!setpath(path,argv[1]))
				continue;
		count = 0;
		do
		{
			for(i=0;argv[count+i]!=(char *)NULL;i++)
				if((!((strcmp(argv[count+i],"&"))))||(!(strcmp(argv[count+i],"|"))))
				{
					if(strcmp(argv[count+i],"&")==0)
						flag = 2;
					else
						flag = 1;
					argv[count+i]=(char *)NULL;
					break;
				}
			if(flag==1)
			{
				if(Pipe(&argv[0],path))
					break;
				flag = 0;
				continue;
			}
			if(comfirm_path(argv[count],path))
			{
				printf("command not found\n");
				break;
			}
			child(&argv[count]);
			if(flag!=2)
				wait((int *)NULL);//waiting child process...
			while(argv[count]!=(char *)NULL)
				count++;
		}while(argv[++count]!=(char *)NULL);
	}
}

void sigalrm_handler(int sig)
{
	if(sig==SIGALRM)
		printf("time of writing has been exceeded!!!\n");
	exit(1);
}

int cmd_divide(char *cmd,char *argv[])
{
	char buf[BUFSIZ];
	char *tmp;
	int i=0;

	while(*cmd)
	{
		if(*cmd==';')
		{

			if(flag||count==0)//if & exist ; previously
			{
				printf("-bash: syntax error near unexpected token `;'\n");
				return -1;
			}

			if(argv[count-1]!=(char *)NULL)
				argv[count++] = (char *)NULL;
			else//if ; used double
			{
				printf(";-bash: syntax error near unexpected token `;;'\n");
				return -1;
			}			
		}
		else if(*cmd == '&')
		{
			flag = 1;
			tmp = malloc(2);
			strcpy(tmp,"&");
			argv[count++] = tmp;
		}
		else if(*cmd=='|')
		{
			if(flag||count==0)
			{
				printf("-bash: syntax error near unexpected token `|'\n");
				return -1;
			}
			if(*(cmd+1)=='|')
				break;
			tmp = malloc(2);
			strcpy(tmp,"|");	
			argv[count++]=tmp;
			flag = 2;
		}			
		else if(*cmd!=' ')
		{
			while(*cmd!=' '&&*cmd!='\0')
			{
				if(*cmd==';'||*cmd=='&'||*cmd=='|')
					break;
				buf[i++] = *(cmd++);
			}
			if(i)
			{
				buf[i] = '\0';
				tmp = malloc(i+1);
				strcpy(tmp,buf);
				argv[count++] = tmp;
				i=0;
				memset(buf,0,BUFSIZ);
				flag=0;
				continue;
			}
		}
		cmd++;
	}
	if(!count)
		return -1;
	argv[count] = (char *)NULL;
	return 0;
}

int comfirm_path(char *argv,char *path[])
{
	int i;
	char buf[BUFSIZ];
	
	if(!access(argv,F_OK))
		return 0;
	else
	{
		for(i=0;i<pcount;i++)
		{
			strcpy(buf,path[i]);
			strcat(buf,argv);
			if(!access(buf,F_OK))
			{
				strcpy(argv,buf);
				return 0;
			}
			memset(buf,0,BUFSIZ);
		}
	}
		return -1;
}
		
int setpath(char *path[],char *ptname)
{
	int i;
	char *buf;

	i = strlen(ptname);
	buf = malloc(i+2);
	strcpy(buf,ptname);
	if('/'!=ptname[i-1])//check for '/' at end of a string
	{
		buf[i] = '/';
		buf[i+1] = '\0';
	}
	
	for(i=0;i<pcount;i++)//check for redundant path
	{
		if(!strcmp(path[i],buf))
		{
			printf("%s exist\n",buf);
			return 0;
		}
	}
	path[pcount] = buf;
	path[++pcount]=(char *)NULL;
	return 0;
}

int savepath(char *path[])
{
	int fd,size;
	char buf[BUFSIZ];

	if((fd=open("./mypath",O_RDONLY))<0)
	{
		perror("myshell");
		return -1;
	}
	while(1)
	{
		memset(buf,0,BUFSIZ);
		size = 0;
		while(read(fd,&buf[size],1)>0)
		{
			if(buf[size]=='\n'||buf[size]==' ')
				break;
			size++;
		}
		buf[size] = '\0';
		if(!size)
			break;
		setpath(path,buf);
	}
}

void child(char *argv[])
{
	int pid;

	if((pid=fork())==-1)
	{
		perror("fork()");
		exit(1);
	}
	if(pid==0)
	{
		execv(*argv,argv);
		exit(1);
	}
}	

int Pipe(char *argv[],char *path[])
{
	int fd[2],i;
	char *argv1[20],*argv2[20];

	for(i=0;argv[count]!=(char *)NULL;i++)
		argv1[i]=argv[count++];
	count++;
	argv1[i] = (char *)NULL;
	for(i=0;argv[count]!=(char *)NULL;i++)
		argv2[i]=argv[count++];
	argv2[i] = (char *)NULL;
	
	if(comfirm_path(*argv1,path))
		return 1;
	if(comfirm_path(*argv2,path))
		return 1;

	if(pipe(fd) == -1)
	{
		perror("pipe");
		exit(1);
	}
	if( fork() == 0)
	{
		close(1);//stdout ban
		dup(fd[1]);
		close(fd[0]) ; close(fd[1]);
		fflush(stdout);
		execv(*argv1, argv1);
		exit(2);
	}
	if( fork() == 0 )
	{
		close(0);
		dup(fd[0]);
		close(fd[0]) ; close(fd[1]);
		execv(*argv2,argv2);
		exit(3);
	}
	close(fd[0]); close(fd[1]);
	while(wait( (int *) 0) != -1);
	return 0;
}
