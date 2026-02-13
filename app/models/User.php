<?php

namespace app\models;

use PDO;

class User
{
    private $db;
    private $id;
    private $pseudo;
    private $email;
    private $pswd;
    private $role;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPswd()
    {
        return $this->pswd;
    }

    public function getRole()
    {
        return $this->role;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPswd($pswd)
    {
        $this->pswd = password_hash($pswd, PASSWORD_BCRYPT);
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer un nouvel utilisateur
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO takalo_users (pseudo, email, pswd, role) VALUES (:pseudo, :email, :pswd, :role)"
        );

        if ($query->execute([
            ':pseudo' => $this->pseudo,
            ':email' => $this->email,
            ':pswd' => $this->pswd,
            ':role' => $this->role ?? 'user'
        ])) {
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer un utilisateur par ID
     */
    public static function findById($db, $id){
        $query = $db->prepare("SELECT * FROM takalo_users WHERE id = :id");
        $query->execute([':id' => $id]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        
        if ($data) {
            $user->pseudo = $data['pseudo'];
            $user->email = $data['email'];
            $user->pswd = $data['pswd'];
            $user->role = $data['role'];
            return $user;
        }
        return null;
    }

    /**
     * Récupérer un utilisateur par pseudo
     */
    public function readByPseudo($pseudo)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_users WHERE pseudo = :pseudo");
        $query->execute([':pseudo' => $pseudo]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->pseudo = $data['pseudo'];
            $this->email = $data['email'];
            $this->pswd = $data['pswd'];
            $this->role = $data['role'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer un utilisateur par email
     */
    public function readByEmail($email)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_users WHERE email = :email");
        $query->execute([':email' => $email]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->pseudo = $data['pseudo'];
            $this->email = $data['email'];
            $this->pswd = $data['pswd'];
            $this->role = $data['role'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer tous les utilisateurs
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM takalo_users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE takalo_users SET pseudo = :pseudo, email = :email, pswd = :pswd, role = :role WHERE id = :id"
        );

        return $query->execute([
            ':id' => $this->id,
            ':pseudo' => $this->pseudo,
            ':email' => $this->email,
            ':pswd' => $this->pswd,
            ':role' => $this->role
        ]);
    }

    /**
     * Supprimer un utilisateur
     */
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM takalo_users WHERE id = :id");
        return $query->execute([':id' => $id]);
    }

    /**
     * Vérifier le mot de passe
     */
    public function verifyPassword($password)
    {
        return password_verify($password, $this->pswd);
    }

    
}
