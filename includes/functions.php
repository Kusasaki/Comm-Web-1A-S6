<?php

// Connect to the database. Returns a PDO object
function getDb() {
    //Local deployment
    $server = "localhost";
    $username = "diane";
    $password = "ensc";
    $db = "kaonashi";
    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    /*try{
        $bdd = new PDO(
            "mysql:host=localhost;dbname=kaonashi;charset=utf8",
            "diane",
            "ensc",
            array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            die('Erreur fatale : ' . $e->getMessage());
        }
        return $bdd;*/

    /*try{
        $bdd = new PDO(
            "mysql:host=10.195.0.48;dbname=alarunru_anciens;charset=utf8",
            "alarunru_admin",
            "20kaonashi23",
            array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            die('Erreur fatale : ' . $e->getMessage());
        }
        return $bdd;*/
}

// Check if a user is connected
function isUserConnected() {
    return isset($_SESSION['login']);
}

// Redirect to a URL
function redirect($url) {
    header("Location: $url");
}

// Escape a value to prevent XSS attacks
function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

// fonction permettant de chercher dans la bd tous les élèves d'une promo
function get_student_by_promo($promo){
    $request = getDb() -> prepare("SELECT * FROM eleve WHERE annee=?");
    $request->execute(array($promo));
    return $request;
}
//fonction requete permettant d'accéder à toutes les informations d'un élève
function get_info_from_eleve($nom, $prenom){
    $request = getDb() -> prepare("SELECT * FROM eleve WHERE nom_eleve=? AND prenom_eleve=?");
    $request->execute(array($nom,$prenom));
    return $request;
}
//fonction requete permettant d'obtenir l'identifiant d'un état grâce au nom et au prénom d'un élève
function get_id_etat($nom, $prenom){
    $request=getDB() -> prepare("SELECT id_etat FROM eleve WHERE nom_eleve=? AND prenom_eleve=?");
    $request->execute(array($nom, $prenom));
    return $request;
}
//fonction requete qui permet d'accéder aux états des données d'un élève
function is_available($id_etat){
    $request = getDB() -> prepare("SELECT * FROM etat WHERE id_etat=?");
    $request -> execute(array($id_etat));
    return $request;
}
//fonction requete permettant d'accéder à une expérience
function get_xp($nom, $prenom){
    $request=getDB() -> prepare("SELECT * FROM experiencepro, eleve WHERE nom_eleve=? AND prenom_eleve=?
    AND eleve.id_eleve = experiencepro.id_eleve");
    $request -> execute(array($nom, $prenom));
    return $request;
}
//fonction requete permettant d'obtenir le nom et le prénom d'un utilisateur
function get_utilisateur($user){
    $request=getDB() -> prepare("SELECT nom_eleve, prenom_eleve FROM eleve, acces WHERE acces.id_eleve = eleve.id_eleve
    AND acces.nom_utilisateur=?");
    $request -> execute(array($user));
    return $request;
}
//fonction requete permettant d'accéder à une information
function get_organisation($id_organisation){
    $request=getDB() -> prepare("SELECT * FROM organisation WHERE id_organisation=?");
    $request -> execute(array($id_organisation));
    return $request;
}
