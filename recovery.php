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

<div class="login">
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
        <br><br> Nevermind, take me<a href='index.php'> back to drawing.</a>
    <?php
    }else if ($_REQUEST["username"] != "" OR $_REQUEST["password"] != "" OR $_REQUEST["email"] != ""){
        $sql = "SELECT username, password, email FROM users WHERE ";
            if($_REQUEST["username"] != ""){
                $sql .= "username = '" . $_REQUEST["username"] . "'";
            } else if($_REQUEST["password"] != ""){
                $sql .= "password  = '" . $_REQUEST["password"] . "'";
            } else if($_REQUEST["email"] != ""){
                $sql .= "email  = '" . $_REQUEST["email"] . "'";
            }

        $results = $mysql->query($sql);

        if (!$results) {
            echo "SQL problem: " .
                $sql . "<br>" .
                $mysql-> error ;

            exit();
        } else {
            $currentrow = $results->fetch_assoc();

            $to = $currentrow["email"];
            $from = "recovery@reflora.com";
            $subject = "Reflora Account Information";
            $message = "Your Username is ";
            $message .= $currentrow["username"];
            $message .= "\r Your Password is ";
            $message .= $currentrow["password"];
            $message .= "\r Log in at the address: http://acad.itpwebdev.com/~halpan/reflora/login.php ";

            $sent = mail($to, $subject, $message, "From: " . $from);

            if ($sent == "1"){
                echo "Great! Your username and password have been sent to  " . $currentrow["email"];
                echo "<br><br> <a href='index.php'> Back to drawing.</a>";
            } else{
                echo "Sorry couldn't find you there. Try again?"?>
                <form action="" method="get">
                    <input type="hidden" value="yes" name="submit">
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
                <br><br> Nevermind, take me<a href='index.php'> back to drawing.</a>
    <?php

            }
        }
    }else{?>
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
        <br><br> Nevermind, take me<a href='index.php'> back to drawing.</a>

    <?php
    }
    ?>
</div>

</body>
</html>
