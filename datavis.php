<html>

<?php
session_start();
$mysql = new mysqli(
    "acad.itpwebdev.com",
    halpan,
    Pleasejustletmein4726,
    "halpan_reflora");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

//find average red value
$sql = "SELECT AVG(red) as average_red FROM entries";

$results = $mysql->query($sql);

$row = mysqli_fetch_assoc($results);

$red = floor($row['average_red']);

//find average green value
$sql = "SELECT AVG(green) as average_green FROM entries";

$results = $mysql->query($sql);

$row = mysqli_fetch_assoc($results);

$green = floor($row['average_green']);

//find average blue value
$sql = "SELECT AVG(blue) as average_blue FROM entries";

$results = $mysql->query($sql);

$row = mysqli_fetch_assoc($results);

$blue = floor($row['average_blue']);
?>
<head>

  <title>Color Data Visualization</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <style>
        body{
            background: #d4d0ca;
        }

        .colorbar{
            width: 255px;
            height: 30px;
            margin: auto;
            background-color: #dddddd;
            text-align: center;
            color: white;
            border-radius: 5px;

        }

        .colorbarfill{
            height:30px;
            border-radius: 5px;
        }
        .colortile{
            width: 40px;
            height: 40px;
            padding: 2%;
            border-radius: 5px;
            margin: 5px;
            background-color:grey;
            float: left;
            color: white;
        }

        .login{
        }


    </style>
</head>
<body>
<div class="login">
    <p class="title">Average color values</p>
    <p>Average color of user ellipses</p>
<div class="colorbar" style="height: 75px; background-color:rgb(<?php echo $red . "," . $green . "," .$blue;?>);"><p><br><?php echo $red . ", " . $green . ", " .$blue;?></p></div>
    <p>Average red value of user ellipses</p>
<div class="colorbar"><div class="colorbarfill" style="background-color:red;width: <?php echo $red;?>px;"><p><?php echo "$red";?></p><br></div></div><br>
    <p>Average green value of user ellipses</p>
<div class="colorbar"><div class="colorbarfill" style="background-color:green;width: <?php echo $green;?>px;"><p><?php echo $green;?></p><br></div></div><br>
    <p>Average blue value of user ellipses</p>
<div class="colorbar"><div class="colorbarfill" style="background-color:blue;width: <?php echo $blue;?>px;"><p><?php echo $blue;?></p><br></div></div><br>
</div>
<div class="login">
    <p class="title">User color tiles</p>
    <?php

    $sql = "SELECT * FROM entries";

    $results = $mysql->query($sql);

    $row = mysqli_fetch_assoc($results);

    while ($row = mysqli_fetch_array($results)) {
        echo "<div class='colortile' style='background-color:rgb(". $row['red'] . "," .$row['green'] . "," . $row['blue'] .");'>".  $red . ", " . $green . ", " .$blue."</div>";
    }
    ?>

<br style="clear:both;">
</div><!--endcolortilebox-->
<br><br><br><br><br><br>
<br style="clear:both;">
</body>


</html>


