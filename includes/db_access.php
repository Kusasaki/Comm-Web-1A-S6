<?php
	function get_db(){
        try{
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
	}
?>