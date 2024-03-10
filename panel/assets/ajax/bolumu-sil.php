<?php 

	include '../../config.php';

	$bID = $_POST['id'];

	$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bID'")->fetch_assoc();
	$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

	$seriName = $seri['manga_name'];
	$seriURL = url_cevir($seriName);

	$bolumURL = url_cevir("bolum-".$bolum_no);

	$ceviriURL = "../../chapters/ceviri/".$seriURL."/".$bolumURL;
	$editURL = "../../chapters/edit/".$seriURL."/".$bolumURL;
	$hazirURL = "../../chapters/hazir/".$seriURL."/".$bolumURL;
	$typesetURL = "../../chapters/typeset/".$seriURL."/".$bolumURL;
	$zipURL = "../../zip-files/".$seriURL."/".$bolumURL;

	$ceviri_dir = scandir($ceviriURL);
	$edit_dir = scandir($editURL);
	$hazir_dir = scandir($hazirURL);
	$typeset_dir = scandir($typesetURL);
	$zip_dir = scandir($zipURL);

	//BÖLÜMLERİ TEMİZLEME KISMI YAZILACAK

	ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Bölümünü Sildi.");

	$database->query("DELETE FROM `bolumler` WHERE id = '$bID'"); 

	

	
	

?>

<script>bildirim("Bölüm Silindi");</script>