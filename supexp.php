<?php
	include_once "includes/functions.php";
	$id = $_POST['id'];
	print_r($_POST);	

    $supexp  = getDb()->prepare('delete from experiencepro where id_exppro = ?');
    $supexp->execute(array($id));
    //redirect("mesexp.php");
?>


