<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include("functions.php");
// error_reporting(0);
session_start();

include_once 'product-action.php';

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
        <link rel="stylesheet" href="styles/dist/cars.css">
     </head>

    <body>
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
                                        <?=$item["title"]; ?>
                                        <?php 
                                        $_SESSION['re_id']=$_GET['res_id'];
                                        $_SESSION['dd_id']=$item['d_id'];
                                        ?>
                                            <a href="details.php?res_id=<?=$_SESSION['re_id'];?>&action=remove&id=<?php echo $_SESSION['dd_id'];?>">
                                                <i class="fa fa-trash pull-right"></i></a>
                                    </div>
                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "$".$item[ "price"]; ?> readonly id="exampleSelect1">
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
                        <a href="makeorder.php?res_id=<?=$_GET['res_id'];?>&action=check" class="btn btn-dark btn-lg">Заказать</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <?php 
        require_once 'header.php';
        ?>
            <div class="page-wrapper">
                <?php 
            $rid = $_GET['res_id'];
                $rows = get_car($rid);
										  ?>
                <div class="d-flex justify-content-center">
                    <h1>Выберите деталь для <?=$rows['title']?></h1>
                </div>
                        <div class="cars container">
                                    <?php  
									$stmt = $db->prepare("SELECT * FROM details WHERE rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product):
										
													 ?>
                                                     
                                                     
                                                     <div class="card mt-5">
                                                     <form method="post" action="details.php?res_id=<?=$_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>">
            <img src="admin/imgs/details/<?=$product['img'];?>" class="card-img-top">
            <div class="card-body">
            <div class="card-flex">
                <div>
                <h5 class="card-title">
                    <?=$product['title'];?>
                </h5>
                <span class="card-title">
                    <?=$product['slogan'];?>
                </span>
                <p></p>
                <div class="d-flex">
                Цена: <?=$product['price'];?><br>Количество: <?=$product['amount'];?>
                </div>
                </div>
                <div>
                <input type="text" name="quantity" value="1" size="2" />
                                                <input type="submit" class="btn btn-dark" style="margin-left:40px;" value="Добавить" />
                </div>
            </div>
            </div>
                                                     </form>
        </div>
                                                    
                                    <?php
									  endforeach;
									}
									
								?>
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