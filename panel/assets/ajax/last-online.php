<?php 
	include '../../config.php';

	$id = $userDBID;
	$tarih = date("Y-m-d H:i:s");

	//Üye Var mı?
	$uye = $database->query("SELECT * FROM activity WHERE user_id = '$id'");
	if ($uye->num_rows == 0) {
		//Tabloya Ekle
		$database->query("INSERT INTO activity (user_id, date_time) VALUES ('".$id."','".$tarih."') ");
	}
	else {
		//Tabloyu Güncelle
		$database->query("UPDATE activity SET date_time = '$tarih' WHERE user_id = '$id'");
	}
?>