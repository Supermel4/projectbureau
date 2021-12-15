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
    $contact = $_POST['contact'];
    $aanmeldingen->aanmeldingToevoegen($activiteitid, $voornaam, $achternaam, $contact);
} else {
    header("location:fail.php");
    die;
}

