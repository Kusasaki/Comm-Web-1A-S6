<?php
    include_once "includes/functions.php";
    $idm = $_GET['idm'];

    $fetchexp  = getDb()->prepare('select * from experiencepro where id_exppro = ?');
    $fetchexp->execute(array($idm));
    $ligne = $fetchexp->fetch();
    
    ?>

<html>

    <body>
    	<?php include_once "includes/header.php";?>
        <form method="POST" action="addexp.php" role="form">

        	<fieldset class="titre_page"><legend>L'expérience</legend>

	        <p><input type="text" name="typeexp" id="type" placeholder="<?php echo $ligne['type_exp']?>" size="30" maxlength="10" /></p>

	        <p><input type="text" name="dateDeb" id="dateDeb" placeholder="<?php echo $ligne['date_debut']?>" size="30" maxlength="10" /></p>

	        <p><input type="text" name="dateFin" id="dateFin" placeholder="<?php echo $ligne['date_fin']?>" size="30" maxlength="10" /></p>

	        <p><input type="text" name="salaire" id="salaire" placeholder="<?php echo $ligne['salaire']?>" size="30" maxlength="10" /></p>

			<p><input type="longtext" name="descexp" id="descexp" placeholder="<?php echo $ligne['description_exp']?>" size="100" maxlength="50" /></p></fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Organisation</legend>

			<p><input type="text" name="nomorga" id="nomorga" placeholder="Nom" size="30" maxlength="10" /></p>

			<p><input type="text" name="typeorga" id="typeorga" placeholder="Type d'organisation" size="30" maxlength="10" /></p>

			<p><input type="text" name="secteur" id="secteur" placeholder="Secteur d'activité" size="30" maxlength="10" /></p>

			<p><input type="text" name="rue" id="rue" placeholder="N°, rue" size="30" maxlength="10" /></p>

			<p><input type="text" name="codeP" id="codeP" placeholder="Code postal" size="30" maxlength="10" /></p>

			<p><input type="text" name="ville" id="ville" placeholder="Ville" size="30" maxlength="10" /></p></fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Confidentialité</legend>

            <label class="switch">
            <input type="checkbox" name="secu">
            <span class="slider round">Je veux que ces informations restent privées</span>
			</label> </fieldset>

  			<input type="button" class="btn btn-default btn-primary" value="Retour" onclick="history.go(-1)">
			<input type="submit" class="btn btn-default btn-primary" value="Valider">

        </form>
    </body>
</html>