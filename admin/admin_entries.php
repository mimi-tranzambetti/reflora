<?php
session_start();

if($_SESSION["loggedin"] != "admin") {
    header('Location:../index.php');
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

$sql = "SELECT * FROM entry_view";

$results = $mysql->query($sql);

if(!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}

if(empty($_REQUEST["start"])){
    $start = 1;
}else {
    $start = $_REQUEST["start"];
}

if ($results->num_rows < $end){
    $end = $results->num_rows;
}

$end = $start+9;
$counter = $start;
$results->data_seek($start-1);

?>

<html>
<head>
    <title>Reflora Entries</title>
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <style>
        .column1{
            width: 19%;
            height: 30px;
            float: left;
            /*border: red solid 1px;*/
        }
        .column2{
            width: 9%;
            height: 30px;
            float: left;
            /*border: red solid 1px;*/
        }
        .buttons{
            width: 12%;
            height: 25px;

            float:left;
        }


    </style>
</head>

<body>
<div class="search" style="">
    <h1>Reflora Entries</h1>

    <h3>
        <div class="column1"> Username </div>
        <div class="column2"> red </div>
        <div class="column2"> green </div>
        <div class="column2"> blue </div>
        <div class="column2"> size </div>
        <div class="column2"> speed </div>
        <div class="column2"> angle </div>
        <div class="column2"> background </div>



    </h3>
    <hr>
    <?php

    while($currentrow = $results->fetch_assoc()){
        ?>
        <div class="column1"> <?= $currentrow["username"]?> </div>
        <div class="column2"> <?= $currentrow["red"]?>  </div>
        <div class="column2"> <?= $currentrow["green"]?>  </div>
        <div class="column2"> <?= $currentrow["blue"]?>  </div>
        <div class="column2"> <?= $currentrow["size"]?>  </div>
        <div class="column2"> <?= $currentrow["speed"]?>  </div>
        <div class="column2"> <?= $currentrow["angle"]?>  </div>
        <div class="column2"> <?= $currentrow["background"]?>  </div>


        <div class="buttons" >
            <a href='admin_edit.php?user_id=<?=$currentrow["user_id"]?>'> Edit |  </a>
            <a href='admin_delete.php?user_id=<?=$currentrow["user_id"]?>'> Delete </a>
        </div>
        <?php
        if($end <= $counter) {
            break;
        }
        +$counter++;
    }

        if($start >= 9){
            ?>
            <form action="" method="get">
                <input type="hidden" name="start" value="<?= ($start-10) ?>">
                <input class="button" type="submit" value="Previous" style="float:left; width:49%;">
            </form>
            <?php
        }


        if ($end < $results->num_rows){
            ?>
            <form action="" method="get">
                <input type="hidden" name="start" value="<?= ($start+10) ?>">
                <input class="button" type="submit" value="More entries" style="float:right; width:49%;">
            </form>
        <?php } ?>
        <form action="../logout.php" method="get">
            <input class="button" type="submit" value="Logout of Admin">
        </form>
        <br style="clear:both;"><br><br>
        <a href="admin_home.php"> Return Home</a>
        <br style="clear:both;">
</div>

</body>

</html>
