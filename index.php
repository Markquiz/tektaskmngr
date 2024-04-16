<?php 

session_start();

isset($_SESSION['name']) ? Header('Location: /profile') : 0;

$title = "Логин"; 

require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/header.php'; 

?>

<style>
</style>

<form action="./core/Controllers/AuthController.php" method="POST" style="width: 800px; margin-top: 2rem; padding: 15px 30px;">

    <div class="row">
        <div class="input-field col s6">
          <input id="login" type="text" name="login" class="validate" style="color: white !important;">
          <label class="active" for="login">Имя пользователя</label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" name="password" class="validate" style="color: white !important;">
          <label class="active" for="password">Пароль</label>
        </div>
    </div>

    <div class="btn-container" style="padding: 15px 10px;">
        <button class="btn waves-effect waves-light" type="submit" name="action">Авторизация
        </button>
    </div>


    
</form>


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/footer.php';  ?>


        
