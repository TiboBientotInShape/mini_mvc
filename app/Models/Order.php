<?php
declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;

class Order
{
    // Enregistre une commande
    public static function create(int $idClient, float $total, string $adresse): bool
    {
        $db = Database::getPDO();
        
        // On insère : ID Client, Total, Adresse, et Statut par défaut "Validée"
        $stmt = $db->prepare("INSERT INTO commandes (id_client, montant_total, adresse_livraison, statut, date_commande) VALUES (?, ?, ?, 'Validée', NOW())");
        
        return $stmt->execute([$idClient, $total, $adresse]);
    }
}