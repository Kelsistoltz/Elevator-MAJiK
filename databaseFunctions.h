//#ifndef DB_FUNCTIONS

//#define DB_FUNCTIONS
/*int db_getFloorNum();
int db_setFloorNum(int floorNum);*/

void addQueue(int cmd, int node);
int next();
void now(int current, int door, int status);
void log(int node, char s[]);
void clear();
void del();
void start();
void stop(int floor);

//#endif
