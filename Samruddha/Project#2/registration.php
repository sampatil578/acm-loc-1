<?php
include "connections.php";

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
							<h2>Student Registration</h2>
							<form name="registration" action="" method="post">
								<div class="registration">
									<input type="text" name="first" placeholder="Firstname" required=""><br><br>
									<input type="text" name="last" placeholder="Lastname" required=""><br><br>
								    <input type="text" name="username" placeholder="Username" required=""><br><br>
								    <input type="password" name="password" placeholder="Password" required=""><br><br>
								    <input type="text" name="adm_no" placeholder="Admission No." required=""><br><br>
								    <input type="text" name="email" placeholder="Email" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="submit" value="register" style="color: black; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
								</div>
							</form>
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
    $sqlu="SELECT username from `students`";
    $resu = mysqli_query($db,$sqlu);

    while($row=mysqli_fetch_assoc($resu)){
    if($row['username']==$_POST['username']){
    $count = $count + 1;
}
}

    $count2=0;
    $sqla="SELECT adm_no from `students`";
    $resa = mysqli_query($db,$sqla);

    while($row2=mysqli_fetch_assoc($resa)){
    if($row2['adm_no']==$_POST['adm_no']){
    $count2 = $count2 + 1;
}
}

    if($count!=0){
	?>
	<script type="text/javascript">
		alert('Username Taken. Try another Username.');
	</script>
	<?php
}
else if($count2!=0){
	?>
	<script type="text/javascript">
		alert('Admission No. Taken. Login with your registered account.');
	</script>
	<?php
}
else{
	mysqli_query($db,"INSERT INTO `students` VALUES ('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[adm_no]','$_POST[email]','0');");

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