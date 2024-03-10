<?php 
		
	include '../../config.php';

	$uyeID = $_POST['id'];

	if($database->query("UPDATE donen_talepler SET onay = '1', onay_ret_sahibi = '$userDBID' WHERE user_id = '$uyeID'")) {

			$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'")->fetch_assoc();
			ekip_log($userDB['user']." \"".$uye['user']."\" Kullanıcısını Dönüş Talebini Geri Çevirdi");

		?><script>bildirim("Talep Geri Çevrildi")</script><?php
	} else {
		?><script>bildirim("Talep Değiştirilemedi")</script><?php
	}
	

?>