<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product;

final class HomeController extends Controller
{
    public function index(): void
    {
        $products = Product::getAll();

        $this->render('home/index', params: [
            'title' => 'Accueil E-Commerce',
            'products' => $products
        ]);
    }

    public function users(): void
    {
        $this->render('home/users', params: [
            'users' => User::getAll(),
        ]);
    }
}