<?php

session_start();

if(isset($_SESSION["username"])){

    $username = $_SESSION["username"];

    echo "Hello ".$username;
}else{

    header("Location: ViewLogin.php");
    exit();
}