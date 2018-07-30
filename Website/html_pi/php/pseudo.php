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
    <title>Parallax Template - Materialize</title>

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
	<div class="col s12 center">
		<div id ="container">
			<div id ="animate" class="absolute"></div>
			<div class="row center">
				<p>
				<button id="dsButton" name="btnfun1" onclick="floor3()">Floor 3</button>
				<button id="dsButton1" name="btnfun2" onclick="floor2() ">Floor 2</button>
				<button id="dsButton2" onclick="floor1()">Floor 1</button>
				<button id="dsStop" onclick="mStop()">Emergency Stop</button>
				</p>
			</div>
		</div>
		<h1 id='floor'></h1>
		<p><b>Logs:</b></p>
		<textarea id="event_logging_textarea" readonly></textarea>
	</div>
	<script>
var pos = 0;	// change to variable fetched from database table
var bottomFloor = 350;
var secondFloor = 175;
var thirdFloor = 0;
var elem = document.getElementById("animate");
var txtarea = document.getElementById("event_logging_textarea");

window.setInterval(update_txtarea, 1000);
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
 	var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				var resp = this.responseText;   // Text string returned from server in 'echo' statement
				document.getElementById('floor').innerHTML = resp;
			}
    };
	xmlhttpShow.open("GET", "../php/elevatorFloor3.php", true);
	xmlhttpShow.send();

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
	var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
		    var resp = this.responseText;   // Text string returned from server in 'echo' statement
		    document.getElementById('floor').innerHTML = resp;
		}
	};
    xmlhttpShow.open("GET", "../php/elevatorFloor2.php", true);
    xmlhttpShow.send();
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
	var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
		    var resp = this.responseText;   // Text string returned from server in 'echo' statement
		    document.getElementById('floor').innerHTML = resp;
		}
    };
    xmlhttpShow.open("GET", "../php/elevatorFloor1.php", true);
    xmlhttpShow.send();
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
	</script>
	<!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
	</body>
</html>
