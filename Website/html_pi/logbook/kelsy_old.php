<?php
	if(isset($_POST['upload'])){
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_temp_Loc = $_FILES['file']['tmp_name'];
		$file_store = "uploadK/".$file_name;
		
		if(move_uploaded_file($file_temp_Loc, $file_store)){
			echo "Files are uploaded";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-idth, initial-scale=1.0" />
		<link href="../css/homesty.css" type="text/css" rel="stylesheet" />

		<title>Kelsi's Log Book</title>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="../main_html/home.html">Home</a>
			<a href="../logbook/mike.php">Mike Luong's Logs</a>
			<a href="../logbook/aaron.php">Aaron's Logs</a>
			<a href="../logbook/josh.php">Josh's Logs</a>
			<a href="../logbook/kelsy.php">Kelsi's Logs</a>				
			<a href="../main_html/about.html">About Us and the Project</a>
			<a href="../main_html/plan.html">Project Plan</a>
			<a href="../main_html/login.html">Login</a>
		</div>
		<div id="main">
			<h1><span class="open" style="cursor:pointer" onclick="openNav()">&#9778;</span> Kelsi's Log Book</h1>
			<form action = "?" method ="POST" enctype = "multipart/form-data">
				<p><input type = "file" name = "file"/> </p>
				<p><input type = "submit" name = "upload" value = "Upload Image"></p>
			</form>
			<br><br>
			<button onclick="topFunction()" id="gtt" title="GoToTop" color="red"><strong>Top of Page</strong></button>
		</div>
		<script>
			function topFunction(){
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
			<!-- Functions for side menu -->
			function openNav() {
   				document.getElementById("mySidenav").style.width = "250px";
    			document.getElementById("main").style.marginLeft = "250px";
			}

			function closeNav() {
    			document.getElementById("mySidenav").style.width = "0";
    			document.getElementById("main").style.marginLeft= "0";
			}
		</script>	
	</body>
</html>

<?php

	$folder = "uploadK/";
	if(is_dir($folder)){
		if($open = opendir($folder))
		{
			while(($file = readdir($open))!=false)
			{
				if($file == '.' || $file == '..') continue;
				echo ' <img src ="uploadK/'.$file.'">';
			}
			closedir($open);
		}
	}
?>