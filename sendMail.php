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

    // Contact mail
    public function VerstuurContactMail($naam, $contact, $onderwerp ,$bericht) {
        
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
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            $response->statusCode();

        } catch (Exception $e) {
            'Caught exception: '. $e->getMessage();
        }

    }

    // Registration mail
    public function VerstuurContactMail2($naam, $contact, $onderwerp ,$bericht) {
        
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
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            $response->statusCode();

        } catch (Exception $e) {
            'Caught exception: '. $e->getMessage();
        }

    }

}