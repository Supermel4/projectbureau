<?php
// Includes user class
include_once('aanmelding_functies.php');
$aanmeldingen = new Aanmelding();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $contact = $_POST['contact'];
    $aanmeldingen->aanmeldingToevoegen($voornaam, $achternaam, $contact);
} else {
    header("location:fail.php");
    die;
}

