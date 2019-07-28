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
						<div class="n4">
							<h1>Break-a-Brick</h1>
						</div>
					</div>
				</div>
				<div class="row no-gutters">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="n2">
							<h2>Select Modes</h2>
							<a href="game1.php"><button>Easy</button></a>
							<a href="game2.php"><button>Medium</button></a>
							<a href="game3.php"><button>Hard</button></a>
							<a href="game.php"><button>Endless</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>