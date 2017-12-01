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
</head>
<body>
<div class="colorbar" style="background-color:rgb(<?php echo $red . "," . $green . "," .$blue;?>);"><h1>Average color</h1></div>
<div class="colorbar"><div class="colorbarfill" style="background-color:red;width: <?php echo $red;?>px;"><h1>Average red value</h1></div></div><br>
<div class="colorbar"><div class="colorbarfill" style="background-color:green;width: <?php echo $green;?>px;"><h1>Average green value</h1></div></div><br>
<div class="colorbar"><div class="colorbarfill" style="background-color:blue;width: <?php echo $blue;?>px;"><h1>Average blue value</h1></div></div><br>

<div id="colortilebox"><h1>User Color Tiles</h1>
    <?php

    $sql = "SELECT * FROM entries";

    $results = $mysql->query($sql);

    $row = mysqli_fetch_assoc($results);

    while ($row = mysqli_fetch_array($results)) {
        echo "<div class='colortile' style='background-color:rgb(". $row['red'] . "," .$row['green'] . "," . $row['blue'] .");'></div>";
    }
    ?>


</div><!--endcolortilebox-->

</body>


</html>



<?php
session_start();
