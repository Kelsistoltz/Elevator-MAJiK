<?php
	session_start();
	
	$username = $_SESSION['username'];
	$nodeID = $_SESSION['nodeID'];
	
	$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');
	$statement = $db->prepare('INSERT INTO log(nodeID,log,Dateandtime,user) VALUES (:nodeID,"Successful Log Out!",CURRENT_TIMESTAMP(),:username)');
	$statement->bindParam(':nodeID', $nodeID);
	$statement->bindParam(':username', $username);
	$statement->execute();
	
	session_unset(); //remove all session variables
	session_destroy(); //destroy the session

	echo "You have been logged out. Click <a href=../main_html/login.php> here </a> to log in again";
?>
