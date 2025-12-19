CREATE TABLE clients (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL
);


CREATE TABLE categories (
    id_cat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);


CREATE TABLE produits (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    image VARCHAR(255),
    disponibilite BOOLEAN NOT NULL DEFAULT TRUE,
    id_cat INT NOT NULL,
    CONSTRAINT fk_produits_cat FOREIGN KEY (id_cat)
        REFERENCES categories(id_cat)
        ON DELETE CASCADE
);


CREATE TABLE commandes (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    statut VARCHAR(50) NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL,
    adresse_livraison VARCHAR(255) NOT NULL,
    id_client INT NOT NULL,
    CONSTRAINT fk_commande_client FOREIGN KEY (id_client)
        REFERENCES clients(id_client)
        ON DELETE CASCADE
);


CREATE TABLE inclure (
    id_commande INT NOT NULL,
    id_produit INT NOT NULL,
    quantite INT NOT NULL DEFAULT 1,
    PRIMARY KEY (id_commande, id_produit),
    CONSTRAINT fk_inclure_commande FOREIGN KEY (id_commande)
        REFERENCES commandes(id_commande)
        ON DELETE CASCADE,
    CONSTRAINT fk_inclure_produit FOREIGN KEY (id_produit)
        REFERENCES produits(id_produit)
        ON DELETE CASCADE
);

CREATE TABLE admins (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    roles VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);
