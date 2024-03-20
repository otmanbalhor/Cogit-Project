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
    <body class="flex flex-col h-screen">
    <div class="flex-grow">
<main class="m-8">
    <span class="relative inline-block m-4">
        <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
        <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">All Invoices</span>
    </span>
   
        <form class="flex justify-end mb-4 gap-4" action="" method="get" name="search">
            <input class=" border border-gray-300 rounded px-4 " type="search" name="keywords" value="" placeholder="Search company">
            <input class=" transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded" type="submit" name="ok" value="search">
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

    <table class="min-w-full bg-white border border-gray-300 mx-auto">
        <thead>
            <tr class="bg-gray-700 text-white  m-4">
                <th class="py-2 px-4 border-b">Invoice number</th>
                <th class="py-2 px-4 border-b">Due date</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b"><span class="hover:cursor-pointer" id="sortDate">Created at</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $key => $invoice) : ?>
                <?php $bgColorClass = $key % 2 == 0 ? 'bg-gray-100' : ''; ?>
                <tr class="<?= $bgColorClass ?>">
                    <td class="py-2 px-4 border-b text-center"><a href="showInvoice" class="hover:underline"><?= $invoice->getRef() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getDue_date() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getName() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getCreated_at() ?></td>
                    <td class="py-2 px-4 border-b text-center"><?= $invoice->getPrice() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="m-4 flex justify-center">
    <div class="space-x-2">
        <?php 
           $totalInvoices = ceil($totalInvoices/10);
           for ($i = 1; $i <= $totalInvoices; $i++) {
            if(isset($_GET['page']) && $_GET['page'] == $i){
                echo "<span class='px-4 py-2 bg-blue-800 text-white rounded hover:cursor-pointer'>$i</span>";
            } else {
                if(!isset($_GET['page']) && $i == 1){
                    echo "<span class='px-4 py-2 bg-blue-800 text-white rounded hover:cursor-pointer'>$i</span>";
                } else {
                    echo "<span class='pageLink px-4 py-2 bg-blue-500 text-white rounded transition hover:bg-blue-600 hover:cursor-pointer'>$i</span>";
                }
            }
           }
        ?>
    </div>
</div>
        </main>
        </div>
        <script src="/Cogip-Project/Views/Display/sort.js" defer></script>