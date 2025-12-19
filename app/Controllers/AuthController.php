<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire d'inscription
     * Route: GET /register
     */
    public function registerForm(): void
    {
        $this->render('auth/register', ['title' => 'Inscription Client']);
    }

    /**
     * Traite les données envoyées par le formulaire
     * Route: POST /register
     */
    public function register(): void
    {
        // 1. On récupère les données du formulaire
        // On utilise trim() pour enlever les espaces inutiles avant/après
        $nom      = trim($_POST['nom'] ?? '');
        $prenom   = trim($_POST['prenom'] ?? '');
        $adresse  = trim($_POST['adresse'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // 2. Vérification : Est-ce que tout est rempli ?
        if (empty($nom) || empty($prenom) || empty($adresse) || empty($email) || empty($password)) {
            // Si un champ est vide, on arrête tout (idéalement, on réafficherait le formulaire avec une erreur)
            die("Erreur : Tous les champs sont obligatoires (Nom, Prénom, Adresse, Email, Mot de passe).");
        }

        // 3. Vérification : Est-ce que cet email existe déjà ?
        if (User::findByEmail($email)) {
            die("Erreur : Un compte existe déjà avec cet email !");
        }

        // 4. Tout est bon ? On crée le client en base de données via le Modèle
        User::create($nom, $prenom, $adresse, $email, $password);

        // 5. Succès ! On redirige vers la page de connexion
        // (Comme tu n'as pas encore la page /login, ça fera une erreur 404 pour l'instant, c'est normal !)
        header('Location: /login');
        exit;
    }
}