<?php

	$db = new PDO('mysql:host=142.156.193.61;dbname=test', 'Mike', 'MAJiK');
	
	$query = 'INSERT INTO data VALUES (3, Move Car To Floor 3, :nodeID, :username)';
	$statement = $db->prepare($query);
	$username = $_REQUEST['username'];
	$params = [
		'username' => $username
	];
		
	$result = $statement->execute($params);


?>