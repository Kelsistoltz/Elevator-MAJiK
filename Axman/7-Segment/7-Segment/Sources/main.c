#include <hidef.h>      /* common defines and macros */
#include "derivative.h"      /* derivative-specific definitions */
#include "delay.h"

void main(void) {
	DDRB = 0xFF;
	PORTB = 0xFF;
	
	TSCR2 = 0x06;
	TSCR1 = 0xB0;
	
	EnableInterrupts;
	
  for(;;) {
    PORTB ^= 0xFF;
    msDelay(1000);
  } 
}
