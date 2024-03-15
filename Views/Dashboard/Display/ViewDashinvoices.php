<?php

session_start();

$username = '';

if (isset($_SESSION["username"])){

    $username = $_SESSION["username"];

    echo "<div><p>Welcome back $username!</p><p>You can here add an invoice, a company
    and some contacts</p></div>";
}else{

header("Location: login");
exit();
}

?>

<form action="" method="POST">
    <h2>New invoice</h2>
    <div>
        <input type="text" name="ref" placeholder="Reference" required>
    </div>
    <div>
        <input type="text" name="price" placeholder="Price" required>
    </div>
    <div>
        <input type="text" name="company_name" placeholder="Company name" required>
    </div>
    
    <input type="submit" name="ok" value="Save" required>
</form>
