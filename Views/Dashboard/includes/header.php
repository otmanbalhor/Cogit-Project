<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="./Assets/src/output.css" rel="stylesheet">
    <script src="Assets/js/userImg.js"></script>
</head>
<body class="flex flex-row h-screen">
<div class="w-1/5 bg-gray-200">
    <header class="flex flex-col justify-between h-auto bg-gray-200">
        <nav class="p-4">
            <div class="w-full mb-4 pb-2 border-b border-gray-400">
            
    <br>
    <img class="rounded-full mx-auto my-4" id="profilePic" src="Assets/img/user-circle-regular-224.png" alt="Image de profil" style="max-width: 250px;">
    <input type="file" id="avatar" accept="image/*" style="display: none;">
        <div class="flex justify-between">
            <button onclick="chooseFile()"><img src="Assets/img/edit-regular-24(1).png" alt=""></button>
            <button onclick="clearLocalStorage()"><img src="Assets/img/eraser-regular-24.png" alt=""></button>
        </div>
                <p class="text-2xl text-center font-bold text-gray-600"><?=$_SESSION["username"] ?></p>
            </div>

            <ul class="flex flex-col space-y-4 border-b border-gray-400">
                <li>
                    <a href="dashboard" class="flex flex-row text-gray-800  hover:underline"><img class="mr-1" src="Assets/img/dashboard-solid-24.png" alt="Dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="dashinvoices" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/money-withdraw-regular-24.png" alt="Invoices">Invoices</a>
                </li>
                <li>
                    <a href="dashcompanies" class="flex flex-row text-gray-800 hover:underline"><img class="mr-1" src="Assets/img/factory-solid-24.png" alt="Companies">Companies</a>
                </li>
                <li>
                    <a href="dashcontacts" class="flex flex-row text-gray-800 hover:underline mb-4"><img class="mr-1" src="Assets/img/contact-solid-24.png" alt="Contacts">Contacts</a>
                </li>
            </ul>
        </nav>
        <div class="p-4 mt-auto">
            <a href="login" class="transition ease-in-out delay-150 bg-red-500 hover:-translate-y-1 hover:scale-110 hover:bg-red-700 duration-100 text-gray-600 font-bold py-2 px-4 rounded"">Log Out</a>
        </div>
    </header>
</div>
</body>
</html>
