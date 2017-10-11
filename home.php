<?php
include("conf.php");

session_start();
if(!isset($_SESSION['user1'])&&!isset($_SESSION['pass1']))
	
		header('Location: index.php');
?>
<script src="js/jquery-1.11.1.min.js"></script>
<a href="logout.php">Logout</a>
<?php
		$user=$_SESSION['user1'];
		$pass=$_SESSION['pass1'];
		$pr=mysql_query("SELECT * from login where user='$user' and pass='$pass'");
		while($x=mysql_fetch_array($pr))
		{
			echo"</br>Reg no: ".$x['user'];
			echo"</br>email: ".$x['email'];
			echo"</br>contact: ".$x['contact'];
			echo"</br>photo: <img src='pic/".$x['pic']."' height='200'>";
		}
		?>
		<form method="post" action="home.php" enctype="multipart/form-data">
		 <label for="files" class="btn"><font color="blue">Select Image</label>
		<input id="files" type="file" style="visibility:hidden;" name="img">
		<input type="submit" name="up" value="upload">
		</form><br><br></br>
		
		<div id="imageDiv"></div>
		
		
<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = 'load.GIF'; div.appendChild(img);
        document.body.appendChild(div);
        return true;
    }
</script>

		<form method="post" action="home.php" runat="server"  onsubmit="ShowLoading()" enctype="multipart/form-data">
		<input type="file" name="data">
		<input type="submit" class="load_button" id="upl" name="upl" value="upload_file">
		</form>
		

		


		
		

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
					header('Location: home.php');
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
					$n1=rand(000,999);
					$pic=$n1.$n2.urlencode($pic);
					$pic=str_replace(' ','',$pic);
					$target="data/".$user."/".$pic;
					move_uploaded_file($_FILES['data']['tmp_name'],$target);
					date_default_timezone_set('Asia/Calcutta'); 
					$date = date('d-m-Y : h-i-s');
					$input ="( ".$date." ) ".$pic."<a href='".$target."'>Download</a></br>".PHP_EOL; 
					
					$fp = fopen($data, "a"); 
					fwrite($fp, $input).'&nbsp;'; 
					fclose($fp); 
					
					header('Location: home.php');
			}
			
		}
		?>
		
		<?php 

$fp = fopen($data, "r");

while(!feof($fp)){
echo fgets($fp);	

} 
fclose($fp); 

 

?>