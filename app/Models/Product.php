<?php
declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Product
{
    public static function getAll(): array
    {
        $db = Database::getPDO();
        $stmt = $db->query("SELECT * FROM produits"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $db = Database::getPDO();
        $stmt = $db->prepare("SELECT * FROM produits WHERE id_produit = :id");
        $stmt->execute(['id' => $id]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}