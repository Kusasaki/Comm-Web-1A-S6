<?php
require_once "includes/functions.php";
session_start();
    
    if (isset($_POST['nom'])) {

    	if($_POST['secuAd']){$secuAd = 1;} else{$secuAd = 0;}
        if($_POST['secuMail']){$secuMail = 1;} else{$secuMail = 0;}
        if($_POST['secuTel']){$secuTel = 1;} else{$secuTel = 0;}
        if($_POST['secuGenre']){$secuGenre = 1;} else{$secuGenre = 0;}

        $addetat = getDb()->prepare('insert into etat
        (sexe, telephone_eleve, ad_mail, ad_postale, code_postal, ville)
        values (?,?,?,?,?,?)');
        $addetat->execute(array($secuGenre, $secuTel, $secuMail, $secuAd, $secuAd, $secuAd));

		$getidet = getDb()->prepare('select max(id_etat) from etat');
    	$getidet->execute(array());
    	$idet = $getidet->fetch();
    	$idet = $idet['max(id_etat)'];

    	$getidg = getDb()->prepare('select max(id_gestionnaire) from gestionnaire');
    	$getidg->execute(array());
    	$idg = $getidg->fetch();
    	$idg = $idg['max(id_gestionnaire)'];

        $nom = escape($_POST['nom']);
        $prenom = escape($_POST['prenom']);
        $dateNaissance = escape($_POST['dateNaissance']);
        $promotion = escape($_POST['promotion']);
        $genre = escape($_POST['genre']);
        $tel = escape($_POST['tel']);
        $mail = escape($_POST['mail']);
        $rue = escape($_POST['rue']);
        $codeP = escape($_POST['codeP']);
        $ville = escape($_POST['ville']);

        $addeleve = getDb()->prepare('insert into eleve
        (nom_eleve, prenom_eleve, sexe, date_naissance, telephone_eleve, ad_mail, ad_postale, code_postal, ville, annee, id_etat, id_gestionnaire)
        values (?,?,?,?,?,?,?,?,?,?,?,?)');
        $addeleve->execute(array($nom, $prenom, $genre, $dateNaissance, $tel, $mail, $rue, $codeP, $ville, $promotion, $idet, $idg));

        $getidel = getDb()->prepare('select max(id_eleve) from eleve');
    	$getidel->execute(array());
    	$idel = $getidel->fetch();
    	$idel = $idel['max(id_eleve)'];

        if ((isset($_POST['mdp']))&&(($_POST['mdp'])==($_POST['mdpbis']))){
        	$mdp = escape($_POST['mdp']);
        }

        $addacces = getDb()->prepare('insert into acces
        (nom_utilisateur, mot_de_passe, id_eleve, id_gestionnaire)
        values (?,?,?,?)');
        $addacces->execute(array($prenom, $mdp, $idel, $idg));
        redirect("index.php");
    }
?>

<html>
    <body>
    	<?php include_once "includes/header.php";?>
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
			<label class="switch">
			<input type="checkbox" name="secuGenre">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>
			</p>

			<p><input type="text" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="10" /></p>
			<p><input type="text" name="mdpbis" id="mdpbis" placeholder="Confirmez le mot de passe" size="30" maxlength="10" /></p> </fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Contact</legend>

			<p><input type="text" name="tel" id="tel" placeholder="N° de téléphone" size="30" maxlength="10" /></p>
			<label class="switch">
			<input type="checkbox" name="secuTel">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>

			<p><input type="text" name="mail" id="mail" placeholder="Adresse mail" size="30" maxlength="10" /></p>
			<label class="switch">
			<input type="checkbox" name="secuMail">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label> </fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Adresse</legend>

			<label for="poste">Adresse postale : </label><br/>
			<p><input type="text" name="rue" id="rue" placeholder="N°, rue" size="30" maxlength="10" /></p>
			<p><input type="text" name="codeP" id="codeP" placeholder="Code postal" size="30" maxlength="10" /></p>
			<p><input type="text" name="ville" id="ville" placeholder="Nom de la ville" size="30" maxlength="10" /></p>

			<label class="switch">
			<input type="checkbox" name="secuAd">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label> </fieldset>

  			<input type="button" class="btn btn-default btn-primary" value="Retour" onclick="history.go(-1)">
			<input type="submit" class="btn btn-default btn-primary" value="Valider">

        </form>
    </body>
</html>
