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

// fonction permettantd de chercher dans la bd tous les élèves d'une promo
function get_student_by_promo($promo){
    /**
     * Return specified columns for all movies
     *
     * @param Array   $columns  columns to retrieve
     *
     * @throws PDOException If specified columns are not in table movie
     * @return Array $all_movies with all movies
     */
    $request = getDb() -> prepare("SELECT * FROM eleve WHERE annee=?");
    $request->execute(array($promo));
    return $request;
}

function get_info_from_eleve($nom, $prenom){
    /**
     * Return specified columns for all movies
     *
     * @param Array   $columns  columns to retrieve
     *
     * @throws PDOException If specified columns are not in table movie
     * @return Array $all_movies with all movies
     */
    $request = getDb() -> prepare("SELECT * FROM eleve WHERE nom_eleve=? AND prenom_eleve=?");
    $request->execute(array($nom,$prenom));
    return $request;
}
function get_id_etat($nom, $prenom){
    $request=getDB() -> prepare("SELECT id_etat FROM eleve WHERE nom_eleve=? AND prenom_eleve=?");
    $request->execute(array($nom, $prenom));
    return $request;
}
function is_available($id_etat){
    $request = getDB() -> prepare("SELECT * FROM etat WHERE id_etat=?");
    $request -> execute(array($id_etat));
    return $request;
}
