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
select o.id, o.nom_obj, o.description, o.date_publication, o.prix_estimatif, cat.nom_cat, u.id as id_owner, u.pseudo, i.src
from takalo_objet o 
join takalo_photos_objets i on o.id = i.id_obj and i.id_photo = (select min(id_photo) from takalo_photos_objets where id_obj = o.id)
join takalo_users u on o.id_proprietaire = u.id
join takalo_categories cat on o.id_cat = cat.id_cat;

insert into takalo_objet (nom_obj, id_cat, description, id_proprietaire, prix_estimatif) values 
('Vélo de montagne', 1, 'Un vélo robuste pour les terrains accidentés.', 4, 150.00),
('Guitare acoustique', 2, 'Une guitare en bois avec un son chaleureux.', 5, 200.00),
('Table de ping-pong', 3, 'Parfaite pour les parties endiablées entre amis.', 5, 300.00);

insert into takalo_photos_objets (src, id_obj) values 
('velo.jpg', 6),
('guitare.jpg', 7),
('pingpong.jpg', 8);
