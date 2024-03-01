<body>
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Companies</span>
</span>
    <table class="min-w-full bg-white border border-gray-300 ml-8 mr-8">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">NAME</th>
                <th class="py-2 px-4 border-b">TVA</th>
                <th class="py-2 px-4 border-b">COUNTRY</th>
                <th class="py-2 px-4 border-b">TYPE</th>
                <th class="py-2 px-4 border-b">CREATED AT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company) : ?>
                <tr>
                    <td><?= $company->getName() ?></td>
                    <td><?= $company->getTva() ?></td>
                    <td><?= $company->getCountry() ?></td>
                    <td><?= $company->getType() ?></td>
                    <td><?= $company->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php 
            for($i=1;$i<=10;$i++){

                echo "<a href=''>$i</a>&nbsp";
            }
        ?>
    </div>
</body>
