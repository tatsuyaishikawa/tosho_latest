/* 
3.10.2014  duplica()  , use char* instead of int * */
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <signal.h>

 void get_parameter(FILE*,char *,int);
/* char *copierr(char * ,int);*/
/* int compa(char ,char);*/
 void recherche(char*,int);
 void stocker(char*); 
 void recherche_userid(char*,int);
 int duplica(char*);
/* int duplica_userid(int*);*/
 
 FILE *fd;

 int main(void)
{
 FILE *fd_recup;
 int  succes=0,taille=0,i=0,j=0,val=0;
 char buf[200000],tmp[200000],tmp2[11],param[20];

 /* fichier servant a stocker la liste de url */ 
 /* fichier cible*/
 fd_recup=fopen("yahoo_comment/3.html","r");
 
 if(fd_recup==NULL){
  printf("recup error\n");
  exit(1);
 }

 fd=fopen("params.txt","a");

 if(fd==NULL){
  printf("recup error\n");
  exit(1);
 }
 /* copier le conteu entier de fd_recup*/
 while(fread(buf,1,1,fd_recup)!=0){
  strcat(tmp,buf);
  /**tmp=buf;*/
  }

 while(tmp[j]!='\0'){
//printf("[%c]\n", tmp[j]);
 /* la partie qui extrait l'url */
 /* copier profile.php a tmp2 */
  for(i=0;i<11;i++){
   tmp2[i]=tmp[i+j];
  }
//  printf("%s\n",tmp2);
  /*printf("tmp2  %zu\n", strlen(tmp2));  la taille de tmp2 est toujours de 11*/
  if(strncmp(/*(char *)& */tmp2,"profile.php", 11) == 0){
    /* passer a l'extranction de premier domaine */
   /* obtenir ?mode=viewprofile */

   /* tmp,point de depart ,*/
   recherche(tmp,i+j+1);
   /*
   fwrite(param,strlen(param),1,fd_store);
   fwrite("\n",2,1,fd_store);
   */
  succes++;
  /* extraire un parametre */
   /*get_parameter(fd_store,tmp2,taille);*/
  }
  j++;
 }

 printf("%d\n",j); /* si le nombre egale a la totalite de caractreres contenus dans le fichier iti.html */
 fclose(fd_recup);
 fclose(fd);
 printf("number of parameters is %d\n",succes);
 return 0;
}

 void get_parameter(FILE *fd1,char *tmp,int i)
{
 /* lecture et write jusqu'a rencontrer */
 while(tmp[i]!='\0'){
   fwrite((char*)tmp[i],11,1,fd1);
   i++; 
 }
 printf("fin de parsing \n");
 return;
 /* trouver le moyen de ne pas avancer le pointeur que de un pour ne pas lire le contenu sept sept */
}
 
 void recherche(char *tmp,int point)
{
  int i=0;
  char buf[20];

  memset(buf,0,strlen(buf));
 /* move to  "extra" */
 while(tmp[point]!='='){
   point++;
 }

 /* do not include "=" */
  point++;
 /* get "extra" */
 while(tmp[point]!='"'){
   buf[i]=tmp[point];
   if(tmp[point]=='='){
    recherche_userid(tmp,point+1);
   }
   i++;
   point++;
 }
 
 /* s'il n'y a pas de duplication de parametre, on peut l'enregistrer*/

 return;
}

 void stocker(char *buf)
{
 fwrite("\n",2,1,fd);
 fwrite(buf,(size_t)strlen(buf),1,fd);
 fwrite("\n",2,1,fd);
 return;  
} 

 int duplica(char *buf)
{
 char chaine[200]; 

 while(fgets(chaine,(size_t)strlen(buf),fd)!=NULL){
  if(buf==chaine)
   return 0;
 }

 return 1;
}

 /*
 int duplica_userid(int *buf)
{
 int *chaine=NULL;

 while(fgets(chaine,(size_t)sizeof(buf),fd)!=NULL){
  if(buf==chaine)
   return 0;
 }

 return 1;
}
*/

 void recherche_userid(char *tmp,int point)
{
 int i=0;
 int buf[10];

 memset(buf,0,sizeof(buf));

 while(tmp[point]!='"'){
  buf[i]=tmp[point];
  i++;
  point++;
 }

 /*
 if(duplica_userid(buf)==0){
   do not write with  fwrite() 
 }

 */
 return;
}
