<?php
include "connections.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Break-a-Brick</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="styling.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row no-gutters">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="n4">
									<h1>Break-a-Brick</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row no-gutters" id="n1">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							    <div class="n1">Score  <span id="score"></span></div>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="n1">Level  <span id="level"></span></div>
							</div>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="n1">Lives  <span id="lives"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row no-gutters">
					<canvas id="bb"></canvas>
				</div>
				<div class="row no-gutters"> 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <div id="go">
						    <div class="go">
							    <h1>Game Over</h1><br>
							    <ul>
								    <li>Your Score : <span id="scores"></span></li>
								    <li>Level Attained : <span id="levels"></span></li>
							    </ul>
							    <a href="modes.php"><button>Try Again</button></a>
						    </div>
					    </div>
				    </div>
				</div>
				<div class="row no-gutters"> 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <div id="yw">
						    <div class="yw">
							    <h1>YOU WIN</h1><br>
							    <ul>
								    <li>Your Score : <span id="scorew"></span></li>
							    </ul>
							    <a href="modes.php"><button>Try Again</button></a>
						    </div>
					    </div>
				    </div>
				</div>
				<div class="row no-gutters">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="n100"></div>
							</div>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="n3">
								    <div class="n3" >
									    <button id="left" onclick="goleft()"><span><<<</span></button>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="n4">
								    <div class="n3">
								 	    <button id="right" onclick="goright()"><span>>>></span></button>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="n100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<script type="text/javascript">
		const bb = document.getElementById("bb");

const n3 = document.getElementById("n3");
const n4 = document.getElementById("n4");
const n1 = document.getElementById("n1");
const yw = document.getElementById("yw");
const ctx = bb.getContext("2d");
const bimg = new Image();
bimg.src = "black.jpeg"


paddle_width = bb.width/5;
paddle_height = 5;
margin_bottom = 2;
ball_radius = 3;
let GAME_OVER = false;
let YOU_WIN = false;
let life = 3;
let m = 3;
let level = 1;
let score = 0;
let sp = 2;




const paddle = {
	x : bb.width/2 - paddle_width/2,
	y : bb.height - paddle_height - margin_bottom,
	width : paddle_width,
	height : paddle_height,
	dx : bb.width/10
}

const ball = {
	x : bb.width/2,
	y : paddle.y - ball_radius,
	radius : ball_radius,
	speed : sp,
	dx :  sp*(Math.random()*2-1),
	dy : -sp
}

const brick = {
	row : level,
	column : 5,
	width : bb.width/8,
	height : 5,
	offSetLeft : bb.width/16,
	offSetTop : 10,
	marginTop : 1,
	fillColor : "white"
}

let bricks = [];

function createBricks() {
	for(let r=0; r<brick.row; r++){
		bricks[r] = [];
		for(let c=0; c<brick.column; c++){
			bricks[r][c]={
				x : c*(brick.offSetLeft + brick.width) + brick.offSetLeft,
				y : r*(brick.offSetTop + brick.height) + brick.offSetTop + brick.marginTop,
				status: true
			}
		}
	}
}

createBricks();

function drawBricks(){
	for(let r=0; r<brick.row; r++){
		for(let c=0; c<brick.column; c++){
			let b=bricks[r][c];
			if(b.status){
				ctx.fillStyle = brick.fillColor;
				ctx.fillRect(b.x, b.y, brick.width, brick.height);
			}
		}
	}
}

function ballBrickCollision(){
	for(let r=0; r<brick.row; r++){
		for(let c=0; c<brick.column; c++){
			let b=bricks[r][c];
			if(b.status){
				if((ball.x+ball.radius>b.x)&&(ball.x-ball.radius<b.x+brick.width)&&(ball.y+ball.radius>b.y)&&(ball.y-ball.radius<b.y+brick.height)){
					ball.dy = - ball.dy;
					b.status = false;
					unit = level;
					score = score + unit;
				}
			}
		}
	}
}

