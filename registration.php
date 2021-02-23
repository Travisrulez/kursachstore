<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){
       	$message = "Неверный пароль";
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$message = "Пароль должен быть >=6";
	}
	elseif(strlen($_POST['phone']) < 10)
	{
		$message = "неверный номер телефона";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
       	$message = "Неверный Email";
    }
	elseif(mysqli_num_rows($check_username) > 0)
     {
    	$message = 'Пользователь уже существует';
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$message = 'Email уже существует';
     }
	else{

	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		 header("refresh:1;url=login.php");
    }
	}
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>AutoDets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
         <?php 
         require_once 'header.php';
         ?>
               <div class="container">
                  <ul>
                     <li>
					  <span style="color:red;"><?php echo $message; ?></span>
					   
					</li>
                    
                  </ul>
               </div>
                              <div class="container">
                              <h1>Создайте новый аккаунт</h1>
							  <form action="" method="post">
                                 <div class="row ">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Имя пользователя</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="Имя пользователя"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Имя</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Имя"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Фамилия</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Фамилия"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Номер телефона</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Номер телефона">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Пароль</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Пароль"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Подтвердите пароль</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Подтвердите пароль"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Адрес доставки</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Зарегестрироваться" name="submit" class="btn btn-dark"> </p>
                                    </div>
                                 </div>
                              </form>
                              </div>
                              <?php 
        require_once 'footer.php';
        ?>
						   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>