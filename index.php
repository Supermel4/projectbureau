<?php

// Pathprefix
$pathprefix = '../../';

// request activiteiten
include_once('activiteit_functies.php');

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

<body class="bg-gray-100">
<div>
    <nav class="bg-white shadow ">
        <div class="mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0" href="/">
                        <a class="px-3 py-2 rounded-md text-3xl font-bold">
                            Projectbureau
                        </a>
                    </a>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a class="text-2xl font-bold hover:text-blue-600 hover:underline relative inline-block text-left transition-colors"
                               href="index.php">
                                Home
                            </a>
                            <a class="text-2xl font-bold hover:text-blue-600 hover:underline relative inline-block text-left transition-colors"
                               href="contact.php">
                                Contact
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </nav>
    </a>
</div>

<br>
<h1 class="text-3xl text-center font-medium">Activiteiten</h1>

		<div class="py-4">
			<div class="py-4 overflow-x-auto flex flex-wrap">
					
						<?php

						// Requests all groups
						$activiteiten_result = $activiteiten->activiteitenOphalen();

						// Loops through groups
                        foreach ($activiteiten_result as $item)
						{
                            setlocale(LC_TIME, array('da_NL.UTF-8','da_NL@euro','da_NL','dutch'));
                            
                            $orgStartDate = $item['begindatum'];  
                            $newStartDate = strftime("%A %e %B van %R", strtotime($orgStartDate));  
                            
                            $orgEndDate = $item['einddatum'];  
                            $newEndDate = strftime("%R", strtotime($orgEndDate));  
                            
							echo '
							<div class="w-full h-48 flex md:justify-around justify-between flex-col mt-10 ml-5">
							<div class="p-2 mx-2 my-2 place-items-center text-white bg-gray-400 rounded-3xl">
							<h1 class="text-2xl text-center font-bold">'.ucfirst($item['activiteitnaam']).'</h1>
							<br>
							<h1 class="text-center">Op <b>'.$newStartDate.'</b> tot <b>'.$newEndDate.'</b></h1>
							<br>
							<h1 class="text-center">Locatie: <b>'.ucfirst($item['locatie']).'</b></h1>
                            <br>
                            <a href="aanmelden.php"><button class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-2xl transition-colors duration-500"><i class="fas fa-plus"></i> Aanmelden</button></a>
                            <a href="afmelden.php"><button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-2xl transition-colors duration-500"><i class="fas fa-minus"></i> Afmelden</button></a>
                            </div>
							</div>
							';
					} ?>
					</div>
				</div>

</body>

<br>

<footer class="bg-white text-sm text-center font-bold border-t-2 border-gray-300 relative inset-x-0 bottom-0 p-4">
                &copy 2021-<?php echo date("Y");?> Melvin Cuperus producties
</footer>

</html>