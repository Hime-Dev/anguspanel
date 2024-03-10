<?php 
	include '../../config.php';
	
	$id = $_POST['id'];

	if($additional == "admin") {
		$cookieArray = array("admin"=>$userDBID,"pass"=>$userDB['pass']);
		$cookieArray = json_encode($cookieArray);
		setcookie("admin",$cookieArray,time()+60*30,'/');

		$hedef = $database->query("SELECT * FROM uyeler WHERE id = '$id'")->fetch_assoc();
		ekip_log($userDB['user'].", ".$hedef['user']." kullanıcısının hesabına girdi.");

		$_SESSION['id'] = $id;
	}
	else if (isset($_COOKIE['admin'])) {
	    $cookie = json_decode($_COOKIE['admin'], true);
	    $userid = $cookie['admin'];
	    $pass = $cookie['pass'];
	    if($user = $database->query("SELECT * FROM uyeler WHERE id = '$userid'")) {
	        $user = $user->fetch_assoc();
	        if ($user['pass'] == $pass) {	
				$hedef = $database->query("SELECT * FROM uyeler WHERE id = '$id'")->fetch_assoc();
				ekip_log($userDB['user'].", ".$hedef['user']." kullanıcısının hesabına girdi.");
	            $_SESSION['id'] = $id;
	        }
	    }
	}
	else {

		$hedef = $database->query("SELECT * FROM uyeler WHERE id = '$id'")->fetch_assoc();
		ekip_log($userDB['user']." HACK YAPIYOR, ".$hedef['user']." KULLANICISININ HESABINA GİRMEYE ÇALIŞTI. YAKIN!");
		echo "Yer mi lan Kanada Çocuğu";
	}



?>

<script>
	window.location = "<?php echo $siteurl ?>bolumler";
</script>