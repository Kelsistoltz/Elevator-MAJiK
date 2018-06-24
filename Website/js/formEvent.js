// formEvent example
var elForm; 											   // Form element
var firstNameFeedback, lastNameFeedback, feedback, feedbackk;    // Get feedback elements
var firstNameInput, lastNameInput, elUsername, elPassword;  	  	   // Get input elements

elForm = document.getElementById('reqAccess');
firstNameFeedback = document.getElementById('firstNameFeedback'); 
lastNameFeedback = document.getElementById('lastNameFeedback'); 
elMsg = document.getElementById('feedback');
elMsg1 = document.getElementById('feedbackk');

firstNameInput = document.getElementById('fname'); 
lastNameInput = document.getElementById('lname'); 
elUsername = document.getElementById('username');
elPassword = document.getElementById('pass');


function checkFirstName(event) {
	if (firstNameInput.value.length < 1) {
		firstNameFeedback.innerHTML = 'You must enter your first name';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		firstNameFeedback.innerHTML = '';		// Clear any error messages
	}
}
function checkLastName(event) {
	if (lastNameInput.value.length < 1) {
		lastNameFeedback.innerHTML = 'You must enter your last name';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		lastNameFeedback.innerHTML = '';
	}
}

function checkUsername(event){
	if(elUsername.value.length < 1){
		elMsg.innerHTML = 'You must enter a username.';
		event.preventDefault();
	} else {
		elMsg.innerHTML = '';
	}
}

function checkPassword(event){
	if(elPassword.value.length < 1){
		elMsg1.innerHTML = 'You must enter a password.';
		event.preventDefault();
	} else{
		elMsg1.innerHTML = '';
	}
}

// Create event listeners 
elForm.addEventListener('submit', function(event) {checkFirstName(event); checkLastName(event); checkUsername(event); checkPassword(event);}, false); 