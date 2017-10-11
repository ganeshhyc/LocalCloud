<?php
include("conf.php");
session_start();
if(isset($_SESSION['user1'])&&isset($_SESSION['pass1']))
	
		header('Location: single.php');
?>
<!DOCTYPE html><html lang="en">
<head>

	<meta charset="utf-8">
	<title>Login</title>
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

<body class="archive-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
				   <li><a href='index.php'><span>HOME</span></a></li>
				   <li><a href='login.php'><span>LOGIN</span></a>  </li>
				   <li class="active"><a href='#'><span>SIGNUP</span></a></li>
				   <li><a href='#'><span>About</span></a></li>
				</ul>
			</div>
		</div>
		<section id="container">
			<div class="wrap-container clearfix">
				<div id="main-content">
					<div class="crumbs">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">SIGNUP</a></li>
						</ul>
					</div>
					<div class="zerogrid">
						<div class="wrap-content" style="padding: 60px;">
							<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">SIGNUP</h1>
							<article>
								<div class="col-1-2">
									<div class="art-header"></br>
										<img src="images/8.png"/>
									</div>
								</div>
								<div class="col-1-2">
									<div class="art-content t-center">
									
										<form action="" method="POST">
<input type="text" placeholder="Username*" name="user"  style="color:#e92c2b;background-color:#ffe299;height:30px;width:65%;font-size:15px;"required />
</br></br><input type="password" placeholder="Password*" name="pass" style="color:#e92c2b;background-color:#ffe299;height:30px;width:30%;font-size:15px;"/>
&nbsp&nbsp&nbsp&nbsp
<input type="password" placeholder="Confirm Pass*" name="cpass" style="color:#e92c2b;background-color:#ffe299;height:30px;width:30%;font-size:15px;"/></br></br>
<input type="email" placeholder="Email*" name="email" style="color:#e92c2b;background-color:#ffe299;height:30px;width:65%;font-size:15px;"/>
</br></br>
<input type="phone" placeholder="Phone no.*" name="phone" style="color:#e92c2b;background-color:#ffe299;height:30px;width:65%;font-size:15px;"/></br></br>

<input type="submit" value="Signin" name="signup"style="color:#0f7847;background-color:#1ef391;height:30px;width:30%;font-size:15px;"/>
&nbsp&nbsp&nbsp&nbsp
<input type="reset" value="Reset" name="re"style="color:#9b534d;background-color:#f7bab5;height:30px;width:30%;font-size:15px;"/>
</form>
										
										
										
					<?php
if(isset($_POST['signup']))
{
	$user=mysql_real_escape_string($_POST['user']);
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pr=mysql_query("SELECT * from login where user='$user'");
	if(mysql_num_rows($pr))
	{
			echo"<script>alert('Username already exists!');</script>";
	}else if($pass!=$cpass)
	{
		echo"<script>alert('Invalid Password!');</script>";
		
	}else{
		mysql_query("INSERT INTO login(user,pass,email,contact) VALUES('$user','$pass','$email','$phone')");
		$_SESSION['user1']=$user;
		$_SESSION['pass1']=$pass;
		header('Location: single.php');
	}
	
	
}


?>					
										
										
										
										
									</div>	
								</div>
							</article>
								
								
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