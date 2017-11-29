
<!DOCTYPE html>
<html class="no-js">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110403299-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-110403299-1');
    </script>

    <meta charset="utf-8">

    <title>Reflora</title>

    <link rel="shortcut icon" href="img/favicon.png">

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./css/main.css">



    <script src="sketch.js"></script>


</head>
<body>

    <nav>
        <a><img class="corner-logo" src="./img/logo.png"/></a>
        <div class="navlinks">
            <a id="camera-button">Capture</a>
            <a onclick="library()" id="library-button">Library</a>
            <a onclick="settings()" id="settings-button">Settings</a>
            <a onclick="instructions()" id="instructions-button">Instructions</a>
            <a href='reflora_search.php'>Search</a>
                <?php
                session_start();
                if($_SESSION["loggedin"] == "yes") {
                    echo "<a href='logout.php'>". " Welcome " . $_SESSION['username']. ", Logout". "</a>";
                } else {
                    echo "<a href='login.php'>". " Login" . "</a>";
                } ?>
        </div> <!-- close nav links-->

        <!--hamburgericon-->
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

    </nav>


    <script>

        $(document).ready(function(){
            $('#nav-icon').click(function(){
                $(this).toggleClass('open');
            });
        });

    </script>

<div class="sidebar" id="images">
    <i class="material-icons" id="close-x" onclick="library()">close</i>
    <p style="text-align: center;">Library</p>
    <img src="./img/phyllo1.jpg.jpeg"> <br> <br>
    <img src="./img/phyllo2.jpg.jpeg"> <br> <br>
    <img src="./img/phyllo3.jpg.jpeg"> <br><br><br>
    <div class="button" id="download-link">Download</div>
    <br style="clear:both;">
</div>

<div class="sidebar" id="settings">
    <i class="material-icons" id="close-x" onclick="settings()">close</i>
    <p style="text-align: center;">Settings</p>

    <p>Red · <span id="rSlider-value"></span></p>
    <div class="slider" id="rSlider-div">
        <input type="range" min="1" max="255" value="94" class="slider" id="rSlider">

    </div>

    <p>Green · <span id="gSlider-value"></span></p>
    <div class="slider" id="gSlider-div">
        <input type="range" min="1" max="255" value="121" class="slider" id="gSlider">

    </div>

    <p>Blue · <span id="bSlider-value"></span></p>
    <div class="slider" id="bSlider-div">
        <input type="range" min="1" max="255" value="221" class="slider" id="bSlider">

    </div>

    <p>Speed · <span id="rotSlider-value"></span></p>
    <div class="slider" id="rotSlider-div">
        <input type="range" min="0" max="100" value="1" class="slider" id="rotSlider">

    </div>

    <p>Angle · <span id="aSlider-value"></span></p>
    <div class="slider" id="aSlider-div">
        <input type="range" min="1" max="20000" value="1375" class="slider" id="aSlider">

    </div>

    <p>Size · <span id="sizeSlider-value"></span></p>
    <div class="slider" id="sizeSlider-div">
        <input type="range" min="1" max="300" value="20" class="slider" id="sizeSlider">

    </div>

    <p>Background · <span id="bgSlider-value"></span></p>
    <div class="slider" id="bgSlider-div">
        <input type="range" min="1" max="255" value="50" class="slider" id="bgSlider">

    </div>

    <!--settings switch-->
<!--    <h6>Mouse Control</h6><input type="checkbox" checked="" id="mouse-control">-->

</div>

    <script>

        var rSlider = document.getElementById("rSlider");
        var rSliderVal = document.getElementById("rSlider-value");
        rSliderVal.innerHTML = rSlider.value; // Display the default slider value
        rSlider.oninput = function() {
            rSliderVal.innerHTML = this.value; // Update the current slider value (each time you drag the slider handle)
        }

        var gSlider = document.getElementById("gSlider");
        var gSliderVal = document.getElementById("gSlider-value");
        gSliderVal.innerHTML = gSlider.value;
        gSlider.oninput = function() {
            gSliderVal.innerHTML = this.value;
        }

        var bSlider = document.getElementById("bSlider");
        var bSliderVal = document.getElementById("bSlider-value");
        bSliderVal.innerHTML = bSlider.value;
        bSlider.oninput = function() {
            bSliderVal.innerHTML = this.value;
        }

        var rotSlider = document.getElementById("rotSlider");
        var rotSliderVal = document.getElementById("rotSlider-value");
        rotSliderVal.innerHTML = rotSlider.value;
        rotSlider.oninput = function() {
            rotSliderVal.innerHTML = this.value;
        }

        var aSlider = document.getElementById("aSlider");
        var aSliderVal = document.getElementById("aSlider-value");
        aSliderVal.innerHTML = aSlider.value;
        aSlider.oninput = function() {
            aSliderVal.innerHTML = this.value;
        }

        var bgSlider = document.getElementById("bgSlider");
        var bgSliderVal = document.getElementById("bgSlider-value");
        bgSliderVal.innerHTML = bgSlider.value;
        bgSlider.oninput = function() {
            bgSliderVal.innerHTML = this.value;
        }

        var sizeSlider = document.getElementById("sizeSlider");
        var sizeSliderVal = document.getElementById("sizeSlider-value");
        sizeSliderVal.innerHTML = sizeSlider.value;
        sizeSlider.oninput = function() {
            sizeSliderVal.innerHTML = this.value;
        }


    </script>


<div class="sidebar" id="instructions">
    <i class="material-icons" id="close-x" onclick="instructions()">close</i>
    <p style="text-align: center;">Instructions</p>
    <h6>Reflora is a place for you to come relax while creating some cool graphics based in floral mathematics.
        To get started, move your mouse on the blank canvas, and explore the Reflora world.</h6>
</div>

<div id="sketch">
</div>



</body>
</html>

