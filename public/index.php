<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

$routes = [
    // Page d'accueil
    ['GET', '/', [Mini\Controllers\HomeController::class, 'index']],
    
    // Page produit
    ['GET', '/product', [Mini\Controllers\ProductController::class, 'show']],
    
    // --- PANIER ---
    ['GET', '/cart', [Mini\Controllers\CartController::class, 'index']],
    ['POST', '/cart/add', [Mini\Controllers\CartController::class, 'add']],
    ['POST', '/cart/remove', [Mini\Controllers\CartController::class, 'remove']],

    // --- INSCRIPTION ---
    ['GET', '/register', [Mini\Controllers\AuthController::class, 'registerForm']],
    ['POST', '/register', [Mini\Controllers\AuthController::class, 'register']],

    // --- CONNEXION (Nouveau !) ---
    ['GET', '/login', [Mini\Controllers\AuthController::class, 'loginForm']], // Affiche le formulaire
    ['POST', '/login', [Mini\Controllers\AuthController::class, 'login']],    // Traite la connexion
    ['GET', '/logout', [Mini\Controllers\AuthController::class, 'logout']],   // Se déconnecter
];

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);