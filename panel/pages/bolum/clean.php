<?php 

	$findCh = $database->query("SELECT * FROM bolumler WHERE id = '$id'");
	$ch = $findCh->fetch_assoc();
	$mangaID = $ch['manga_id'];

	$findManga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
	$manga = $findManga->fetch_assoc();

	$mangaURL = url_cevir($manga['manga_name']);
	$bolumURL = "bolum-".$ch['bolum_no'];

	$manga_folder = "../../../chapters/edit/".$mangaURL;
	$chapter_folder = "../../chapters/edit/".$mangaURL."/bolum-".$ch['bolum_no'];
	$tmp_folder = "../../chapters/edit/".$mangaURL."/bolum-".$ch['bolum_no']."/tmp";

	$tmp_files = scandir($tmp_folder);
	foreach ($tmp_files as $i => $file) {
		if ($file =='.' || $file == '..')	continue;
		unlink($tmp_folder."/".$file);
	}

	if (!file_exists($tmp_folder)) {
		mkdir($tmp_folder);
	}

?>

<h3 class="sekmeBaslik">Bölüm <?php echo $bolum['bolum_no'] ?></h3>

<h1>Clean</h1>

<div class="bolum-top">
	<div class="links">
		<span class="white-box"><?php echo $seri['manga_name'] ?></span>
		<a href="<?php echo $seri['clean_kaynak'] ?>" target="_blank" class="bolum-link">
			Serinin Kaynağına Git
		</a>
		<span class="bolum-link" id="bolumu-birak">Bölümü Bırak</span>
	</div>
	<div class="info">
		<i class="fa-solid fa-circle-info"></i>
		<p>
			Bölümü; mobil cihazlarda kaynak olarak verilen siteyi Tachiyomi uygulamasına ekleyerek veya kaynağa gidip tek tek farklı kaydederek, bilgisayarlarda HakuNeko uygulamasında kaynak olarak verilen siteyi kullanarak veya sitede boş bir alanda sağ tıklayıp farklı kaydederek indirebilirsiniz. Ardından temiz sayfaları aşağıda yer alan yükleme alanına bırakın.
		</p>
	</div>
</div>


<div style="box-sizing:border-box;padding:15px;">

	<fieldset>
		<legend>Çevirmen Notu</legend>
		<?php if ($bolum['cevirmen_note'] != null) {
			echo $bolum['cevirmen_note'];
		} else {
			echo "<span style='opacity: 0.5'>Not Bırakılmamış...</span>";
		} ?>
	</fieldset>

	<script>
	  Dropzone.options.uploadClean = {
		  	acceptedFiles: ".png,.jpg,.jpeg,.webp",
		  	dictDefaultMessage: "Bölüm Sayfalarını Yükle",
	  };
	</script>
	<form action="<?php echo $siteurl ?>assets/ajax/dropzone/clean-yukle.php?ch=<?php echo $id ?>" class="dropzone" id="uploadClean"></form>


	<textarea placeholder="Buradan Bölümün Çevirmenine, Dizgicisine ve Kontrolcünüze Not Bırakabilirsiniz" class="placeanote"></textarea>

	<div class="bolum-sayfasi_bot">
		<div id="clean-gonder" class="bolum-gonder">
			Bölümü Gönder
		</div>		
	</div>

</div>
