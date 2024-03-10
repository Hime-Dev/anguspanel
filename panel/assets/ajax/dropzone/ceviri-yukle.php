<?php 

	include '../../../config.php';

	if(!empty($_FILES)) {

		if($ceviri_st == 0) {
			die();
		}

		$chID = $_GET['ch'];

		$findCh = $database->query("SELECT * FROM bolumler WHERE id = '$chID'");
		$ch = $findCh->fetch_assoc();
		$mangaID = $ch['manga_id'];

		$findManga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
		$manga = $findManga->fetch_assoc();

		$mangaURL = url_cevir($manga['manga_name']);
		$bolumURL = "bolum-".$ch['bolum_no'];

		$manga_folder 	= "../../../chapters/ceviri/".$mangaURL;
		$chapter_file 	= "../../../chapters/ceviri/".$mangaURL."/bolum-".$ch['bolum_no'].".txt";
		$tmp_file 		= "../../../chapters/ceviri/".$mangaURL."/tmp_bolum-".$ch['bolum_no'].".txt";

		if (!file_exists($manga_folder)) {
			mkdir($manga_folder);
		}

		$file_source = $_FILES['file']['tmp_name'];

		move_uploaded_file($file_source, $tmp_file);
	}

?>