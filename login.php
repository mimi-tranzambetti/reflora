<html>

<head>
    <title>Reflora Login</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/navigation.css">
    <link rel="stylesheet" type="text/css" href="./css/user.css">

    <link rel="shortcut icon" href="img/favicon.png">

</head>

<body>


<!--<a><img class='corner-logo' src="./img/logo.png"/></a>-->

<div id="login">

    <h1>Login</h1>

<form action="password.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <?php
    if ($_SESSION['error']=="yes"){
        echo '<br><div class="redtext">Incorrect login, please try again.</div>';
    }
    ?>
    <input type="submit" class="button" value="Submit">

</form>
    <p>
        Don't have an account? <a href="newuser.php">Sign up.</a>
    <br><a href="recovery.php">Forgot password?</a>
    </p>
</div>


</body>
</html>