#ifndef CAN_H
#define CAN_H

void CANInit(void);
int CANTx(unsigned short CANTx_ID, volatile unsigned char * CANTx_Msg, unsigned char CANTx_DLR, unsigned char CANTx_Pri);
interrupt VectorNumber_Vcanrx void CANRxISR(void);

#define CANIDAR01 (*(volatile unsigned short int * const) &CANIDAR0)
#define CANIDAR23 (*(volatile unsigned short int * const) &CANIDAR2)
#define CANIDAR45 (*(volatile unsigned short int * const) &CANIDAR4)
#define CANIDAR67 (*(volatile unsigned short int * const) &CANIDAR6)

#define CANIDMR01 (*(volatile unsigned short int * const) &CANIDMR0)
#define CANIDMR23 (*(volatile unsigned short int * const) &CANIDMR2)
#define CANIDMR45 (*(volatile unsigned short int * const) &CANIDMR4)
#define CANIDMR67 (*(volatile unsigned short int * const) &CANIDMR6)

#define CANTXIDR01 (*(volatile unsigned short int * const) &CANTXIDR0)
#define CANRXIDR01 (*(volatile unsigned short int * const) &CANRXIDR0)

static const short NODE_ID = 0x101;

#endif