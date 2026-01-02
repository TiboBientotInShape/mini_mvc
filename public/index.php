<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

$routes = [
    ['GET', '/', [Mini\Controllers\HomeController::class, 'index']],
    ['GET', '/product', [Mini\Controllers\ProductController::class, 'show']],
    ['GET', '/cart', [Mini\Controllers\CartController::class, 'index']],
    ['POST', '/cart/add', [Mini\Controllers\CartController::class, 'add']],
    ['POST', '/cart/remove', [Mini\Controllers\CartController::class, 'remove']],
    ['GET', '/register', [Mini\Controllers\AuthController::class, 'registerForm']],
    ['POST', '/register', [Mini\Controllers\AuthController::class, 'register']],
    ['GET', '/login', [Mini\Controllers\AuthController::class, 'loginForm']],
    ['POST', '/login', [Mini\Controllers\AuthController::class, 'login']],
    ['GET', '/logout', [Mini\Controllers\AuthController::class, 'logout']],
];

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);