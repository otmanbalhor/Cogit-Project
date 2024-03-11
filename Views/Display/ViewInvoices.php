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

        <form class="flex justify-center" action="" method="get" name="search">
            <input type="search" name="keywords" value="" placeholder="Search company">
            <input class="" type="submit" name="ok" value="search">
        </form>

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
                <th class="py-2 px-4 border-b">Invoice number</th>
                <th class="py-2 px-4 border-b">Due date</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Created at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $key => $invoice) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getRef() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getDue_date() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getCreated_at() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="m-4 text-center">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<a href='' class='px-2 py-1 bg-gray-500 text-white  mr-2'>$i</a>";
        }
        ?>
    </div>

</body><a