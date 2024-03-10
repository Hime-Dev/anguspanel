<?php 
	
	require '../../config.php';


	$ch = $_POST['ch'];
	$role = $_POST['role'];

	if($database->query("UPDATE bolumler SET ".$role." = null WHERE id = '$ch'")) {

		$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$ch'")->fetch_assoc();
		$seri = $database->query("SELECT * FROM seriler WHERE id = '".$bolum['manga_id']."'")->fetch_assoc();
		ekip_log($userDB['user']." üzerindeki ".$seri['manga_name']." ".$bolum['bolum_no']." ".$role." Bölümünü Bıraktı.");
		
		?><script>window.location = "<?php echo $siteurl?>bolumler"</script><?php
	}

?>