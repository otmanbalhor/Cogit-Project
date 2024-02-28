<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
</head>

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

</html>
