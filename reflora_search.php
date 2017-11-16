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
    <link rel="shortcut icon" href="img/favicon.png">
</head>


<body>
<div class="container" class="smallcontainer">
    <form action="reflora_results.php">

        <strong>Search for Users:</strong><br><br>

        Username: <input type="text" name="name">
        <br><br>
        Joined Sometime between  <input type="text "name="datejoin1"> and <input type="text "name="datejoin2"><br>
        (use YYYY-MM-DD format)
        <br><br><br>

        <strong>Search for Images:</strong><br><br>

        Created Sometime between  <input type="text "name="datecreate1"> and <input type="text "name="datecreate2"><br>
        (use YYYY-MM-DD format)

        <br><br>
        Dot Color <select name="dotcolor">
            <option value="ALL">ALL</option>
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
        <p>Go back to <a href="index.php">drawing</a>!</p>
</div>

</form>
</body>
</html>
