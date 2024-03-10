<?php 
	
	$seriID = $_GET['id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
	$seri = $seri->fetch_assoc();
	$name = $seri['manga_name'];


	$bolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' ORDER BY bolum_no + 0 DESC");

?>


<div class="content">
	<a href="<?php echo $siteurl ?>seri-listesi" class="geri-don"><i class="fa-solid fa-arrow-left"></i></a>
	<h3 class="sekmeBaslik bolumHead"><?php echo $name ?></h3>

	<div class="color-guide">
		<div class="dokunulmamis guide-div">Dokunulmamış</div>
		<div class="yapiliyor guide-div">Yapılıyor</div>
		<div class="hazir guide-div">Tamamlanmış</div>
	</div>


	<div class="bolumler">
	<?php while ($bolum = $bolumler->fetch_assoc()) { $bolumID = $bolum['id'] ?>

			<div class="bolum-kutusu">
			<?php if ($additional == "admin" OR $additional == "mod") { ?>
				<div class="bolumu-sil" onclick="bolumusil('<?php echo $bolum['id'] ?>')">
					<i class="fas fa-trash"></i>
				</div>
			<?php } ?>
			<div class="bolum-kutusu_head">
				Bölüm <?php echo $bolum['bolum_no'] ?>
			</div>
			<div class="bolum-kutusu_stat-list">
				<div class="bolum-kutusu_stat-list_div <?php echo ch_status($bolum['ceviri'],$bolum['cevirmen']) ?>">
					<span>
						<?php 
							if($bolum['cevirmen'] != null) {
								$mID = $bolum['cevirmen'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							} else {echo "Boşta";}
						?>
					</span>
					Çeviri
				</div>
				<div class="bolum-kutusu_stat-list_div <?php echo ch_status($bolum['clean'],$bolum['cleaner']) ?>">
					<span>
						<?php 
							if($bolum['cleaner'] != null) {
								$mID = $bolum['cleaner'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$memC = $mem->fetch_assoc();
								echo $memC['user'];
							} else {echo "Boşta";}
						?>
					</span>
					Clean
				</div>
				<div class="bolum-kutusu_stat-list_div <?php echo ch_status($bolum['redakte'],$bolum['redaktor']) ?>">
					<span>
						<?php 
							if($bolum['redaktor'] != null) {
								$mID = $bolum['redaktor'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$memC = $mem->fetch_assoc();
								echo $memC['user'];
							} else {echo "Boşta";}
						?>
					</span>
					Redaktör
				</div>
				<div class="bolum-kutusu_stat-list_div <?php echo ch_status($bolum['typeset'],$bolum['typesetter']) ?>">
					<span>
						<?php 
							if($bolum['typesetter'] != null) {
								$mID = $bolum['typesetter'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							} else {echo "Boşta";}
						?>
					</span>
					Dizgi
				</div>
				<div class="bolum-kutusu_stat-list_div <?php echo ch_status($bolum['kontrol'],$bolum['kontrolcu']) ?>">
					<span>
						<?php 
							if($bolum['kontrolcu'] != null) {
								$mID = $bolum['kontrolcu'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							} else {echo "Boşta";}
						?>
					</span>
					Kontrol
				</div>
			</div>
		</div>


		<?php
	} ?>
	</div>

</div>

