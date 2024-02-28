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
                <th>NAME</th>
                <th>TVA</th>
                <th>COUNTRY</th>
                <th>TYPE</th>
                <th>CREATED AT</th>
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

</html>
