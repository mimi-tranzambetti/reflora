//originally modelled after phyllotaxis, as explained by the one and only coding train
//move your mouse to start

var n = 0;
var c = 14; //changing c is really really fun! i wanted to spend more time figuring out how to change it permanently while drawing so the user could fiddle with it but i realized that changing in it in the draw() function will actually just break the code which is nice for capturing sketches you like

var start = "true";


var rSlider = document.getElementById("rSlider");
var gSlider = document.getElementById("gSlider");
var bSlider = document.getElementById("bSlider");
var rotSlider = document.getElementById("rotSlider");
var aSlider = document.getElementById("aSlider");
var bgSlider = document.getElementById("bgSlider");
var sizeSlider = document.getElementById("sizeSlider");

var settingsView = true;
var controlsView = false;
var infoView = false;
var libraryView = false;

var settingsButton = document.getElementById("#settings-button");
settingsButton.mouseClicked(settings());
function settings() {
    var settings = document.getElementById("settings");
    var info = document.getElementById("instructions");
    if (settingsView==false && infoView==false) {
        settings.style.display = "block";
        settingsView = true;
    } else if (settingsView==false && infoView==true){
        info.style.display = "none";
        infoView=false;
        settings.style.display = "block";
        settingsView=true;
    } else {
        settings.style.display = "none";
        settingsView=false;
    }
}


var infoButton = document.getElementById('#instructions-button');
infoButton.mouseClicked(instructions());
function instructions() {
    var settings = document.getElementById("settings");
    var info = document.getElementById("instructions");
    if(settingsView==true && infoView==false) {
        settings.style.display = "none";
        settingsView=false;
        info.style.display = "block";
        infoView=true;
    } else if(infoView==false && settingsView==false) {
        info.style.display = "block";
        infoView=true;
    } else {
        info.style.display = "none";
        infoView=false;
    }
}

var libraryButton = select('#library-button');
libraryButton.mouseClicked(library());
function library() {
    var images = document.getElementById("images");
    var controls = document.getElementById("controls");
    if (libraryView==false && controlsView==false) {
        images.style.display = "block";
        libraryView=true;
    } else if (libraryView==false&&controlsView==true){
        images.style.display = "block";
        libraryView=true;
        controls.style.display = "none";
        controlsView = false;
        }else {
        images.style.display = "none";
        libraryView=false;
    }
}

var controlsButton = select('#controls-button');
controlsButton.mouseClicked(controls());
function controls() {
    var images = document.getElementById("images");
    var controls = document.getElementById("controls");
    if (controlsView==false && libraryView==false) {
        controls.style.display = "block";
        controlsView=true;
    } else if (controlsView==false && libraryView==true){
        controls.style.display = "block";
        controlsView=true;
        images.style.display = "none";
        libraryView = false;
    }else {
        controls.style.display = "none";
        controlsView=false;
    }
}

function screenshot(){
    saveCanvas('reflora', 'jpg');
}

function restart(){
    loop();
    start = 'true';
    background(parseInt(bgSlider.value));
    n=0;
}


function setup() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('sketch');
    angleMode(DEGREES); //since p5.js default mode is in radians
    colorMode(RGB);
    background(random(0,255)); //random grayscale backgrounds only
    noLoop();
    frameRate(22);
}

function pause() {
    var button = document.getElementById("pause-button");
    if (button.value=="Pause") {
        noLoop();
        button.value = "Draw";
        start="false";
    } else {
        loop();
        button.value="Pause";
        start="true";
    }
}


function draw() {

    translate(windowWidth /2 , windowHeight/ 2);
    var rot = rotSlider.value;
    rotate(n * rot / 100);

    for (var i = 0; i < n; i++) {

        var magic = aSlider.value/10;
        var a = i * magic; //some math changing the angle here is kind of fun, but note that 137.5 is a very magical number
        var r = c * sqrt(i);
        var x = r * cos(a);
        var y = r * sin(a);

        var red = rSlider.value;
        var g = gSlider.value;
        var b = bSlider.value;

        var dimension = parseInt(sizeSlider.value);


        if(dimension>100){
            dimension = parseInt(sizeSlider.value);
        } else if (dimension<100){
            dimension = parseInt(sizeSlider.value)/6;
        }



        // //makes drawing shift temporarily in x direction
        // if (keyIsDown(UP_ARROW)){
        //     x+=100;
        // } else if (keyIsDown(DOWN_ARROW)) {
        //     x-=100;
        // }
        //
        // //makes drawing shift temporarly in y direction
        // if (keyIsDown(LEFT_ARROW)){
        //     y+=100;
        // } else if (keyIsDown(RIGHT_ARROW)) {
        //     y-=100;
        // }


        //resets background
        if (keyIsDown(ENTER)){ //set the slider, click enter to create a new background over the drawing
            background(parseInt(bgSlider.value));
            n=0;
        }

        if (dimension >= 33){
            noFill();
            strokeWeight(.5);
            stroke(red,g,b);
            rotate(-.1);
        } else if (dimension < 33) {
            noStroke();
            fill(red, g, b);
        } else {
        }

        ellipse(x, y, dimension, dimension);

    }
    n ++;
}



function windowResized(){

    loop();
    start = 'true';
    resizeCanvas(windowWidth, windowHeight);
    background(parseInt(bgSlider.value));
    n=0;

}

