<?php 
	
	include '../../config.php';

	$uyeID = $_POST['id'];

	if($database->query("UPDATE uyeler SET status = null WHERE id = '$uyeID'")) {
		if($database->query("DELETE FROM donen_talepler WHERE user_id = '$uyeID'")) {

			$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'")->fetch_assoc();
			ekip_log($userDB['user']." \"".$uye['user']."\" Kullanıcısını Ekibe Geri Aldı");

			?><script>bildirim("Ekibe Alındı")</script><?php
		} else {
			?><script>bildirim("Talep Değiştirilemedi")</script><?php
		}
	}
	else {
		?><script>bildirim("Üye Güncellenemedi")</script><?php
	}

?>