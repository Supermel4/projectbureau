<?php

// Start session
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: activiteit.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
	<link href="src/tailwind.css" rel="stylesheet">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>

<div class="px-4 py-5 bg-white sm:p-6">
<a href="index.php" class="btn-primary"><button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition-colors duration-500"><i class="fas fa-arrow-left"></i> Terug</button></a>
</div>

	<div class="flex items-center justify-center m-6">
		<div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
			<div class="text-center mb-2 text-xl font-semibold text-gray-600 sm:text-2xl dark:text-white">
				Projectbureau
			</div>
			<div class="mt-8">
				<form method="post" action="login.php" autoComplete="off">
					<div class="flex flex-col mb-2">
						<div class="flex relative ">
							<span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
							<i class="fas fa-user-circle"></i>
							</span>
							<input type="text" name="gebruikersnaam" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" placeholder="Gebruikersnaam" required/>
						</div>
					</div>
					<div class="flex flex-col mb-4">
						<div class="flex relative ">
							<span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
							<i class="fas fa-unlock"></i>
							</span>
							<input type="password" name="wachtwoord" class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" placeholder="Wachtwoord" required/>
						</div>
					</div>
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
					<div class="flex w-full">
						<button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 w-full rounded-md transition-colors duration-500" type="submit" id='login' name="login">
							Inloggen
                            <i class="fas fa-arrow-right"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>