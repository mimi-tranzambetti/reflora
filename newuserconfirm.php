<html>

<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
<title>Reflora Welcome!</title>
</head>

<body>
<div class="container">

<?php

if(empty($_REQUEST['name'])) {
    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
    exit();
}
if(empty(trim($_REQUEST['name']))) {
    echo "You must enter a name.<br>";
    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
    exit();
}
if(empty(trim($_REQUEST['password1']))) {
    echo "You must enter a name.<br>";
    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
    exit();
}
if($_REQUEST['password1'] != $_REQUEST['password2']){
    echo "Passwords do not match.";
    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
    exit();
}
if(empty(trim($_REQUEST['email']))) {
    echo "You must enter an email.<br>";
    echo "Please go the <a href='newuser.php'>sign up</a> form page.";
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
$sql = "INSERT INTO users (email, username, password, date_join) VALUES ('".
    $_REQUEST['email']. "','".
    $_REQUEST['name']. "','".
    $_REQUEST['password1']. "',' ".
    date(o).
    "')";

$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}

?>



<p>Thank you <?= $_REQUEST['name']; ?>! You've successfully created your account! Go ahead and start drawing</p>
<a href="index.php"><input type="submit" class="button" value="Draw"></a>
</div>
</body>
</html>