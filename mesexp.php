<?php include_once "includes/head.php"; 
    include_once "includes/functions.php";
    session_start();

    $user = $_SESSION['login'];
    $info = get_utilisateur($user);
    $result = $info ->fetchAll();    
    foreach( $result as $ligne) 
            { $nom = $ligne['nom_eleve'];
                $prenom = $ligne['prenom_eleve'];
            }
    $eleve = get_xp($nom, $prenom);
	$res = $eleve->fetchAll();?>

<html>
    <?php include_once "includes/header.php";?>
    <h2 class="titre_page">Mes expériences !</h2>
    </br>
    
        <?php 
        
            
            foreach( $res as $ligne) 
            { ?> <div class="cadre"> <?php
                if ($ligne['etat'] == 0)
                {
                    echo "Type d'expérience :". $ligne['type_exp']; 
                    ?> <br/> <?php
                    echo "Brève description de l'expérience :". $ligne['description_exp']; 
                    ?> <br/> <?php
                    echo "Durée de l'expérience :". $ligne['date_debut']." - ".$ligne['date_fin']; 
                    ?> <br/> <?php
                    echo "Salaire :". $ligne['salaire']; 
                    ?> <br/> <?php
                }
               ?> </div> <?php
            }
        include_once "includes/footer.php";
        ?>

