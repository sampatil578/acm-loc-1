<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow: scroll;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 8px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php
  if(isset($_SESSION['login_user'])){
  	?>
        <ul>
            <li><a href="">
                <?php
                    echo "Welcome ".$_SESSION['login_user'].".";
                ?>
                </a>
            </li>
            <li><a href="index.php">Home</a></li>
	        <li><a href="profile.php">Profile</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	<?php
  }
  else if(isset($_SESSION['login_admin'])){
  	?>
        <ul>
            <li><a href="">
                <?php
                    echo "Welcome ".$_SESSION['login_admin'].".";
                ?>
                </a>
            </li>
            <li><a href="index.php">Home</a></li>
		    <li><a href="profile.php">Profile</a></li>
			<li><a href="stinfo.php">Student Information</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href='addbooks.php'>Add Books</a></li>
			<li><a href="bookr.php">Book Requests</a></li>
            <li><a href="req.php">Approve Book Requests</a></li>
            <li><a href="rbooks.php">Return Books</a></li>
            <li><a href="bbooks.php">Borrowed Books</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	<?php
  }
  else{
  	?>
        <ul>
            <li><a href="index.php">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="student_login.php">Student Login</a></li>
			<li><a href="admin_login.php">Admin Login</a></li>
		</ul>
	<?php
  }
  ?>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
  document.getElementById("main").style.marginLeft = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
