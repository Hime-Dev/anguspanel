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
	rmdir($tmp_folder);
?>

<h3 class="sekmeBaslik">Bölüm <?php echo $bolum['bolum_no'] ?></h3>

<h1>Son</h1>

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
			Hatalı sayfaları indirip düzeltin ve tekrar yükleyin.
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
	<fieldset>
		<legend>Dizgici Notu</legend>
		<?php if ($bolum['typesetter_note'] != null) {
			echo $bolum['typesetter_note'];
		} else {
			echo "<span style='opacity: 0.5'>Not Bırakılmamış...</span>";
		} ?>
	</fieldset>
	<fieldset>
		<legend>Kontrolcü Notu</legend>
		<?php if ($bolum['kontrolcu_note'] != null) {
			echo $bolum['kontrolcu_note'];
		} else {
			echo "<span style='opacity: 0.5'>Not Bırakılmamış...</span>";
		} ?>
	</fieldset>
	
	<?php include 'reader.php'; ?>

	<div class="bolum-sayfasi_bot">
		<div id="hazir-gonder" class="bolum-gonder">
			Bölümü Gönder
		</div>		
	</div>

</div>
