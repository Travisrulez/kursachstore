<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM messages WHERE id = '".$_GET['del_mes']."'");
header("location:allquestions.php");  
?>