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

	$tmp_file = "../../../chapters/ceviri/".$mangaURL."/tmp_bolum-".$ch['bolum_no'].".txt";
	$file = "../../../chapters/ceviri/".$mangaURL."/bolum-".$ch['bolum_no'].".txt";

	if(!file_exists($tmp_file)) {
		die("Txt Yüklenmemiş");
	}
	
	rename($tmp_file, $file);

	$kb = filesize($file)/1024;
	$tl = ucretlendirme($kb);

	$role_st = $ceviri_st;

	if ($role_st == "0") {
		$st = "0";
	} else if ($role_st == "1") {
		$st = "1";
	}

	if($database->query("UPDATE bolumler SET ceviri = '$st', cevirmen_note = '$note', fiyat = '$tl' WHERE id = '$chID'")) {
		if($database->query("UPDATE bolumler SET ceviri_teslim = '$tarih' WHERE id = '$chID'")) {
			$tarih = date("Y-m-d H:i:s");
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
	ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Çevirisini Gönderdi.");

?><script>window.location = "<?php echo $siteurl ?>bolumler";</script>