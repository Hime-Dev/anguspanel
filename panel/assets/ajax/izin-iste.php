<?php 
	include '../../config.php';



	$bitis = $_POST['sure'];
	$sebep =  str_replace("'", "&#39;",$_POST['sebep']);

	date_default_timezone_set('Europe/Istanbul');
	$gun = 86400;
	$hafta = 604800;
	$ay = 2629743;


	if 			($bitis == "1") {
		$sure = $gun * 3;
	} else if 	($bitis == "2") {
		$sure = $hafta;
	} else if 	($bitis == "3") {
		$sure = $hafta * 2;
	} else if 	($bitis == "4") {
		$sure = $hafta * 3;
	} else if 	($bitis == "5") {
		$sure = $ay;
	} else {
		echo "Hobb, dur orda! Sen büyüçen de Hacking mi Yapçen len? Yer mi lan Kanada Çocuğu! Hadi bak işine.";
		die();
	}

	$gunumuz = time();
	$bitis_tarihi = time()+$sure;
	$date = date("Y.m.d H:i:s", $bitis_tarihi);

	if 			($bitis == "1") {
		$sure = "3 Gün";
	} else if 	($bitis == "2") {
		$sure = "1 Hafta";
	} else if 	($bitis == "3") {
		$sure = "2 Hafta";
	} else if 	($bitis == "4") {
		$sure = "3 Hafta";
	} else if 	($bitis == "5") {
		$sure = "1 ay";
	}

	$sonIzin = $database->query("SELECT * FROM izinler WHERE iptal = '0' AND user_id = '$userDBID' ORDER BY bitis_tarihi DESC");

	if ($sonIzin->num_rows>0) {
		$sonIzin = $sonIzin->fetch_assoc();
		$sonIzinS = strtotime($sonIzin['bitis_tarihi']);
		$yasakliS = $sonIzinS + $hafta;
	} else {
		$yasakliS = 0;
	}

	$id = "admin";
	$type = "1";
	$heading = $userDB['user']." İzin Aldı [".$sure."]";
	$content = $userDB['user']." az önce ".$sure." izin aldı.<br><br><b>Sebep: </b>\"".$sebep."\"";
	$tarih = date("Y-m-d H:i:s");


	$users = $database->query("SELECT * FROM uyeler WHERE additional_role = '$id'");
	while ($user = $users->fetch_assoc()) {
		$uID = $user['id'];
		$database->query("INSERT INTO notifications (user_id,type,heading,content,date) VALUES ('".$uID."','".$type."','".$heading."','".$content."','".$tarih."')");
	}

	$id = "mod";

	$users = $database->query("SELECT * FROM uyeler WHERE additional_role = '$id'");
	while ($user = $users->fetch_assoc()) {
		$uID = $user['id'];
		$database->query("INSERT INTO notifications (user_id,type,heading,content,date) VALUES ('".$uID."','".$type."','".$heading."','".$content."','".$tarih."')");
	}

	$database->query("UPDATE bolumler SET cevirmen = null WHERE cevirmen = '$userDBID' AND ceviri = '0'");
	$database->query("UPDATE bolumler SET cleaner = null WHERE cleaner = '$userDBID' AND clean = '0'");
	$database->query("UPDATE bolumler SET typesetter = null WHERE typesetter = '$userDBID' AND typeset = '0'");

	if ($gunumuz > $yasakliS) {
		if ($database->query("INSERT INTO izinler (user_id,bitis_tarihi,sebep,sure) VALUES ('".$userDBID."','".$date."','".$sebep."','".$sure."')")) {

			ekip_log($userDB['user']." ".$date." tarihine kadar izin aldı.");
			?>
			<script>
				var x = "<div class='success-izin'><span><?php echo $date ?> tarihine kadar izin aldınız. Gerekçeniz olarak da \"<?php echo $sebep ?>\" gönderdiniz. Belirtilen tarihe kadar geçen sürede bölüm yapmadığınız için bot tarafından otomatik banlanmayacaksınız ve ekip sayfasında izinde olduğunuz belirtilecektir. Admin ve moderatörlere de izin istediğiniz belirtildi. Dilediğinizde bu süreden daha erken geri dönebilirsiniz.</span><a href='<?php echo $siteurl ?>' id='izin-gonder'>Siteden Ayrıl</a></div>"; 
				document.querySelector("#izin-popup .popup-inner").innerHTML = x;
			</script>
			<?php			
		}
	} else {
		?>
		<script>
			var x = "<div class='popup-kapat' id='izin-kapat'><i class='fa-solid fa-xmark'></i></div><span>Yeniden bir izin almanız için son izninizin bitiş tarihinin üzerinden en az 1 hafta geçmiş olması gerekmektedir. Bu nedenle izin alamıyorsunuz.</span>"; 
			document.querySelector("#izin-popup .popup-inner").innerHTML = x;
			popup("izin-kapat","izin-popup");
		</script>
		<?php	
	}

?>