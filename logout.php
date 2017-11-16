<!--log out link: <a href="logout.php" target="blank">Log Out</a>-->

<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Reflora Logout</title>
</head>

<?php
session_start();
unset($_SESSION["loggedin"]);
?>

<body>
<div class="container" class="smallcontainer">
<div id="logout">Logged out<hr><a href="login.php">Log in</a></div>
</div>
</body>

</html>