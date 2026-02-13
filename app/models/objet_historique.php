<?php

namespace app\models;

class ObjetHistorique
{
    private $db;
    private $id;
    private $id_obj;
    private $id_owner;
    private $date_own;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getIdObj()
    {
        return $this->id_obj;
    }

    public function getIdOwner()
    {
        return $this->id_owner;
    }

    public function getDateOwn()
    {
        return $this->date_own;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setIdObj($id_obj)
    {
        $this->id_obj = $id_obj;
        return $this;
    }

    public function setIdOwner($id_owner)
    {
        $this->id_owner = $id_owner;
        return $this;
    }

    public function setDateOwn($date_own)
    {
        $this->date_own = $date_own;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer une entrée d'historique
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO takalo_objet_historique (id_obj, id_owner) VALUES (:id_obj, :id_owner)"
        );

        if ($query->execute([
            ':id_obj' => $this->id_obj,
            ':id_owner' => $this->id_owner
        ])) {
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer une entrée d'historique par ID
     */
    public function read($id)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet_historique WHERE id = :id");
        $query->execute([':id' => $id]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->id_obj = $data['id_obj'];
            $this->id_owner = $data['id_owner'];
            $this->date_own = $data['date_own'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer toutes les entrées d'historique
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet_historique ORDER BY date_own DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer l'historique d'un objet
     */
    public function readByObjet($id_obj)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet_historique WHERE id_obj = :id_obj ORDER BY date_own DESC");
        $query->execute([':id_obj' => $id_obj]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer l'historique d'un propriétaire
     */
    public function readByOwner($id_owner)
    {
        $query = $this->db->prepare("SELECT * FROM takalo_objet_historique WHERE id_owner = :id_owner ORDER BY date_own DESC");
        $query->execute([':id_owner' => $id_owner]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour une entrée d'historique
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE takalo_objet_historique SET id_obj = :id_obj, id_owner = :id_owner, date_own = :date_own WHERE id = :id"
        );

        return $query->execute([
            ':id' => $this->id,
            ':id_obj' => $this->id_obj,
            ':id_owner' => $this->id_owner,
            ':date_own' => $this->date_own
        ]);
    }

    /**
     * Supprimer une entrée d'historique
     */
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM takalo_objet_historique WHERE id = :id");
        return $query->execute([':id' => $id]);
    }
}
