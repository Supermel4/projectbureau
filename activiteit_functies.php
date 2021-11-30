<?php

// Incudes db
require_once('dbConnection.php');
class Activiteit{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Gets all activities
public function activiteitenOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds a activity
public function activiteitToevoegen($activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    $stmt = $this->database->connection->prepare("INSERT INTO activiteiten (activiteitnaam,begindatum,einddatum,locatie,minimum,maximum) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum);
    $stmt->execute();
    header("location:activiteit.php");
}
}