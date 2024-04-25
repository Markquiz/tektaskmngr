<?php 

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/header.php'; 

require_once $_SERVER['DOCUMENT_ROOT']. '/core/Models/TaskModel.php';

$user = UserModel::getUser($_SESSION['name']);

$task = TaskModel::getTask($_GET['id']);


?>
<br>
<div class="container">
<a  style="color: steelblue; font-size: 15px;" href="/profile">Вернуться назад</a>
<h1> <?= $task['title'] ?> </h2>
<h5>Стаутс: <?= $task['status'] ?></h5>
<h5> Дедлайн: 01.01.2000</h5>
<p> <?= $task['descr'] ?></p>
<a href="#" style="margin-left: -0.2rem;" data-p-open-actions="#actions_change_status" class="p-btn p-btn-sm p-blueberry-500 p-white-color p-white-color">Изменить статус</a>
</div>


</div>

<div class="p-action-background">
<div class="p-action-big-container" id="actions_change_status" data-p-close-on-outside="true">
    <div class="p-action-container">
      <div class="p-action-title">
        <h3 class="p-action-title--intern">Изменить статус задания</h3>
        <p class="p-action-text">Выберите статус для вашего задания</p>
      </div>
      <a  href="../core/Controllers/statusController.php?value=В процессе&&id=<?=$task['id']?>&&userId=<?=$task['userId']?>" class="p-action--intern">В процессе</a>
      <a  href="../core/Controllers/statusController.php?value=Завершено&&id=<?=$task['id']?>&&userId=<?=$task['userId']?>" class="p-action--intern">Завершено</a>
      <a  href="../core/Controllers/statusController.php?value=Отклонено&&id=<?=$task['id']?>&&userId=<?=$task['userId']?>" class="p-action--intern">Отклонено</a>
    </div>
    <div class="p-action-container">
      <a href="#" class="p-action--intern p-action-cancel" data-p-cancel-action="true">Закрыть</a>
    </div>
  </div>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/static/templates/footer.php';  ?>


<style>
 .container{
  padding: 10px 30px; }
</style>



