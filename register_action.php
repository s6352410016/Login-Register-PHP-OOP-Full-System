<?php

    session_start();
    include("server.php");
    $server = new server();

    if(isset($_POST['register'])){
        if(empty($_POST['fname'])){
            $_SESSION['error'] = "Firstname is required.";
            header("location: register.php");
        }else if(empty($_POST['lname'])){
            $_SESSION['error'] = "Lastname is required.";
            header("location: register.php");
        }else if(empty($_POST['username'])){
            $_SESSION['error'] = "Username is required.";
            header("location: register.php");
        }else if(empty($_POST['password'])){
            $_SESSION['error'] = "Password is required.";
            header("location: register.php");
        }else if(empty($_POST['ConfirmPassword'])){
            $_SESSION['error'] = "Confirm password is required.";
            header("location: register.php");
        }else if($_POST['password'] != $_POST['ConfirmPassword']){
            $_SESSION['error'] = "Password do not match.";
            header("location: register.php");
        }else{
            $fname = mysqli_real_escape_string($server->dbcon , $_POST['fname']);
            $lname = mysqli_real_escape_string($server->dbcon , $_POST['lname']);
            $username = mysqli_real_escape_string($server->dbcon , $_POST['username']);
            $password = md5(mysqli_real_escape_string($server->dbcon , $_POST['password']));

            $checkdata = $server->checkUsername($username);
            $result = mysqli_num_rows($checkdata); //เช็ค Username ใน Database ว่ามีแล้วหรือยัง

            if($result > 0){
                $_SESSION['error'] = "Username already exist.";
                header("location: register.php");
            }else{
               $server->insertData($fname , $lname , $username , $password); 
               $_SESSION['fname'] = $fname;
               $_SESSION['lname'] = $lname;
               $_SESSION['success'] = "Register successfully.";
               header("location: login.php"); 
            }
        }
    }

?>