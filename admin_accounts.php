<?php include "admin.php";
?>
<html>
<head>
    <title>Reflora Accounts</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/main.css">

    <style>
        .column1{
            width: 18%;
            height: 30px;
            float: left;
            /*border: red solid 1px;*/
        }
        .column2{
            width: 23%;
            height: 30px;
            float: left;
            /*border: red solid 1px;*/
        }
        .column3{
            width: 10%;
            height: 30px;
            float: left;
            /*border: red solid 1px;*/
        }

        #autoheight{
            height: 400px;
        }

        .wide{
            float: left;
            width: 20%;
            height: 40px;
            /*border: red solid 1px;*/
        }

        .buttons{
            width: 10%;
            height: 30px;
            /*border: red solid 1px;*/
            float: left;

        }
    </style>

</head>
<body>

<div class="container" id="autoheight">
    <h1>Reflora Accounts</h1>
    <form action="logout.php" method="get">
        <input class="button" type="submit" value="Logout of Admin">
    </form>
    <h3>
        <div class="column1"> Username </div>
        <div class="column1"> Email </div>
        <div class="column2"> Password </div>
        <div class="column3"> Clearance </div>
        <div class="column1"> Date Joined </div>
    </h3>
    <hr>
    <?php

    while($currentrow = $results->fetch_assoc()){
        ?>
        <div class="column1"> <?= $currentrow["username"]?> </div>
        <div class="column1"> <?= $currentrow["email"]?>  </div>
        <div class="column2"> <?= $currentrow["password"]?>  </div>
        <div class="column3"> <?= $currentrow["clearance"]?>  </div>
        <div class="column1"> <?= $currentrow["date_join"]?>  </div>
        <div class="buttons">
            <a href='admin_edit.php?user_id=<?=$currentrow["user_id"]?>'> Edit |  </a>
            <a href='admin_delete.php?user_id=<?=$currentrow["user_id"]?>'> Delete </a>
        </div>
        <?php
        if($end <= $counter) {
            break;
        }
        +$counter++;
    }?>

    <div class="wide">
        <?php
        if($start >= 9){
            ?>
            <form action="" method="get">
                <input type="hidden" name="start" value="<?= ($start-10) ?>">
                <input class="button" type="submit" value="PREVIOUS">
            </form>
            <?php
        }


        if ($end < $results->num_rows){
            ?>
            <form action="" method="get">
                <input type="hidden" name="start" value="<?= ($start+10) ?>">
                <input class="button" type="submit" value="NEXT">
            </form>
        <?php } ?>
        <br>
        <a href="admin_home.php"> Return Home</a>
    </div>



</body>
</html>


