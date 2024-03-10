<?php 
	include '../../config.php';

	$id = "admin";
	$type = "3";
	$heading = $userDB['user']." Ekipten Ayrıldı.";
	$content = $userDB['user']." az önce ekipten ayrıldı.";
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

	
	if($database->query("UPDATE uyeler SET status = 'left' WHERE id = '$userDBID'")) {
		$tarih = date("Y-m-d H:i:s");
		$database->query("UPDATE uyeler SET ayrilik = '$tarih' WHERE id = '$userDBID'");

		ekip_log($userDB['user']." Ekipten Ayrıldı");
	?>
	<script>
		window.location.reload();
	</script>
	<?php
	}
	
?>