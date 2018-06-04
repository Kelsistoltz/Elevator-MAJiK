#include <hidef.h>      /* common defines and macros */
#include "derivative.h"      /* derivative-specific definitions */
#include "can.h"
#include "delay.h"
#include "elevator.h"

void main(void) {
  volatile unsigned char input;
  volatile unsigned char but;
  unsigned int Error;

  // Initialize Timer Module
  TSCR2 = 0x06;
	TSCR1 = 0xB0;
	
  // Initialize CAN Module
  CANInit();
  
  // Enable CAN Interrupts
	CANRFLG = 0xC3;                   // Enable CAN Rx interrupts
  CANRIER = 0x01;                   // Clear CAN Rx flag
  
  // Enable 7-Segment Registers
  DDRB  = 0xFF;
  PORTB = 0xFF;
  
  // Enable Switch Registers
  DDRJ  = 0x00;
  
  // Enable LED Registers
  DDRS  = 0xFF;
  PTS   = 0x00; 
  
  // Enable floor request buttons
  DDRA  = 0x00;
  PORTA = 0xFF;
  
	EnableInterrupts;

  for(;;){
    but = PORTA;
    if (but && PORTA_BIT1_MASK)
      LED1 = TRUE;
    // While both switches are off
    input = PTJ;   
    // If going down
    if(input == SW2) { 
      Error = CANTx(F1_CANID, F1_REQ, F1_CANLEN, F1_CANPRI);
      LED1 = TRUE;
    // If going up                           
    } else if (input == SW1){  
      Error = CANTx(F1_CANID, F1_REQ, F1_CANLEN, F1_CANPRI);
      LED2 = TRUE; 
    } 
    while(input == SW_OFF && but == 0){
      input = PTJ;
      but = PORTA;
    } 
  }
}