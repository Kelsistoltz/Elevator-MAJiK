/*** Supervisory Controller Commands ***/
#define SC_CANID        0x100
#define SC_CANLEN       0x01
#define SC_CANPRI       0x00

#define SC_FLRQ1        0x01
#define SC_FLRQ2        0x02
#define SC_FLRQ3        0x03

#define SC_DSBL         0x00
#define SC_ENBL         0x04

/***** Elevator Controller Commands *****/
#define EC_CANID        0x101
#define EC_CANLEN       0x01
#define EC_CANPRI       0x01

#define EC_MOVE         0x00
#define EC_FLR1         0x01
#define EC_FLR2         0x02
#define EC_FLR3         0x03

#define EC_DSBL         0x00
#define EC_ENBL         0x04

/******* Car Controller Commands ********/
#define CC_CANID        0x200
#define CC_CANLEN       0x01
#define CC_CANPRI       0x02

#define CC_FLR1         0x01
#define CC_FLR2         0x02
#define CC_FLR3         0x03

/********** Floor 1 Controller **********/
#define F1_CANID        0x201
#define F1_CANLEN       0x01
#define F1_CANPRI       0x03

#define F1_REQ          0x01

/********** Floor 2 Controller **********/
#define F2_CANID        0x202
#define F2_CANLEN       0x01
#define F2_CANPRI       0x03

#define F2_REQ          0x01

/********** Floor 3 Controller **********/
#define F3_CANID        0x203
#define F3_CANLEN       0x01
#define F3_CANPRI       0x03

//#define F3_REQ          (volatile unsigned char * const)0x01