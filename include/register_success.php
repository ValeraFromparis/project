<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html>
<body>
	<h1 style="margin:.1em .5em 0 .5em; color:white; font-size:56px">Доска запросов</h1>
	<div class="well" style="margin:2em; background-color:#E6E6E5">		
		<div class="panel panel-primary" style="margin:2em;">
		  <div class="panel-heading">Регистрация прошла успешно</div>
			<div class="panel-body">
				<p class="alert alert-success">Спасибо за регистрацию <a href="../index.php">страница входа</a> мгновение.</p>
				<?php echo '<META http-equiv="refresh" content="5;URL=../index.php">'; ?>
			</div>
		</div>
	</div>
</body>
	
	
</html>