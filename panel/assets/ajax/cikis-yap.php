<?php 
	include '../../config.php';
	ekip_log($userDB['user']." çıkış yaptı.");
	$_SESSION['id'] = null;
	setcookie("user","",time()-60*60*24*7,"/");
	echo "<script>window.location='".$siteurl."';</script>"
?>