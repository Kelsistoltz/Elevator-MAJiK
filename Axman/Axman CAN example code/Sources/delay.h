// delay.h 

#include <hidef.h>            /* common defines and macros */
#include "derivative.h"       /* derivative-specific definitions */

void msDelay(unsigned delay_time){             // Delay value = delay time * clock frequency = 200 usec * 12 = 2400
 TSCR1 = 0x90;                // Enables TCNT and clears fast timer 
 TSCR2 = 0x01;                // Disables the TCNT interrupt and sets the prescaler to 2 (clock freq = 24MHz/2 = 12 MHz)
 TIOS |= 0x01;                // Enable OC0 function
 TC0 = TCNT + delay_time*12;  // Start an OC0 operation
 while (!(TFLG1 & 0x01));     // Wait for PT0 to go high
  
}
