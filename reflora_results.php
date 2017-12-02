<?php
session_start();

if(empty($_REQUEST['dotcolor']) & empty($_REQUEST["name"])){
    header('Location:reflora_search.php');
}

$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora"
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
?>

<html>
<head>
    <title>Reflora: Results</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
<div class="container" class="smallcontainer">
    <h1> Search results<hr></h1>

    <?php

    if ($_REQUEST["name"] != ""){
        $sql = 	"SELECT * FROM users WHERE 1=1";
        $sql .= " AND username LIKE '%" .
            $_REQUEST['name'] . "%'";

        $results = $mysql->query($sql);

        if(!$results) {
            $_SESSION["searcherror1"] = "yes";
            header('Location:reflora_search.php');
        }

        echo "<em>Your results returned <strong>" .
        $results->num_rows .
        "</strong> results.</em>";
        echo "<br><br>";

        while($currentrow = $results->fetch_assoc()) {
            echo "<div class='name'><strong>" . $currentrow['username'] . "</strong>";
            echo "<br><br>";

        }

        echo "<p>Go back to <a href=\"index.php\">drawing</a>!</p>";
        exit();


    }else{
        $_SESSION["new-settings"] = "yes";
        $sql = 	"SELECT * FROM entry_view WHERE 1=1";

        if ($_REQUEST["datecreate1"] != ""){
            $sql .= "AND 
        date_join > '" . $_REQUEST["timecreate1"] . "' AND
        date_join < '" . $_REQUEST["timecreate2"] . "'";
        }

        if($_REQUEST['dotcolor'] != "ALL") {
            if($_REQUEST['dotcolor'] == "yellow"){
                $sql .= " AND
            red > '". 200 . "' AND green > '" . 200 .  "' AND blue < '". 50 . "'";}

            if ($_REQUEST['dotcolor'] == "red"){
            $sql .= " AND
            red > '". 200 . "' AND green <'" . 50 .  "' AND blue < '" . 50 .  "'";
            }
            if($_REQUEST['dotcolor'] == "blue"){
            $sql .= " AND
            red < '" . 50 .  "' AND green < '" . 50 .  "' AND blue > '". 200 . "'";
            }
            if($_REQUEST['dotcolor'] == "green"){
                $sql .= " AND
            red < '" . 50 .  "' AND green < '" . 200 .  "' AND blue > '". 50 . "'";
            }

        }

        $results = $mysql->query($sql);

        if(!$results) {
            $_SESSION["searcherror2"] = "yes";
            header('Location:reflora_search.php');
        }

//        echo $sql . "<br>";

        echo "<em>Your results returned <strong>" .
            $results->num_rows .
            "</strong> results.</em>";
        echo "<br><br>";

        while($currentrow = $results->fetch_assoc()) {
            echo "<div class='name'><strong><a href='index.php?r-value=" . $currentrow['red'].
                "&g-value=". $currentrow['green']."&b-value=". $currentrow['blue']."'>" .
                $currentrow['username'] . "</a></strong><br>";
            echo "<div class='color'> <a href='index.php?r-value=" . $currentrow['red'].
                "&g-value=". $currentrow['green']."&b-value=". $currentrow['blue']."'> R" . $currentrow['red'] .", G". $currentrow['green'] .", B". $currentrow['blue'] ."</a></div>";
            echo "<br><br>";

        }

        echo "<p>Go back to <a href=\"index.php\">drawing</a>!</p>";
        exit();
    }


    /// HELP: I want to siphon out colors and integer values when certain text parameters are set

//    echo $sql;


//    while($currentrow = $results->fetch_assoc()) {
//
////        print_r($currentrow);
//
//        echo "<div class='name'><strong>" . $currentrow['username'] . "</strong>";
//        echo "<div class='image'> <img src='".$currentrow['image']. "'>  </div>";
//        echo "<div class='color'> R" . $currentrow['red'] .", G". $currentrow['green'] .", B". $currentrow['blue'] ." </div>";
//
//    }
    ?>
    <p>Go back to <a href="index.php">drawing</a>!</p>
</div>

</body>
</html>