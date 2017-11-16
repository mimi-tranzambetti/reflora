//originally modelled after phyllotaxis, as explained by the one and only coding train
//move your mouse to start

var n = 0;
var c = 18; //changing c is really really fun! i wanted to spend more time figuring out how to change it permanently while drawing so the user could fiddle with it but i realized that changing in it in the draw() function will actually just break the code which is nice for capturing sketches you like

var start = 0;

function setup() {
    
    
  var canvas = createCanvas(windowWidth, windowHeight);
  canvas.parent('sketch');
  angleMode(DEGREES); //since p5.js default mode is in radians
  colorMode(RGB);
  background(random(0,255)); //random grayscale backgrounds only


  //settingsDiv = createDiv('<p>Surprise Div!</p>');
  //settingsDiv.addClass('container'); // could be an extra image div

  rSlider = createSlider(0, 255, 255);
  rSlider.position(windowWidth-(20+rSlider.width), 110);
  gSlider = createSlider(0, 255, 10);
  gSlider.position(windowWidth-(20+gSlider.width), 145);
  bSlider = createSlider(0, 255, 10);
  bSlider.position(windowWidth-(20+bSlider.width), 180);
  rotSlider = createSlider(0, 100, 5);
  rotSlider.position(windowWidth-(20+rotSlider.width), 215);
  aSlider = createSlider(0, 20000, 1375);
  aSlider.position(windowWidth-(20+aSlider.width), 255);
  bgSlider = createSlider(0, 255, 150);
  bgSlider.position(windowWidth-(20+aSlider.width), 295);
  sizeSlider = createSlider(1, windowWidth/4, 2);
  sizeSlider.position(windowWidth-(20+sizeSlider.width), 325);

  saveButton = createButton('Save');
  saveButton.style("background-color", "#9B2C2C");
  saveButton.style("border", "none");
  saveButton.style("color", "white");
  saveButton.style("padding", "5px 5px");
  saveButton.style("display", "inline-block");
  saveButton.style("font size", "12px");
  saveButton.style("cursor", "pointer");
  saveButton.style("height", "5%");
  saveButton.style("width", "5%");
  saveButton.position(windowWidth-100, windowHeight-250);

  saveButton.mouseClicked(screenshot);

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

    //   var ar = (r/255)*100;
    //   var ag = (g/255)*100;
    //   var ab = (b/255)*100;

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

    rSlider.position(windowWidth-(20+rSlider.width), 110);
    gSlider.position(windowWidth-(20+gSlider.width), 145);
    bSlider.position(windowWidth-(20+bSlider.width), 180);
    rotSlider.position(windowWidth-(20+rotSlider.width), 215);
    aSlider.position(windowWidth-(20+aSlider.width), 255);
    bgSlider.position(windowWidth-(20+bgSlider.width), 295);
    sizeSlider.position(windowWidth-(20+sizeSlider.width), 325);
    saveButton.position(windowWidth-100, windowHeight-250);


    background(bgSlider.value());

}

function screenshot(){
    saveCanvas('reflora', 'jpg');
}
