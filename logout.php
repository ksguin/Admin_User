<?php
	session_start();
	if(session_destroy())
	{
		 echo "<script> window.location.href = 'admin_login_page.php'; </script>";
	}
?>