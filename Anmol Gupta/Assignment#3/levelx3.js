const start = document.getElementById("start");
const game = document.getElementById("game");
const youlost = document.getElementById("youlost");
const youwon= document.getElementById("youwon");
const mobl = document.getElementById("mobleft");
const mobr = document.getElementById("mobright");
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
var ballRadius = 5;
var x = canvas.width/2;
var y = canvas.height-15;
var dx = 0;
var dy = -0;
var paddleHeight = 5;
var paddleWidth = 37.5;
var paddleX = (canvas.width-paddleWidth)/2;
var rightPressed = false;
var leftPressed = false;
var brickRowCount = 5;
var brickColumnCount = 7;
var brickWidth = 48;
var brickHeight = 10;
var brickPadding = 5;
var brickOffsetTop = 30;
var brickOffsetLeft = 15;
var score = 0;
var lives = 3;
var brickCount=21;
var bricks = [];
for(var c=0; c<brickColumnCount; c++) 
{
  bricks[c] = [];
  for(var r=0; r<brickRowCount; r++) 
  {
    if(r%2==0)
    {  
      bricks[c][r] = { x: 0, y: 0, status: 3 };   
    }
    else
    {
      bricks[c][r] = { x: 0, y: 0, status: 0 };
    }  
  }
}

document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
start.addEventListener("click",startGame);
canvas.addEventListener("click",speed);
mobl.addEventListener("touchstart",lefty);
mobr.addEventListener("touchstart",righty);
mobl.addEventListener("touchend",leftyc);
mobr.addEventListener("touchend",rightyc);
function lefty()
{
  leftPressed=true;
}
function righty()
{
  rightPressed=true; 
}
function leftyc()
{
  leftPressed=false; 
}
function rightyc()
{
  rightPressed=false; 
}
function startGame()
{
  start.style.display = "none";
  game.style.display="block";
}
function speed()
{
  dx=2;
  dy=-2;
}
function keyDownHandler(e) {
    if(e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = true;
    }
    else if(e.key == "Left" || e.key == "ArrowLeft") {
        leftPressed = true;
    }
}

function keyUpHandler(e) {
    if(e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = false;
    }
    else if(e.key == "Left" || e.key == "ArrowLeft") {
        leftPressed = false;
    }
}

function mouseMoveHandler(e) {
  var relativeX = e.clientX - canvas.offsetLeft;
  if(relativeX > paddleWidth/2 && relativeX < canvas.width-paddleWidth/2) {
    paddleX = relativeX - paddleWidth/2;
  }
}
function collisionDetection() {
  for(var c=0; c<brickColumnCount; c++) {
    for(var r=0; r<brickRowCount; r++) {
      var b = bricks[c][r];
      if(b.status >0) {
        if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) {
          dy = -dy;
          b.status --;
          if (b.status==0)
          { 
          score++;
          }
          if(score == brickCount) {
            game.style.display="none";
            youwon.style.display="block";
            window.cancelAnimationFrame();
          }
        }
      }
    }
  }
}

function drawBall() {
  ctx.beginPath();
  ctx.arc(x, y, ballRadius, 0, Math.PI*2);
  ctx.fillStyle = "#9d26c1";
  ctx.fill();
  ctx.closePath();
}
function drawPaddle() {
  ctx.beginPath();
  ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
  ctx.fillStyle = "#9d26c1";
  ctx.fill();
  ctx.closePath();
}
function drawBricks() {
  for(var c=0; c<brickColumnCount; c++) {
    for(var r=0; r<brickRowCount; r++) {
      if(bricks[c][r].status >0) {
        var brickX = (r*(brickWidth+brickPadding))+brickOffsetLeft;
        var brickY = (c*(brickHeight+brickPadding))+brickOffsetTop;
        bricks[c][r].x = brickX;
        bricks[c][r].y = brickY;
        ctx.beginPath();
        ctx.rect(brickX, brickY, brickWidth, brickHeight);
        if(bricks[c][r].status==1)
        {
          ctx.fillStyle = "#9d26c1";
        }
        else if(bricks[c][r].status==2)
        {
          ctx.fillStyle = "#bf036a";
        }
        else if(bricks[c][r].status==3)
        {
          ctx.fillStyle="#f2073e";
        }
        ctx.fill();
        ctx.closePath();
      }
    }
  }
}
function drawScore() {
  ctx.font = "16px Arial";
  ctx.fillStyle = "#9d26c1";
  ctx.fillText("Score: "+score, 8, 20);
}
function drawLives() {
  ctx.font = "16px Arial";
  ctx.fillStyle = "#9d26c1";
  ctx.fillText("Lives: "+lives, canvas.width-65, 20);
}

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawBricks();
  drawBall();
  drawPaddle();
  drawScore();
  drawLives();
  collisionDetection();

  if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
    dx = -dx;
  }
  if(y + dy < ballRadius) {
    dy = -dy;
  }
  else if(y + dy > canvas.height-ballRadius) {
    if(x > paddleX && x < paddleX + paddleWidth) {
      dy = -dy;
    }
    else {
      lives--;
      if(!lives) {
        game.style.display="none";
        youlost.style.display="block";
        window.cancelAnimationFrame();
      }
      else {
        x = canvas.width/2;
        y = canvas.height-15;
        dx = 0;
        dy = 0;
        paddleX = (canvas.width-paddleWidth)/2;
      }
    }
  }

  if(rightPressed && paddleX < canvas.width-paddleWidth) {
    paddleX += 7;
  }
  else if(leftPressed && paddleX > 0) {
    paddleX -= 7;
  }

  x += dx;
  y += dy;
  requestAnimationFrame(draw);
}

draw();