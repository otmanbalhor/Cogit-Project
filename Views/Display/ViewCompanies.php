<body class="flex flex-col h-screen">
    <div class="flex-grow">
<main class="m-8">
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Companies</span>
</span>
<form class="flex justify-end mb-4 gap-4" action="" method="get" name="search">
            <input class=" border border-gray-300 rounded px-4 " type="search" name="keywords" value="" placeholder="Search company">
            <input class=" transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded" type="submit" name="ok" value="search">
        </form>
    <table class="min-w-full bg-white border border-gray-300 mx-auto">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b"><form><a href="?sortBy=Name">Name</a></form></th>
                <th class="py-2 px-4 border-b">TVA</th>
                <th class="py-2 px-4 border-b">Country</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b"><form><input class="hover:cursor-pointer" value="Created at" type="submit" name="CompaniesDate"></form></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($companies as $key => $company) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><a href="showCompany" class="hover:underline"><?= $company->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getTva() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getCountry() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getTypeName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $company->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="m-4 flex justify-center">
    <div class="space-x-2">
        <?php 
            $totalCompanies = ceil($totalCompanies/10);
            for ($i = 1; $i <= $totalCompanies; $i++) {
                if(isset($_GET['page']) && $_GET['page'] == $i){
                    echo "<span class='px-4 py-2 bg-blue-800 text-white rounded hover:cursor-pointer'>$i</span>";
                } else {
                    if(!isset($_GET['page']) && $i == 1){
                        echo "<span class='px-4 py-2 bg-blue-800 text-white rounded hover:cursor-pointer'>$i</span>";
                    } else {
                        echo "<a href='?page=$i' class='px-4 py-2 bg-blue-500 text-white rounded transition hover:bg-blue-600'>$i</a>";
                    }
                }
            }
        ?>
    </div>
</div>
        </main>
</div>
</body>
