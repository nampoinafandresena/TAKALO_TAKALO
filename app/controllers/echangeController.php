<?php

namespace app\controllers;

use Flight;
use app\models\Echange;

class EchangeController
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db ?? Flight::db();
    }

    /**
     * Créer un nouvel échange
     */
    public function create()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            Flight::json(['success' => false, 'message' => 'Vous devez être connecté']);
            return;
        }

        $req = Flight::request();
        $id_obj_demande = isset($req->data->id_obj_demande) ? (int)$req->data->id_obj_demande : null;
        $id_obj_propose = isset($req->data->id_obj_propose) ? (int)$req->data->id_obj_propose : null;

        if (!$id_obj_demande || !$id_obj_propose) {
            Flight::json(['success' => false, 'message' => 'Données manquantes']);
            return;
        }

        try {
            $echange = new Echange($this->db);
            $echange->setIdObjDemande($id_obj_demande)
                    ->setIdObjPropose($id_obj_propose)
                    ->setStatut(0); // En attente

            if ($echange->create()) {
                Flight::json(['success' => true, 'message' => 'Proposition d\'échange envoyée avec succès']);
            } else {
                Flight::json(['success' => false, 'message' => 'Erreur lors de la création de l\'échange']);
            }
        } catch (Throwable $e) {
            Flight::json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    /**
     * Accepter un échange
     */
    public function accepter()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            Flight::json(['success' => false, 'message' => 'Vous devez être connecté']);
            return;
        }

        $req = Flight::request();
        $id_echange = isset($req->data->id) ? (int)$req->data->id : null;

        if (!$id_echange) {
            Flight::json(['success' => false, 'message' => 'ID d\'échange manquant']);
            return;
        }

        try {
            $echange = new Echange($this->db);
            $echange->read($id_echange);

            if (!$echange->getId()) {
                Flight::json(['success' => false, 'message' => 'Échange non trouvé']);
                return;
            }

            if ($echange->accepter()) {
                Flight::json(['success' => true, 'message' => 'Échange accepté']);
            } else {
                Flight::json(['success' => false, 'message' => 'Erreur lors de l\'acceptation']);
            }
        } catch (Throwable $e) {
            Flight::json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    /**
     * Refuser un échange
     */
    public function refuser()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            Flight::json(['success' => false, 'message' => 'Vous devez être connecté']);
            return;
        }

        $req = Flight::request();
        $id_echange = isset($req->data->id) ? (int)$req->data->id : null;

        if (!$id_echange) {
            Flight::json(['success' => false, 'message' => 'ID d\'échange manquant']);
            return;
        }

        try {
            $echange = new Echange($this->db);
            $echange->read($id_echange);

            if (!$echange->getId()) {
                Flight::json(['success' => false, 'message' => 'Échange non trouvé']);
                return;
            }

            if ($echange->refuser()) {
                Flight::json(['success' => true, 'message' => 'Échange refusé']);
            } else {
                Flight::json(['success' => false, 'message' => 'Erreur lors du refus']);
            }
        } catch (Throwable $e) {
            Flight::json(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    /**
     * Afficher les propositions en attente
     */
    public function propositions()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            Flight::redirect('/login');
            return;
        }

        Flight::render('modele', ['page' => 'propositions', 'title' => 'Propositions']);
    }
}

?>
