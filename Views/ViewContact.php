<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>NAME</th>
                <th>PHONE</th>
                <th>MAIL</th>
                <th>COMPANY</th>
                <th>CREATED AT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact->getName() ?></td>
                    <td><?= $contact->getPhone() ?></td>
                    <td><?= $contact->getEmail() ?></td>
                    <td></td>
                    <td><?= $contact->getCreated_at() ?></td>
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
