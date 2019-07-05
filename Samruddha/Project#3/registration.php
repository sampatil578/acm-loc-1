<?php
include 'connections.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
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
							<h1>OLX@IITISM</h1>
							<h2>User Registration</h2>
							<form name="registration" action="" method="post">
								<div class="registration">
									<input type="text" name="name" placeholder="Name" required=""><br><br>
								    <input type="text" name="username" placeholder="Username" required=""><br><br>
								    <input type="password" name="password" placeholder="Password" required=""><br><br>
									<input type="text" name="hostel" placeholder="Hostel Name" required=""><br><br>
								    <input type="text" name="rm_no" placeholder="Room No." required=""><br><br>
								    <input type="text" name="email" placeholder="Email" required=""><br><br>
								    <input type="text" name="contact" placeholder="Contact" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php
if(isset($_POST['submit'])){

    $count=0;
    $res = mysqli_query($db,"SELECT username FROM `users`");

    while($row=mysqli_fetch_assoc($res)){
    if($row['username']==$_POST['username']){
    $count = $count + 1;
}
}

    if($count!=0){
	?>
	<script type="text/javascript">
		alert('Username Taken. Try another Username.');
	</script>
	<?php
}
else{
	mysqli_query($db,"INSERT INTO `users` VALUES ('$_POST[name]','$_POST[username]','$_POST[password]','$_POST[hostel]','$_POST[rm_no]','$_POST[email]','$_POST[contact]');");

	?>
	<script type="text/javascript">
		alert('Registration successfull');
	</script>
	<?php
}
}
?>

</body>
</html>