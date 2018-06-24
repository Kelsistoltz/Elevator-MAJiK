<?php

//authenticate.php//
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	
	if($username && $password){
		// enter in as authenticated user
		$db = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
		//echo "<p>does it skip this?</p>";
		
		$authenticated = FALSE;
		$rows = $db->query('SELECT * FROM authusers ORDER BY nodeID');
		foreach($rows as $row){
			if ($username == $row[1] && $password == $row[2]){
				$authenticated = TRUE;
				$_SESSION['nodeID'] = $row[0];	// temporary variable to hold nodeID
				$_SESSION['username'] = $row[1];
				$_SESSION['password'] = $row[2];
				// echo "<p>testing this line</p>";
			}
		}
		
		if($authenticated == TRUE){
			$_SESSION['username']=$username;	// Store a session variable
			echo "<p>Congratulations, you are now logged into the site. <p>";
			echo "<p>Please click <a href=\"member.php\">here</a> to be taken to our member only page</p>";
		} else{
			echo "<p>You are not authenticated</p>";
			echo "<p>Please check your username and password and click <a href='../index.php'>here</a> to log in again";	// REDIRECT BACK TO LOGIN PAGE
		}
		
	} else if ($password == NULL){	// should add another if for null pass AND wrong username
		$db = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
		// enter in as guest
		$rows = $db->query('SELECT * FROM authusers ORDER BY nodeID');
		foreach($rows as $row){
			if ($username == $row[1]){
				$authenticated = TRUE;
				$_SESSION['nodeID'] = $row[0];	// temporary variable to hold nodeID
				$_SESSION['username'] = $row[1];
				$_SESSION['password'] = $row[2];
				// echo "<p>testing this line</p>";
			}
		}
		if($authenticated == TRUE){
			$_SESSION['username']=$username;	// Store a session variable
			echo "<p>You are now logged as a guest. <p>";
			echo "<p>Please click <a href=\"guest.php\">here</a> to be taken to our guest only page</p>";
		} else{
			echo "<p>You are not authenticated</p>";
			echo "<p>Please check your username and password and click <a href='../index.php'>here</a> to log in again";	// REDIRECT BACK TO LOGIN PAGE
		}
	}
	else{
		echo "<p>Please enter a username and password</p>";
	}
?>
