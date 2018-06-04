#include "elevator.h"

/*** Supervisory Controller Commands ***/
volatile unsigned char SC_FLRQ1[] = { 0x01 };
volatile unsigned char SC_FLRQ2[] = { 0x02 };
volatile unsigned char SC_FLRQ3[] = { 0x03 };

volatile unsigned char SC_DSBL[]  = { 0x00 };
volatile unsigned char SC_ENBL[]  = { 0x04 };

/***** Elevator Controller Commands *****/
volatile unsigned char EC_MOVE[]  = { 0x00 };
volatile unsigned char EC_FLR1[]  = { 0x01 };
volatile unsigned char EC_FLR2[]  = { 0x02 };
volatile unsigned char EC_FLR3[]  = { 0x03 };

volatile unsigned char EC_DSBL[]  = { 0x00 };
volatile unsigned char EC_ENBL[]  = { 0x04 };

/******* Car Controller Commands ********/
volatile unsigned char CC_FLR1[]  = { 0x01 };
volatile unsigned char CC_FLR2[]  = { 0x02 };
volatile unsigned char CC_FLR3[]  = { 0x03 };

volatile unsigned char CC_DRO[]   = { 0x00 };
volatile unsigned char CC_DRC[]   = { 0x04 };

/********** Floor 1 Controller **********/
volatile unsigned char F1_REQ[]   = { 0x01 };

/********** Floor 2 Controller **********/
volatile unsigned char F2_REQ[]   = { 0x01 };

/********** Floor 3 Controller **********/
volatile unsigned char F3_REQ[]   = { 0x01 };

