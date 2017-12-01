<?php
session_start();

/*first connect to DB, gather the user info, display it for editing, see if password or session can hold on to this data*/
?>

<html>
<head>
    <title>Reflora User Setting</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">

    <link rel="shortcut icon" href="img/favicon.png">

</head>

<body>

<div class="login">

<!--    <img class="logo" src="./img/logo.png"/><br><br>-->

    <form action="userconfirm.php">
        Username: <input type="text" name="username" placeholder=" <?= $_SESSION['username']?> "><br>
        Password: <input type="password" name="password" placeholder="<?= $_SESSION['password']?> "><br>
        Email: <input type="text" name="email" placeholder=" <?= $_SESSION['email']?> "><br><br>
        <input type="submit" class="button" value="Save Changes">


    </form>

</div>

</body>

</html>