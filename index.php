<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
include("functions.php");
session_start();
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

<body class="home">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                <div class="order-row bg-white">
                                    <div class="widget-body">					
	<?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="details.php?res_id=<?=$_SESSION['re_id'];?>&action=remove&id=<?php echo $_SESSION['dd_id'];?>">
										<i class="fa fa-trash pull-right"></i></a>
										</div>
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
									  </div>							  
	<?php
$item_total += ($item["price"]*$item["quantity"]);
}
?>								  						  
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>Всего</p>
                                        <h3 class="value"><strong><?php echo "$".$item_total; ?></strong></h3>
                                    </div>
                                </div>
      </div>
      <div class="modal-footer">
      <a href="makeorder.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-dark btn-lg">Заказать</a>
      </div>
    </div>
  </div>
</div>
        <?php 
        require_once 'header.php';
        ?>
        <section class="popular">
            <div class="container mt-3">
                <div class="title text-xs-center m-b-30">
                    <h2>Популярные запросы месяца</h2>
                </div>
                <div class="d-flex justify-content-between carddd">
                    <?php 
                    $ldets = get_last_details();
                    foreach ($ldets as $ldet):
                    ?>
                                                    <div class="card" style="width: 20rem;">
  <img src="admin/imgs/details/<?=$ldet['img']?>" class="card-img-top" style="height: 180px;">
  <div class="card-body">
    <h5 class="card-title"><?=$ldet['title']?></h5>
    <a href="details.php?res_id=<?=$ldet['rs_id']?>" class="btn btn-dark">К товару</a>
  </div>
</div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="how-it-works">
        <?php 
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO messages(mail, name, message) VALUE('".$_POST['email']."','".$_POST['name']."','".$_POST['message']."')";
            mysqli_query($db, $sql); 
        }
        ?>
            <div class="container">
            <h1 class="mb-3" style="color: white;">Если у вас возинкли вопросы, напишите нам</h1>
                <form action='' method='post'>
                <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Введите ваше Имя и Фамилию</label>
    <input type="text" class="form-control" name="name" id="validationTooltip01" placeholder="ФИО" required>
  </div>
  <div class="mb-2">
    <label for="validationTextarea">Введите ваще сообщение</label>
    <textarea class="form-control is-invalid" id="validationTextarea" name="message" required></textarea>
  </div>
  <div class="mb-2 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Согласие на обработку персоанльных данных</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </section>
    </div>
    <?php 
        require_once 'footer.php';
        ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>