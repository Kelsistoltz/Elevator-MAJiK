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
  background-color: red;
  margin-left: 35%
  
}

<!DOCTYPE html>
<html>
<style>
#container {
  width: 400px;
  height: 400px;
  position: relative;
  background: cyan;
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
<body>
<div id ="container">
<div id ="animate" class="absolute">Testing</div>
<p>

<button onclick="floor3()">Floor 3</button>
<button onclick="floor2()">Floor 2</button>
<button onclick="floor1()">Floor 1</button>

</p> 
</div>


<script>
var pos = 0;
var bottomFloor = 350;
var secondFloor = 175;
var thirdFloor = 0;

var elem = document.getElementById("animate");

function floor3() {
  var id = setInterval(frame, 5);
  function frame() {
    if (pos == thirdFloor) {
      document.getElementById("myText").innerHTML = "THIRD FLOOR"
      clearInterval(id);
    } else {
      pos--; 
      elem.style.top = pos + 'px'; 
      //elem.style.bottom = pos + 'px'; 
    }
  }
}

function floor2(){
  var id = setInterval(frame, 5);
  function frame() {
    if (pos == secondFloor) {
      document.getElementById("myText").innerHTML = "SECOND FLOOR"
      clearInterval(id);
    } else if(pos == thirdFloor) {
      pos++; 
      //elem.style.bottom = pos + 'px';
      elem.style.top = pos + 'px';  
      document.getElementById("myText").innerHTML = "stuck?";
	  //clearInterval(id);
    }else{
      pos--; 
      elem.style.top = pos + 'px';  
      //elem.style.bottom = pos + 'px';
      document.getElementById("myText").innerHTML = pos;
    }
  } 
}

function floor1() {
  var id = setInterval(frame, 5);
  function frame() {
    if (pos == bottomFloor) {
      document.getElementById("myText").innerHTML = "FIRST FLOOR"
      clearInterval(id);
    } else {
      pos++; 
      elem.style.top = pos + 'px'; 
      elem.style.bottom = pos + 'px'; 
    }
  }
}


</script>

<h1>"the value for number is: " <span id="myText"></span></h1>

</body>
</html>


