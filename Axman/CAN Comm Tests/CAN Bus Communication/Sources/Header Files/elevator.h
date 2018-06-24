#ifndef ELEVATOR_H
#define ELEVATOR_H

/*** Supervisory Controller Commands ***/
#define SC_CANID        0x100
#define SC_CANLEN       0x01
#define SC_CANPRI       0x00

extern volatile unsigned char SC_FLRQ1[];
extern volatile unsigned char SC_FLRQ2[];
extern volatile unsigned char SC_FLRQ3[];

extern volatile unsigned char SC_DSBL[];
extern volatile unsigned char SC_ENBL[];    // enable 

/***** Elevator Controller Commands *****/
#define EC_CANID        0x101
#define EC_CANLEN       0x01
#define EC_CANPRI       0x01

extern volatile unsigned char EC_MOVE[];    // elevator is moving
extern volatile unsigned char EC_FLR1[];    // elevator is on floor 1
extern volatile unsigned char EC_FLR2[];    // elevator is on floor 2
extern volatile unsigned char EC_FLR3[];    // elevator is on floor 3

extern volatile unsigned char EC_DSBL[];    // elevator is disable
extern volatile unsigned char EC_ENBL[];    // elevator is enable

/******* Car Controller Commands ********/
#define CC_CANID        0x200
#define CC_CANLEN       0x01
#define CC_CANPRI       0x02

extern volatile unsigned char CC_FLR1[];    // request floor 1
extern volatile unsigned char CC_FLR2[];    // request floor 2
extern volatile unsigned char CC_FLR3[];    // request floor 3
extern volatile unsigned char CC_DRO[];     // door open
extern volatile unsigned char CC_DRC[];     // door close

/********** Floor 1 Controller **********/
#define F1_CANID        0x201
#define F1_CANLEN       0x01
#define F1_CANPRI       0x03

extern volatile unsigned char  F1_REQ[];

/********** Floor 2 Controller **********/
#define F2_CANID        0x202
#define F2_CANLEN       0x01
#define F2_CANPRI       0x03

extern volatile unsigned char  F2_REQ[];

/********** Floor 3 Controller **********/
#define F3_CANID        0x203
#define F3_CANLEN       0x01
#define F3_CANPRI       0x03

extern volatile unsigned char  F3_REQ[];

/******* 7-Segment Bit Patterns ********/
#define SEG_ONE         0b00010001
#define SEG_TWO         0b01100111
#define SEG_THREE       0b01010111


/*********** LED and Switch ************/
#define LED1            PTS_PTS2
#define LED2            PTS_PTS3

#define SW1             PTJ_PTJ6_MASK
#define SW2             PTJ_PTJ7_MASK
#define SW_OFF          0xC0

#define I_MASK          0x07

#endif