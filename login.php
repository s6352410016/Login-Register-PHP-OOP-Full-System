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
    <title>Login</title>
</head>
<body>
    <form action="login_action.php" method="POST" style="height:350px">
        <h2>Login</h2>

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

        <?php if(isset($_SESSION['success'])): ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>    

        <div class="input-group">
            <label for="username">Username</label><br>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label><br>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login">Login</button> <a href="register.php">Register</a>
        </div>
    </form>
</body>
</html>