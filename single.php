

<?php
include("conf.php");

session_start();
if(!isset($_SESSION['user1'])&&!isset($_SESSION['pass1']))
	
		header('Location: index.php');
?><!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<title><?php  echo strtoupper($_SESSION['user1']); ?> </title>
	<meta name="author" content="#">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
	
	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<link rel="stylesheet" href="css/menu.css">
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	
	
</head>

<body class="single-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
				   <li><a href='logout.php'><span>Logout</span></a></li>
				</ul>
			</div>
		</div>

		<section id="container">
			<div class="wrap-container clearfix">
				<div id="main-content">
					<div class="crumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#"><?php  echo strtoupper($_SESSION['user1']); ?> </a></li>
						</ul>
					</div>
					<div class="wrap-content">
						<article>
							<div class="art-header">
								<h1 class="entry-title">WELCOME &nbsp<?php  echo strtoupper($_SESSION['user1']); ?> </h1>
							</div>
							<div class="art-content">
								<?php
		$user=$_SESSION['user1'];
		$pass=$_SESSION['pass1'];
		$pr=mysql_query("SELECT * from login where user='$user' and pass='$pass'");
		while($x=mysql_fetch_array($pr))
		{echo "
								<h2>Email ID: ".$x['email']."</h2>
								</br><h2>Phone No.: ".$x['contact']."</h2>
		</br><h2><img src='pic/".$x['pic']."' style='height:200px;width:auto;'></h2>";}?>
							<form method="post" action="" enctype="multipart/form-data">
		 <label for="files" class="btn"><font color="blue">click here to update your Pro-pic</font ></label>
		<input id="files" type="file" style="visibility:hidden;" name="img">
		<input type="submit" name="up" value="Change pic!" style="color:#9b534d;background-color:#f7bab5;height:30px;width:30%;font-size:15px;">
		</form>
		
		<footer>
			<div class="zerogrid wrap-footer">
				<div class="row">
					<div class="col-1-3 col-footer-1">
						<div class="wrap-col">
							<h3 class="widget-title">Upload Files</h3>
							<p>
							<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
		  div.style.cssText = 'position: fixed; top: 5%; left: 40%; z-index: 5000; width: 40%; text-align: center; background: none; border: 0px solid #000';
       
        img.src = 'load.GIF'; div.appendChild(img);
        document.body.appendChild(div);
        return true;
    }
</script>

		<form method="post" action="" runat="server"  onsubmit="ShowLoading()" enctype="multipart/form-data">
		<input type="file" name="data"></br></br>
		<input type="submit" class="load_button" id="upl" name="upl" value="upload file"style="color:#0f7847;background-color:#1ef391;height:30px;width:30%;font-size:15px;">
		</form>
		
		
		<div id="im"></div>
		
		<?php
		if(isset($_POST['up']))
		{
			if(empty($_FILES['img']['tmp_name'])){echo"select file!";}
			else{
					$pic=$_FILES['img']['name'];
					$n1=rand(0000,9999);
					$n2=rand(0000,9999);
					$pic=$n1.$n2.urlencode($pic);
					$target="pic/".$pic;
					mysql_query("UPDATE login SET pic='$pic' WHERE user='$user'");
					move_uploaded_file($_FILES['img']['tmp_name'],$target);
					header('Location: single.php');
			}
			
		}
		?>	

				
<?php
if (!file_exists('data/'.$user)) {
    mkdir('data/'.$user, 0755, true);
	
}
$data="data/".$user."/myfiles.txt";
$data1="data/".$user."/index.php";
$fp = fopen($data, "a"); 

fclose($fp);
$fp1 = fopen($data1, "w"); 
fwrite($fp1,"UNAUTHERIZED ENTRY");
fclose($fp1);
?>
		<?php
		if(isset($_POST['upl']))
		{
			if(empty($_FILES['data']['tmp_name'])){echo"select file!";}
			else{
					$pic=$_FILES['data']['name'];
					$n1=rand(0000,9999);
					$pic=$n1.urlencode($pic);
					//$pic=preg_replace('/\s+/','',$pic);
					$target="data/".$user."/".$pic;
					move_uploaded_file($_FILES['data']['tmp_name'],$target);
					date_default_timezone_set('Asia/Calcutta'); 
					$date = date('d-m-Y : h-i-s');
					$input ="( ".$date." ) ".$pic." <a href='".$target."'>Download</a></br>".PHP_EOL; 
					$fp = fopen($data, "a"); 
					fwrite($fp, $input).'&nbsp;'; 
					fclose($fp); 
					
					header('Location: single.php');
			}
			
		}
		?>
							</p>
						</div>
					</div>
					<div class="col-1-3 col-footer-2">
						<div class="wrap-col">
							<h3 class="widget-title">Your Files</h3>
							<ul>		<?php 

											$fp = fopen($data, "r");
											$i=1;
											while(!feof($fp)){
											echo "<li>";$chk=fgets($fp);echo $chk;
											echo "</li>";	

																		} 
													fclose($fp); 

 

															?>
							</ul>
						</div>
					</div>
				</div>
			</div>
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