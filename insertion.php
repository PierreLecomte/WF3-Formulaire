<?php

	if (empty($_POST)){
		  header('Location: formulaires-bases.php');
		  exit();
		}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Formulaires &amp; PHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bulma.css">
	<link rel="stylesheet" type="text/css" href="css/monCSS.css">
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/monJQ.js" type="text/javascript"></script>



</head>
<body>
	<a href='formulaires-bases.php'>Retour au formulaire</a><br />

<?php

	function conv_date(string $date_text){
		$parties = explode("-", $date_text);
		return $parties[2] . "/" . $parties[1] . "/" . $parties[0];
	}

	function conv_tel(string $tel){
		$tel = '+33' . substr($tel,1);
		return $tel;
	}

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$email = $_POST['email'];
		$email_mailto = $_POST['email'];

		if (isset($_POST['newsletter'])){
			mail ( $email , 'Bienvenue' , 'Bienvenue sur notre nouvelle newsletter', 'From: webmaster@example.com');
		}

	}
	else{
		$email = 'adresse e-mail invalide';
		$email_mailto = '';
	}


$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
$abo_news = isset($_POST['newsletter']) ? '1' : '0';
$valid_cond = isset($_POST['accept_admission']) ? '1' : '0';

$ma_requete = 
	"INSERT INTO utilisateur(
	nom,
	prenom,
	date_naissance,
	email,
	tel,
	mot_de_passe,
	id_langage_langage,
	id_niveau_niveau,
	biographie,
	philosophie,
	motivation,
	date_dispo,
	pref_heure_repas,
	code_commune_insee_ville,
	abonnement_newsletter,
	pref_accept_conditions
	)

	VALUES ('" .
	$_POST['nom'] . "','". 
	$_POST['prenom'] . "','". 
	$_POST['date_naissance'] . "','". 
	$_POST['email'] . "','". 
	$_POST['telephone'] . "','". 
	$_POST['mot_de_passe'] . "','". 
	$_POST['langage'] . "','". 
	$_POST['niveau'] . "','". 
	addslashes($_POST['bio']) . "','". 
	addslashes($_POST['philosophie']) . "','". 
	$_POST['motivation'] . "','". 
	$_POST['dispo_date'] . "','". 
	$_POST['time'] . "','". 
	$_POST['ville'] . "','". 
	$abo_news . "','".
	$valid_cond . "')";

$info = $maconnexion->exec($ma_requete);

if ($info){
	echo "les données ont bien été ajoutées";
?>



	<div class="columns">
		<div class="column hero is-info">
			<p class="title">À propos de vous</p>
			<p>Nom : <?php echo strtoupper($_POST['nom']);?></p>
			<p>Prénom : <?php echo ucfirst($_POST['prenom']);?></p>
			<p>Âge : <?php echo $_POST['age'];?></p>
			<p>Date de naissance : <?php echo conv_date($_POST['date_naissance']);?></p>
		</div>

		<div class="column hero is-primary">
			<p class="title">Vos coordonnées</p>
			<p>E-mail : <?php echo "<a href='mailto:" . $email_mailto . "'>" . $email . "</a>"; ?></p>
			<p>Téléphone : <?php echo "<a href='tel:" . conv_tel($_POST['telephone']) . "'>" . conv_tel($_POST['telephone']) . "</a>"; ?></p>
		</div>

		<div class="column hero is-warning">
			<p class="title">Vos identifiants</p>
			<p>Identifiant : <?php echo $_POST['identifiant'];?></p>
			<p>Mot de passe : <?php echo $_POST['mot_de_passe'];?></p>
		</div>

	</div>

	<div class="columns">
		<div class="column hero is-danger">
			<p class="title">Vos préférences</p>
			<p>id_langage : <?php echo $_POST['langage'];?></p>
		</div>

		<div class="column hero is-info">
			<p class="title">Votre niveau</p>
			<p>id_niveau : <?php echo $_POST['niveau'];?></p>
		</div>

		<div class="column hero is-primary">
			<p class="title">Lettre d'information</p>
			<p>Abonnement newsletter : <?php if (isset($_POST['newsletter'])){
				echo 'oui';
			}
			else{
				echo 'non';
			}?>
		</p>
	</div>
</div>

<div class="columns">
	<div class="column hero is-warning">
		<p class="title">Un peu plus sur vous...</p>
		<p>Biographie : <?php echo $_POST['bio'];?></p>
		<p>Philosophie : <?php echo $_POST['philosophie'];?></p>
	</div>

	<div class="column hero is-danger">
		<p class="title">Par rapport à la formation</p>
		<p>Motivation : <?php echo $_POST['motivation'];?></p>
		<p>Date de disponibilité : <?php echo conv_date($_POST['dispo_date']);?></p>
	</div>

	<div class="column hero is-info">
		<p class="title">Divers</p>
		<p>Heure préférée : <?php echo $_POST['time'];?></p>
	</div>
</div>

<?php
}
else{
	echo "erreur <br />";
	echo $ma_requete;
}
?>


</body>
</html>