<?php

	include('config.php');

	$Enrollment = $_POST['Enrollment'];

	if(!$db) {
		die("Connection failed: ".mysqli_connect_error());
	}

	//The SQL query
	$sqlq = "INSERT into student_enrollments (Enrollment) VALUES ('$Enrollment')";

	if(mysqli_query($db,$sqlq)) {
		echo "Done!";
		echo "<script>
				setTimeout(function(){
					window.location.href = 'admin_dashboard.php';
				},500);          
     </script>";
	}
	else {
		echo "Error<br>".mysqli_error($db);
	}

	//Close the connection
	mysqli_close($db);
?>