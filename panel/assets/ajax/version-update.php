<?php 
	include '../../config.php';
	$newver = $_POST['sitever'];
	$newver = str_replace(",", ".", $newver);
	$database->query("UPDATE ayarlar SET ver = '$newver' WHERE id = '1'");

	ekip_log($userDB['user']." siteyi ".$_POST['sitever']." sürümüne taşıdı");
?>

<script>
	bildirim("Versiyon Güncellendi!");
</script>