var today = new Date();
var year = today.getFullYear();
var birthK = new Date('February 29, 1996 04:20:00');
var birthA = new Date('June 12, 1997 04:20:00');
var birthJ = new Date('November 21, 1997 04:20:00');
var birthM = new Date('March 5, 1995 04:20:00');

var ageK = today.getTime() - birthK.getTime();
var ageA = today.getTime() - birthA.getTime();
var ageJ = today.getTime() - birthJ.getTime();
var ageM = today.getTime() - birthM.getTime();
var ageleap = today.getTime() - birthK.getTime();

ageK = Math.floor(ageK / 31556900000);
ageA = Math.floor(ageA / 31556900000);
ageJ = Math.floor(ageJ / 31556900000);
ageM = Math.floor(ageM / 31556900000);
ageleap = (ageK / 4);

msgK = '<p>Kelsi is ' + ageK + ' years old and ' + ageleap + ' years old. </p>';
msgA = '<p>Aaron is ' + ageA + ' years old. </p>';
msgJ = '<p>Josh is ' + ageJ + ' years old. </p>';
msgM = '<p>Mike is ' + ageM + ' years old. </p>';

var elemtK = document.getElementById('infoK');
elemtK.innerHTML = msgK;
var elemtA = document.getElementById('infoA');
elemtA.innerHTML = msgA;
var elemtJ = document.getElementById('infoJ');
elemtJ.innerHTML = msgJ;
var elemtM = document.getElementById('infoM');
elemtM.innerHTML = msgM;

var ft = document.getElementById('foot');
ft.innerHTML = '<p> &copy ' + year + '</p>';
