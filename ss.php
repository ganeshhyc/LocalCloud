<?php
$jsonData = $_GET['json'];
json_decode($jsonData, TRUE);
echo var_dump($jsonData);
?>