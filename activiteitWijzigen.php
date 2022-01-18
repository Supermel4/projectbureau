<?php
// Checks if user is logged in
include "loginCheck.php";

// Gets the id of the activity
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

// Includes activity class
include_once('activiteit_functies.php');
$activiteiten = new Activiteit();

// Gets activity based on id
$activiteiten = $activiteiten->activiteitOphalen($id);

// Loops through the activity
foreach ($activiteiten as $singleActiviteiten){
    $activiteiten = $singleActiviteiten;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
	<script type="text/javascript" src="assets/navbar.js"></script>
    <title>Activiteit wijzigen</title>
</head>

<body>
<div>
    <nav class="bg-green-500 dark:bg-green-800 shadow ">
        <div class="mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                        <a class="text-white px-3 py-2 rounded-md text-sm font-bold">
                            Projectbureau
                        </a>
                    </a>
                    
                </div>
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div class="text-white hover:text-green-800 dark:hover:text-white relative inline-block text-left transition-colors">
                                <div>
                                <form class="inline" method="POST" action="loguit.php">
									<button name="logout" value="uitloggen" type="submit"><i class="fas fa-sign-out-alt"></i> Uitloggen</button> 
								</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    </a>
</div>

<br>
<body>
<h1 class="text-3xl text-center">Activiteit wijzigen</h1>
<div class="pagewrapper">
    
<div class="px-4 py-5 bg-white sm:p-6">
<a href="activiteit.php" class="btn-primary"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors duration-500"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">

            <?php
						if (isset($_SESSION['message'])) {
						?>
							<div class="rounded-md border border-red-500 text-center text-red-500 font-semibold p-1 mb-4">
								<?php echo $_SESSION['message']; ?>
							</div>
						<?php
							unset($_SESSION['message']);
						}
					?>
        <?php
            if ($id != null){

                $orgStartDate = $activiteiten['begindatum'];  
                $newStartDate = date("d-m-Y H:i", strtotime($orgStartDate));  
                
                $orgEndDate = $activiteiten['einddatum'];  
                $newEndDate = date("d-m-Y H:i", strtotime($orgEndDate)); 

                echo '
               
                <form action="activiteitUpdate.php" method="post">
                <input type="text" value="'.  $id .'" name="id" class="hidden" required />
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Activiteitnaam:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  htmlspecialchars($activiteiten['activiteitnaam']) .'" name="activiteitnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>
 
                <div class="flex flex-wrap my-4">
                     <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Begindatum:</label></div>
                     <div class="flex-grow"><input type="datetime-local" value="'. htmlspecialchars($activiteiten['begindatum']) .'" name="begindatum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>

                <div class="flex flex-wrap my-4">
                     <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Einddatum:</label></div>
                     <div class="flex-grow"><input type="datetime-local" value="'.  htmlspecialchars($activiteiten['einddatum']) .'" name="einddatum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>

                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Locatie:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  htmlspecialchars($activiteiten['locatie']) .'" name="locatie" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>

                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Minimum:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  htmlspecialchars($activiteiten['minimum']) .'" name="minimum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>

                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Maximum:</label></div>
                    <div class="flex-grow"><input type="text" value="'.  htmlspecialchars($activiteiten['maximum']) .'" name="maximum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>

                <button type="submit" name="submit" value="Toevoegen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 transition-colors duration-500">
                Opslaan
                </button>
            </form>
                ';
            }else{
                echo '
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-100 md:w-80 m-auto">
                    <div class="w-full text-center">
                        <div class="flex flex-col justify-between">
                            <i class="my-2 fas fa-times text-red-400 text-4xl"></i>
                            <p class="text-md py-2 px-6 text-gray-800 dark:text-white font-bold">
                                Fout
                            </p>
                            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                                De activiteit kan niet gewijzigd worden, omdat geen activiteit is opgevraagd.
                            </p>
                        </div>
                    </div>
                </div>
                ';
            }
        ?>
    </div>
</body>
</html>