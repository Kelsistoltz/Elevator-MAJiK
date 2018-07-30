<?php
session_start();
if (empty($_SESSION)){
	echo "You must <a href='../main_html/login.html'>log in</a> to access this page";
	exit();
}
$username = $_SESSION['username'];
$db = new PDO('mysql:host=142.156.193.61;dbname=test', $username, 'MAJiK');

	//$rows = $db->query('SELECT DateandTime FROM data ORDER BY DateandTime ASC');
	//echo $rows;
/* 	foreach ($rows as $row){
		for($i=0; $i < sizeof($row)/2; $i++){
			echo " | " . $row[$i] ;
		}
		echo "<br />";
	} */
?>
<!DOCTYPE html>
<html>
<style>
#container {
	display: inline-block;
  width: 250px;
  height: 400px;
  position: relative;
  background: url(../images/elevatorBack.png);
  background-size: 100%;
}
#animate{

}
#event_logging_textarea{
	width: 600px;
	height: 400px;
	resize: none;
}
div.absolute {
  width: 100px;
  height: 50px;
  position: absolute;
  background-color: white;
  background:url(../images/elevator.jpg);
  background-size: 50%;
  margin-left: 35%	/* to push the animation box over 35% of the container */
  

}
button {
	padding: 10px;
    display:block;
    margin: left;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>MAJiK - Project VI</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
	<body>
	<nav class="white" role="navigation">
        <div class="nav-wrapper container">
		    <a id="logo-container" href="#" class="brand-logo" ><img class="mylogo" src="../images/themajiklogo.png"></a>
		    <ul class="right hide-on-med-and-down">
			    <li><a href="#">Home</a></li>
				<li><a href="#">Logbooks</a></li>
				<li><a href="logout.php">Log Out</a></li>
		    </ul>

		    <ul id="nav-mobile" class="sidenav">
				<li><a href="#">Home</a></li>
				<li><a href="#">Logbooks</a></li>
				<li><a href="#">Log Out</a></li>
		    </ul>
		    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

	<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
		<div class="col s12 center">
			<div id ="container">
				<div id ="animate" class="absolute"></div>
				<div class="row center">
					<p>
					<button id="dsButton" name="btnfun1" onclick="requestfloor3()">Floor 3</button>
					<button id="dsButton1" name="btnfun2" onclick="requestfloor2() ">Floor 2</button>
					<button id="dsButton2" onclick="requestfloor1()">Floor 1</button>
					<button id="dsStop" onclick="mStop()">Emergency Stop</button>
					</p>
				</div>
			</div>
		</div>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="../images/1511.jpg" alt="Unsplashed background img 1"></div>
  </div>
  
	<div class="col s12 center">
		<h1 id='floor'></h1>
		<p><b>Logs:</b></p>
		<textarea id="event_logging_textarea" readonly></textarea>
	</div>
	

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Wow, so cool.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="../images/aditya-chinchure-314182-unsplash.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">______________</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="../images/aditya-chinchure-314182-unsplash.jpg" alt="Unsplashed background img 3"></div>
  </div>
	<script>
var pos = 0;	// change to variable fetched from database table
var bottomFloor = 350;
var secondFloor = 175;
var thirdFloor = 0;
var elem = document.getElementById("animate");
var txtarea = document.getElementById("event_logging_textarea");
window.setInterval(update_txtarea, 1000);
window.setInterval(update_elevatorstatus, 1000);
/* call a php script to read the sql log table and update the textarea*/
function update_txtarea(){
	var xmlhttpShow = new XMLHttpRequest;
	xmlhttpShow.onreadystatechange = function(){
		if (this.responseText != ''){
			txtarea.value = ("\n" + this.responseText);
			txtarea.scrollTop = txtarea.scrollHeight;
		}
	}
	xmlhttpShow.open("GET","../php/update_txtarea.php", true);
	xmlhttpShow.send();
}

function update_elevatorstatus(){
	var xmlhttpShow = new XMLHttpRequest;
	xmlhttpShow.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200) {
			var status = this.responseText; 
			if(status == '1'){
				document.getElementById("floor").innerHTML = '';
				floor1();
			}
			else if(status == '2'){
				document.getElementById("floor").innerHTML = '';
				floor2();
			}
			else if(status == '3'){			
				document.getElementById("floor").innerHTML = '';
				floor3();
			}
			else
				document.getElementById("floor").innerHTML = "Invalid Status - " + status;
		}
	}
	xmlhttpShow.open("GET","../php/elevator_status.php?q=", true);
	xmlhttpShow.send();
}
/* Disable and Enable Buttons for the purpose of getting rid of double-clicks */
function dsButton(){
	document.getElementById("dsButton").disabled = true;
	document.getElementById("dsButton1").disabled = true;
	document.getElementById("dsButton2").disabled = true;
}
function enButton(){
	document.getElementById("dsButton").disabled = false;
	document.getElementById("dsButton1").disabled = false;
	document.getElementById("dsButton2").disabled = false;
}
function floor3() {
    var id = setInterval(frame, 5);
    function frame() {
		if (pos == thirdFloor) {
		  //document.getElementById("myText").innerHTML = "THIRD FLOOR"
		    clearInterval(id);
		    enButton();
		} else {
		    pos--;
		    elem.style.top = pos + 'px';
		    dsButton();
		}
    }
}
function mStop(){
	var xmlhttpShow = new XMLHttpRequest();
  xmlhttpShow.open("GET", "../php/elevatorStop.php", true);
  xmlhttpShow.send();
}
function floor2(){
	var id = setInterval(frame, 5);
	function frame() {
		if (pos == secondFloor) {
		    //document.getElementById("myText").innerHTML = "SECOND FLOOR"
		    clearInterval(id);
		    enButton();
		} else if(pos != bottomFloor) {
		    pos++;
		    elem.style.top = pos + 'px';
		    //document.getElementById("myText").innerHTML = "stuck?";
		    dsButton();
		}else if(pos != thirdFloor){
			while (pos != secondFloor){
				pos--;
				elem.style.top = pos + 'px';
				elem.style.bottom = pos + 'px';
				//document.getElementById("myText").innerHTML = pos;
				dsButton();
			}
		}
	}
}
function floor1() {
	var id = setInterval(frame, 5);
    function frame() {
		if (pos == bottomFloor) {
		  //document.getElementById("myText").innerHTML = "FIRST FLOOR"
		    clearInterval(id);
		    enButton();
		} else {
		    pos++;
		    elem.style.top = pos + 'px';
		    elem.style.bottom = pos + 'px';
		    dsButton();		
		}
    }
}

function requestfloor1(){
	if (pos != bottomFloor) {
		var xmlhttpShow = new XMLHttpRequest();
		xmlhttpShow.open("GET", "../php/elevatorFloor1.php", true);
		xmlhttpShow.send();	
	}
}

function requestfloor2(){
	if (pos != secondFloor) {
		var xmlhttpShow = new XMLHttpRequest();
		xmlhttpShow.open("GET", "../php/elevatorFloor2.php", true);
		xmlhttpShow.send();	
	}
}

function requestfloor3(){
	if (pos != thirdFloor) {
		var xmlhttpShow = new XMLHttpRequest();
		xmlhttpShow.open("GET", "../php/elevatorFloor3.php", true);
		xmlhttpShow.send();	
	}
}
	</script>
	<!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
	</body>
</html>
