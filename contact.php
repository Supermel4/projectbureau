<?php


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
<h1 class="text-3xl text-center font-medium">Contact</h1>

<div class="px-4 py-5 sm:p-6">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-3">
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Naam:</label></div>
                    <div class="flex-grow"><input type="text" name="naam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Telefoonummer of E-mailadres:</label></div>
                    <div class="flex-grow"><input type="text" name="contact" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Bericht:</label></div>
                    <div class="flex-grow"><textarea type="text" name="bericht" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full h-40 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required></textarea></div>
                </div>
                    <button type="submit" name="submit" value="Verzenden" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-2xl transition-colors duration-500">Verzenden</button>
            </div>
        </div>
    </div>
</div>

</body>

<br>

<footer class="bg-white text-sm text-center font-bold border-t-2 border-gray-300 fixed inset-x-0 bottom-0 p-4">
                &copy 2021-<?php echo date("Y");?> Melvin Cuperus producties
</footer>


</html>