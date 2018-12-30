<?php
	session_start();
	include('config.php');
	//Getting the local variables ready
	$Enrollment = $_POST['Enrollment'];
	$Name = $_POST['Name'];
	$username = $_POST['username'];
	//$password = $_POST['password'];
	//$repassword = $_POST['repassword'];
	$Email = $_POST['Email'];
	//$DOB = $_POST['DOB'];

	//Password length checking
	/*if(strlen(trim($password)) < 8 || strlen(trim($password)) > 16){
		echo "<script>alert('Passwords must be at least 8 and at most 16 characters long.');</script>";
		//Go back to the same page immediately
		echo "<script>
				setTimeout(function(){
					window.history.go(-1);
				},0);          
     	</script>";
		exit();
	}
	//Passwords equality checking
	else if($password != $repassword)
	{
		echo "<script> alert('Passwords do not match!'); setTimeout(function(){	window.history.go(-1);	}, 100); </script>";
		exit();
	}
	// if these conditions are satisfied then other operations can continue.

	//Change date format from DD-MM-YYYY to YYYY-MM-DD.
	$DOB = date('Y-m-d', strtotime($DOB));
	
	//create connection
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "cst_dept_info";
	$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
	*/
	//Check connection
	if(!$db){
		die("Connection failed: ".mysqli_connect_error());
	}

	//The SQL Query
	$enroll_check = "SELECT Enrollment from student_enrollments where Enrollment = '".$Enrollment."'";
	$rs = mysqli_query($db,$enroll_check);
	$numRows = mysqli_num_rows($rs);

	$sql1 = "INSERT into registration(Enrollment, Name, Username, Email) VALUES ('$Enrollment', '$Name', '$username', '$Email')";
	$sql2 = "INSERT into existing_usernames(Username) VALUES ('$username')";

	//Code here
	//If the administrator has given permission to an enrollment number then run the following code.
	if($numRows == 1) {
		if($_SESSION['flag'] == 1) {
		if( (mysqli_query($db,$sql1)) && (mysqli_query($db,$sql2)) ) {
			echo "Registered Successfully.";
		}
		else {
			echo "Error<br>".mysqli_error($db);
		}
		} else {
			echo "Username already exists. Told you!<br>";
		}
	}
	else {
		echo "You are not authorized to sign up yet. <br>Contact your administrator for details.";
	}

	echo "<br>Please wait... You will be redirected to the Sign Up page within 3 seconds.";
	echo "<script> setTimeout(function() {window.location.href = 'home.php';}, 3000); </script>";
	//close the connection
	mysqli_close($db);
?>