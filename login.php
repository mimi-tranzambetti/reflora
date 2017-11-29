<?php
session_start();
if( $_SESSION["loggedin"] == "admin"){
    header('Location: admin/admin_home.php');
    exit();
} else if ( $_SESSION["loggedin"] == "yes"){
    header('Location: index.php');
    exit();
}
?>

<html>

<head>
    <title>Reflora Login</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">

    <link rel="shortcut icon" href="img/favicon.png">

</head>

<body>


<!--<a><img class='corner-logo' src="./img/logo.png"/></a>-->

<div class="login">


    <img class="logo" src="./img/logo.png"/><br><br>
<form action="password.php" method="post">
    Username: <input type="text" name="username" placeholder="Username"><br>
    Password: <input type="password" name="password" placeholder="Password"><br><br>

    <?php

    if ($_SESSION['error']=="yes"){
        echo '<br><div class="redtext">Incorrect login, please try again.</div>';
    }
    ?>
    <br>
    <input type="submit" class="button" value="Log in">

</form>
    <br><br><br><br>
    <p>
    Don't have an account? <a href="newuser.php">Sign up.</a>
        <br>
    <a href="recovery.php">Forgot password?</a>
    </p>

</div>


</body>
</html>