<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include("functions.php");
// error_reporting(0);
session_start();

if(empty($_SESSION['user_id'])) 
{
	header('location:login.php');
}
else
{
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
    <link href="css/style.css" rel="stylesheet">
	</head>
<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <?php 
        require_once 'header.php';
		$uid = $_SESSION['user_id'];
        ?>
        <div class="page-wrapper">
		<div class="w-100 d-flex justify-content-center mt-2">
		<h1>Ваши заказы</h1>
		</div>
            <section class="p-1">
			<table class="table table-striped mt-1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Деталь</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
  <?php $orders = get_orders($uid);
  $am = 0
  ?>
        <?php foreach ($orders as $order):?>
    <tr>
      <th scope="row"><?php $am++; 
      echo $am;
      ?></th>
      <td><?=$order['title']?></td>
      <td><?=$order['quantity']?></td>
      <td><?=$order['price']?></td>
      <td><a href="delorder.php?del_o=<?=$order['o_id'];?>" class="btn btn-sm btn-danger">Удалить</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
            </section>
        </div>
    </div>
    <?php 
        require_once 'footer.php';
        ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
}
?>