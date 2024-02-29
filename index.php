<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once("Controllers/Router.php");
require_once("Controllers/ControllerHome.php");

$page = $_GET['page'] ?? null;

switch ($page) {
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}

$router = new Router();

$router->reqRoute();



