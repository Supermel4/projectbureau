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
    <title>Contact</title>
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
                <form class="inline py-2" name="form1" method="POST" action="mailVersturenContact.php">
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Naam:</label></div>
                    <div class="flex-grow"><input type="text" name="naam" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <p>
                        <input type="radio" name="r1" id="e1" onchange="show2()"/><label class="font-semibold leading-10" leading-10>Email</label>
                        <div class="flex-inherit w-48"><input type="radio" checked="checked" name="r1" onchange="show(this.value)"/><label class="font-semibold leading-10" leading-10>Telefoonnummer:</label></div>
                    </p>
                     <div id="tele" class="flex-grow"><input type="tel" name="contact-t" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" placeholder="+31 6 "/></div>
                     <div id="mail" class="flex-grow hidden"><input type="email" name="contact-e" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base"/></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Onderwerp:</label></div>
                    <div class="flex-grow"><input type="text" name="onderwerp" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required /></div>
                </div>
                <div class="flex flex-wrap my-4">
                    <div class="flex-inherit w-60"><label class="font-semibold leading-10">Bericht:</label></div>
                    <div class="flex-grow"><textarea type="text" name="bericht" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full h-40 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" required></textarea></div>
                </div>
                    <button type="submit" name="submit" value="Verzenden" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-2xl transition-colors duration-500">Verzenden</button>
                </form>
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

<script type="text/javascript">
            function show(str){
                document.getElementById('mail').classList.add('hidden');
                document.getElementById('tele').classList.remove('hidden');
            }
            function show2(sign){
                document.getElementById('mail').classList.remove('hidden');
                document.getElementById('tele').classList.add('hidden');
            }
        </script>
