<?php

// Connect to the database. Returns a PDO object
function getDb() {
    // Local deployment
    $server = "localhost";
    $username = "diane";
    $password = "ensc";
    $db = "kaonashi";
    
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
        return $bdd;
    }*/
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
