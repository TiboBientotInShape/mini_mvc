<?php
declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class User
{
    // Créer un nouveau client
    public static function create(string $nom, string $prenom, string $adresse, string $email, string $password): bool
    {
        $db = Database::getPDO();
        
        // Sécurité : On hache le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // On insère dans la table 'clients'
        // Attention : la colonne s'appelle 'mdp' dans ta base
        $stmt = $db->prepare("INSERT INTO clients (nom, prenom, adresse, email, mdp) VALUES (?, ?, ?, ?, ?)");
        
        return $stmt->execute([$nom, $prenom, $adresse, $email, $hashedPassword]);
    }

    // Retrouver un client par email (pour la connexion ou vérifier doublon)
    public static function findByEmail(string $email): ?array
    {
        $db = Database::getPDO();
        $stmt = $db->prepare("SELECT * FROM clients WHERE email = ?");
        $stmt->execute([$email]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}