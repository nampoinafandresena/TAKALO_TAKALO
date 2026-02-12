-- Création de la base de données
CREATE DATABASE IF NOT EXISTS takalo;
USE takalo;

-- 1. Table des utilisateurs
CREATE TABLE takalo_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    pswd VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user' -- Valeurs : 'user', 'admin'
);

-- 2. Table des catégories
CREATE TABLE takalo_categories (
    id_cat INT AUTO_INCREMENT PRIMARY KEY,
    nom_cat VARCHAR(50) NOT NULL
);

-- 3. Table des objets
CREATE TABLE takalo_objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_obj VARCHAR(100) NOT NULL,
    id_cat INT,
    description TEXT,
    id_proprietaire INT,
    prix_estimatif DECIMAL(10, 2),
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_cat) REFERENCES takalo_categories(id_cat) ON DELETE SET NULL,
    FOREIGN KEY (id_proprietaire) REFERENCES takalo_users(id) ON DELETE CASCADE
);

-- 4. Historique des propriétaires d'objets
CREATE TABLE takalo_objet_historique (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obj INT NOT NULL,
    id_owner INT NOT NULL,
    date_own DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_obj) REFERENCES takalo_objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_owner) REFERENCES takalo_users(id) ON DELETE CASCADE
);

-- 5. Table des photos des objets
CREATE TABLE takalo_photos_objets (
    id_photo INT AUTO_INCREMENT PRIMARY KEY,
    src VARCHAR(255) NOT NULL,
    id_obj INT,

    FOREIGN KEY (id_obj) REFERENCES takalo_objet(id) ON DELETE CASCADE
);

-- 6. Table des échanges
CREATE TABLE takalo_echange (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obj_demande INT NOT NULL, -- Objet convoité
    id_obj_propose INT NOT NULL, -- Objet proposé en échange
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_acceptation DATETIME NULL,
    statut INT DEFAULT 0, -- 0: En attente, 1: Accepté, 2: Refusé

    FOREIGN KEY (id_obj_demande) REFERENCES takalo_objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_obj_propose) REFERENCES takalo_objet(id) ON DELETE CASCADE
);
