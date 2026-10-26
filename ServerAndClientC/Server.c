#include <stdio.h>       // printf(), perror()
#include <stdlib.h>      // EXIT_SUCCESS, EXIT_FAILURE
#include <string.h>      // strlen(), memset()
#include <unistd.h>     // close()

#include <netdb.h>
#include <sys/types.h>  // System data types
#include <sys/socket.h> // socket(), bind(), listen(), accept(), recv(), send()
#include <netinet/in.h> // sockaddr_in, INADDR_ANY, htons()
#include <arpa/inet.h> 
#define MYPORT "1488"
#define NUMLOG 10
void *get_in_addr(struct sockaddr *sa)
{
    if (sa->sa_family == AF_INET) {
    return &(((struct sockaddr_in*)sa)->sin_addr);
    }
    return &(((struct sockaddr_in6*)sa)->sin6_addr);
}

int main(){
    //
    struct sockaddr_storage ClientConnectionData;
    socklen_t ClientConnectionLength;
    int errorCodes;
    //socket
    int fileDecriptorSocket;
    int fdconectedArray[NUMLOG];
    int fileDecriptorClientSocket;
    char RecivedMessege[256]="";
    char SendedMessege[256]="";
    ssize_t BytesSend,ByetesRecv;


    for (int i = 0; i < NUMLOG; i++) {
    fdconectedArray[i] = -1;
    }   
    //addrinfo prep
    struct addrinfo hints;
    struct addrinfo *servinfo= NULL; // укажет на результат
    memset(&hints, 0, sizeof hints); // очистка структуры
    hints.ai_family = AF_INET; // IPv4 
    hints.ai_socktype = SOCK_STREAM; // потоковый сокет TCP
    hints.ai_flags = AI_PASSIVE; 

    errorCodes=getaddrinfo(NULL,MYPORT,&hints,&servinfo);
    if(errorCodes!=0){
        printf("%s\n",gai_strerror(errorCodes));
        freeaddrinfo(servinfo);
        servinfo=NULL;
        return -1;
    }
    fileDecriptorSocket=socket(servinfo->ai_family,servinfo->ai_socktype,servinfo->ai_protocol);
    
    if(fileDecriptorSocket==-1){
        printf("ErrorInSocket");
        freeaddrinfo(servinfo);
        servinfo=NULL;
        close(fileDecriptorSocket);
        return -1;
    }

    errorCodes = bind(fileDecriptorSocket,servinfo->ai_addr,servinfo->ai_addrlen);
    if(errorCodes==-1){
        printf("BindError");
        freeaddrinfo(servinfo);
        servinfo=NULL;
         close(fileDecriptorSocket);
        return -1;
    }
    //Listen+error hand
    errorCodes = listen(fileDecriptorSocket,NUMLOG);
    if(errorCodes==-1){
        printf("listenrror");
        freeaddrinfo(servinfo);
        servinfo=NULL;
        close(fileDecriptorSocket);
        return -1;
    }
    
    ClientConnectionLength = sizeof ClientConnectionData;
    //while(RecivedMessege!="TerminateServer"){
        ClientConnectionLength = sizeof ClientConnectionData;
        fileDecriptorClientSocket=accept(fileDecriptorSocket,(struct sockaddr *)&ClientConnectionData, &ClientConnectionLength);
        if (fileDecriptorClientSocket == -1) {
            perror("accept");
            close(fileDecriptorSocket);
            return -1;
        }


        BytesSend=send(fileDecriptorClientSocket,"Connection Succsesfull",23,0);
        ByetesRecv=recv(fileDecriptorClientSocket,RecivedMessege,sizeof (RecivedMessege) -1,0);
        if (ByetesRecv <= 0) {
                if (ByetesRecv == -1) perror("recv");
                else printf("client disconnected\n");
                goto afterCon;
            }
        RecivedMessege[ByetesRecv]='\0';
        printf("%s\n",RecivedMessege);

        do{
            if (scanf("%255s", SendedMessege) != 1) {
                break;
            }       
            BytesSend=send(fileDecriptorClientSocket,SendedMessege,strlen(SendedMessege),0);
            ByetesRecv=recv(fileDecriptorClientSocket,RecivedMessege,sizeof (RecivedMessege) -1,0);
            if (ByetesRecv <= 0) {
                if (ByetesRecv == -1) perror("recv");
                else printf("client disconnected\n");
                break;
            }
            RecivedMessege[ByetesRecv]='\0';
            printf("%s\n",RecivedMessege);
        }while(strcmp(RecivedMessege,"bye")|| strcmp(SendedMessege,"bye"));


    afterCon:

        close(fileDecriptorClientSocket);
        
    //}
    


    close(fileDecriptorSocket);

    freeaddrinfo(servinfo);
    servinfo=NULL;
    printf("sucses");
    return 0;
}