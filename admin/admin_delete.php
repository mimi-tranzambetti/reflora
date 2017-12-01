<?php include "admin.php";
if(empty($_REQUEST['user_id'])) {
    echo "Please go through <a href='admin_accounts.php'>search</a> page.";
    exit();
}

if($_REQUEST["confirm"] != "yes"){
    echo "<br> please confirm you want to delete.";
    ?>

    <form action=" ">
        <input type="hidden" name="user_id"
               value="<?= $_REQUEST["user_id"] ?>">
        <input type="hidden" name="confirm" value="yes">
        <input type="submit" value="Confirm Deletion">
    </form>

    <?php
    exit(); // stop page at that point
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
    <title>Reflora Delete</title>
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>

<?php

$sql = "DELETE FROM users WHERE user_id= '" . $_REQUEST["user_id"] . "'";

//echo "<hr> SQL:<br>" . $sql;

$results = $mysql->query($sql);

if(!$results){
    echo "PROBLEM: Did not delete the user.";
    exit();
}
?>
<div class="container">
    <h2>The user has been deleted!</h2>
<a href="admin_accounts.php">BACK TO ACCOUNTS</a>
</div>

</body>

</html>
