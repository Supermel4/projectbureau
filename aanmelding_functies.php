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
        $errorAanmelding = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header("Location:aanmelden.php");

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

public function aanmeldingVerwijderen($voornaam, $achternaam, $contact) {
    if(empty($voornaam) || empty($achternaam) || empty($contact)){
        $errorAanmelding = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header("Location:afmelden.php");

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


}
?>