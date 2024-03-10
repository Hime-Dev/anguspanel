<?php 

	include '../../config.php';

	$hedef = $_POST['hedef'];
	$id = $_POST['id'];
	$type = $_POST['type'];
	$heading =  str_replace("'", "&#39;",$_POST['baslik']);
	$content =  str_replace("'", "&#39;",$_POST['icerik']);
	if ($_POST['tarih'] == "")
		$tarih = date("Y-m-d H:i:s");
	else 
		$tarih = $_POST['tarih'];
	if ($hedef == "member")
		$database->query("INSERT INTO notifications (user_id,type,heading,content,date) VALUES ('".$id."','".$type."','".$heading."','".$content."','".$tarih."')");
	else if ($hedef == "role") {
		$users = $database->query("SELECT * FROM uyeler WHERE additional_role = '$id'");
		while ($user = $users->fetch_assoc()) {
			$uID = $user['id'];
			$database->query("INSERT INTO notifications (user_id,type,heading,content,date) VALUES ('".$uID."','".$type."','".$heading."','".$content."','".$tarih."')");
		}
	}

?>