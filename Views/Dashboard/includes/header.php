<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="./Assets/src/output.css" rel="stylesheet">
</head>
<body class="flex flex-row">
<div class="w-1/5 bg-gray-200 h-screen">
    <header class="flex flex-r h-screen bg-gray-200">
        <nav class="p-4">
            <div class="w-full mb-4 border-b pb-2">
                <img src="Assets/img/user-circle-regular-72.png" class="w-full mb-2">
                <p class="text-2xl font-bold text-gray-600"><?=$_SESSION["username"] ?></p>
            </div>

            <ul class="flex flex-col space-y-4">
                <li>
                    <a href="dashboard" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/dashboard-solid-24.png" alt="Dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="dashinvoices" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/money-withdraw-regular-24.png" alt="Invoices">Invoices</a>
                </li>
                <li>
                    <a href="dashcompanies" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/factory-solid-24.png" alt="Companies">Companies</a>
                </li>
                <li>
                    <a href="dashcontacts" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/contact-solid-24.png" alt="Contacts">Contacts</a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto p-4">
            <a href="logout" class="text-gray-800 hover:underline">Log Out</a>
        </div>
    </header>
</div>
</body>
</html>


  
    