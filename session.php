<?php
//This makes room for only one login at a time not more.
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['user_id'];
   
   $ses_sql = mysqli_query($db,"select username from administrator where username = '$user_check' ");
   //straight-forward fetches the row which contains the query.
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $currently_logged = $row['username'];
   
   if(!isset($_SESSION['user_id'])){
      header("location:admin_login_page.php");
   }
?>