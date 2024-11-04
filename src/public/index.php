<?php

session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();


use App\Controllers\AuthController;
use App\Services\AuthService;

$authController = new AuthController();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/register') {
    if ($method === 'POST') {
        $authController->register($_POST);
    } else {
        $authController->render('register');
    }
}

elseif ($uri === '/login') {
    if ($method === 'POST') {
        $authController->login($_POST);
    } else {
        $authController->render('login');
    }
}

elseif ($uri === '/logout') {
    $authController->logout();
}

elseif ($uri === '/dashboard') {
    $authService = new AuthService();
    if ($authService->isAuthenticated()) {
        $authController->render('dashboard');
    } else {
        header("Location: /login");
        exit;
    }
} else {
    header("Location: /login");
    exit;
}
