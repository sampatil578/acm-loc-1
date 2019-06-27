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
							<h1>My Profile</h1>
							<?php
							if(isset($_SESSION['login_user'])){
							?>
							<h2>
								<?php
								echo "Welcome ".$_SESSION['login_user'].".";
								?>
                            </h2>
								<?php
								    $q = mysqli_query($db,"SELECT * FROM `students` where username='$_SESSION[login_user]' ;");
								    $row = mysqli_fetch_assoc($q);
                                    
                                    echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> First Name: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['first']; 
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Last Name: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['last'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Username: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['username'];
                                            echo "</td>";
                                        echo "</tr>";
                                         echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Password: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['password'];
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Admission No.: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['adm_no'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Email: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['email'];
                                            echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Fine: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['fine']." Rs.";
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                }
                                if(isset($_SESSION['login_admin'])){
                                	?>
                                	<h2>
								<?php
								echo "Welcome ".$_SESSION['login_admin'].".";
								?>
                            </h2>
								<?php
								    $q = mysqli_query($db,"SELECT * FROM `admin` where username='$_SESSION[login_admin]' ;");
								    $row = mysqli_fetch_assoc($q);
                                    
                                    echo "<table class='table table-bordered' style='color:white;'>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> First Name: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['first']; 
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Last Name: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['last'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Username: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['username'];
                                            echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Password: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['password'];
                                            echo "</td>";
                                        echo "</tr>";
                                            echo "<td>";
                                                echo "<b> Contact: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['contact'];
                                            echo "</td>";
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<b> Email: </b>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['email'];
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                    ?>
                                    <p><a href="edit.php" style="padding:5px; color:black; background-color: white; align-self: center;">Edit Profile</a></p><br>
                                    <?php
                                }
                                if(isset($_SESSION['login_user'])){
                                ?>
                                <p><a href="edit.php" style="padding:5px; color:black; background-color: white; align-self: center;">Edit Profile</a></p>
                                <br>
                                <h2>Requested Books Info</h2>
                                <br>
                                <?php
                                $res = mysqli_query($db,"SELECT bookid,status,issue,ret from `issue` WHERE username='$_SESSION[login_user]'ORDER BY `issue`.`issue` ASC;");

							echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
							    	echo "<th>"; echo "Book ID"; echo "</th>";
							    	echo "<th>"; echo "Book Name"; echo "</th>";
							    	echo "<th>"; echo "Status"; echo "</th>";
							    	echo "<th>"; echo "Issue Date"; echo "</th>";
							    	echo "<th>"; echo "Return Date"; echo "</th>";
							    echo "</tr>";

							    while($row = mysqli_fetch_assoc($res)){
							    	$res1 = mysqli_query($db,"SELECT bookid,name from `books` WHERE bookid='$row[bookid]';");
							    	$row1 = mysqli_fetch_assoc($res1);
							    echo "<tr style='color: white;'>";
							    	echo "<th>"; echo $row['bookid']; echo "</th>";
							    	echo "<th>"; echo $row1['name']; echo "</th>";
							    	echo "<th>"; echo $row['status']; echo "</th>";
							    	echo "<th>"; echo $row['issue']; echo "</th>";
							    	echo "<th>"; echo $row['ret']; echo "</th>";

							    echo "</tr>";
							}
						echo "</table>";
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