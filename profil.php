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
    // affichage de profil avec modification du profil
    if (isset($_GET['update'])){
        
        $update = $_GET['update'];
        
    
            ?> 

        <form method="POST" action="changeprofil.php" role="form">

        	<fieldset class="titre_page"><legend>Informations Personnelles</legend>

	        <p><input type="text" name="dateNaissance" id="da" placeholder="AAAA-MM-JJ" size="30" maxlength="10" /></p>

	        <p><input type="text" name="promotion" id="promo" placeholder="AAAA" size="30" maxlength="10" /></p>

	        <p>
	        <select name="genre" id="genre">
			<option value="M">Masculin</option>
			<option value="F">Féminin</option>
			<option value="A">Autre</option>
			</select>
			<label class="switch" name="secuGenre">
			<input type="checkbox" name="secuGenre">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>
            </p>
            
            <hr/>
			<fieldset class="titre_page"><legend>Contact</legend>

			<p><input type="text" name="tel" id="tel" placeholder="N° de téléphone" size="30" maxlength="10" /></p>
			<label class="switch">
			<input type="checkbox" name="secuTel">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label>

			<p><input type="text" name="mail" id="mail" placeholder="Adresse mail" size="30" maxlength="10" /></p>
			<label class="switch" >
			<input type="checkbox" name="secuMail">
			<span class="slider round">Je veux que cette info reste privée</span>
			</label> </fieldset>

			<hr/>
			<fieldset class="titre_page"><legend>Adresse</legend>

			<label for="poste">Adresse postale : </label><br/>
			<p><input type="text" name="rue" id="rue" placeholder="N°, rue" size="30" maxlength="10" /></p>
			<p><input type="text" name="codeP" id="codeP" placeholder="Code postal" size="30" maxlength="10" /></p>
			<p><input type="text" name="ville" id="ville" placeholder="Nom de la ville" size="30" maxlength="10" /></p>

			<label class="switch" >
			<input type="checkbox" name="secuAd">
			<span class="slider round">Je veux que cette info reste privée</span>
            </label> </fieldset>
            
            <hr/>

    		<div class="d-flex justify-content-around">
            <input type="button" class="btn btn-default btn-primary" value="Retour" onclick="history.go(-1)">
            <input type="submit" class="btn btn-default btn-primary" value="Valider">
        </div>
            <br/><br/>
        </div>
        </form>

        <?php // traitement du formulaire : 

 
    }
    //affige normal de la page profil
    else{
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
                  ?> <br/> <?php
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
        <form  name="x" action="profil.php?update=true&nom=<?php echo "$nom"?>&prenom=<?php echo "$prenom"?>" method="post"><input style="display:block; margin:auto;" type="submit" value="Modifier mon profil"></form><br/>
        

    <?php } ?>
        
        
        <?php
 include_once "includes/footer.php"; ?>
</html>
