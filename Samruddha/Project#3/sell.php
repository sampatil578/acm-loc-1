<?php
session_start();
include 'connections.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell Items</title>
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
							<h2>Sell Items</h2><br>
							<form class=login name="sell" action="" method="post">
								<input type="text" name="name" placeholder="Item Name" required=""><br><br>
								<input type="text" name="brand" placeholder="Item Brand" required=""><br><br>
								<input type="text" name="quantity" placeholder="Quantity" required=""><br><br>
								<input type="text" name="price" placeholder="Price" required=""><br><br>
								<input type="text" name="descr" placeholder="Item Description" required=""><br><br>
								<input type="file" name="file"><br><br>
								<input  class="btn btn-default" type="submit" name="submit" value="Sell" style="color: black; background-color:white; width:70px; height: 30px; padding: 0px; text-align: center;"><br><br>
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

	mysqli_query($db,"INSERT INTO `sell` VALUES ('$_SESSION[login_user]','$_POST[name]','$_POST[brand]','$_POST[quantity]','$_POST[price]','$_POST[descr]','$_POST[file]');");

	?>
	<script type="text/javascript">
		alert('Ad Uploaded');
	</script>
	<?php
}
?>

</body>
</html>