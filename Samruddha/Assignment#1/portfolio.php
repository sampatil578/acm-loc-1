<!DOCTYPE html>
<html>
<head>
	<!--title-->
	<title>Portfolio</title>
	<!--bootstrap-->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!--font-awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--CSS-->
  <link href="style.css" rel="stylesheet" type="text/css">

</head> 
<body>
	<header>
		<!--making a grid or layout using bootstrap-->
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row no-gutters">
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-12 col-md-12 col lg-12">
								<div id="hm">
								<div class="n1">
									<p class="name">Samruddha Patil</p>
									<p>A Web Developer</p>
								</div>
							</div>
							</div>
						</div>
						<div>
							<?php
							include 'sidenav.php';
							?>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="n3">
							<img src="sam.png" alt="image">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="ed">
					<h2>Education</h2>
						<div class="ed" onclick="myFunction(9)">Integrated Mtech</div>
							    <div class="eds">
							    	<span>Branch : Mathematics & Computing</span><br>
							    	<span>Duration : 2018-2023</span><br>
							    	<span>Institute : IIT ISM Dhanbad</span><br>
							    	<span>CGPA : 7.32/10</span>
							    </div>
						        <div class="ed" onclick="myFunction(10)">XII (Senior Secondary), Science</div>
						         <div class="eds">
							    	<span>Year of Completion: 2018</span><br>
							    	<span>HSC Board (Arihant College Of Arts Commerce And Science)</span><br>
							    	<span>Percentage : 83.00%</span>
							    </div>
						        <div class="ed" onclick="myFunction(11)">X (Secondary)</div>
						        <div class="eds">
						        	<span>Year of Completion: 2016</span><br>
						        	<span>SSC Board (A G High School Dapoli)</span><br>
						        	<span>Percentage : 97.40%</span>
						        </div><br><br>
						</div>
						<div id="pr">
							<h2>Projects</h2>
							<div class="container">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="row no-gutters">
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="assignment1.png">
												<p>My Portfolio Website</p>
												<button><a href="https://exegetical-boxcar.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="assignment2.jpeg">
												<p>Game of Thrones Quiz</p>
												<button><a href="https://quizgot.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="assignment3.png">
												<p>Break-a-Brick Game</p>
												<button><a href="https://breakabrick.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="project1.png">
												<p>Video Streaming</p>
												<button><a href="https://vsiitism.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="project2.png">
												<p>Library Management</p>
												<button><a href="http://gameofthronesquiz.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<div class="pr">
												<img src="project3.jpg">
												<p>OLX@IITISM</p>
												<button><a href="https://gotquiz.000webhostapp.com" style="color:black;">Visit Now</a></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="sk">
							<h2>Skills</h2>
							<table class='table table-bordered table-hover'>
							    <tr style='background-color: #212979; color: white;'>
							    	<th>Skill</th>
							    	<th>Level</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>HTML</th>
							    	<th>Advanced</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>CSS</th>
							    	<th>Advanced</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>JavaScript</th>
							    	<th>Intermediate</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>C Programming</th>
							    	<th>Advanced</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>Python</th>
							    	<th>Beginner</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>PHP</th>
							    	<th>Advanced</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>SQL</th>
							    	<th>Intermediate</th>
							    </tr>
							    <tr style='color: black;'>
							    	<th>jQuery</th>
							    	<th>Beginner</th>
							    </tr>
							</table>
						</div>
						<div id="ws">
							<h2>Work Samples</h2>
							<p>to Visit Work samples </p>
							<a href="https://github.com/sampatil578">Click here</a>
						</div>
						<div id="cm">
							<h2>Contact me</h2>
							<div class="container">
								<div class="row no-gutters">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						        		<div class="cm"><b>Contact No.</b><br><span>+916209274648</span></div>
						        	</div>
						        	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						        		<div class="cm"><b>Email-Id</b><br><span>sampatil578@gmail.com</span></div>
						        	</div>
						        	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						        		<div class="cm1"><a href="https://www.facebook.com/sam.patil.3914207"><i class="fa fa-facebook fa-2x"><br></i></a></div>
						        	</div>
						        	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						        		<div class="cm1"><a href="https://www.linkedin.com/in/samruddha-patil-4ab03617a/"><i class="fa fa-linkedin fa-2x"><br></i></a></div>
						        	</div>
						        	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						        		<div class="cm1"><a href="https://github.com/sampatil578"><i class="fa fa-github fa-2x"><br></i></a></div>
						        	</div>
						        </div>
						        </div>
						</div>
						</div>
					</div>
			</div>
		</div>
	</header>
<script src="bb.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>