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
    $info = get_info_from_eleve($nom, $prenom);
    $res = $info->fetchAll();

    $etat = get_id_etat($nom, $prenom);
    $id_etat = $etat->fetch();

    $dispo = is_available($id_etat['id_etat']); 
    $result = $dispo->fetchAll();?>
<html>
    <?php include_once "includes/header.php";?>
    <h2 class = "titre_page">Profil</h2>
    <div class="cadre">
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
                echo "Sexe : " .$ligne['sexe'];
                if ($li['sexe']==0){?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                  </svg><?php 
                  }
                  else {?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg> <?php
                  }
                ?> <br/> <?php
                echo "Date de naissance : " .$ligne['date_naissance'];
                echo "Téléphone : " .$ligne['telephone_eleve'];
                if ($li['telephone_eleve']==0){?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                  </svg><?php 
                  }
                  else {?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg> <?php
                  }
                ?> <br/> <?php
                
                echo "Adresse mail : " .$ligne['ad_mail'];
                if ($li['ad_mail']==0){?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                  </svg><?php 
                  }
                  else {?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg> <?php
                  }
                
                echo "Adresse : " .$ligne['ad_postale']." ".$ligne['code_postal']." ".$ligne['ville'];
                if ($li['ad_postale']==0){?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                  </svg><?php 
                  }
                  else {?>   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg> <?php
                  }
                
            }
        }
        ?><br/>
        <a href="mesexp.php">Mes expériences</a> 
        </div>
        <br/> 
        <form  name="x" action="inscription.php" method="post"><input class="ajouter" type="submit" value="Modifier mon profil"></form>
        <?php
 include_once "includes/footer.php"; ?>
</html>
