<?php 

require_once 'config.php';

class DB{

    static function getConnection(){

     $user = DBUSER;

     $password = DBPWD;

     $name = DBNAME;

     $connection = new PDO("mysql:host=localhost; dbname=".$name."", $user, $password);

     !$connection ? die("DATABASE_ERROR") : 0;
     
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     return $connection;

    }
}