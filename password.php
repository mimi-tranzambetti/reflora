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

if($_SESSION["loggedin"] == "yes") {
}
else if (!empty($_REQUEST["password"])) {
    if($_REQUEST["username"]== $currentrow['username'] && $_REQUEST["password"]== $currentrow['password']) {
        $_SESSION["loggedin"]="yes";
    }
    else {
        include "login.php";
        $_SESSION["loggedin"] == "no";
        echo "ERROR. WRONG PASSWORD"; // !!! fix error styling so it's not on a dark red background at the bottom
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
