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


int main(int argc,char* argv[]){
    socklen_t ClientConnectionLength;

    //socket


    char RecivedMessege[256]="";
    char SendedMessege[256]="";
    ssize_t BytesSend,ByetesRecv;
    if (argc< 2){
        printf("noip");
        return -1;
    }
    int errorcodes;
    struct addrinfo hints;
    struct addrinfo *servinfo= NULL; // укажет на результат
    memset(&hints, 0, sizeof hints); // очистка структуры
    hints.ai_family = AF_INET; // IPv4 
    hints.ai_socktype = SOCK_STREAM; // потоковый сокет TCP
    if ((errorcodes = getaddrinfo(argv[1], MYPORT, &hints, &servinfo)) != 0) {
        fprintf(stderr, "getaddrinfo: %s\n", gai_strerror(errorcodes));
        return 1;
    }
    int socketServer=socket(servinfo->ai_family,servinfo->ai_socktype,servinfo->ai_protocol);

    
    if(socketServer==-1){

        return -1;
    }
    if(connect(socketServer, servinfo->ai_addr, servinfo->ai_addrlen)==-1){
        close(socketServer);
        printf("noconnction");
        return -1;
    }
    ByetesRecv=recv(socketServer,RecivedMessege,sizeof (RecivedMessege) -1,0);
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
                    BytesSend=send(socketServer,SendedMessege,strlen(SendedMessege),0);
            ByetesRecv=recv(socketServer,RecivedMessege,sizeof (RecivedMessege) -1,0);
            if (ByetesRecv <= 0) {
                if (ByetesRecv == -1) perror("recv");
                else printf("client disconnected\n");
                break;
            }
            RecivedMessege[ByetesRecv]='\0';
            printf("%s\n",RecivedMessege);
        }while(strcmp(RecivedMessege,"bye")||strcmp(SendedMessege,"bye"));
    afterCon:
    close(socketServer);
    freeaddrinfo(servinfo);
    servinfo=NULL;
    return 0;
    
}