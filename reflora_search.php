<?php
session_start();
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
    <title>Reflora: Search</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="shortcut icon" href="img/favicon.png">
</head>


<body>
<div class="search">
    <form action="reflora_results.php">
        <h1>Search</h1>

        <strong>Search for Users:</strong><br><br>

        <?php
        if ($_SESSION['searcherror2']=="yes"){
            echo '<div class="redtext">Your search did not return any results! Please try again</div>';
            unset($_SESSION["searcherror2"]);
        }
        ?>

        Username: <input type="text" name="name" placeholder="Username">
        <br><br>

        <?php
        if ($_SESSION['searcherror1']=="yes"){
            echo '<div class="redtext">Please fill in all the fields!</div>';
            unset($_SESSION["searcherror1"]);
        }
        ?>

        <input class="button" type="submit" value="Search">


    </form>

    <form action="reflora_results.php">
        <strong>Search for Entries:</strong><br><br>

        Created between the hours of: <br> <input type="date "name="timecreate1" placeholder="HH:MM:SS" class="half-input">
        and <input type="date "name="timecreate2" placeholder="HH:MM:SS" class="half-input">
        <br><br>

        Ellipse Color <select name="dotcolor">
            <option value="ALL">All</option>
            <option value="yellow">Yellow</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>




        </select>
<!--        <br>-->
<!--        Sort order: <select name="sortorder">-->
<!--            <option>date</option>-->
<!--            <option>name</option>-->
<!--            <option>type</option>-->
<!--            <option>location</option>-->
<!--        </select><br>-->
        <br><br>

        <?php
        if ($_SESSION['searcherror1']=="yes"){
            echo '<div class="redtext">Please fill in all the fields!</div>';
            unset($_SESSION["searcherror1"]);
        }
        ?>

        <input class="button" type="submit" value="Search">


</form>
<br><br><br>
    <p>Return to <a href="index.php">drawing</a></p>

</div>
</body>
</html>
