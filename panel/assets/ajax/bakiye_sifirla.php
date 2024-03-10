<?php 
	include '../../config.php';

	$id = $_POST['id'];
	$uye = $database->query("SELECT * FROM uyeler WHERE id = '$id'")->fetch_assoc();
	$uye = $uye['user'];

	if($database->query("UPDATE uyeler SET bakiye = '0' WHERE id = '$id'")) {
	    bakiye_log($userDB['user']. ", az önce ".$uye." kullanıcısının bakiyesini sıfırladı.");
		?><script>bildirim("Üyenin Bakiyesi Sıfırlandı")</script><?php
	}


?>