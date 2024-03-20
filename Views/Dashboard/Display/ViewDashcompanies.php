<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

$username = '';

if (isset($_SESSION["username"])) {

    $username = $_SESSION["username"];

    echo "<div><p>Welcome back $username!</p><p>You can here add an invoice, a company
    and some contacts</p></div>";
} else {

    header("Location: login");
    exit();
}

?>

<form action="" method="POST">
    <h2>New company</h2>
    <div>
        <input type="text" name="name" placeholder="Name" required>
    </div>
    <div>
        <input type="radio" name="type" value="Supplier">
        <label for="women">supplier</label>
        <input type="radio" name="type" value="Client">
        <label for="men">client</label>
    </div>
    <div>
        <input type="text" name="country" placeholder="Country" required>
    </div>
    <div>
        <input type="text" name="tva" placeholder="TVA" required>
    </div>

    <input type="submit" name="ok" value="Save" required>
</form>