#ifndef DELAY_H
#define DELAY_H

#include <hidef.h>                      /* common defines and macros */
#include "derivative.h"                 /* derivative-specific definitions */

/***********************************
*   msDelay(unsigned long msTime)
*
* This function uses the 8MHz bus 
* clock on the HCS12. 
***********************************/

/*void msDelay( unsigned long msTime )

  int i;			                          // counter for number of ms delayed 

 	TC0 	= TCNT + 125;		                // preset TC0 for first OC event 
	TIOS |= TIOS_IOS0_MASK;	                      // ready to go - enable TC0 as OC 

	for (i = 0; i < msTime; i++) {        // for number of ms to delay 
		while(!(TFLG1 & TFLG1_C0F_MASK));	              // wait for OC event 
    TC0 += 125;		                      // rearm the OC register, this clears TFLG1 
  } 

  TIOS &= ~TIOS_IOS0_MASK;                        // all done. Turn-off OC on TC0 
}*/

void msDelay( unsigned long msTime )
{
  int i;			                          /* counter for number of ms delayed */

 	TC0 	= TCNT + 125;		                /* preset TC0 for first OC event */
	TIOS_IOS0 = 1;	                      /* ready to go - enable TC0 as OC */

	for (i = 0; i < msTime; i++) {        /* for number of ms to delay */
		while(!(TFLG1 & TFLG1_C0F_MASK));	              /* wait for OC event */
    TC0 += 125;		                      /* rearm the OC register, this clears TFLG1 */
  } 

  TIOS_IOS0 = 0;                        /* all done. Turn-off OC on TC0 */
}

#endif