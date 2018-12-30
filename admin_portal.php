<?php

	if(isset($_POST['submit']))
	{
		if(isset($_POST['admin_name']))
		{
			$user = trim($_POST['admin_name']);
			$pass = trim($_POST['admin_password']);

			$host = 'localhost';
			$DBuser = 'root';
			$DBpass = '';
			$DBname = 'cst_dept_info';

			$conn = mysqli_connect($host, $DBuser, $DBpass, $DBname);
			if(!$conn)
			{
			die("Cannot connect : ".mysqli_error());
			}

			session_start();
			
			$sql_fetch = "select * from administrator where username = '".$user."'";
			$rs = mysqli_query($conn,$sql_fetch);
			$numRows = mysqli_num_rows($rs);

			if($numRows == 1)
			{
				$row = mysqli_fetch_assoc($rs);
				if(password_verify($pass,password_hash($row['password'], PASSWORD_DEFAULT)))
				{
					if(!isset($_SESSION['user_id'])) {
					$_SESSION['user_id'] = $row['username'];
					echo "<script>alert('Login Successful!');
						window.location.href = 'admin_dashboard.php';
					</script>";
					exit;
					}
					else {
						echo "<script> alert('Already logged In! Please Logout to Login as a different user.'); 
							window.location.href = 'admin_dashboard.php';
						</script>";
						exit;
						}
				}
				else
				{
					echo "<script> alert('Wrong Credentials'); window.history.go(-1); </script>";
				}
			}
			else {
				echo "<script> alert('Unauthorized access attempt!!!'); window.history.go(-1); </script>";
				}
		}
	}
	else
	{
		echo "Fatal Error.";
		header("location: admin_login_page.php");
	}
?>