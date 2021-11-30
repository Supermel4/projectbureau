<?php

// Incudes db
require_once('dbConnection.php');
class Activiteit{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Gets all users
public function activiteitenOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
}