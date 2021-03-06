<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="login Page" />
		<meta name="robots" content="noindex nofollow" />
		<meta html-equiv="author" content="MAJiK" />
		<meta html-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-idth, initial-scale=1.0" />

		<link href="../css/homesty.css" type="text/css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="../css/mystyle.css"/>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<title>Login - No BOTS</title>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="index.html">Home</a>
			<a href="../logbook/mike.php">Mike Luong's Logs</a>
			<a href="../logbook/aaron.php">Aaron's Logs</a>
			<a href="../logbook/josh.php">Josh's Logs</a>
			<a href="../logbook/kelsy.php">Kelsi's Logs</a>
			<a href="about.html">About Us and the Project</a>
			<a href="plan.html">Project Plan</a>
			<a href="login.html">Login</a>
		</div>
		<form action="../php/login.php" method="post" id="login">

			<div class="ogForm">
				<h1><span class="open" style="cursor:pointer" onclick="openNav()">&#9778;</span> Please log In</h1>
				<hr>
				<br>

				<div>
					<label for="username" class="text_lbl">Username:</label>
					<input id="username" class="text_ip" type="text" name="uname" placeholder="Enter Username" autofocus />
					<span id="username_alert"></span>
				</div>

				<div>
					<label for="pass" class="text_lbl">Password:</label>
					<input id="pass" class="text_ip" type="password" name="password" placeholder="Enter Password" />
					<span id="pass_alert"></span>
				</div>

				<div>
					<input id="submit" class="form_but" type="submit" value="Log In" onlcick="alert('Access Requested')"/>
          <a class="button" href="request_access.html">Request Access</a>
				</div>

			</div>
			<?php
// TO DISPLAY AVAILABLE USERNAMES
session_start();
$db = new PDO(
	'mysql:host=142.156.193.61;dbname=test',
	'Mike',
	'MAJiK'
	);
	echo "<p><b>Available LogBook Users<b></p>";
	echo "<br />";
	$rows = $db->query('SELECT username FROM authusers ORDER BY nodeID');
	foreach ($rows as $row){
	for($i=0; $i < sizeof($row)/2; $i++){
		echo "  " . $row[$i] ;
	}
	echo "<br />";
	}
?>
		</form>
		<script src="../js/inputEvent.js"></script>
		<script src="../js/project.js"></script>
	</body>
</html>
