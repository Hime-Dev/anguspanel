<?php 

	$findCh = $database->query("SELECT * FROM bolumler WHERE id = '$id'");
	$ch = $findCh->fetch_assoc();
	$mangaID = $ch['manga_id'];

	$findManga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
	$manga = $findManga->fetch_assoc();

	$mangaURL = url_cevir($manga['manga_name']);
	$bolumURL = "bolum-".$ch['bolum_no'];
	
	$manga_folder = "../../../chapters/typeset/".$mangaURL;
	$chapter_folder = "../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no'];
	$tmp_folder = "../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no']."/tmp";


	$tmp_files = scandir($tmp_folder);
	foreach ($tmp_files as $i => $file) {
		if ($file =='.' || $file == '..')	continue;
		unlink($tmp_folder."/".$file);
	}

	if (!file_exists($tmp_folder)) {
		mkdir($tmp_folder);
	}

?>

<h3 class="sekmeBaslik">Bölüm <?php echo $ch['bolum_no'] ?></h3>

<h1>Typeset</h1>

<div class="bolum-top">
	<div class="links">
		<span class="white-box"><?php echo $seri['manga_name'] ?></span>
		<a href="<?php echo $siteurl ?>chapters/ceviri/<?php echo $mangaURL."/".$bolumURL.".txt" ?>" target="_blank" download class="bolum-link">
			Çeviriyi İndir
		</a>
		<span href="" class="bolum-link" id="download_pages">
			Sayfaları İndir
		</span>
		<a href="<?php echo $seri['ceviri_kaynak'] ?>" target="_blank" class="bolum-link">
			Kaynağa Git
		</a>
		<span class="bolum-link" id="bolumu-birak">Bölümü Bırak</span>
	</div>
	<div class="info">
		<i class="fa-solid fa-circle-info"></i>
		<p>
			Çeviriyi ve sayfaları indirdikten sonra photoshop üzerinde açın. Ardından "Kaynağa Git" butonu yardımıyla serinin çevirisinin yapıldığı ingilizce kaynağa yönlendirileceksiniz. Kaynak siteden bakarak dizginizi yapabilirsiniz. Dizgi işlemi bittikten sonra aşağıda yer alan yükleme bölümüne sayfalarınızı yükleyebilirsiniz. 
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
	<fieldset>
		<legend>Cleaner Notu</legend>
		<?php if ($bolum['cleaner_note'] != null) {
			echo $bolum['cleaner_note'];
		} else {
			echo "<span style='opacity: 0.5'>Not Bırakılmamış...</span>";
		} ?>
	</fieldset>

	<script>
	  Dropzone.options.typesetdr = {
	  		acceptedFiles: ".png,.jpg,.jpeg,.webp",
		  	dictDefaultMessage: "Bölüm Sayfalarını Yükle",
	  };
	</script>
	<form action="<?php echo $siteurl ?>assets/ajax/dropzone/typeset-yukle.php?ch=<?php echo $id ?>" class="dropzone" id="typesetdr"></form>

	<textarea placeholder="Buradan Kontrolcüye Not Bırakabilirsiniz" class="placeanote"></textarea>

	<div class="bolum-sayfasi_bot">
		<div id="typeset-gonder" class="bolum-gonder">
			Bölümü Gönder
		</div>		
	</div>

</div>
