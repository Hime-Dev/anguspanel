<?php 
	include '../../config.php';
	if ($_POST['seri'] == "0") {
		$ceviriler = $database->query("SELECT * FROM bolumler WHERE ceviri = '0' ORDER BY id DESC");
		$cleanler = $database->query("SELECT * FROM bolumler WHERE clean = '0' ORDER BY id DESC");
		$typesetler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND clean = '1' AND typeset = '0' ORDER BY id DESC");
	} else {
		$seriID = $_POST['seri'];
		$ceviriler = $database->query("SELECT * FROM bolumler WHERE ceviri = '0' AND manga_id = '$seriID' ORDER BY id DESC");
		$cleanler = $database->query("SELECT * FROM bolumler WHERE clean = '0' AND manga_id = '$seriID' ORDER BY id DESC");
		$typesetler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND clean = '1' AND typeset = '0' AND manga_id = '$seriID' ORDER BY id DESC"); ?>
		<script>
			try{document.querySelector("#ceviriSekmeButon small em").innerHTML = "(<?php echo $ceviriler->num_rows ?>)";}catch(err){};
			try{document.querySelector("#cleanSekmeButon small em").innerHTML = "(<?php echo $cleanler->num_rows ?>)";}catch(err){};
			try{document.querySelector("#dizgiSekmeButon small em").innerHTML = "(<?php echo $typesetler->num_rows ?>)";}catch(err){};
		</script>
		<?php
	}

	?>

	<script>

