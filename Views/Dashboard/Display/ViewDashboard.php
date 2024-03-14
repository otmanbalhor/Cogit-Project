<?php

session_start();

$username = '';

if (isset($_SESSION["username"])){

    $username = $_SESSION["username"];

    echo "Welcome back " . $username;
}else{

header("Location: ViewLogin.php");
exit();
}

?>

<h1 class="text-2xl">DASHBOARD</h1>

<div>
    <h2>Statistics</h2>
    <p><?=$totalinvoices ?> invoices</p>
    <p><?=$totalcontacts ?> contacts</p>
    <p><?=$totalcompanies ?> companies</p>
</div>

<table class="min-w-full bg-white border border-gray-300 mx-auto">
    <h2>Last Invoices</h2>
    <thead>
        <tr class="bg-gray-700 text-white  m-4">
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

<table>
    <h2>Last Contacts</h2>
    <thead>
        <tr class="bg-gray-700 text-white  m-4">
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

<table class="min-w-full bg-white border border-gray-300 mx-auto">
    <h2>Last Companies</h2>
    <thead>
        <tr class="bg-gray-700 text-white  m-4">
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