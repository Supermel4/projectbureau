<?php

    // Start session
    session_start();

    $pathprefix = '../';

// Incude necessary files
// Includes user class
include_once('gebruiker_functies.php');
$gebruiker = new Gebruiker();

    // If login is clicked
    if(isset($_POST['login']))
    {
        //print_r($_POST);

        // Set login variables
        $username = $_POST['gebruikersnaam'];
        $password = $_POST['wachtwoord'];

        $gebruiker->checklogin($username, $password);

        if ($_SESSION['loggedin'] == true  ) {

            header("Location:activiteit.php");
        }

        if($_SESSION['loggedin'] == false){
            //Error message
            $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Incorrecte gebruikersnaam of wachtwoord';
            header("Location:inloggen.php");
        }
   }
?>