<h3 class="sekmeBaslik">Bölüm <?php echo $bolum['bolum_no'] ?></h3>

<h1>Kontrol</h1>

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
			Bütün bölümü baştan sona okuyun ve sağ üst bölümden hatalı kısımları Belirtin. 
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

	
	<?php include 'reader.php'; ?>


	<textarea placeholder="Ekstra gördüğünüz hata veya sorunları da buradan belirtebilirsiniz." class="placeanote"></textarea>

	<div class="bolum-sayfasi_bot">
		<div id="kontrol-gonder" class="bolum-gonder">
			Bölümü Gönder
		</div>		
	</div>

</div>
