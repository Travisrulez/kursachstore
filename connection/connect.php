<?php

$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "kursach-store"; 

$db = mysqli_connect($servername, $username, $password, $dbname);
if (!$db) {    
    die("Connection failed: " . mysqli_connect_error());
}

?>