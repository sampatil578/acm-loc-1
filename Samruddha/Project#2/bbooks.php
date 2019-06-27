<?php
include "connections.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Borrowed Books</title>
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
                                <br>
                                <h2>Borrowed Books</h2>
                                <br>
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
                            $q = mysqli_query($db,"SELECT * from issue where username like '%$_POST[search]%' ");

                            if(mysqli_num_rows($q)==0){
                            echo "<h2>Sorry. No Books found.</h2>";
                        }

                        else{
                         echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
                                    echo "<th>"; echo "Username"; echo "</th>";
							    	echo "<th>"; echo "Book ID"; echo "</th>";
                                    echo "<th>"; echo "Book Name"; echo "</th>";
							    	echo "<th>"; echo "Status"; echo "</th>";
							    	echo "<th>"; echo "Issue Date"; echo "</th>";
							    	echo "<th>"; echo "Return Date"; echo "</th>";
							    echo "</tr>";

                                while($row = mysqli_fetch_assoc($q)){
                                    $res1 = mysqli_query($db,"SELECT bookid,name from `books` WHERE bookid='$row[bookid]';");
                                    $row1 = mysqli_fetch_assoc($res1);
                                    $d=date("Y-m-d");
                                    if($d > $row['ret']){
                                    	mysqli_query($db,"UPDATE issue SET status='expired' WHERE ret='$row[ret]' AND status='approved';");
                                    }
							    echo "<tr style='color: white;'>";
                                    echo "<th>"; echo $row['username']; echo "</th>";
							    	echo "<th>"; echo $row['bookid']; echo "</th>";
                                    echo "<th>"; echo $row1['name']; echo "</th>";
							    	echo "<th>"; echo $row['status']; echo "</th>";
							    	echo "<th>"; echo $row['issue']; echo "</th>";
							    	echo "<th>"; echo $row['ret']; echo "</th>";

							    echo "</tr>";
                            }
                        echo "</table>";

                    }

                        }

                        else{

                                $res = mysqli_query($db,"SELECT * from `issue` WHERE status='approved' OR status='expired' ;");

							echo "<table class='table table-bordered table-hover'>";
							    echo "<tr style='background-color: white;'>";
                                    echo "<th>"; echo "Username"; echo "</th>";
							    	echo "<th>"; echo "Book ID"; echo "</th>";
                                    echo "<th>"; echo "Book Name"; echo "</th>";
							    	echo "<th>"; echo "Status"; echo "</th>";
							    	echo "<th>"; echo "Issue Date"; echo "</th>";
							    	echo "<th>"; echo "Return Date"; echo "</th>";
							    echo "</tr>";

							    while($row = mysqli_fetch_assoc($res)){
                                    $res1 = mysqli_query($db,"SELECT bookid,name from `books` WHERE bookid='$row[bookid]';");
                                    $row1 = mysqli_fetch_assoc($res1);
                                    $d=date("Y-m-d");
                                    if($d > $row['ret']){
                                    	mysqli_query($db,"UPDATE issue SET status='expired' WHERE ret='$row[ret]' AND status='approved';");
                                    }
							    echo "<tr style='color: white;'>";
                                    echo "<th>"; echo $row['username']; echo "</th>";
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