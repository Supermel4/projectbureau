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

// Adds an activity
public function activiteitToevoegen($activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    $stmt = $this->database->connection->prepare("INSERT INTO activiteiten (activiteitnaam,begindatum,einddatum,locatie,minimum,maximum) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum);
    $stmt->execute();
    header("location:activiteit.php");
}

// Deletes an activity
public function activiteitVerwijderen($id) {
    $stmt = $this->database->connection->prepare("DELETE FROM activiteiten WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Updates an activity
public function activiteitWijzigen($id, $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    
    $stmt = $this->database->connection->prepare("UPDATE activiteiten SET activiteitnaam=?,begindatum=?,einddatum=?,locatie=?,minimum=?,maximum=? WHERE id= ?");
    $stmt->bind_param('ssssssi', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum, $id);
    $stmt->execute();
    header("location:activiteit.php");
}

// Gets activity based on the id
public function activiteitOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

}