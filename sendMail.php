<?php

// Autoloader for sendgrid
require 'assets/vendor/autoload.php';
// Incudes db
require_once('dbConnection.php');
class Mail{

private $database = [];
        
    
// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

private function checkContact($contactE, $contactT){
    if (empty($contactE)){
        if(empty($contactT)){
            return 0;
        }else{
            return 1;
        }
    }elseif (empty($contactT)){
        if(empty($contactE)){
            return 0;
        }else{
            return 1;
        }
    }
}

    // Contact mail
    public function VerstuurContactMail($naam, $onderwerp, $bericht, $contactT, $contactE) {
        
        if(empty($naam) || empty($onderwerp) || empty($bericht)){
            echo '<script>
            alert("Versturen mislukt!\nVul alstublieft alle velden in.")
            window.location = document.referrer;
            </script>';
        } elseif($this->checkContact($contactE, $contactT) == 0 ){
            echo '<script>
            alert("Aanmelding is mislukt!\nVul alstublieft alle velden in.")
            window.location = document.referrer;
            </script>';
        } elseif (filter_var($contactE, FILTER_VALIDATE_EMAIL) == false && !empty($contactE)) {
            echo '<script>
            alert("Email bestaat niet!\nVul alstublieft een geldige email in")
            window.location = document.referrer;
            </script>';
        } elseif (preg_match('/^[0-9]{10}+$/', $contactT) == false && !empty($contactT)) {
            echo '<script>
            alert("Telefoonnummer bestaat niet!\nVul alstublieft een geldige telefoonnummer in")
            window.location = document.referrer;
            </script>';

        }else{
            if ($contactE == null){
            $contact = $contactT;
        }elseif ($contactT == null){
            $contact = $contactE;
        }


        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("melvincuperus02@gmail.com", "Projectbureau");
        $email->setSubject("$onderwerp");
        $email->addTo("melvincuperus02@gmail.com", $naam);
        $email->addContent( 
            "text/html", 
            "Goeiemorgenmiddagavond<br><br>
             Bericht: $bericht <br><br>
             Met vriendelijke groet,
             <br>$naam 
             <br>Contact: $contact"
        );
        $sendgrid = new \SendGrid('');
        try {
            $response = $sendgrid->send($email);
            $response->statusCode();

        } catch (Exception $e) {
            'Caught exception: '. $e->getMessage();
        }
    }

    }

    // Sign out mail
    public function VerstuurAfmeldingMail($voornaam, $achternaam, $bericht) {
        if(empty($voornaam) || empty($achternaam) || empty($bericht)){
            echo '<script>
            alert("Versturen mislukt!\nVul alstublieft alle velden in.")
            window.location = document.referrer;
            </script>';
        }else{

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("melvincuperus02@gmail.com", "Projectbureau");
        $email->setSubject("afmelden voor activiteit");
        $email->addTo("melvincuperus02@gmail.com", $voornaam);
        $email->addContent( 
            "text/html", 
            "Goeiemorgenmiddagavond<br><br>
             Bericht: $bericht <br><br>
             Met vriendelijke groet,
             <br>$voornaam $achternaam
        ");
        $sendgrid = new \SendGrid('');
        try {
            $response = $sendgrid->send($email);
            $response->statusCode();

        } catch (Exception $e) {
            'Caught exception: '. $e->getMessage();
        }

    }
    }
}