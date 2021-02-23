<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM cars WHERE rs_id = '".$_GET['del_car']."'");
header("location:allcars.php");  
?>