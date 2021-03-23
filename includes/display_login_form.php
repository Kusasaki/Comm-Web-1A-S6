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
  }
