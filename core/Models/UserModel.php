<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/DB/DB.php';

class Users{

    static function userAuth($login, $password){


        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT * FROM `users` WHERE `login` = ? and `password` = ? ");

        $query->execute([$login, $password]);

        $userinfoQuery = $conn->prepare("SELECT * from `users` WHERE login = ?");

        $userinfoQuery->execute([$login]);

        $userinfo = $userinfoQuery->fetch();

        if ($query->rowCount()>0){

            session_start();

            $_SESSION['name'] = $userinfo[1];
            
            Header('Location: /profile');

        }

        else{

            die("AUTHORIZATION_ERROR");
        }


    }

}