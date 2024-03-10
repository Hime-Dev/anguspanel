<?php



	$uyeID = $_GET['id'];

	$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");

	$uye = $uye->fetch_assoc();

	

?>



<a href="<?php echo $siteurl ?>ekip" class="geri-don"><i class="fa-solid fa-arrow-left"></i></a>



<div class="membercard_top">

	<div class="membercard_image">

		<?php if ($uye['profile'] == null) { ?>

			<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl?>assets/img/profile.jpg" alt="">

		<?php }  else { ?>

			<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$uye['profile'] ?>" alt="">			

		<?php } ?>



		<?php 

			$lastOnline = $database->query("SELECT * FROM activity WHERE user_id = '".$uye['id']."'")->fetch_assoc();

			$lastOnlineTime = strtotime($lastOnline['date_time']);

			date_default_timezone_set('Europe/Istanbul');



			$time_difference = time()-$lastOnlineTime;



			if ($time_difference < 5) {

			 	

		?>	<span class="cevrimici"></span> <?php } else { ?>

			<span class="son-gorulme"><?php gecen_sure($lastOnline['date_time']); ?> aktifti</span> <?php } ?>

	</div>

	<div class="membercard_topright">

		<div class="membercard_topright_top">

			<?php echo $uye['user'] ?>

		</div>

		<?php
			$ceza = $database->query("SELECT ceza FROM ceza_sistemi WHERE user_id = '$uyeID'")->fetch_assoc()['ceza'];
		?>
		<div class="award_meter">
			<span>Cezalar</span>
			<span class="award_count"><?php echo $ceza ?>/3</span>
			<div class="award_progress award_type<?php echo $ceza ?>"></div>
		</div>

		<div class="membercard_botright_bot">

			<?php 

				if ($uye['ceviri_st'] > "0") {

				?>

				<div class="membercard_botright_bot_div">

					Çevirmen

				</div>

				<?php

				}

				if ($uye['redakte_st'] > "0") {

				?>

				<div class="membercard_botright_bot_div">

					Redaktör

				</div>

				<?php

				}



				if ($uye['clean_st'] > "0") {

				?>

				<div class="membercard_botright_bot_div">

					Cleaner

				</div>

				<?php

				}



				if ($uye['typeset_st'] > "0") {

				?>

				<div class="membercard_botright_bot_div">

					Typesetter

				</div>

				<?php

				}

				if ($uye['kontrol_st'] > "0") {

				?>

				<div class="membercard_botright_bot_div">

					Kontrolcü

				</div>

				<?php

				}

			?>

			

			

		</div>

	</div>

</div>




	<div class="member-about">

		<?php echo $uye['about'] ?>

	</div>



	<h3 class="sekmeBaslik">Bölümler</h3>



