<?php session_start();
    include_once "includes/head.php";
    include_once "includes/functions.php"; 
    include_once "includes/header.php"; 
    $table = $_GET['table'];
    $attribut = $_GET['attribut'];
    $valeur = $_GET['valeur'];
    
    //recherche d'une promo
    if($table == "promotion"){
        $red = "descpromo.php?promo=".$valeur;
        redirect($red);
    }

//recherche d'un élève
    if($table == "eleve"){
        $request = getDb() -> prepare("SELECT prenom_eleve FROM eleve WHERE nom_eleve=?");
        $request->execute(array($valeur));
        $res = $request->fetch();
        $prenom = $res['prenom_eleve'];
        $red="desceleve.php?nom=".$valeur."&prenom=".$prenom;
        redirect($red);
    }

//recherche type d'expérience
    if($table=="experiencepro"){
        ?>
        <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
        <?php
        $request = getDb() -> prepare("SELECT * FROM experiencepro WHERE type_exp=? AND etat=0;");
        $request->execute(array($valeur));
        $res=$request->fetchAll();
        foreach($res as $ligne){
            ?>
            <div class="cadre">
            <?php
            echo "Description de l'expérience : ". $ligne['description_exp']; 
            ?> <br/> <?php
            echo "Durée de l'expérience : ". $ligne['date_debut']." - ".$ligne['date_fin']; 
            ?> <br/> <?php
            echo "Salaire : ". $ligne['salaire']; 
            ?> <br/></div><br/><?php
        }
        if($request->rowCount() == 0) {echo "Personne n'a souhaité partager son expérience";}
    }

//recherche par propriétés liées à la table organisation
    if($table == "organisation"){
        // recherche par secteur d'activité
        if($attribut == "secteur_activite"){
        ?>
        <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
        <?php
        $request=getDB()->prepare("SELECT * FROM organisation WHERE secteur_activite=?");
        $request->execute(array($valeur));
        $res = $request->fetchAll();
        } 
        //recherche par nom
        if($attribut == "nom_organisation"){
            ?>
            <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
            <?php
            $request = getDB()->prepare("SELECT * FROM organisation WHERE nom_organisation=?");
            $request -> execute(array($valeur));
            $res = $request->fetchAll();
        }
        //recherche par ville
        if($attribut == "ville_organisation"){
            ?>
            <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
            <?php
            $request=getDB()->prepare("SELECT * FROM organisation WHERE ville_organisation=?");
            $request->execute(array($valeur));
            $res = $request->fetchAll();
        }
 //affichage des informations : 
        if (isset($res)){
            //affiche organisation
            foreach($res as $ligne) 
            { ?>
                <div class="cadre">
                <?php
                echo "Nom : ". $ligne['nom_organisation']; 
                ?> <br/> <?php
                echo "Type d'organisation : ". $ligne['type_organisation']; 
                ?> <br/> <?php 
                echo "Secteur d'activité : ". $ligne['secteur_activite']; 
                ?> <br/> <?php
                echo "Adresse : ". $ligne['ad_postale']." ".$ligne['code_postal_organisation']." ".$ligne['ville_organisation']; 
                ?> <br/> <?php
                echo "Téléphone : ". $ligne['telephone_organisation']; 
                ?> <br/></div><br/> <?php
                   
                //affiche les infos des expériences professionnelles
                $requestExp=getDB()->prepare("SELECT * FROM experiencepro WHERE id_organisation =? AND etat = 0");
                $requestExp->execute(array($ligne['id_organisation']));
                $res = $requestExp->fetchAll();
                ?>
                <h5 class = "titre_rubrique">Expériences des anciens de l'ENSC</h5>
                </br>
                <!-- Afficher les expériences liées à cette organisation-->
                <?php
                foreach($res as $ligne){
                    ?>
                    <div class="cadre">
                    <?php
                    echo "Description de l'expérience : ". $ligne['description_exp']; 
                    ?> <br/> <?php
                    echo "Durée de l'expérience : ". $ligne['date_debut']." - ".$ligne['date_fin']; 
                    ?> <br/> <?php
                    echo "Salaire : ". $ligne['salaire']; 
                    ?> <br/><br/><?php
                    //Cherche la personne ayant réalisé cette expérience et propose d'aller voir son profil
                    $request = getDb() -> prepare("SELECT nom_eleve, prenom_eleve FROM eleve WHERE id_eleve=?");
                    $request->execute(array($ligne['id_eleve']));
                    $resEleve = $request->fetch();
                    $nom = $resEleve['nom_eleve'];
                    $prenom = $resEleve['prenom_eleve'];
                    $red="desceleve.php?nom=".$nom."&prenom=".$prenom;
                    ?>
                    Personne ayant réalisé cette expérience : <?php echo "$prenom $nom"?>
                    <br/>
                    <a href="<?php echo"$red"?>">Voir le profil de <?php echo "$prenom $nom"?></a>
                    <?php
                    ?></div><br/><?php
                }
                if($requestExp->rowCount() == 0) {echo "Personne n'a souhaité partager son expérience";}

            }
        }
    }
    
    ?>
    
