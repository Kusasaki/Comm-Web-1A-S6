<?php 
    session_start();
    include_once "includes/head.php";
    include_once "includes/functions.php";
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    $info = get_info_from_eleve($nom, $prenom);
    $res = $info->fetchAll();

    $etat = get_id_etat($nom, $prenom);
    $id_etat = $etat->fetch();

    $dispo = is_available($id_etat['id_etat']); 
    $result = $dispo->fetchAll();?>

<html>
     <?php include_once "includes/header.php";?>
    <h2 class="titre_page"><?php echo "$prenom $nom"?></h2>
    <br/>
    <div class ="cadre">
    <p class="titre_page">C'est qui ? </p>
    <?php 
        foreach ($result as $li)
        {
            foreach( $res as $ligne) 
            { 
                echo "Nom : " .$ligne['nom_eleve']; 
                ?> <br/> <?php
                echo "Prenom : " .$ligne['prenom_eleve'];
                ?> <br/> <?php
                echo "Promotion : " .$ligne['annee'];
                ?> <br/> <?php
                if ($li['sexe']=0 || is_gest_connected()){
                echo "Sexe : " .$ligne['sexe'];
                }
                ?> <br/> <?php
                echo "Date de naissance : " .$ligne['date_naissance'];
                ?> <br/><p class="titre_page">On peut le/la contacter comment ? </p> <?php
                if ($li['telephone_eleve']=0 || is_gest_connected()){
                    echo "Téléphone : " .$ligne['telephone_eleve'];
                }
                else echo "Cette information est indisponible";
                ?> <br/> <?php
                if ($li['ad_mail']=0 || is_gest_connected()){
                echo "Adresse mail : " .$ligne['ad_mail'];
                }
                else echo "Cette information est indisponible";
                ?> <br/> <p class="titre_page">Où il/elle habite ? </p><?php
                if ($li['ad_postale']=0 || is_gest_connected()){
                echo "Adresse : " .$ligne['ad_postale']." ".$ligne['code_postal']." ".$ligne['ville'];
                }
                else echo "Cette information est indisponible";
                ?> <br/> <p class="titre_page">Il/elle a fait quoi ? </p><?php
                
            } 
        }
        //afficher les différentes ecpériences
        $eleve = get_xp($nom, $prenom);
        $res = $eleve->fetchAll();
        foreach( $res as $ligne) 
            { ?> <div class="cadre xp"> <p class="titre_page">Expérience : </p> <?php
                if ($ligne['etat'] == 0 || is_gest_connected())
                {
                    echo "Type d'expérience : ". $ligne['type_exp']; 
                    ?> <br/> <?php
                    echo "Brève description de l'expérience : ". $ligne['description_exp']; 
                    ?> <br/> <?php
                    echo "Durée de l'expérience : ". $ligne['date_debut']." - ".$ligne['date_fin']; 
                    ?> <br/> <?php
                    echo "Salaire : ". $ligne['salaire']; 
                    ?> <br/> <?php

                    $id_organisation=$ligne['id_organisation'];
                    $organisation = get_organisation($id_organisation);
                    $resu = $organisation->fetchAll();
                    foreach( $resu as $ligne) 
                        { ?> <p class="titre_page">Organisation : </p> <?php
                            echo "Nom : ". $ligne['nom_organisation']; 
                            ?> <br/> <?php
                            echo "Type d'organisation : ". $ligne['type_organisation']; 
                            ?> <br/> <?php 
                            echo "Secteur d'activité : ". $ligne['secteur_activite']; 
                            ?> <br/> <?php
                            echo "Adresse : ". $ligne['ad_postale']." ".$ligne['code_postal_organisation']." ".$ligne['ville_organisation']; 
                            ?> <br/> <?php
                            echo "Téléphone : ". $ligne['telephone_organisation']; 
                            ?> <br/> <?php
                        }
                }
               ?> </div><br/> <?php
            }?>

    </div>
    <br/>
    

</html>
<?php include_once "includes/footer.php"; ?>
