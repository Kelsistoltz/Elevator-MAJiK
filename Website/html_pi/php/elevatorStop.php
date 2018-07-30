<?php
	session_start();
	if (empty($_SESSION)){
		echo "You must <a href='../main_html/login.html'>log in</a> to access this page";
		exit();
	}
	date_default_timezone_set('America/New_York');

	$username = $_SESSION['username'];
	$nodeID = $_SESSION['nodeID'];

	$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');

	$statement = $db->prepare('INSERT INTO `data` VALUES(10,"Website Emergency Stop",:nodeID,:username,CURRENT_TIMESTAMP())');
  $statement->bindParam(':username', $username);
	$statement->bindParam(':nodeID', $nodeID);
  $statement->execute();

  $statement = $db->prepare('INSERT INTO `log` VALUES(:nodeID,"Emergency Stop Activated!!!",CURRENT_TIMESTAMP(),:username)');
	$statement->bindParam(':username', $username);
	$statement->bindParam(':nodeID', $nodeID);
  $statement->execute();
?>
