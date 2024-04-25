<?php 

session_start();

isset($_SESSION['name']) ? Header('Location: /profile') : 0;

$title = "Логин"; 

require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/header.php'; 

?>

<style>
</style>

<form action="./core/Controllers/AuthController.php" method="POST" style="padding: 10px 20px; margin-top: 0.5rem;">

<input type="text" name="login" class="p-form-text p-form-no-validate" placeholder="Введите логин">
<br>
<input type="password" name="password" class="p-form-text p-form-no-validate" placeholder="Введите пароль">
<br>
<button type="submit" class="p-btn p-btn-mob">Войти</button>

    
</form>

<div class="p-modal-background">
<div class="p-modal" id="example-modal">
		<h3>Заполните все поля</h3>
		<div class="p-modal-button-container">
			<a href="#" data-p-cancel>Ок</a>
		</div>
	</div>

</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/footer.php';  ?>


        