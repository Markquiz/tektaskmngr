<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

$userId = $_GET['userId'];

$taskId = $_GET['id'];

$value = $_GET['value'];

TaskModel::setStatus($value, $userId, $taskId);

Header('Location: /tasks/?id='.$taskId.' ');



