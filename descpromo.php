<?php include_once "includes/head.php"; 
    include_once "includes/header.php";
    $promo = $_GET['promo'];
    $eleve = get_student_by_promo($promo);
	$res = $eleve->fetchAll(); ?>
<html>
    
    <h2 class="titre_page">La promotion <?php echo "$promo"; ?></h2>
    </br>
    <p class="titre_page"> Les élèves de la promo :</p>
    <div class="cadre">
        <?php 
        
        foreach( $res as $ligne) 
            { $nom = $ligne['nom_eleve'] ; 
            $prenom = $ligne['prenom_eleve']?>
            <a class="center" href="desceleve.php?nom_eleve=<?php echo "$nom"?>&prenom=<?php echo "$prenom"?>"><?php echo "$nom $prenom" ?></a><br/>
            <?php
            } 
?>
    </div>

</html>
<?php include_once "includes/footer.php"; ?>
