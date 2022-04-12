<!-- include bootstrap css -->

<link href="css/bootstrap.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<?php
header("Content-Type: text/html; charset=UTF-8");
include_once('include/ticket.php');
include_once('include/category.php');
include_once('include/department.php');
include_once('include/user.php');
include_once('include/class.system.php');

$systemBrand = system::withName('brand'); # get branding for nav bar

?>

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div id="navContainer" class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Переключить навигацию</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php"><?php echo ''. $systemBrand->getValue(); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="tickets" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Запросы <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        <li><a href="./tickets.php?ticketId=mine">Мой запрос</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./tickets.php?ticketId=all">Все</a></li>
                        <li><a href="./tickets.php?ticketId=open">Открыть</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./tickets.php?ticketId=woc">Ожидание клиента</a></li>
                        <li><a href="./tickets.php?ticketId=woa">Ожидание агента</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./tickets.php?ticketId=closed">Закрыть</a></li>
                    </ul>
                </li>
                <li id="reports"><a href="reports.php">Отчеты</a></li>
             <?php if ( $_SESSION['usertype']=='Administrator') {  ?>  
                <li id="system" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Система <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                    	<li><a href="./system.php?maintenace=categories">Категории</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./manageusers.php?maintenace=users">Пользователи</a></li>
                        <!--<li><a href="include/system.php?maintenace=groups">Groups</a></li>-->
						<!-- <li><a href="system.php?maintenace=groups">Groups</a></li> -->
                        <li role="separator" class="divider"></li>
                        <li><a href="./system.php?maintenace=system">Система</a></li>
                    </ul>
                </li>
           <?php } ?>  
            </ul>
            <p class="navbar-text">Пользователь: <?php echo ''. $_SESSION['username'] ."|".$_SESSION['usertype']; ?><a href="./include/logout.php"> Выход</a></p>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Представить</button>
            </form>
        </div> <!-- /.navbar-collapse -->
    </div> <!-- /. nav -->
</nav>
