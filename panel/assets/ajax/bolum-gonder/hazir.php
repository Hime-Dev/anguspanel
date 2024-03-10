<?php 

	include '../../../config.php';

	$chID = $_POST['chapter'];
	$tarih = date("Y-m-d H:i:s");

	$ch =  $database->query("SELECT * FROM bolumler WHERE id = '$chID'");
	$ch = $ch->fetch_assoc();

	$seriID = $ch['manga_id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
	$seri = $seri->fetch_assoc();

	$mangaURL = url_cevir($seri['manga_name']);
	$chURL = "bolum-".$ch['bolum_no'];

	$tmp_dizin = "../../../chapters/typeset/".$mangaURL."/".$chURL."/tmp/";
	$dizin = "../../../chapters/typeset/".$mangaURL."/".$chURL;

	$ori_files = scandir($tmp_dizin);
	$tmp_files = scandir($tmp_dizin);

	foreach ($tmp_files as $i => $file) {
		if ($file =='.' || $file == '..') continue;
		rename($tmp_dizin.$file, $dizin."/".$file);
	}
	rmdir($tmp_dizin);

	if ($admin == false) {
		$st = "0";
	} else {
		$st = "1";
	}

	if($database->query("UPDATE bolumler SET hazir = '$st' WHERE id = '$chID'")) {
		echo "Bölüm Güncellendi!";		
	} else {
		echo "Bölüm Güncellenemedi!".$database->errno."<br>";
	}

	$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$chID'")->fetch_assoc();
	$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();
	ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." bölümünü hazır hale getirdi.");

?><script>window.location = "<?php echo $siteurl ?>admin/yukleme";</script>