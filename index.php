<!DOCTYPE html>
<html class="no-js">

    <?php include "password.php";?>

    <head>


        <link rel="stylesheet" type="text/css" href="./css/main.css">
        <link rel="shortcut icon" href="img/favicon.png">

        <meta charset="utf-8">

        <title>Reflora</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta property="og:title" content="Reflora" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://acad.itpwebdev.com/~tranzamb/reflora/index.php" />
        <meta property="og:description" content="Reflora is a fun place to draw things" />
        <meta property="og:image" content="http://acad.itpwebdev.com/~tranzamb/reflora/img/background.png" />
        <meta name="twitter:label1" value="When" />
        <meta name="twitter:data1" value="Anytime" />
        <meta name="twitter:label2" value="Where" />
        <meta name="twitter:data2" value="USC, Los Angeles" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="p5.min.js"></script>
        <script type="text/javascript" src="p5.dom.js"></script>

        <script src="sketch.js"></script>

    </head>




    <body>
    <div id="navbar" style="z-index: 10;">
        <img id="corner-logo" src="./img/logo.png"/>

    </div>

    <div id="images">
        <p style="text-align: center;">Library</p>
        <img src="phyllo1.jpg.jpeg"> <br> <br>
        <img src="phyllo2.jpg.jpeg"> <br> <br>
        <img src="phyllo3.jpg.jpeg"> <br><br><br>
        <div class="button" id="download-link">Download</div>
        <br style="clear:both;">
    </div>

    <div id="settings">
        <p style="text-align: center;">Settings</p>
        <h6>Red</h6>
        <h6>Green</h6>
        <h6>Blue</h6>
        <h6>Speed</h6>
        <h6>Angle</h6>
        <h6>Background</h6>
        <h6>Size</h6>
    </div>

    <div id="sketch">
        </div>





        <?php
        session_start();
        if($_SESSION["loggedin"] == "yes") {
            echo "<a href='logout.php'>". "<div class='button' id='login-link'>". "Logout". "</div>". "</a>";
        } else {
            echo "<a href='login.php'>". "<div class='button' id='login-link'>". "Login". "</div>". "</a>";
        } ?>

    </div>

    <a href='reflora_search.php'>
    <div class="button" id="search-link">
        Search
    </div> <!--could be valuable to create a bottom nav bar, or move this to the top-->
    </a>

    <a href='img/styleguide.jpeg'>
        <div class="button" id="style-link">
            Style
        </div> <!--could be valuable to create a bottom nav bar, or move this to the top-->
    </a>



    </body>
</html>
