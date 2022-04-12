<?php
header("Content-Type: text/html; charset=UTF-8");
include_once 'include/functions.php';
include_once 'include/connect.php';
include_once 'include/user.php';
include_once 'include/saveuser.php';
include_once 'include/functions.php';
sec_session_start();

if(login_check(dbConnect()) == true) {
	include_once('include/navbar.php');
        // Add your protected page content here!

	$user = new user();
	$user->deleteuser();
}
?> 
  
   <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>

 
		    <div class="panel panel-default" style="margin:2em; margin-top: 90px;">
			  <div class="panel-heading">Регистрация пользователя</div>
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
							<input type='text' class="form-control" placeholder="Username" aria-describedby="basic-addon1"  name='username' id='username' /><br>
							<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email" id="email" /><br>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1"/><br>
							<input type="password" name="confirmpwd" id="confirmpwd" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1" /><br>
							<select class="form-control" name="UserType" id="UserType">
								<option value="none">Выбор типа пользователя</option>
								<option value="Administrator">Администратор</option>
								<option value="User">User</option>
							</select>
						 <br/>
	                        <select class="form-control" name="groupId">  
	                        <?php department::displayDepartmentsOptionList(); ?> 
	                        </select>
				               
							<br/>
 
							<input type="button" name="registerBtn" id="registerBtn" class="btn btn-primary" value="Save" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd,0,this.form.UserType,this.form.groupId);" /> 
						</form> 
					 </div>
					 <div class="col-md-6"> 
						<ul>
							<li>Имена пользователей могут содержать только цифры, прописные и строчные буквы и символы подчеркивания.</li>
							<li>Электронные письма должны иметь допустимый формат электронной почты.</li>
							<li>Пароли должны быть не короче 6 символов</li>
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
 