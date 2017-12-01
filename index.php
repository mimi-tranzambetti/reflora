
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

    <?php
    session_start();
    if( $_SESSION["loggedin"] == "admin"){
        header('Location: admin/admin_home.php');
        exit();
    }
    ?>

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


<script type="text/javascript">
    $(window).on('load',function(){
        <?php
        if ($_SESSION['newaccount']=="yes"){
            echo '$("#newuser-modal").modal("show");';
        } else if ($_SESSION['error']=="yes"){
            echo '$("#login-modal").modal("show");';
        }  else if ($_SESSION["emptyfield"]=="yes" OR $_SESSION["nomatch"]=="yes")  {
            echo '$("#signup-modal").modal("show");';
        } else if ($_SESSION["loggedin"]=="no") {
            echo '$("#landing-modal").modal("show");';
        } else {
            echo "loop();";
        }
        ?>
    });

</script>

<body>

<!--LANDING MODAL -->

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
            <input type="submit" class="button" data-dismiss="modal" value="Start drawing" onclick="loop()">
            <br><br>
        </div>
    </div>
</div>

<!--NEW USER MODAL -->

<div class="modal fade" id="newuser-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="login" class="modal-content">
            <button type="button" class="close" data-dismiss="modal" onclick="loop()">&times;</button>
            <img class="logo" src="./img/logo.png"/><br><br>
            <h1 class="title">Welcome!</h1>
            <p><p>Thank you <?= $_REQUEST['name']; ?>! You've successfully created your account! Go ahead and start drawing</p>
            <br>
            <input id="start-draw" type="submit" class="button" data-dismiss="modal" value="Start Drawing" onclick="loop()"  >
            <?php
            unset($_SESSION["newaccount"]);
            ?>
            <br><br>
        </div>
    </div>
</div>



<!--MODAL LOGIN & SIGN UP POPUPS -->

<!-- Log in Modal -->
<div class="modal" id="login-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="login" class="modal-content">


            <button type="button" class="close" data-dismiss="modal" onclick="loop()">&times;</button>
            <img class="logo" src="./img/logo.png"/><br>


            <form role="form" action="password.php" method="post">

                <div class="form-group">
                    <label for="username">Username:</label> <input type="text" name="username" placeholder="Username"><br>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label> <input type="password" name="password" placeholder="Password"><br>
                </div>

                <?php
                if ($_SESSION['error']=="yes"){
                    echo '<div class="redtext">Incorrect login, please try again.</div>';
                }
                ?>
                <br>

                <input type="submit" class="button" value="Log in">

            </form>


            <br>

            <p>
                Don't have an account? <a type="button" data-dismiss="modal" id="signup-button">Sign up.</a>
                <br>
                <a href="recovery.php" >Forgot password?</a>
            </p>

        </div>

    </div>
</div>


<!-- Sign up Modal -->
<div class="modal" id="signup-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="login" class="modal-content">


            <button type="button" class="close" data-dismiss="modal" onclick="loop()">&times;</button>
            <img class="logo" src="./img/logo.png"/><br>


            <form role="form" action="newuserconfirm.php">

                <div class="form-group">
                    <label for="name">Username:</label> <input type="text" name="name" placeholder="Enter username"><br>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><input type="text" name="email" placeholder="name@company.com"><br>
                </div>
                <div class="form-group">
                    <label for="password1">Password:</label> <input type="password" name="password1" placeholder="Enter password"><br>
                    <input type="password" name="password2" placeholder="Re-enter password"><br>
                </div>

                <?php
                if ($_SESSION['emptyfield']=="yes"){
                    echo '<div class="redtext">Please fill in all the fields!</div>';
                    unset($_SESSION["emptyfield"]);
                } else if ($_SESSION['nomatch']=="yes"){
                    echo '<div class="redtext">Passwords do not match</div>';
                    unset($_SESSION["nomatch"]);
                }
                ?>
                <br>


                <input type="submit" class="button" value="Create new account">

            </form>
            <br>
            <p>
                Already have an account? <a type="button" data-dismiss="modal" id="login-button2">Login here.</a>
            </p>
            <?php
            unset($_SESSION["error"]);
            ?> <!--maybe make sure it's not just randomly unsetting sessions-->
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $("#login-button").click(function(){
            $("#login-modal").modal();
        });
        $("#login-button2").click(function(){
            $("#login-modal").modal();
        });
        $("#signup-button").click(function(){
            $("#signup-modal").modal();
        });

    });
