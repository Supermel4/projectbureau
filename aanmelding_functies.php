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
public function aanmeldingToevoegen($activiteitid, $voornaam, $achternaam, $contactT, $contactE) {
    if(empty($voornaam) || empty($achternaam)){
        echo '<script>
        alert("Aanmelding is mislukt!\nVul alstublieft alle velden in.")
        window.location = document.referrer;
        </script>';
          } elseif(empty($contactE)){
                echo '<script>
                alert("Aanmelding is mislukt!\nVul alstublieft alle velden in.")
                window.location = document.referrer;
                </script>';
            } elseif(empty($contactT)){
                echo '<script>
                alert("Aanmelding is mislukt!\nVul alstublieft alle velden in.")
                window.location = document.referrer;
                </script>';
            } elseif (!filter_var($contactE, FILTER_VALIDATE_EMAIL)) {
                echo '<script>
                alert("Email bestaat niet!\nVul alstublieft een geldige email in")
                window.location = document.referrer;
                </script>';
            } elseif (preg_match('/^[0-9]{10}+$/', $contactT)) {
                echo '<script>
                alert("Telefoonnummer bestaat niet!\nVul alstublieft een geldige telefoonnummer in")
                window.location = document.referrer;
                </script>';

    }else{
        $contact = $contactE;
        $contact = $contactT;
        $stmt = $this->database->connection->prepare("INSERT INTO aanmeldingen (activiteitid, voornaam,achternaam,contact) VALUES (?,?,?,?)");
        $stmt->bind_param('isss', $activiteitid, $voornaam, $achternaam, $contact);
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
        alert("Afmelding is mislukt! \nVul alstublieft alle velden in.")
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

// Deletes an activity
public function aanmeldingVerwijderen3($id) {
    $stmt = $this->database->connection->prepare("DELETE FROM aanmeldingen WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}



}
?>