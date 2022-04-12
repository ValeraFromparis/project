<?php
header("Content-Type: text/html; charset=UTF-8");
include_once 'include/functions.php';
include_once 'include/connect.php';
include_once 'include/user.php';
include_once 'include/updateuser.php'; 
sec_session_start();
if(login_check(dbConnect()) == true) {
	include_once('include/navbar.php'); 
	$user = new user();

	$id = isset($_GET['id']) ? $_GET['id'] : 0;


}
?> 
   <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>

 
		    <div class="panel panel-default" style="margin:2em; margin-top: 90px;">
			  <div class="panel-heading">Редактировать пользователя</div>
				<div class="panel-body">
					
					<?php
					if (!empty($error_msg)) {
						echo $error_msg;
					}
					if (!empty($success)) {
						echo $success;
					}
					?>
					<div id="regForm">
					  <div class="col-md-6">
						<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form"> 
							<?php $user->editUSer($id); ?>

							<input type="button" name="registerBtn" id="registerBtn" class="btn btn-primary" value="Save" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd,this.form.id,this.form.groupId);" /> 
						</form> 
					 </div>
					 <div class="col-md-6"> 
						<ul>
							<li>Имена пользователей могут содержать только цифры, прописные и строчные буквы и символы подчеркивания.</li>
							<li>Emails must have a valid email format</li>
							<li>Электронные письма должны иметь допустимый формат электронной почты.</li>
							<li>Пароли должны содержать
								<ul>
									<li>Не менее одной заглавной буквы (A..Z)</li>
									<li>Хотя бы одна строчная буква (a..z)</li>
									<li>Хотя бы одина цифра (0..9)</li>
								</ul>
							</li>
							<li>Ваш пароль и подтверждение должны точно совпадать</li>
						</ul>
					 </div>
					 <div class="col-md-12">
					 	<table class="table table-bordered">
					 		<thead>
					 			<th>UserID</th>
					 			<th>Fullname</th>
					 			<th>Username</th> 
					 			<th>Department</th> 
					 			<th>Action</th>
					 		</thead>
					 		<tbody>
					 			<?php 
					 			  $user->loadUser();
					 			?>
					 		</tbody>
					 	</table>
					 </div>
					</div>
				</div>
			</div> 
 