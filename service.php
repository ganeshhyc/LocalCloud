<?php
include_once("conf.php");
$sql=mysql_query("select * from login");
while($row=mysql_fetch_object($sql)){
	$jsonData[] = $row;
	
}
//header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
echo json_encode($jsonData);
?>
