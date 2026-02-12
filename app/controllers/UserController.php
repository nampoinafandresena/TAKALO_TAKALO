<?php

namespace app\controllers;

use Flight;
use app\models\User;

class UserController
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db ?? Flight::db();
    }

    /**
     * Afficher le formulaire d'enregistrement
     */
    public function showRegister()
    {
        // Récupérer le rôle depuis les query parameters
        $role = Flight::request()->query->role ?? 'user';
        
        // Valider le rôle
        if (!in_array($role, ['user', 'admin'])) {
            $role = 'user';
        }
        
        Flight::render('register', [
            'values' => ['pseudo' => '', 'email' => ''],
            'errors' => ['pseudo' => '', 'email' => '', 'password' => '', 'confirm_password' => ''],
            'role' => $role,
            'success' => false
        ]);
    }

    /**
     * Traiter l'enregistrement d'un nouvel utilisateur
     */
    public function register()
    {
        // S'assurer qu'une session est initiée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $req = Flight::request();

        $pseudo = trim($req->data->pseudo ?? '');
        $email = trim($req->data->email ?? '');
        $password = $req->data->password ?? '';
        $confirm_password = $req->data->confirm_password ?? '';
        $role = trim($req->data->role ?? 'user');
        
        // Valider le rôle
        if (!in_array($role, ['user', 'admin'])) {
            $role = 'user';
        }

        $errors = [];
        $values = ['pseudo' => $pseudo, 'email' => $email];

        // Validation
        if (empty($pseudo)) {
            $errors['pseudo'] = 'Le pseudo est requis';
        } elseif (strlen($pseudo) < 3) {
            $errors['pseudo'] = 'Le pseudo doit contenir au moins 3 caractères';
        }

        if (empty($email)) {
            $errors['email'] = 'L\'email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide';
        } else {
            // Vérifier que l'email n'existe pas déjà
            $user = new User($this->db);
            if ($user->readByEmail($email) !== null) {
                $errors['email'] = 'Cet email existe déjà';
            }
        }

        if (empty($password)) {
            $errors['password'] = 'Le mot de passe est requis';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 6 caractères';
        }

        if (empty($confirm_password)) {
            $errors['confirm_password'] = 'Veuillez confirmer votre mot de passe';
        } elseif ($password !== $confirm_password) {
            $errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
        }

        // Si pas d'erreurs, créer l'utilisateur
        if (empty($errors)) {
            try {
                $user = new User($this->db);
                $user->setPseudo($pseudo)
                    ->setEmail($email)
                    ->setPswd($password)
                    ->setRole($role);

                if ($user->create()) {
                    // Redirection vers la page de login avec un message de succès
                    $_SESSION['success_message'] = 'Inscription réussie! Vous pouvez maintenant vous connecter.';
                    Flight::redirect('/login?role=' . $role);
                    return;
                } else {
                    $errors['_global'] = 'Erreur lors de la création du compte.';
                }
            } catch (Throwable $e) {
                $errors['_global'] = 'Erreur serveur: ' . $e->getMessage();
            }
        }

        // Afficher le formulaire avec les erreurs
        Flight::render('register', [
            'values' => $values,
            'errors' => $errors,
            'role' => $role,
            'success' => false
        ]);
    }

    /**
     * Afficher le formulaire de connexion
     */
    public function showLogin()
    {
        // Récupérer le rôle depuis les query parameters
        $role = Flight::request()->query->role ?? 'user';
        
        // Valider le rôle
        if (!in_array($role, ['user', 'admin'])) {
            $role = 'user';
        }
        
        $success_message = $_SESSION['success_message'] ?? null;
        if ($success_message) {
            unset($_SESSION['success_message']);
        }
        
        Flight::render('login', [
            'values' => ['email' => ''],
            'errors' => ['email' => '', 'password' => ''],
            'role' => $role,
            'success_message' => $success_message
        ]);
    }

    /**
     * Traiter la connexion d'un utilisateur
     */
    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $req = Flight::request();

        $email = trim($req->data->email ?? '');
        $password = $req->data->password ?? '';
        $role = trim($req->data->role ?? 'user');
        
        // Valider le rôle
        if (!in_array($role, ['user', 'admin'])) {
            $role = 'user';
        }

        $errors = [];
        $values = ['email' => $email];

        // Validation
        if (empty($email)) {
            $errors['email'] = 'L\'email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide';
        }

        if (empty($password)) {
            $errors['password'] = 'Le mot de passe est requis';
        }

        // Si pas d'erreurs, vérifier les identifiants
        if (empty($errors)) {
            try {
                $user = new User($this->db);
                if ($user->readByEmail($email) !== null) {
                    // Vérifier le mot de passe
                    if ($user->verifyPassword($password)) {
                        // Vérifier que le rôle correspond
                        if ($user->getRole() === $role) {
                            // Connexion réussie
                            $_SESSION['user_id'] = $user->getId();
                            $_SESSION['pseudo'] = $user->getPseudo();
                            $_SESSION['email'] = $user->getEmail();
                            $_SESSION['role'] = $user->getRole();

                            // Redirection selon le rôle
                            if ($role === 'admin') {
                                Flight::redirect('/admin/dashboard');
                            } else {
                                Flight::redirect('/home');
                            }
                            return;
                        } else {
                            $errors['_global'] = 'Ce compte n\'a pas accès à cet espace.';
                        }
                    } else {
                        $errors['_global'] = 'Email ou mot de passe incorrect.';
                    }
                } else {
                    $errors['_global'] = 'Email ou mot de passe incorrect.';
                }
            } catch (Throwable $e) {
                $errors['_global'] = 'Erreur serveur: ' . $e->getMessage();
            }
        }

        // Afficher le formulaire avec les erreurs
        Flight::render('login', [
            'values' => $values,
            'errors' => $errors,
            'role' => $role,
            'success_message' => null
        ]);
    }
}

?>