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

                    foreach( $res as $ligne1) 
                    { ?> <div class="cadre"> <p class="titre_page">Expérience : </p> <?php
                        
                        echo "Type d'expérience : ". $ligne1['type_exp']; 
                        ?> <br/> <?php
                        echo "Brève description de l'expérience : ". $ligne1['description_exp']; 
                        ?> <br/> <?php
                        echo "Durée de l'expérience : ". $ligne1['date_debut']." - ".$ligne1['date_fin']; 
                        ?> <br/> <?php
                        echo "Salaire : ". $ligne1['salaire']; 
                        ?> <br/> <?php
                        if ($ligne1['etat'] == 0)echo "Etat : visible";
                        else echo "Etat : invisible";
                        
                    $id_organisation=$ligne1['id_organisation'];
                    $organisation = get_organisation($id_organisation);
                    $resu = $organisation->fetchAll();
                    foreach( $resu as $ligne2) 
                        { ?> <p class="titre_page">Organisation : </p> <?php
                            echo "Nom : ". $ligne2['nom_organisation']; 
                            ?> <br/> <?php
                            echo "Type d'organisation : ". $ligne2['type_organisation']; 
                            ?> <br/> <?php 
                            echo "Secteur d'activité : ". $ligne2['secteur_activite']; 
                            ?> <br/> <?php
                            echo "Adresse : ". $ligne2['ad_postale']." ".$ligne2['code_postal_organisation']." ".$ligne2['ville_organisation']; 
                            ?> <br/> <?php
                        }
                        ?>
                        </div><br/>

                        <form  name="modifierexp" action="modifierexp.php" method="post"><button type="submit">Modifier l'expérience</button><input type="hidden" name="id" value="<?= $ligne1['id_exppro'] ?>" ></input></form><br/>

                        <form  name="supexp" action="supexp.php" method="post"><button type="submit">Supprimer l'expérience</button><input type="hidden" name="id" value="<?= $ligne1['id_exppro'] ?>" ></input></form>
                        <br/> 

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
