<?php
session_start();

$rvalue = $_REQUEST["rSlider"];
$gvalue = $_REQUEST["gSlider"];
$bvalue = $_REQUEST["bSlider"];
$anglevalue = $_REQUEST["aSlider"];
$sizevalue = $_REQUEST["sizeSlider"];
$speedvalue = $_REQUEST["rotSlider"];
$backgroundvalue = $_REQUEST["bgSlider"];
$authorvalue = $_SESSION["userid"];
$date = date("c");

$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

$sql = "INSERT INTO entries (user_id, author_id, red, green, blue, angle, size, speed, background, date) VALUES ('".
    $authorvalue. "','".
    $authorvalue. "','".
    $rvalue. "','".
    $gvalue. "','".
    $bvalue. "','".
    $anglevalue. "','".
    $sizevalue. "','".
    $speedvalue. "','".
    $backgroundvalue. "','".
    $date.
    "')";

echo $sql;

$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
} else {
}
?>

Great! Saved drawing settings
