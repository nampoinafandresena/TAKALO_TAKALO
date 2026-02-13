-- Voir tous les objets avec leur propriétaire
SELECT o.nom_obj, u.pseudo
FROM takalo_objet o
JOIN takalo_users u ON o.id_proprietaire = u.id;

-- Historique d’un objet
SELECT * FROM takalo_objet_historique WHERE id_obj = 1;

-- Échanges en attente
SELECT * FROM takalo_echange WHERE statut = 0;

-- 2026/02/13 10H View pour lister les objets avec le nom du propriétaire et la première image
CREATE OR REPLACE VIEW v_objets_images AS 
select o.id, o.nom_obj, o.description, o.date_publication, cat.nom_cat,u.id as id_owner, u.pseudo, i.src
from takalo_objet o 
join takalo_photos_objets i on o.id = i.id_obj and i.id_photo = (select min(id_photo) from takalo_photos_objets where id_obj = o.id)
join takalo_users u on o.id_proprietaire = u.id
join takalo_categories cat on o.id_cat = cat.id_cat;