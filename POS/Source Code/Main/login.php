<?php
require_once 'db/config_session.inc.php';
require_once 'db/login_view.inc.php';
require_once 'db/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/tab-logo.png">
    <title>Holiday Cafe | Log-in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
    <div class="container">
        <div class="form-message">
            <img src="images/logo.png" alt="logo">
        </div>
        <div class="white-layer">    
            <div class="form-container">
                <h1>Log-in</h1>
                <form action="db/login.inc.php" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Log-in">
                    <p>Don't have an account? <a href="signup.php">Sign-up</a></p>
                    <?php
                    check_login_errors();
                    ?>
                    <?php
                    check_signup_errors();
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 