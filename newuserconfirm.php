<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
<title>Reflora Welcome!</title>
</head>

<body>

<?php

session_start();

if(empty($_REQUEST['name'])) {
    $_SESSION["emptyfield"] = "yes";
    include "index.php";
    exit();

//    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
//    exit();
}
if(empty(trim($_REQUEST['name']))) {
    $_SESSION["emptyfield"] = "yes";
    include "index.php";
    exit();
//    echo "You must enter a name.<br>";
//    exit();
}
if(empty(trim($_REQUEST['password1']))) {
    $_SESSION["emptyfield"] = "yes";
    include "index.php";
    exit();
//    echo "You must enter a name.<br>";
//    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
//    exit();
}
if($_REQUEST['password1'] != $_REQUEST['password2']){
    $_SESSION["nomatch"] = "yes";
    include "index.php";
    exit();
//    echo "Passwords do not match.";
//    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
//    exit();
}
if(empty(trim($_REQUEST['email']))) {
    $_SESSION["emptyfield"] = "yes";
    include "index.php";
    exit();
//    echo "You must enter an email.<br>";
//    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
//    exit();
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
$date = date("c");
$sql = "INSERT INTO users (email, username, password, date_join) VALUES ('".
    $_REQUEST['email']. "','".
    $_REQUEST['name']. "','".
    $_REQUEST['password1']. "',' ".
    $date.
    "')";

$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
} else {
    $_SESSION["newaccount"]="yes";
    $_SESSION["loggedin"]="yes";
    include "index.php";
}
?>


</body>
</html>