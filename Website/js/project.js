/*JS for Project Webpages
 * Updated: May 31st, 2018
 * 
*/
function topFunction(){
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}
			
//Functions for side menu 
function openNav() {
   	document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}

