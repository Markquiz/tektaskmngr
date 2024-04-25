<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/DB/DB.php';

class UserModel{

    static function userAuth($login, $password){


        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT * FROM `users` WHERE `login` = ? and `password` = ? ");

        $query->execute([$login, $password]);

        $userinfoQuery = $conn->prepare("SELECT * from `users` WHERE login = ?");

        $userinfoQuery->execute([$login]);

        $userinfo = $userinfoQuery->fetch();

        if ($query->rowCount()>0){

            session_start();

            $_SESSION['name'] = $userinfo[0];
            $_SESSION['role'] = $userinfo[8];
            
            
            Header('Location: /profile');

        }

        else{

            die("AUTHORIZATION_ERROR");
        }


    }

    static function getUser($id){

        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");

        $query->execute([$id]);

        $user = $query->fetch();

        return $user;

    }

    static function setupLogin($time,$id){

        $conn = DB::getConnection();

        $query = $conn->prepare( 'UPDATE `users` SET `last_login` = ? WHERE id = ?');

        $query->execute([$time, $id]);

    }

    static function setOnline($id){

        $conn = DB::getConnection();

        $query = $conn->prepare( 'UPDATE `users` SET `last_login` = ? WHERE id = ?');

        $query->execute(["Сейчас онлайн", $id]);

    }

    static function upLevel($reachExp,$id){

        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT `exp` FROM `users` WHERE `id` = ?");

        $query->execute([$id]);

        $exp = $query->fetch();

        if($exp!=0 && $exp[0]>=100){

            $query = $conn->prepare( 'UPDATE `users` SET `exp` = ? WHERE id = ?');

            $query->execute([0,$id]);
            
            $queryLevel = $conn->prepare("SELECT `level` FROM `users` WHERE `id` = ?");   

            $queryLevel->execute([$id]);

            $level = $queryLevel->fetch();

            $newLevel = $level[0] + 1;
            
            $query = $conn->prepare( 'UPDATE `users` SET `level` = ? WHERE id = ?');

            $query->execute([$newLevel,$id]);

        }
        else{

            $query = $conn->prepare( 'UPDATE `users` SET `exp` = ? WHERE id = ?');

            $newExp = $exp[0] + $reachExp;

            $query->execute([$newExp,$id]);

        }

    }

}