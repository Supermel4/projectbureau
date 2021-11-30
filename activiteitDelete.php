<?php
// Start session
session_start();

// Includes user class
include_once('activiteit_functies.php');
$activiteiten = new Activiteit();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $activiteiten->activiteitVerwijderen($_POST['verwijderen']);
    header("location:activiteit.php");
} else {
    header("location:activiteit.php");
    die;
}
?>