<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;
use Mini\Models\Order;

class CartController extends Controller
{
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

    public function remove(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = (int)($_POST['product_id'] ?? 0);

        if (isset($_SESSION['panier'][$id])) {
            unset($_SESSION['panier'][$id]);
        }

        header('Location: /cart');
        exit;
    }
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
                    'id' => $id,
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
    public function validate(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        if (empty($_SESSION['panier'])) {
            header('Location: /cart');
            exit;
        }

        $panier = $_SESSION['panier'];
        $total = 0;
        
        foreach ($panier as $id => $qty) {
            $product = Product::find($id);
            if ($product) {
                $total += $product['prix'] * $qty;
            }
        }

        $idClient = $_SESSION['user']['id'];
        
        $adresse = "Adresse par défaut (Domicile)"; 

        Order::create($idClient, $total, $adresse);

        unset($_SESSION['panier']);
        
        echo "<div style='font-family: sans-serif; text-align:center; margin-top:50px;'>";
        echo "<h1 style='color:green; font-size: 3em;'>✅ Merci pour votre achat !</h1>";
        echo "<p style='font-size: 1.5em;'>Votre commande d'un montant de <strong>$total €</strong> a été validée.</p>";
        echo "<br><a href='/' style='background:#007bff; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;'>Retourner à l'accueil</a>";
        echo "</div>";
    }
}