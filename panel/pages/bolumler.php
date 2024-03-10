<?php if ($additional == "admin" OR $additional == "mod") { ?>

	<div style="display: flex;justify-content: flex-end;align-items: center;">

		<div id="oge-ekle-button">

			<div><span></span><span></span></div>

			 Bölüm Ekle

		</div>

	</div>	

	<div id="oge-ekle-box">

		<div class="bolum-ekle-top">

			<select id="bolum-ekle-seri">

				<option value="0" disabled selected>Eklenecek Seriyi Seçin</option>

				<?php 

					$seriler = $database->query("SELECT * FROM seriler");

					while($seri = $seriler->fetch_assoc()) {

						?>

						<option value="<?php echo $seri['id'] ?>"><?php echo $seri['manga_name'] ?></option>

						<?php

					}

				?>

			</select>



			<input type="number" step="0.01" min="0" id="bolum-ekle-num" placeholder="Bölüm Numarası">

			<input type="text" maxlength="3" id="bolum-oncelik" placeholder="Bölüm Önceliği">



			<div style="text-align: right;"><button id="bolumu-gonder">Bölüm Ekle</button></div>

		</div>	

	</div>

<?php } ?>



<div class="content">

	<?php $seriler = $database->query("SELECT * FROM seriler ORDER BY id DESC")?>



	<div class="bolumler">

		<div class="filtreler">

			<!--<div class="seri-filtresi">

				<div class="filtre-baslik">Seri Filtresi:</div>

				<select id="serifiltresi">

					<option value="0">Tümü</option>

					<?php while ($seri = $seriler->fetch_assoc()) { 

						if ($seri['availability'] == "1") continue;?>

						<option value="<?php echo $seri['id'] ?>"><?php echo $seri['manga_name'] ?></option>

					<?php } ?>

				</select>

			</div>-->

			<div class="seri-filtresi gorev-filtreleri">

				<!---<div class="filtre-baslik">Ekstralar</div>-->

				<label><input type="checkbox" id="bolumlerigizle"><span>Dolu Bölümleri Gizle</span></label>

			</div>

		</div>



		<div id="bolum-kategorileri">



		<?php if ($ceviri_st > 0) { 

				$bolumler = $database->query("SELECT * FROM bolumler WHERE ceviri = '0' ORDER BY id DESC");

			?>

			<span id="ceviriSekmeButon" class="bolumleriayirmabutonu"><i class="fas fa-angle-right"></i>Çeviri Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>

			<div id="ceviribolumleriSekmesi" class="chapterlist" style="max-height: 1e+15%;">



				<?php

					$cevNonAv = 0;

					$i = 0;

					while ($bolum = $bolumler->fetch_assoc()) {

						$i++;

						$seriID = $bolum['manga_id'];

						$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

						$seri = $seri->fetch_assoc();

						if ($seri['availability'] == "1" AND $bolum['cevirmen'] != null) {$cevNonAv++;

							continue;

						}

				?>

					<div id="ch<?php echo $i ?>" class="chapter-table <?php if($bolum['cevirmen'] != null) echo "alinanBolum" ?>">

						<?php if ($bolum['cevirmen'] != null) {

							$uyeID = $bolum['cevirmen'];

							$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

							$uye = $uye->fetch_assoc();

						?>

							<div class="bolum-sahibi">

								<div class="bolum-sahibi_isim">

									<?php echo $uye['user'] ?> Çeviriyor

								</div>

							</div>

						<?php } ?>

						<div class="manga-infos">

							<div class="manga-turler">

								<?php echo $seri['turler'] ?>

							</div>

							<div class="manga-cumleler">

								<?php echo $seri['cumleler'] ?> Cümle

							</div>

						</div>	

						<div class="chapter-cover">

							<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="Chapter Cover">

						</div>

						<div class="chapter-info">

							<div class="chapter-manga"><?php echo $seri['manga_name'] ?></div>

							<div class="chapter-no">Bölüm <?php echo $bolum['bolum_no'] ?></div>

							<div style="display:flex;justify-content: space-between;align-items: center;position: absolute;bottom: 5px;padding-right: 15px;width: calc(100% - 30px);">
								<div style="
									background: white;
								    padding: 3px 7px;
								    border-radius: 5px;
								    box-shadow: 0 0 8px rgba(0,0,0,50%);
								    font-size: 13px;
								    font-family: 'Roboto';
								    letter-spacing: -0.4px;
								    color: black;
								">
									<?php echo $bolum['oncelik'] ?>
								</div>
								<span class="bolumal" onclick="bolum('<?php echo openssl_encrypt($bolum['id'], $sifreMethod, $sifreKey) ?>','ceviri','<?php echo $i ?>')">Bölümü Al</span>								
							</div>

						</div>

					</div>

				<?php } $cevNum = $bolumler->num_rows - $cevNonAv; ?>

				<script>try{document.querySelector("#ceviriSekmeButon small em").innerHTML = "(<?php echo $cevNum?>)";}catch(err){};</script>

			</div>



		<?php

			} if ($redakte_st > 0) { 

				$bolumler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND redakte = '0' AND typeset = '0' ORDER BY id DESC");

			?>

			<span id="redakteSekmeButon" class="bolumleriayirmabutonu"><i class="fas fa-angle-right"></i>Redakte Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>

			<div id="redaktebolumleriSekmesi" class="chapterlist" style="max-height: 1e+15%;">



				<?php

					$redNonAv = 0;

					$i = 0;

					while ($bolum = $bolumler->fetch_assoc()) {

						$i++;

						$seriID = $bolum['manga_id'];

						$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

						$seri = $seri->fetch_assoc();

						if ($seri['availability'] == "1" AND $bolum['redaktor'] != null) {$redNonAv++;

							continue;

						}

				?>

					<div id="ch<?php echo $i ?>" class="chapter-table <?php if($bolum['redaktor'] != null) echo "alinanBolum" ?>">

						<?php if ($bolum['redaktor'] != null) {

							$uyeID = $bolum['redaktor'];

							$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

							$uye = $uye->fetch_assoc();

						?>

							<div class="bolum-sahibi">

								<div class="bolum-sahibi_isim">

									<?php echo $uye['user'] ?> Kontrol ediyor.

								</div>

							</div>

						<?php } ?>

						<div class="manga-infos">

							<div class="manga-turler">

								<?php echo $seri['turler'] ?>

							</div>

							<div class="manga-cumleler">

								<?php echo $seri['cumleler'] ?> Cümle

							</div>

						</div>	

						<div class="chapter-cover">

							<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="Chapter Cover">

						</div>

						<div class="chapter-info">

							<div class="chapter-manga"><?php echo $seri['manga_name'] ?></div>

							<div class="chapter-no">Bölüm <?php echo $bolum['bolum_no'] ?></div>

							<div style="display:flex;justify-content: space-between;align-items: center;position: absolute;bottom: 5px;padding-right: 15px;width: calc(100% - 30px);">
								<div style="
									background: white;
								    padding: 3px 7px;
								    border-radius: 5px;
								    box-shadow: 0 0 8px rgba(0,0,0,50%);
								    font-size: 13px;
								    font-family: 'Roboto';
								    letter-spacing: -0.4px;
								    color: black;
								">
									<?php echo $bolum['oncelik'] ?>
								</div>
								<span class="bolumal" onclick="bolum('<?php echo openssl_encrypt($bolum['id'], $sifreMethod, $sifreKey) ?>','redakte','<?php echo $i ?>')">Bölümü Al</span>								
							</div>

						</div>

					</div>

				<?php } $redNum = $bolumler->num_rows - $redNonAv; ?>

				<script>try{document.querySelector("#redakteSekmeButon small em").innerHTML = "(<?php echo $redNum?>)";}catch(err){};</script>

			</div>



		<?php

			} if ($clean_st > 0) {

			$bolumler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND clean = '0' ORDER BY id DESC");

		?>



			<span id="cleanSekmeButon" class="bolumleriayirmabutonu"><i class="fas fa-angle-right"></i>Clean Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>

			<div id="cleanbolumleriSekmesi" class="chapterlist" style="max-height: 1e+15%;">



				<?php

					$cleNonAv = 0;

					$i = 0;

					while ($bolum = $bolumler->fetch_assoc()) {

						$i++;

						$seriID = $bolum['manga_id'];

						$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

						$seri = $seri->fetch_assoc();

						if ($seri['availability'] == "1" AND $bolum['cleaner'] != null) {$cleNonAv++;

							continue;

						}

				?>



					<div id="ch<?php echo $i ?>" class="chapter-table <?php if($bolum['cleaner'] != null) echo "alinanBolum" ?>">

						<?php if ($bolum['cleaner'] != null) {

							$uyeID = $bolum['cleaner'];

							$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

							$uye = $uye->fetch_assoc();

						?>

							<div class="bolum-sahibi">

								<div class="bolum-sahibi_isim">

									<?php echo $uye['user'] ?> Temizliyor

								</div>

							</div>

						<?php } ?>

						<div class="manga-infos">

							<div class="manga-turler">

								<?php echo $seri['turler'] ?>

							</div>

							<div class="manga-cumleler">

								<?php echo $seri['cumleler'] ?> Cümle

							</div>

						</div>	

						<div class="chapter-cover">

							<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="Chapter Cover">

						</div>

						<div class="chapter-info">

							<div class="chapter-manga"><?php echo $seri['manga_name'] ?></div>

							<div class="chapter-no">Bölüm <?php echo $bolum['bolum_no'] ?></div>

							<div style="display:flex;justify-content: space-between;align-items: center;position: absolute;bottom: 5px;padding-right: 15px;width: calc(100% - 30px);">
								<div style="
									background: white;
								    padding: 3px 7px;
								    border-radius: 5px;
								    box-shadow: 0 0 8px rgba(0,0,0,50%);
								    font-size: 13px;
								    font-family: 'Roboto';
								    letter-spacing: -0.4px;
								    color: black;
								">
									<?php echo $bolum['oncelik'] ?>
								</div>
								<span class="bolumal" onclick="bolum('<?php echo openssl_encrypt($bolum['id'], $sifreMethod, $sifreKey) ?>','clean','<?php echo $i ?>')">Bölümü Al</span>								
							</div>

						</div>

					</div>



				<?php } $cleNum = $bolumler->num_rows - $cleNonAv; ?>

				<script>try{document.querySelector("#cleanSekmeButon small em").innerHTML = "(<?php echo $cleNum?>)";}catch(err){};</script>

			</div>



		



		<?php

			} if ($typeset_st > 0) { 

			$bolumler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND clean = '1' AND typeset = '0' ORDER BY id DESC");

		?>



			<span id="dizgiSekmebuton" class="bolumleriayirmabutonu"><i class="fas fa-angle-right"></i>Dizgi Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>

			<div id="dizgibolumleriSekmesi" class="chapterlist" style="max-height: 1e+15%;">



				<?php

					$typNonAv = 0;

					$i = 0;

					while ($bolum = $bolumler->fetch_assoc()) {

						$i++;

						$seriID = $bolum['manga_id'];

						$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

						$seri = $seri->fetch_assoc();

						if ($seri['availability'] == "1" AND $bolum['typesetter'] != null) {$typNonAv++;

							continue;

						}

				?>



					<div id="ch<?php echo $i ?>" class="chapter-table <?php if($bolum['typesetter'] != null) echo "alinanBolum" ?>">

						<?php if ($bolum['typesetter'] != null) {

							$uyeID = $bolum['typesetter'];

							$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

							$uye = $uye->fetch_assoc();

						?>

							<div class="bolum-sahibi">

								<div class="bolum-sahibi_isim">

									<?php echo $uye['user'] ?> Dizgiliyor

								</div>

							</div>

						<?php } ?>

						<div class="manga-infos">

							<div class="manga-turler">

								<?php echo $seri['turler'] ?>

							</div>

							<div class="manga-cumleler">

								<?php echo $seri['cumleler'] ?> Cümle

							</div>

						</div>	

						<div class="chapter-cover">

							<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="Chapter Cover">

						</div>

						<div class="chapter-info">

							<div class="chapter-manga"><?php echo $seri['manga_name'] ?></div>

							<div class="chapter-no">Bölüm <?php echo $bolum['bolum_no'] ?></div>

							<div style="display:flex;justify-content: space-between;align-items: center;position: absolute;bottom: 5px;padding-right: 15px;width: calc(100% - 30px);">
								<div style="
									background: white;
								    padding: 3px 7px;
								    border-radius: 5px;
								    box-shadow: 0 0 8px rgba(0,0,0,50%);
								    font-size: 13px;
								    font-family: 'Roboto';
								    letter-spacing: -0.4px;
								    color: black;
								">
									<?php echo $bolum['oncelik'] ?>
								</div>
								<span class="bolumal" onclick="bolum('<?php echo openssl_encrypt($bolum['id'], $sifreMethod, $sifreKey) ?>','dizgi','<?php echo $i ?>')">Bölümü Al</span>								
							</div>

						</div>

					</div>



				<?php } $typNum = $bolumler->num_rows - $typNonAv; ?>

				<script>try{document.querySelector("#dizgiSekmebuton small em").innerHTML = "(<?php echo $typNum?>)";}catch(err){};</script>

			</div>



		<?php

			} if ($kontrol_st > 0) { 

			$bolumler = $database->query("SELECT * FROM bolumler WHERE ceviri = '1' AND clean = '1' AND typeset = '1' AND kontrol = '0' ORDER BY id DESC");

		?>



			<span id="kontrolSekmebuton" class="bolumleriayirmabutonu"><i class="fas fa-angle-right"></i>Kontrol Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>

			<div id="kontrolbolumleriSekmesi" class="chapterlist" style="max-height: 1e+15%;">



				<?php

					$kontNonAv = 0;

					$i = 0;

					while ($bolum = $bolumler->fetch_assoc()) {

						$i++;

						$seriID = $bolum['manga_id'];

						$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

						$seri = $seri->fetch_assoc();

						if ($seri['availability'] == "1" AND $bolum['kontrolcu'] != null) {$typNonAv++;

							continue;

						}

				?>



					<div id="ch<?php echo $i ?>" class="chapter-table <?php if($bolum['kontrolcu'] != null) echo "alinanBolum" ?>">

						<?php if ($bolum['kontrolcu'] != null) {

							$uyeID = $bolum['kontrolcu'];

							$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

							$uye = $uye->fetch_assoc();

						?>

							<div class="bolum-sahibi">

								<div class="bolum-sahibi_isim">

									<?php echo $uye['user'] ?> Kontrol Ediyor

								</div>

							</div>

						<?php } ?>

						<div class="manga-infos">

							<div class="manga-turler">

								<?php echo $seri['turler'] ?>

							</div>

							<div class="manga-cumleler">

								<?php echo $seri['cumleler'] ?> Cümle

							</div>

						</div>	

						<div class="chapter-cover">

							<img  class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="Chapter Cover">

						</div>

						<div class="chapter-info">

							<div class="chapter-manga"><?php echo $seri['manga_name'] ?></div>

							<div class="chapter-no">Bölüm <?php echo $bolum['bolum_no'] ?></div>

							<div style="display:flex;justify-content: space-between;align-items: center;position: absolute;bottom: 5px;padding-right: 15px;width: calc(100% - 30px);">
								<div style="
									background: white;
								    padding: 3px 7px;
								    border-radius: 5px;
								    box-shadow: 0 0 8px rgba(0,0,0,50%);
								    font-size: 13px;
								    font-family: 'Roboto';
								    letter-spacing: -0.4px;
								    color: black;
								">
									<?php echo $bolum['oncelik'] ?>
								</div>
								<span class="bolumal" onclick="bolum('<?php echo openssl_encrypt($bolum['id'], $sifreMethod, $sifreKey) ?>','kontrol','<?php echo $i ?>')">Bölümü Al</span>								
							</div>

						</div>

					</div>



				<?php } $kontNum = $bolumler->num_rows - $kontNonAv; ?>

				<script>try{document.querySelector("#kontrolSekmebuton small em").innerHTML = "(<?php echo $kontNum ?>)";}catch(err){};</script>

			</div>



		<?php } ?>



		</div>

	</div>

</div>			









