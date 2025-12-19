<h1><?= $title ?></h1>

<p>Bienvenue sur notre boutique E-Commerce.</p>

<div class="container-produits">
    <?php if (empty($products)): ?>
        <p>Aucun produit n'est disponible pour le moment.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div class="card" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                
                <h2><?= htmlspecialchars($product['nom']) ?></h2>
                
                <p>Prix : <strong><?= htmlspecialchars($product['prix']) ?> €</strong></p>
                
                <a href="/product?id=<?= $product['id_produit'] ?>">Voir le détail</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>