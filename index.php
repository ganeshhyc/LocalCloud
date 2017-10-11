<?php
include("conf.php");
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['pass']))
	
		header('Location: single.php');
?>

<!DOCTYPE html><html lang="en">
<head>

	<meta charset="utf-8">
	<title>Home</title>
	<meta name="author" content="#">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<link rel="stylesheet" href="css/menu.css">
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	

</head>

<body class="home-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
				   <li class="active"><a href='#'><span>HOME</span></a></li>
				   <li><a href='login.php'><span>LOGIN</span></a> </li>
				   <li><a href='signup.php'><span>Signup</span></a></li>
				   <li><a href='#'><span>About</span></a></li>
				</ul>
			</div>
			<div class="custom-banner">
				<img src="images/main.jpg">
			</div>
		</div>
		<section id="container">
			<div class="wrap-container">
				<section class="content-box boxstyle-1 box-1">
					<div class="zerogrid">
						<div class="row wrap-box">
							<div class="col-1-3">
								<div class="wrap-col">
									<p style="font-size: 1.9rem; font-weight: 300; letter-spacing: .19em; color: #fff; margin-bottom: .62em;">About Us</p>
									<p>
										<div class="uppercase">
											Student Unlimited Cloud Storage
										</div>
									</p>
								</div>
							</div>
							<div class="col-1-3">
								<div class="wrap-col">
									<div class="row">
										<h3 class="widget-title">Where to Find Us</h3>
										<address>
											<strong>LENDI COLLEGE, VZM</strong>
										
										</address>
										<p>
											<strong>Opening Hours:</strong>
											<br>
											Mon - Fri: 9:00 - 21:00
											<br>
											Sat - Sun: 9:00 - 12:00
										</p>
									</div>
								</div>
							</div>
							<div class="col-1-3">
								<div class="wrap-col">
									<div class="row">
										<h3 class="widget-title">About Us</h3>
										<p>We provide a huge amount of space for the student as well as for the staff, a motive duty for the next Gen.
										<br>
										<br>
										Get unlimited storage, say no to private uploaders
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

		<footer>
			
			<div class="copyright">
				<div class="zerogrid wrapper">
					Copyright @ Lendi - <a href="#" target="_blank" rel="nofollow">Cloud@lendi</a>
					<ul class="quick-link">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms of Use</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>