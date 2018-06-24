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
			<li>Username: <?php echo $_POST['uname']; ?></li>
			<li>Password: <?php echo $_POST['password']; ?></li>
			</ul> 
	</body>
</html>