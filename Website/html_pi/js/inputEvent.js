var elForm, elUsername, elUserAlert, elPassword, elPassAlert;

elForm = document.getElementById('login');
elUsername = document.getElementById('username');
elUserAlert = document.getElementById('username_alert');
elPassword = document.getElementById('pass');
elPassAlert = document.getElementById('pass_alert');

function checkUsername(event){
	if(elUsername.value.length < 7){
		elUserAlert.innerHTML = 'Your username must be 8 or more characters';
		event.preventDefault();
	} else {
		elUserAlert.innerHTML = '';
	}
}

function checkPassword(event){
	if(elPassword.value.length < 7){
		elPassAlert.innerHTML = 'Your password must be 8 or more characters';
		event.preventDefault();
	} else{
		elPassAlert.innerHTML = '';
	}
}

elForm.addEventListener('submit', function(event) {checkUsername(event); checkPassword(event);}, false);
