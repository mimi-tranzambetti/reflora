<?php
/**
 * Created by PhpStorm.
 * User: Hal2001
 * Date: 11/30/17
 * Time: 10:56 PM
 */

/* some Javascript that once the capture button is clicked we can grab and pass through the settings data

/* secondary form that is made up of a lot of hidden things with values and when hit capture it also submits the form?

*/

$rvalue = "rSlider.value";
$gvalue = "gSlider.value";
$bvalue = "bSlider.value";
$avalue = "aSlider.value";
$sizevalue = "sizeSlider.value";
$speedvalue = "speedSlider.value";
$authorvalue = "authorSlider.value";

$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

$sql = "INSERT INTO entries (email, username, password, date_join) VALUES ('".
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
