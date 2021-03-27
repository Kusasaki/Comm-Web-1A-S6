<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {
    
    if (isset($_POST['nom'])) {

    	$secuTel = escape($_POST['secuTel']);
        $secuMail = escape($_POST['secuMail']);
        $secuAd = escape($_POST['secuAd']);

        $stmt = getDb()->prepare('insert into etat
        (sexe, telephone_eleve, ad_mail, ad_mail, ad_postale, code_postal, ville)
        values (?,?,?,?,?,?)');
        $stmt->execute(array($secuTel, $secuMail, $secuAd, $secuAd, $secuAd));

        $nom = escape($_POST['nom']);
        $prenom = escape($_POST['prenom']);
        $dateNaissance = escape($_POST['dateNaissance']);
        $promotion = escape($_POST['promotion']);
        $genre = escape($_POST['genre']);
        $secuGenre = escape($_POST['secuGenre']);
        $tel = escape($_POST['tel']);
        $mail = escape($_POST['mail']);
        $rue = escape($_POST['rue']);
        $codeP = escape($_POST['codeP']);
        $ville = escape($_POST['ville']);

        $stmt = getDb()->prepare('insert into eleve
        (nom_eleve, prenom_eleve, sexe, date_naissance, telephone_eleve, ad_mail, ad_postale, code_postal, ville, annee)
        values (?,?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array($nom, $prenom, $genre, $dateNaissance, $tel, $mail, $rue, $codeP, $ville, $promotion, ));

        if ((isset($_POST['mdp']))&&(($_POST['mdp'])==($_POST['mdpbis']))){
        	$mdp = escape($_POST['mdp']);
        }

        $stmt = getDb()->prepare('insert into acces
        (nom_utilisateur, mot_de_passe)
        values (?,?,?');
        $stmt->execute(array($prenom, $mdp));
        redirect("index.php");
    }
}
?>

<html>
    <body>
    	<?php include_once "includes/header.php"; ?>
        <form method="POST" action="inscription.php" role="form">

        	<fieldset class="titre_page"><legend>Informations Personnelles</legend>

	        <p><input type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="10" /></p>

	        <p><input type="text" name="prenom" id="prenom" placeholder="Prénom" size="30" maxlength="10" /></p>

	        <p><input type="text" name="dateNaissance" id="da" placeholder="AAAA-MM-JJ" size="30" maxlength="10" /></p>

	        <p><input type="text" name="promotion" id="promo" placeholder="AAAA" size="30" maxlength="10" /></p>

	        <p>
	        <select name="genre" id="genre">
			<option value="M">Masculin</option>
			<option value="F">Féminin</option>
			<option value="A">Autre</option>
			</select>
			<label class="switch" name="secuGenre">
			<input type="checkbox">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>
			</p>

			<p><input type="text" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="10" /></p>
			<p><input type="text" name="mdpbis" id="mdpbis" placeholder="Confirmez le mot de passe" size="30" maxlength="10" /></p> </fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Contact</legend>

			<p><input type="text" name="tel" id="tel" placeholder="N° de téléphone" size="30" maxlength="10" /></p>
			<label class="switch" name="secuTel">
			<input type="checkbox">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>

			<p><input type="text" name="mail" id="mail" placeholder="Adresse mail" size="30" maxlength="10" /></p>
			<label class="switch" name="secuMail">
			<input type="checkbox">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label> </fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Adresse</legend>

			<label for="poste">Adresse postale : </label><br/>
			<p><input type="text" name="rue" id="rue" placeholder="N°, rue" size="30" maxlength="10" /></p>
			<p><input type="text" name="codeP" id="codeP" placeholder="Code postal" size="30" maxlength="10" /></p>
			<p><input type="text" name="ville" id="ville" placeholder="Nom de la ville" size="30" maxlength="10" /></p>

			<label class="switch" name="secuAd">
			<input type="checkbox">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label> </fieldset>

  			<input type="button" class="btn btn-default btn-primary" value="Retour" onclick="history.go(-1)">
			<button type="submit" class="btn btn-default btn-primary">Valider</button>

        </form>
    </body>
</html>
