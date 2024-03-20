
<main class="m-8">
        <span class="relative inline-block m-4">
            <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
            <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Company</span>
        </span>

        <span class="relative inline-block m-8">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Last Invoices</span>
</span>
<table class="min-w-full bg-white border border-gray-300 mx-auto">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Invoice number</th>
                <th class="py-2 px-4 border-b">Due date</th>
                <th class="py-2 px-4 border-b">Company</th>
            </tr>
            <?php foreach ($showCompany->lastInvoices as $key => $lastInvoice) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getRef() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getDue_date() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $lastInvoice->getName() ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>

</table>
    </main>
    

</body>
