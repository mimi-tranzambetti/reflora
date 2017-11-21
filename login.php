<html>

<head>
    <title>Reflora Login</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">

</head>

<body>
<div class="container" class="smallcontainer">
<div id="login">
    <h1>Login</h1>
<form action="index.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <?php
    if ($_SESSION['error']=="yes"){
        echo '<br><div class="redtext">Incorrect login, please try again.</div>';
    }

    ?>
    <input type="submit" class="button" value="Submit">

</form>
    <p>Don't have an account? <a href="newuser.php">Create a new one here.</a></p>
</div>

</div>

</body>
</html>