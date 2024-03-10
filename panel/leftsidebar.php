		<aside class="lSidebar">

			<span class="geri-don" id="ch-menu-kapat"><i class="fa-solid fa-arrow-left"></i></span>

 			<h4>
				Sana Ait Bölümler
			</h4>

				<?php
					if ($ceviri_st > 0) {
					$bolumler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$userDBID' AND ceviri = '0'");
				?>

				<span id="ceviriButton"><i class="fas fa-angle-right" style="transform:rotate(0deg);"></i>Çeviri Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>
				<div id="lCeviriBolumleri">
					<?php
						if ($bolumler->num_rows == "0") {
							?>
							<div class="bolum-yap">
								<img src="https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" class="lazy" data-src="<?php echo $siteurl ?>assets/img/bolum-yap.png" alt="">
							</div>

							<?php
						}
						while ($bolum = $bolumler->fetch_assoc()) {
						    $seriID = $bolum['manga_id'];
							$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
							$seri = $seri->fetch_assoc();
					?>
						<div class="user-ch">
							<div class="user-ch_top">
								<div class="user-ch_img">
									<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
								</div>
								<div class="user-ch_info">
									<div class="user-ch_name">
										<?php echo $seri['manga_name'] ?>
									</div>
									<div class="user-ch_chapter">
										Bölüm <?php echo $bolum['bolum_no'] ?>
									</div>
								</div>
							</div>
							<div class="user-ch_buttons">
								<span></span>
								<a href="<?php echo $siteurl ?>bolum/ceviri/<?php echo $bolum['id'] ?>">
									<span>Bölüme Git</span>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php
					} if ($redakte_st > 0) {
					$bolumler = $database->query("SELECT * FROM bolumler WHERE redaktor = '$userDBID' AND ceviri = '1' AND redakte = '0'");
				?>

				<span id="redakteButton"><i class="fas fa-angle-right" style="transform:rotate(0deg);"></i>Redakte Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>
				<div id="lRedakteBolumleri">
					<?php
						if ($bolumler->num_rows == "0") {
							?>
							<div class="bolum-yap">
								<img src="https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" class="lazy" data-src="<?php echo $siteurl ?>assets/img/bolum-yap.png" alt="">
							</div>

							<?php
						}
						while ($bolum = $bolumler->fetch_assoc()) {
						    $seriID = $bolum['manga_id'];
							$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
							$seri = $seri->fetch_assoc();
					?>
						<div class="user-ch">
							<div class="user-ch_top">
								<div class="user-ch_img">
									<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
								</div>
								<div class="user-ch_info">
									<div class="user-ch_name">
										<?php echo $seri['manga_name'] ?>
									</div>
									<div class="user-ch_chapter">
										Bölüm <?php echo $bolum['bolum_no'] ?>
									</div>
								</div>
							</div>
							<div class="user-ch_buttons">
								<span></span>
								<a href="<?php echo $siteurl ?>bolum/redakte/<?php echo $bolum['id'] ?>">
									<span>Bölüme Git</span>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php
					}  if ($clean_st > 0) {
					$bolumler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$userDBID' AND ceviri = '1' AND clean = '0'");
				?>

				<span id="cleanButton"><i class="fas fa-angle-right" style="transform:rotate(0deg);"></i>Clean Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>
				<div id="lCleanBolumleri">

					<?php
						if ($bolumler->num_rows == "0") {
							?>

							<div class="bolum-yap">
								<img src="<?php echo $siteurl ?>assets/img/bolum-yap.png" alt="">
							</div>

							<?php
						}
						while ($bolum = $bolumler->fetch_assoc()) {
							$seriID = $bolum['manga_id'];
							$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
							$seri = $seri->fetch_assoc();
					?>
						<div class="user-ch">
							<div class="user-ch_top">
								<div class="user-ch_img">
									<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
								</div>
								<div class="user-ch_info">
									<div class="user-ch_name">
										<?php echo $seri['manga_name'] ?>
									</div>
									<div class="user-ch_chapter">
										Bölüm <?php echo $bolum['bolum_no'] ?>
									</div>
								</div>
							</div>
							<div class="user-ch_buttons">
								<span></span>
								<a href="<?php echo $siteurl ?>bolum/clean/<?php echo $bolum['id'] ?>">
									<span>Bölüme Git</span>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
				
				<?php
					} if ($typeset_st > 0) {
					$bolumler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$userDBID' AND ceviri = '1' AND clean = '1' AND typeset = '0'");
				?>

				<span id="dizgiButton"><i class="fas fa-angle-right" style="transform:rotate(0deg);"></i>Dizgi Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>
				<div id="lDizgiBolumleri">
					<?php
						if ($bolumler->num_rows == "0") {
							?>

							<div class="bolum-yap">
								<img src="<?php echo $siteurl ?>assets/img/bolum-yap.png" alt="">
							</div>
							
							<?php
						}
						while ($bolum = $bolumler->fetch_assoc()) {
							$seriID = $bolum['manga_id'];
							$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
							$seri = $seri->fetch_assoc();
					?>
						<div class="user-ch">
							<div class="user-ch_top">
								<div class="user-ch_img">
									<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
								</div>
								<div class="user-ch_info">
									<div class="user-ch_name">
										<?php echo $seri['manga_name'] ?>
									</div>
									<div class="user-ch_chapter">
										Bölüm <?php echo $bolum['bolum_no'] ?>
									</div>
								</div>
							</div>
							<div class="user-ch_buttons">
								<span></span>
								<a href="<?php echo $siteurl ?>bolum/typeset/<?php echo $bolum['id'] ?>">
									<span>Bölüme Git</span>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php
					} if ($kontrol_st > 0) {
					$bolumler = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$userDBID' AND ceviri = '1' AND clean = '1' AND typeset = '1' AND kontrol = '0'");
				?>

				<span id="kontrolButton"><i class="fas fa-angle-right" style="transform:rotate(0deg);"></i>Kontrol Bölümleri <small><em>(<?php echo $bolumler->num_rows ?>)</em></small></span>
				<div id="lKontrolBolumleri">
					<?php
						if ($kontroller->num_rows == "0") {
							?>

							<div class="bolum-yap">
								<img src="<?php echo $siteurl ?>assets/img/bolum-yap.png" alt="">
							</div>
							
							<?php
						}
						while ($bolum = $bolumler->fetch_assoc()) {
							$seriID = $bolum['manga_id'];
							$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
							$seri = $seri->fetch_assoc();
					?>
						<div class="user-ch">
							<div class="user-ch_top">
								<div class="user-ch_img">
									<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
								</div>
								<div class="user-ch_info">
									<div class="user-ch_name">
										<?php echo $seri['manga_name'] ?>
									</div>
									<div class="user-ch_chapter">
										Bölüm <?php echo $bolum['bolum_no'] ?>
									</div>
								</div>
							</div>
							<div class="user-ch_buttons">
								<span></span>
								<a href="<?php echo $siteurl ?>bolum/kontrol/<?php echo $bolum['id'] ?>">
									<span>Bölüme Git</span>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php } ?>

		</aside>