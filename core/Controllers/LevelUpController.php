<?

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/UserModel.php';

$reach_exp = $_GET['exp'];

$id = $_GET['id'];

if(!empty($reach_exp)&&!empty($id)){

UserModel::upLevel($reach_exp, $id);

echo "<script type='text/javascript'> alert('Задание завершено'); window.location.href = '/' </script>";

}
else{

    Header('Location: /');
}
