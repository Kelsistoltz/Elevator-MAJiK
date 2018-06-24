// Includes required (headers located in /usr/include) 
#include "../include/databaseFunctions.h"
#include <stdlib.h>
#include <iostream>
#include <mysql_connection.h>
#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>
#include <cppconn/prepared_statement.h>
 
using namespace std; 
 
int db_getFloorNum() {
	sql::Driver *driver; 			// Create a pointer to a MySQL driver object
	sql::Connection *con; 			// Create a pointer to a database connection object
	sql::Statement *stmt;			// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;			// Create a pointer to a ResultSet object to hold results 
	int floorNum;					// Floor number 
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "ese", "ese");	
	con->setSchema("elevator");		
	
	// Query database
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM elevatorNetwork WHERE nodeID = 1");	// message query
	while(res->next()){
		floorNum = res->getInt("currentFloor");
	}
	
	// Clean up pointers 
	delete res;
	delete stmt;
	delete con;
	
	return floorNum;
}
 
 
int db_setFloorNum(int floorNum) {
	sql::Driver *driver; 				// Create a pointer to a MySQL driver object
	sql::Connection *con; 				// Create a pointer to a database connection object
	sql::Statement *stmt;				// Crealte a pointer to a Statement object to hold statements 
	sql::ResultSet *res;				// Create a pointer to a ResultSet object to hold results 
	sql::PreparedStatement *pstmt; 		// Create a pointer to a prepared statement	
	
	// Create a connection 
	driver = get_driver_instance();
	con = driver->connect("tcp://127.0.0.1:3306", "ese", "ese");	
	con->setSchema("elevator");										
	
	// Query database (possibly not necessary)
	// ***************************** 
	stmt = con->createStatement();
	res = stmt->executeQuery("SELECT currentFloor FROM elevatorNetwork WHERE nodeID = 1");	// message query
	while(res->next()){
		res->getInt("currentFloor");
	}
		
	// Update database
	// *****************************
	pstmt = con->prepareStatement("UPDATE elevatorNetwork SET currentFloor = ? WHERE nodeID = 1");
	pstmt->setInt(1, floorNum);
	pstmt->executeUpdate();
		
	// Clean up pointers 
	delete res;
	delete pstmt;
	delete stmt;
	delete con;
} 
 
