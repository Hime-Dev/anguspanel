<?php $talepler = $database->query("SELECT * FROM donen_talepler WHERE onay = '0'"); ?>

<div class="ayrilik-table">
	<div class="table-head">
		<div class="table-col">Üye</div>
		<div class="table-col">Mesaj</div>
		<div class="table-col">Ayrılık Tarihi</div>
		<div class="table-col">Talep Tarihi</div>
		<div class="table-buttons">
			<span></span><span></span>
		</div>
	</div>

	<?php
		while ($talep = $talepler->fetch_assoc()) {
			$uyeID = $talep['user_id'];
			$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
			$uye = $uye->fetch_assoc();
	?>
		<div class="table-row">
			<div class="table-col"><?php echo $uye['user']?></div>
			<div class="table-col"><?php echo $talep['talep'] ?></div>
			<div class="table-col"><?php echo gecen_sure($uye['ayrilik']) ?></div>
			<div class="table-col"><?php echo gecen_sure($talep['tarih']) ?></div>
			<div class="table-buttons">
				<span onclick="donusOnayla(<?php echo $uye['id'] ?>)" id="ekip-onay-ac"><i class="fas fa-check"></i></span>
				<span onclick="donusOnayla(<?php echo $uye['id'] ?>)" id="ekip-ret-ac"><i class="fas fa-remove"></i></span>
			</div>
		</div>

	<?php } ?>

</div>

<div id="ekibe-al-popup" class="popup">
	<div class="popup-inner">
		<div class="popup-kapat" id="ekibe-al-kapat">
			<i class="fa-solid fa-xmark"></i>
		</div>
		<h3><span></span> İsimli Kullanıcıyı Ekibe Geri Almayı Onaylıyor Musunuz?</h3>
		<b>Geri Dönüş Mesajı: </b><span></span>
		<div class="user-ch_buttons">
			<span style="opacity: 0;" id="uyeID"></span>	
			<button id="ekibe-al-gonder" class="popup-button">
				Ekibe Al
			</button>
		</div>
	</div>
</div>


<div id="ekibe-almayi-reddet-popup" class="popup">
	<div class="popup-inner">
		<div class="popup-kapat" id="ekibe-almayi-reddet-kapat">
			<i class="fa-solid fa-xmark"></i>
		</div>
		<h3><span></span> İsimli Kullanıcının Ekibe Dönme Talebini Reddetmek Üzeresiniz. Bunu Yapmak İstediğinize Emin Misiniz?</h3>
		<b>Geri Dönüş Mesajı: </b><span></span>
		<div class="user-ch_buttons">
			<span style="opacity: 0;" id="uyeID"></span>	
			<button id="ekip-ret-gonder" class="popup-button">
				Talebi Reddet
			</button>
		</div>
	</div>
</div>