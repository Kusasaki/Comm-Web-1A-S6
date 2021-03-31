<?php session_start();
    include_once "includes/head.php"; 
    include_once "includes/header.php";
    include_once "includes/functions.php";
    

    $request=getDB() -> prepare("SELECT * FROM eleve, acces WHERE acces.id_eleve = eleve.id_eleve
    AND valide=1"); //peut pas se connecter
    $request -> execute();
    $res = $request->fetchAll();

    if(isset($_POST['eleve'])){
        $eleve = $_POST['eleve'];
        $uptype  = getDb()->prepare('update acces set valide=0 where id_eleve = ?');
        $uptype->execute(array($eleve));
    }

    foreach( $res as $ligne) 
            { ?>
                <div class="cadre"><?php
                echo "Nom :". $ligne['nom_eleve']; 
                ?> <br/> <?php
                echo "Prenom : " .$ligne['prenom_eleve'];
                ?> <br/> <?php
                echo "Promotion : " .$ligne['annee'];
                ?> <br/> <?php

                echo "Sexe : " .$ligne['sexe'];
                
                ?> <br/> <?php
                echo "Date de naissance : " .$ligne['date_naissance'];
                ?> <br/><p class="titre_page">On peut le contacter comment ? </p> <?php
                
                echo "Téléphone : " .$ligne['telephone_eleve'];
                
                ?> <br/> <?php
                echo "Adresse mail : " .$ligne['ad_mail'];
                ?> <br/> <p class="titre_page">Où il habite ? </p><?php
                
                echo "Adresse : " .$ligne['ad_postale']." ".$ligne['code_postal']." ".$ligne['ville'];
                ?></div><br/>

                <form  name="retour" action="gest.php" method="post" class="titre_page"><input type="hidden" name="eleve" value="<?=$ligne['id_eleve']?>"><input class="ajouter" type="submit" value="Accepter"></form><br/>      

                 <br/>
                <?php
                
            } 
            

include_once 'includes/footer.php';
?>
