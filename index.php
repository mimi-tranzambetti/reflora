
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

    <script type="text/javascript">
        $(window).on('load',function(){
            $('#landing-modal').modal('show');
        });
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
    <meta name="twitter:data2" value="In the comfort of your own home" />

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

<!--LANDING MODAL -- ADD 'DON'T SHOW AGAIN?"-->
<!--why isn't this modal showing >:-( it worked before-->

<div class="modal fade" id="landing-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="login" class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="logo" src="./img/logo.png"/><br><br>
            <h1 class="title">Calm your mind</h1>
            <p>Welcome to Reflora. Here, you can watch a relaxing drawing generate on screen. Toggle the drawing in
                the settings toolbar, and save a screenshot of your favorite pieces. </p>
            <br>
            <input type="submit" class="button" data-dismiss="modal" value="Start drawing" >
            <br><br>
        </div>
    </div>
</div>

    <nav>
        <a><img class="corner-logo" src="./img/logo.png"/></a>
        <div class="navlinks" id="topnav">
            <a onclick="screenshot()" id="camera-button">Capture</a>
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

            <!--hamburgericon-->
            <a href="javascript:void(0);" class="nav-icon" >
            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div></a>

        </div> <!-- close nav links-->



    </nav>


    <script>

        $(document).ready(function(){
            $('.nav-icon').click(function(){
                $(this).toggleClass('open');
                $("#topnav").toggleClass('responsive');
            });
        });

//        function opennav() {
//            var x = document.getElementById("topnav");
//            if (x.className === "navlinks") {
//                x.className += " responsive";
//            } else {
//                x.className = "navlinks";
//            }
//        }

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
    <br>
    <p>Red <span id="rSlider-value" style="float:right;"></span></p>
    <div class="slider" id="rSlider-div">
        <input type="range" min="1" max="255" value="94" class="slider" id="rSlider">

    </div>
    <br>
    <p>Green <span id="gSlider-value" style="float:right;"></span></p>
    <div class="slider" id="gSlider-div">
        <input type="range" min="1" max="255" value="121" class="slider" id="gSlider">

    </div>
    <br>
    <p>Blue <span id="bSlider-value" style="float:right;"></span></p>
    <div class="slider" id="bSlider-div">
        <input type="range" min="1" max="255" value="221" class="slider" id="bSlider">

    </div>
    <br>
    <p>Speed <span id="rotSlider-value" style="float:right;"></span></p>
    <div class="slider" id="rotSlider-div">
        <input type="range" min="0" max="50" value="1" class="slider" id="rotSlider">

    </div>
    <br>
    <p>Angle <span id="aSlider-value" style="float:right;"></span></p>
    <div class="slider" id="aSlider-div">
        <input type="range" min="1" max="20000" value="1375" class="slider" id="aSlider">

    </div>
    <br>
    <p>Size <span id="sizeSlider-value" style="float:right;"></span></p>
    <div class="slider" id="sizeSlider-div">
        <input type="range" min="1" max="300" value="20" class="slider" id="sizeSlider">

    </div>
    <br>
    <p>Background · <span id="bgSlider-value" style="float:right;"></span></p>
    <div class="slider" id="bgSlider-div">
        <input type="range" min="1" max="255" value="50" class="slider" id="bgSlider">
    </div>
    <br>
    <br>

    <input type="submit" value="Clear canvas" id="refresh-button">

    <!--settings switch-->
<!--    <h6>Mouse Control</h6><input type="checkbox" checked="" id="mouse-control">-->

</div>

<!--SLIDERS-->

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

