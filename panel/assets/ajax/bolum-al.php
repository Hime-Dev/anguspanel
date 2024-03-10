<?php 

	include '../../config.php';

	$bolumID = openssl_decrypt($_POST['id'], $sifreMethod, $sifreKey);



	$role = $_POST['role'];



	



	if ($role == "ceviri") {

		if (!$ceviri_st > 0) {

			echo "Sıradışı hareket farkedildi.";

			die();

		}


		$tarih = date('Y-m-d H:i:s');

		if($database->query("UPDATE bolumler SET cevirmen = '$userDBID', ceviri_alim = '$tarih' WHERE id = '$bolumID'")) {

				$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'");

				$bolum = $bolum->fetch_assoc();

				$seriID = $bolum['manga_id'];

				$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

				$seri = $seri->fetch_assoc();

			?>

			<script>

				//sol tarafı güncelle

				var sahipOlunanlarTablo = document.getElementById('lCeviriBolumleri');

				var sahipOlunanlar = sahipOlunanlarTablo.innerHTML;

				var yeni = "<div class='user-ch'><div class='user-ch_top'><div class='user-ch_img'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'></div><div class='user-ch_info'><div class='user-ch_name'><?php echo $seri['manga_name'] ?></div><div class='user-ch_chapter'>Bölüm <?php echo $bolum['bolum_no'] ?></div></div></div><div class='user-ch_buttons'><span></span><a href='<?php echo $siteurl ?>bolum/ceviri/<?php echo $bolum['id'] ?>'><span>Bölüme Git</span></a></div></div>";

				var sonDurum = sahipOlunanlar+yeni;

				sahipOlunanlarTablo.innerHTML = sonDurum;



				//Bölümü Karart

				var bolumItem = document.querySelector("#ceviribolumleriSekmesi .chapter-table#ch<?php echo $_POST['index']; ?>");

				bolumItem.style.opacity = "0.5";

				bolumItem.getElementsByClassName('bolumal')[0].style.display = "none";



				//Bölümler sayısını güncelle

				var sekmeAcici = document.querySelector(".lSidebar #ceviriButton small em");

				sekmeS = sekmeAcici.innerHTML;

				sekmeS = sekmeS.slice(1,-1);

				sekmeS = Number(sekmeS);

				nSekmeS = sekmeS + 1;

				sekmeAcici.innerHTML = "("+nSekmeS+")";



				//Bildirim

				bildirim("Bu Bölüm Artık Sana Ait!");



			</script>

			<?php

			$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'")->fetch_assoc();

			$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

			ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Çevirisini Aldı.");

		}

	}

	if ($role == "redakte") {

		if (!$redakte_st > 0) {

			echo "Sıradışı hareket farkedildi.";

			die();

		}


		$tarih = date('Y-m-d H:i:s');

		if($database->query("UPDATE bolumler SET redaktor = '$userDBID', redakte_alim = '$tarih' WHERE id = '$bolumID'")) {

				$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'");

				$bolum = $bolum->fetch_assoc();

				$seriID = $bolum['manga_id'];

				$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

				$seri = $seri->fetch_assoc();

			?>

			<script>

				//sol tarafı güncelle

				var sahipOlunanlarTablo = document.getElementById('lRedakteBolumleri');

				var sahipOlunanlar = sahipOlunanlarTablo.innerHTML;

				var yeni = "<div class='user-ch'><div class='user-ch_top'><div class='user-ch_img'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'></div><div class='user-ch_info'><div class='user-ch_name'><?php echo $seri['manga_name'] ?></div><div class='user-ch_chapter'>Bölüm <?php echo $bolum['bolum_no'] ?></div></div></div><div class='user-ch_buttons'><span></span><a href='<?php echo $siteurl ?>bolum/redakte/<?php echo $bolum['id'] ?>'><span>Bölüme Git</span></a></div></div>";

				var sonDurum = sahipOlunanlar+yeni;

				sahipOlunanlarTablo.innerHTML = sonDurum;



				//Bölümü Karart

				var bolumItem = document.querySelector("#redaktebolumleriSekmesi .chapter-table#ch<?php echo $_POST['index']; ?>");

				bolumItem.style.opacity = "0.5";

				bolumItem.getElementsByClassName('bolumal')[0].style.display = "none";



				//Bölümler sayısını güncelle

				var sekmeAcici = document.querySelector(".lSidebar #redakteButton small em");

				sekmeS = sekmeAcici.innerHTML;

				sekmeS = sekmeS.slice(1,-1);

				sekmeS = Number(sekmeS);

				nSekmeS = sekmeS + 1;

				sekmeAcici.innerHTML = "("+nSekmeS+")";



				//Bildirim

				bildirim("Bu Bölüm Artık Sana Ait!");



			</script>

			<?php

			$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'")->fetch_assoc();

			$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

			ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Redaktesini Aldı.");

		}

	}



	if ($role == "clean") {

		if (!$clean_st > 0) {

			echo "Bir hata meydana geldi";

			die();

		}



		$tarih = date('Y-m-d H:i:s');

		if($database->query("UPDATE bolumler SET cleaner = '$userDBID', clean_alim = '$tarih' WHERE id = '$bolumID'")) {

				$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'");

				$bolum = $bolum->fetch_assoc();

				$seriID = $bolum['manga_id'];

				$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

				$seri = $seri->fetch_assoc();

			?>

			<script>

				//sol tarafı güncelle

				var sahipOlunanlarTablo = document.getElementById('lCleanBolumleri');

				var sahipOlunanlar = sahipOlunanlarTablo.innerHTML;

				var yeni = "<div class='user-ch'><div class='user-ch_top'><div class='user-ch_img'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'></div><div class='user-ch_info'><div class='user-ch_name'><?php echo $seri['manga_name'] ?></div><div class='user-ch_chapter'>Bölüm <?php echo $bolum['bolum_no'] ?></div></div></div><div class='user-ch_buttons'><span></span><a href='<?php echo $siteurl ?>bolum/clean/<?php echo $bolum['id'] ?>'><span>Bölüme Git</span></a></div></div>";

				var sonDurum = sahipOlunanlar+yeni;

				sahipOlunanlarTablo.innerHTML = sonDurum;



				//Bölümü Karart

				var bolumItem = document.querySelector("#cleanbolumleriSekmesi .chapter-table#ch<?php echo $_POST['index']; ?>");

				bolumItem.style.opacity = "0.5";

				bolumItem.getElementsByClassName('bolumal')[0].style.display = "none";



				//Bölümler sayısını güncelle

				var sekmeAcici = document.querySelector(".lSidebar #cleanButton small em");

				sekmeS = sekmeAcici.innerHTML;

				sekmeS = sekmeS.slice(1,-1);

				sekmeS = Number(sekmeS);

				nSekmeS = sekmeS + 1;

				sekmeAcici.innerHTML = "("+nSekmeS+")";



				//Bildirim

				bildirim("Bu Bölüm Artık Sana Ait!");



			</script>

			<?php

			$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'")->fetch_assoc();

			$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

			ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Cleanini Aldı.");

		}

	}



	if ($role == "dizgi") {

		if (!$typeset_st > 0) {

			echo "Bir hata meydana geldi";

			die();

		}



		$tarih = date('Y-m-d H:i:s');

		if($database->query("UPDATE bolumler SET typesetter = '$userDBID', typeset_alim = '$tarih' WHERE id = '$bolumID'")) {

				$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'");

				$bolum = $bolum->fetch_assoc();

				$seriID = $bolum['manga_id'];

				$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

				$seri = $seri->fetch_assoc();

			?>

			<script>

				//sol tarafı güncelle

				var sahipOlunanlarTablo = document.getElementById('lDizgiBolumleri');

				var sahipOlunanlar = sahipOlunanlarTablo.innerHTML;

				var yeni = "<div class='user-ch'><div class='user-ch_top'><div class='user-ch_img'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'></div><div class='user-ch_info'><div class='user-ch_name'><?php echo $seri['manga_name'] ?></div><div class='user-ch_chapter'>Bölüm <?php echo $bolum['bolum_no'] ?></div></div></div><div class='user-ch_buttons'><span></span><a href='<?php echo $siteurl ?>bolum/typeset/<?php echo $bolum['id'] ?>'><span>Bölüme Git</span></a></div></div>";

				var sonDurum = sahipOlunanlar+yeni;

				sahipOlunanlarTablo.innerHTML = sonDurum;



				//Bölümü Karart

				var bolumItem = document.querySelector("#dizgibolumleriSekmesi .chapter-table#ch<?php echo $_POST['index']; ?>");

				bolumItem.style.opacity = "0.5";

				bolumItem.getElementsByClassName('bolumal')[0].style.display = "none";



				//Bölümler sayısını güncelle

				var sekmeAcici = document.querySelector(".lSidebar #dizgiButton small em");

				sekmeS = sekmeAcici.innerHTML;

				sekmeS = sekmeS.slice(1,-1);

				sekmeS = Number(sekmeS);

				nSekmeS = sekmeS + 1;

				sekmeAcici.innerHTML = "("+nSekmeS+")";



				//Bildirim

				bildirim("Bu Bölüm Artık Sana Ait!");



			</script>

			<?php

			$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'")->fetch_assoc();

			$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

			ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Dizgisini Aldı.");

		}

	}



	if ($role == 'kontrol') {

		if (!$kontrol_st > 0) {

			echo "Bir hata meydana geldi";

			die();

		}



		$tarih = date('Y-m-d H:i:s');

		if($database->query("UPDATE bolumler SET kontrolcu = '$userDBID', kontrol_alim = '$tarih' WHERE id = '$bolumID'")) {

				$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'");

				$bolum = $bolum->fetch_assoc();

				$seriID = $bolum['manga_id'];

				$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");

				$seri = $seri->fetch_assoc();

			?>

			<script>

				//sol tarafı güncelle

				var sahipOlunanlarTablo = document.getElementById('lKontrolBolumleri');

				var sahipOlunanlar = sahipOlunanlarTablo.innerHTML;

				var yeni = "<div class='user-ch'><div class='user-ch_top'><div class='user-ch_img'><img src='<?php echo $siteurl.$seri['manga_cover'] ?>'></div><div class='user-ch_info'><div class='user-ch_name'><?php echo $seri['manga_name'] ?></div><div class='user-ch_chapter'>Bölüm <?php echo $bolum['bolum_no'] ?></div></div></div><div class='user-ch_buttons'><span></span><a href='<?php echo $siteurl ?>bolum/kontrol/<?php echo $bolum['id'] ?>'><span>Bölüme Git</span></a></div></div>";

				var sonDurum = sahipOlunanlar+yeni;

				sahipOlunanlarTablo.innerHTML = sonDurum;



				//Bölümü Karart

				var bolumItem = document.querySelector("#kontrolbolumleriSekmesi .chapter-table#ch<?php echo $_POST['index']; ?>");

				bolumItem.style.opacity = "0.5";

				bolumItem.getElementsByClassName('bolumal')[0].style.display = "none";



				//Bölümler sayısını güncelle

				var sekmeAcici = document.querySelector(".lSidebar #kontrolButton small em");

				sekmeS = sekmeAcici.innerHTML;

				sekmeS = sekmeS.slice(1,-1);

				sekmeS = Number(sekmeS);

				nSekmeS = sekmeS + 1;

				sekmeAcici.innerHTML = "("+nSekmeS+")";



				//Bildirim

				bildirim("Bu Bölüm Artık Sana Ait!");



			</script>

			<?php

			$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$bolumID'")->fetch_assoc();

			$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();

			ekip_log($userDB['user']." ".$seri['manga_name']." ".$bolum['bolum_no']." Kontrolünü Aldı.");

		}

	}



?>