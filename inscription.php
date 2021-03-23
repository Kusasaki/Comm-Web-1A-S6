<html>
    <body>
        <form method="POST" action="inscription.php">

        	<h3>Informations Personnelles</h3>

	        <p><input type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="10" /></p>

	        <p><input type="text" name="prenom" id="prenom" placeholder="Prénom" size="30" maxlength="10" /></p>

	        <p><input type="text" name="dateNaissance" id="da" placeholder="AAAA-MM-JJ" size="30" maxlength="10" /></p>
	        <label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
			</label>

	        <p><input type="text" name="promotion" id="promo" placeholder="AAAA" size="30" maxlength="10" /></p>

	        <p>
	        <select name="genre" id="genre">
			<option value="M">Masculin</option>
			<option value="F">Féminin</option>
			<option value="A">Autre</option>
			</select>
			<label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
			</p>

			<p><input type="text" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="10" /></p>
			<p><input type="text" name="mdpbis" id="mdpbis" placeholder="Confirmez le mot de passe" size="30" maxlength="10" /></p>

			<h3>Contact</h3>

			<p><input type="text" name="tel" id="tel" placeholder="N° de téléphone" size="30" maxlength="10" /></p>
			<label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
			</label>

			<p><input type="text" name="mail" id="mail" placeholder="Adresse mail" size="30" maxlength="10" /></p>
			<label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
			</label>

			<h3>Adresse</h3>

			<label for="poste">Adresse postale : </label><br/>
			<p><input type="text" name="poste" id="poste" placeholder="N°, rue" size="30" maxlength="10" /></p>
			<p><input type="text" name="poste" id="poste" placeholder="Code postal" size="30" maxlength="10" /></p>
			<p><input type="text" name="mail" id="poste" placeholder="Nom de la ville" size="30" maxlength="10" /></p>

			<label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
			</label>

			<form>
  			<input type="button" value="Retour" onclick="history.go(-1)">
			</form>
			<form name="valider" action="inscription.php" method="post">
			<input type="submit" value="Valider">
			</form>
        </form>
    </body>
<html>
