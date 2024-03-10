<?php 

	include '../../config.php';

	$id = $_POST['id'];
	$value = $_POST['value'];

	$bolum =  $database->query("SELECT * FROM bolumler WHERE id = '$id'")->fetch_assoc();
	$seriID = $bolum['manga_id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'")->fetch_assoc();


	if ($value == "true") {
		if($database->query("UPDATE bolumler SET bolum_gizliligi = '1' WHERE id = '$id'")) {
			?>
			<script>
				bildirim("Bölüm Gizlendi");
			</script>
			<?php
			ekip_log($userDB['user']." Yükleme Panelinden ".$seri['manga_name']." ".$bolum['bolum_no']." Bölümünü Gizledi.");
		}
		else {
			?>
			<script>
				bildirim("Hata Oluştu");
			</script>
			<?php
		}
	}
	else {
		if($database->query("UPDATE bolumler SET bolum_gizliligi = '0' WHERE id = '$id'")) {
			?>
			<script>
				bildirim("Geri Alındı");
			</script>
			<?php
			ekip_log($userDB['user']." Yükleme Panelinde Gizli Olan ".$seri['manga_name']." ".$bolum['bolum_no']." Bölümünü Geri Getirdi.");
		}
		else {
			?>
			<script>
				bildirim("Hata Oluştu");
			</script>
			<?php
		}
	}
?>