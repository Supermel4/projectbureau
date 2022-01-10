<?php
// Includes user class
include_once('aanmelding_functies.php');
$aanmeldingen = new Aanmelding();

// If delete button is clicked delete the user
if(isset($_POST['verwijderen']))
{    
    $aanmeldingen->aanmeldingVerwijderen3($_POST['verwijderen']);
    echo '<script>
    alert("Verwijderen is gelukt!")
    window.location = document.referrer;
    </script>';
} else {
    echo '<script>
    alert("Er is iets flink misgegaan!")
    window.location = document.referrer;
    </script>';
    die;
}
?>