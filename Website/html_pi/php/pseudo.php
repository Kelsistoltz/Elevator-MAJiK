<!DOCTYPE html>
<html>
<style>
#container {
  width: 250px;
  height: 400px;
  position: relative;
  background: url(../images/simone-hutsch-384859-unsplash.jpg);
  background-size: 100%;
}
div.absolute {
  width: 100px;
  height: 50px;
  position: absolute;
  background-color: white;
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
<div id ="animate" class="absolute">Testing</div>
<p>

<button id="dsButton" onclick="floor3()">Floor 3</button>
<button id="dsButton1" onclick="floor2()">Floor 2</button>
<button id="dsButton2" onclick="floor1()">Floor 1</button>

</p> 
</div>


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

function floor2(){
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
</body>
</html>


