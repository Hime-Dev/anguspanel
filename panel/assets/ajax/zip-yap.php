<?php

	include '../../config.php';

	$chID = $_POST['id'];
	$page = $_POST['page'];
	
	$ch = $database->query("SELECT * FROM bolumler WHERE id = '$chID'");
	$ch = $ch->fetch_assoc();

	$seriID = $ch['manga_id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
	$seri = $seri->fetch_assoc();

	$mangaURL = url_cevir($seri['manga_name']);
	$chURL = "bolum-".$ch['bolum_no'];

	if ($page == 'Dizgi Kontrol') {
		$kaynak = "../../chapters/typeset/".$mangaURL."/".$chURL;
		$zip_dir = "../../zip-files/typeset-".$mangaURL."-".$chURL;
		$source_dir = "../../zip-files/".$mangaURL."/";
		$sourceZIP = "../../zip-files/".$mangaURL."/typeset-".$mangaURL."-".$chURL.".zip";
	} else if ($page == 'Yüklemeye Hazır') {
		$kaynak = "../../chapters/hazir/".$mangaURL."/".$chURL;
		$zip_dir = "../../zip-files/hazir-".$mangaURL."-".$chURL;
		$source_dir = "../../zip-files/".$mangaURL."/";
		$sourceZIP = "../../zip-files/".$mangaURL."/upload-".$mangaURL."-".$chURL.".zip";
	}
	else {
		$kaynak = "../../chapters/edit/".$mangaURL."/".$chURL;
		$zip_dir = "../../zip-files/cleaned-".$mangaURL."-".$chURL;
		$source_dir = "../../zip-files/".$mangaURL."/";
		$sourceZIP = "../../zip-files/".$mangaURL."/cleaned-".$mangaURL."-".$chURL.".zip";
	}

	mkdir($zip_dir);
	if(!file_exists($source_dir)) {
		mkdir($source_dir);
	}
	mkdir($zip_dir."/".$mangaURL."-".$chURL);

	$source_files = scandir($kaynak);
	foreach ($source_files as $i => $file) {
		if ($file =='.' || $file == '..') continue;
		copy($kaynak."/".$file, $zip_dir."/".$mangaURL."-".$chURL."/".$file);
	}
	Zip($zip_dir, $sourceZIP);

	

	if ($page != 'Yüklemeye Hazır') {
		$sourceZIP2 = $siteurl.substr($sourceZIP,6);

			?>
			<a href="<?php echo $sourceZIP2 ?>" download id="download_zip_file"></a>
			<script>
				setTimeout(function(){
					bildirim("İndirme Başlatılıyor.");
				    document.getElementById("download_zip_file").click();
				    var links = document.querySelector(".container .links");
				   	links.innerHTML = links.innerHTML + "<br><span class='white-box bolum-link' onclick='document.getElementById(\"download_zip_file\").click();'>Zip Hatalıysa Buraya Tıklayıp İndirmeye Devam Edin</span>";
				},5000);
			</script>
			<?php
		
	}

	else {
		?>
		<script>
			document.getElementById("hazir-getiriliyor").innerHTML = "Ziplendi, Yükleyebilirsiniz";
		</script>
		<?php
	}

	$source_files = scandir($zip_dir."/".$mangaURL."-".$chURL);
	foreach ($source_files as $i => $file) {
		if ($file =='.' || $file == '..') continue;
		unlink($zip_dir."/".$mangaURL."-".$chURL."/".$file);
	}

	rmdir($zip_dir."/".$mangaURL."-".$chURL);
	rmdir($zip_dir);

?>