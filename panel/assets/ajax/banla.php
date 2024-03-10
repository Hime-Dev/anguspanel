<?php 
	include '../../config.php';

	$userID = $_POST['id'];
	$banlayan = $userDBID;

	$database->query("UPDATE uyeler SET status = 'banned' WHERE id = '$userID'");
	$database->query("INSERT INTO ban_sebepleri (user_id,banlayan) VALUES('$userID','$banlayan')");

	$banlanan = $database->query("SELECT * FROM uyeler WHERE id = '$userID'")->fetch_assoc();
	ekip_log($userDB['user'].", ".$banlanan['user']." nickli kişiyi banladı.");
	

?>