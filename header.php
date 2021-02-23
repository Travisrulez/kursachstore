<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<header id="" class="">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/AD-01.png" alt="" style="width: 70px;"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Главная <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="cars.php">Машины <span class="sr-only"></span></a> </li>
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Войти</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Зарегестрироваться</a> </li>';
							}
						else
							{
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Ваши заказы</a> </li>';
                                    echo  '<li class="nav-item"><a href="#" class="nav-link active" data-toggle="modal" data-target="#exampleModal">Корзина</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Выйти</a> </li>';
							}

						?> 
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </header>