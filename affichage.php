<?php

$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', '');


$jeuderesultat = $maconnexion->query("SELECT * FROM utilisateur WHERE identifiant_utilisateur=11");

$lignesousformedetableau = $jeuderesultat->fetch();
echo $lignesousformedetableau['prenom'] . ' ' . $lignesousformedetableau['nom'];
echo '<br />';

?>