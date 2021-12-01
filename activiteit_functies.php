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
    $d1 = new DateTime($begindatum);
    $d2 = new DateTime($einddatum);
    if ($d1 == $d2) {
        echo '<script>
        alert("Toevoegen mislukt. Eindtijd kan niet gelijk zijn aan starttijd")
        window.location = "activiteit.php";
        </script>';

    }elseif ($d1 > $d2) {
        echo '<script>
        alert("Toevoegen mislukt. Eindtijd kan niet kleiner zijn dan starttijd")
        window.location = "activiteit.php";
        </script>';

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
        echo '<script>
        alert("Wijzigen mislukt. Eindtijd kan niet gelijk zijn aan starttijd")
        window.location = "activiteit.php";
        </script>';

    }elseif ($d1 > $d2) {
        echo '<script>
        alert("Wijzigen mislukt. Eindtijd kan niet kleiner zijn dan starttijd")
        window.location = "activiteit.php";
        </script>';

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

// Gets all presentieon
public function presentieOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM aanmeldingen');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

public function getPresentieBijActiviteit($activiteitid){
    $stmt = $this->database->connection->prepare('SELECT voornaam, achternaam FROM aanmeldingen WHERE activiteitid = ?');
    $stmt->bind_param('i', $groepID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 
}

public function presentieOphalenActiviteit($aanmeldID){
    $stmt = $this->database->connection->prepare('SELECT aanmeldingen.id as aanmeldID, voornaam, achternaam, contact FROM aanmeldingen INNER JOIN activiteiten ON activiteiten.id = aanmeldingen.activiteitid WHERE gebruikers.id = ?');
    $stmt->bind_param('i', $aanmeldID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

}