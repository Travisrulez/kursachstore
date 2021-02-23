<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{
												foreach ($_SESSION["cart_item"] as $item)
												{
												$item_total += ($item["price"]*$item["quantity"]);
													if($_POST['submit'])
													{
													$SQL="INSERT INTO users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
														mysqli_query($db,$SQL);
														$success = "Спасибо! Ваш заказ успешно оформлен!";
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
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="site-wrapper">
    <?php 
        require_once 'header.php';
        ?>
        <div class="page-wrapper">
                <div class="container">
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
                </div>
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    <div class="widget-body">
                        <form method="post" action="#">
                            
                <div class="card text-center">
  <div class="card-header">
    Суммарный чек
  </div>
  <div class="card-body">
    <h5 class="card-title">Цена вашего заказа: <?php echo "Руб.".$item_total; ?></h5>
    <p class="card-text">Доставка для вас бесплатная</p>
    <p class="card-text">Итого:  <?php echo "Руб.".$item_total; ?></p>
    <input type="submit" name="submit" class="btn btn-success" value="Сделать заказ">
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
				 </form>
            </div>
        </div>
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