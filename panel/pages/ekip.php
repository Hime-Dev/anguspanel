<?php if ($additional == "admin" OR $additional == "mod") { ?>

	<div style="display: flex;justify-content: flex-end;align-items: center;">

		<div id="oge-ekle-button">

			<div><span></span><span></span></div>

			 Üye Ekle

		</div>

	</div>	

	<div id="oge-ekle-box" style="margin-bottom:25px;">

		<div class="uye-ekle-top">

			<input type="text" id="uye-ekle-user" placeholder="Kullanıcı Adı">

			<div class="uye-beceriler">

				<select id="uye-ceviri-durumu">

					<option value="0" selected>Çeviri Durumu Yok</option>

					<option value="1">Çevirmen</option>

				</select>


				<select id="uye-redakte-durumu">

					<option value="0" selected>Redakte Durumu Yok</option>

					<option value="1">Redaktör</option>

				</select>


				<select id="uye-clean-durumu">

					<option value="0" selected>Clean Durumu Yok</option>

					<option value="1">Cleaner</option>

				</select>



				<select id="uye-typeset-durumu">

					<option value="0" selected>Typeset Durumu Yok</option>

					<option value="1">Typesetter</option>

				</select>



				<select id="uye-kontrol-durumu">

					<option value="0" selected>Kontrol Durumu Yok</option>

					<option value="1">Kontrolcü</option>

				</select>

			</div>

			<div id="uye-ekle-pass"></div>



			<div style="text-align: right;"><button id="uyeyi-gonder">Üye Ekle</button></div>

		</div>	

	</div>

<?php } ?>







<?php //if ($user['additional_role'] == "admin" OR $user['additional_role'] == "mod") { ?>

	<div id="banlandi">

		BANNED

	</div>

<?php //} ?>



<audio id="pl">

  <source src="assets/banned.mp3" type="audio/mpeg">

</audio>



<?php 

	

	$uyeler = $database->query("SELECT * FROM uyeler ORDER BY last_ch DESC");



	$cikanUyeler = $database->query("SELECT * FROM uyeler WHERE status ='banned' OR status = 'left'");



	$uyeSayisi = $uyeler->num_rows;

	$cikanUyeSayisi = $cikanUyeler->num_rows;



	$mevcutUyeSayisi = $uyeSayisi - $cikanUyeSayisi;



	/*Stats*/

	$cevirmenler = $database->query("SELECT * FROM uyeler WHERE ceviri_st != '0'");

	$l_cevirmenler = $database->query("SELECT status FROM `uyeler` WHERE ceviri_st != '0' AND status != ''");

	$k_cevirmenler = $cevirmenler->num_rows - $l_cevirmenler->num_rows;



	$redaktorler = $database->query("SELECT * FROM uyeler WHERE redakte_st != '0'");

	$l_redaktorler = $database->query("SELECT status FROM `uyeler` WHERE redakte_st != '0' AND status != ''");

	$k_redaktorler = $redaktorler->num_rows - $l_redaktorler->num_rows;



	$cleanerlar = $database->query("SELECT * FROM uyeler WHERE clean_st != '0'");

	$l_cleanerlar= $database->query("SELECT status FROM `uyeler` WHERE clean_st != '0' AND status != ''");

	$k_cleanerlar = $cleanerlar->num_rows - $l_cleanerlar->num_rows;



	$typesetterlar = $database->query("SELECT * FROM uyeler WHERE typeset_st != '0'");

	$l_typesetterlar= $database->query("SELECT status FROM `uyeler` WHERE typeset_st != '0' AND status != ''");

	$k_typesetterlar = $typesetterlar->num_rows - $l_typesetterlar->num_rows;



	$kontrolculer = $database->query("SELECT * FROM uyeler WHERE kontrol_st != '0'");

	$l_kontrolculer = $database->query("SELECT status FROM `uyeler` WHERE kontrol_st != '0' AND status != ''");

	$k_kontrolculer = $kontrolculer->num_rows - $l_kontrolculer->num_rows;

