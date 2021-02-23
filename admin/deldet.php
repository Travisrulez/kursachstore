<?php
include("../connection/connect.php");
$did = $_SESSION['cid'];
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM details WHERE d_id = '".$_GET['del_det']."'");
header("location:alldetails.php?car_id=$did");  
?>