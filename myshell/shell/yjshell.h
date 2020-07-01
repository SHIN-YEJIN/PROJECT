#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/types.h>
#include <string.h>
#include <signal.h>
#include <sys/wait.h>


int cmd_divide(char *,char **);
int comfirm_path(char *,char **);
int setpath(char **,char *);
int savepath(char **);
void child(char **);
void sigalrm_handler(int );
int Pipe(char **,char **);


