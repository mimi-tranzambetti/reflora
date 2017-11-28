<!--log out link: <a href="logout.php" target="blank">Log Out</a>-->

<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Reflora Logout</title>
</head>

<?php
session_start();
$_SESSION["loggedin"]="no";
unset($_SESSION["username"]);
?>

<body>
<div class="container" class="smallcontainer">
<div id="logout">Logged out<hr><a href="index.php">Back to drawing!</a></div>
</div>
</body>

</html>