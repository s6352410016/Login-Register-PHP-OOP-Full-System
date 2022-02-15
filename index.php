<?php 
    session_start();

    if($_SESSION['username'] == ""){
        header("location: login.php");
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['fname']);
        unset($_SESSION['lname']);
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>
    <div class="content">
        <h2>Welcome to <?php echo $_SESSION['fname'] ," ", $_SESSION['lname']; ?></h2>
        <a href="index.php?logout='1'">logout</a>
    </div>
</body>
</html>