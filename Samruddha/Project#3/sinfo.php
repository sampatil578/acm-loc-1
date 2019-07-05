<?php
session_start();
include 'connections.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell History</title>
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
							<h1>OLX@IITISM</h1><br>
							<h2>Sell History</h2><br>
							<?php
							$r = mysqli_query($db,"SELECT name FROM users WHERE username='$_SESSION[login_user]'");
                                    $row3 = mysqli_fetch_assoc($r);
							$res = mysqli_query($db,"SELECT * from trade WHERE seller='$row3[name]';");

							echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
							    	echo "<th>"; echo "Buyer Name"; echo "</th>";
							    	echo "<th>"; echo "Product Name"; echo "</th>";
							    	echo "<th>"; echo "Product Brand"; echo "</th>";
							    	echo "<th>"; echo "Quantity"; echo "</th>";
							    	echo "<th>"; echo "Price per Item"; echo "</th>";
							    echo "</tr>";

							    while($row = mysqli_fetch_assoc($res)){
							    echo "<tr style='color: white;'>";
							    	echo "<th>"; echo $row['buyer']; echo "</th>";
							    	echo "<th>"; echo $row['name']; echo "</th>";
							    	echo "<th>"; echo $row['brand']; echo "</th>";
							    	echo "<th>"; echo $row['quantity']; echo "</th>";
							    	echo "<th>"; echo $row['price']; echo "</th>";
							    echo "</tr>";
							}
						echo "</table>"; 
							?>
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