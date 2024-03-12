<body>
    <main class="m-8">
<span class="relative inline-block m-4">
  <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
  <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Contacts</span>
</span>
    <table class="min-w-full bg-white border border-gray-300 mx-auto">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Phone</th>
                <th class="py-2 px-4 border-b">Mail</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $key => $contact) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><a href="showContact.php?id=<?= $contact->getId() ?>" class="hover:underline"><?= $contact->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $contact->getPhone() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $contact->getEmail() ?></td>
                    <td class="py-2 px-4 border-b text-center"></td>
                    <td class="py-2 px-4 border-b text-center"><?= $contact->getCreated_at() ?></td>
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
        </main>
</body>
