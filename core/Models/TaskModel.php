<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/DB/DB.php';

class TaskModel{

    static function getTasks(){
        
        $conn = DB::getConnection();

        $query = $conn->query("SELECT * FROM `tasks`");
        
        $query->execute();

        $tasks = $query->fetchAll();
    
        return $tasks;
    }

    static function getUserTasks($id){
        
        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT * FROM `tasks` WHERE `userId` = ?");
        
        $query->execute([$id]);

        $tasks = $query->fetchAll();

        return $tasks;
    }

    static function getTask($id){
        
        $conn = DB::getConnection();

        $query = $conn->prepare("SELECT * FROM `tasks` WHERE id = ?");

        $query->execute([$id]);

        $task = $query->fetch();

        return $task;
        
    }

    static function addTask($userId, $descr, $status , $complexity, $title, $deadline){

        $conn = DB::getConnection();

        $query = $conn->prepare("INSERT INTO `tasks` (userId, descr, status, complexity, deadline) VALUES (?,?,?,?,?)");

        $query->execute([$userId,$descr,$status,$complexity,$deadline]);
        
    }

    static function setStatus($status, $userId, $taskId){

        $conn = DB::getConnection();

        $query = $conn->prepare("UPDATE `tasks` SET `status` = ? WHERE userId = ? AND id = ?");
        
        $query->execute([$status, $userId, $taskId]);



    }

    

}