<?php 
	include '../../config.php';
	
	$id = $_POST['id'];
	$en = $_POST['ingilizce'];
	$tr = $_POST['turkce'];
	$user = $_POST['user'];

	$tr = str_replace('"','&#34;',str_replace("'", "&#39;", $tr));
	$en = str_replace('"','&#34;',str_replace("'", "&#39;", $en));


	$k = $database->query("SELECT * FROM kavramlar WHERE id = '$id'")->fetch_assoc();
	ekip_log($userDB['user'].", ".$k['ingilizce']."=>".$k['turkce']." kavramını ".$en."=>".$tr." olarak güncelledi.");

	$database->query("UPDATE kavramlar SET ekleyen = '$user', ingilizce = '$en', turkce = '$tr' WHERE id = '$id'");


?>