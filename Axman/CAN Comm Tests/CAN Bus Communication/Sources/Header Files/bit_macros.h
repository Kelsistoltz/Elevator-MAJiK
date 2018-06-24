#define   LOW(value)                        ((value)&0xFF)
#define   SET_BITS(port, mask)              ((port) |= (mask))
#define   CLR_BITS(port, mask)              ((port) &= (LOW(~mask)))
#define   TOG_BITS(port, mask)              ((port) ^= (mask))
#define   FORCE_BITS(port, mask, value)      ((port) = ((port)&LOW(~mask))|((value)&(mask)))

