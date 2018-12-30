//var attempt = 3;
function validate() {

	var username= document.getElementById('admin_name').value.trim();
	var password= document.getElementById('admin_password').value.trim();
	if(username == "root" && password == "") {
		alert("Login Successful!");
		window.location ="http://localhost/admin-user/admin_portal.php/";	//Redirecting to other page.
		return false;
	}
	else {
		//attempt--;
		alert("Incorrect username or password!");
		//After that disable the buttons.
		/*if(attempt==0){
			alert("Too many invalid attempts...disabling your login.")
			document.getElementById('admin_name').disabled = true;
			document.getElementById('admin_password').disabled = true;
			document.getElementById('login').disabled = true;
		}*/
			return false;
	}
}