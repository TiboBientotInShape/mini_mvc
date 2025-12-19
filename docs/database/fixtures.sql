INSERT INTO categories (nom, description, image) VALUES
('Informatique', 'PC, composants et accessoires', 'info.jpg'),
('Smartphones', 'Téléphones et accessoires', 'phones.jpg'),
('Sport', 'Matériel et vêtements sportifs', 'sport.jpg'),
('Maison', 'Objets et décoration', 'home.jpg'),
('Gaming', 'Consoles et accessoires', 'gaming.jpg');


INSERT INTO produits (nom, description, prix, stock, image, disponibilite, id_cat) VALUES
('Ordinateur portable', 'Laptop 15 pouces', 799.99, 20, 'laptop.jpg', 1, 1),
('Souris gaming', 'Souris RGB 7200 DPI', 29.99, 50, 'mouse.jpg', 1, 1),
('Clavier mécanique', 'Switch Red', 89.99, 40, 'keyboard.jpg', 1, 1),
('Carte graphique GTX 1660', '6 Go GDDR5', 249.99, 15, 'gtx1660.jpg', 1, 1),
('USB 64 Go', 'Clé USB rapide', 14.99, 100, 'usb.jpg', 1, 1),

('iPhone 14', '128 Go Noir', 999.99, 10, 'iphone14.jpg', 1, 2),
('Samsung S22', '128 Go', 899.99, 8, 's22.jpg', 1, 2),
('Coque silicone', 'Protection smartphone', 9.99, 200, 'coque.jpg', 1, 2),
('Chargeur rapide', 'Chargeur 25W', 19.99, 120, 'chargeur.jpg', 1, 2),
('Écouteurs sans fil', 'Bluetooth 5.0', 39.99, 60, 'ecouteurs.jpg', 1, 2),

('Ballon de foot', 'Taille 5', 19.99, 30, 'ballon.jpg', 1, 3),
('Chaussures running', 'Taille 42', 59.99, 25, 'run42.jpg', 1, 3),
('Haltères 10kg', 'Paire de 10kg', 39.99, 15, 'halteres.jpg', 1, 3),
('Tapis de sport', 'Antidérapant', 24.99, 40, 'tapis.jpg', 1, 3),
('Veste coupe-vent', 'Taille M', 49.99, 20, 'veste.jpg', 1, 3),

('Lampe LED', 'Lampe de chevet', 19.99, 50, 'lampe.jpg', 1, 4),
('Chaise de bureau', 'Chaise ergonomique', 129.99, 12, 'chaise.jpg', 1, 4),
('Table basse', 'Moderne', 89.99, 8, 'table.jpg', 1, 4),
('Décoration murale', 'Affiche design', 14.99, 70, 'deco.jpg', 1, 4),
('Rideaux', '2x140cm', 29.99, 30, 'rideaux.jpg', 1, 4),

('PS5', 'Console Playstation 5', 549.99, 6, 'ps5.jpg', 1, 5),
('Manette PS5', 'Blanche officielle', 69.99, 20, 'manette.jpg', 1, 5),
('Xbox Series X', 'Console Microsoft', 499.99, 5, 'xbox.jpg', 1, 5),
('Casque gaming', 'Son 7.1', 49.99, 35, 'casque.jpg', 1, 5),
('Tapis RGB', 'Tapis gaming lumineux', 19.99, 80, 'tapisrgb.jpg', 1, 5);


INSERT INTO clients (email, nom, prenom, adresse, ville, code_postal, mdp) VALUES
('alice@mail.com', 'Martin', 'Alice', '12 rue des Lilas', 'Paris', '75001', 'hashedpwd'),
('bob@mail.com', 'Durand', 'Bob', '4 avenue Victor Hugo', 'Lyon', '69000', 'hashedpwd'),
('clara@mail.com', 'Moreau', 'Clara', '5 rue Verte', 'Lille', '59000', 'hashedpwd'),
('david@mail.com', 'Bernard', 'David', '8 rue du Port', 'Nice', '06000', 'hashedpwd'),
('emma@mail.com', 'Petit', 'Emma', '10 rue des Fleurs', 'Toulouse', '31000', 'hashedpwd');


INSERT INTO commandes (id_client, statut, montant_total, adresse_livraison, numero_commande)
VALUES
(1, 'payee', 129.97, '12 rue des Lilas', 'CMD0001'),
(1, 'payee', 19.99, '12 rue des Lilas', 'CMD0002'),
(2, 'en_attente', 999.99, '4 avenue Victor Hugo', 'CMD0003'),
(2, 'payee', 49.98, '4 avenue Victor Hugo', 'CMD0004'),
(3, 'expediee', 249.99, '5 rue Verte', 'CMD0005'),
(3, 'livree', 39.99, '5 rue Verte', 'CMD0006'),
(4, 'annulee', 999.99, '8 rue du Port', 'CMD0007'),
(4, 'payee', 59.99, '8 rue du Port', 'CMD0008'),
(5, 'payee', 549.99, '10 rue des Fleurs', 'CMD0009'),
(5, 'payee', 69.99, '10 rue des Fleurs', 'CMD0010');


INSERT INTO lignes_commande (id_commande, id_produit, quantite, prix_unitaire, sous_total) VALUES
(1, 2, 1, 29.99, 29.99),
(1, 3, 1, 89.99, 89.99),
(1, 1, 1, 9.99, 9.99),

(2, 11, 1, 19.99, 19.99),

(3, 6, 1, 999.99, 999.99),

(4, 10, 2, 19.99, 39.98),

(5, 4, 1, 249.99, 249.99),

(6, 14, 1, 39.99, 39.99),

(7, 6, 1, 999.99, 999.99),

(8, 12, 1, 59.99, 59.99),

(9, 21, 1, 549.99, 549.99),

(10, 22, 1, 69.99, 69.99);


INSERT INTO admins (username, email, mdp, roles) VALUES
('admin', 'admin@site.com', 'hashedpwd', 'admin'),
('superadmin', 'root@site.com', 'hashedpwd', 'super_admin');
