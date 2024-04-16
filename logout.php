<?

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

$timestamp = time();

$time = date('d.m.y в h:i', $timestamp);

UserModel::setupLogin($time,$_SESSION['name']);

session_destroy();
Header('Location: /');