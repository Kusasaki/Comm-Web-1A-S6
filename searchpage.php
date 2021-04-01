<?php session_start();
    include_once "includes/head.php";
    include_once "includes/head.php";
    include_once "includes/header.php"; 
    ?>
    <h2 class="titre_page">Recherche</h2>
    </br>
    
    <?php
    if(isUserConnected()){?>
        <form method="POST" action="searchpage.php" role="form">
        <fieldset class="cadre">
        <br/>
        <div class="btn-group ">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recherche d'une promotion
            </button>
            <div class="dropdown-menu dropdown-menu-right ">
<!-- faire une sorte de foreach ligne in column ... affiche titre et return qqch-->
            <?php 
                $table="promotion";
                $attribut="annee";
                $promo = get_list_attribut($table, $attribut);
                $res = $promo->fetchAll();
                foreach ($res as $ligne){
                    $info = $ligne['annee'];
                    ?>
                    <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recherche d'un ancien par son nom
            </button>

            <div class="dropdown-menu dropdown-menu-right">
            <?php 
                $table="eleve";
                $attribut="nom_eleve";
                $promo = get_list_attribut($table, $attribut);
                $res1 = $promo->fetchAll();
                foreach ($res1 as $ligne){
                    $info = $ligne['nom_eleve'];
                    ?>
                        <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        </div>
        <br/><br/>
        
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Type d'expérience
            </button>

            <div class="dropdown-menu dropdown-menu-right">
            <?php 
                $table="experiencepro";
                $attribut="type_exp";
                $promo = get_list_attribut($table, $attribut);
                $res = $promo->fetchAll();
                foreach ($res as $ligne){
                    $info = $ligne['type_exp'];
                    ?>
                    <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Secteur d'activité
            </button>

            <div class="dropdown-menu dropdown-menu-right">
            <?php 
                $table="organisation";
                $attribut="secteur_activite";
                $promo = get_list_attribut($table, $attribut);
                $res = $promo->fetchAll();
                foreach ($res as $ligne){
                    $info = $ligne['secteur_activite'];
                    ?>
                    <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        </div>
        <br/><br/>
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recherche organisation par nom
            </button>
            <div class="dropdown-menu dropdown-menu-right">
            <?php 
                $table="organisation";
                $attribut="nom_organisation";
                $promo = get_list_attribut($table, $attribut);
                $res = $promo->fetchAll();
                foreach ($res as $ligne){
                    $info = $ligne['nom_organisation'];
                    ?>
                    <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recherche d'une organisation par lieu
            </button>
            <div class="dropdown-menu dropdown-menu-right">
            <?php 
                $table="organisation";
                $attribut="ville_organisation";
                $promo = get_list_attribut($table, $attribut);
                $res = $promo->fetchAll();
                foreach ($res as $ligne){
                    $info = $ligne['ville_organisation'];
                    ?>
                    <a class="dropdown-item" type="button" href="resultresearch.php?table=<?php echo "$table"?>&attribut=<?php echo "$attribut"?>&valeur=<?php echo "$info"?>"><?php echo "$info"?></a>
                    <?php
                } ?>
            </div>
        <br/><br/>
        </div>
</fieldset>
</form>
    <?php
    }
    else {
        ?>
        <h4 class="titre_rubrique">Désolé, il semble que vous n'êtes pas connecté.e,<br/>Vous ne pouvez donc pas accéder à la page de recherche</h4>
        <br/>
        <div class="titre_rubrique">Veuillez vous <a href="login.php">connecter</a> ou vous <a href="inscription.php">inscrire</a> !</div>
        <?php
    }
    ?>
