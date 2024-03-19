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
    <h2>New contacts</h2>
    <div>
        <input type="text" name="name" placeholder="Name" required>
    </div>
    <div>
        <input type="text" name="company_name" placeholder="Company name" required>
    </div>
    <div>
        <input type="email" name="email" placeholder="E-mail" required>
    </div>
    <div>
        <label for="phone">Format: 123-456-7890</label>
        <input type="tel" name="phone" placeholder="Phone" required>
    </div>
    
    <input type="submit" name="ok" value="Save" required>
</form>
