<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Books</title>
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
							<h2>Add Books</h2>
							<form name="registration" action="" method="post">
								<div class="registration">
									<input type="text" name="bookid" placeholder="Book ID" required=""><br><br>
									<input type="text" name="name" placeholder="Name of the Book" required=""><br><br>
								    <input type="text" name="authors" placeholder="Authors" required=""><br><br>
								    <input type="text" name="edition" placeholder="Edition" required=""><br><br>
								    <input type="text" name="status" placeholder="Status(Available or not)" required=""><br><br>
								    <input type="text" name="quantity" placeholder="Quantity" required=""><br><br>
								    <input type="text" name="dept" placeholder="Department" required=""><br><br>
								    <input  class="btn btn-default" type="submit" name="submit" value="Add Book" style="color: black; width:100px; height: 30px; padding: 0px; text-align: center;"><br><br>
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
    $sqlu="SELECT username from `books`";
    $resu = mysqli_query($db,$sqlu);

    while($row=mysqli_fetch_assoc($resu)){
    if($row['bookid']==$_POST['bookid']){
    $count = $count + 1;
}
}

    if($count!=0){
	?>
	<script type="text/javascript">
		alert('Already a book with given ID.');
	</script>
	<?php
}
else{
	mysqli_query($db,"INSERT INTO `books` VALUES ('$_POST[bookid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[dept]');");

	?>
	<script type="text/javascript">
		alert('Book added successfully.');
	</script>
	<?php
}
}
?>

</body>
</html>