<?php
include "connections.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
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
					<div class="bodys">
						<div class="text">
							<h1>IIT ISM Library</h1>
							<h2>Student Login</h2>
							<form name="login" action="" method="post">
								<div class="login">
									<br><br>
								    <input type="text" name="username" placeholder="Username" required=""><br><br>
								    <input type="password" name="password" placeholder="Password" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
								</div>
							</form>
							<p><a href="update_password.php" style="color: white;">Forgot Password?</a> &nbsp &nbsp <a href="registration.php" style="color: white;">Sign up</a><br><br></p>
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
	$res=mysqli_query($db,"SELECT * FROM `students` WHERE username='$_POST[username]' && password='$_POST[password]';");
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
    $_SESSION['pic'] = $row['pic'];
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