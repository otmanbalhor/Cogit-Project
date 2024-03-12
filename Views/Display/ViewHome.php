<body class=" ">
    <div class="bg-gray-700 text-white p-4  flex justify-between items-center">
        <p class="text-6xl font-extrabold ml-20 ">MANAGE YOUR CUSTOMERS AND INVOICES EASILY</p>
        <img class="rounded-full w-1/2 h-1/2 m-20" src="Assets/img/logo3.jpg" alt="">
    </div>
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Last Invoices</span>
</span>
<table class="min-w-full bg-white border border-gray-300 ml-8 mr-8">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Invoice number</th>
                <th class="py-2 px-4 border-b">Due date</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
            <?php foreach ($home->lastInvoices as $key => $lastInvoice) : ?>
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
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Last Contacts</span>
</span>
<table class="min-w-full bg-white border border-gray-300 ml-8 mr-8">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Phone</th>
                <th class="py-2 px-4 border-b">Mail</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
            <?php foreach ($home->lastContacts as $key => $lastContact) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $lastContact->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastContact->getPhone() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastContact->getEmail() ?></td>
                    <td class="py-2 px-4 border-b text-center"></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastContact->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>
</table>
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Last Companies</span>
</span>
<table class="min-w-full bg-white border border-gray-300 ml-8 mr-8">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">TVA</th>
                <th class="py-2 px-4 border-b">Country</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
            <?php foreach ($home->lastCompanies as $key => $lastCompany) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getTva() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getCountry() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getType() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastCompany->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>
</table>
<span class="bg-blue-200 text-gray-800 p-4  flex justify-between items-center">
<p class="text-6xl font-extrabold ml-20 ">WORK BETTER IN YOUR COMPANY</p>
<img class="rounded-full w-1/2 h-1/2 m-20" src="Assets/img/logo.jpg" alt="">   
</span>