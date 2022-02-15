<?php  
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <form action="register_action.php" method="POST">
        <h2>Register</h2>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>    

        <div class="input-group">
            <label for="fname">Firstname</label><br>
            <input type="text" name="fname">
        </div>
        <div class="input-group">
            <label for="lname">Lastname</label><br>
            <input type="text" name="lname">
        </div>
        <div class="input-group">
            <label for="username">Username</label><br>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label><br>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <label for="ConfirmPassword">Confirm Password</label><br>
            <input type="password" name="ConfirmPassword">
        </div>
        <div class="input-group">
            <button type="submit" name="register">Register</button> <a href="login.php">Login</a>
        </div>
    </form>
</body>
</html>