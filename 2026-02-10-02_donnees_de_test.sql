-- users
INSERT INTO takalo_users (pseudo, email, pswd, role) VALUES
('alice', 'alice@mail.com', 'hash_pwd_alice', 'user'),
('bob', 'bob@mail.com', 'hash_pwd_bob', 'user'),
('charlie', 'charlie@mail.com', 'hash_pwd_charlie', 'user'),
('admin', 'admin@takalo.com', 'hash_pwd_admin', 'admin');

-- categorie
INSERT INTO takalo_categories (nom_cat) VALUES
('Électronique'),
('Vêtements'),
('Livres'),
('Maison'),
('Sports');

-- objet
INSERT INTO takalo_objet (nom_obj, id_cat, description, id_proprietaire, prix_estimatif) VALUES
('Téléphone Samsung A51', 1, 'Bon état, écran intact', 1, 750000),
('Veste en cuir', 2, 'Taille M, très peu portée', 2, 250000),
('Roman Harry Potter', 3, 'Tome 1 en français', 3, 80000),
('Mixeur électrique', 4, 'Fonctionne parfaitement', 1, 180000),
('Chaussures de sport Nike', 5, 'Pointure 42', 2, 300000);

-- historique
INSERT INTO takalo_objet_historique (id_obj, id_owner) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 2);

-- photos
INSERT INTO takalo_photos_objets (src, id_obj) VALUES
('samsung_a51_1.jpg', 1),
('samsung_a51_2.jpg', 1),
('veste_cuir.jpg', 2),
('harry_potter.jpg', 3),
('mixeur.jpg', 4),
('nike_chaussures.jpg', 5);

-- exemple echange
INSERT INTO takalo_echange (id_obj_demande, id_obj_propose) VALUES
(1, 2); -- Bob propose sa veste contre le téléphone d’Alice
INSERT INTO takalo_echange (id_obj_demande, id_obj_propose, date_acceptation, statut) VALUES
(3, 5, NOW(), 1); -- Charlie échange son livre contre les chaussures
