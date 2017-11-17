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
	<?php
	
$maconnexion = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
$maconnexion->exec('SET NAMES utf8');


$villes = $maconnexion->query("SELECT code_commune_insee, nom_ville FROM ville");
$pays_liste = $maconnexion->query("SELECT code_pays, nom_pays FROM pays");
$langages = $maconnexion->query("SELECT id_langage, nom_langage, type_langage FROM langage");
$langage = $langages->fetchAll();
$niveaux = $maconnexion->query("SELECT id_niveau, description_niveau FROM niveau");

		?>

		<form method="post" action="insertion.php">	
			<input type="hidden" value="stagiaire" id="type_utilisateur" name="type_utilisateur" >
			<fieldset>
				<legend>À propos de vous</legend>
			</div>
			<div>
				<p><label for="nom">Nom :</label>
					<input type="text" name="nom" id="nom" title="Nom" required aria-required="true" />
				</p>
				<p><label for="prenom">Prénom :</label>
					<input type="text" name="prenom" id="prenom" required aria-required="true" />
				</p>
				<p><label for="age">Votre âge :</label>
					<input type="number" name="age" id="age" min="10" max="100" step="1" value="20" />
				</p>
				<p><label for="age">Votre date de naissance :</label>
					<input type="date" name="date_naissance" id="date_naissance" />
				</p>
			</fieldset>
			<fieldset>
				<legend>Vos coordonnées</legend>
				<p><label for="email">e-mail :</label>
					<input type="email" name="email" id="email" required aria-required="true">
				</p>
				<p><label for="telephone">Téléphone :</label>
					<input type="tel" name="telephone" id="telephone" required aria-required="true">
				</p>
				<p><label for="ville">Ville :</label>
				<select id="ville" name="ville">
					<?php 
						while($ville = $villes->fetch()){
							echo "<option value = " . $ville[0] . ">" . $ville[1] . "</option>";
						}

					?>			
				</select></p>
				<p><label for="pays">Pays :</label>
				<select id="pays" name="pays">
					<?php 
						while($pays = $pays_liste->fetch()){
							echo "<option value = " . $pays[0] . ">" . $pays[1] . "</option>";
						}

					?>			
				</select></p>


			</fieldset>
			<fieldset>
				<legend>Vos identifiants</legend>
				<p><label for="identifiant">Identifiant (rappel, non modifiable) :</label>
					<input type="text" readonly name="identifiant" id="identifiant" value="ID97379202">
					<!-- read only -->
				</p>
				<p><label for="mot_de_passe">Mot de passe :</label>
					<input type="password" name="mot_de_passe" id="mot_de_passe" pattern=".{6,}" autocomplete="off" required aria-required="true">
				</p>
			</fieldset>
			<fieldset>
				<legend>Vos préférences</legend>
				<p><label for="langage">Quel langage préférez-vous ?</label>
					<select id="langage" name="langage">
						<optgroup label="Langages de script côté serveur">
		<?php			foreach ($langage as $val){
							if ($val[2]=='Serveur'){
								echo '<option value="' . $val[0] .'">' . $val[1] . '</option>';
							}
						}									
		?>
						</optgroup>
						<optgroup label="Langages côté client">
		<?php 			foreach ($langage as $val){
							if ($val[2]=='Client'){
								echo '<option value="' . $val[0] .'">' . $val[1] . '</option>';
							}
						}							
		?>
						</optgroup> 
					</select>
				</p>
			</fieldset>
			<fieldset>
				<legend>Votre niveau</legend>

<?php 			while($niveau = $niveaux->fetch()){
						echo '<div>
					<input type="radio" name="niveau" id="niv_' . $niveau[0] .'" value="' . $niveau[0] . '" checked>
					<label for="niv_' . $niveau[0] . '">' . $niveau[1] . '</label>
				</div>';
					}
?>
			</fieldset>
			<fieldset>
				<legend>Lettre d'information</legend>
				<p><input type="checkbox" name="newsletter" id="newsletter" value="oui" >
					<label for="newsletter">Je souhaite m'inscrire à la lettre d'information</label>
				</p>
			</fieldset>
			<fieldset>
				<legend>Un peu plus sur vous...</legend>
				<p><label for="bio">Biographie</label><br />
					<textarea name="bio" id="bio" cols="60" rows="8" minlength="10" maxlength="50" required aria-required="true"></textarea>
				</p>
				<p><label for="philosophie">Philosophie</label><br />
					<textarea name="philosophie" id="philosophie" cols="40" rows="4" placeholder="Petite aide à l'utilisateur qui disparaît quand on écrit..."></textarea>
				</p>
			</fieldset>
			<fieldset>
				<legend>Par rapport à la formation</legend>
				<p><label for="motivation">Ma motivation (gauche = aucune ; droite = pleine) : </label><br />
					<input type="range" name="motivation" id="motivation" min="0" max="100" step="10" value="0">
				</p>
				<p><label for="dispo_date">Date de disponibilité : </label>
					<input type="date" name="dispo_date" id="dispo_date">
				</p>
			</fieldset>
			<fieldset>
				<legend>Divers</legend>
				<label for="time">Votre heure préférée du repas : </label>
				<input type="time" name="time" id="time" min="11:00" max="14:00" step="900" value="12:30">
			</fieldset>
			<fieldset>
				<legend>Trombinoscope</legend>
				<label for="photo">Votre photo : </label>
				<input type="file" name="photo" id="photo">
				<input type="hidden" name="MAX_FILE_SIZE" value="3048576">
			</fieldset>
			<fieldset>
				<legend>Validation</legend>
				<p><input type="checkbox" name="accept_admission" id="accept_admission" value="oui">
					<label for="accept_admission">J'ai lu et j'accepte les conditions d'admission.</label>
				</p>
				<p><input type="submit" value="Envoyer" /></p>
			</fieldset>
		</form>	

</body>
</html>