<?php
include 'conn.php'; 
session_start();
ob_start();
if((!isset($_SESSION['user11']))||(!isset($_SESSION['pass11'])))
{header('Location: login.php');}
echo "hello welcome to new page";

?>

</head><form>
<input type="button" name="click" value="logout" onclick="location.href='logout.php';" style="width:10%;height:5%;color:teal;background-color:skyblue;">
<?php
$xu=mysql_real_escape_string($_SESSION['user11']);
$xp=mysql_real_escape_string($_SESSION['pass11']);
$res=mysql_query("SELECT * FROM gannu WHERE user='$xu'");
while($info=mysql_fetch_array($res))
{
	echo "<br><br>".$info['user']."<br>";
	echo $info['pass']."<br>";
	echo $info['email']."<br>";
}
?>

</html>