<?php

namespace app\models;

class Objet
{
    private $db;
    private $id;
    private $nom_obj;
    private $id_cat;
    private $description;
    private $id_proprietaire;
    private $prix_estimatif;
    private $date_publication;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNomObj()
    {
        return $this->nom_obj;
    }

    public function getIdCat()
    {
        return $this->id_cat;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdProprietaire()
    {
        return $this->id_proprietaire;
    }

    public function getPrixEstimatif()
    {
        return $this->prix_estimatif;
    }

    public function getDatePublication()
    {
        return $this->date_publication;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNomObj($nom_obj)
    {
        $this->nom_obj = $nom_obj;
        return $this;
    }

    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setIdProprietaire($id_proprietaire)
    {
        $this->id_proprietaire = $id_proprietaire;
        return $this;
    }

    public function setPrixEstimatif($prix_estimatif)
    {
        $this->prix_estimatif = $prix_estimatif;
        return $this;
    }

    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer un nouvel objet
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO takalo_objet (nom_obj, id_cat, description, id_proprietaire, prix_estimatif) 
             VALUES (:nom_obj, :id_cat, :description, :id_proprietaire, :prix_estimatif)"
        );

        if ($query->execute([
            ':nom_obj' => $this->nom_obj,
            ':id_cat' => $this->id_cat,
            ':description' => $this->description,
            ':id_proprietaire' => $this->id_proprietaire,
            ':prix_estimatif' => $this->prix_estimatif
        ])) {
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer un objet par ID
     */
    public function read($id)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet WHERE id = :id");
        $query->execute([':id' => $id]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->nom_obj = $data['nom_obj'];
            $this->id_cat = $data['id_cat'];
            $this->description = $data['description'];
            $this->id_proprietaire = $data['id_proprietaire'];
            $this->prix_estimatif = $data['prix_estimatif'];
            $this->date_publication = $data['date_publication'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer tous les objets
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet ORDER BY date_publication DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAll_v()
    {
        $query = $this->db->prepare("SELECT * FROM v_objets_images ORDER BY date_publication DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les objets d'un propriétaire
     */
    public function readByProprietaire($id_proprietaire)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet WHERE id_proprietaire = :id_proprietaire ORDER BY date_publication DESC");
        $query->execute([':id_proprietaire' => $id_proprietaire]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les objets d'une catégorie
     */
    public function readByCategorie($id_cat)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet WHERE id_cat = :id_cat ORDER BY date_publication DESC");
        $query->execute([':id_cat' => $id_cat]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour un objet
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE takalo_objet SET nom_obj = :nom_obj, id_cat = :id_cat, description = :description, 
             id_proprietaire = :id_proprietaire, prix_estimatif = :prix_estimatif WHERE id = :id"
        );

        return $query->execute([
            ':id' => $this->id,
            ':nom_obj' => $this->nom_obj,
            ':id_cat' => $this->id_cat,
            ':description' => $this->description,
            ':id_proprietaire' => $this->id_proprietaire,
            ':prix_estimatif' => $this->prix_estimatif
        ]);
    }

    /**
     * Supprimer un objet
     */
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM takalo_objet WHERE id = :id");
        return $query->execute([':id' => $id]);
    }
}
