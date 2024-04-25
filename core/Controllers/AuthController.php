<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

session_start();

isset($_SESSION['name']) ? Header('Location /profile') : 0;

$login = trim($_POST['login']);

$password = trim($_POST['password']);

$id = $_SESSION['name'];


if(empty($login)||empty($password)){
    
    echo "<script type='text/javascript'> alert('Заполните все поля!'); window.location.href = '/' </script>";

}
else{

    UserModel::userAuth($login,$password);
    UserModel::setOnline($_SESSION['name']);

}