<?php if ($ceviri_st > 0) {?>
	try{document.getElementById('ceviribolumleriSekmesi').innerHTML = "<?php
		$cevNonAv = 0;
		while ($bolum = $ceviriler->fetch_assoc()) {
			$seriID = $bolum['manga_id'];
			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
			$seri = $seri->fetch_assoc();
			if ($seri['availability'] == "1") {$cevNonAv++;
				continue;
			}
	?><div class='chapter-table <?php if($bolum['cevirmen'] != null) echo "alinanBolum" ?>'><?php if ($bolum['cevirmen'] != null) {
				$uyeID = $bolum['cevirmen'];
				$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
				$uye = $uye->fetch_assoc();
			?><div class='bolum-sahibi'><div class='bolum-sahibi_isim'><?php
			echo $uye['user'] ?> Çeviriyor</div></div><?php
		} ?><div class='manga-infos'><div class='manga-turler'><?php echo $seri['turler'] ?></div><div class='manga-cumleler'><?php echo $seri['cumleler'] ?> Cümle</div></div><div class='chapter-cover'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'' alt='Chapter Cover'></div><div class='chapter-info'><div class='chapter-manga'><?php echo $seri['manga_name'] ?></div><div class='chapter-no'>Bölüm <?php echo $bolum['bolum_no'] ?></div><span class='bolumal'>Bölümü Al</span></div></div></div><?php } ?>";}catch(err){};
<?php $cevNum =	$ceviriler->num_rows - $cevNonAv; ?>
	
		try{document.querySelector("#ceviriSekmeButon small em").innerHTML = "(<?php echo $cevNum?>)";}catch(err){};

<?php } if ($clean_st > 0) {?>
	try{document.getElementById('cleanbolumleriSekmesi').innerHTML = "<?php
		$cleNonAv = 0;
		while ($bolum = $cleanler->fetch_assoc()) {
			$seriID = $bolum['manga_id'];
			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
			$seri = $seri->fetch_assoc();
			if ($seri['availability'] == "1") {$cleNonAv++;continue;}
	?><div class='chapter-table <?php if($bolum['cleaner'] != null) echo "alinanBolum" ?>'><?php if ($bolum['cevirmen'] != null) {
				$uyeID = $bolum['cevirmen'];
				$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
				$uye = $uye->fetch_assoc();
			?><div class='bolum-sahibi'><div class='bolum-sahibi_isim'><?php
			echo $uye['user'] ?> Çeviriyor</div></div><?php
		} ?><div class='manga-infos'><div class='manga-turler'><?php echo $seri['turler'] ?></div><div class='manga-cumleler'><?php echo $seri['cumleler'] ?> Cümle</div></div><div class='chapter-cover'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'' alt='Chapter Cover'></div><div class='chapter-info'><div class='chapter-manga'><?php echo $seri['manga_name'] ?></div><div class='chapter-no'>Bölüm <?php echo $bolum['bolum_no'] ?></div><span class='bolumal'>Bölümü Al</span></div></div></div><?php } ?>";}catch(err){};
<?php $cleNum = $cleanler->num_rows - $cleNonAv; ?> 

		try{document.querySelector("#cleanSekmeButon small em").innerHTML = "(<?php echo $cleNum?>)";}catch(err){};

<?php } if ($typeset_st > 0) {?>
	try{document.getElementById('dizgibolumleriSekmesi').innerHTML = "<?php
		$typNonAv = 0;
		while ($bolum = $typesetler->fetch_assoc()) {
			$seriID = $bolum['manga_id'];
			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
			$seri = $seri->fetch_assoc();
			if ($seri['availability'] == "1") {$typNonAv++;continue;}
	?><div class='chapter-table <?php if($bolum['typesetter'] != null) echo "alinanBolum" ?>'><?php if ($bolum['cevirmen'] != null) {
				$uyeID = $bolum['cevirmen'];
				$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
				$uye = $uye->fetch_assoc();
			?><div class='bolum-sahibi'><div class='bolum-sahibi_isim'><?php
			echo $uye['user'] ?> Çeviriyor</div></div><?php
		} ?><div class='manga-infos'><div class='manga-turler'><?php echo $seri['turler'] ?></div><div class='manga-cumleler'><?php echo $seri['cumleler'] ?> Cümle</div></div><div class='chapter-cover'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'' alt='Chapter Cover'></div><div class='chapter-info'><div class='chapter-manga'><?php echo $seri['manga_name'] ?></div><div class='chapter-no'>Bölüm <?php echo $bolum['bolum_no'] ?></div><span class='bolumal'>Bölümü Al</span></div></div></div><?php } ?>";}catch(err){};
<?php $typNum = $typesetler->num_rows - $typNonAv;?>

		try{document.querySelector("#dizgiSekmeButon small em").innerHTML = "(<?php echo $typNum?>)";}catch(err){};

<?php } if ($kontrol_st > 0) {?>
	try{document.getElementById('kontrolbolumleriSekmesi').innerHTML = "<?php
		$kontNonAv = 0;
		while ($bolum = $kontroller->fetch_assoc()) {
			$seriID = $bolum['manga_id'];
			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
			$seri = $seri->fetch_assoc();
			if ($seri['availability'] == "1") {$kontNonAv++;continue;}
	?><div class='chapter-table <?php if($bolum['kontrolcu'] != null) echo "alinanBolum" ?>'><?php if ($bolum['kontrolcu'] != null) {
				$uyeID = $bolum['kontrolcu'];
				$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
				$uye = $uye->fetch_assoc();
			?><div class='bolum-sahibi'><div class='bolum-sahibi_isim'><?php
			echo $uye['user'] ?> Kontrol Ediyor</div></div><?php
		} ?><div class='manga-infos'><div class='manga-turler'><?php echo $seri['turler'] ?></div><div class='manga-cumleler'><?php echo $seri['cumleler'] ?> Cümle</div></div><div class='chapter-cover'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'' alt='Chapter Cover'></div><div class='chapter-info'><div class='chapter-manga'><?php echo $seri['manga_name'] ?></div><div class='chapter-no'>Bölüm <?php echo $bolum['bolum_no'] ?></div><span class='bolumal'>Bölümü Al</span></div></div></div><?php } ?>";}catch(err){};
<?php $kontNum = $kontroller->num_rows - $kontNonAv;?>

		try{document.querySelector("#kontrolSekmeButon small em").innerHTML = "(<?php echo $kontNum?>)";}catch(err){};

<?php } ?>
	</script>
	
