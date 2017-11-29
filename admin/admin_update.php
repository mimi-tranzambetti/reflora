<?php
session_start();

if($_SESSION["loggedin"] != admin) {
    exit();
}

if(empty($_REQUEST['user_id'])) {
    echo "Please go through the <a href='admin_accounts.php'> accounts </a> page.";
    exit();
}

$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

$sql = "UPDATE users SET " .
    "username ='".
    $_REQUEST["username"]. "', " .
    "password ='" .
    $_REQUEST["password"] ."', " .
    "email='" .
    $_REQUEST["email"] ."', " .
    "clearance='" .
    $_REQUEST["clearance"] ."', " .
    "date_join='" .
    $_REQUEST["date_join"] . "'" .
    " WHERE user_id ='" . $_REQUEST["user_id"] . "'";

//echo $sql . "<br>";

$results = $mysql->query($sql);
if (!$results) {
    echo "<br> NOPE";
    echo $mysql->error;
    exit();
}
?>
<link rel="shortcut icon" href="../img/favicon.png">
<link rel="stylesheet" type="text/css" href="../css/main.css">

<div class="container">
    <h1>Account has been updated</h1>
    <br>
<a href="admin_accounts.php" target=""> RETURN TO ACCOUNTS </a>
</div>