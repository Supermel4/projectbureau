<?php
// Includes user class
include_once('aanmelding_functies.php');
$aanmeldingen = new Aanmelding();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $aanmeldingen->aanmeldingVerwijderen($_POST['verwijderen']);
    echo '<script>
    alert("Afmelding is mislukt! Vul alstublieft alle velden in.")
    window.location = "index.php";
    </script>';
} else {
    echo '<script>
    alert("Er is iets flink misgegaan!")
    window.location = "afmelden.php";
    </script>';
    die;
}
?>