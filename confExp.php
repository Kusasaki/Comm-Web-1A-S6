<?php include_once "includes/head.php";
    include_once "includes/functions.php";
    session_start();?>

<html>
    <body>
    <?php include_once "includes/header.php"; ?>
	<div>
		<h3 class="soustitre">Votre expérience a été enregistrée !</h3>  

		<br/>
		<form  name="retour" action="mesexp.php" method="post" class="titre_page"><input class="ajouter" type="submit" value="Retour"></form><br/>      
    	
    </body>
<html>
<?php
include_once 'includes/footer.php';
?>