<?php include_once "includes/head.php"; 
    include_once "includes/header.php";
    $eleve = $_GET['eleve'];
    $exp = get_exp_by_student($eleve);
	$res = $exp->fetchAll(); ?>
<html>
    
    <h2 class="titre_page">Les expériences de <?php echo "$eleve"; ?></h2>
    </br>
    <p class="titre_page"> Les expériences :</p>
    <div class="cadre">
        <?php 
        
        foreach( $res as $ligne) 
            { $id_organisation= $ligne['id_organisation'] ; 
            $date_debut = $ligne['date_debut']?>
            $date_fin = $ligne['date_fin']?>
            <a class="center" href="descexp.php?nom_eleve=<?php echo "$nom"?>&prenom=<?php echo "$prenom"?>"><?php echo "$nom $prenom" ?></a><br/>
            <?php
            } 
?>
    </div>

</html>
<?php include_once "includes/footer.php"; ?>
