<body>
<div class="container">
<div class="row mb-5">
<nav class = "navbar navbar-expand">
<a class="navbar-brand" href="#">
    <img src="images/logo.png" href="index.php" width ="30" height="30">
</a>
    <ul class = "navbar-nav mr-auto">
    <li class="nav-item">
            <a class ="nav-link" href="index.php" title="Accueil" class="">Accueil</a></li>
        <li class="nav-item">
            <a class ="nav-link" href="promos.php" title="Nos chères promotions" class="">Promo</a></li>
        <li class="nav-item">
            <a class ="nav-link" href="searchpage.php" title="Recherche" class="">Recherche</a></li>
        <li class="nav-item">
        <?php if(is_gest_connected()){?>
            <li class="nav-item">
            <a class ="nav-link" href="gest.php" title="Gestionnaire" class="">Demandes</a></li>
            <a class ="nav-link" href="logout.php" title="Deconnexion" class="">Me déconnecter</a></li>
        <?php }
        else{
        if(isUserConnected()) { ?>
        <div class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bonjour !</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="profil.php">Voir mon profil</a>
            <a class="dropdown-item" href="mesexp.php">Voir mes expériences</a>
            <a class="dropdown-item" href="logout.php">Me déconnecter</a>
            
          </div>
        </div>

        <?php }else{?>
                <li class="nav-item">
                <a class ="nav-link" href="login.php" title="Se connecter" class="">Connexion</a></li>
                <li class="nav-item">
                <a class ="nav-link" href="inscription.php" title="Inscription" class="">Inscription</a></li>
        <?php } 
        }?>
    </ul>
</nav>
</div>
</div>

<!-- permet de faire le dropdown -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


</body>
