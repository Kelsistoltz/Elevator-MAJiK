<?php
session_start();
	$username = $_SESSION['username'];
	$nodeID = $_SESSION['nodeID'];

	
	$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');
	
	$query = 'INSERT INTO data VALUES (2, "Move Car To Floor 2",'.$nodeID.',"'.$username.'",CURRENT_TIMESTAMP())';
	echo $query;
	$statement = $db->prepare($query);
	//$username = $_REQUEST['username'];
	$params = [
		'nodeID' => $nodeID,
		'username' => $username
	];
		
	$result = $statement->execute($params);
?>