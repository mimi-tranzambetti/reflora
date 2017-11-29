<?php
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
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="shortcut icon" href="img/favicon.png">
</head>


<body>
<div class="search">
    <form action="reflora_results.php">

        <strong>Search for Users:</strong><br><br>

        Username: <input type="text" name="name" placeholder="Username">
        <br><br>
        Joined between <br> <input type="date "name="datejoin1" placeholder="YYYY-MM-DD" class="half-input">
        and <input type="date "name="datejoin2" placeholder="YYYY-MM-DD" class="half-input">
        <br><br><br>

        <strong>Search for Images:</strong><br><br>

        Created between <br> <input type="date "name="datecreate1" placeholder="YYYY-MM-DD" class="half-input">
        and <input type="date "name="datecreate2" placeholder="YYYY-MM-DD" class="half-input">
        <br><br>

        Ellipse Color <select name="dotcolor">
            <option value="ALL">All</option>
            <option value="yellow">Yellow</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>

        </select>
<!--        <br>-->
<!--        Sort order: <select name="sortorder">-->
<!--            <option>date</option>-->
<!--            <option>name</option>-->
<!--            <option>type</option>-->
<!--            <option>location</option>-->
<!--        </select><br>-->
        <br><br>

        <input class="button" type="submit" value="Search">


</form>
<br><br><br>
    <p>Return to <a href="index.php">drawing</a></p>

</div>
</body>
</html>
