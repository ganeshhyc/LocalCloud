<?php
include 'conn.php';
?>
<form id="f1" method="post" action="reg.php">
<center>
<h1>REGISTRATION FORM</h1><br><br><br>
username<br>
<input type="text" placeholder="username" name="user" required><br><br>
password<br>
<input type="password" placeholder="password" name="pass" required><br><br>
confirmpassword<br>
<input type="password" placeholder="cpassword" name="cpass" required><br><br>
email<br>
<input type="email" placeholder="email" name="email" required><br><br>
<input type="submit" value="submit" name="submit">
</form>
<?php

if(isset($_POST['submit']))
{	
	$u=$_POST['user'];
	$p=$_POST['pass'];
	$cp=$_POST['cpass'];
	$e=$_POST['email'];
	if(($p!=$cp))
	{
		echo "<script>window.alert('check your pass');</script>";
	}
	else
	{
		
	$q=mysql_query("insert into gannu(user,pass,email) values('$u','$p','$e')");
	echo "done";
	}
}
?>


