<?php
	session_start();
	if(isset($_SESSION['user_id'])) {
		header("location:admin_dashboard.php");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
		function hover(element) {
			element.setAttribute('src', 'homepage_for_login.png');
		}
		function unhover(element) {
			element.setAttribute('src', 'login.png');
		}
	</script>
	<title>Administrator Login</title>
	<link rel="stylesheet" type="text/css" href="stylesheet_admin_login.css">
</head>
<body bgcolor="#000000">
	<center>
	<div class="login_form" style="overflow: all;">
		<!-- <form name="login" method="post" onsubmit="validate()"> -->
			<br>
			<table align="center" bgcolor="#212121">
				<tr><th>
					<a href = "home.php"><img id="imgBox" src="login.png" alt="Navigate back to Homepage" onmouseover="hover(this)" onmouseout="unhover(this)"></a>
				</th></tr>
				<form name = "login" method="post" action="admin_portal.php">
				<tr><th>
					<input type="text" class="entry-fields" id="admin_name" name="admin_name" placeholder="Type Username Here" size="50%" required>
				</th></tr>
				<tr><th>
					<input type="password" class="entry-fields" id="admin_password" name="admin_password" placeholder="Type Password Here" size="50%" >
				</th></tr>
				<tr><th>
					<center><input type="submit" class="login" id="login" value="Login" name ="submit" required></center>
				</th></form></tr>
			</table>
			<br>
	</div>
	</center>
</body>
</html>