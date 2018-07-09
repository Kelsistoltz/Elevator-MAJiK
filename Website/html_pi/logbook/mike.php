<?php
	if(isset($_POST['upload'])){
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_temp_Loc = $_FILES['file']['tmp_name'];
		$file_store = "uploadM/".$file_name;
		
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

		<title>Mike Luong's Log Book</title>
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
		<div >
			<h1><span class="open" style="cursor:pointer" onclick="openNav()">&#9778;</span> Mike's Log Book</h1>
			<form action = "?" method ="POST" enctype = "multipart/form-data">
				<p><input type = "file" name = "file"/> </p>
				<p><input type = "submit" name = "upload" value = "Upload Image"></p>
			</form>
			<p><strong>Log Document for Project VI - Group MAJiK</strong></p>
<p><strong>Michael Luong</strong></p>
<p><strong>May 7, 2018</strong></p>

<p>Table of Contents</p>
<p></p>
<p><strong>Week of May 7, 2018</strong><strong>	</strong><strong>1</strong></p><p><strong>Week of May 14, 2018</strong><strong>	</strong><strong>3</strong></p><p><strong>Week of May 21, 2018</strong><strong>	</strong><strong>3</strong></p><p><strong>Week of May 28, 2018</strong><strong>	</strong><strong>4</strong></p><p><strong>Week of June 4, 2018</strong><strong>	</strong><strong>6</strong></p><p><strong>Week of June 11, 2018</strong><strong>	</strong><strong>6</strong></p><p><strong>Week of June 18, 2018</strong><strong>	</strong><strong>7</strong></p><p><strong>Week of June 25, 2018</strong><strong>	</strong><strong>7</strong></p><p><strong>Week of July 2, 2018</strong><strong>	</strong><strong>8</strong></p>

<h1>Week of May 7, 2018</h1>
<p><strong>Monday, May 7, 2018</strong></p>
<ul><li>First Project Briefing</li></ul>
<ul><li>Group MAJiK (Group of 4) - Michael Luong, Aaron Kruck, Josh Yonathon, Kelsi Stoltz</li></ul>
<li>4 Axman boards in total; 3 for each floor of the elevator and 1 for the main elevator cart</li>
<ul><li>Kelsi and I have one, Josh and Aaron are borrowing from Dave S.</li></ul>
<li>7 push buttons are required; 1 for top floor, 1 for bottom floor, 3 for mid floor and 3 main elevator cart</li>
<li>For next week’s debrief, form a group, create a project plan/schedule, progress report, and possibly demo CAN node configuration with test plan and results</li>
<li>Phase 1 of Project (4 weeks)</li>
<li>Design of a CAN messaging protocol that is common amongst all groups is completed already</li></ul>

<p><strong>Tuesday, May 8, 2018</strong></p>
<ul><li>Group Meeting (~15 minutes)</li></ul>
<ul><li>Random “finger” selector used to split up and determine the tasks for the first debrief</li></ul>
<ul><li>Aaron and Kelsi are selected for the project schedule and progress report</li></ul>
<li>Me and Josh are looking ahead at the options that we have for the endgame GUI for the elevator project and hardware setup options</li>
<ul><li>Josh is looking to possibly play with applications instead of a webpage for the time being</li></ul>
<li>I am currently reviewing notes for the CAN bus and PCAN connections, as well as programming them</li></ul>

<p><strong>Wednesday, May 9, 2018</strong></p>
<ul><li>CAN (Controller Area Network)</li></ul>
<ul><li>Under Notes (Historical) -> CAN Programming for HCS12 Nodes - Rough notes</li></ul></ul>
<p><strong>Thursday, May 10, 2018</strong></p>
<ul><li>GitHub</li></ul>
<ul><li>Kelsi sent the invite (<u>https://github.com/Kelsistoltz/Elevator-MAJiK</u>)</li></ul></ul>
<p><strong>Friday, May 11, 2018</strong></p>
<ul><li>Putty</li></ul>
<ul><li>Windows Putty: <u>https://www.putty.org/</u> </li></ul>
<li>Linux Putty: </li>
<ul><li>Sudo apt install putty</li></ul>
<li>Putty</li>
<li>RPi IP: 192.168.0.202:22</li>
<li>Username: pi</li>
<li>Password: ese</li></ul>
<p><img src="cid:Image_0.png" /></p>








<h1>Week of May 14, 2018</h1>
<p><strong>Monday, May 14, 2018</strong></p>
<ul><li>Webpage</li></ul>
<ul><li>Implementing previous webpage codes from year 2017 from Software Engineering course</li></ul>
<ul><li>Bootstrap template - Jumbotron (<u>https://getbootstrap.com/docs/3.3/getting-started/#examples</u>)</li></ul>
<li>Ability to read and write to localhost database, “test”</li>
<ul><li>Can register, change credentials and login as guest</li></ul></ul>

<p><strong>Tuesday, May 15, 2018</strong></p>
<ul><li>Group Meeting (~15 minutes)</li></ul>
<ul><li>Josh and Kelsi are focusing on CAN communication</li></ul>
<li>Me and Aaron are working on web side</li>
<ul><li>I sent an old webpage shell to Aaron to look at</li></ul></ul>

<p><strong>Wednesday, May 16, 2018</strong></p>
<ul><li>Webflow</li></ul>
<ul><li>Playing with Webflow to make a website template</li></ul>
<ul><li>Since you do need a paid subscription for the full script, this is mainly used to obtain ideas</li></ul></ul>

<p><strong>Friday, May 18, 2018</strong></p>
<ul><li>Sent Aaron bootstrap shell for webpage to play around</li></ul>
<ul><li>New shell is made with ideas from bootstrap shell</li></ul></ul>


<h1>Week of May 21, 2018</h1>
<p><strong>Wednesday, May 23, 2018</strong></p>
<ul><li>Website details</li></ul>
<ul><li>Aaron is working on the details of the webpage while I am working on mostly the back end</li></ul>
<li>PCAN Control</li>
<li>Simple reading and writing is established by Josh and Kelsi</li>
<li>Protocol needs to be revisited to be able to find a way to communicate the Axman boards to the PI and to the Website/portable device</li></ul>

<p><strong>Friday, May 25, 2018</strong></p>
<ul><li>Organized software files from last year</li></ul>
<ul><li>Reviewed each file that is useful and placed in folder /htdocs/ProjectVI</li></ul>
<li>Look into fading/transitional backgrounds</li></ul>

<h1>Week of May 28, 2018</h1>
<p><strong>Monday, May 28, 2018</strong></p>
<ul><li>Aaron’s Webpage touch-up</li></ul>
<ul><li>Include labels where labels should be</li></ul>
<li>Played around sizing of textboxes and borders</li>
<li>Added more “div” to divide up the sections more</li>
<li>Fixed minor grammar and bugs</li>
<ul><li>Menu Toggle was not moving some things that were meant to be moved</li></ul>
<li>Added pop-out menu to the rest of the pages that did not have it</li>
<li>Included “Home” option in pop-out menu</li>
<li>Look into toggling navigation bars</li>
<li>Logbooks still in electronic on Google Docs</li>
<li>Short group meeting (~10 minutes):</li>
<li>Aaron is helping Josh communicate between the nodes from the PI</li>
<li>I’ll be trying to help Kelsi on the Seven-Segment Display and the push buttons on the board</li></ul>


<p><strong>Tuesday, May 29, 2018</strong></p>
<ul><li>Pin configuration for push buttons on Axman board are on the MCU</li></ul>
<ul><li>PJ# -> push buttons</li></ul>
<li>PS# -> LEDs underneath them</li></ul>
<p><strong>Wednesday, May 30, 2018</strong></p>
<ul><li>Push buttons and LEDs config<img src="cid:Image_1.png" /></li></ul>
<li>Components are powered by the board and need only a jumper to the ports to use them</li>
<ul><li>Configure a method to include the on-board buttons and LEDs with the code written on each controller</li></ul></ul>

<p><strong>Thursday, May 31, 2018</strong></p>
<ul><li>Starting Test Plan for Phase 1 of the project</li></ul>
<li>Hardware to test:</li>
<ul><li>Push buttons</li></ul>
<li>LEDs</li>
<li>Software:</li>
<li>CAN Communication between each node and the results of each call/command</li></ul>

<p><strong>Friday, June 1, 2018</strong></p>
<ul><li>Finished first version of the Test Plan. Uploaded over to Facebook group and on Google Drive</li></ul></ul>






<h1>Week of June 4, 2018</h1>
<p><strong>Monday, June 4, 2018</strong></p>
<ul><li>Psychology test - Wednesday, June 13 @ 2 pm</li></ul></ul>

<p><strong>Friday, June 8, 2018</strong></p>
<ul><li>Research downloading files and moving them to a designated folder</li></ul>
<ul><li><u><a href="http://php.net/manual/en/function.move-uploaded-file.php" rel="nofollow">http://php.net/manual/en/function.move-uploaded-file.php</a></u> </li></ul>
<li><u>https://www.w3schools.com/Php/php_file_upload.asp</u> </li>
<li>Problem with last weeks Image upload and display</li>
<li>Only works locally.</li>
<li>Image does not get uploaded to a repository to fetch</li>
<li>CURL PHP used to upload to imgur and download to a folder</li>
<li><u>https://stackoverflow.com/questions/724391/saving-image-from-php-url</u> </li>
<li><u>https://subinsb.com/uploading-images-using-imgur-api-in-php/</u> </li>
<li>Imgur account is needed </li>
<ul><li>Imgur Client ID for PHP image upload</li></ul></ul>

<h1>Week of June 11, 2018</h1>
<p><strong>Monday, June 11, 2018</strong></p>
<ul><li>Applied CURL php code to rest of logbook users</li></ul>
<ul><li>FOLDERS NEEDS TO HAVE PROPER PERMISSIONS</li></ul>
<ul><li>Right click folder to change permissions</li></ul></ul>

<p><strong>Wednesday, June 13, 2018</strong></p>
<ul><li>Downloaded and installed Connector/C++ on Windows</li></ul>
<ul><li>1>------ Build started: Project: elevatorProject, Configuration: Release Win32 ------</li></ul>
<li>1>elevatorProject.obj : error LNK2001: unresolved external symbol __imp__get_driver_instance</li>
<li>1>elevatorProject.obj : error LNK2001: unresolved external symbol "__declspec(dllimport) public: class std::basic_string<char,struct std::char_traits<char>,class std::allocator<char> > const & __thiscall sql::SQLString::asStdString(void)const " (__imp_?asStdString@SQLString@sql@@QBEABV?$basic_string@DU?$char_traits@D@std@@V?$allocator@D@2@@std@@XZ)</li>
<li>1>elevatorProject.obj : error LNK2001: unresolved external symbol "__declspec(dllimport) public: __thiscall sql::SQLString::SQLString(char const * const)" (__imp_??0SQLString@sql@@QAE@QBD@Z)</li>
<li>1>elevatorProject.obj : error LNK2001: unresolved external symbol "__declspec(dllimport) public: __thiscall sql::SQLString::~SQLString(void)" (__imp_??1SQLString@sql@@QAE@XZ)</li>
<li>1>G:\Visual Studio 2013\Projects\elevatorProject\Release\elevatorProject.exe : fatal error LNK1120: 4 unresolved externals</li>
<li>========== Build: 0 succeeded, 1 failed, 0 up-to-date, 0 skipped ==========</li></ul>

<p><strong>Thursday, June 14, 2018</strong></p>
<ul><li>Error is persisting through other versions of Visual Studios</li></ul>
<ul><li>Error most likely has a linker issue</li></ul>
<ul><li>Revisit with old libraries (TBD)</li></ul></ul>


<h1>Week of June 18, 2018</h1>
<p><strong>Monday, June 18, 2018</strong></p>
<ul><li>Revisited last years materials to implement databases and authenticated users</li></ul>
<ul><li>Databases created with username, password, and email fields attached to a field number</li></ul></ul>

<p><strong>Wednesday, June 20, 2018</strong></p>
<ul><li>Javascript Animation for pseudo elevator members page</li></ul>
<ul><li><u>https://www.w3schools.com/js/js_htmldom_animate.asp</u> </li></ul>
<li>Temp file emailed to myself to work on at work</li></ul>

<p><strong>Friday, June 29, 2018</strong></p>
<ul><li>Animation with javascript partially completed.</li></ul>
<ul><li>Need to understand functions in javascript better</li></ul>
<ul><li>Elem.style.top vs elem.style.bottom</li></ul>
<li>Clearinterval vs. setinterval</li>
<li>From top floor to second floor, stuck in loop</li>
<li>Else, everything else works except when a button is spammed.</li></ul>


<h1>Week of June 25, 2018</h1>
<p><strong>Tuesday, June 26, 2018</strong></p>
<ul><li>Changed set values in php.ini file to allow a larger file size cap</li></ul>
<ul><li>Have not tested to see if it works yet</li></ul></ul>

<p><strong>Wednesday, June 27, 2018</strong></p>
<li>Installed XAMPP and mySQL on Ubuntu machine next to mine (machine 10)</li>
<li>None of the default passwords are working to get into mySQL databases.</li>
<ul><li>ese, mysql, admin, root</li></ul>
<li>Whelp, this doesn’t work.</li>
<li>Downloaded an older version of Connector C++</li>
<li>Test code from Mike Galle now works… partially.</li>
<li>Breaks when reading database name</li></ul>


<h1>Week of July 2, 2018</h1>
<p><strong>Wednesday, July 4, 2018</strong></p>
<ul><li>Tried linking the libraries to a newer version of Visual Studio’s (2017)</li></ul>
<ul><li>Libraries to old. Does not accept</li></ul>
<li>According to forums and help pages, connector libraries currently work for VS2015 which lab computers don’t have</li></ul>

<p><strong>Friday, July 6, 2018</strong></p>
<ul><li>Mike Galle suggests to copy an image of the PI to VMWare</li></ul>
<ul><li>https://www.raspberrypi.org/documentation/installation/installing-images/README.md</li></ul>
<li><u>https://www.raspberrypi.org/documentation/hardware/raspberrypi/bootmodes/msd.md</u> </li></ul>


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
     $my_save_dir = 'uploadM/';
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

	$folder = "uploadM/";
	if(is_dir($folder)){
		//if($open = opendir($folder))
			$imgarr = scandir($folder);
			foreach($imgarr as &$file)
			{
				if($file == '.' || $file == '..') continue;
				echo ' <img src ="uploadM/'.$file.'">';
				//echo $file;
			}
			//closedir($open);
	}
?>