?>

<div class="ekip-bilgileri">

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Üye Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $mevcutUyeSayisi ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Çevirmen Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $k_cevirmenler ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Redaktör Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $k_redaktorler ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Cleaner Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $k_cleanerlar ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Dizgici Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $k_typesetterlar ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Toplam Kontrolcü Sayısı:		

		</div>

		<div class="ekip-bilgi-degeri">

			<?php echo $k_kontrolculer ?>

		</div>

	</div>

	<div class="ekip-bilgi">

		<div class="ekip-bilgi-basligi">

			Haftanın Birincisi: <em><small>(<span>?</span> Bölüm ile)</small></em>

		</div>

		<div class="ekip-bilgi-degeri">

		</div>

	</div>

</div>



<div class="ekip-tablosu">		

<?php while ($uye = $uyeler->fetch_assoc()) {

	if ($uye['status'] =='banned' || $uye['status'] == 'left')	continue;

	$uyeID = $uye['id'] 

?>



	<div class="user-card">

		<?php if ($userDB['additional_role'] == "admin" OR $userDB['additional_role'] == "mod") { ?>

		<div class="banhammer" id="banhammer<?php echo $uye['id'] ?>">

			<button onclick="banla(<?php echo $uye['id'] ?>)">

				<img src="https://ekip.mangaefendisi.net/assets/img/banhammer.png" alt="banhammer">

			</button>

		</div>



		<?php 

		 $izinler = $database->query("SELECT * FROM izinler WHERE user_id = '$uyeID'");

        if ($izinler->num_rows>0) {

            while($izin = $izinler->fetch_assoc()) {

                if($izin['iptal'] != "1") {

                    $bitis = $izin['bitis_tarihi'];

                    $sebep = $izin['sebep'];

                    $gunumuz = time();

                    $sonuc = strtotime($bitis) - $gunumuz;

                    if ($sonuc > 0) {

                      ?>

                        <div class="izinde-gosterge">

													<span>İzinde</span>

												</div>

                      <?php

                    } 

                }

            }

        }



        ?>



		<?php } ?>

		<div class="pp-div">

			<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php 

					if(!$uye['profile'] == null) {

						echo $uye['profile'];

					}



					else {

						echo "assets/img/profile.jpg";

					}

				?>" alt="Profil Resmi">

			<?php 

				$lastOnline = $database->query("SELECT * FROM activity WHERE user_id = '".$uye['id']."'")->fetch_assoc();

				$lastOnlineTime = strtotime($lastOnline['date_time']);

				date_default_timezone_set('Europe/Istanbul');



				$time_difference = time()-$lastOnlineTime;



				if ($time_difference < 5) {

				 	

			?><span class="cevrimici"></span><?php } ?>

		</div>

		<img class="broken-img" id="broken<?php echo $uye['id'] ?>" src="https://www.picng.com/upload/broken_glass/png_broken_glass_87228.png" alt="Kırılmış" style="display: none">

		<div class="user-info">

			<a href="<?php echo $siteurl."uye/".$uye['id']; ?>">

				<div class="user-name">

					<?php 

						if($uye['additional_role'] == "admin") {

							?> <span class="admin">Admin</span><?php

						} else if($uye['additional_role'] == "mod") {

							?><span class="mod">Mod</span><?php

						}

					?>

					<?php echo $uye['user'] ?>

				</div>

			</a>

			<div class="hakkinda">

				<?php echo $uye['about'] ?>

				<?php if ($uye['about'] == "" OR $uye['about'] == null) echo "-" ?>

			</div>

			<div class="user-stats">

				<div class="stat-type member-last-ch">

					<span>Son Bölümü:</span>

					<span><?php if(!$uye['last_ch'] == null) {gecen_sure($uye['last_ch']);} else {echo "-";} ?></span>

				</div>



				<?php 

						$hafta = 604800;

						$ay = 2629743;	

						$uyeID = $uye['id'];

						$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$uyeID'");

						$redakteler = $database->query("SELECT * FROM bolumler WHERE redaktor = '$uyeID'");

						$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$uyeID'");

						$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$uyeID'");

						$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");

				?>



				<div class="stat-type">

					<span>Haftalık Bölüm:</span>

					<span>

						<?php 

							$hCev = $ceviriler;

							$hRed = $redakteler;

							$hCle = $cleanler;

							$hTyp = $typesetler;

							$hKon = $kontroller;

							$hCount = 0;

							while ($hBol = $hCev->fetch_assoc()) {

								if($hBol['ceviri'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($hBol['ceviri_teslim']);

								$sonuc = $gunumuz - $sure;

								if($hafta > $sonuc) {

									$hCount++;

								}

							}

							while ($hBol = $hRed->fetch_assoc()) {

								if($hBol['redakte'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($hBol['redakte_teslim']);

								$sonuc = $gunumuz - $sure;

								if($hafta > $sonuc) {

									$hCount++;

								}

							}

							while ($hBol = $hCle->fetch_assoc()) {

								if($hBol['clean'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($hBol['clean_teslim']);

								$sonuc = $gunumuz - $sure;

								if($hafta > $sonuc) {

									$hCount++;

								}

							}

							while ($hBol = $hTyp->fetch_assoc()) {

								if($hBol['typeset'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($hBol['typeset_teslim']);

								$sonuc = $gunumuz - $sure;

								if($hafta > $sonuc) {

									$hCount++;

								}

							}

							while ($hBol = $hKon->fetch_assoc()) {

								if($hBol['kontrol'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($hBol['kontrol_teslim']);

								$sonuc = $gunumuz - $sure;

								if($hafta > $sonuc) {

									$hCount++;

								}

							}

							echo $hCount;

						?>

					</span>

				</div>

				<div class="stat-type">

					<span>Aylık Bölüm:</span>

					<span>

						<?php 

							$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$uyeID'");

							$redakteler = $database->query("SELECT * FROM bolumler WHERE redaktor = '$uyeID'");

							$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$uyeID'");

							$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$uyeID'");

							$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");

							$aCev = $ceviriler;

							$aRed = $redakteler;

							$aCle = $cleanler;

							$aTyp = $typesetler;

							$aKon = $kontroller;

							$aCount = 0;

							while ($aBol = $aCev->fetch_assoc()) {

								if($aBol['ceviri'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($aBol['ceviri_teslim']);

								$sonuc = $gunumuz - $sure;

								if($ay > $sonuc) {

									$aCount++;

								}

							}

							while ($aBol = $aRed->fetch_assoc()) {

								if($aBol['redakte'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($aBol['redakte_teslim']);

								$sonuc = $gunumuz - $sure;

								if($ay > $sonuc) {

									$aCount++;

								}

							}

							while ($aBol = $aCle->fetch_assoc()) {

								if($aBol['clean'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($aBol['clean_teslim']);

								$sonuc = $gunumuz - $sure;

								if($ay > $sonuc) {

									$aCount++;

								}

							}

							while ($aBol = $aTyp->fetch_assoc()) {

								if($aBol['typeset'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($aBol['typeset_teslim']);

								$sonuc = $gunumuz - $sure;

								if($ay > $sonuc) {

									$aCount++;

								}

							}

							while ($aBol = $aKon->fetch_assoc()) {

								if($aBol['kontrol'] == "0") continue;

								$gunumuz = time();

								$sure = strtotime($aBol['kontrol_teslim']);

								$sonuc = $gunumuz - $sure;

								if($ay > $sonuc) {

									$aCount++;

								}

							}

							echo $aCount;

						?>

						</span>

				</div>

				<div class="stat-type">

					<span>Toplam Bölüm:</span>

					<span>

					<?php 

							$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$uyeID'");

							$redakteler = $database->query("SELECT * FROM bolumler WHERE redaktor = '$uyeID'");

							$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$uyeID'");

							$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$uyeID'");

							$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");

							$tCev = $ceviriler;

							$tRed = $redakteler;

							$tCle = $cleanler;

							$tTyp = $typesetler;

							$tKon = $kontroller;

							$tCount = 0;

							while ($tBol = $tCev->fetch_assoc()) {

								if($tBol['ceviri'] == "0") continue;

								$tCount++;

							}

							while ($tBol = $tRed->fetch_assoc()) {

								if($tBol['redakte'] == "0") continue;

								$tCount++;

							}

							while ($tBol = $tCle->fetch_assoc()) {

								if($tBol['clean'] == "0") continue;

								$tCount++;

							}

							while ($tBol = $tTyp->fetch_assoc()) {

								if($tBol['typeset'] == "0") continue;

								$tCount++;

							}

							while ($tBol = $tKon->fetch_assoc()) {

								if($tBol['kontrol'] == "0") continue;

								$tCount++;

							}

							echo $tCount;

						?>

					</span>

				</div>


				<?php 

					if ($admin == true AND $uye['ucretli'] == "1") {

				?>

				<div class="stat-type ucretli-stats">

					<span><?php echo $uye['ad_soyad'] ?></span>

				</div>

				<div class="stat-type ucretli-stats">

					<span style="display: flex; justify-content: space-between; width: 100%"><span id="iban<?php echo $uye['id']?>"><?php echo $uye['iban'] ?></span><button onclick="ibankopyala('iban<?php echo $uye["id"] ?>')" style="appearance: none;border: none;background: none; cursor: pointer;"><i class="fas fa-copy"></i></button></span>

				</div>

				<div class="stat-type ucretli-stats">

					<span>Bakiye</span>

					<span><?php echo $uye['bakiye'] ?> TL</span>

				</div>

				<div class="stat-type" style="justify-content:center;background:crimson;font-weight:600;; cursor:pointer;" onclick="bakiye_sifirla(<?php echo $uye['id'] ?>)">

					<span style="color:white">Bakiye Sıfırla</span>

				</div>

				<?php

					}

				?>

			</div>

			<div class="roller">

				<?php 

					if($uye['ceviri_st']>0) {

				?>

					<div class="user-role-item">

						Çevirmen

					</div>

				<?php }  

					if($uye['redakte_st']>0) {

				?>

					<div class="user-role-item">

						Redaktör

					</div>

				<?php }  

					if($uye['clean_st']>0) {

				?>

					<div class="user-role-item">

						Cleaner

					</div>

				<?php }  

					if($uye['typeset_st']>0) {

				?>

					<div class="user-role-item">

						Typesetter

					</div>

				<?php }  

					if($uye['kontrol_st']>0) {

				?>

					<div class="user-role-item">

						Kontrolcü

					</div>

				<?php } ?>	

			</div>

		</div>

	</div>

<?php } ?>

</div>



<script>

	haftalikBolumler = document.querySelectorAll(".user-stats .stat-type:nth-child(2) span:nth-child(2)")

	haftalikDizi = [];

	var i = 0;

	haftalikBolumler.forEach(function(number) {

		haftalikDizi.push(Number(haftalikBolumler[i].innerHTML));

		i++;

	});



	haftalikDizi.sort(function(a,b){return b - a});

	document.querySelector(".ekip-bilgi-basligi em small span").innerHTML = haftalikDizi[0];



	var kutular = document.querySelectorAll('.user-info');

	kutular.forEach(function(kutu) {

		var kutu_sayi = Number(kutu.querySelector(".user-stats .stat-type:nth-child(2) span:nth-child(2)").innerHTML);

		if (kutu_sayi == haftalikDizi[0]) {

			var name = kutu.querySelector(".user-name").innerHTML;

			var newName = name.replace('<span class="admin">Admin</span>', "").replace('<span class="mod">Mod</span>', "");

			document.querySelector(".ekip-bilgi:last-child .ekip-bilgi-degeri").innerHTML = newName;

		}

	});

</script>