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
unset($_SESSION["error"]);
unset($_SESSION["newaccount"]);
unset($_SESSION["inforeset"]);
unset($_SESSION["new-settings"]);
include "index.php";
?>
<!---->
<!--<body>-->
<!--<div class="container">-->
<!--<div id="logout">Bye! We hope to see you again.<br>-->
<!---->
<!--    <a href="index.php">Back to drawing!</a> or <a href="login.php">Log in</a></div>-->
<!--</div>-->
<!--</body>-->

</html>