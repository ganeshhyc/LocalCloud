<?php
include 'conn.php'; 
session_start();
ob_start();
if((!isset($_SESSION['user11']))||(!isset($_SESSION['pass11'])))
{header('Location: login.php');}
unset($_SESSION['user11']);
unset($_SESSION['pass11']);
header('Location: login.php');

?>
