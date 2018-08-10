#include "../include/pcanFunctions.h"
#include "../include/databaseFunctions.h"

#include <stdio.h>
#include <stdlib.h>
#include <stdlib.h>  
#include <errno.h>
#include <unistd.h> 
#include <signal.h>
#include <string.h>
#include <fcntl.h>    					// O_RDWR
#include <unistd.h>
#include <ctype.h>
#include <libpcan.h>   					// PCAN library


// Globals
// ***********************************************************************************************************


HANDLE h;
HANDLE h2;
TPCANMsg Txmsg;
TPCANMsg Rxmsg;
DWORD status;

struct canData{
	int id;
	int data;
};


int pcanTx(int id, int data){
	h = LINUX_CAN_Open("/dev/pcanusb32", O_RDWR);		// Open PCAN channel

	// Initialize an opened CAN 2.0 channel with a 125kbps bitrate, accepting standard frames
	status = CAN_Init(h, CAN_BAUD_125K, CAN_INIT_TYPE_ST);

	// Clear the channel - new - Must clear the channel before Tx/Rx
	status = CAN_Status(h);

	// Set up message
	Txmsg.ID = id; 	
	Txmsg.MSGTYPE = MSGTYPE_STANDARD; 
	Txmsg.LEN = 1; 
	Txmsg.DATA[0] = data; 

	sleep(1);  
	status = CAN_Write(h, &Txmsg);

	// Close CAN 2.0 channel and exit	
	CAN_Close(h);
	printf("\n**CHANGING FLOORS**");	
	return(0);
}


void pcanRx(){
	
	static int pos = 0;
	static int i = 999;
	static int isit = 0;
	static int floor = 0;
	static int nextFloor = 0;
	static int c = 0;
	char s[STR];
	
	
	// Open a CAN channel 
	h2 = LINUX_CAN_Open("/dev/pcanusb32", O_RDWR);
	// Initialize an opened CAN 2.0 channel with a 125kbps bitrate, accepting standard frames
	status = CAN_Init(h2, CAN_BAUD_125K, CAN_INIT_TYPE_ST);
	// Clear screen to show received messages
	//system("@cls||clear");
	// Clear the channel - new - Must clear the channel before Tx/Rx
	status = CAN_Status(h2);
	//printf("\nReady to receive message(s) over CAN bus\n");
	
	// Read 'num' messages on the CAN bus
	while(1){

		i = next();
		printf("\nChecking");

		
		if (i==0){ 							//If queue is empty
		
		nextFloor = checkCAN();
		
		}else{
			
			printf("\nExecuting");
			sleep(1);
			switch(i){
				case 1:
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
					floor = 1;
					strcpy(s,"Request to move car to floor 1 Accepted");
					log(100, s);
					
					while(nextFloor != floor){
						nextFloor = checkCAN();	
						stop(5);
						//usleep(100);		
					}
					
					printf("\nSame Floor");
					strcpy(s,"Opening Doors");
					log(200, s);
					now(1, 1, 0);
					for(c = 0; c < 3; c++){
						sleep(1);

						printf("\nWaited %d second(s) for door", (c+1));
						
					}
					strcpy(s,"Closing Doors");
					now(1, 0, 0);
					log(200, s);
					
					break;
					
				case 2:
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR2);
					floor = 2;
					strcpy(s,"Request to move car to floor 2 Accepted");
					log(100, s);
					
					while(nextFloor != floor){
						nextFloor = checkCAN();
						stop(6);	
						//usleep(100);
					}
					
					
					printf("\nSame Floor");
					strcpy(s,"Opening Doors");
					now(2, 1, 0);
					log(200, s);
					for(c = 0; c < 3; c++){
						sleep(1);

						printf("\nWaited %d second(s) for door", (c+1));
						
					}
					strcpy(s,"Closing Doors");
					now(2, 0, 0);
					log(200, s);
					
					break;
					
				case 3:
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR3);
					floor = 3;
					strcpy(s,"Request to move car to floor 3 Accepted");
					log(100, s);
					
					while(nextFloor != floor){
						nextFloor = checkCAN();
						stop(7);
						//usleep(100);		
					}
					
					printf("\nSame Floor");
					strcpy(s,"Opening Doors");
					now(3, 1, 0);
					log(200, s);
					for(c = 0; c < 3; c++){
							sleep(1);

							printf("\nWaited %d second(s) for door", (c+1));
							
					}
					strcpy(s,"Closing Doors");
					now(3, 0, 0);
					log(200, s);
					
					break;
			
				default:
					break;
			}
			
			
		}

		/*i = 0;
		
		while(i==0){
			floor = checkCAN();
			i = next();
		}
		sleep(1);
		switch(i){
			case 1: //To Floor 1
				pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
				nextFloor = 1;
				del();
				break;
			case 2: //To Floor 2
				pcanTx(ID_SC_TO_EC, GO_TO_FLOOR2);
				nextFloor = 2;
				del();
				break;
			case 3: //To Floor 3
				pcanTx(ID_SC_TO_EC, GO_TO_FLOOR3);
				nextFloor = 3;
				del();
				break;
			case 4: //Open Door
				while(floor != nextFloor){
					floor = checkCAN();
					sleep(1);	
				}
				for(c = 0; c < 5; c++){
					sleep(1);
					printf("\nWaited %d second(s) for door", (c+1));
				}
				log(4, 200);
				del();
				break;
			case 5: //Close Door
				printf("\nDoor Closed");
				log(5, 200);
				break;
			default:
				break;
		}
		
	*/		
}
	// Close CAN 2.0 channel and exit	
	CAN_Close(h2);	
					
}

