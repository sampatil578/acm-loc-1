<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
						<h1>OLX@IITISM</h1>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
						include "sidenav.php";
					?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="body" style="overflow: scroll;">
						<div class="text">
							<h1>My Profile</h1>
							<h2>
								<?php
								echo "Welcome ".$_SESSION['login_user'].".";
								?>
                            </h2>
								<?php
								    $q = mysqli_query($db,"SELECT * FROM `users` where username='$_SESSION[login_user]' ;");
								    $row = mysqli_fetch_assoc($q);
                                    
                                    echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Name: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['name']; 
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Username: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['username'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Hostel: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['hostel'];
                                            echo "</td>";
                                        echo "</tr>";
                                         echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Room No.: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['rm_no'];
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Email: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['email'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Contact: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['contact'];
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
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