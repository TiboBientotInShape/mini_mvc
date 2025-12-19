<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

class ProductController extends Controller
{
    public function show(): void
    {
        // 1. On récupère l'id dans l'URL (ex: /product?id=12)
        // On force en (int) pour la sécurité
        $id = (int)($_GET['id'] ?? 0);

        // 2. On cherche le produit en BDD
        $product = Product::find($id);

        // 3. Si le produit n'existe pas, on redirige vers l'accueil
        if (!$product) {
            header('Location: /');
            exit;
        }

        // 4. On affiche la vue avec les données
        $this->render('products/show', [
            'product' => $product,
            'title' => $product['nom'] // On utilise 'nom' (ta BDD) pour le titre de la page
        ]);
    }
}