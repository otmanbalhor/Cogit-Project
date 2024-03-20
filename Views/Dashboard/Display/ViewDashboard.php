<div class="w-full bg-white m-4 ">
    <div class="relative flex flex-col m-8">
        <div class="max-w-xl min-w-full mx-auto p-4">
    <span class="relative inline-block m-4">
        <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-[#f87171]"></span>
        <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left">DASHBOARD</span>
    </span>
    
    </div>
<div class="flex text-2xl font-bold max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
    <?php
    session_start();

    $username = '';

    if (isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        echo "Welcome back " . $username;
    } else {
        header("Location: ViewLogin.php");
        exit();
    }
    ?>
   </div> 
   <img class="absolute right-0 w-1/8 rounded-full"src="Assets/img/dash_petit.jpg" alt="">
    </div>
<div class="grid grid-cols-1 m-8">
    <div class="grid grid-cols-2 gap-4 ">
        <div class="max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
            <h2 class="text-xl font-bold mb-4">Statistics</h2>
            <div class="flex flex-col gap-4 p-4">
                <p class="w-full bg-blue-500 font-bold text-center text-white rounded-full p-4 "><?= $totalinvoices ?> invoices</p>
                <p class="w-full bg-[#a78bfa] text-center font-bold text-white rounded-full p-4 "><?= $totalcontacts ?> contacts</p>
                <p class="w-full bg-[#f87171] text-center font-bold text-white rounded-full p-4 "><?= $totalcompanies ?> companies</p>
            </div>
        </div>

        <div class="max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
            <h2 class="text-xl font-bold mb-4">Last Invoices</h2>
            <table class="min-w-full bg-white border border-gray-300 mx-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-2 px-4 border-b">Invoice number</th>
                        <th class="py-2 px-4 border-b">Date</th>
                        <th class="py-2 px-4 border-b">Company</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dashboard->lastInvoices as $key => $lastInvoice) : ?>
                        <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                        <tr class="<?= $bgColorClass ?>">
                            <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getRef() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getDue_date() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getName() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
            <h2 class="text-xl font-bold mb-4">Last Contacts</h2>
            <table class="min-w-full bg-white border border-gray-300 mx-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Phone</th>
                        <th class="py-2 px-4 border-b">Mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dashboard->lastContacts as $key => $lastContact) : ?>
                        <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                        <tr class="<?= $bgColorClass ?>">
                            <td class="py-2 px-4 border-b text-center"><?= $lastContact->getName() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastContact->getPhone() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastContact->getEmail() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
            <h2 class="text-xl font-bold mb-4">Last Companies</h2>
            <table class="min-w-full bg-white border border-gray-300 mx-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">TVA</th>
                        <th class="py-2 px-4 border-b">Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dashboard->lastCompanies as $key => $lastCompany) : ?>
                        <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                        <tr class="<?= $bgColorClass ?>">
                            <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getName() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getTva() ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getCountry() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>