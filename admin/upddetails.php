<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../connection/connect.php");
include("../functions.php");
session_start();
if(empty($_SESSION['adm_id']))
{
	header('location:index.php');
}
else
{
    $caid = $_SESSION['cid'];
    if(isset($_POST['submit']))
{
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "imgs/details/".basename($fnew);
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
												$error = 	'<div class="alert alert-danger alert-dismissible fade show mt-3">
																<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Максимальный размер картинки 1024kb!</strong>
															</div>';
										}
									else
										{
												$sql = "UPDATE details SET title ='$_POST[dtitle]', slogan ='$_POST[dcontent]', price ='$_POST[dprice]', amount ='$_POST[damount]', img='$fnew' where d_id='$_GET[upd_id]'";  // update the submited data ino the database :images
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show mt-3">
																<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Изменение</strong>Успешно!
															</div>';
										}
                    }
                    elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show mt-3">
																<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Выберите картинку</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show mt-3">
																<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Неправильное расширение картиники!</strong>png, jpg, Gif допустимы.
															</div>';
						}    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Главная</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allcars.php">Машины</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allusers.php">Пользователи</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="allquestions.php">Вопросы</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<?php 
$did = $_GET['upd_id'];
$ssql ="SELECT * FROM details WHERE d_id=". $did;
$res=mysqli_query($db, $ssql); 
            $row=mysqli_fetch_assoc($res);
?>
<div class="container">
        <?php  echo $error;
        echo $success; ?>
        <form action='' method='post' enctype="multipart/form-data">
        <div class="form-group has-danger mt-5">
            <label class="control-label">Наименование детали</label>
            <input type="text" class="form-control" name="dtitle" placeholder="Название" value="<?=$row['title']?>">
        </div>
        <div class="form-group has-danger mt-3">
            <label class="control-label">Цена</label>
            <input type="number" class="form-control" name="dprice" placeholder="Цена" value="<?=$row['price']?>">
        </div>
        <div class="form-group has-danger mt-3">
            <label class="control-label">Количество на складе</label>
            <input type="number" class="form-control" name="damount" placeholder="Количество" value="<?=$row['amount']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Информация о детали</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="dcontent" rows="3"><?=$row['slogan']?></textarea>
        </div>
        <div class="form-group has-danger mt-3">
            <label class="control-label">Картинка</label>
            <input type="file" name="file" id="lastName" class="form-control form-control-danger">
        </div>
        <div class="form-actions mt-3">
                <input type="submit" name="submit" class="btn btn-success" value="Сохранить">
                <a href="alldetails.php?car_id=<?=$caid?>" class="btn btn-danger">Отменить</a>
            </div>
        </form>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php 
}
?>