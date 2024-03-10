<?php 
	include '../../config.php';
	$seriID = $_POST['seri'];
	$ekleyen = $_POST['ekleyen'];
	$en = $_POST['ingilizce'];
	$tr = $_POST['turkce'];

	
	$tr = str_replace('"','&#34;',str_replace("'", "&#39;", $tr));
	$en = str_replace('"','&#34;',str_replace("'", "&#39;", $en));

	if ($_POST['ingilizce'] == "" OR $_POST['turkce'] == "") {
		?><script>bildirim("Kayıt Başarısız!")</script><?php
		die();
	}

	$kontrol = $database->query("SELECT * FROM kavramlar WHERE manga_id = '$seriID' AND ingilizce = '$en'");

	if($kontrol->num_rows>0) {
		?><script> bildirim("Bu Kavram Zaten Eklenmiş!") </script><?php
	} else {
		$database->query("INSERT INTO kavramlar (manga_id,ekleyen,ingilizce,turkce) VALUES ('".$seriID."','".$ekleyen."','".$en."','".$tr."')");

			ekip_log($userDB['user'].", ".$en."=>".$tr." kavramını ekledi");

			?><script>bildirim("Kavram Başarıyla Eklendi!")</script><?php
	} 



?>