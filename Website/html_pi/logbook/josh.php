<?php
	if(isset($_POST['upload'])){
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_temp_Loc = $_FILES['file']['tmp_name'];
		$file_store = "uploadJ/".$file_name;

		if(move_uploaded_file($file_temp_Loc, $file_store)){
			echo "Files are uploaded";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../css/homesty.css" type="text/css" rel="stylesheet" />

		<title>Josh's Log Book</title>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="../main_html/index.html">Home</a>
			<a href="../logbook/mike.php">Mike Luong's Logs</a>
			<a href="../logbook/aaron.php">Aaron's Logs</a>
			<a href="../logbook/josh.php">Josh's Logs</a>
			<a href="../logbook/kelsy.php">Kelsi's Logs</a>
			<a href="../main_html/about.html">About Us and the Project</a>
			<a href="../main_html/plan.html">Project Plan</a>
			<a href="../main_html/login.html">Login</a>
		</div>
		<div >
			<h1><span class="open" style="cursor:pointer" onclick="openNav()">&#9778;</span> Josh's Log Book</h1>
			<form action = "?" method ="POST" enctype = "multipart/form-data">
				<p><input type = "file" name = "file"/> </p>
				<p><input type = "submit" name = "upload" value = "Upload Image"></p>
			</form>
<?php

   if(isset($_POST['submit'])){#
    $img=$_FILES['img'];
    if($img['name']==''){
     echo "<h2>An Image Please.</h2>";
    }else{
     $filename = $img['tmp_name'];
     $client_id="be25824c6fcb207";  //Your Client ID here
     $handle = fopen($filename, "r");
     $data = fread($handle, filesize($filename));
     $pvars   = array('image' => base64_encode($data));
     $timeout = 30;
     $curl    = curl_init();
     curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
     curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
     curl_setopt($curl, CURLOPT_POST, 1);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
     $out = curl_exec($curl);
     curl_close ($curl);
     $pms = json_decode($out,true);
     $url=$pms['data']['link'];


     $url_to_image = $url;
     $my_save_dir = 'uploadJ/';
     //echo "'$my_save_dir'";
     $filename1 = basename($url_to_image);
     $complete_save_loc = $my_save_dir . $filename1;
     //$dl_pic = file_get_contents($url);
     //$dl_pic = Desktop/something.jpg;
     //echo"<img src='$dl_pic'/>";

     if (file_put_contents($complete_save_loc, file_get_contents($url))!= 0){
     	echo"Success";
     }else{
     	echo"Fail";
     }
     //echo "'$complete_save_loc'";




/*
      $ch = curl_init('$url');
      $fp = fopen('/uploadK', 'wb');
      curl_setopt($ch, CURLOPT_FILE, $fp);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_exec($ch);
      curl_close($ch);
      fclose($fp);*/

     if($url!=""){
      echo "<h2>Uploaded Without Any Problem</h2>";
      echo "<img src='$url'/>";
      //echo "1) ".basename($filename1);  //testing point (filename)
     }else{
      echo "<h2>There's a Problem</h2>";
      echo $pms['data']['error']['message'];
     }
    }
   }
   ?>
			<br><br>
			<button onclick="topFunction()" id="gtt" title="GoToTop" color="red"><strong>Top of Page</strong></button>
		<div class="footer">&copy MAJiK</div>
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

	$folder = "uploadJ/";
	if(is_dir($folder)){
		//if($open = opendir($folder))
			$imgarr = scandir($folder);
			foreach($imgarr as &$file)
			{
				if($file == '.' || $file == '..') continue;
				echo ' <img width="50%" src ="uploadJ/'.$file.'">';
				//echo $file;
			}
			//closedir($open);
	}
?>
