<?php

namespace app\models;

class Categorie
{
    private $db;
    private $id_cat;
    private $nom_cat;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getIdCat()
    {
        return $this->id_cat;
    }

    public function getNomCat()
    {
        return $this->nom_cat;
    }

    // Setters
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
        return $this;
    }

    public function setNomCat($nom_cat)
    {
        $this->nom_cat = $nom_cat;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer une nouvelle catégorie
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO categories (nom_cat) VALUES (:nom_cat)"
        );

        if ($query->execute([':nom_cat' => $this->nom_cat])) {
            $this->id_cat = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer une catégorie par ID
     */
    public function read($id_cat)
    {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id_cat = :id_cat");
        $query->execute([':id_cat' => $id_cat]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id_cat = $data['id_cat'];
            $this->nom_cat = $data['nom_cat'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer toutes les catégories
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour une catégorie
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE categories SET nom_cat = :nom_cat WHERE id_cat = :id_cat"
        );

        return $query->execute([
            ':id_cat' => $this->id_cat,
            ':nom_cat' => $this->nom_cat
        ]);
    }

    /**
     * Supprimer une catégorie
     */
    public function delete($id_cat)
    {
        $query = $this->db->prepare("DELETE FROM categories WHERE id_cat = :id_cat");
        return $query->execute([':id_cat' => $id_cat]);
    }
}