int checkCAN(){
	
	static int pos = 0;
	static char r[STR];
	struct canData cd[20];
	printf("\nLooking to Add");	
	while((status = CAN_Read(h2, &Rxmsg)) == PCAN_RECEIVE_QUEUE_EMPTY){
		sleep(1);
	}
	if(Rxmsg.ID != 0x01 && Rxmsg.LEN != 0x04 && (int)Rxmsg.DATA[0] != 0) {		// Ignore status message on bus	
		cd[W].id= (int)Rxmsg.ID;
		cd[W].data = (int)Rxmsg.DATA[0];
	}
			
	if(cd[W].id == ID_CC_TO_SC && cd[W].data == STOP){ //Estop
		clear();
		pcanTx(ID_SC_TO_EC, 0x00);
		now(3, 1, 1);
	}
			
	if(cd[W].id == ID_EC_TO_ALL) {			//ID_EC_TO_ALL = 0x101
		pos = (cd[W].data -4);
		if(pos != 0){
			now(pos, 0, 0);
		}
		printf("\n CHECK CAN Floor: %d", pos);			
	}
			
			switch(cd[W].id) {		
				case ID_CC_TO_SC:	//ID_CC_TO_SC = 0x200	Car Controller
							
					if(cd[W].data == 1){
						addQueue(1, 200);
						strcpy(r,"Car Controller Requests floor 1");
						log(200, r);
						printf("\nADDED 1 TO QUEUE!");
						cd[W].data = 0;
						cd[W].id = 0;
					}else if(cd[W].data == 2){
						addQueue(2, 200);
						strcpy(r,"Car Controller Requests floor 2");
						log(200, r);
						printf("\nADDED 2 TO QUEUE!");
						cd[W].data = 0;
						cd[W].id = 0;
					}else if(cd[W].data == 3){
						addQueue(3, 200);
						strcpy(r,"Car Controller Requests floor 3");
						log(200, r);
						printf("\nADDED 3 TO QUEUE!");
						cd[W].data = 0;
						cd[W].id = 0;
					}

					break;
							
				case ID_F1_TO_SC:	//ID_F1_TO_SC 0x201  
						
					if(cd[W].data == FLOOR_REQ){
						
							addQueue(1, 201);
							strcpy(r,"Floor 1 Requets Car");
							log(201, r);
							printf("\nADDED 1 TO QUEUE!");
						
						cd[W].data = 0;
						cd[W].id = 0;
					}
					break;
							
				case ID_F2_TO_SC:	//ID_F2_TO_SC  0x202	

					if(cd[W].data == FLOOR_REQ){
						
							addQueue(2, 202);
							printf("\nADDED 2 TO QUEUE!");
							strcpy(r,"Floor 2 Requets Car");
							log(202, r);
					
						cd[W].data = 0;
						cd[W].id = 0;
					}
					break;
								
				case ID_F3_TO_SC:	//ID_F3_TO_SC  0x203

					if(cd[W].data == FLOOR_REQ){
						
							addQueue(3, 203);
							printf("\nADDED 3 TO QUEUE!");
							strcpy(r,"Floor 3 Requets Car");
							log(203, r);
						
						cd[W].data = 0;
						cd[W].id = 0;
					}
					break;
							
				default:
					break;
		}
		return pos;
	}

int checkFloor(){
	
	static int pos2 = 0;
	
	struct canData cd2[20];
	
	while((status = CAN_Read(h2, &Rxmsg)) == PCAN_RECEIVE_QUEUE_EMPTY){
		sleep(1);
		printf("STUCK 2\n");
	}
	if(Rxmsg.ID != 0x01 && Rxmsg.LEN != 0x04 && (int)Rxmsg.DATA[0] != 0) {		// Ignore status message on bus	
		cd2[W].id= (int)Rxmsg.ID;
		cd2[W].data = (int)Rxmsg.DATA[0];
	}
			
	if(cd2[W].id == ID_CC_TO_SC && cd2[W].data == STOP){ //Estop
		clear();
		pcanTx(ID_SC_TO_EC, 0x00);
	}
			
	if(cd2[W].id == ID_EC_TO_ALL) {			//ID_EC_TO_ALL = 0x101
		pos2 = (cd2[W].data -4);
		printf("\nFloor: %d", pos2);			
	}
	
	return pos2;
}
