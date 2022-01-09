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
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten ORDER BY begindatum');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds an activity
public function activiteitToevoegen($activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    $d1 = new DateTime($begindatum);
    $d2 = new DateTime($einddatum);
    if ($d1 == $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Begindatum en Eindatum mogen niet gelijk zijn';
        header("Location:activiteitAanmaken.php");

    }elseif ($d1 > $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Eindatum mag niet eerder zijn dan de Begindatum';
        header("Location:activiteitAanmaken.php");
    
    }elseif ($minimum > $maximum) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Minumum aantal deelnemers mag niet groter zijn dan maximum';
        header("Location:activiteitAanmaken.php");

    }elseif(empty($activiteitnaam) || empty($begindatum) || empty($einddatum) || empty($locatie) || empty($minimum) || empty($maximum)){
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header("Location:activiteitAanmaken.php");

    }else{
        $stmt = $this->database->connection->prepare("INSERT INTO activiteiten (activiteitnaam,begindatum,einddatum,locatie,minimum,maximum) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum);
        $stmt->execute();
        header("location:activiteit.php");
    }
}

// Deletes an activity
public function activiteitVerwijderen($id) {
    $stmt = $this->database->connection->prepare("DELETE FROM activiteiten WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Updates an activity
public function activiteitWijzigen($id, $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    
    $d1 = new DateTime($begindatum);
    $d2 = new DateTime($einddatum);
    if ($d1 == $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Begindatum en Eindatum mogen niet gelijk zijn';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }elseif ($d1 > $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Eindatum mag niet eerder zijn dan de Begindatum';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }elseif ($minimum > $maximum) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Minumum aantal deelnemers mag niet groter zijn dan maximum';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }elseif(empty($activiteitnaam) || empty($begindatum) || empty($einddatum) || empty($locatie) || empty($minimum) || empty($maximum)){
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else{
        $stmt = $this->database->connection->prepare("UPDATE activiteiten SET activiteitnaam=?,begindatum=?,einddatum=?,locatie=?,minimum=?,maximum=? WHERE id= ?");
        $stmt->bind_param('ssssssi', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum, $id);
        $stmt->execute();
        header("location:activiteit.php");
    }
}

// Gets activity based on the id
public function activiteitOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all attendance
public function presentieOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM aanmeldingen');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all attendance with same id
public function presentieOphalen2($activiteitid) {
    $stmt = $this->database->connection->prepare('SELECT id,voornaam, achternaam, contact FROM aanmeldingen WHERE activiteitid = ?');
    $stmt->bind_param('i', $activiteitid);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_assoc();
    return $result;
}

public function telPresentie($activiteitid){
    $stmt = $this->database->connection->prepare('SELECT COUNT(id) as teller FROM aanmeldingen WHERE activiteitid=?');
    $stmt->bind_param('i', $activiteitid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

}