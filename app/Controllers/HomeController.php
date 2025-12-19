<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product; // <--- AJOUT IMPORTANT : On importe le modèle Product

final class HomeController extends Controller
{
    public function index(): void
    {
        // 1. On récupère les produits depuis la BDD (comme tu l'as fait pour User)
        $products = Product::getAll();

        // 2. On les envoie à la vue 'home/index'
        $this->render('home/index', params: [
            'title' => 'Accueil E-Commerce',
            'products' => $products // <--- C'est ça qui manquait !
        ]);
    }

    public function users(): void
    {
        $this->render('home/users', params: [
            'users' => User::getAll(),
        ]);
    }
}