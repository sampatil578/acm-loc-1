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
							<h2>Rules :-</h2>
							<ul>
								<li>Player has only 3 lives</li>
								<li>Two buttons at the bottom helps to move the paddle to the left and right direction respectively.</li>
								<li>Endless Mode contains infinite number of levels and Leaderboard also. Play as long as you can.</li>
								<li>Speed of the ball or the number of tiles increases according to level in the endless mode.</li>
							</ul>
							<form name="start" method="post">
							<input  class="btn btn-default" type="submit" name="submit" value="Start Game" style="color: white; background-image: linear-gradient(to right,black,grey,black); width:34%; height: 30px; margin-left: 33%; padding: 0px; text-align: center;"><br><br>
						</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php

if(isset($_POST['submit'])){
	?>
	<script type="text/javascript">
		window.location="modes.php"
	</script>
<?php
}

?>
</body>