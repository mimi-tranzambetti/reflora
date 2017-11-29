<?php
include "admin.php";
?>

<html>

<head>
    <title>Reflora Admin</title>
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
<div class="container">
    <h1>Reflora Administer Home</h1>
    <h3>Actions</h3>
    <a href="admin_accounts.php"> Manage Accounts</a>
    <br>
    <a href="admin_entries.php"> Manage Entries </a>

    <form action="../logout.php" method="get">
        <input class="button" type="submit" value="Logout of Admin">
    </form>

</div>

</body>
</html>
