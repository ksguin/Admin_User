<?php 
    include('config.php');
    if(isset($_POST["username"]))
        {
            if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
                die();
        }
        
        if (!$db) {
            die('Could not connect to database!'. mysqli_connect_error());
        }
    
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
        $statement = $db->prepare("SELECT Username FROM existing_usernames WHERE Username=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $statement->bind_result($username);

        session_start();

        if($statement->fetch()){
            $_SESSION['flag'] = false;
            die('<img src="not-available.png" />');
        }else {
            $_SESSION['flag'] = true;
            die('<img src="available.png" />');
        }
    }
?>