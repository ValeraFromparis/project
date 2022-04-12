<?php
header("Content-Type: text/html; charset=UTF-8");
include_once 'include/functions.php';
include_once 'include/connect.php';
sec_session_start();

if(login_check(dbConnect()) == true) {
	include_once('include/class.report.php');

	if(isset($_POST['createReport'])) {

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename='. $_POST['reportName']. '.csv');

		$report = new report();
		$report->setName($_POST['reportName']);
	 	$report->setStartDate($_POST['startDate']);
	 	$report->setEndDate($_POST['endDate']);
	 	$report->setUser($_POST['openedBy']);
	 	$report->setStatus($_POST['status']);
	 	$report->setCategory($_POST['category']);
	 	$report->setSubCategory($_POST['subCategory']);

		$report->createReport(); // this is broken

	}
	// need to include navbar after posting to modify the headers--otherwise header already sent error.
	include_once('include/navbar.php');

        // Add your protected page content here!
?>

<script>$('#reports').addClass("active");</script>

<div id="content">
    <div id="reportMain" class="panel panel-default">
        <div class="panel-heading">Отчеты</div>
        <div class="panel-body">
		<form method="POST">
		  <div class="form-group row">
		    <label for="reportName" class="col-sm-2 form-control-label">Название отчета</label>
		    <div class="col-sm-5">
		      <input type="text" class="form-control" name="reportName" id="reportName" placeholder="My Awesome report">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="startDate" class="col-sm-2 form-control-label">Дата начала </label>
		    <div class="col-sm-5">
		      <input type="date" class="form-control" name="startDate" id="startDate" placeholder="yyyy-mm-dd">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="endDate" class="col-sm-2 form-control-label">Дата окончания</label>
		    <div class="col-sm-5">
		      <input type="date" class="form-control" name="endDate" id="endDate" placeholder="yyyy-mm-dd">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="openedBy" class="col-sm-2 form-control-label">Открыт </label>
		    <div class="col-sm-5">
		      <select class="form-control" id="openedBy" name="openedBy" >
		      	<option value="">Выберите имя пользователя...</option>
		      	<option value="all">Все</option>
		      </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="category" class="col-sm-2 form-control-label">Категория</label>
		    <div class="col-sm-5">
		      <select class="form-control" id="category" name="category">
		        <option value="all">Все</option>
			  <?php category::displayCategoryOptionList(); ?>
	 	      </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="subCategory" class="col-sm-2 form-control-label">Подкатегория</label>
		    <div class="col-sm-5">
		      <select class="form-control" id="subCategory" name="subCategory">
	                <option value="all">Все</option>
		      </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="status" class="col-sm-2 form-control-label">Status</label>
		    <div class="col-sm-5">
		    <select class="form-control"  id="status" name="status">
		    	<option value="all">Все</option>
		    	<option value="open">Открыть</option>
		    	<option value="closed">Закрыть</option>
		    	<option value="Waiting on agent">Ожидание агента</option>
		    	<option value="Waiting on client">Ожидание пользователя</option>
		    	<option value="Waiting on 3rd Party">Ожидание третьего лица</option>
		    </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col-sm-offset-2 col-sm-5">
		      <button name="createReport" type="submit" class="btn btn-success">Создать</button>
		    </div>
		  </div>
		</form>

        </div>
    </div>
</div>

<?php
// end protected content
} else {
        echo 'You are not authorized to access this page redirecting you to the <a href="./index.php">login page</a>.';
        echo '<META http-equiv="refresh" content="2;URL=./index.php">';
}

?>
