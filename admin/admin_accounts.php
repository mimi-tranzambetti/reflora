<?php include "admin.php";
?>
<html>
<head>
    <title>Reflora Accounts</title>
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

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


        .buttons{
            width: 10%;
            height: 25px;
            padding: 0px;
            padding-bottom: 5px;
            /*border: red solid 1px;*/
            float: left;

        }
    </style>

</head>
<body>

<div class="search" style="width: 1000px;">
    <h1>Reflora Accounts</h1>

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
        <br><br>
        <?php
        if($end <= $counter) {
            break;
        }
        +$counter++;
    }?>

        <?php
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
                <input class="button" type="submit" value="More users" style="float:right; width:49%;">
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


