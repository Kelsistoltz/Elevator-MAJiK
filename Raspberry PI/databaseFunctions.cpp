// Includes required (headers located in /usr/include) 
#include "../include/databaseFunctions.h"
#include "../include/pcanFunctions.h"
#include <stdlib.h>
#include <iostream>
#include <mysql_connection.h>
#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>
 
using namespace std; 

sql::Driver *driver; 			// Create a pointer to a MySQL driver object
sql::Connection *con; 			// Create a pointer to a database connection object
sql::PreparedStatement *pstmt;
sql::Statement *stmt;			// Crealte a pointer to a Statement object to hold statements 
sql::ResultSet *res;			// Create a pointer to a ResultSet object to hold results 
/* 
 //Get the floor number
int db_getFloorNum() {
	sql::Driver *driver; 			// Create a pointer to a MySQL driver object
	sql::Connection *con; 			// Create a pointer to a database connection object
	sql::Statement *stmt;			// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;			// Create a pointer to a ResultSet object to hold results 
	int floorNum;					// Floor number 
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "root", "ese");	
	con->setSchema("test");		
	
	// Query database
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM a WHERE nodeID = 1");	// message query
	while(res->next()){
		floorNum = res->getInt("currentFloor");
	}
	
	// Clean up pointers 
	delete res;
	delete stmt;
	delete con;
	
	return floorNum;
}
 
 
 
 //Setting floor number
int db_setFloorNum(int floorNum) {
	
	sql::Driver *driver; 				// Create a pointer to a MySQL driver object
	sql::Connection *con; 				// Create a pointer to a database connection object
	sql::Statement *stmt;				// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;				// Create a pointer to a ResultSet object to hold results 
	sql::PreparedStatement *pstmt; 		// Create a pointer to a prepared statement	
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "root", "ese");	
	con->setSchema("test");									
	
	// Query database (possibly not necessary)
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM  WHERE nodeID = 1");	// message query
	while(res->next()){
		res->getInt("currentFloor");
	}
		
	// Update database
	// *****************************
	pstmt = con->prepareStatement("UPDATE a SET currentFloor = ? WHERE nodeID = 1");
	pstmt->setInt(1, floorNum);
	pstmt->executeUpdate();
		
	// Clean up pointers 
	delete res;
	delete pstmt;
	delete stmt;
	delete con;
} */

void start(){
	
	driver = get_driver_instance();
	con = driver->connect("tcp://142.156.193.61:3306", "Pi", "MAJiK");	
	con->setSchema("test");	
	
}

/**********************************
 * Name: log()
 * Purpose: Logs everything in the queue
**********************************/
void log( int node, char s[]) {

	pstmt = con->prepareStatement("INSERT INTO log (nodeID, log, user) VALUES (?,?,'CAN_NODE')");
	
	//pstmt->setInt(1, cmd);
	pstmt->setInt(1, node);
	pstmt->setString(2,s);
	pstmt->executeUpdate();
	pstmt->close();
	printf("\nLogged");
}


/**********************************
 * Name: next()
 * Purpose: Takes from Queue, then deletes
**********************************/
int next() {

	
	int next = 0; //takes next command
	

	
	// Query database
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT * FROM data LIMIT 1");	// message query
	while(res->next()){
		next = res->getInt("cmd"); //next command from database	
	}

	del();
	
	return next; //0 if empty
}

/**********************************
 * Name: del()
 * Purpose: Delete entry from queue table
**********************************/
void del(){
	
	pstmt = con->prepareStatement("DELETE FROM data LIMIT 1"); //Delete that entry in the queue

	pstmt->executeUpdate();
	pstmt->close();

}

/**********************************
 * Name: now()
 * Purpose: Update status of the elevator
**********************************/
void now(int current, int door, int status) {
	
	pstmt = con->prepareStatement("UPDATE status SET ID = ? WHERE verbose='Elevator Floor Status'");
	pstmt->setInt(1, current);
	pstmt->executeUpdate();
	pstmt = con->prepareStatement("UPDATE status SET ID = ? WHERE verbose='Door Status'");
	pstmt->setInt(1, door);
	pstmt->executeUpdate();
	pstmt = con->prepareStatement("UPDATE status SET ID = ? WHERE verbose='Emergency Stop Status'");
	pstmt->setInt(1, status);
	pstmt->executeUpdate();
	pstmt->close();
	
}

/**********************************
 * Name: addQueue()
 * Purpose: To add values to the queue
**********************************/
void addQueue(int cmd, int node) {
	
	pstmt = con->prepareStatement("INSERT INTO data(cmd, verbose, nodeID, user) VALUES (?,'Moving Stuff',?,'CAN_NODE')");
	
	pstmt->setInt(1, cmd);
	pstmt->setInt(2, node);
	pstmt->executeUpdate();

	pstmt->close();
	
	
}

/**********************************
 * Name: clear()
 * Purpose: To clear database completely when there is an emergency stop
**********************************/
void clear(){

	sql::Statement *stmt;			// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;			// Create a pointer to a ResultSet object to hold results 

	
	pstmt = con->prepareStatement("TRUNCATE data");
	pstmt->executeUpdate();
	pstmt = con->prepareStatement("INSERT INTO data(cmd, verbose, nodeID, user) VALUES (0,'Empty',0,'NOBODY')");
	pstmt->executeUpdate();
	//pstmt = con->prepareStatement("UPDATE TABLE status WHERE ");
	//pstmt->executeUpdate();
	pstmt->close();
	
}


void stop(int floor){
	
	static int stop;
	static int i;
	stop = 0;
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT * FROM data WHERE cmd=10");	// message query
	while(res->next()){
		stop = res->getInt("nodeID"); //last command from logger
	}
	if (stop != 0){
		del();
		printf("\nEMERGENCY STOP FROM %d", i);
		pcanTx(ID_SC_TO_EC, 0x00);
		for(i = 0; i < 10;i++){
			sleep(1);
			printf("\nE Stopped, %d seconds ellapsed", i+1);
		}
		
		printf("\nCommencing");
		pcanTx(ID_SC_TO_EC, floor);
	}
}
