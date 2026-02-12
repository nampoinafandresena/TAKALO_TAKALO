<?php

namespace app\models;

class Echange
{
    private $db;
    private $id;
    private $id_obj_demande;
    private $id_obj_propose;
    private $date_demande;
    private $date_acceptation;
    private $statut;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getIdObjDemande()
    {
        return $this->id_obj_demande;
    }

    public function getIdObjPropose()
    {
        return $this->id_obj_propose;
    }

    public function getDateDemande()
    {
        return $this->date_demande;
    }

    public function getDateAcceptation()
    {
        return $this->date_acceptation;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setIdObjDemande($id_obj_demande)
    {
        $this->id_obj_demande = $id_obj_demande;
        return $this;
    }

    public function setIdObjPropose($id_obj_propose)
    {
        $this->id_obj_propose = $id_obj_propose;
        return $this;
    }

    public function setDateDemande($date_demande)
    {
        $this->date_demande = $date_demande;
        return $this;
    }

    public function setDateAcceptation($date_acceptation)
    {
        $this->date_acceptation = $date_acceptation;
        return $this;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer un nouvel échange
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO echange (id_obj_demande, id_obj_propose) 
             VALUES (:id_obj_demande, :id_obj_propose)"
        );

        if ($query->execute([
            ':id_obj_demande' => $this->id_obj_demande,
            ':id_obj_propose' => $this->id_obj_propose
        ])) {
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer un échange par ID
     */
    public function read($id)
    {
        $query = $this->db->prepare("SELECT * FROM echange WHERE id = :id");
        $query->execute([':id' => $id]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id = $data['id'];
            $this->id_obj_demande = $data['id_obj_demande'];
            $this->id_obj_propose = $data['id_obj_propose'];
            $this->date_demande = $data['date_demande'];
            $this->date_acceptation = $data['date_acceptation'];
            $this->statut = $data['statut'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer tous les échanges
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM echange ORDER BY date_demande DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les échanges en attente
     */
    public function readByStatut($statut)
    {
        $query = $this->db->prepare("SELECT * FROM echange WHERE statut = :statut ORDER BY date_demande DESC");
        $query->execute([':statut' => $statut]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les échanges d'un objet demandé
     */
    public function readByObjDemande($id_obj_demande)
    {
        $query = $this->db->prepare("SELECT * FROM echange WHERE id_obj_demande = :id_obj_demande ORDER BY date_demande DESC");
        $query->execute([':id_obj_demande' => $id_obj_demande]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les échanges d'un objet proposé
     */
    public function readByObjPropose($id_obj_propose)
    {
        $query = $this->db->prepare("SELECT * FROM echange WHERE id_obj_propose = :id_obj_propose ORDER BY date_demande DESC");
        $query->execute([':id_obj_propose' => $id_obj_propose]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour un échange
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE echange SET id_obj_demande = :id_obj_demande, id_obj_propose = :id_obj_propose, 
             date_acceptation = :date_acceptation, statut = :statut WHERE id = :id"
        );

        return $query->execute([
            ':id' => $this->id,
            ':id_obj_demande' => $this->id_obj_demande,
            ':id_obj_propose' => $this->id_obj_propose,
            ':date_acceptation' => $this->date_acceptation,
            ':statut' => $this->statut
        ]);
    }

    /**
     * Accepter un échange
     */
    public function accepter()
    {
        $this->statut = 1;
        $this->date_acceptation = date('Y-m-d H:i:s');
        return $this->update();
    }

    /**
     * Refuser un échange
     */
    public function refuser()
    {
        $this->statut = 2;
        return $this->update();
    }

    /**
     * Supprimer un échange
     */
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM echange WHERE id = :id");
        return $query->execute([':id' => $id]);
    }
}
