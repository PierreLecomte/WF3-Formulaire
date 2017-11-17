<?php

$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', '');


$info = $maconnexion->exec("DELETE FROM utilisateur WHERE identifiant_utilisateur=4");

if ($info){
	echo "l'utilisateur a été effacé";
}
else{
	echo "donnée introuvable";
}


?>