<?php
$submitted = !empty($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="PHP Login Page" />
		<meta name="robots" content="noindex nofollow" />
		<meta html-equiv="author" content="MAJiK" />
		<meta html-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-idth, initial-scale=1.0" />
		<title>Login - No BOTS</title>
	</head>
	<body>
		<p>Form Submitted? <?php echo (int) $submitted; ?></p><br>
		<p>You info is:</p>
		<ul>
			<li>First Name: <?php echo $_POST['fname']; ?></li>
			<li>Last Name: <?php echo $_POST['lname']; ?></li>
			<li>Birthdate: <?php echo $_POST['birthday']; ?></li>
			<li>Favourite Colour: <?php echo $_POST['colour']; ?></li>
			<li>Gender: <?php echo $_POST['gender']; ?></li>
			<li>Student Number: <?php echo $_POST['snum']; ?></li>
			<li>Email: <?php echo $_POST['email']; ?> </li>
			<li>Username: <?php echo $_POST['uname']; ?></li>
			<li>Password: <?php echo $_POST['password']; ?></li>
			</ul> 
	</body>
</html>