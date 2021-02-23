<?php
include("connection/connect.php");
error_reporting(0);
session_start();
$oid = $_SESSION['user_id'];
mysqli_query($db,"DELETE FROM users_orders WHERE o_id = '".$_GET['del_o']."'");
header("location:your_orders.php?all_u=$oid");  
?>