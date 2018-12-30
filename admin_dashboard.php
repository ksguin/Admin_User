<?php
		include('session.php');
		//page refreshing code
		header("refresh: 120;");
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		window.onclick = function(event) {
			if ( event.target == document.getElementById('myModal') ) {
				document.getElementById('myModal').style.display = 'none';
			}
		}
	</script>
	<link rel="stylesheet" type="text/css" href="stylesheet_admin_dashboard.css?v=<?php echo time(); ?>" />
	<title><?php echo $currently_logged; ?>, Welcome</title>
</head>
<body background="admin_dashboard_background.jpg">
	<div class="topnav">
		<nav>
			<a href= "home.php" class = "active" ><span class="image" ><img src="homepage.png" height="45px" alt="Go to Homepage"></span></a>
			<a>hi, <?php echo $currently_logged;?></a>
			<a href= "logout.php" class="logout" >logout</a>
		</nav>
	</div>
	<br>
	<center>
	<div class="dashboard_content">
	<!--Trigger to open the Modal-->
		<input type="button" value="Enter Enrollment" id="push" onclick="document.getElementById('myModal').style.display = 'block';" />
		<!--The Modal-->
		<div id="myModal" class="modal">
			<!--Modal content-->
			<div class="modal-content">
				<div class= "modal-header">
					<p><img src="enter.png" id="enter_img"><span class="close" onclick="document.getElementById('myModal').style.display = 'none';">&times;</span></p>
				</div>
				<br>
				<div class="modal-body">
					<form class="insert" method="POST" action="add_student_enroll.php">
						<input type="text" name="Enrollment" placeholder="type enrollment here" id="Enrollment" required />
						<input type="submit" name="submit" value="go" id="submit" required/>
					</form>
				</div>
			</div>
		</div>
	</div>
	</center>
</body>
</html>