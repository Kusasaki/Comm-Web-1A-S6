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
		<h3 class="soustitre">Le site qui vous permet de retrouver les anciens de l'ENSC et une ambiance aussi chaleureuse que celle du patio</h3>        
    	</div><br/>
<!--Carousel d'image-->
	    <div id="carouselExampleIndicators" class="carousel slide divCarousel" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		  </ol>
		  <div class="carousel-inner divCarousel" >
		    <div class="carousel-item active">             
		      <img class="d-block w-100" src="images/carousel/patio.jpg" alt="First slide">
		      <div class="carousel-caption d-none d-md-block">
			  <h5>Un patio ensoleillé...</h5>
			</div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/carousel/diplomes.jpeg" alt="Second slide">
		      <div class="carousel-caption d-none d-md-block">
			  <h5>Des diplômés enthousiastes...</h5>
			</div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/carousel/patio2.jpg" alt="Third slide">
		      <div class="carousel-caption d-none d-md-block">
			  <h5>De la bonne humeur...</h5>
			</div>
		    </div>
		    <div class="carousel-item">
			<img class="d-block w-100" src="images/carousel/cognitique.jpg" alt="Third slide">
			<div class="carousel-caption d-none d-md-block text-body">
			  <h5>Et bien sûr de la cognitique !</h5>
			</div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
<!--fin du carousel-->
    </body>
<html>
<?php
include_once 'includes/footer.php';
?>
