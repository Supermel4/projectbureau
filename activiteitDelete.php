<?php
// Checks if user is logged in
include "loginCheck.php";

// Includes user class
include_once('activiteit_functies.php');
$activiteiten = new Activiteit();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $activiteiten->activiteitVerwijderen($_POST['verwijderen']);
    echo '<script>
    alert("Aanmelding is mislukt! Vul alstublieft alle velden in.")
    window.location = "activiteit.php";
    </script>';
} else {
    header("location:activiteit.php");
    die;
}
?>