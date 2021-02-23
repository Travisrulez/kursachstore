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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/dist/cars.css">
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
      <li class="nav-item">
        <a class="nav-link btn-info" href="addcars.php">Добавить машину</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<div class="cars container">
        <?php $cars = get_cars();?>
        <?php foreach ($cars as $car):?>
        <div class="card mt-5">
            <img src="imgs/cars/<?=$car['image'];?>" class="card-img-top h-50" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <?=$car['title'];?>
                </h5>
                <p></p>
                <a href="alldetails.php?car_id=<?=$car['rs_id']?>" class="btn btn-dark w-100">Посмотреть детали</a>
                <a href="adddetails.php?car_id=<?=$car['rs_id']?>" class="btn btn-dark w-100 mt-1">Добавить деталь</a> <br>
                <a href="updcars.php?upd_id=<?=$car['rs_id'];?>" class="btn btn-dark w-100 mt-1">Изменить</a> <br>
                <a href="delcar.php?del_car=<?=$car['rs_id'];?>" class="btn btn-dark w-100 mt-1">Удалить</a>
            </div>
        </div>
        <?php endforeach; ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php 
}
?>