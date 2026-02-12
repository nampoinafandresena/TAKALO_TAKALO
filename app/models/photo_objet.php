<?php

namespace app\models;

class PhotoObjet
{
    private $db;
    private $id_photo;
    private $src;
    private $id_obj;

    public function __construct($db = null)
    {
        $this->db = $db;
    }

    // Getters
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    public function getSrc()
    {
        return $this->src;
    }

    public function getIdObj()
    {
        return $this->id_obj;
    }

    // Setters
    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
        return $this;
    }

    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }

    public function setIdObj($id_obj)
    {
        $this->id_obj = $id_obj;
        return $this;
    }

    // CRUD Methods

    /**
     * Créer une nouvelle photo
     */
    public function create()
    {
        $query = $this->db->prepare(
            "INSERT INTO photos_objets (src, id_obj) VALUES (:src, :id_obj)"
        );

        if ($query->execute([
            ':src' => $this->src,
            ':id_obj' => $this->id_obj
        ])) {
            $this->id_photo = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Récupérer une photo par ID
     */
    public function read($id_photo)
    {
        $query = $this->db->prepare("SELECT * FROM photos_objets WHERE id_photo = :id_photo");
        $query->execute([':id_photo' => $id_photo]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->id_photo = $data['id_photo'];
            $this->src = $data['src'];
            $this->id_obj = $data['id_obj'];
            return $this;
        }
        return null;
    }

    /**
     * Récupérer toutes les photos
     */
    public function readAll()
    {
        $query = $this->db->prepare("SELECT * FROM photos_objets");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer les photos d'un objet
     */
    public function readByObjet($id_obj)
    {
        $query = $this->db->prepare("SELECT * FROM photos_objets WHERE id_obj = :id_obj");
        $query->execute([':id_obj' => $id_obj]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mettre à jour une photo
     */
    public function update()
    {
        $query = $this->db->prepare(
            "UPDATE photos_objets SET src = :src, id_obj = :id_obj WHERE id_photo = :id_photo"
        );

        return $query->execute([
            ':id_photo' => $this->id_photo,
            ':src' => $this->src,
            ':id_obj' => $this->id_obj
        ]);
    }

    /**
     * Supprimer une photo
     */
    public function delete($id_photo)
    {
        $query = $this->db->prepare("DELETE FROM photos_objets WHERE id_photo = :id_photo");
        return $query->execute([':id_photo' => $id_photo]);
    }
}
