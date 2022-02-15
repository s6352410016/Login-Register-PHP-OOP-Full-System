<?php
    include("server.php");
    session_start();
    $server = new server();

    if(isset($_POST['login'])){
        if(empty($_POST['username'])){
            $_SESSION['error'] = "Username is required.";
            header("location: login.php");
        }else if(empty($_POST['password'])){
            $_SESSION['error'] = "Password is required.";
            header("location: login.php");
        }else{
            $username = mysqli_real_escape_string($server->dbcon , $_POST['username']);
            $password = md5(mysqli_real_escape_string($server->dbcon , $_POST['password']));

            $checklogin = $server->loginCheck($username , $password);
            $result = mysqli_num_rows($checklogin);

            if($result > 0){
                $_SESSION['username'] = $username;
                header("location: index.php");
            }else{
                $_SESSION['error'] = "Invalid username or password.";
                header("location: login.php");
            }
        }
    }

?>