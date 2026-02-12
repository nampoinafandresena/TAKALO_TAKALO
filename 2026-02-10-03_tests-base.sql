-- Voir tous les objets avec leur propriétaire
SELECT o.nom_obj, u.pseudo
FROM takalo_objet o
JOIN takalo_users u ON o.id_proprietaire = u.id;

-- Historique d’un objet
SELECT * FROM takalo_objet_historique WHERE id_obj = 1;

-- Échanges en attente
SELECT * FROM takalo_echange WHERE statut = 0;
