<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Логин</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #ff3300;
	  }
	  </style>
  
</head>

<body>
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; 
	$result=mysqli_query($db, $loginquery); 
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id'];
										 header("refresh:1;url=index.php"); 
	                            } 
							else
							    {
                                      	$message = "Неверное имя пользователя или пароль";
                                }
	 }
	
	
}
?>
<div class="pen-title">
  <h1>Войти в аккаунт</h1>
</div>
  <div class="toggle">
  </div>
    <div class="container">
	  <span style="color:red;"><?php echo $message; ?></span> 
    <form action="" method="post">
    <input class="form-control mt-3" type="text" placeholder="Имя пользователя" aria-label="default input example" name="username"/>
    <input class="form-control mt-3" type="password" placeholder="Пароль" aria-label="default input example" name="password"/>
    <input type="submit" class="btn w-100 btn-dark mt-3" name="submit" value="Логин" />
    </form>
  <div class="cta mt-3">Еще не зарегестрированы?<a href="registration.php"> Создайте аккаунт</a></div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
