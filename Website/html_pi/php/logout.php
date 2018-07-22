<?php
	session_start();
	session_unset(); //remove all session variables
	session_destroy(); //destroy the session

	echo "You have been logged out. Click <a href=../main_html/login.php> here </a> to log in again";
?>
