<?php
include("conf.php");
session_start();
if(isset($_SESSION['user1'])&&isset($_SESSION['pass1']))
	
		header('Location: home.php');
?>

<center>
<form method="post" action="">
<h1>WELCOME TO LENDI CLOUD</h1></br>
<h3>LOGIN FORM</h3><br>
Reg No.<br>
<input type="text" placeholder="Reg No." name="user" required><br><br>
password<br>
<input type="password" placeholder="password" name="pass" required><br><br>
<br>
<input type="submit" value="Login" name="login" >
</form><br><form method="post" action="">

<h3>Signup FORM</h3>
Reg no.<br>
<input type="text" placeholder="Reg No." name="user" required><br><br>
password<br>
<input type="password" placeholder="password" name="pass" required><br><br>
Confirm Pass<br>
<input type="password" placeholder="Confirm Pass" name="cpass" required><br><br>
Email<br>
<input type="email" placeholder="xyz@email.com" name="email" required><br><br>
Phone<br>
<input type="text" placeholder="contact no." name="phone" required><br><br>
<input type="submit" value="Signup" name="signup" >
</form></center>
<?php
if(isset($_POST['login']))
{
	$user=mysql_real_escape_string($_POST['user']);
	$pass=$_POST['pass'];
	$pr=mysql_query("SELECT * from login where user='$user' and pass='$pass'");
	if($x=mysql_fetch_array($pr))
	{
		$_SESSION['user1']=$user;
		$_SESSION['pass1']=$pass;
		header('Location: home.php');
	}else
		echo "bye bye ".$user;
	
	
}


?>
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
			echo"Username already exists!";
	}else if($pass!=$cpass)
	{
		echo"Invalid Password!";
		
	}else{
		mysql_query("INSERT INTO login(user,pass,email,contact) VALUES('$user','$pass','$email','$phone')");
		$_SESSION['user1']=$user;
		$_SESSION['pass1']=$pass;
		header('Location: home.php');
	}
	
	
}


?>