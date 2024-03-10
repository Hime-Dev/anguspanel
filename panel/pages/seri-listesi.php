<?php if ($additional == "admin" OR $additional == "mod") { ?>
	<div style="display: flex;justify-content: flex-end;align-items: center;">
		<div id="oge-ekle-button">
			<div><span></span><span></span></div>
			 Seri Ekle
		</div>
	</div>	
	<div id="oge-ekle-box">
		<form action="" method="post" id="seri_form">
			<div class="seri-ekle-top">
				<div class="seri-ekle-cover">
					<img src="<?php echo $siteurl ?>assets/img/upload-icon.png" alt="Profil Resmi"> 
					<input type="file" name="seri-ekle-photo" id="seri_ekle_photo">
				</div>
				<div class="seri-ekle-top-right">
					<div class="seri-ekle-top-right-name">
						<input type="text" name="seri-ekle-name" placeholder="Seri İsmi">
					</div>
					<div class="seri-ekle-top-right-sentences">
						<input type="number" name="seri-ekle-min" placeholder="Minimum Cümle">
						<input type="number" name="seri-ekle-max" placeholder="Maksimum Cümle">
					</div>
					<div class="seri-ekle-top-right-categories">
						<input type="text" name="seri-ekle-categories" placeholder="Türler">
						<input type="text" name="seri-ekle-ceviri" placeholder="Çeviri Kaynak">
						<input type="text" name="seri-ekle-clean" placeholder="Clean Kaynak">
					</div>
					<select name="seri-ekle-type" id="seri-ekle-type">
						<option value="1">Herkese Açık</option>
						<option value="2">Kişiye Özel</option>
					</select>

					<div id="seri-ekle-roles">
						<select name="seri-ekle-cevirmen" required>
							<option disabled selected value="0">Çevirmen Seçin</option>
							<?php 
								$uyeler = $database->query("SELECT * FROM `uyeler` WHERE ceviri_st = 1");
								while ($uye = $uyeler->fetch_assoc()) {
									if ($uye['status'] == "left" OR $uye['status'] == "banned")
										continue;
							?>
								<option value="<?php echo $uye['id'] ?>"><?php echo $uye['user'] ?></option>
							<?php } ?>
						</select>
						<select name="seri-ekle-cleaner" required>
							<option disabled selected value="0">Cleaner Seçin</option>
							<?php 
								$uyeler = $database->query("SELECT * FROM `uyeler` WHERE clean_st = 1");
								while ($uye = $uyeler->fetch_assoc()) {
									if ($uye['status'] == "left" OR $uye['status'] == "banned")
										continue;
							?>
								<option value="<?php echo $uye['id'] ?>"><?php echo $uye['user'] ?></option>
							<?php } ?>
						</select>
						<select name="seri-ekle-typesetter" required>
							<option disabled selected value="0">Dizgici Seçin</option>
							<?php 
								$uyeler = $database->query("SELECT * FROM `uyeler` WHERE typeset_st = 1");
								while ($uye = $uyeler->fetch_assoc()) {
									if ($uye['status'] == "left" OR $uye['status'] == "banned")
										continue;
							?>
								<option value="<?php echo $uye['id'] ?>"><?php echo $uye['user'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div style="text-align: right;"><button id="seriyi-gonder">Seri Ekle</button></div>
				</div>
			</div>	
		</form>
	</div>
<?php } ?>

<div class="content">

	<?php 
		$seriler = $database->query("SELECT * FROM seriler WHERE availability = '0' ORDER BY id DESC");
	?>

	<h3 class="sekmeBaslik">Herkese Açık Seriler</h3>
	<div class="sekme public-seriler">

		<?php while ($seri = $seriler->fetch_assoc()) { $seriID = $seri['id']?>

		<div class="public-seri">
			<div class="public-seri_name"><?php echo $seri['manga_name'] ?></div>
			<?php if ($additional == "admin" OR $additional == "mod") { ?>
				<div class="bolumu-sil" onclick="seriyisil('<?php echo $seri['id'] ?>')">
					<i class="fas fa-trash"></i>
				</div>
			<?php } ?>
			<div class="public-seri_top">
				<div class="public-seri_cover">
					<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
					<a href="bolum-durumu/<?php echo $seri['id'] ?>" class="public-seri_magnifying">
						<i class="fa-solid fa-magnifying-glass"></i>
					</a>
				</div>
				<div class="public-seri_top-right">
					<div class="public-seri_top-right_top">
						<div class="public-seri_top_right_top_div">
							<?php echo $seri['turler'] ?>
						</div>
						<div class="public-seri_top_right_top_div">
							<?php echo $seri['cumleler'] ?>
						</div>
					</div>
					<div class="public-seri_top-right_bot">
						<div class="public-seri_top-right_bot_div">
							<span>Toplam Bölüm:</span>
							<span>
								<?php 
									$tumbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID'");
									echo $tumbolumler->num_rows;
								?>								
							</span>
						</div>
						<div class="public-seri_top-right_bot_div">
							<span>Hazır Bölüm:</span>
							<span>
								<?php
									$hazirbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '1'");
									$yuklenebilirbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '2'");
									$toplambolumler = $hazirbolumler->num_rows + $yuklenebilirbolumler->num_rows;
									echo $toplambolumler;
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="public-seri_bot">
				<div class="public-seri_bot_div">
					<span>Eksik Çeviri:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND ceviri = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Clean:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND clean = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Redakte:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND redakte = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Dizgi:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Kontrol:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND kontrol = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
			</div>
		</div>

	<?php } ?>


	</div>


	<?php 
		$seriler = $database->query("SELECT * FROM seriler WHERE availability = '1' ORDER BY id DESC");
	?>
	<h3 class="sekmeBaslik">Kişiye Özel Seriler</h3>
	<div class="sekme special-seriler">
		<?php while ($seri = $seriler->fetch_assoc()) { $seriID = $seri['id'] ?>

		<div class="special-seri">
			<div class="special-seri_name">
			<?php echo $seri['manga_name'] ?></div><?php if ($additional == "admin" OR $additional == "mod") { ?>
				<div class="bolumu-sil" onclick="seriyisil('<?php echo $seri['id'] ?>')">
					<i class="fas fa-trash"></i>
				</div>
			<?php } ?>
			<div class="special-seri_top">
				<div class="special-seri_cover">
					<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
					<a href="bolum-durumu/<?php echo $seri['id'] ?>" class="special-seri_magnifying">
						<i class="fa-solid fa-magnifying-glass"></i>
					</a>
				</div>
				<div class="special-seri_top-right">
					<div class="special-seri_top-right_top">
						<div class="special-seri_top_right_top_div">
							<?php echo $seri['turler'] ?>
						</div>
						<div class="special-seri_top_right_top_div">
							<?php echo $seri['cumleler'] ?>
						</div>
					</div>
					<div class="special-seri_top-right_bot">
						<div class="special-seri_top-right_bot_div">
							<span>Toplam Bölüm:</span>
							<span>
								<?php 
									$tumbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID'");
									echo $tumbolumler->num_rows;
								?>		
							</span>
						</div>
						<div class="special-seri_top-right_bot_div">
							<span>Hazır Bölüm:</span>
							<span>
								<?php
									$hazirbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '1'");
									$yuklenebilirbolumler = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '2'");
									$toplambolumler = $hazirbolumler->num_rows + $yuklenebilirbolumler->num_rows;
									echo $toplambolumler;
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="special-seri_bot">
				<div class="special-seri_bot_div">
					<span>Eksik Çeviri:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND ceviri = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="special-seri_bot_div">
					<span>Eksik Clean:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND clean = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Redakte:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND redakte = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="special-seri_bot_div">
					<span>Eksik Dizgi:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND typeset = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
				<div class="public-seri_bot_div">
					<span>Eksik Kontrol:</span>
					<span>
						<?php
							$eksik = $database->query("SELECT * FROM bolumler WHERE manga_id = '$seriID' AND kontrol = '0'");

							echo $eksik->num_rows;
						?>
					</span>
				</div>
			</div>
			<div class="special-seri_card">
				<div class="special-seri_bot">
					<div class="special-seri_bot_div">
						<span>Çevirmen:</span>
						<span>
							<?php 
								$mID = $seri['cevirmen'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							?>
						</span>
					</div>
					<div class="special-seri_bot_div">
						<span>Cleaner:</span>
						<span>
							<?php 
								$mID = $seri['cleaner'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							?>
						</span>
					</div>
					<div class="special-seri_bot_div">
						<span>Dizgici:</span>
						<span>
							<?php 
								$mID = $seri['typesetter'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							?>
						</span>
					</div>
					<div class="special-seri_bot_div">
						<span>Kontrolcü:</span>
						<span>
							<?php 
								$mID = $seri['kontrolcu'];
								$mem = $database->query("SELECT * FROM uyeler WHERE id = '$mID'");
								$mem = $mem->fetch_assoc();
								echo $mem['user'];
							?>
						</span>
					</div>
				</div>
			</div>
		</div>
		

	<?php } ?>
	</div>
</div>