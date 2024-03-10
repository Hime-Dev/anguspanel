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

	$tmp_dizin = "../../../chapters/edit/".$mangaURL."/".$chURL."/tmp/";
	$dizin = "../../../chapters/edit/".$mangaURL."/".$chURL;

	$tmp_files = scandir($tmp_dizin);

	foreach ($tmp_files as $i => $file) {
		if ($file =='.' || $file == '..') continue;
		rename($tmp_dizin.$file, $dizin."/".$file);
	}

	rmdir($tmp_dizin);

	$role_st = $clean_st;

	if ($role_st == "0") {
		$st = "0";
	} else if ($role_st == "1") {
		$st = "1";
	}

	if($database->query("UPDATE bolumler SET clean = '$st', cleaner_note = '$note' WHERE id = '$chID'")) {
		if($database->query("UPDATE bolumler SET clean_teslim = '$tarih' WHERE id = '$chID'")) {
			$tarih = date("Y-m-d H:i:s");

			$tl = $ch['fiyat'];

			$bakiye = $userDB['bakiye'] + $tl;
			if ($userDB['ucretli'] == "0") $bakiye = $userDB['bakiye'];
			else bakiye_log($userDB['user']. " bakiyesine ".$tl."TL eklendi, yeni bakiye: ".$bakiye);
			$database->query("UPDATE uyeler SET last_ch = '$tarih', bakiye = '$bakiye' WHERE id = '$userDBID'");
			echo "Bölüm Güncellendi!";
		}
		else {
			echo "Bölüm Güncellenemedi!".$database->errno."<br>";
		}
	}

	$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$chID'")->fetch_assoc();
	$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();
	ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Cleanini Gönderdi.");

?><script>window.location = "<?php echo $siteurl ?>bolumler";</script>