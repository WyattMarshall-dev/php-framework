<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/variables.php');

class Database {
    static function connect(){
        $db = new mysqli(
            DATABASE_HOST,
            DATABASE_USER,
            DATABASE_PASSWORD,
            DATABASE_NAME
        );

        if(!$db){
            die("Database Connection Failed...<br>");
        } else {
            return $db;
        }
    }
}