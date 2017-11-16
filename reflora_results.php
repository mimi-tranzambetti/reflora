<?php

if(empty($_REQUEST['dotcolor'])) {
    echo "Error. Please use the <a href='reflora_search.php'> Search </a> page.";
    exit();
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

    $sql = 		"SELECT * FROM all_fields_view WHERE 1=1";
    $sql .= " AND username LIKE '%" .
        $_REQUEST['name'] . "%'";

    if ($_REQUEST["datejoin1"] != ""){
        $sql .= "AND 
        date_join > '" . $_REQUEST["datejoin1"] . "' AND
        date_join < '" . $_REQUEST["datejoin2"] . "'";
    }

    if ($_REQUEST["datecreate1"] != ""){
        $sql .= "AND 
        date_join > '" . $_REQUEST["datecreate1"] . "' AND
        date_join < '" . $_REQUEST["datecreate2"] . "'";
    }

    if($_REQUEST['dotcolor'] != "ALL") {
        if($_REQUEST['dotcolor'] == "yellow"){
            $sql .= " AND
            dot_r >". 200 . " AND dot_g >" . 200 .  " AND dot_b < ". 50;}
        }
        if ($_REQUEST['dotcolor'] == "red"){
            $sql .= " AND
            dot_r > 200 AND dot_g <50 AND dot_b < 50";
        }
        if($_REQUEST['dotcolor'] == "blue"){
            $sql .= " AND
            dot_r < 50 AND dot_g < 50 AND dot_b > 200";
        }
    /// HELP: I want to siphon out colors and integer values when certain text parameters are set

//    echo $sql;

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }


    echo "<em>Your results returned <strong>" .
        $results->num_rows .
        "</strong> results.</em>";
    echo "<br><br>";

    while($currentrow = $results->fetch_assoc()) {

//        print_r($currentrow);

        echo "<div class='name'><strong>" . $currentrow['username'] . "</strong>";
        echo "<div class='image'> <img src='".$currentrow['image']. "'>  </div>";
        echo "<div class='color'> R" . $currentrow['dot_r'] .", G". $currentrow['dot_g'] .", B". $currentrow['dot_b'] ." </div>";

    }
    ?>
    <p>Go back to <a href="index.php">drawing</a>!</p>
</div>

</body>
</html>