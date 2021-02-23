<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM users WHERE u_id = '".$_GET['del_u']."'");
header("location:allusers.php");  
?>