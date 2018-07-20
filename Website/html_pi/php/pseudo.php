<?php
session_start();
$db = new PDO('mysql:host=142.156.193.61;dbname=test', 'Mike', 'MAJiK');
	// SELECT current floor to display.
/* 	$rows = $db->query('SELECT * FROM data ORDER by nodeID = 2');
	foreach ($rows as $row){
		for($i=0; $i<sizeof($row)/2; $i++){
			echo " | " . $row[$i]. "<br>";
		}
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
<html>


	<body>
		<div id ="container">
			<div id ="animate" class="absolute"></div>
				<p>
				<button id="dsButton" name="btnfun1" onclick="floor3()">Floor 3</button>
				<button id="dsButton1" name="btnfun2" onclick="floor2() ">Floor 2</button>
				<button id="dsButton2" onclick="floor1()">Floor 1</button>

				<button id="STOP" name="btnfun2" onclick="mStop() ">EMERGENCY STOP</button>
				</p> 
		</div>
		<h1 id='floor'></h1>  

	<script>
var pos = 0;	// change to variable fetched from database table
var bottomFloor = 350;
var secondFloor = 175;
var thirdFloor = 0;
var elem = document.getElementById("animate");

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
		  //elem.style.bottom = pos + 'px'; 
		  dsButton();
		  
		}
    }
}

/* function mStop(){
	var xmlhttpShow = new XMLHttpRequest();
    xmlhttpShow.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			var resp = this.responseText;   // Text string returned from server in 'echo' statement
			document.getElementById('floor').innerHTML = resp;
		}
    };
    xmlhttpShow.open("GET", "../php/elevatorStop.php", true);
    xmlhttpShow.send();
} */

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
		    //elem.style.bottom = pos + 'px';
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
		<p>Click <a href="logout.php"> here </a> to be logged out.
	</body>
</html>


