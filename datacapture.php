<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Hal2001
 * Date: 11/30/17
 * Time: 10:56 PM
 */

/* some Javascript that once the capture button is clicked we can grab and pass through the settings data

/* secondary form that is made up of a lot of hidden things with values and when hit capture it also submits the form?

*/

// <input type="hidden" name="rSlider" value="" id="rSlider-hidden"><br>
//    <input type="hidden" name="gSlider" value="" id="gSlider-hidden"><br>
//    <input type="hidden" name="bSlider" value="" id="bSlider-hidden"><br>
//            <input type="hidden" name="rotSlider" value="" id="rotSlider-hidden"><br>
//    <input type="hidden" name="aSlider" value="" id="aSlider-hidden"><br>
//    <input type="hidden" name="bgSlider" value="" id="bgSlider-hidden"><br>
//            <input type="hidden" name="sizeSlider" value="" id="sizeSlider-hidden"><br>
//            <input type="submit" value="Save" id="save-button" onclick="screenshot()">

$rvalue = $_REQUEST["rSlider"];
$gvalue = $_REQUEST["gSlider"];
$bvalue = $_REQUEST["bSlider"];
$anglevalue = $_REQUEST["aSlider"];
$sizevalue = $_REQUEST["rotSlider"];
$speedvalue = $_REQUEST["bgSlider"];
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

$sql = "INSERT INTO entries (author_id, red, green, blue, angle, size, speed, date) VALUES ('".
    $authorvalue. "','".
    $rvalue. "','".
    $gvalue. "','".
    $bvalue. "','".
    $anglevalue. "','".
    $sizevalue. "','".
    $speedvalue. "','".
    $authorvalue. "','".
    $date.
    "')";

echo $sql;

$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
} else {
    $_SESSION["newaccount"]="yes";
    $_SESSION["loggedin"]="yes";
    include "index.php";
}
