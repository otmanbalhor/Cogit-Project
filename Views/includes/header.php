<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Assets/src/output.css" rel="stylesheet">
    <title>COGIP</title>
    <script>
    // Vérifie la largeur de l'écran lors du chargement de la page et lorsque la fenêtre est redimensionnée
    window.onload = checkWidth;
    window.onresize = checkWidth;

    function checkWidth() {
        // Obtient la largeur de l'écran
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        // Vérifie si la largeur de l'écran est inférieure à 620 pixels
        if (screenWidth < 620) {
            // Redirige vers la page d'erreur
            window.location.href = "Views/Display/sizeError.html";
        }
    }
</script>

</head>
<body class="flex flex-col h-screen">
<header>
    <nav class="bg-gray-700 text-white p-4  flex justify-between items-center 475:bg-red">
        <h1 class="text-2xl font-bold m-6 mr-10">COGIP</h1>

        <div class="nav-links flex-grow text-center">
            <ul class="flex justify-start gap-4">
                <li><a href="home" class="hover:text-gray-300 hover:border hover:border-gray-300 p-1">Home</a></li>
                <li><a href="invoices" class="hover:text-gray-300 hover:border hover:border-gray-300 p-1">Invoices</a></li>
                <li><a href="companies" class="hover:text-gray-300 hover:border hover:border-gray-300 p-1">Companies</a></li>
                <li><a href="contacts" class="hover:text-gray-300 hover:border hover:border-gray-300 p-1">Contacts</a></li>
            </ul>
        </div>

        <div class="flex gap-3">
            <a href="signup" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded">Sign up</a>
            <a href="login" class="transition ease-in-out delay-150 bg-gray-700 hover:-translate-y-1 hover:scale-110 hover:bg-gray-900 duration-100 text-white font-bold py-2 px-4 rounded">Login</a>
        </div>
    </nav>
</header>