function drawBall() {
	ctx.beginPath();
	ctx.arc(ball.x,ball.y,ball.radius,0,Math.PI*2);
	ctx.fillStyle = "white";
	ctx.fill();
}

function moveBall() {
	ball.x = ball.x + ball.dx;
	ball.y = ball.y + ball.dy;
}

function ballWallCollision() {
	if((ball.x + ball.radius>bb.width)||(ball.x<ball_radius)){
		ball.dx = -ball.dx;
	}

	if ((ball.y<ball_radius)){
		ball.dy = -ball.dy;
	}

	if(ball.y + ball.radius > bb.height){
		life--;
		ballReset();
	}
}

function ballReset() {
	ball.x = bb.width/2;
	ball.y = paddle.y - ball_radius;
	ball.dx = sp*(Math.random()*2-1);
	ball.dy = -sp;
}

function ballPaddleCollision(){
	if((ball.y>(bb.height-paddle.height-ball.radius))&&(ball.y<(bb.height-ball.radius))&&(ball.x>paddle.x)&&(ball.x<(paddle.x+paddle.width))){
		let collidePoint = ball.x - (paddle.x + paddle.width/2);
		collidePoint = collidePoint / (paddle.width/2);
		let angle = collidePoint*Math.PI/3;
		ball.dx = sp * Math.sin(angle);
		ball.dy = -sp * Math.cos(angle);
	}
}

function drawPaddle() {
	ctx.fillStyle = "white";
	ctx.fillRect(paddle.x,paddle.y,paddle.width,paddle.height);
}

function gameOver(){
	if(life <= 0){
		GAME_OVER = true;
	}
}

function youWin(){
	if(level > 3){
		YOU_WIN = true;
	}
}


function levelUp(){
	let isLevelDone = true;
	for(let r=0; r<brick.row; r++){
		for(let c=0; c<brick.column; c++){
			isLevelDone = isLevelDone && ! bricks[r][c].status;
		}
	}
	if(isLevelDone){
	    brick.row = level%3 + 1;
		createBricks();
		ballReset();
		if(level%3==0){
			sp++;
			if(sp>5)
				sp=5;
		}
		level++;
	}
}


function loop(){
	ctx.drawImage(bimg,0,0);
	drawPaddle();
	drawBall();
	drawBricks();
	moveBall();
	ballWallCollision();
	ballPaddleCollision();
	ballBrickCollision();
	gameOver();
	youWin();
	levelUp();
	document.getElementById("score").innerHTML = score;
	document.getElementById("lives").innerHTML = life;
	document.getElementById("level").innerHTML = level;
	if((!GAME_OVER)&&(!YOU_WIN)){
	requestAnimationFrame(loop);
}
else if(YOU_WIN){
	bb.style.display = "none";
	document.getElementById("scorew").innerHTML = score;
	document.getElementById("levels").innerHTML = level;
	yw.getElementsByClassName("yw")[0].style.display="block";
	n3.getElementsByClassName("n3")[0].style.display="none";
	n4.getElementsByClassName("n3")[0].style.display="none";
	n1.getElementsByClassName("n1")[0].style.display="none";
	n1.getElementsByClassName("n1")[1].style.display="none";
	n1.getElementsByClassName("n1")[2].style.display="none";
}
else{
	bb.style.display = "none";
	document.getElementById("scores").innerHTML = score;
	document.getElementById("levels").innerHTML = level;
	go.getElementsByClassName("go")[0].style.display="block";
	n3.getElementsByClassName("n3")[0].style.display="none";
	n4.getElementsByClassName("n3")[0].style.display="none";
	n1.getElementsByClassName("n1")[0].style.display="none";
	n1.getElementsByClassName("n1")[1].style.display="none";
	n1.getElementsByClassName("n1")[2].style.display="none";
}
}
	loop();

function goleft(){
	if(paddle.x >= paddle.dx){
	paddle.x=paddle.x-paddle.dx;}
}

function goright(){
	if(paddle.x < (bb.width-2*paddle.dx)){
	paddle.x=paddle.x+paddle.dx;}
}

	</script>
</body>
