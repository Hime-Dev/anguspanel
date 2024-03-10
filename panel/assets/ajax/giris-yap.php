<?php 

include '../../config.php';

error_reporting(0);

$username = $_POST['user'];
$pass = $_POST['pass'];
$reme = $_POST['reme'];


$enc_pass = openssl_encrypt($pass, $sifreMethod, $sifreKey);

if($user = $database->query("SELECT * FROM uyeler WHERE user = '$username'")) {
	$user = $user->fetch_assoc();
	if ($user['pass'] == $enc_pass) {
		if ($reme == "true") {
			$cookieArray = array("user"=>$username,"pass"=>$enc_pass);
			$cookieArray = json_encode($cookieArray);
			setcookie("user",$cookieArray,time()+60*60*24*7,'/');
		}
		$_SESSION['id'] = $user['id'];
		ekip_log($username." giriş yaptı.");
		echo "<script>window.location='".$siteurl."';</script>";
	}
	else {
		echo "<script>document.getElementById('attention').style.display = 'block';</script>";
		echo "Kullanıcı adı veya şifre hatalı<br>";
	}
}

?>