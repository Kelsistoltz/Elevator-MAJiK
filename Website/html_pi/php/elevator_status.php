<?php
  session_start();
  if (empty($_SESSION)){
  	echo "You must <a href='../main_html/login.html'>log in</a> to access this page";
  	exit();
  }
  date_default_timezone_set('America/New_York');

  $username = $_SESSION['username'];
  
  $db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');

  $statement = $db->prepare('SELECT * FROM status WHERE verbose = "Elevator Floor Status"');
  $statement->execute();
  $result = $statement->fetchAll();

  echo $result[0]['ID'];
?>
