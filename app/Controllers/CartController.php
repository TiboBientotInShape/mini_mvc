<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

class CartController extends Controller
{
    // Ajouter au panier
    public function add(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        $id = (int)($_POST['product_id'] ?? 0);
        $qty = (int)($_POST['quantity'] ?? 1);

        if ($id > 0) {
            if (!isset($_SESSION['panier'])) $_SESSION['panier'] = [];
            
            if (isset($_SESSION['panier'][$id])) {
                $_SESSION['panier'][$id] += $qty;
            } else {
                $_SESSION['panier'][$id] = $qty;
            }
        }
        header('Location: /cart');
        exit;
    }

    // NOUVEAU : Supprimer du panier
    public function remove(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = (int)($_POST['product_id'] ?? 0);

        // Si l'article est dans le panier, on le supprime (unset)
        if (isset($_SESSION['panier'][$id])) {
            unset($_SESSION['panier'][$id]);
        }

        header('Location: /cart');
        exit;
    }

    // Afficher le panier
    public function index(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $panier = $_SESSION['panier'] ?? [];
        $fullCart = [];
        $total = 0;

        foreach ($panier as $id => $qty) {
            $product = Product::find($id);
            if ($product) {
                $prix = $product['prix'] * $qty;
                $fullCart[] = [
                    'id' => $id, // <--- IMPORTANT : On passe l'ID pour le bouton supprimer
                    'nom' => $product['nom'],
                    'prix_unitaire' => $product['prix'],
                    'quantite' => $qty,
                    'total_ligne' => $prix
                ];
                $total += $prix;
            }
        }

        $this->render('cart/index', [
            'panier' => $fullCart,
            'total' => $total
        ]);
    }
}