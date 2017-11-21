<?php
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

?>

<html>
<head>
    <title>Recovery</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

<body>

<div class="container">
    <h1>Reflora Account Recovery</h1>
    <?php
    if(empty($_REQUEST["submit"])) { ?>
        <form action="" method="get">
            <input type="hidden" value="yes" name="submit">
            In order to recover your account please provide
            <br>

            <h3>Username: <input type="text" name="username"></h3>
            or
            <br>
            <h3>Password: <input type="text" name="password"></h3>
            or
            <br>
            <h3>Email: <input type="text" name="password"></h3>
            <input type="submit" value="Submit">
        </form>
    <?php
    }else{
        $sql = "SELECT username, passowrd, email FROM users WHERE ";
            if($_REQUEST["username"] != ""){
                $sql .= "username = '" . $_REQUEST["username"] . "' AND ";
            } else if($_REQUEST["password"] != ""){
                $sql .= "password  = '" . $_REQUEST["password"] . "' AND ";
            }


        $to = "halpan@usc.edu";
        $from=$_REQUEST["email"];
        $subject = "Feedback from X website";
        $message = $_REQUEST["userfeedback"];

        $result = mail ($to, $subject, $message);
    }
    ?>
</div>

</body>
</html>
