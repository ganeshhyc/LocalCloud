<?php
include 'conn.php';
session_start();
ob_start();
if((isset($_SESSION['user11']))||(isset($_SESSION['pass11'])))
{header('Location: ex.php');}
?><center>
<form id="f2" method="post" action="">

<h1>LOGIN FORM</h1><br><br><br>
username<br>
<input type="text" placeholder="username" name="user" required><br><br>
password<br>
<input type="password" placeholder="password" name="pass" required><br><br>
<br>
<input type="submit" value="submit" name="login" >
</form></center>
<?php
if(isset($_POST['login'])){
	$u=$_POST['user'];
$p=$_POST['pass'];
$q=mysql_query("select * from gannu where user='$u' and pass='$p' ");
if(mysql_num_rows($q)>0)
{
		$_SESSION['user11']=mysql_real_escape_string($u);
		$_SESSION['pass11']=mysql_real_escape_string($p);
	header('Location: ex.php');
}else
	echo "login failed";
}


?>