<?php 
	include '../../config.php';

	$id = $_POST['id'];
	$sebep = $_POST['sebep'];

	$database->query("UPDATE ban_sebepleri SET ban_sebebi = '$sebep' WHERE id = '$id'");

?>