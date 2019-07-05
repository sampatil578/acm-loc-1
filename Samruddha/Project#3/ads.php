<?php
session_start();
include 'connections.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buy Items</title>
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
							<?php
							$c = 0;
							$b = $_SESSION['ads'];
							$q = mysqli_query($db,"SELECT * from cart ");
								while ($row = mysqli_fetch_assoc($q)){
									$c = $c + 1;
									if($c==$b){
										?>
										<div class="bb">
											<?php
											echo "<img src='".$row['file']."'>"; 
											echo "<h2> Rs.".$row['price']."/-(each)</h2>";
											echo "<h3>Product Details : </h3>";
											echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Product Name:</b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['name']; 
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Product Brand: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['brand'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Quantity Available: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['quantity'];
                                            echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Product Description: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['descr'];
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                    echo "<h3>Seller Details : </h3>";
                                    $a = mysqli_query($db,"SELECT name,hostel,rm_no,email,contact FROM users WHERE username='$row[username]';");
											$row2 = mysqli_fetch_assoc($a);
                                    echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Name:</b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row2['name']; 
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Address: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row2['hostel']." ".$row2['rm_no'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Email: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row2['email'];
                                            echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Contact at: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row2['contact'];
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                    echo '<form name="bt" method="post"><input style="width:30%; height: 30px; margin: 0px 35%;" type="text" name="quantity" placeholder="Quantity" required=""><br><br><input  class="btn btn-default" type="submit" name="submit" value="Buy Now" style="color: white; background-color: #212979; width:30%; height: 40px; margin: 0px 35%; text-align: center;"></form>';
                                    $r = mysqli_query($db,"SELECT name FROM users WHERE username='$_SESSION[login_user]'");
                                    $row3 = mysqli_fetch_assoc($r);
                                    if(isset($_POST['submit'])){
                                        if($_POST['quantity']<=$row['quantity']){
                                            mysqli_query($db,"INSERT INTO `trade` VALUES ('$row3[name]','$row[name]','$row[brand]','$_POST[quantity]','$row[price]','$row2[name]');");
                                        }
                                        else{
                                            ?>
                                            <script type="text/javascript">
                                                alert('stock is incomplete. Reduce the quantity.')
                                            </script>
                                            <?php 
                                        }
                                        mysqli_query($db,"UPDATE cart SET quantity = quantity - $_POST[quantity] WHERE name='$row[name]'");
                                        mysqli_query($db,"UPDATE sell SET quantity = quantity - $_POST[quantity] WHERE name='$row[name]'");
                                        mysqli_query($db,"DELETE FROM `cart` WHERE username='$_SESSION[login_user]' AND name='$row[name]'");
                                    }
											?>
											</div>
										<?php
									}
								}
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