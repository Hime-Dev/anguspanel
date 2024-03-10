<?php 

	include '../../../config.php';

	$note = $_POST['note'];
	$chID = $_POST['chapter'];
	$tarih = date("Y-m-d H:i:s");

	$ch =  $database->query("SELECT * FROM bolumler WHERE id = '$chID'");
	$ch = $ch->fetch_assoc();

	$seriID = $ch['manga_id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
	$seri = $seri->fetch_assoc();

	$mangaURL = url_cevir($seri['manga_name']);
	$chURL = "bolum-".$ch['bolum_no'];
	
	$dizin = "../../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no'];
	$tmp_folder = "../../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no']."/tmp";

	$tmp_files = scandir($tmp_folder);

	foreach ($tmp_files as $i => $file) {
		if ($file =='.' || $file == '..') continue;
		rename($tmp_folder."/".$file, $dizin."/".$file);
	}

	rmdir($tmp_folder);

	$role_st = $typeset_st;

	if ($role_st == "0") {
		$st = "0";
	} else if ($role_st == "1") {
		$st = "1";
	}


	if($database->query("UPDATE bolumler SET typeset = '$st', typeset_teslim = '$tarih', typesetter_note = '$note'  WHERE id = '$chID'")) {
		$tarih = date("Y-m-d H:i:s");
		
		$tl = $ch['fiyat'];

		$bakiye = $userDB['bakiye'] + $tl;
		if ($userDB['ucretli'] == "0") $bakiye = $userDB['bakiye'];
		else bakiye_log($userDB['user']. " bakiyesine ".$tl."TL eklendi, yeni bakiye: ".$bakiye);
		$database->query("UPDATE uyeler SET last_ch = '$tarih', bakiye = '$bakiye' WHERE id = '$userDBID'");

		$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$chID'")->fetch_assoc();
		$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();
		ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Dizgisini Gönderdi.");
		?><script>window.location = "<?php echo $siteurl ?>bolumler";</script><?php
	}
	else {
		echo "Bölüm Güncellenemedi!<br>";
	}
	
	


?>