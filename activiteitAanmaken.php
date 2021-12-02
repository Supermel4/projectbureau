

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
<h1 class="text-3xl text-center">Activiteit aanmaken</h1>
<div class="pagewrapper">
    
<div class="px-4 py-5 bg-white sm:p-6">
<a href="activiteit.php" class="btn-primary"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors duration-500"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">
                
            
                    </div>
                    <form action="activiteitInsert.php" method="post">
                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Activiteitnaam:</label></div>
                            <div class="flex-grow"><input type="text" name="activiteitnaam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>

                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10" leading-10>Begindatum:</label></div>
                            <div class="flex-grow"><input type="datetime-local" name="begindatum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>
                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Einddatum:</label></div>
                            <div class="flex-grow"><input type="datetime-local" name="einddatum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>
                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Locatie:</label></div>
                            <div class="flex-grow"><input type="text" name="locatie" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>
                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Minimum:</label></div>
                            <div class="flex-grow"><input type="text" name="minimum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>
                        <div class="flex flex-wrap my-4">
                            <div class="flex-inherit w-60"><label class="font-semibold leading-10">Maximum:</label></div>
                            <div class="flex-grow"><input type="text" name="maximum" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                        </div>
                        
                        <button type="submit" name="submit" value="Toevoegen" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 transition-colors duration-500">
                            Opslaan
                        </button>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>