<?php
	include_once "includes/functions.php";
	$ids = $_GET['ids'];

    $supexp  = getDb()->prepare('delete from experiencepro where id_exppro = ?');
    $supexp->execute(array($ids));
    redirect("mesexp.php");
?>