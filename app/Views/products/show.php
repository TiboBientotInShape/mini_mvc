<div class="product-detail">
    <a href="/" style="display:inline-block; margin-bottom: 20px;">&larr; Retour aux produits</a>

    <div class="card" style="border: 1px solid #ddd; padding: 20px;">
        <h1><?= htmlspecialchars($product['nom']) ?></h1>
        
        <?php if (!empty($product['image'])): ?>
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>" style="max-width: 300px;">
        <?php endif; ?>

        <p><?= nl2br(htmlspecialchars($product['description'] ?? 'Aucune description')) ?></p>
        
        <h3 style="color: green;"><?= htmlspecialchars($product['prix']) ?> €</h3>
        
        <?php if ($product['stock'] > 0): ?>
            <p style="color: green;">En stock (<?= $product['stock'] ?> restants)</p>
            
            <form action="/cart/add" method="POST">
                
                <input type="hidden" name="product_id" value="<?= $product['id_produit'] ?>">
                
                <label>Quantité : </label>
                <input type="number" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>" style="width: 50px; margin-right: 10px;">

                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">
                    Ajouter au panier
                </button>
            </form>

        <?php else: ?>
            <p style="color: red;">Rupture de stock</p>
        <?php endif; ?>
    </div>
</div>