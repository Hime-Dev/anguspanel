<?php 

	

	include '../../config.php';



	$m = $_POST['m'];

	$c = $_POST['c'];

	$o = $_POST['o'];



	if ($m == "0" OR $c == null OR $o == null) {

		?><script>bildirim("Lütfen Tüm Alanları Doldurun")</script><?php

		die();

	}



	$check = $database->query("SELECT * FROM bolumler WHERE manga_id = '$m' AND bolum_no = '$c'");

	if ($check->num_rows>0) {

		?><script>bildirim("Bu Bölüm Zaten Mevcut")</script><?php

		die();

	}



	$seri = $database->query("SELECT * FROM seriler WHERE id = '$m'");

	$seri = $seri->fetch_assoc();



	if ($database->query("INSERT INTO bolumler (manga_id,bolum_no,oncelik) VALUES ('".$m."','".$c."','".$o."')")) {





		if($seri['availability'] == "1") {

			$ch = $database->query("SELECT * FROM bolumler WHERE manga_id = '$m' AND bolum_no = '$c'");

			$ch = $ch->fetch_assoc();

			$chID = $ch['id'];



			$cevirmen = $seri['cevirmen'];

			$cleaner = $seri['cleaner'];

			$typesetter = $seri['typesetter'];



			if($database->query("UPDATE bolumler SET cevirmen = '$cevirmen', cleaner = '$cleaner', typesetter = '$typesetter' WHERE id = '$chID'")) {}

			else {

				?><script>bildirim("Roller Kaydedilirken Hata Meydana Geldi")</script><?php

				die();

			}

		} 



		

		ekip_log($userDB['user']." ".$seri['manga_name']." ".$c." Bölümünü Ekledi.");



		?><script>bildirim("Bölüm Eklendi")</script><?php

	} else {

		?><script>bildirim("Bölüm Eklenirken Hata Meydana Geldi")</script><?php

	}







?>