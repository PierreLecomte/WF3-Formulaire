<?php

$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', '');


$jeuderesultat = $maconnexion->query("SELECT * FROM utilisateur WHERE identifiant_utilisateur=11");

$lignesousformedetableau = $jeuderesultat->fetch();
echo $lignesousformedetableau['prenom'] . ' ' . $lignesousformedetableau['nom'];
echo '<br />';



















/* *************************************
 * [Objectifs finaux]
 * 
 * >> EXERCICE 1 <<
 * 
 * afficher sur une page (que l'on appellera affichage.php) le prénom et le nom de l'utilisateur
 * dont l'identifiant (identifiant_utilisateur) est égal à 11.
 * Utiliser PHP et SQL
 * 
 *  pré-requis :
 * 		a) réussir à se connecter à la base en php
 * 
 * 
 * >> EXERCICE 2 <<
 * 
 *  Supprimer l'utilisateur numéro 4 en envoyant une requête simple, tout écrit en dur en PHP & SQL, dans un fichier delete.php
 *  (si ça fonctionne, il suffit de l'exécuter une seule fois)... il peut être normal que rien ne s'affiche sur le fichier en cas de succès... 
 *  
 *  niveau 2 : afficher une confirmation en cas de succès (solution non présente dans les ressources)
 * 
 * 
 * >> EXERCICE 3 <<
 * 
 * à l'aide du formulaire html de l'exercice précédent, et dans un fichier insertion.php,
 * insérer les données envoyées par le formulaire dans la base de données "demo", dans la table "utilisateur"
 * 
 * niveau 1 : insérer uniquement les données présentes dans le formulaire initial
 * niveau 2 : modifier le formulaire en fonction des champs de la table utilisateur
 * 		a) récupérer la liste des villes et des pays dans les tables ville et pays et les afficher dans un select dans le formulaire
 * 		b) récupérer aussi le niveau et les langages dans les tables respectives et les insérer dans le formulaire au bon endroit
 * 		c) insérer dans la table utilisateur toutes les données
 * 		d) gérer la gestion d'envoi de fichiers (les fichiers sont stockés dans la base sous forme d'url, les fichiers sont envoyés dans un répertoire "fichiers" à créer dans le répertoire web
 * 
 * pré-requis :
 * 		a) faire d'abord un test d'insertion de données dans la table "pays" à partir de données écrites en dur dans le code
 * 
 * niveau 3 : modifier le code et utiliser les requêtes préparées : prepare, bindParam et execute;
 * 
 * /


/* *************************************
 * 
 * RESSOURCES COMMUNES NÉCESSAIRES
 * 
 */

// CONNEXION À LA BASE DE DONNÉES ET SELECTION D'UNE BASE DE DONNÉES
// ouvrir une connexion à notre bdd mysql ET se connecter à la base "demo" | connexion à l'aide de PDO

/*

$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', 'motdepasse');

// EXE UNE REQUETE
// Exécuter une requête dans la base à laquelle on est connectée 
// (exec s'utilise exclusivement avec des requêtes qui ne retournent pas de résultats : insert, delete, update)
$maconnexion->exec("INSERT INTO table VALUES('', '')");

// RECUPERER DES INFOS DE LA BASE
// je récupère dans ligne le jeu de résultats de ma requête
$jeuderesultat = $maconnexion->query("SELECT * FROM table");

// je récupère dans tableau la ligne suivante d'un jeu de résultats
$lignesousformedetableau = $jeuderesultat->fetch();
print_r( $lignesousformedetableau); echo '<br />';
$lignesousformedetableau = $jeuderesultat->fetch();
print_r( $lignesousformedetableau); echo '<br />';
$lignesousformedetableau = $jeuderesultat->fetch();
print_r( $lignesousformedetableau); echo '<br />';

// OU
while( $lignesousformedetableau = $jeuderesultat->fetch() )
{
	 print_r( $lignesousformedetableau); echo '<br />'; 
}

*/

?>
