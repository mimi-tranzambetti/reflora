//originally modelled after phyllotaxis, as explained by the one and only coding train
//move your mouse to start

var n = 0;
var c = 20; //changing c is really really fun! i wanted to spend more time figuring out how to change it permanently while drawing so the user could fiddle with it but i realized that changing in it in the draw() function will actually just break the code which is nice for capturing sketches you like

var start = 0;

function setup() {
    
    
  createCanvas(windowWidth* 3 / 4, windowHeight* 3 / 4);
  angleMode(DEGREES); //since p5.js default mode is in radians
  colorMode(RGB);
  background(random(0,255)); //random grayscale backgrounds only

}

function draw() { 


    

    
  for (var i = 0; i < n; i++) {
      
    var a = i * 137.5; //some math changing the angle here is kind of fun, but note that 137.5 is a very magical number
    var r = c * sqrt(i); 
    var x = r * cos(a);
    var y = r * sin(a);
    
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
    if (keyIsDown(ENTER)){ //i was testing this right before going to sleep and i think at some point the background stops responding to key presses....
        background(random(0,255));
    }
    
    noStroke()
    var hu = sin(start + i * 0.5);
    hu = map(hu, -1, 1, 0, 360);
    fill(255, hu/25, hu/25);

        
        //mouse changes dimension of ellipse
    //var dimension = random((mouseX/350),(mouseX/300));
    if (mouseX < windowWidth/10) {
                //toggle for fill colors black, white, CMY on the filled ellipses
        if (keyIsDown(81)){
            fill(0); // q - black
        } else if (keyIsDown(87)){
            fill(255,255,255); // w - white
        } else if (keyIsDown(69)){
            fill(random(220,255),255,random(0,20)); // e - variation of Y
        } else if (keyIsDown(82)){
            fill(255,random(0,20),random(220,255));   //r - variation of M 
        } else if (keyIsDown(84)){
            fill(random(0,20),random(220,255),255); //t - variation of C
        } else { 
            fill(mouseY/2, hu/25, hu/25); // toggles fill from black to red based on mouse y 
        }
        var dimension = mouseX/100; //super thin ellipses
    } else if (mouseX < windowWidth/2){
        
        //toggle for fill colors black, white, CMY on the filled ellipses
        if (keyIsDown(81)){
            fill(0); // q - black
        } else if (keyIsDown(87)){
            fill(255,255,255); // w - white
        } else if (keyIsDown(69)){
            fill(random(220,255),255,random(0,20)); // e - variation of Y
        } else if (keyIsDown(82)){
            fill(255,random(0,20),random(220,255));   //r - variation of M 
        } else if (keyIsDown(84)){
            fill(random(0,20),random(220,255),255); //t - variation of C
        } else { 
            fill(mouseY/2, hu/25, hu/25); // toggles fill from black to red based on mouse y 
        }
        var dimension = mouseX/70; //allows for fun stroke variance
    } else { //removes fill from ellipses which makes a totally different drawing but opens doors for possibilities
        var dimension = mouseX/3;
        noFill();
        strokeWeight(.5);
        if (mouseY<windowHeight/2){ //black stroke for upper right quadrant - handy for when background loads as too light
            stroke('rgba(0%,0%,0%,0.1)');
        } else { //white stroke for lower right quadrant - handy for when background loads as too dark
            stroke('rgba(100%,100%,100%,0.1)');
        }
        rotate(-.1);
    }
    
    ellipse(x, y, dimension, dimension); 
      
      if (keyCode===27) {
        c++; //ENTER key breaks the for loop without messing up too much of the rest of drawing (will splatter some red dots around), but is handy for saving sketches -- a happy mistake while coding that i decided not to fix. EDIT: after several hours of playinga round with this, I've found that you can also move your cursor all the way to the left to pause the sketch, where there is no fill and the ellipses that generate are invisible.
    } 
  }
  n ++;
  start += 5;
    
}

function windowResized(){
  resizeCanvas(windowWidth, windowHeight);
    background(random(0,255));
}

