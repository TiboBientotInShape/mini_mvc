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
            die("Erreur : Tous les champs sont obligatoires.");
        }

        if (User::findByEmail($email)) {
            die("Erreur : Cet email est déjà utilisé !");
        }

        User::create($nom, $prenom, $adresse, $email, $password);
        
        header('Location: /login');
        exit;
    }

    public function loginForm(): void
    {
        $this->render('auth/login', ['title' => 'Connexion']);
    }

    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['mdp'])) {
            
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $_SESSION['user'] = [
                'id' => $user['id_client'],
                'prenom' => $user['prenom'],
                'email' => $user['email']
            ];

            header('Location: /');
            exit;
        }

        die("Mauvais email ou mot de passe ! <a href='/login'>Réessayer</a>");
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
}