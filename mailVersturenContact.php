<?php
// Includes user class
include('sendMail.php');
$mail = new Mail();

// If submit is clicked update the user
if(isset($_POST['submit']))
{    
    $naam = $_POST['naam'];
    $contact = $_POST['contact'];
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['bericht'];
    $mail->VerstuurContactMail($naam, $contact, $onderwerp, $bericht);
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

