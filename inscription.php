<html>
    <body>
        <form method="POST" action="inscription.php">
        	<h3>informations Personnelles</h3>

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

	        <p><input type="submit" value="Valider"/></p>
        </form>
    </body>
<html>
