<?php
    include_once "includes/functions.php"; 
    session_start();
    if(isset($_POST['idxp'])){
    $id = $_POST['idxp'];
    $fetchexp  = getDb()->prepare('select * from experiencepro where id_exppro = ?');
    $fetchexp->execute(array($id));
    $ligne = $fetchexp->fetch();

    if (isset($_POST['typeexp'])) {
        $nomorga = escape($_POST['nomorga']);

        if (($_POST['nomorga']) != "") {
            $verif  = getDb()->prepare('select * from organisation where nom_organisation = ?');
            $verif->execute(array($nomorga));
            print_r($verif->fetchAll());
            if ($verif->rowCount() == 0) {
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
            else{
                $getidor  = getDb()->prepare('select id_organisation from organisation where nom_organisation = ?');
                $getidor->execute(array($nomorga));
                $idor = $getidor->fetch();
                $idor = $idor['id_organisation'];
                $upnom  = getDb()->prepare('update experiencepro set id_organisation = ? where id_exppro = ?');
                $upnom->execute(array($idor, $id));
            }
        }   

        $typeexp = escape($_POST['typeexp']);
        $dateDeb = escape($_POST['dateDeb']);
        $dateFin = escape($_POST['dateFin']);
        $salaire = escape($_POST['salaire']);
        $descexp = escape($_POST['descexp']);

        if (($_POST['typeexp']) != "") {
        $uptype  = getDb()->prepare('update experiencepro set type_exp = ? where id_exppro = ?');
        $uptype->execute(array($typeexp, $id));}

        if (($_POST['dateDeb']) != "") {
        $updatedeb  = getDb()->prepare('update experiencepro set date_debut = ? where id_exppro = ?');
        $updatedeb->execute(array($dateDeb, $id));}

        if (($_POST['dateFin']) != "") {
        $updatefin  = getDb()->prepare('update experiencepro set date_fin = ? where id_exppro = ?');
        $updatefin->execute(array($dateFin, $id));}
       
        if (($_POST['salaire']) != "") {
        $upsal  = getDb()->prepare('update experiencepro set salaire = ? where id_exppro = ?');
        $upsal->execute(array($salaire, $id));}
        
        if (($_POST['descexp']) != "") {
        $updesc  = getDb()->prepare('update experiencepro set description_exp = ? where id_exppro = ?');
        $updesc->execute(array($descexp, $id));}

        if(isset($_POST["secu"])){$secu = 1;} else{$secu = 0;}

        $upsecu  = getDb()->prepare('update experiencepro set etat = ? where id_exppro = ?');
        $upsecu->execute(array($secu, $id));

        redirect("mesexp.php");
    }
}
?>

<html>
    <body>
    	<?php include_once "includes/header.php";?>
        <form method="POST" action="modifierexp.php" role="form" class="cadre">

            <input type="hidden" name="idxp" value="<?= $_POST['id'] ?>" ></input>

        	<fieldset class="titre_page"><legend>L'expérience</legend>

	        <p><input type="text" name="typeexp" id="type" placeholder="Type d'expérience" size="30" maxlength="30" /></p>

            <p><input type="text" name="dateDeb" id="dateDeb" placeholder="Date de début : AAAA-MM-JJ" size="30" maxlength="10" /></p>

            <p><input type="text" name="dateFin" id="dateFin" placeholder="Date de fin : AAAA-MM-JJ" size="30" maxlength="10" /></p>

            <p><input type="text" name="salaire" id="salaire" placeholder="Salaire" size="30" maxlength="10" /></p>

            <p><input type="longtext" name="descexp" id="descexp" placeholder="Description de l'expérience" size="100" maxlength="50" /></p></fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Organisation</legend>

			<p><input type="text" name="nomorga" id="nomorga" placeholder="Nom" size="30" maxlength="20" /></p>

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
