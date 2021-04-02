<?php 
session_start();
include_once "includes/head.php";
include_once "includes/functions.php";


    $user = $_SESSION['login'];
    $info = get_utilisateur($user);
    $result = $info ->fetchAll();    
    foreach( $result as $ligne) 
            { $nom = $ligne['nom_eleve'];
                $prenom = $ligne['prenom_eleve'];
            }

    $eleve = get_xp($nom, $prenom);
    $res = $eleve->fetchAll();
    ?>

<html>
    <?php include_once "includes/header.php";?>
    <body>
        <h2 class="titre_page">Mes expériences !</h2>
        </br>
            <div>
                <?php
                    ?><div><?php 

                    foreach( $res as $ligne) 
                    { ?> <div class="cadre"> <p class="titre_page">Expérience : </p> <?php
                        
                        echo "Type d'expérience : ". $ligne['type_exp']; 
                        ?> <br/> <?php
                        echo "Brève description de l'expérience : ". $ligne['description_exp']; 
                        ?> <br/> <?php
                        echo "Durée de l'expérience : ". $ligne['date_debut']." - ".$ligne['date_fin']; 
                        ?> <br/> <?php
                        echo "Salaire : ". $ligne['salaire']; 
                        ?> <br/> <?php
                        if ($ligne['etat'] == 0)echo "Etat : visible";
                        else echo "Etat : invisible";
                        
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
                        }
                        ?>
                        </div><br/>

                        <form  name="modifierexp" action="modifierexp.php" method="post"><button type="submit">Modifier l'expérience</button><input type="hidden" name="id" value="<?= $ligne['id_exppro'] ?>" ></input></form><br/>

                        <form  name="supexp" action="supexp.php" method="post"><button type="submit">Supprimer l'expérience <?= $ligne['id_exppro'] ?> </button><input type="hidden" name="id" value="<?= $ligne['id_exppro'] ?>" ></input></form>
                        <br/> <?php print_r($ligne); ?>

                    <?php } ?>
            </div>
            <div>
                <hr/><br/>

                <form  name="ajoutexp" action="addexp.php" method="post"><button type="submit">Ajouter une expérience</button></form>
                <br/>
                
            </div>
            <?php include_once "includes/footer.php";?>
        </body>
</html>
