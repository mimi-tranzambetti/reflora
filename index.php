<!DOCTYPE html>
<html class="no-js">

<?php include "password.php"; ?>

<head>


    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/navigation.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<?php include "password.php"; ?>
<body>


    <nav>
        <a><img id="corner-logo" src="./img/logo.png"/></a>
        <div class="navlinks">
            <a id="camera-button"><i class="material-icons">camera_alt</i></a>
            <a onclick="library()" id="library-button"><i class="material-icons">photo_library</i></a>
            <a onclick="settings()" id="settings-button"><i class="material-icons">settings</i></a>
            <a onclick="instructions()" id="instructions-button"><i class="material-icons">info</i></a>
            <a href='reflora_search.php'><i class="material-icons">search</i></a>
            <a href='img/styleguide.jpeg'><i class="material-icons">line_style</i></a>
                <?php
                session_start();
                if($_SESSION["loggedin"] == "yes") {
                    echo "<a href='logout.php'>". "<i class=\"material-icons\">account_circle</i>". " Logout" . "</a>";
                } else {
                    echo "<a href='login.php'>". "<i class=\"material-icons\">account_circle</i>" . " Login" . "</a>";
                } ?>
        </div> <!-- close nav links-->

    </nav>

<script>
//    var infoButton = select('#instructions-button');
//    infoButton.mouseClicked(instructions());
//    function instructions() {
//
//        var x = document.getElementById("instructions");
//        var y = document.getElementById("settings");
//
//        if (infoView==false && settingsView==false) {
//            x.style.display = "block";
//            infoView=true;
//        }
//        else if (infoView==false && settingsView==true) {
//            y.style.display = "none";
////            rSlider.style("display", "none");
////            gSlider.style("display", "none");
////            bSlider.style("display", "none");
////            rotSlider.style("display", "none");
////            aSlider.style("display", "none");
////            bgSlider.style("display", "none");
////            sizeSlider.style("display", "none");
////            settingsView=false;
//
//            x.style.display = "block";
//            infoView=true;
//
//        } else {
//
//            x.style.display = "none";
//            infoView=false;
//        }
//    }



</script>
<div id="images">
    <i class="material-icons" id="close-x" onclick="library()">close</i>
    <p style="text-align: center;">Library</p>
    <img src="phyllo1.jpg.jpeg"> <br> <br>
    <img src="phyllo2.jpg.jpeg"> <br> <br>
    <img src="phyllo3.jpg.jpeg"> <br><br><br>
    <div class="button" id="download-link">Download</div>
    <br style="clear:both;">
</div>

<div class="sidebar" id="settings">
    <i class="material-icons" id="close-x" onclick="settings()">close</i>
    <p style="text-align: center;">Settings</p>
    <h6>Red</h6><div class="slider" id="rSlider-div"></div>
    <h6>Green</h6><div class="slider" id="gSlider-div"></div>
    <h6>Blue</h6><div class="slider" id="bSlider-div"></div>
    <h6>Speed</h6><div class="slider" id="rotSlider-div"></div>
    <h6>Angle</h6><div class="slider" id="aSlider-div"></div>
    <h6>Background</h6><div class="slider" id="bgSlider-div"></div>
    <h6>Size</h6><div class="slider" id="sizeSlider-div"></div>
</div>


<div class="sidebar" id="instructions">
    <i class="material-icons" id="close-x" onclick="instructions()">close</i>
    <p style="text-align: center;">Instructions</p>
    <h6>Reflora is a place for you to come relax while creating some cool graphics based in floral mathematics.
        To get started, move your mouse on the blank canvas, and explore the Reflora world.</h6>
</div>

<div id="sketch">
</div>

<div class="button" id="userwelcome" style="float:left;">
    <?php
    echo "Welcome, " . $_SESSION['username'];
    ?>
</div>


</body>
</html>

