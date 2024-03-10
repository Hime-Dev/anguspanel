<?php 

	include '../../config.php';

	$uyeID = $_POST['chapter'];
	$uye = $database->query("SELECT * FROM uyeler WHERE id  ='$uyeID'");
	$uye = $uye->fetch_assoc();

	$talep = $database->query("SELECT * FROM donen_talepler WHERE user_id = '$uyeID' AND onay = '0'");
	$talep = $talep->fetch_assoc();
	?>
	<script>
		document.querySelector("#ekibe-al-popup h3 span").innerHTML = "<?php echo $uye['user'] ?>";
		document.querySelector("#ekibe-al-popup .user-ch_buttons span#uyeID").innerHTML = "<?php echo $uyeID ?>";
		document.querySelector("#ekibe-al-popup .popup-inner b + span").innerHTML = "<?php echo $talep['talep'] ?>";

		document.querySelector("#ekibe-almayi-reddet-popup h3 span").innerHTML = "<?php echo $uye['user'] ?>";
		document.querySelector("#ekibe-almayi-reddet-popup .user-ch_buttons span#uyeID").innerHTML = "<?php echo $uyeID ?>";
		document.querySelector("#ekibe-almayi-reddet-popup .popup-inner b + span").innerHTML = "<?php echo $talep['talep'] ?>";
	</script>
	<?php

?>