<?php 
	$hafta = 604800;
	$ay = 2629743;	
?>

<aside class="rSidebar">

	<span class="geri-don" id="pro-menu-kapat"><i class="fa-solid fa-arrow-right"></i></span>

	<form id="profile_form" enctype="multipart/form-data">
		<h4>Kullanıcı Ayarları</h4>
			<h5>Profil Resmi</h5>
			<label>
				<div class="upload-photo">
					<span class="change-profile">Profilini Değiştir</span>
					<span class="svgspan">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M139.75,75.25h-2.07833c-2.6875,-26.1225 -24.8325,-46.58333 -51.67167,-46.58333c-26.83917,0 -48.98417,20.46083 -51.67167,46.58333h-2.07833c-17.77333,0 -32.25,14.47667 -32.25,32.25c0,17.77333 14.47667,32.25 32.25,32.25h107.5c17.77333,0 32.25,-14.47667 32.25,-32.25c0,-17.77333 -14.47667,-32.25 -32.25,-32.25zM116.81667,87.86333c-1.075,1.14667 -2.50833,1.72 -3.94167,1.72c-1.32583,0 -2.61583,-0.46583 -3.655,-1.43333l-17.845,-16.6625v44.97083c0,2.97417 -2.40083,5.375 -5.375,5.375c-2.97417,0 -5.375,-2.40083 -5.375,-5.375v-44.97083l-17.845,16.6625c-2.15,2.00667 -5.55417,1.89917 -7.59667,-0.28667c-2.00667,-2.15 -1.89917,-5.55417 0.28667,-7.59667l26.875,-25.08333c2.0425,-1.89917 5.2675,-1.89917 7.31,0l26.875,25.08333c2.18583,2.0425 2.29333,5.44667 0.28667,7.59667z"></path></g></g></svg>
					</span>		
					<img class="lazy" src="https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php 
						if(!$userDB['profile'] == null) {
							echo $siteurl.$userDB['profile'];
						}

						else {
							echo $siteurl."assets/img/profile.jpg";
						}
					?>" alt="Profil Resmi"> 
					<input type="file" name="profile-photo" id="upload_profile_photo">
				</div>
			</label>

			<h5>Bilgiler</h5>
			<div class="user-bilgileri">
				<input type="text" autocomplete="off" placeholder="Kullanıcı Adı Gir" value="<?php echo $userDB['user'] ?>" id="user_username" name="user_username">
				<div class="user-pass">
					<input type="password" placeholder="Şifre Gir" value="<?php

							$pass = openssl_decrypt($userDB['pass'],$sifreMethod,$sifreKey);
							echo $pass

						?>" id="user_password" name="user_password">
					<span id="show_pass" autocomplete="off">
						<span id="open_eye">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M86.49719,27.52c-20.77955,0 -39.84579,8.36592 -54.57641,22.15172c-0.93611,0.83055 -1.34739,2.10391 -1.07398,3.32512c0.27342,1.22121 1.1884,2.19763 2.3893,2.54972c1.20089,0.35209 2.49826,0.02431 3.3878,-0.85593c13.58746,-12.71597 30.9346,-20.29063 49.87328,-20.29063c18.84386,0 36.10826,7.49971 49.665,20.1025c0.89486,0.8679 2.1892,1.18382 3.38328,0.8258c1.19408,-0.35803 2.10107,-1.33398 2.37078,-2.55106c0.26971,-1.21708 -0.14006,-2.48484 -1.0711,-3.3138c-14.69941,-13.66505 -33.67311,-21.94344 -54.34797,-21.94344zM156.4864,72.025c-1.46489,0.02409 -2.75382,0.97326 -3.21156,2.365c-13.79771,25.61738 -38.59414,42.57 -66.87172,42.57c-28.21475,0 -52.96092,-16.88452 -66.77766,-42.40875c-0.542,-1.5994 -2.16473,-2.56895 -3.83,-2.28834c-1.66527,0.28061 -2.88066,1.72839 -2.8686,3.41709v0.16797c-0.00164,0.56692 0.13684,1.12545 0.40313,1.62594c4.67223,8.7239 10.58219,16.54304 17.44859,23.17297l-19.53141,20.84156c-1.29873,1.38779 -1.22654,3.56564 0.16125,4.86438c1.38779,1.29873 3.56564,1.22654 4.86438,-0.16125l19.64562,-20.96922c5.67395,4.68018 11.87789,8.61616 18.51016,11.63015l-12.79922,26.11578c-0.5404,1.10422 -0.45055,2.41287 0.23567,3.43287c0.68623,1.02001 1.86455,1.59636 3.091,1.5119c1.22645,-0.08446 2.31465,-0.8169 2.85458,-1.92134l13.02094,-26.57937c6.90613,2.4355 14.18793,3.91027 21.73515,4.28656c-0.0032,0.04698 -0.00544,0.09402 -0.00672,0.1411v27.52c-0.01754,1.24059 0.63425,2.39452 1.7058,3.01993c1.07155,0.62541 2.39684,0.62541 3.46839,0c1.07155,-0.62541 1.72335,-1.77935 1.7058,-3.01993v-27.52c-0.00161,-0.03811 -0.00385,-0.07619 -0.00672,-0.11422c7.79504,-0.3068 15.31323,-1.80689 22.4339,-4.3l12.29531,26.49875c0.47507,1.17868 1.56121,1.99948 2.82482,2.13471c1.2636,0.13523 2.49884,-0.43713 3.21258,-1.48859c0.71374,-1.05145 0.78972,-2.41074 0.1976,-3.53518l-12.14078,-26.18297c6.2176,-2.80749 12.0656,-6.40068 17.4486,-10.68281l20.1025,20.1025c0.72797,0.75783 1.76237,1.1414 2.80844,1.04141c0.11268,-0.01014 0.2248,-0.02584 0.33594,-0.04703c1.26001,-0.24695 2.27765,-1.17501 2.63933,-2.407c0.36168,-1.23199 0.00722,-2.56287 -0.91933,-3.45175l-19.75312,-19.75313c7.37798,-6.88648 13.72,-15.10135 18.65125,-24.35547c0.26755,-0.49788 0.40831,-1.05401 0.40984,-1.61922v-0.16797c0.01273,-0.92983 -0.35149,-1.82522 -1.00967,-2.48214c-0.65819,-0.65692 -1.55427,-1.01942 -2.48408,-1.00489z"></path></g></g></svg>
						</span>
						<span id="closed_eye">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M86.49719,27.52c-29.83168,0 -57.86607,17.83054 -73.16719,46.54078c-0.26488,0.49536 -0.40313,1.22303 -0.40313,1.78719c0,0.56416 0.14496,1.1237 0.40984,1.62594c4.72131,8.81692 10.64959,16.59809 17.46203,23.15281l-19.55156,20.86172c-1.29873,1.38779 -1.22654,3.56564 0.16125,4.86438c1.38779,1.29873 3.56564,1.22654 4.86438,-0.16125l19.67922,-21.00281c5.71901,4.70197 11.93188,8.61535 18.50344,11.61l-12.8261,26.16953c-0.5404,1.10422 -0.45055,2.41287 0.23567,3.43287c0.68623,1.02001 1.86455,1.59636 3.091,1.5119c1.22645,-0.08446 2.31465,-0.8169 2.85458,-1.92134l13.04781,-26.63985c6.98347,2.48089 14.26953,3.96471 21.70828,4.34703c-0.0032,0.04698 -0.00544,0.09402 -0.00672,0.1411v27.52c-0.01754,1.24059 0.63425,2.39452 1.7058,3.01993c1.07155,0.62541 2.39684,0.62541 3.46839,0c1.07155,-0.62541 1.72335,-1.77935 1.7058,-3.01993v-27.52c-0.00161,-0.03811 -0.00385,-0.07619 -0.00672,-0.11422c7.68035,-0.31162 15.2126,-1.78813 22.41375,-4.3336l12.31547,26.53235c0.47507,1.17868 1.56121,1.99948 2.82482,2.13471c1.2636,0.13523 2.49884,-0.43713 3.21258,-1.48859c0.71374,-1.05145 0.78972,-2.41074 0.1976,-3.53518l-12.14078,-26.18969c6.15719,-2.79511 11.98896,-6.41722 17.40828,-10.71641l20.14281,20.14281c0.72797,0.75783 1.76237,1.1414 2.80844,1.04141c0.11268,-0.01014 0.2248,-0.02584 0.33594,-0.04703c1.26001,-0.24695 2.27765,-1.17501 2.63933,-2.407c0.36168,-1.23199 0.00722,-2.56287 -0.91933,-3.45175l-19.76656,-19.76656c7.31742,-6.80717 13.68247,-14.98216 18.6714,-24.34203c0.26488,-0.49536 0.40312,-1.22303 0.40312,-1.78719c0,-0.56416 -0.14496,-1.12714 -0.40984,-1.62594c-15.31832,-28.60016 -43.32057,-46.3661 -73.07313,-46.3661z"></path></g></g></svg>
						</span>
					</span>
				</div>
				<textarea style="height: 270px; width: 95%; resize: none;" autocomplete="off" name="user_about" placeholder="Hakkımda yazabilirsiniz. Sizinle ilgili bilgilerinizi paylaşabilirsiniz. Not: Ekip kısmında herkese görünür olacaktır."><?php echo $userDB['about'] ?></textarea>
			</div>

			<h5>İstatistikler</h5>
			<div class="user_stat">
				<div class="user_statname">
					Son Bölüm Teslim
				</div>
				<div class="user_statvalue">
					<?php if(!$userDB['last_ch'] == null) {gecen_sure($userDB['last_ch']);} else {echo "-";} ?>
				</div>
			</div>
			<div class="user_stat">
				<div class="user_statname">
					Haftalık Bölüm
				</div>
				<div class="user_statvalue">
					<?php 
						$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$userDBID'");
						$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$userDBID'");
						$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$userDBID'");
						$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");
						$hCev = $ceviriler;
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
				</div>
			</div>
			<div class="user_stat">
				<div class="user_statname">
					Aylık Bölüm
				</div>
				<div class="user_statvalue">
					<?php 
						$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$userDBID'");
						$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$userDBID'");
						$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$userDBID'");
						$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");
						$aCev = $ceviriler;
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
				</div>
			</div>
			<div class="user_stat">
				<div class="user_statname">
					Toplam Bölüm
				</div>
				<div class="user_statvalue">
					<?php 
						$ceviriler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$userDBID'");
						$cleanler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$userDBID'");
						$typesetler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$userDBID'");
						$kontroller = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID'");
						$tCev = $ceviriler;
						$tCle = $cleanler;
						$tTyp = $typesetler;
						$tKon = $kontroller;
						$tCount = 0;
						while ($tBol = $tCev->fetch_assoc()) {
							if($tBol['ceviri'] == "0") continue;
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
				</div>
			</div>
			<h5>Hesap Durumu</h5>
			<div class="award_meter">
				<span>Cezalar</span>
				<span class="award_count">0/3</span>
				<div class="award_progress award_type0">
				</div>
			</div>
			<div class="hesap-durumu">
				<label class="hesap-label">
					<input type="radio" name="ucretli" value="0" id="gonulluRadio" <?php if ($userDB['ucretli'] == "0") echo "checked";?>>
					Gönüllü
				</label>
				<label class="hesap-label">
					<input type="radio" name="ucretli" value="1" id="ucretliRadio" <?php if ($userDB['ucretli'] == "1") echo "checked";?>>
					Ücretli
				</label>
			</div>
			<div class="iban-girisi">
				<div class="user_stat" style="margin-top:15px; margin-bottom:0;">
					<div class="user_statname">
						Bakiye
					</div>
					<div class="user_statvalue">
						<?php echo $userDB['bakiye'] ?> TL
					</div>
				</div>
				<input type="text" name="iban_ad-soyad" placeholder="Ad Soyad" value="<?php echo $userDB['ad_soyad'] ?>">
				<input type="text" name="iban" placeholder="Iban/Papara No" value="<?php echo $userDB['iban'] ?>">
			</div>

			<h5>Rollerin</h5>

			<?php if($ceviri_st>0) { ?>
				<div class="user_role" id="ceviri_role_stat">
					Çevirmen
				</div>
			<?php } if($clean_st>0) { ?>
				<div class="user_role" id="clean_role_stat">
					Cleaner
				</div>
			<?php } if($typeset_st>0) { ?>
				<div class="user_role" id="typeset_role_stat">
					Typesetter
				</div>
			<?php } if($kontrol_st>0) { ?>
				<div class="user_role" id="kontrol_role_stat">
					Kontrolcü
				</div>
			<?php } ?>


			<h5>İşlemler</h5>

			<div class="buttons">
				<button id="profil-guncelle">
					Profili Güncelle
				</button>
				<span id="izin-iste">
					Geçici İzin İste
				</span>
				<span id="ekipten-ayril">
					Ekipten Ayrıl
				</span>
			</div>
		</form>

		<div id="izin-popup" class="popup">
			<div class="popup-inner">
				<div class="popup-kapat" id="izin-kapat">
					<i class="fa-solid fa-xmark"></i>
				</div>
				<h3>Ne Kadar Süre İstiyorsunuz?</h3>
				<select id="izin_gun">
					<option value="1">3 Gün</option>
					<option value="2">1 Hafta</option>
					<option value="3">2 Hafta</option>
					<option value="4">3 Hafta</option>
					<option value="5">1 Ay</option>
				</select>
				<h3>İzin İsteme Sebebinizi Aşağıya Belirtin</h3>
				<textarea placeholder="Neden İzin İstiyorsunuz?" id="izin-sebep"></textarea>
				<div class="user-ch_buttons">
					<span></span>	
					<button id="izin-gonder">
						İzin İste
					</button>
				</div>
			</div>
		</div>




		<div id="ekipten-ayril-popup" class="popup">
			<div class="popup-inner">
				<div class="popup-kapat" id="ekipten-ayril-kapat">
					<i class="fa-solid fa-xmark"></i>
				</div>
				<h3>Ekipten Ayrılmak istediğine Emin misin?</h3>
				<span>Ekipten ayrıldıktan sonra geri dönmek için yine bu siteden talep göndermeniz gerekecektir. Talebiniz adminler veya modlar tarafından değerlendirilerek insaflarına göre geri gelebileceksiniz. Gerçekten ekipten ayrılmak istiyor musunuz?</span>
				<div class="user-ch_buttons">
					<button id="ekipten-ayril-onay" class="popup-button" style="background: green">
						Evet
					</button>
					<button id="ekipten-ayril-iptal" class="popup-button" style="background: darkred">
						Hayır
					</button>
				</div>
			</div>
		</div>

		

</aside>

		