
// formEvent example
var elForm; 											   // Form element
var firstNameFeedback, lastNameFeedback, termsFeedback;    // Get feedback elements
var firstNameInput, lastNameInput, termsInput;  	  	   // Get input elements

elForm = document.getElementById('reqAccess');
firstNameFeedback = document.getElementById('firstNameFeedback'); 
lastNameFeedback = document.getElementById('lastNameFeedback'); 
termsFeedback = document.getElementById('termsFeedback'); 
firstNameInput = document.getElementById('fname'); 
lastNameInput = document.getElementById('lname'); 
termsInput = document.getElementById('terms'); 

function checkFirstName(event) {
	if (firstNameInput.value.length < 1) {
		firstNameFeedback.innerHTML = '<----You must enter your first name';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		firstNameFeedback.innerHTML = '';		// Clear any error messages
	}
}
function checkLastName(event) {
	if (lastNameInput.value.length < 1) {
		lastNameFeedback.innerHTML = '<----You must enter your last name';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		lastNameFeedback.innerHTML = '';
	}
}
function checkTerms(event) {
	if (!termsInput.checked) {
		termsFeedback.innerHTML = '<------------------------You must agree to the terms';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		lastNameFeedback.innerHTML = '';
	}
}
// Create event listeners 
elForm.addEventListener('submit', function(event) {checkFirstName(event); checkLastName(event); checkTerms(event);}, false); 