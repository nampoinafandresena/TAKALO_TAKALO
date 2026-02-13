<?php

namespace app\controllers;

use Flight;
use app\models\User;
use app\models\categorie;
use app\models\objet;

class AdminController {
    private $db;

    public function __construct($db = null) {
        $this->db = $db ?? Flight::db();
    }

    // Fonctionnalites du dashboard
    public function countUsers(){
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM takalo_users WHERE role = 'user'");
        $result = $stmt->fetch();
        return $result['count'] ?? 0;
    }

    public function countEchangesFinis(){
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM takalo_echange WHERE statut = 1");
        $result = $stmt->fetch();
        return $result['count'] ?? 0;
    }

    public function countObjets(){
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM takalo_objet");
        $result = $stmt->fetch();
        return $result['count'] ?? 0;
    }

    // Fonctionnalites dans la gestion des categories
    public function getAllCategories(){
        $categorie_model = new categorie($this->db);
        $categories = $categorie_model->readAll();
        return $categories;
    }

    public function getNombreObjetsParCategorie(){
        $stmt = $this->db->query("SELECT id_cat, COUNT(*) as count FROM takalo_objet GROUP BY id_cat");
        $result = $stmt->fetchAll();
        $nombre_objets_cat = [];
        foreach ($result as $row) {
            $nombre_objets_cat[$row['id_cat']] = $row['count'];
        }
        return $nombre_objets_cat;
    }

    public function createCategorie(){
        // $desc = Flight::request()->data->description;
        $nom_cat = Flight::request()->data->nom_cat;
        if ($nom_cat) {
            $categorie_model = new categorie(Flight::db());
            $categorie_model->create_new_cat($nom_cat);
            header('Location: /admin/categories');
            exit();
        } else {
            // Gérer le cas où le nom de la catégorie n'est pas fourni
            header('Location: /admin/categories?error=missing_name');
            exit();
        }
    }
}

?>