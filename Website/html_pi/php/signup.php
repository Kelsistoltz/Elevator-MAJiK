<?php

require_once __DIR__ . '/GuestUser.php';
require_once __DIR__ . '/AuthUser.php';

session_start();
	$db = new PDO(
		'mysql:host=127.0.0.1;dbname=test',
		'root',
		''
	);
	
	$username = $_POST['username'];	
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$newUser = new AuthUser($username, $password);		// make object when Signup is called.
	$newUser->addUser($username, $password, $email);	// add the new user to database, called from AuthUser.php
	
	echo "<p>You have successfully registered</p>";
	echo "<p>Click <a href=../index.php> HERE </a> to go back to login page.</p>";
?>	