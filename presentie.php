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
$presentie = new Activiteit();

// Gets activity based on id
$presentie->presentieOphalen();

// Loops through the activity
foreach ($presentie as $singlePresentie){
    $presentie = $singlePresentie;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css">
    <link href="src/tailwind.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link href="//use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<title>Presentie</title>
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
<h1 class="text-3xl text-center">Presentie</h1>

<div class="pagewrapper">
    <div class="px-4 py-5 bg-white sm:p-6">
        <a href="activiteit.php" class="btn-primary"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors duration-500"><i class="fas fa-arrow-left"></i> Terug</button></a>
    </div>
		<div class="px-4 py-5 bg-white sm:p-6">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-bold">
								Naam
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-bold">
								Contact
							</th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-bold">
								Acties
							</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php 

						// Requests all users
						$presentie_result = $presentie->presentieOphalen2($_GET['id']);
                        foreach ($presentie_result as $item)
						{                     
							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo ucfirst($item['voornaam']) . " " . ucwords($item['achternaam']);"
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
									"; echo strtolower($item['contact']);" 
								</p>
							</td>";

                            echo 
							'
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<form class="inline py-2" name="form1" method="POST" action="presentieDelete.php">
									<button onclick="return confirm(\'Weet je zeker dat u deze deelnemer wilt verwijderen?\')" name="verwijderen" value="'.$item['id'].'" type="submit"><i class="far fa-trash-alt"></i></button> 
								</form>
							</td>
					</tr>';} ?>
				</tbody>
				
            </body>        

</html>