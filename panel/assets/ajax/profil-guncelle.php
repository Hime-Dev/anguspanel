<?php    
	include '../../config.php';
    if($_FILES){        
            function renamefile($filename) {
                $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
                $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
                $filename = strtolower(str_replace($find, $replace, $filename));
                $filename = str_replace(' ', '-', $filename);
                return $filename;
            }
        
        $uploadfolder = '../../';
        $file = $_FILES['profile-photo'];
        
        $formats = array("image/pjpeg", "image/jpeg", "image/gif", "image/bmp", "image/x-png", "image/png");
        
        $url_decode = urldecode($file['name']);
        $name = explode('/', $url_decode);
        $rand = time();
        if (in_array($file['type'], $formats)) {
        	
        	$filename = "media/".$userDB['user']."-".$userDBID."-".date('dmY-Hms')."-".$name[count($name) - 1];
            $upload_file = $uploadfolder.$filename;
            move_uploaded_file($file['tmp_name'], $upload_file);
        }
        else {
        	$filename = $userDB['profile'];
        }
    }

    $username 	= $_POST['user_username'];
    $password 	= openssl_encrypt($_POST['user_password'], $sifreMethod, $sifreKey);
    $about 		= $_POST['user_about'];
    $ucretli    = $_POST['ucretli'];
    if ($ucretli == "1") {
        $ad_soyad   = $_POST["iban_ad-soyad"];
        $iban       = $_POST['iban'];
    } else {
        $ad_soyad   = $userDB['ad_soyad'];
        $iban       = $userDB['iban'];
        $checkCeza  = $database->query("SELECT * FROM ceza_sistemi WHERE user_id = '$userDBID'");
        $tarih = date("Y-m-d H:i:s");
        if ($checkCeza->num_rows > 0) 
            $database->query("UPDATE ceza_sistemi SET gonullu_tarih = '$tarih' WHERE user_id = '$uyeDBID'");
        else $database->query("INSERT INTO ceza_sistemi (user_id, gonullu_tarih) VALUES ('$userDBID','$tarih')");
    }

    if($database->query("UPDATE uyeler SET
        user = '$username',
        pass = '$password',
        profile = '$filename',
        about = '$about',
        ucretli = '$ucretli',
        ad_soyad = '$ad_soyad',
        iban = '$iban'
    WHERE id = '$userDBID'")) {

        ekip_log($userDB['user'].", profilini güncelledi.");
    	?>
    	<script>
    		bildirim("Profiliniz Başarıyla Güncellendi!");
    	</script>
    	<?php
    } else {
    	?>
    	<script>
    		bildirim("Profil Güncellenirken Bir Hata Meydana Geldi, Admine Danışın.");
    	</script>
    	<?php
    }





?>