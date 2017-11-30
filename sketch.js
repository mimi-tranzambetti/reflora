//originally modelled after phyllotaxis, as explained by the one and only coding train
//move your mouse to start

var n = 0;
var c = 15; //changing c is really really fun! i wanted to spend more time figuring out how to change it permanently while drawing so the user could fiddle with it but i realized that changing in it in the draw() function will actually just break the code which is nice for capturing sketches you like

var start = 0;


var rSlider = document.getElementById("rSlider");
var gSlider = document.getElementById("gSlider");
var bSlider = document.getElementById("bSlider");
var rotSlider = document.getElementById("rotSlider");
var aSlider = document.getElementById("aSlider");
var bgSlider = document.getElementById("bgSlider");
var sizeSlider = document.getElementById("sizeSlider");

var settingsView = false;
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
    if (libraryView===false) {
        images.style.display = "block";
        libraryView=true;
    } else {
        images.style.display = "none";
        libraryView=false;
    }
}

var refreshButton = select('#refresh-button');
refreshButton.mouseClicked(reset());
function reset() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('sketch');
    angleMode(DEGREES); //since p5.js default mode is in radians
    colorMode(RGB);
    background(random(0,255)); //random grayscale backgrounds only
}

// var saveButton = select('#camera-button');
// saveButton.mouseClicked(screenshot);

function screenshot(){
    saveCanvas('reflora', 'jpg');
}


function setup() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('sketch');
    angleMode(DEGREES); //since p5.js default mode is in radians
    colorMode(RGB);
    background(random(0,255)); //random grayscale backgrounds only
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

        var r = rSlider.value;
        var g = gSlider.value;
        var b = bSlider.value;

        var dimension = parseInt(sizeSlider.value);

        if(dimension>80){
            dimension = parseInt(sizeSlider.value);
        } else if (dimension<81){
            dimension = parseInt(sizeSlider.value)/3;
        }

        // var dimension = sizeSlider.value/1;

        // if(sizeSlider.value>80){
        //     var dimension = sizeSlider.value/1;
        //
        // } else if (sizeSlider.value()<81){
        //     var dimension=sizeSlider.value/3;
        // }

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
            background(bgSlider.value);
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

    //background slider doesn't work rn???

    background(bgSlider.value);

}
