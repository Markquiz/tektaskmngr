<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/header.php'; 

require_once $_SERVER['DOCUMENT_ROOT']. '/core/Models/TaskModel.php';

session_start();

!isset($_SESSION['name']) ? Header('Location: /') : 0;

!isset($_GET['id']) || empty($_GET['id']) ? $id = $_SESSION['name'] : $id = $_GET['id'];

$user = UserModel::getUser($id);

$tasks = TaskModel::getUserTasks($_SESSION['name']);




?>


<div class="p-tabs-container" id="tab_example">
    <div class="p-tabs">
      <button class="p-tab p-is-active">Профиль</button>
      <button class="p-tab">Срочное</button>
      <button class="p-tab">Лаба</button>
      <button class="p-tab">Стажеры</button>
      <button class="p-tab">Пользователи</button>
    </div>
    <div class="p-panels">
      <div class="p-panel p-is-active">
        <img src="../static/img/userpic.png" alt="">
        <br>
        <br>
        <a href="#" class="p-btn p-btn-sm" style="margin-left: -1px; ">Уровень: <strong> <?= $user['level'] ?> </strong> </a>
        <label>Прогресс уровня:</label>

        <progress style="margin-left: 1rem;" max="100" value="<?= $user['exp'] ?>"></progress>
        <div class="p-segmented-controls p-segmented-controls-alt">
        <a href="#" class="active">Имя: <?= $user['name'] ?></a>
        <a href="#">Роль: Admin </a>
        <a href="#" data-p-open-actions="#actions_basic">Действия</a>
</div>
      </div>
      <div class="p-panel" scrolling="yes" style="height: 500px; overflow-y:auto;">

      </div>
      <div class="p-panel" style="height: 500px; overflow-y:auto;">
      <?php foreach($tasks as $key): ?>
       
       <div class="p-card">
         <div class="p-card-content">
         <div class="p-card-title"> <?= $key['title'] ?> </div>
         <div class="p-card-text">Статус: <?=$key['status']?> </div>
         <div class="p-card-text"><?= $key['descr'] ?></div>
         <a href="/tasks/?id=<?=$key['id']?>" class="p-btn p-btn-sm p-blueberry-500 p-white-color p-white-color">Подробнее</a>
         </div>
       </div>
   
       <?php endforeach ?>
      </div>
      <div class="p-panel" scrolling="yes" style="height: 500px; overflow-y:auto;">

      </div>
    </div>
</div>

<div class="p-action-background">

  <div class="p-action-big-container" id="actions_basic" data-p-close-on-outside="true">
    <div class="p-action-container">
      <div class="p-action-title">
        <h3 class="p-action-title--intern">Действия с пользователем</h3>
        <p class="p-action-text">Выберите действие, которое хотите сделать с этим пользователем</p>
      </div>
      <a target="_blank" href="https://t.me/mnesian" class="p-action--intern">Написать в Telegram</a>
    </div>
    <div class="p-action-container">
      <a href="#" class="p-action--intern p-action-cancel" data-p-cancel-action="true">Закрыть</a>
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
    color: black;
    font-weight: 500;
}

.info-text{
    padding: 5px 0px;
    font-size: 20px;
    font-weight: 500;
}

.p-card-title{
	margin-left: 0.5rem;
}

.p-btn-sm{
	margin-left: 2.5rem;
}

.p-card-title, .p-card-text{
		padding: 10px 30px;
}

img{
    width: 250px;
}

</style>
