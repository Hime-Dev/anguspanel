<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/responsive.css?v<?php echo $sitever?>">
</head>

<div class="left">
	<video src="<?php echo $siteurl ?>assets/left.mp4?<?php echo rand(1,1000000000) ?>" type="video/mp4" autoplay muted loop></video>
	<div class="yazi" id="ayrildin">

		<?php 
			$talepler = $database->query("SELECT * FROM donen_talepler WHERE user_id = '$userDBID' ORDER BY tarih DESC");
			if ($talepler->num_rows>0) {
				$talep = $talepler->fetch_assoc();
				if ($talep['onay'] == "0") {
					?>
					<div class="ayrildin">Ekibe Geri Dönmek için Bir Talep Gönderdiniz ve Bu Talep Şu Anda Onay Sürecinde. Yetkililer Talebinizi Gördüğünde Bu Sayfa Üzerinden Yeniden Bilgilendirileceksiniz.</div>
					
				<?php }
				else if ($talep['onay'] == "1") {
					$retID = $talep['onay_ret_sahibi'];
					$retUye = $database->query("SELECT * FROM uyeler WHERE id = '$retID'");
					$retUye = $retUye->fetch_assoc();
					$reddeden = $retUye['user']
					?>
					<div class="ayrildin">
						Ne Yazık ki Ekibe Geri Dönmek için Gönderdiğin Talep <?php echo $reddeden ?> tarafından Reddedildi. Eğer Bir Sorun Olduğunu Düşünüyorsan Discord'tan Diğer Yetkililer ile İletişime Geçebilirsin.
					</div>
					<?php
				}
			} else {
		?>
		<div class="ayrildin">
			Ekipten Ayrıldın. Seninle Birlikte Çalışmak Bir Onurdu! Eğer Geri Dönmek İstersen Her Zaman Kapımız Açık. Tek Yapman Gereken Aşağıdan Talep Göndermek. 
		</div>
		<form method="post">
			<textarea name="talepAciklamasi" placeholder="Geri Dönmek İçin Buradan Admin ve Moderatörlere Mesaj Bırakabilirsiniz."></textarea>
			<input type="submit" name="talepGonder" id="talepGonder" value="Talebi Gönder">
		</form>

		<?php } ?>


	</div>
	<div class="audio">
		<audio id="audio">
			<source src="<?php echo $siteurl ?>assets/rain.mp3?<?php echo rand(1,1000000000) ?>" type="audio/mp3">
		</audio>
	</div>
</div>

<?php 
	
	if (isset($_POST['talepGonder'])) {
		$talep = strip_tags($_POST['talepAciklamasi']);

		if ($database->query("INSERT INTO donen_talepler (user_id,talep) VALUES ('".$userDBID."','".$talep."')")) {
				$id = "admin";
				$type = "1";
				$heading = $userDB['user']." Ekibe Dönmek İstiyor.";
				$content = str_replace("'","&#39;",$userDB['user']." ekibe dönmek için talep gönderdi. Talebinde gönderdiği mesaj: \"".$talep."\"<br><br>Talebi Onaylamak veya reddetmek için <a href=\"".$siteurl."admin/donenler\"><u><em>Buraya Tıklayın.</em></u></a>");


				$users = $database->query("SELECT * FROM uyeler WHERE additional_role = '$id'");
				while ($user = $users->fetch_assoc()) {
					$uID = $user['id'];
					$database->query("INSERT INTO notifications (user_id,type,heading,content) VALUES ('".$uID."','".$type."','".$heading."','".$content."')");
				}

				$id = "mod";

				$users = $database->query("SELECT * FROM uyeler WHERE additional_role = '$id'");
				while ($user = $users->fetch_assoc()) {
					$uID = $user['id'];
					$database->query("INSERT INTO notifications (user_id,type,heading,content) VALUES ('".$uID."','".$type."','".$heading."','".$content."')");
				}
			?><script>window.location = '<?php $random = openssl_random_pseudo_bytes(16); $rand = bin2hex($random); echo $siteurl.$rand ?>'</script><?php
		}

	}

?>

<script>
	var audio = document.getElementById('audio');
	audio.play();
	window.onload = function() {
		var audio = document.getElementById('audio');
		audio.play();
	}

	setInterval(function() {audio.play()}, 10);
</script>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&display=swap');
	
	body {
	    margin: 0;
	    overflow: hidden;
	}

	.left {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    position: relative;
	    top: 0;
	    left: 0;
	    height: 100vh;
	    width: 100%;
	}

	.left .yazi {
		position: fixed;
	    width: 100%;
	    height: 100%;
	    top: 0;
	    left: 0;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    flex-direction: column;
	    font-size: 25px;
	    font-family: 'Orbitron', sans-serif;
	    font-weight: 700;
	    user-select: none;
	}


	#talepGonder {
	    appearance: none;
	    background: #ffffff73;
	    padding: 5px 15px;
	    border-radius: 5px;
	    font-size: 17px;
	    font-family: sans-serif;
	    font-weight: 700;
	    border: 0;
	    box-shadow: 0 0 10px rgb(28 64 3 / 45%);
	    cursor: pointer;
	    transition: 300ms;
	    color: #343434;
	}

	#talepGonder:hover {
	    background: #ffffff5e;
	}

	.audio {
	    position: fixed;
	    z-index: -1;
	}

	.left .yazi .ayrildin {
	    width: 45%;
	    text-align: center;
	    color: white;
	    text-shadow: 0 0 20px rgb(28 64 3 / 90%);
	}

	.left .yazi form {
	    display: flex;
	    flex-direction: column;
	    width: 45%;
	}

	.left .yazi form textarea {
	    margin: 25px 0;
	    padding: 15px;
	    resize: none;
	    border-radius: 10px;
	    background: #fff7d794;
	    font-family: sans-serif;
	    height: 10vh;
	    text-align: center;
	    box-shadow: 0 0 10px 0px rgb(28 64 3 / 32%);
	    font-weight: 600;
	    outline: none;
	}

	.left .yazi form textarea::placeholder {
	    color: #555555;
	}

</style>