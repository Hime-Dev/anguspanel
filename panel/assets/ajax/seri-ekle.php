
<?php
	include '../../config.php';

	$name = $_POST['seri-ekle-name'];
	$name = str_replace("'", "&#39;", str_replace("?","",str_replace("&","",$name)));
	$min = $_POST['seri-ekle-min'];
	$max = $_POST['seri-ekle-max'];
	$categories = $_POST['seri-ekle-categories'];
	$type = $_POST['seri-ekle-type'];
	$ceviri_kaynak = $_POST['seri-ekle-ceviri'];
	$clean_kaynak = $_POST['seri-ekle-clean'];
	$ceviri_kaynak = str_replace("'", "&#39;", $ceviri_kaynak);
	$clean_kaynak = str_replace("'", "&#39;", $clean_kaynak);

	if ($name == null OR $min == null OR $max == null OR $categories == null OR $type == null OR $ceviri_kaynak == null OR $clean_kaynak == null OR $_FILES['seri-ekle-photo']['name'] == null) {
		?><script>bildirim("Lütfen Tüm Alanları Doldurun")</script><?php
		die();
	}
    
    $uploadfolder = '../../';
    $file = $_FILES['seri-ekle-photo'];
    
    $formats = array("image/pjpeg", "image/jpeg", "image/gif", "image/bmp", "image/x-png", "image/png");
    
    $url_decode = urldecode($file['name']);
    $fName = explode('/', $url_decode);
    $rand = time();
    if (in_array($file['type'], $formats)) {
    	$kapak = url_cevir(str_replace("&#39","",$name)).".jpg";
    	$filename = "covers/".$kapak;
        $upload_file = $uploadfolder.$filename;
        move_uploaded_file($file['tmp_name'], $upload_file);
    }
    $cumleler = $min." - ".$max;
	if ($type == "1") {

		//HERKESE AÇIK SERİLER
		$database->query("INSERT INTO seriler (manga_name,manga_cover,cumleler,turler,ceviri_kaynak,clean_kaynak,availability) VALUES ('".$name."','".$filename."','".$cumleler."','".$categories."','".$ceviri_kaynak."','".$clean_kaynak."','0')");

		ekip_log($userDB['user']." ".$name." isimli bir seri ekledi.");


		?><script>bildirim("Seri Başarıyla Eklendi")</script><?php
	}
	else if ($type == "2") {
		if (!isset($_POST['seri-ekle-cevirmen']) OR !isset($_POST['seri-ekle-cleaner']) OR !isset($_POST['seri-ekle-typesetter'])) {
			?><script>bildirim("Lütfen Tüm Alanları Doldurun")</script><?php
			die();
		}
		else {

			//KİŞİYE ÖZEL SERİLER

			$cevirmen = $_POST['seri-ekle-cevirmen'];
			$cleaner = $_POST['seri-ekle-cleaner'];
			$typesetter = $_POST['seri-ekle-typesetter'];

			$database->query("INSERT INTO seriler (manga_name,manga_cover,cumleler,turler,ceviri_kaynak,clean_kaynak,availability,cevirmen,cleaner,typesetter) VALUES ('".$name."','".$filename."','".$cumleler."','".$categories."','".$ceviri_kaynak."','".$clean_kaynak."','1','".$cevirmen."','".$cleaner."','".$typesetter."')");


			ekip_log($userDB['user']." ".$name." isimli bir seri ekledi.");

			?><script>bildirim("Seri Başarıyla Eklendi")</script><?php
		}
	}
?>