<?php 

	include '../../config.php';

	$dID = $_POST['id'];

	$duyuru = $database->query("SELECT * FROM duyurular WHERE id = '$dID'")->fetch_assoc();

	$database->query("DELETE FROM `duyurular` WHERE id = '$dID'"); 
	
	ekip_log($userDB['user']." \"".$duyuru['baslik']."\" Başlıklı Duyuruyu Sildi.");
?>

<script>bildirim("Duyuru Silindi");</script>