</script>

    <nav>
        <a href="index.php"><img class="corner-logo" src="./img/logo.png"/></a>
        <div class="navlinks" id="topnav">
            <a onclick="controls()" id="controls-button">Controls</a>
            <a onclick="library()" id="library-button">Library</a>
            <a onclick="settings()" id="settings-button">Settings</a>
            <a onclick="instructions()" id="instructions-button">Instructions</a>
            <a href='reflora_search.php'>Search</a>
                <?php
                session_start();
                if($_SESSION["loggedin"] == "yes") {
                    echo "<a href='logout.php'>". " Welcome " . $_SESSION['username']. ", Logout". "</a>";
                } else {
                    echo "<a type='button' id='login-button' onclick='noLoop()'>". " Log in" . "</a>";
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

    </script>



<div class="sidebar" id="images">
    <?php include "imageupload.php"; ?>
    <i class="material-icons" id="close-x" onclick="library()">close</i>
    <p style="text-align: center;">Library</p>

    <?php
    $start = 1;
    $end = $start+2;
    $counter = $start;

    while ($row = mysqli_fetch_array($result)) {
        echo "<img src='images/".$row['image']."' >";
        if($end <= $counter) {
            break;
        }
        +$counter++;
    }
    ?>
    
    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image" >
        </div>
        <div>
            <button type="submit" name="upload" class="upload-button">POST</button>
        </div>
    </form>

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
        <input type="range" min="0" max="25" value="2" class="slider" id="rotSlider">

    </div>
    <br>
    <p>Angle <span id="aSlider-value" style="float:right;"></span></p>
    <div class="slider" id="aSlider-div">
        <input type="range" min="1" max="10000" value="1375" class="slider" id="aSlider">

    </div>
    <br>
    <p>Size <span id="sizeSlider-value" style="float:right;"></span></p>
    <div class="slider" id="sizeSlider-div">
        <input type="range" min="1" max="200" value="40" class="slider" id="sizeSlider">

    </div>
    <br>
    <p>Background · <span id="bgSlider-value" style="float:right;"></span></p>
    <div class="slider" id="bgSlider-div">
        <input type="range" min="1" max="255" value="50" class="slider" id="bgSlider">
    </div>
    <br>
    <br>
    <!--settings switch-->
<!--    <h6>Mouse Control</h6><input type="checkbox" checked="" id="mouse-control">-->

</div>


<div class="sidebar" id="controls">

    <i class="material-icons" id="close-x" onclick="controls()">close</i>
    <p style="text-align: center;">Controls</p>

    <input type="submit" value="Randomize" id="randomize-button" onclick="randomize()">
    <input type="submit" value="Restart" id="refresh-button" onclick="restart()">
    <input type="submit" value="Pause" id="pause-button" onclick="pause()">

    <script>
        function pause() {
            var text = document.getElementById("pause-button").value;
            if (text=="Pause") {
                noLoop();
                document.getElementById("pause-button").value = "Draw";
            } else {
                loop();
                document.getElementById("pause-button").value="Pause";
            }
        }

    </script>



    <form action="datacapture.php" method="post" target="_blank">

            <input type="hidden" name="rSlider" value="" id="rSlider-hidden"><br>
            <input type="hidden" name="gSlider" value="" id="gSlider-hidden"><br>
            <input type="hidden" name="bSlider" value="" id="bSlider-hidden"><br>
            <input type="hidden" name="rotSlider" value="" id="rotSlider-hidden"><br>
            <input type="hidden" name="aSlider" value="" id="aSlider-hidden"><br>
            <input type="hidden" name="bgSlider" value="" id="bgSlider-hidden"><br>
            <input type="hidden" name="sizeSlider" value="" id="sizeSlider-hidden"><br>
            <input type="submit" value="Save" id="save-button" onclick="screenshot()">
    </form>

    <iframe name="noreload" style="display:none;">
    </iframe>

    <br style="clear:both;">
</div>
<!--SLIDERS-->

    <script>

        var rSlider = document.getElementById("rSlider");
        var rSliderVal = document.getElementById("rSlider-value");
        var rSliderhidden = document.getElementById("rSlider-hidden");
        rSliderVal.innerHTML = rSlider.value; // Display the default slider value
        rSliderhidden.value = rSlider.value;
        rSlider.oninput = function() {
            rSliderVal.innerHTML = this.value; // Update the current slider value (each time you drag the slider handle)
            rSliderhidden.value = this.value;
        }

        var gSlider = document.getElementById("gSlider");
        var gSliderVal = document.getElementById("gSlider-value");
        var gSliderhidden = document.getElementById("gSlider-hidden");
        gSliderVal.innerHTML = gSlider.value;
        gSliderhidden.value = gSlider.value;
        gSlider.oninput = function() {
            gSliderVal.innerHTML = this.value;
            gSliderhidden.value = this.value;
        }

        var bSlider = document.getElementById("bSlider");
        var bSliderVal = document.getElementById("bSlider-value");
        var bSliderhidden = document.getElementById("bSlider-hidden");
        bSliderVal.innerHTML = bSlider.value;
        bSliderhidden.value = bSlider.value;
        bSlider.oninput = function() {
            bSliderVal.innerHTML = this.value;
            bSliderhidden.value = this.value;
        }

        var rotSlider = document.getElementById("rotSlider");
        var rotSliderVal = document.getElementById("rotSlider-value");
        var rotSliderhidden = document.getElementById("rotSlider-hidden");
        rotSliderVal.innerHTML = rotSlider.value;
        rotSliderhidden.value = rotSlider.value;
        rotSlider.oninput = function() {
            rotSliderVal.innerHTML = this.value;
            rotSliderhidden.value = this.value;
        }

        var aSlider = document.getElementById("aSlider");
        var aSliderVal = document.getElementById("aSlider-value");
        var aSliderhidden = document.getElementById("aSlider-hidden");
        aSliderVal.innerHTML = aSlider.value;
        aSliderhidden.value = aSlider.value;
        aSlider.oninput = function() {
            aSliderVal.innerHTML = this.value;
            aSliderhidden.value = this.value;
        }

        var bgSlider = document.getElementById("bgSlider");
        var bgSliderVal = document.getElementById("bgSlider-value");
        var bgSliderhidden = document.getElementById("bgSlider-hidden");
        bgSliderVal.innerHTML = bgSlider.value;
        bgSliderhidden.value = bgSlider.value;
        bgSlider.oninput = function() {
            bgSliderVal.innerHTML = this.value;
            bgSliderhidden.value = this.value;
        }

        var sizeSlider = document.getElementById("sizeSlider");
        var sizeSliderVal = document.getElementById("sizeSlider-value");
        var sizeSliderhidden = document.getElementById("sizeSlider-hidden");
        sizeSliderVal.innerHTML = sizeSlider.value;
        sizeSliderhidden.value = sizeSlider.value;
        sizeSlider.oninput = function() {
            sizeSliderVal.innerHTML = this.value;
            sizeSliderhidden.value = this.value;
        }


    </script>


<div class="sidebar" id="instructions">
    <i class="material-icons" id="close-x" onclick="instructions()">close</i>
    <p style="text-align: center;">Instructions</p>
    <p>INTRO Originally modelled after phyllotaxis, the arrangement of leaves on an axis or stem, as explained by The Coding Train.</p>
    <p>Please be aware that resizing the window will restart the drawing!</p>
    <!--PROBABLY ADD BUTTONS HERE to search and things-->

</div>

<div id="sketch">
</div>



</body>
</html>

