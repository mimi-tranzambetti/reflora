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

$sql = "SELECT * FROM users WHERE user_id=" . $_REQUEST['user_id'];

$results = $mysql->query($sql);

$recorddata = $results->fetch_assoc();

if(!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}

?>

<html>
<head>
    <title>Account Edit</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/main.css">

</head>
<body>

<div class="container">
    <h1>Edit Account - <?= $recorddata['username']?> </h1>
    <form action="admin_update.php">
        <input type="hidden" name ="user_id" value="<?= $recorddata["user_id"]; ?>">
        <em> Username: </em>
        <input class= "text" type="text" name="username" value="<?= $recorddata['username']; ?>">
        <br>
        <em>Password:</em>
        <input class= "text" type="text" name="password" value="<?= $recorddata['password']; ?>">
        <br>
        <em>Email:</em>
        <input class= "text" type="text" name="email" value="<?= $recorddata['email']; ?>">
        <br>
        <em>Clearance:</em>
        <select name="clearance">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <em>Date Joined:</em>
        <input class= "text" type="text" name="date_join" value=" <?= $recorddata['date_join']; ?>">

        <input class ="button" type="submit" value="update">
    </form>
        <a class="button" href="admin_accounts.php"> Return to Accounts</a>
</div>

</body>

</html>
