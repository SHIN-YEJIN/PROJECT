#include <stdio.h>
#include <string.h>


int main()
{
	char* key;
	char keystr[BUFSIZ];

	FILE *fp = fopen("serv_public.pem","r");

	if(fp==NULL)
	{
		printf("file open error\n");
		return 1;
	}

	while(1)
	{
		key=fgets(keystr,sizeof(keystr)-1,fp);
		if(feof(fp))
				break;
		printf("keystr: %s\n",keystr);
	}
	fclose(fp);
}

