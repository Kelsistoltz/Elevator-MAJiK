#ifndef PCAN_FUNCTIONS
#define PCAN_FUNCTIONS


// Defines
// ***********************************************************************************************************
#define PCAN_RECEIVE_QUEUE_EMPTY        0x00020U  	// Receive queue is empty
#define PCAN_NO_ERROR               	0x00000U  	// No error 

// Elevator project specific 
#define ID_SC_TO_EC  0x100	// ID for messages from Supervisory controller to elevator controller
#define ID_EC_TO_ALL 0x101	// ID for messages from Elevator controller to all other nodes
#define ID_CC_TO_SC  0x200	// ID for messages from Car controller to supervisory controller 
#define ID_F1_TO_SC  0x201	// ID for messages from floor 1 controller to supervisory controller
#define ID_F2_TO_SC  0x202	// ID for messages from floor 2 controller to supervisory controller
#define ID_F3_TO_SC  0x203	// ID for messages from floor 3 controller to supervisory controller	

#define GO_TO_FLOOR1 0x05	// Go to floor 1
#define GO_TO_FLOOR2 0x06	// Go to floor 2
#define GO_TO_FLOOR3 0x07	// Go to floor 3
#define FLOOR_REQ    0x01
#define STOPIT       0x00

#define STOP		 0xFF

#define QUEUE_ELEMENTS 10000
#define W            0

#define STR 100


// Function declarations
int pcanTx(int id, int data);
//int pcanRx(int num_msgs);
void pcanRx();
int checkCAN();
int checkFloor();




#endif
