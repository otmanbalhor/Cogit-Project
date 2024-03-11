<body>
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Companies</span>
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
        </thead>
        <tbody>
        <?php foreach ($companies as $key => $company) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $company->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getTva() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getCountry() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getType() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="m-4 flex justify-center">
    <div class="space-x-2">
        <?php 
            for ($i = 1; $i <= 10; $i++) {
                echo "<a href='#' class='px-4 py-2 bg-blue-500 text-white rounded transition hover:bg-blue-600'>$i</a>";
            }
        ?>
    </div>
</div>


</body>
