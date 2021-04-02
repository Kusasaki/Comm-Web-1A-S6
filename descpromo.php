<?php session_start();
    include_once "includes/head.php"; 
    include_once "includes/functions.php";
    $promo = $_GET['promo'];
    $eleve = get_student_by_promo($promo);
	$res = $eleve->fetchAll(); ?>
<html>
    <?php include_once "includes/header.php"; ?>
    <h2 class="titre_page">La promotion <?php echo "$promo"; ?></h2>
    </br>
    <p class="titre_page"> Les élèves de la promo :</p>
    <div class="cadre">
        <?php 
        
        foreach( $res as $ligne) 
            { $nom = $ligne['nom_eleve'] ; 
            $prenom = $ligne['prenom_eleve'];
            if(isUserConnected()) { ?>
                <a class="center" href="desceleve.php?nom=<?php echo "$nom"?>&prenom=<?php echo "$prenom"?>"><?php echo "$nom $prenom" ?></a><br/>
        
                <?php }else{?>
                    <div class="titre_page">
			    <?php echo "$nom $prenom";?>
                    </br></div> <?php
                 } 
            }
	    if(!isUserConnected()){ ?>
		<div class="titre_page"> 
			<br/>Vous ne pouvez pas aller sur la fiche des élèves, veuillez vous <a href="login.php">connecter</a> ou vous <a href="inscription.php">inscrire</a> ! <br/>
			</div>
		</div> <?php
	    }
?> </div>

</html>
<?php include_once "includes/footer.php"; ?>
