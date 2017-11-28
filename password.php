<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
<div >
<?php
session_start();

$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

$sql = "SELECT * FROM halpan_reflora.users WHERE username = '".$_REQUEST['username']."'";

$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}

$currentrow = $results->fetch_assoc();

$_SESSION['username'] = $currentrow['username'];

if ($_SESSION["loggedin"] == "yes") {
}
else if ($_REQUEST["password"] != "" && $_REQUEST["username"] != "") {
    if($_REQUEST["username"]== $currentrow['username'] && $_REQUEST["password"]== $currentrow['password'] && $currentrow['clearance'] > 3) {
        $_SESSION["loggedin"] = "admin";
        $_SESSION ["error"]="no";
        header('Location: admin_home.php');
        exit();
    }else if($_REQUEST["username"]== $currentrow['username'] && $_REQUEST["password"]== $currentrow['password']) {
        $_SESSION["loggedin"]="yes";
        $_SESSION ["error"]="no";
    }else if($_REQUEST['password'] == ""){
        header('Location: login.php');
        $_SESSION ["error"]="no";
        exit();
    }
    else {
        include "login.php";
        $_SESSION["loggedin"] = "no";
        $_SESSION ["error"]="yes"; // !!! fix error styling so it's not on a dark red background at the bottom
        exit();
    }
}
else{
    include "login.php";
    exit();
// STOP the page
}
?>

</div>
</body>
</html>
