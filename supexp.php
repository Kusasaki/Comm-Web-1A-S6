<?php
	include_once "includes/functions.php";
	$id = $_GET['id'];

    $supexp  = getDb()->prepare('delete from experiencepro where id_exppro = ?');
    $supexp->execute(array($id));
    redirect("mesexp.php");
?>
