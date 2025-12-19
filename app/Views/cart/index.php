<h1>Mon Panier</h1>

<?php if (empty($panier)): ?>
    <p>Votre panier est vide.</p>
    <a href="/">Retour aux achats</a>
<?php else: ?>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">Produit</th>
                <th style="padding: 10px;">Prix</th>
                <th style="padding: 10px;">Quantité</th>
                <th style="padding: 10px;">Total</th>
                <th style="padding: 10px;">Action</th> </tr>
        </thead>
        <tbody>
            <?php foreach ($panier as $item): ?>
            <tr>
                <td style="padding: 10px;"><?= htmlspecialchars($item['nom']) ?></td>
                <td style="padding: 10px;"><?= $item['prix_unitaire'] ?> €</td>
                <td style="padding: 10px;"><?= $item['quantite'] ?></td>
                <td style="padding: 10px;"><?= $item['total_ligne'] ?> €</td>
                
                <td style="padding: 10px; text-align: center;">
                    <form action="/cart/remove" method="POST">
                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                        <button type="submit" style="color: red; font-weight: bold; cursor: pointer; border: 1px solid red; background: white; border-radius: 4px; padding: 2px 8px;">
                            X
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total à payer : <?= $total ?> €</h3>
    
    <div style="margin-top: 20px;">
        <a href="/" style="text-decoration: none; background: #eee; padding: 10px; border-radius: 5px; color: black;">
            &larr; Continuer mes achats
        </a>
    </div>
<?php endif; ?>