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
    </ul>
  </div>
</div>
</nav>
<div class="cars container">
<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Никнейм</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Email</th>
      <th scope="col">Телефон</th>
      <th scope="col">Адрес</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
  <?php $users = get_users();
  $am = 0
  ?>
        <?php foreach ($users as $user):?>
    <tr>
      <th scope="row"><?php $am++; 
      echo $am;
      ?></th>
      <td><?=$user['username']?></td>
      <td><?=$user['f_name']?></td>
      <td><?=$user['l_name']?></td>
      <td><?=$user['email']?></td>
      <td><?=$user['phone']?></td>
      <td><?=$user['address']?></td>
      <td><a href="deluser.php?del_u=<?=$user['u_id'];?>" class="btn btn-sm btn-danger">Удалить</a> <a href="allorders.php?all_u=<?=$user['u_id'];?>" class="btn btn-sm btn-dark">Заказы</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php 
}
?>