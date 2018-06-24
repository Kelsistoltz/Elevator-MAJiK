#include <hidef.h>      /* common defines and macros */
#include "derivative.h"      /* derivative-specific definitions */
#include "can.h"
#include "elevator.h"

/******************************************************
  CANInit()
  
  Initializes the mscan module. Sets the bitrate, soft
  synchronization, ID acceptance filters, and enables
  interrupts
*******************************************************/
void CANInit(void){
  CANCTL0_INITRQ = TRUE;            // initialize can controller
  while(CANCTL1_INITAK == FALSE);   // wait for initialization to be acknowledged
  
  // bitrate = 250kbps
  CANCTL1 = 0xC0;                   // Sets can bus frequency to the axman's bus frequency (8mHz)
  CANBTR0 = 0x07;                   // Sets SJW to 0 and prescaler to 8
  CANBTR1 = 0x23;                   // Sets 1 sample per bit, time segment2 to 3, and time segment1 to 4
  
  CANIDAC = 0x10;                   // Sets four 16-bit ID filters
  
  CANIDAR01 = NODE_ID << 5;         // Set the 16 bit acceptance registers to the ID of the node. Shifted by 5 due to the memory map layout
  CANIDMR01 = 0x0007;               // Set the 16 bit mask registers to ignore the lower three bits
  
	CANCTL0_INITRQ = FALSE;
	while(CANCTL1_INITAK == TRUE);
	while(CANCTL0_SYNCH == FALSE);
}

int CANTx(unsigned short CANTx_ID, volatile unsigned char CANTx_Msg[], unsigned char CANTx_DLR, unsigned char CANTx_Pri){
  int i;
  char CANTx_Buff;
  
  if (!CANTFLG) // If all of the buffers are empty, return an error
    return 1;
  
  CANTBSEL = CANTFLG;      // Select an empty transmit buffer and save the value.
  CANTx_Buff = CANTBSEL;

  CANTXIDR01 = CANTx_ID << 5; 
 
  for (i = 0; (i < CANTx_DLR) && (i < 8); i++) {
    CANTXDSR_ARR[i] = CANTx_Msg[i]; 
  }

  CANTXDLR = CANTx_DLR;
  CANTXTBPR = CANTx_Pri; 
  
  // Start transmission
  CANTFLG = CANTx_Buff;
  
  // Wait for transmission to complete
  while ((CANTFLG & CANTx_Buff) != CANTx_Buff);  
  
  return 0;  
}

interrupt VectorNumber_Vcanrx void CANRxISR(void){
  if (CANRXIDR01 == (EC_CANID << 5))
    if(CANRXDSR0 == *EC_FLR1 || CANRXDSR0 == (*EC_FLR1 | *EC_ENBL)){      
      PORTB = ~SEG_ONE;
      PTS   = 0x00;    
    }
    else if(CANRXDSR0 == *EC_FLR2 || CANRXDSR0 == (*EC_FLR2 | *EC_ENBL)){      
      PORTB = ~SEG_TWO;
    }
    else if(CANRXDSR0 == *EC_FLR3 || CANRXDSR0 == (*EC_FLR3 | *EC_ENBL)){      
      PORTB = ~SEG_THREE;      
    }
    
  CANRFLG |= 0x01;   // Reset RX interrupt flag
} 