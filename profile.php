<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/header.php'; 

session_start();

!isset($_SESSION['name']) ? Header('Location: /') : 0;

!isset($_GET['id']) || empty($_GET['id']) ? $id = $_SESSION['name'] : $id = $_GET['id'];

$user = UserModel::getUser($id);



?>

<div class="container">

<div class="wrapper">
    <div class="icon">
        <img style="width: 150px;" src="./static/img/userpic.png" alt="">
    </div>
    <div class="info">
        <div class="lvl">Уровень: <strong style="color:#26a69a;"> <?= $user['level']; ?> </strong></div>
        <br>
        <progress min=0 value="<?= $user['exp']; ?>" max="100"></progress>
        <br>
        <br>
        <div class="name">Имя: <?= $user['name'] ?></div>
        <br>
        <div class="name">Последний раз в сети: <?= $user['last_login'] ?></div>
        <br>
        <a href="../core/Controllers/LevelUpController.php?id= <?=$user['id']?> && exp=20 ">Добавить 20 exp</a>
    </div>

</div>

</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/footer.php';  ?>

<style>

.wrapper{
    width: 80%; 
    margin: 0 auto;
    margin-top: 5rem;
    display: flex;
    justify-content: space-around;
}

.info{
    color: white;
    font-weight: 500;
}

</style>

