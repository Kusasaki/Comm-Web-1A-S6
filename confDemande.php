<?php 
session_start();
include_once "includes/head.php";
include_once "includes/functions.php";
?>

<html>
    <body>
    <?php include_once "includes/header.php"; ?>
	<div>
		<h1 class="titre_page">Bienvenue sur A La Recherche Du Patio Perdu !</h1>
		<h3 class="soustitre">Votre demande d'inscription a été enregistrée ! Vous devez maintenant attendre l'activation de votre compte par le gestionnaire !</h3>  

		<br/>
		<form  name="retour" action="index.php" method="post" class="titre_page"><input class="ajouter" type="submit" value="Retour à l'accueil"></form><br/>      
    	
    </body>
<html>
<?php
include_once 'includes/footer.php';
?>
