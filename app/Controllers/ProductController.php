<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

class ProductController extends Controller
{
    public function show(): void
    {
        $id = (int)($_GET['id'] ?? 0);

        $product = Product::find($id);

        if (!$product) {
            header('Location: /');
            exit;
        }

        $this->render('products/show', [
            'product' => $product,
            'title' => $product['nom']
        ]);
    }
}