<div class="member-chapters">

	<?php 



	$uyeID = $_GET['id'];

		$bolumler = $database->query("SELECT * FROM bolumler WHERE cevirmen = '$uyeID' ORDER BY id DESC");

		while($bolum = $bolumler->fetch_assoc()) {

			$seriID = $bolum['manga_id'];

			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

			$seri = $seri->fetch_assoc();

	?>

		<div class="member-chapters_ch">

			<div class="member-chapters_ch_img">

				<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$seri['manga_cover']?>" alt="">

			</div>

			<div class="member-chapters_ch_infos">

				<div class="member-chapters_ch_infos_top">

					<?php echo $seri['manga_name'] ?>

				</div>

				<div class="member-chapters_ch_infos_bot">

					Bölüm <?php echo $bolum['bolum_no'] ?>

				</div>

			</div>

			<div class="member-chapters_ch_role" <?php 

				if($bolum['ceviri'] == "1") {

					?>

					style="background: linear-gradient(-90deg, #00c611 -42%, transparent);"<?php

				} else if ($bolum['ceviri'] == "2") {

					?>

					style="background: linear-gradient(-90deg, #0054bf -42%, transparent)"<?php

				}

			 ?>>

				Çeviri

			</div>

			<?php if($bolum['ceviri'] == "1") { ?>

			<div class="member-chapters_ch_date">

				<?php echo gecen_sure($bolum['ceviri_teslim']) ?>

			</div>

			<?php } ?>

		</div>		

	<?php }

		$bolumler = $database->query("SELECT * FROM bolumler WHERE redaktor = '$uyeID' ORDER BY id DESC");

		while($bolum = $bolumler->fetch_assoc()) {

			$seriID = $bolum['manga_id'];

			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

			$seri = $seri->fetch_assoc();

	?>

		<div class="member-chapters_ch">

			<div class="member-chapters_ch_img">

				<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$seri['manga_cover']?>" alt="">

			</div>

			<div class="member-chapters_ch_infos">

				<div class="member-chapters_ch_infos_top">

					<?php echo $seri['manga_name'] ?>

				</div>

				<div class="member-chapters_ch_infos_bot">

					Bölüm <?php echo $bolum['bolum_no'] ?>

				</div>

			</div>

			<div class="member-chapters_ch_role" <?php 

				if($bolum['redakte'] == "1") {

					?>

					style="background: linear-gradient(-90deg, #00c611 -42%, transparent);"<?php

				} else if ($bolum['redakte'] == "2") {

					?>

					style="background: linear-gradient(-90deg, #0054bf -42%, transparent)"<?php

				}

			 ?>>

				Redakte

			</div>

			<?php if($bolum['redakte'] == "1") { ?>

			<div class="member-chapters_ch_date">

				<?php echo gecen_sure($bolum['redakte_teslim']) ?>

			</div>

			<?php } ?>

		</div>		

	<?php }

		$bolumler = $database->query("SELECT * FROM bolumler WHERE cleaner = '$uyeID' ORDER BY id DESC");

		while($bolum = $bolumler->fetch_assoc()) {

			$seriID = $bolum['manga_id'];

			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

			$seri = $seri->fetch_assoc();

	?>

		<div class="member-chapters_ch">

			<div class="member-chapters_ch_img">

				<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$seri['manga_cover']?>" alt="">

			</div>

			<div class="member-chapters_ch_infos">

				<div class="member-chapters_ch_infos_top">

					<?php echo $seri['manga_name'] ?>

				</div>

				<div class="member-chapters_ch_infos_bot">

					Bölüm <?php echo $bolum['bolum_no'] ?>

				</div>

			</div>

			<div class="member-chapters_ch_role" <?php 

				if($bolum['clean'] == "1" OR $bolum['clean'] == "1") {

					?>

					style="background: linear-gradient(-90deg, #00c611 -42%, transparent);"<?php

				} else if ($bolum['clean'] == "2" OR $bolum['clean'] == "2") {

					?>

					style="background: linear-gradient(-90deg, #0054bf -42%, transparent)"<?php

				}

			 ?>>

				Clean

			</div>

			<?php if($bolum['clean'] == "1") { ?>

			<div class="member-chapters_ch_date">

				<?php echo gecen_sure($bolum['clean_teslim']) ?>

			</div>

			<?php } ?>

		</div>		

	<?php }

		$bolumler = $database->query("SELECT * FROM bolumler WHERE typesetter = '$uyeID' ORDER BY id DESC");

		while($bolum = $bolumler->fetch_assoc()) {

			$seriID = $bolum['manga_id'];

			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

			$seri = $seri->fetch_assoc();

	?>

		<div class="member-chapters_ch">

			<div class="member-chapters_ch_img">

				<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$seri['manga_cover']?>" alt="">

			</div>

			<div class="member-chapters_ch_infos">

				<div class="member-chapters_ch_infos_top">

					<?php echo $seri['manga_name'] ?>

				</div>

				<div class="member-chapters_ch_infos_bot">

					Bölüm <?php echo $bolum['bolum_no'] ?>

				</div>

			</div>

			<div class="member-chapters_ch_role" <?php 

				if($bolum['typeset'] == "1") {

					?>

					style="background: linear-gradient(-90deg, #00c611 -42%, transparent);"<?php

				} else if ($bolum['typeset'] == "2") {

					?>

					style="background: linear-gradient(-90deg, #0054bf -42%, transparent)"<?php

				}

			 ?>>

				Typeset

			</div>

			<?php if($bolum['typeset'] == "1") { ?>

			<div class="member-chapters_ch_date">

				<?php echo gecen_sure($bolum['typeset_teslim']) ?>

			</div>

			<?php } ?>

		</div>		

	<?php }

		$bolumler = $database->query("SELECT * FROM bolumler WHERE kontrolcu = '$uyeID' ORDER BY id DESC");

		while($bolum = $bolumler->fetch_assoc()) {

			$seriID = $bolum['manga_id'];

			$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

			$seri = $seri->fetch_assoc();

	?>

		<div class="member-chapters_ch">

			<div class="member-chapters_ch_img">

				<img class="lazy" src= "https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php echo $siteurl.$seri['manga_cover']?>" alt="">

			</div>

			<div class="member-chapters_ch_infos">

				<div class="member-chapters_ch_infos_top">

					<?php echo $seri['manga_name'] ?>

				</div>

				<div class="member-chapters_ch_infos_bot">

					Bölüm <?php echo $bolum['bolum_no'] ?>

				</div>

			</div>

			<div class="member-chapters_ch_role" <?php 

				if($bolum['kontrol'] == "1") {

					?>

					style="background: linear-gradient(-90deg, #00c611 -42%, transparent);"<?php

				} else if ($bolum['kontrol'] == "2") {

					?>

					style="background: linear-gradient(-90deg, #0054bf -42%, transparent)"<?php

				}

			 ?>>

				Kontrol

			</div>

			<?php if($bolum['kontrol'] == "1") { ?>

			<div class="member-chapters_ch_date">

				<?php echo gecen_sure($bolum['kontrol_teslim']) ?>

			</div>

			<?php } ?>

		</div>		

	<?php } ?>

</div>

