<?php
declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Product
{
    // Récupère tous les produits
    public static function getAll(): array
    {
        $db = Database::getPDO();
        // CORRECTION : Table "produits"
        $stmt = $db->query("SELECT * FROM produits"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère un produit par ID
    public static function find(int $id): ?array
    {
        $db = Database::getPDO();
        // CORRECTION : Table "produits" ET colonne "id_produit"
        $stmt = $db->prepare("SELECT * FROM produits WHERE id_produit = :id");
        $stmt->execute(['id' => $id]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}