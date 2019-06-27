<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Return Books</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row no-gutters">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="header">
						<h1>IIT ISM Library</h1>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<div class="row no-gutters">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="sb">
							    <?php
								include "sidenav.php";
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
					<div class="body" style="overflow: scroll;">
						<div class="text">
                                <br>
                                <h2>Return Books</h2>
                                <form name="ret" action="" method="post">
                                <div class="login">
                                    <input type="text" name="username" placeholder="Username" required=""><br><br>
                                    <input type="text" name="bookid" placeholder="Book ID" required=""><br><br>
                                    <input type="text" name="ret" placeholder="Return Date (yyyy-mm-dd)" required=""><br><br>
                                    <input  class="btn btn-default" type="submit" name="submit2" value="approve" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
                                </div>
                            </form>
                                <?php
                                if(isset($_POST['submit2'])){
                                mysqli_query($db,"UPDATE issue SET status='returned' WHERE username='$_POST[username]' AND bookid='$_POST[bookid]';");
                                mysqli_query($db,"UPDATE books SET quantity = quantity + 1 WHERE bookid='$_POST[bookid]';");
                                $a = mysqli_query($db,"SELECT ret FROM issue WHERE username='$_POST[username]' AND bookid='$_POST[bookid]';");
                                $r = mysqli_fetch_assoc($a);
                                $b = strtotime($r['ret']);
                                $c = strtotime(date('Y-m-d'));
                                $d = floor(($c - $b)/(24*60*60));
                                if($d>=0){
                                	echo "$d";
                                	mysqli_query($db,"UPDATE students SET fine = fine + $d WHERE username='$_POST[username]';");
                                }
                            }
                            ?>
						</div>
					</div>
			    </div>
				</div>
			</div>
		</div>
	</div>
	<script src="bb.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>