//originally modelled after phyllotaxis, as explained by the one and only coding train
//move your mouse to start

var n = 0;
var c = 18; //changing c is really really fun! i wanted to spend more time figuring out how to change it permanently while drawing so the user could fiddle with it but i realized that changing in it in the draw() function will actually just break the code which is nice for capturing sketches you like

var start = 0;

var sliders;
var rSlider;
var gSlider;
var bSlider;
var rotSlider;
var aSlider;
var bgSlider;
var sizeSlider;

var settingsView = false;
var infoView = false;
var libraryView = false;

var settingsButton = document.getElementById("#settings-button");
settingsButton.mouseClicked(settings());
function settings() {
    // settingsView=!settingsView
    var x = document.getElementById("settings");
    var y = document.getElementById("instructions");
    if (settingsView==false && infoView==false) {
        rSlider.style("display", "block");
        gSlider.style("display", "block");
        bSlider.style("display", "block");
        rotSlider.style("display", "block");
        aSlider.style("display", "block");
        bgSlider.style("display", "block");
        sizeSlider.style("display", "block");
        x.style.display = "block";
        settingsView = true;
    } else if (settingsView==false && infoView==true){
        y.style.display = "none";
        infoView=false;
        x.style.display = "block";
        rSlider.style("display", "block");
        gSlider.style("display", "block");
        bSlider.style("display", "block");
        rotSlider.style("display", "block");
        aSlider.style("display", "block");
        bgSlider.style("display", "block");
        sizeSlider.style("display", "block");
        settingsView=true;
    } else {
        rSlider.style("display", "none");
        gSlider.style("display", "none");
        bSlider.style("display", "none");
        rotSlider.style("display", "none");
        aSlider.style("display", "none");
        bgSlider.style("display", "none");
        sizeSlider.style("display", "none");
        x.style.display = "none";
        settingsView=false;
    }
}


var infoButton = document.getElementById('#instructions-button');
infoButton.mouseClicked(instructions());
function instructions() {

    var x = document.getElementById("instructions");
    var y = document.getElementById("settings");

    if(settingsView==true && infoView==false) {
        rSlider.style("display", "none");
        gSlider.style("display", "none");
        bSlider.style("display", "none");
        rotSlider.style("display", "none");
        aSlider.style("display", "none");
        bgSlider.style("display", "none");
        sizeSlider.style("display", "none");
        y.style.display = "none";
        settingsView=false;
        x.style.display = "block";
        infoView=true;
    } else if(infoView==false && settingsView==false) {
        x.style.display = "block";
        infoView=true;
    } else {
        x.style.display = "none";
        infoView=false;
    }
}


var libraryButton = select('#library-button');
libraryButton.mouseClicked(library());
function library() {
    var x = document.getElementById("images");
    if (libraryView===false) {
        x.style.display = "block";
        libraryView=true;
    } else {
        x.style.display = "none";
        libraryView=false;
    }
}


var saveButton = select('#camera-button');
saveButton.mouseClicked(screenshot);

function screenshot(){
    saveCanvas('reflora', 'jpg');
}

function setup() {

    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('sketch');
    angleMode(DEGREES); //since p5.js default mode is in radians
    colorMode(RGB);
    background(random(0,255)); //random grayscale backgrounds only

    rSlider = createSlider(0, 255, 94);
    rSlider.position(windowWidth-(50+rSlider.width), 190);
    rSlider.style("display", "none");

    gSlider = createSlider(0, 255, 121);
    gSlider.position(windowWidth-(50+gSlider.width), 225);
    gSlider.style("display", "none");

    bSlider = createSlider(0, 255, 221);
    bSlider.position(windowWidth-(50+bSlider.width), 260);
    bSlider.style("display", "none");

    rotSlider = createSlider(0, 100, 5);
    rotSlider.position(windowWidth-(50+rotSlider.width), 295);
    rotSlider.style("display", "none");

    aSlider = createSlider(0, 20000, 1375);
    aSlider.position(windowWidth-(50+aSlider.width), 335);
    aSlider.style("display", "none");

    bgSlider = createSlider(0, 255, 150);
    bgSlider.position(windowWidth-(50+aSlider.width), 375);
    bgSlider.style("display", "none");

    sizeSlider = createSlider(1, windowWidth/4, 20);
    sizeSlider.position(windowWidth-(50+sizeSlider.width), 405);
    sizeSlider.style("display", "none");

}


function draw() {

    translate(windowWidth /2 , windowHeight/ 2);
    var rot = rotSlider.value();
    rotate(n * rot / 100);

    for (var i = 0; i < n; i++) {

        var magic = aSlider.value()/10;
        var a = i * magic; //some math changing the angle here is kind of fun, but note that 137.5 is a very magical number
        var r = c * sqrt(i);
        var x = r * cos(a);
        var y = r * sin(a);

        var r = rSlider.value();
        var g = gSlider.value();
        var b = bSlider.value();

        if (sizeSlider.value() > 80){
            var dimension = sizeSlider.value();
        } else if (sizeSlider.value() <81) {
            var dimension = sizeSlider.value()/3;
        }

        // supposed to allow for more smooth sliding and variability on the low end the spectrum, not sure if it's workin
        //also should add input options to directly input values

        //makes drawing shift temporarily in x direction
        if (keyIsDown(UP_ARROW)){
            x+=100;
        } else if (keyIsDown(DOWN_ARROW)) {
            x-=100;
        }

        //makes drawing shift temporarly in y direction
        if (keyIsDown(LEFT_ARROW)){
            y+=100;
        } else if (keyIsDown(RIGHT_ARROW)) {
            y-=100;
        }

        //spacebar reverses rotate
        if (keyIsDown(32)){
            rotate(n*-.1);
        }

        //resets background
        if (keyIsDown(ENTER)){ //set the slider, click enter to create a new background over the drawing
            background(bgSlider.value());
        }

        if (dimension >= 10){
            noFill();
            strokeWeight(.5);
            stroke(r,g,b);
            rotate(-.1);
        } else if (dimension < 10) {
            noStroke();
            fill(r, g, b);
        } else {
        }

        ellipse(x, y, dimension, dimension);

        if (keyCode===27) {
            c++; //esc key breaks the for loop without messing up too much of the rest of drawing (will splatter some red dots around), but is handy for saving sketches -- a happy mistake while coding that i decided not to fix. EDIT: after several hours of playing around with this, I've found that you can also move your cursor all the way to the left to pause the sketch, where there is no fill and the ellipses that generate are invisible.
        }
    }
    n ++;
    start += 5;
}

function windowResized(){

    resizeCanvas(windowWidth, windowHeight);

    rSlider.position(windowWidth-(50+rSlider.width), 190);
    gSlider.position(windowWidth-(50+gSlider.width), 225);
    bSlider.position(windowWidth-(50+bSlider.width), 260);
    rotSlider.position(windowWidth-(50+rotSlider.width), 295);
    aSlider.position(windowWidth-(50+aSlider.width), 335);
    bgSlider.position(windowWidth-(50+bgSlider.width), 375);
    sizeSlider.position(windowWidth-(50+sizeSlider.width), 405);
    saveButton.position(windowWidth-400, 25);

    background(bgSlider.value());

}
