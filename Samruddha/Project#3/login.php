<?php
session_start();
include 'connections.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
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
							<h2>User Login</h2>
							<form name="login" action="" method="post">
								<div class="login">
									<br>
								    <input type="text" name="username" placeholder="Username" required=""><br><br>
								    <input type="password" name="password" placeholder="Password" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
								</div>
							</form>
							<p><a href="update_password.php" style="color: white;">Forgot Password?</a> &nbsp &nbsp </p>
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

<?php

if(isset($_POST['submit'])){
	$count=0;
	$res=mysqli_query($db,"SELECT * FROM `users` WHERE username='$_POST[username]' && password='$_POST[password]';");
	$row = mysqli_fetch_assoc($res);
	$count=mysqli_num_rows($res);

	if($count==0){
	?>
	<script type="text/javascript">
		alert("The Username and Password doesn't match.");
	</script>
	<?php
}

else{
    $_SESSION['login_user'] = $_POST['username'];
	?>
	<script type="text/javascript">
		window.location="index.php"
	</script>
	<?php
}

}

?>


</body>
</html>