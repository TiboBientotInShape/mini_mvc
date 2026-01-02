<?php
declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

class AuthController extends Controller
{
    public function registerForm(): void
    {
        $this->render('auth/register', ['title' => 'Inscription Client']);
    }

    public function register(): void
    {
        $nom      = trim($_POST['nom'] ?? '');
        $prenom   = trim($_POST['prenom'] ?? '');
        $adresse  = trim($_POST['adresse'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($nom) || empty($prenom) || empty($adresse) || empty($email) || empty($password)) {
            die("Erreur : Tous les champs sont obligatoires (Nom, Prénom, Adresse, Email, Mot de passe).");
        }

        if (User::findByEmail($email)) {
            die("Erreur : Un compte existe déjà avec cet email !");
        }
        User::create($nom, $prenom, $adresse, $email, $password);
        header('Location: /login');
        exit;
    }
}