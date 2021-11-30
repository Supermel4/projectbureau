<?php

// Pathprefix
$pathprefix = '../../';

// request activiteiten
include_once('activiteit_functies.php');

// Start session
session_start();
// Requests users
$activiteiten = new Activiteit();
$activiteiten->activiteitenOphalen();
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

    <script type="text/javascript" src="assets/navbar.js"></script>
</head>

<body>
<div>
    <nav class="bg-green-500 dark:bg-green-800 shadow ">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                        <a class="text-white px-3 py-2 rounded-md text-sm font-medium">
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
<h1 class="text-3xl text-center">Activiteiten</h1>

<div class="pagewrapper">
	<div class="px-4 py-5 bg-white sm:p-6">
        <a href="activiteitAanmaken.php" class="btn-primary"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors duration-500"><i class="fas fa-plus"></i> Toevoegen</button></a>
	</div>
	<div class="px-4 py-5 bg-white sm:p-6">
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Activiteitnaam
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Begindatum
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Einddatum
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Locatie
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Deelnemers
							</th>
							<th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
								Acties
							</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php 

						// Requests all users
						$activiteiten_result = $activiteiten->activiteitenOphalen();

                        foreach ($activiteiten_result as $item)
						{
                        $orgStartDate = $item['begindatum'];  
                        $newStartDate = date("d-m-Y H:i", strtotime($orgStartDate));  
                        
                        $orgEndDate = $item['einddatum'];  
                        $newEndDate = date("d-m-Y H:i", strtotime($orgEndDate));  
                        

							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['activiteitnaam'];"
								</p>
							</td>";
							echo
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
									"; echo $newStartDate;"
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $newEndDate;" 
								</p>
							</td>";

							echo 
							"<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
									"; echo $item['locatie'];" 
								</p>
							</td>";
							echo 
							"
							<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
								<p class='text-gray-900 whitespace-no-wrap'>
								"; echo $item['maximum'];"  
								</p>
							</td>";
							echo 
							'
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<form class="inline" method="POST" action="activiteitDelete.php">
									<button name="verwijderen" value="'.$item['id'].'" type="submit"><i class="far fa-trash-alt"></i></button> 
								</form>
								<a href="wijzigengebruiker.php?id='.$item['id'].'" type="submit"><i class="fas fa-edit"></i></a> 
							</td>
					</tr>';} ?>
				</tbody>

</body>        

</html>

</body>

</html>