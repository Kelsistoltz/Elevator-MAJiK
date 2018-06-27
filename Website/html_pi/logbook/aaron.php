

<!DOCTYPE html>
<html>
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../css/homesty.css" type="text/css" rel="stylesheet" />

		<title>Aaron Kruck's Log Book</title>
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

			<h1><span class="open" style="cursor:pointer" onclick="openNav()">&#9778;</span> Aaron's Log Book</h1>

			<ul>
				<h2 class="weeklog" >Week 3</h2>
				<li><strong>Monday, May 14th</strong><br>
				<p>Monday was a holiday (Victoria Day). Nothing was done on this day.</p></li>
				<li><strong>Tuesday, May 15th</strong><br>
				<p>Nothing was done in Project. There was a math quiz that I'm pretty sure I failed.</p></li>
				<li><strong>Wednesday, May 16th</strong><br>
				<p>Today Josh and Kelsi continued to fiddle with the hardware. Josh managed to send messages that changed the states of LED's.
				I worked briefly on the website, following the assignment.</p></li>
				<li><strong>Thursday, May 17th</strong><br>
				<p>Worked on the Project Website. Followed the assignment and added some new things to spice it up. Added a side navigation menu to most of the pages.
				Mike took this code and used it and added it to every page. The details on each page still have yet to be filled in. Started also today on CSS styling
				in order to give the page some flair. </p></li>
				<li><strong>Friday, May 18th</strong><br>
				<p>Goofed off for 6 hours after our 11 AM Thermo Class. Played video games, and then took the 7 PM quiz (nailed it 100%). Then went to go see SOLO: A Star Wars Story.</p></li>
				<h2 class="weeklog" >Week 4</h2>
				<li><strong>Monday, May 28th</strong><br>
				<p>Worked on functions of website. Added l9ogs content, and spruced it up. I also started using the pi as a webserver.</p></li>
				<h2 class="weeklog" >Week 5</h2>
				<p>This week was full of us working on the hardware and the software for the flooor controllers, the supervisor controller, and the car controller.
				After working for a few days solid (Ie Sunday, Monday) we still have not gotten the door function done. All of the floor supervisors have seven segment displays to
				indicate which floor the elevator is currently on. They also use the built in buttons, and LED's to call the floor, and indicate that the floor has been called.
				The pi has been modified to accept the right commands, including sending out the floor requests, and recieving the door/emergency stop commands. After this week, we plan to work
				out the logic for finishing the queue system so that none of the buttons call a different floor when another floor is being moved to.
				<br /><br />
				Tasks:<br />
				Aaron: Software on Pi<br />
				Kelsi: Hardware on AXEMEN<br />
				Josh: Hardware/Software for floor controllers and car controller<br />
				Mike: Support and Web Design
				</p>
				<h2 class="weeklog" >Week 6</h2>
				<p>
				This week we just worked on the website. That's it.
				</p>
				<h2 class="weeklog" >Week 7</h2>
				<p>
				Added Java Script functionality to the request access page to make it so the user can only submit
				the page once they fill in the appropriate fields. It give an error message when you do not.
				</p>
			</ul>
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
     $my_save_dir = 'uploadA/';
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

	$folder = "uploadA/";
	if(is_dir($folder)){
		//if($open = opendir($folder))
			$imgarr = scandir($folder);
			foreach($imgarr as &$file)
			{
				if($file == '.' || $file == '..') continue;
				echo ' <img src ="uploadA/'.$file.'">';
				//echo $file;
			}
			//closedir($open);
	}
?>
