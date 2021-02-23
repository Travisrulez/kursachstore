<!DOCTYPE html>
<html lang="en" >
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../connection/connect.php");
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($_POST["submit"])) 
     {
	$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
										
										$_SESSION['adm_id'] = $row['adm_id'];
										 header("refresh:0;url=dashboard.php");
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!";
                                }
	 }
}
?>
<head>
<meta charset="UTF-8">
<title>Логин</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="css/login.css"> 
</head>
<body>
<div class="d-flex flex-column justify-content-center align-items-center">
<div class="container d-flex justify-content-center">
    <h1 style="text-align:center;">Зайти в<br>панель администратора</h1>
</div>
<div class="container d-flex justify-content-center">
  <span style="color:red;"><?php echo $message; ?></span>
  </div>
  <div class="container d-flex justify-content-center">
  <form class="login-form" action="index.php" method="post">
  <input class="form-control mt-3 w-100" type="text" placeholder="Имя пользователя" aria-label="default input example" name="username"/>
    <input class="form-control mt-3" type="password" placeholder="Пароль" aria-label="default input example" name="password"/>
    <input type="submit"  name="submit" class="btn btn-dark mt-3 w-100" value="Войти" />
  </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>