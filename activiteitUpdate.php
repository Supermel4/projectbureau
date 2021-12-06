<?php
// Checks if user is logged in
include "loginCheck.php";


// Includes user class
include_once('activiteit_functies.php');
$activiteiten = new Activiteit();
// If submit is clicked update the user
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $activiteitnaam = $_POST['activiteitnaam'];
    $begindatum = $_POST['begindatum'];
    $einddatum = $_POST['einddatum'];
    $locatie = $_POST['locatie'];
    $minimum = $_POST['minimum'];
    $maximum = $_POST['maximum'];
    $activiteiten->activiteitWijzigen($id, $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum);
} else {
    header("location:fail.php");
    die;
}

