<?php

session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Route\Route;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

require_once __DIR__ . '/../Route/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

Route::resolve($uri, $method);