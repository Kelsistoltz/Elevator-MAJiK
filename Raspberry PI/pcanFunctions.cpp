#include "../include/pcanFunctions.h"

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


// Code
// ***********************************************************************************************************

// Functions
// *****************************************************************
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
	return(0);
}


void pcanRx(){
	int i = 0;
	int nextpos = 1;
	int pos = 0;
	int q = 0;
	int w = 0;
	int door = 1;
	int doorstat = 0;
	struct canData cd[20];
	
	// Open a CAN channel 
	h2 = LINUX_CAN_Open("/dev/pcanusb32", O_RDWR);
	// Initialize an opened CAN 2.0 channel with a 125kbps bitrate, accepting standard frames
	status = CAN_Init(h2, CAN_BAUD_125K, CAN_INIT_TYPE_ST);
	// Clear screen to show received messages
	system("@cls||clear");
	// Clear the channel - new - Must clear the channel before Tx/Rx
	status = CAN_Status(h2);
	// receive CAN message  - CODE adapted from PCAN BASIC C++ examples pcanread.cpp
	printf("\nReady to receive message(s) over CAN bus\n");
	
	// Read 'num' messages on the CAN bus
	while(1) {
		
		while((status = CAN_Read(h2, &Rxmsg)) == PCAN_RECEIVE_QUEUE_EMPTY){
			sleep(1);
		}
			
		if(Rxmsg.ID != 0x01 && Rxmsg.LEN != 0x04 && (int)Rxmsg.DATA[0] != 0 ) {		// Ignore status message on bus	
			cd[w].id= (int)Rxmsg.ID;
			cd[w].data = (int)Rxmsg.DATA[0];
			i = (int)Rxmsg.DATA[0];
			printf("  - R ID:%4x LEN:%1x DATA:%02x \n",	(int)Rxmsg.ID, (int)Rxmsg.LEN, (int)Rxmsg.DATA[0]);
		}
		
		
		if(cd[w].id == ID_CC_TO_SC && cd[w].data == STOP){
			pcanTx(ID_SC_TO_EC, 0x00);
			cd[w].data = 0;
			cd[w].id = 0;
		}
		
										
		
		
		
			if( cd[w].id == ID_EC_TO_ALL ||cd[w].id == ID_CC_TO_SC ||cd[w].id == ID_F1_TO_SC ||cd[w].id == ID_F2_TO_SC ||cd[w].id == ID_F3_TO_SC){
				
				if(cd[w].id == ID_EC_TO_ALL) {			//ID_EC_TO_ALL = 0x101
						pos = cd[w].data;				
				}
				
				if(cd[w].id == ID_CC_TO_SC){		//ID_CC_TO_SC = 0x200	
					if(cd[w].data == 1){
						pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
					}else if(cd[w].data == 2){
						pcanTx(ID_SC_TO_EC, GO_TO_FLOOR2);
					}else if(cd[w].data == 3){
						pcanTx(ID_SC_TO_EC, GO_TO_FLOOR3);
					}
					
					//printf("\nData is %d", doorstat);
					
					//printf("Next Position is: %d\n", nextpos);
					cd[w].data = 0;
					cd[w].id = 0;
				}
				
				if(cd[w].id == ID_F1_TO_SC){ //ID_F1_TO_SC 0x201   
					printf(" To Floor 1\n");
					if(cd[w].data == FLOOR_REQ)
					{
					nextpos = 1 + 4;
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR1);
					cd[w].data = 0;
					cd[w].id = 0;
					door = 0;
					}
				}
				
				if(cd[w].id == ID_F2_TO_SC){ //ID_F2_TO_SC  0x202	
					printf(" To Floor 2\n");
					if(cd[w].data == FLOOR_REQ)
					{
					nextpos = 2 + 4;
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR2);
					cd[w].data = 0;
					cd[w].id = 0;
					door = 0;
					}
					
				}
				
				if(cd[w].id == ID_F3_TO_SC){ //ID_F3_TO_SC  0x203
					printf(" To Floor 3\n");
					if(cd[w].data == FLOOR_REQ)
					{
					nextpos = 3 + 4;
					pcanTx(ID_SC_TO_EC, GO_TO_FLOOR3);
					cd[w].data = 0;
					cd[w].id = 0;
					door = 0;
					}
				}
			}
		
		
	}
	

	// Close CAN 2.0 channel and exit	
	CAN_Close(h2);
	//printf("\nEnd Rx\n");
							
}


