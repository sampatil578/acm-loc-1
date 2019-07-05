<?php
session_start();
include 'connections.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="header">
				<h1>OLX@IITISM</h1>
			</div>
			<div class="row no-gutters">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
						include "sidenav.php";
					?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="body">
						<div class="text">
							<h1>My Cart</h1><br>
							<div class="container">
								<div class="row no-gutters">
									<?php
									$q = mysqli_query($db,"SELECT * FROM cart WHERE username='$_SESSION[login_user]' AND quantity!='0'");
									$b = 0;
									while ($row = mysqli_fetch_assoc($q)){
										$b = $b + 1;
										?>
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										    <div class="ad" style="height: 325px;">
										    	<?php
											echo "<img src='".$row['file']."'>"; 
											echo "<h3 style=color:black;>Rs. ".$row['price']."/- (each)</h3>";
											echo "<p style=color:black;>".$row['name']."</p>";
											
											echo '<form name="bt" method="post"><input  class="btn btn-default" type="submit" name="'.$b.'" value="See Details" style="color: white; background-color: #212979; width:96%; height: 40px; margin: 0px 2%; text-align: center;"></form>';
											if(isset($_POST[$b])){
												$_SESSION['ads'] = $b;
												?>
												<script type="text/javascript">
													window.location="ads.php"
												</script>
												<?php
											}
											$a = mysqli_query($db,"SELECT name,hostel,rm_no FROM users WHERE username='$row[username]';");
											$row2 = mysqli_fetch_assoc($a);
											echo "<p style=color:black;> By ".$row2['name']."<br>@ ".$row2['hostel']." ".$row2['rm_no']."</p>";
											?>
										    </div>
									    </div>
										<?php
									}
									?>
								</div>
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