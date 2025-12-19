1. Pourquoi stocker le prix unitaire dans la table des lignes de commande ?

Parce que le prix d’un produit peut changer avec le temps.
Si on ne stocke pas le prix au moment de la commande, toutes les anciennes commandes seraient fausses dès que le prix change.
En enregistrant le prix unitaire dans la ligne de commande, on garde un historique exact et les factures restent cohérentes.

2. Quelle stratégie avez-vous choisie pour gérer les suppressions ?

Client → Commandes : ON DELETE CASCADE
Si un client est supprimé, ses commandes le sont aussi.

Commande → Lignes de commande : ON DELETE CASCADE
Une ligne de commande n’existe pas sans la commande, donc cascade.

Produit → Lignes de commande : ON DELETE RESTRICT
On ne doit pas pouvoir supprimer un produit qui a déjà été commandé.

Catégorie → Produits : ON DELETE SET NULL
Si une catégorie est supprimée, les produits restent mais sans catégorie.

Admins : suppression simple (pas de relation).

3. Comment gérez-vous les stocks ?

Si un produit est en rupture de stock, il ne peut pas être commandé.

Le stock est décrémenté au moment du paiement validé, pas avant.
Cela évite de bloquer du stock pour des paniers abandonnés.

4. Avez-vous prévu des index ? Lesquels et pourquoi ?

Oui :

email des clients et admins → pour garantir l’unicité et accélérer la connexion.

id_cat dans produits → pour afficher rapidement les produits d’une catégorie.

id_client dans commandes → pour afficher rapidement les commandes d’un client.

5. Comment assurez-vous l’unicité du numéro de commande ?

L’identifiant de commande est une clé primaire auto-incrémentée, donc MySQL garantit automatiquement qu’il est unique.

6. Quelles sont les extensions possibles du modèle ?

Plusieurs adresses par client

Historique des prix

Avis clients

Plusieurs images par produit

Wishlist / favoris

Codes promo

Gestion des retours