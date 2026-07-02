-- exe 01
SELECT MAX(prix) as Prix_maximum from produit ;

-- exe 02
SELECT produit.nom as produit , categorie.nom as categorie from produit 
JOIN categorie on categorie.id = produit.categorie_id ;

--exe 03
SELECT categorie.nom as categorie, COUNT(produit.id) AS nombre_produit FROM categorie 
JOIN produit on categorie.id = produit.categorie_id 
GROUP BY categorie;

--exe 04
SELECT categorie.nom as categorie, SUM(commande.quantite) as quantite_total FROM categorie 
JOIN produit on categorie.id = produit.categorie_id 
JOIN commande on produit.id = commande.produit_id
GROUP BY categorie
HAVING quantite_total > 3