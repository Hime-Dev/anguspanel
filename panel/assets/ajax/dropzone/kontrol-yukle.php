<?php 

	include '../../../config.php';

	if(!empty($_FILES)) {

		if($kontrol_st == 0) {
			die();
		}

		$chID = $_GET['ch'];
		$sayfa = $_GET['s'];

		$findCh = $database->query("SELECT * FROM bolumler WHERE id = '$chID'");
		$ch = $findCh->fetch_assoc();
		$mangaID = $ch['manga_id'];

		$findManga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
		$manga = $findManga->fetch_assoc();

		$mangaURL = url_cevir($manga['manga_name']);
		$bolumURL = "bolum-".$ch['bolum_no'];

		$manga_folder = "../../../chapters/typeset/".$mangaURL;
		$chapter_folder = "../../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no'];
		$tmp_folder = "../../../chapters/typeset/".$mangaURL."/bolum-".$ch['bolum_no']."/tmp";

		if (!file_exists($tmp_folder)) {
			mkdir($tmp_folder);
			echo "yeni tmp klasörü oluşturuldu<br>";
		}
		else {
			echo "tmp klasörü zaten bulunuyor<br>";
		}

		$file_source = $_FILES['file']['tmp_name'];
		$location = $tmp_folder."/".$sayfa;

		if(move_uploaded_file($file_source, $location)) {
			echo "oluşturulan klasöre sayfa eklendi<br>";
		}
	}

	else {
		echo "sayfa bulunmuyor<br>";
	}

?>