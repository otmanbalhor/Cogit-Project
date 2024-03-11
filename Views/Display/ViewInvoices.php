<?php



$database = new PDO (
    "mysql:host=localhost;dbname=cogip;charset=utf8",'root',''
);

$search = $database->query('SELECT id_company FROM invoices ORDER BY id DESC');

$database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$display = "no"; 

if (isset($_GET["keywords"]) && !empty($_GET["keywords"])) {

    $keywords = htmlspecialchars($_GET["keywords"]);
    
    $req = $database->prepare('SELECT id_company FROM invoices WHERE id_company LIKE "%'.$keywords.'%"');
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $tab = $req->fetchAll();
   
    $display = "yes";
}
?>

<body class=" ">
    <span class="relative inline-block m-4">
        <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
        <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Invoices</span>
    </span>
    <div class="">
        <form class="flex justify-between mb-4" action="" method="get" name="search">
            <input class="border border-gray-300 rounded px-4 " type="search" name="keywords" value="" placeholder="Search company">
            <input class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded" type="submit" name="ok" value="search">
        </form>
    </div>
    <?php if (@$display === "yes") {?>
    <div id="results">
        <div id="nbr"> <?= count($tab) ?></div>
        <ol>
            <?php for($i=0;$i<count($tab);$i++){ ?>
            <li><?=$tab[$i] ?></li>
            <?php } ?>
        </ol>
    </div>
    
    <?php } ?>

    <table class="min-w-full bg-white border border-gray-300 ml-8 mr-8">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">INVOICE NUMBER</th>
                <th class="py-2 px-4 border-b">DUE DATES</th>
                <th class="py-2 px-4 border-b">COMPANY</th>
                <th class="py-2 px-4 border-b">CREATED AT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $key => $invoice) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><a href="showInvoice.php?id=<?= $invoice->getId() ?>" class="hover:underline"><?= $invoice->getRef() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getDue_date() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getCreated_at() ?></td>
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