<?php 
session_start();
include_once "includes/functions.php";

if (!empty($_POST['user']) and !empty($_POST['pass'])) {
    $user = $_POST['user'];
    $pass= $_POST['pass'];
    $stmt1 = getDb()->prepare('select * from acces where nom_utilisateur=? and mot_de_passe=?');
    $stmt1->execute(array($user, $pass));
    $res = $stmt1->fetch();
    if ($stmt1->rowCount() == 1) {
        // Authentication successful
        
        if($res['valide'] == 0){
            $_SESSION['login'] = $user;
            redirect("index.php");
        }
        
    }
    else {
        $stmt2 = getDb()->prepare('select * from gestionnaire where login_gestionnaire=? and mdp_gestionnaire=?');
        $stmt2->execute(array($user, $pass));
        if ($stmt2->rowCount() == 1) {
            // Authentication successful
            $_SESSION['login'] = $user;
            redirect("index.php");
        }
        else{
            $error = "L'utilisateur ne semble pas exister.";
        }
    }
}
?>

<!doctype html>
<html>

<?php 
$pageTitle = "Connexion";
require_once "includes/head.php";
?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>

        <h2 class="text-center"><?= $pageTitle ?></h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger">
                <strong>Erreur !</strong> <?= $error ?>
            </div>
        <?php } ?>

        <div class="cadre">
            <form class="form-signin form-horizontal" role="form" action="login.php" method="post">
                <br/>
                <div class="d-flex justify-content-center">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input type="text" name="user" class="form-control" placeholder="Entrez votre adresse mail" required autofocus>
                    </div>
                </div>
                <br/>
                <div class="d-flex justify-content-center">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="pass" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <br/>
                <div class="d-flex justify-content-center">
                    <div>
                        <button type="submit" class="btn btn-default btn-primary "><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                    </div>
                </div>
                <br/>
            </form>
        </div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>

  
<?php
  function display_login_form($msg_error=""){
    //includes navbar et head pour améliorer avec du bootstrap
  ?>
      <h2>Connexion</h2>
        <form method="POST" action="login.php" >
          <div> 
              <label for="login">Identifiant : </label>
              <input type="text" size="20" name="login" td>
          </div>
          <div> 
                <label for="password"> Mot de passe : </label>
                <input type="password" size="20" name="mdp" /></td>
          </div>
          <input type="submit" value="Envoyer">
        </form>
<!--peut rajouter du php pour ajouter un footer-->
 <?php } ?>
