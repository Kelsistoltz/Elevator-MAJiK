<?php
session_start();
if (empty($_SESSION)){
	echo "You must <a href='../main_html/login.html'>log in</a> to access this page";
	exit();
}
	$username = $_SESSION['username'];
	$nodeID = $_SESSION['nodeID'];


	$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');

	$query = 'INSERT INTO data VALUES (1, "Move Car To Floor 1",'.$nodeID.',"'.$username.'",CURRENT_TIMESTAMP())';
	echo $query;
	$statement = $db->prepare($query);
	//$username = $_REQUEST['username'];
	$params = [
		'nodeID' => $nodeID,
		'username' => $username
	];

	$result = $statement->execute($params);
?>
