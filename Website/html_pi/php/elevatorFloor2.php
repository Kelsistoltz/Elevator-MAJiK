<?php
session_start();
if (empty($_SESSION)){
	echo "You must <a href='../main_html/login.html'>log in</a> to access this page";
	exit();
}
	$username = $_SESSION['username'];
	$nodeID = $_SESSION['nodeID'];


	$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');

	$query = 'INSERT INTO data VALUES (2, "Move Car To Floor 2",'.$nodeID.',"'.$username.'",CURRENT_TIMESTAMP())';

	$statement = $db->prepare($query);
	//$username = $_REQUEST['username'];
	$params = [
		'nodeID' => $nodeID,
		'username' => $username
	];

	$result = $statement->execute($params);

	$statement = $db->prepare('INSERT INTO log(nodeID,log,Dateandtime,user) VALUES (:nodeID,"Requesting Floor 2",CURRENT_TIMESTAMP(),:username)');
	$statement->bindParam(':nodeID', $nodeID);
	$statement->bindParam(':username', $username);
	$statement->execute();
?>
