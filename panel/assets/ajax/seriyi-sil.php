<?php 

	include '../../config.php';
	
	$seriID = $_POST['id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
	$seri = $seri->fetch_assoc();

	$seriName = $seri['manga_name'];
	$seriURL = url_cevir($seriName);

	$ceviriURL = "../../chapters/ceviri/".$seriURL;
	$editURL = "../../chapters/edit/".$seriURL;
	$hazirURL = "../../chapters/hazir/".$seriURL;
	$typesetURL = "../../chapters/typeset/".$seriURL;
	$zipURL = "../../zip-files/".$seriURL;

	$ceviri_dir = scandir($ceviriURL);
	$edit_dir = scandir($editURL);
	$hazir_dir = scandir($hazirURL);
	$typeset_dir = scandir($typesetURL);
	$zip_dir = scandir($zipURL);


	//Çeviri Klasörü Temizle
	foreach ($ceviri_dir as $i => $ceviri) {
		if ($ceviri =='.' || $ceviri == '..') continue;
		unlink($ceviriURL."/".$ceviri);	
	}
	rmdir($ceviriURL);


	//Zip Klasörü Temizle
	foreach ($zip_dir as $i => $zip) {
		if ($zip =='.' || $zip == '..') continue;
		unlink($zipURL."/".$zip);	
	}	
	rmdir($zipURL);


	//Typeset Klasörü Temizle
	foreach ($typeset_dir as $i => $typeset) {
		$bolumURL = $typesetURL."/".$typeset;
		$bolum_dir = scandir($bolumURL);
		foreach($bolum_dir as $i => $bolum) {
			if($bolum =='.' || $bolum == '..') continue;

			$dizinURL = $bolumURL."/".$bolum;
			if($dizin_dir = scandir($dizinURL)) {
				foreach ($dizin_dir as $i => $dizin) {
					if ($dizin =='.' || $dizin == '..') continue;
					unlink($dizinURL."/".$dizin);	
				}	
				rmdir($dizinURL);
			}

			unlink($bolumURL."/".$bolum);

		}
		rmdir($bolumURL);
	}
	rmdir($typesetURL);


	//Edit Klasörü Temizle
	foreach ($edit_dir as $i => $edit) {
		$bolumURL = $editURL."/".$edit;
		$bolum_dir = scandir($bolumURL);
		foreach($bolum_dir as $i => $bolum) {
			if($bolum =='.' || $bolum == '..') continue;

			$dizinURL = $bolumURL."/".$bolum;
			if($dizin_dir = scandir($dizinURL)) {
				foreach ($dizin_dir as $i => $dizin) {
					if ($dizin =='.' || $dizin == '..') continue;
					unlink($dizinURL."/".$dizin);	
				}	
				rmdir($dizinURL);
			}

			unlink($bolumURL."/".$bolum);

		}
		rmdir($bolumURL);
	}
	rmdir($editURL);

	//Hazır Klasörü Temizle
	foreach ($hazir_dir as $i => $hazir) {
		$bolumURL = $hazirURL."/".$hazir;
		$bolum_dir = scandir($bolumURL);
		foreach($bolum_dir as $i => $bolum) {
			if($bolum =='.' || $bolum == '..') continue;

			$dizinURL = $bolumURL."/".$bolum;
			if($dizin_dir = scandir($dizinURL)) {
				foreach ($dizin_dir as $i => $dizin) {
					if ($dizin =='.' || $dizin == '..') continue;
					unlink($dizinURL."/".$dizin);	
				}	
				rmdir($dizinURL);
			}

			unlink($bolumURL."/".$bolum);

		}
		rmdir($bolumURL);
	}
	rmdir($hazirURL);

	//Kapağı sil//
	unlink("../../covers/".$seriURL.".jpg");


	//Bölümleri Sil
	$bolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID'");
	while ($bolum = $bolumler->fetch_assoc()) {
		$bID = $bolum['id'];
		$database->query("DELETE FROM `bolumler` WHERE id = '$bID'"); 
	}

	ekip_log($userDB['user']." ".$seriName." Serisini Sildi.");

	//Seriyi Sil
	$database->query("DELETE FROM `seriler` WHERE id = '$seriID'");

?><script>bildirim("Seri Başarıyla Silindi")</script>

<?php 

/*


	$editURL = "../../chapters/edit/";

	$edit_dir = scandir($editURL);
		
	foreach ($edit_dir as $i => $edit) {
		$editURL = $editURL."/".$edit;
		$bolum_dir = scandir($bolumURL);
		foreach($bolum_dir as $i => $bolum) {
			if($bolum =='.' || $bolum == '..') continue;

			if($dizin_dir = scandir($bolumURL."/".$bolum)) {
				foreach ($dizin_dir as $i => $dizin) {
					if ($dizin =='.' || $dizin == '..') continue;
					unlink($dizinURL."/".$dizin);	
				}	
				rmdir($bolumURL."/".$bolum);
			}

			unlink($bolumURL."/".$bolum);
		}
		rmdir($bolumURL);
	}
	rmdir($editURL);
	*/
?>