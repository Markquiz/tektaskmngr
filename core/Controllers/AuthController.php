<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

session_start();

isset($_SESSION['name']) ? Header('Location /profile')

$login = trim($_POST['login']);

$password = trim($_POST['password']);

if(empty($login)||empty($password)){
    
    echo "<script> alert('Заполните все поля!') </script>";

    Header('Location: /');

}
else{

    UserModel::userAuth($login,$password);

}