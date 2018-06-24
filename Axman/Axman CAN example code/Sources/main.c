#include <hidef.h>            /* common defines and macros */
#include "derivative.h"       /* derivative-specific definitions */
#include "CAN.h"
#include <stdio.h>
#include <stdlib.h>
#include "delay.h"



void main(void) {
  
  unsigned char errorflag = CAN_NO_ERROR;
  unsigned char txbuff[1] = { 0x7 };
  
  CANInit();
   
  while (!(CANCTL0 & CAN_SYNC));       // Wait for MSCAN to synchronize with the CAN bus
  
  // Initialize Timer Module
  TSCR2 = 0x06;
	TSCR1 = 0xB0;
	
  CANRFLG = 0xC3;                      // Enable CAN Rx interrupts
  CANRIER = 0x01;                      // Clear CAN Rx flag
  EnableInterrupts;

  errorflag = CANTx(ST_ID_100, 0x00,1, txbuff);
  msDelay(250);
  
  
  for(;;);
}
