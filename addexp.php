<?php 
session_start();
include_once "includes/head.php";
include_once "includes/functions.php";
    
    if (isset($_POST['typeexp'])) { 	

    	$nomorga = escape($_POST['nomorga']);

    	// on vérifie si l'organisation est dans la table
		$verif  = getDb()->prepare('select * from organisation where nom_organisation = ?');
    	$verif->execute(array($nomorga));
    	if ($verif->rowCount() == 0) {
			$nomorga = escape($_POST['nomorga']);
	        $typeorga = escape($_POST['typeorga']);
	        $secteur = escape($_POST['secteur']);
	        $rue = escape($_POST['rue']);
	        $codeP = escape($_POST['codeP']);
	        $ville = escape($_POST['ville']);

	        $addorga = getDb()->prepare('insert into organisation
	        (nom_organisation, type_organisation, secteur_activite, ad_postale, code_postal_organisation, ville_organisation)
	        values (?,?,?,?,?,?)');
	        $addorga->execute(array($nomorga, $typeorga, $secteur, $rue, $codeP, $ville));
    	}
    	
        $typeexp = escape($_POST['typeexp']);
        $descexp = escape($_POST['descexp']);
        $dateDeb = escape($_POST['dateDeb']);
        $dateFin = escape($_POST['dateFin']);
        $salaire = escape($_POST['salaire']);

        $getidor  = getDb()->prepare('select id_organisation from organisation where nom_organisation = ?');
    	$getidor->execute(array($nomorga));
    	$idor = $getidor->fetch();
        $idor = $idor['id_organisation'];

    	$user = $_SESSION['login'];
	    $info = get_utilisateur($user);
	    $result = $info ->fetchAll();    
	    foreach( $result as $ligne) 
            {$nom = $ligne['nom_eleve'];
                $prenom = $ligne['prenom_eleve'];
            }

        $getidel = getDb()->prepare('select id_eleve from eleve where nom_eleve = ? and prenom_eleve = ?');
    	$getidel->execute(array($nom,$prenom));
    	$idel = $getidel->fetch();
        $idel = $idel['id_eleve'];

        if(isset($_POST["secu"])){$secu = 1;} else{$secu = 0;}

        $addexp = getDb()->prepare('insert into experiencepro
        (type_exp, description_exp, date_debut, date_fin, salaire, etat, id_organisation, id_eleve)
        values (?,?,?,?,?,?,?,?)');
        $addexp->execute(array($typeexp, $descexp, $dateDeb, $dateFin, $salaire, $secu, $idor, $idel));
        redirect("confExp.php");
    }
?>

<html>
    <body>
    	<?php include_once "includes/header.php";?>
        <form method="POST" action="addexp.php" role="form" class="cadre">

        	<fieldset class="titre_page"><legend>L'expérience</legend>

	        <p><input type="text" name="typeexp" id="type" placeholder="Type d'expérience" size="30" maxlength="20" /></p>

	        <p><input type="text" name="dateDeb" id="dateDeb" placeholder="Date de début : AAAA-MM-JJ" size="30" maxlength="20" /></p>

	        <p><input type="text" name="dateFin" id="dateFin" placeholder="Date de fin : AAAA-MM-JJ" size="30" maxlength="20" /></p>

	        <p><input type="text" name="salaire" id="salaire" placeholder="Salaire" size="30" maxlength="30" /></p>

			<p><input type="longtext" name="descexp" id="descexp" placeholder="Descrption de l'expérience" size="100" maxlength="1000" /></p></fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Organisation</legend>

			<p><input type="text" name="nomorga" id="nomorga" placeholder="Nom" size="30" maxlength="50" /></p>

			<p><input type="text" name="typeorga" id="typeorga" placeholder="Type d'organisation" size="30" maxlength="50" /></p>

			<p><input type="text" name="secteur" id="secteur" placeholder="Secteur d'activité" size="30" maxlength="50" /></p>

			<p><input type="text" name="rue" id="rue" placeholder="N°, rue" size="30" maxlength="50" /></p>

			<p><input type="text" name="codeP" id="codeP" placeholder="Code postal" size="30" maxlength="50" /></p>

			<p><input type="text" name="ville" id="ville" placeholder="Ville" size="30" maxlength="50" /></p></fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Confidentialité</legend>

            <label class="switch">
            <input type="checkbox" name="secu">
            <span class="slider round">Je veux que ces informations restent privées</span>
			</label> </fieldset>

            <hr/>

            <div class="d-flex justify-content-around">
      			<input type="button" class="btn btn-default btn-primary" value="Retour" onclick="history.go(-1)">
    			<input type="submit" class="btn btn-default btn-primary" value="Valider">
            </div>
            <br/>
        </form>
    </body>
</html>
<?php
include_once 'includes/footer.php';
?>
