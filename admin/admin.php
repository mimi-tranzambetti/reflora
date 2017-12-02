<?php
session_start();

if($_SESSION["loggedin"] != admin) {
    header('Location:../index.php');
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

$sql = "SELECT * FROM users";

$results = $mysql->query($sql);

if(!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}

if(empty($_REQUEST["start"])){
    $start = 1;
}else {
    $start = $_REQUEST["start"];
}
$end = $start+9;
$counter = $start;
$results->data_seek($start-1);

?>

