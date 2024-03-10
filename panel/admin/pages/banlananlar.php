<h3 class="sekmeBaslik">Banlananlar</h3>

<div class="banlananlar-table">
	<div class="banlananlar-head banlananlar-tr">
		<div class="banlananlar-item">
			Üye
		</div>
		<div class="banlananlar-item">
			Sebep
		</div>
		<div class="banlananlar-item">
			Banlayan
		</div>
		<div class="banlananlar-item">
			Tarih
		</div>
	</div>

	<?php 
    error_reporting(1);
		$banlananlar = $database->query("SELECT * FROM ban_sebepleri");
		while ($uye = $banlananlar->fetch_assoc()) {
			?>

			<div class="banlananlar-tr" id="user-<?php echo $uye['id']?>">
				<div class="banlananlar-item">
					<?php $banlanan = $database->query("SELECT * FROM uyeler WHERE id = '".$uye['user_id']."'")->fetch_assoc(); echo $banlanan['user']; ?>
				</div>
				<div class="banlananlar-item">
					<textarea <?php
					if ($uye['ban_sebebi'] == null OR $uye['$ban_sebebi'] == "") {
						echo "placeholder='Belirtilmemiş'";
					}?>><?php echo $uye['ban_sebebi'] ?></textarea>
				</div>
				<div class="banlananlar-item">
					<?php $banlayan = $database->query("SELECT * FROM uyeler WHERE id = '".$uye['banlayan']."'")->fetch_assoc(); echo $banlayan['user']; ?>
				</div>
				<div class="banlananlar-item">
					<?php gecen_sure($uye['banlanma_zamani']) ?>
				</div>
			</div>

			<?php
		}
	?>
</div>

<button id="banlananlar-guncelle">
	Tabloyu Güncelle
</button>