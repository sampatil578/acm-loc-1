<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
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
								include 'sidenav.php';
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
					<div class="body">
						<div class="text" style="height: 450px; overflow: scroll;">
							<h2>Edit Profile</h2>
							<div style="margin: 5px;">
								<form class="search" method="post" name="form1">
									<div class="login">
									<br>
								    <input type="text" name="email" placeholder="New Email" required=""><br><br>
								    <input type="password" name="password" placeholder="New Password" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="update" value="Edit" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 

	if(isset($_POST['update'])){
		if(isset($_SESSION['login_user'])){
			mysqli_query($db,"UPDATE students SET password='$_POST[password]',email='$_POST[email]' WHERE username='$_SESSION[login_user]';");
			?>
			<script type="text/javascript">
				alert("The Profile is Updated.");
				window.location="profile.php";
			</script>
			<?php
		}
		if(isset($_SESSION['login_admin'])){
			mysqli_query($db,"UPDATE admin SET password='$_POST[password]',email='$_POST[email]' WHERE username='$_SESSION[login_admin]';");
			?>
			<script type="text/javascript">
				alert("The Profile is Updated.");
				window.location="profile.php";
			</script>
			<?php
		}
	}

	?>
	<script src="bb.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>