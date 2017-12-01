<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Save Edits</title>
</head>

<body>
    <?php
    session_start();

    if (trim($_REQUEST["username"]) != "" OR trim($_REQUEST["password"]) != "" OR trim($_REQUEST["email"]) != "" ) {

        $mysql = new mysqli(
            "acad.itpwebdev.com",
            halpan,
            Pleasejustletmein4726,
            "halpan_reflora");

        if ($mysql->connect_errno) {
            echo "db connection error : " . $mysql->connect_error;
            exit();
        }

//        $sql = "INSERT INTO users (email, username, password) VALUES ('".
//            $_REQUEST['email']. "','" .
//            $_REQUEST['username']. "','".
//            $_REQUEST['password1']. "',' ".
//            date(o).
//            "')";

    $sql = "UPDATE users SET ";
        if (trim($_REQUEST["username"]) != ""){
            $sql .= "username = '" . $_REQUEST['username']. "'";
            $_SESSION["username"] = $_REQUEST['username'];
            if (trim($_REQUEST["password"]) != ""){
                $sql .= ", password = '" . $_REQUEST['password']. "'";
                $_SESSION["password"] = $_REQUEST['password'];
                if (trim($_REQUEST["email"]) != "") {
                    $sql .= ", email = '" . $_REQUEST['email'] . "'";
                    $_SESSION["email"] = $_REQUEST['email'];
                }
            }else if(trim($_REQUEST["email"]) != "") {
                $sql .= ", email = '" . $_REQUEST['email'] . "'";
                $_SESSION["email"] = $_REQUEST['email'];
            }
        } else if (trim($_REQUEST["password"]) != ""){
            $sql .= "password = '" . $_REQUEST['password'] . "'";
            $_SESSION["password"] = $_REQUEST['password'];
            if (trim($_REQUEST["email"]) != "") {
                $sql .= ", email = '" . $_REQUEST['email'] . "'";
                $_SESSION["email"] = $_REQUEST['email'];
            }
        } else if (trim($_REQUEST["email"]) != ""){
            $sql .= "email = '" . $_REQUEST['email'] . "'";
            $_SESSION["email"] = $_REQUEST['email'];
        }
        $sql .= " WHERE username = '" . $_SESSION["username"] . "'";



    $results = $mysql->query($sql);
    }
    header('Location: index.php');

    ?>
    <div class="login">
        <form>
        <?php

        if(!$results) {
            echo "SQL error: ". $mysql->error;
            exit();
        }
    ?>
        Great your information has been reset.
        <a href="index.php"> Back to drawing</a>
        </form>
    </div> <!-- close login div -->
</body>
</html>