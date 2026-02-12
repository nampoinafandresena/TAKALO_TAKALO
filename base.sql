-- Création de la base de données
CREATE DATABASE IF NOT EXISTS takalo;
USE takalo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    pswd VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user' -- Valeurs : 'user', 'admin'
);

-- 3. Table des catégories
CREATE TABLE categories (
    id_cat INT AUTO_INCREMENT PRIMARY KEY,
    nom_cat VARCHAR(50) NOT NULL
);

-- 4. Table des objets
CREATE TABLE objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_obj VARCHAR(100) NOT NULL,
    id_cat INT,
    description TEXT,
    id_proprietaire INT,
    prix_estimatif DECIMAL(10, 2),
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cat) REFERENCES categories(id_cat) ON DELETE SET NULL,
    FOREIGN KEY (id_proprietaire) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE objet_historique (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obj INT NOT NULL,
    id_owner INT NOT NULL,
    date_own DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_obj) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_owner) REFERENCES users(id) ON DELETE CASCADE
);

-- 5. Table des photos (plusieurs photos par objet)
CREATE TABLE photos_objets (
    id_photo INT AUTO_INCREMENT PRIMARY KEY,
    src VARCHAR(255) NOT NULL,
    id_obj INT,
    FOREIGN KEY (id_obj) REFERENCES objet(id) ON DELETE CASCADE
);

-- 6. Table des échanges
CREATE TABLE echange (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obj_demande INT NOT NULL, -- L'objet convoité
    id_obj_propose INT NOT NULL, -- L'objet offert en échange
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_acceptation DATETIME NULL,
    statut INT DEFAULT 0, -- 0: En attente, 1: Accepté, 2: Refusé
    FOREIGN KEY (id_obj_demande) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_obj_propose) REFERENCES objet(id) ON DELETE CASCADE
);

-- Insertion de quelques catégories
INSERT INTO categories (nom_cat) VALUES ('Vêtements'), ('Livres'), ('DVD/Jeux Vidéo'), ('Électronique');
