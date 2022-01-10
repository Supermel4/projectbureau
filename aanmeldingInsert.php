<?php
// Includes user class
include_once('aanmelding_functies.php');
$aanmeldingen = new Aanmelding();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $activiteitid = $_POST['activiteitid'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $contactE = $_POST['contact-e'];
    $contactT = $_POST['contact-t'];
    $aanmeldingen->aanmeldingToevoegen($activiteitid, $voornaam, $achternaam, $contactE, $contactT);
} else {
    header("location:fail.php");
    die;
}

