<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Students Information</title>
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
					<div class="body">
						<div class="text" style="height: 450px; overflow: scroll;">
							<h2>List of Students</h2>
							<div style="margin: 5px;">
								<form class="search" method="post" name="form1">
									<div>
										<input type="text" name="search" placeholder="search usernames.." style="width: 80%;">
										<button type="submit" name="submit" class="btn btn-default" style="height:32px; width: 19%; background-color: #800000;">
											<span class="glyphicon glyphicon-search" style="color: white; text-align: center;">Search</span>
										</button>
									</div>
								</form>
							</div>

							<?php

							if(isset($_POST['submit'])){
							$q = mysqli_query($db,"SELECT first,last,username,adm_no,email from students where username like '%$_POST[search]%' ");

							if(mysqli_num_rows($q)==0){
							echo "<h2>Sorry. No Students found.</h2>";
						}

						else{
						echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
							    	echo "<th>"; echo "Firstname"; echo "</th>";
							    	echo "<th>"; echo "Lastname"; echo "</th>";
							    	echo "<th>"; echo "Username"; echo "</th>";
							    	echo "<th>"; echo "Adm_no"; echo "</th>";
							    	echo "<th>"; echo "Email"; echo "</th>";
							    echo "</tr>";

							    while($row = mysqli_fetch_assoc($q)){
							    echo "<tr style='color: white;'>";
							    	echo "<th>"; echo $row['first']; echo "</th>";
							    	echo "<th>"; echo $row['last']; echo "</th>";
							    	echo "<th>"; echo $row['username']; echo "</th>";
							    	echo "<th>"; echo $row['adm_no']; echo "</th>";
							    	echo "<th>"; echo $row['email']; echo "</th>";
							    echo "</tr>";
							}
						echo "</table>";

					}

						}

						else{


							$res = mysqli_query($db,"SELECT first,last,username,adm_no,email from students ORDER BY `students`.`first` ASC;");

							echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
							    	echo "<th>"; echo "Firstname"; echo "</th>";
							    	echo "<th>"; echo "Lastname"; echo "</th>";
							    	echo "<th>"; echo "Username"; echo "</th>";
							    	echo "<th>"; echo "Adm_no"; echo "</th>";
							    	echo "<th>"; echo "Email"; echo "</th>";
							    echo "</tr>";

							    while($row = mysqli_fetch_assoc($res)){
							    echo "<tr style='color: white;'>";
							    	echo "<th>"; echo $row['first']; echo "</th>";
							    	echo "<th>"; echo $row['last']; echo "</th>";
							    	echo "<th>"; echo $row['username']; echo "</th>";
							    	echo "<th>"; echo $row['adm_no']; echo "</th>";
							    	echo "<th>"; echo $row['email']; echo "</th>";
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
	<script src="bb.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>