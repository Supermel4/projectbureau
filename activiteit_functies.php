<?php

// Incudes db
require_once('dbConnection.php');
class Activiteit{

private $database = [];
    

// Db connection
public function __construct(){
    $this->database = new DbConnection(); 
}

// Gets all activities
public function activiteitenOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Adds an activity
public function activiteitToevoegen($activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    $d1 = new DateTime($begindatum);
    $d2 = new DateTime($einddatum);
    if ($d1 == $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Begindatum en Eindatum mogen niet gelijk zijn';
        header("Location:activiteitAanmaken.php");

    }elseif ($d1 > $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Eindatum mag niet eerder zijn dan de Begindatum';
        header("Location:activiteitAanmaken.php");

    }elseif(empty($activiteitnaam) || empty($begindatum) || empty($einddatum) || empty($locatie) || empty($minimum) || empty($maximum)){
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header("Location:activiteitAanmaken.php");

    }else{
        $stmt = $this->database->connection->prepare("INSERT INTO activiteiten (activiteitnaam,begindatum,einddatum,locatie,minimum,maximum) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum);
        $stmt->execute();
        header("location:activiteit.php");
    }
}

// Deletes an activity
public function activiteitVerwijderen($id) {
    $stmt = $this->database->connection->prepare("DELETE FROM activiteiten WHERE id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Updates an activity
public function activiteitWijzigen($id, $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum) {
    
    $d1 = new DateTime($begindatum);
    $d2 = new DateTime($einddatum);
    if ($d1 == $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Begindatum en Eindatum mogen niet gelijk zijn';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }elseif ($d1 > $d2) {
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Eindatum mag niet eerder zijn dan de Begindatum';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }elseif(empty($activiteitnaam) || empty($begindatum) || empty($einddatum) || empty($locatie) || empty($minimum) || empty($maximum)){
        $_SESSION['message'] = '<i class="fas fa-exclamation-circle"></i> Sommige velden zijn niet ingevuld';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else{
        $stmt = $this->database->connection->prepare("UPDATE activiteiten SET activiteitnaam=?,begindatum=?,einddatum=?,locatie=?,minimum=?,maximum=? WHERE id= ?");
        $stmt->bind_param('ssssssi', $activiteitnaam, $begindatum, $einddatum, $locatie, $minimum, $maximum, $id);
        $stmt->execute();
        header("location:activiteit.php");
    }
}

// Gets activity based on the id
public function activiteitOphalen($id) {
    $stmt = $this->database->connection->prepare('SELECT * FROM activiteiten WHERE id= ? LIMIT 1');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all attendance
public function presentieOphalen() {
    $stmt = $this->database->connection->prepare('SELECT * FROM aanmeldingen');
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Gets all attendance
public function presentieOphalen2($activiteitid) {
    $stmt = $this->database->connection->prepare('SELECT id,voornaam, achternaam, contact FROM aanmeldingen WHERE activiteitid = ?');
    $stmt->bind_param('i', $activiteitid);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_assoc();
    return $result;
}

// public function getPresentieBijActiviteit($activiteitid){
//     $stmt = $this->database->connection->prepare('SELECT voornaam, achternaam FROM aanmeldingen WHERE activiteitid = ?');
//     $stmt->bind_param('i', $groepID);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return $result; 
// }

// public function presentieOphalenActiviteit($aanmeldID){
//     $stmt = $this->database->connection->prepare('SELECT aanmeldingen.id as aanmeldID, voornaam, achternaam, contact FROM aanmeldingen INNER JOIN activiteiten ON activiteiten.id = aanmeldingen.activiteitid WHERE gebruikers.id = ?');
//     $stmt->bind_param('i', $aanmeldID);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return $result;
// }

// /**
//      * @param $message
//      * @return string
//      * Echo this function to show an error message
//      */
//     public function error_message($message): string
//     {
//         return '
//     <script>setTimeout(function(){document.getElementById("error").classList.add("opacity-0")},4000);setTimeout(function(){document.getElementById("error").classList.add("hidden")},5000);</script>
//                     <div id="error" class=" duration-1000 transition-opacity fixed top-0 right-0 mt-5 mr-5 flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
//                         <div class="flex items-center justify-center w-12 bg-red-500">
//                             <i class="fas fa-exclamation"></i>
//                         </div>

//                         <div class="px-4 py-2 pb-5 -mx-3">
//                             <div class="mx-3">
//                                 <span class="font-semibold text-red-500 dark:text-red-400">Oeps!</span>
//                                 <p class="text-sm text-gray-600 dark:text-gray-200">' . $message . '</p>
//                             </div>
//                         </div>
//                     </div>
//     ';
//     }

}