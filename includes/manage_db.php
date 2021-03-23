<?php
include_once "db_acces.php";

/* a créer : 
- afficher les info perso d'un éleve, 
- afficher les éleves d'une promo
- afficher les xp d'un élève
- afficher tous les atges déjà réalisé en fct d'un mpot clé
- afficher les stages déjà réalisé en fct d'un lieu
- 
*/

function get_user ($infos){
    $request = get_db() -> prepare("SELECT * FROM ACCES WHERE nom_utilisateur=:nom_utilisateur and mot_de_passe=:mot_de_passe");
		$request->bindValue("nom_utilisateur", $infos['login'], PDO::PARAM_STR);
		$request->bindValue("mot_de_passe", $infos['password'], PDO::PARAM_STR);
		$request->execute();
		return $request;
	}
