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
    <div class="container mt-5">
        <div class="w-100 d-flex justify-content-between">
            <div class="cardi alert alert-primary">
              <h4>Машины</h4>&nbsp;&nbsp;&nbsp;
            <h2><?php $sql="SELECT * FROM cars";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
            </div>
            <div class="cardi alert alert-success">
            <h4>Детали</h4>&nbsp;&nbsp;&nbsp;
            <h2><?php $sql="SELECT * FROM cars";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
            </div>
            <div class="cardi alert alert-danger">
            <h4>Пользователи</h4>&nbsp;&nbsp;&nbsp;
            <h2><?php $sql="SELECT * FROM users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
            </div>
            <div class="cardi alert alert-warning">
            <h4>Заказы</h4>&nbsp;&nbsp;&nbsp;
            <h2><?php $sql="SELECT * FROM users_orders";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
            </div>
            <div class="cardi alert alert-info">
            <h4>Сообщения</h4>&nbsp;&nbsp;&nbsp;
            <h2><?php $sql="SELECT * FROM messages";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-center w-70">
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Сообщение</th>
                            <th scope="col"><a href="allquestions.php" class="btn btn-sm btn-dark">Посмотреть все</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lmes = get_last_message();
  $am = 0
  ?>
                        <?php foreach ($lmes as $lmess):?>
                        <tr>
                            <th scope="row">
                                <?php $am++; 
      echo $am;
      ?>
                            </th>
                            <td>
                                <?=$lmess['mail']?>
                            </td>
                            <td>
                                <?=$lmess['name']?>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Просмотреть сообщение
        </button>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <?=$message['name']?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?=$message['message']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center w-49">
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Деталь</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                            <th scope="col"><a href="allusers.php" class="btn btn-sm btn-dark">Посмотреть все</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lord = get_last_order();
  $am = 0
  ?>
                        <?php foreach ($lord as $lords):?>
                        <tr>
                            <th scope="row">
                                <?php $am++; 
      echo $am;
      ?>
                            </th>
                            <td>
                                <?=$lords['title']?>
                            </td>
                            <td>
                                <?=$lords['quantity']?>
                            </td>
                            <td>
                                <?=$lords['price']?>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
}
?>