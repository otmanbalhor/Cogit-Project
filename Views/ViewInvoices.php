
<body>
    <table>
        <thead>
            <tr>
                <th>INVOICE NUMBER</th>
                <th>DUE DATES</th>
                <th>CREATED AT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice) : ?>
                <tr>
                    <td><?= $invoice->getRef() ?></td>
                    <td><?= $invoice->getDue_date() ?></td>
                    <td><?= $invoice->getCreated_at() ?></td>
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
