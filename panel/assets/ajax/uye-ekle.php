<?php 

	include '../../config.php';

	$u = $_POST['u'];
	$c = $_POST['c'];
	$c = $_POST['r'];
	$cl = $_POST['cl'];
	$t = $_POST['t'];
	$k = $_POST['k'];

	$check = $database->query("SELECT * FROM uyeler WHERE user = '$u'");
	if ($check->num_rows>0) {
		?><script>bildirim("Böyle bir kullanıcı zaten mevcut")</script><?php
	}

	if ($u == null) {
		?><script>bildirim("Lütfen Kullanıcı Adı Girin")</script><?php
	}
	else if ($c == "0" AND $r == "0" AND $cl == "0" AND $t == "0" AND $k == "0") {
		?><script>bildirim("En Az Bir Rol Vermeniz Gerekmektedir")</script><?php
	} else {

		$pass = createpass();

		$p = openssl_encrypt($pass, $sifreMethod, $sifreKey);

		$database->query("INSERT INTO uyeler (user,pass,ceviri_st,clean_st,redakte_st,typeset_st,kontrol_st) VALUES ('".$u."','".$p."','".$c."','".$r."','".$cl."','".$t."','".$k."')");

		echo "<span id='user-pass-div'>".$pass."</span><span id='copy-pass'><i class='fas fa-copy'></i></span>";


		ekip_log($userDB['user']." az önce ".$u." kullanıcısını ekledi.");

		?>
		<script>
			document.getElementById('uye-ekle-pass').style.padding="15px 20px";
			bildirim("Üye Başarıyla Eklendi");
			setTimeout(function(){kopyala("#uye-ekle-pass #copy-pass","#uye-ekle-pass #user-pass-div");},200);
		</script><?php
	}
?>