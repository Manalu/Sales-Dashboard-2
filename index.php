<?php 
session_start();
if($_SESSION['logged_in'] != true){
header("location:/dash/login.php");
}
else 
{
header("location:/dash/bar.php");
}
?>