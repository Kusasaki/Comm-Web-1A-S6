<?php session_start();
    include_once "includes/head.php";
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

//recherche secteur activité
    if($table == "organisation"){
        if($attribut == "secteur_activite"){
        ?>
        <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
        <?php
        $request=getDB()->prepare("SELECT * FROM organisation WHERE secteur_activite=?");
        $request->execute(array($valeur));
        $res = $request->fetchAll();
        } 
        if($attribut == "nom_organisation"){
            ?>
            <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
            <?php
            $info = get_info_from_organisation($attribut, $valeur);
            $res = $info->fetchAll();
        }
        if($attribut == "ville_organisation"){
            ?>
            <h4 class="titre_rubrique">Résultat de la recherche "<?php echo "$valeur"?>"</h4>
            <?php
            $request=getDB()->prepare("SELECT * FROM organisation WHERE ville_organisation=?");
            $request->execute(array($valeur));
            $res = $request->fetchAll();
        }
        if (isset($res)){
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
            }
        }
    }
    
    ?>
    
