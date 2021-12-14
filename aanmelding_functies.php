<?php

// Incudes db
require_once('dbConnection.php');
class Aanmelding{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Adds an attendance
public function aanmeldingToevoegen($voornaam, $achternaam, $contact) {
    if(empty($voornaam) || empty($achternaam) || empty($contact)){
        echo '<script>
        alert("Aanmelding is mislukt! Vul alstublieft alle velden in.")
        window.location = "aanmelden.php";
        </script>';

    }else{
        $stmt = $this->database->connection->prepare("INSERT INTO aanmeldingen (voornaam,achternaam,contact) VALUES (?,?,?)");
        $stmt->bind_param('sss', $voornaam, $achternaam, $contact);
        $stmt->execute();
        echo '<script>
        alert("Aanmelding is gelukt!")
        window.location = "index.php";
        </script>';
    }
}

// Removes an attendance
public function aanmeldingVerwijderen2($voornaam, $achternaam, $contact) {
    if(empty($voornaam) || empty($achternaam) || empty($contact)){
        echo '<script>
        alert("afmelding is mislukt! Vul alstublieft alle velden in.")
        window.location = "afmelding.php";
        </script>';

    }else{
        $stmt = $this->database->connection->prepare("INSERT INTO aanmeldingen (voornaam,achternaam,contact) VALUES (?,?,?)");
        $stmt->bind_param('sss', $voornaam, $achternaam, $contact);
        $stmt->execute();
        echo '<script>
        alert("Afmelding is gelukt!")
        window.location = "index.php";
        </script>';
    }
}

public function aanmeldingVerwijderen($voornaam, $achternaam, $contact) {
    $stmt = $this->database->connection->prepare("DELETE FROM aanmeldingen WHERE voornaam= ?, achterbaan= ?, contact= ?");
    $stmt->bind_param('sss', $voornaam, $achternaam, $contact);
    $stmt->execute();
}

}
?>