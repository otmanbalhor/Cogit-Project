<?php

session_start();

if(isset($_SESSION["username"])){

    $username = $_SESSION["username"];

    echo "Welcome back ".$username;
}//else{

    //header("Location: ViewLogin.php");
    //exit();
//}
?>

<table class="min-w-full bg-white border border-gray-300 mx-auto">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Invoice number</th>
                <th class="py-2 px-4 border-b">Due date</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
            <?php foreach ($dashboard->lastInvoices as $key => $lastInvoice) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getRef() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getDue_date() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>

</table>