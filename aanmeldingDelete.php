<?php
// Includes user class
include('sendMail.php');
$mail = new Mail();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $bericht = $_POST['bericht'];
    $mail->VerstuurAfmeldingMail($voornaam, $achternaam, $bericht);
    echo '<script>
    alert("Het bericht is verzonden naar het projectbureau. \nEr wordt zo snel mogelijk contact met u opgenomen.")
    window.location = "index.php";
    </script>';
} else {
    echo '<script>
    alert("Het bericht verzenden is mislukt, probeer het later nog eens")
    window.location = "index.php";
    </script>';
    die;
}

