<?php include_once "includes/head.php"; 
    include_once "includes/header.php";
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    $info = get_info_from_eleve($nom, $prenom);
    $res = $info->fetchAll();

    $etat = get_id_etat($nom, $prenom);
    $id_etat = $etat->fetch();

    $dispo = is_available($id_etat['id_etat']); 
    $result = $dispo->fetchAll();?>

<html>
    <h2 class="titre_page"><?php echo "$prenom $nom"?></h2>
    <br/>
    <div class ="cadre">
    <?php 
        foreach ($result as $li)
        {
            foreach( $res as $ligne) 
            { 
                echo "Nom :". $ligne['nom_eleve']; 
                ?> <br/> <?php
                echo "Prenom : " .$ligne['prenom_eleve'];
                ?> <br/> <?php
                echo "Promotion : " .$ligne['annee'];
                ?> <br/> <?php
                if ($li['sexe']=0){
                echo "Sexe : " .$ligne['sexe'];
                }
                ?> <br/> <?php
                echo "Date de naissance : " .$ligne['date_naissance'];
                ?> <br/> <?php
                if ($li['telephone']=0){
                    echo "Téléphone : " .$ligne['telephone_eleve'];
                }
                ?> <br/> <?php
                if ($li['ad_mail']=0){
                echo "Adresse mail : " .$ligne['ad_mail'];
                }
                ?> <br/> <?php
                if ($li['ad_postale']=0){
                echo "Adresse : " .$ligne['ad_postale']." ".$ligne['code_postal']." ".$ligne['ville'];
                }
            } 
        }
        
?>


    </div>
</html>
<?php include_once "includes/footer.php"; ?>
