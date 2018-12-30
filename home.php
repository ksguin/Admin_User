<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet_home.css" />
		<script type="text/javascript"> function sureCheck() { confirm('Sure? Click OK to proceed.');}</script>
		<script type="text/javascript" src="jquery-3.3.1.min.js">
			$(document).ready(function() {

    			var x_timer;
    			$("#username").keyup(function (e) {
        			clearTimeout(x_timer);
        			var user_name = $(this).val();

        			x_timer = setTimeout(function(){
	            	check_username_ajax(user_name);
        			}, 1000);
    			});

		function check_username_ajax(username){
	    	$("#user-result").html('<img src="ajax-loader.gif" />');
	    	$.post('username-checker.php', {'username':username}, function(data) {
	      	$("#user-result").html(data);
    		});
			}
		});
	</script>
	<title>Sign Up</title>
	</head>
	<body background="background.jpg">
		<div id="header">
			<h1>Sign Up</h1>
		</div>
		<center>
		<div class="table">
		<form action="add_user.php" method="post" onsubmit="return sureCheck()">
			<table id="form">
				<th class="promo">Fill to get username of your choice!</th><br>
				<tr>
					<td><br><p><span class="required">*</span> <input type="text" size="55%" height="200px" name="Name" placeholder="Type name as on College ID Here" class="entry-fields" required ></p></td>
				</tr>
				<tr>
					<td><br><p><span class="required">*</span> <input type="text" size="55%" name="Enrollment" placeholder="Type Enrollment Number Here" class="entry-fields" required></p></td>
				</tr>
				<tr>
					<td><br><p><span class="required">*</span> <input type="text" size="55%" name="Email" placeholder="Type E-mail ID Here" class="entry-fields" required></p></td>
				</tr>
				<tr>
					<td><br><p><span class="required">*</span>
						<label for="username"> <input id="username" type="text" size="45%" name="username" placeholder="Type Username of Choice Here" class="entry-fields" required > <span id="user-result"></span>
						</label></p></td>
				</tr>
				<tr><br></tr>
				<tr>
					<td><br><center><input type="submit" value="REGISTER" name="register" class="register" required"></center></td>
				</tr>
				<tr>
					<td><br><hr></td>
				</tr>				
			</table>
		</form>
		<br>
		<table id="admin-table">
			<tr>
				<td><img src="admin.png" class="admin-img"></td>
				<!--<td><input type="submit" value="ADMIN" name="admin" class="admin" align="center" ="http://www.google.co.in/" /></td>-->
				<td><a href="admin_login_page.php"><button name="admin" class="admin" align="center">ADMIN</button></a></td>
			</tr>
		</table>
		<br>
		</div>
		</center>
	</body>
	<!--<script type="text/javascript" src="jquery-3.3.1.min.js"></script>-->
	<script type="text/javascript">
			$(document).ready(function() {

    			var x_timer;
    			$("#username").keyup(function (e) {
        			clearTimeout(x_timer);
        			var user_name = $(this).val();

        			x_timer = setTimeout(function(){
	            	check_username_ajax(user_name);
        			}, 1000);
    			});

		function check_username_ajax(username){
	    	$("#user-result").html('<img src="ajax-loader.gif" />');
	    	$.post('username-checker.php', {'username':username}, function(data) {
	      	$("#user-result").html(data);
    		});
			}
		});
	</script>
</html>