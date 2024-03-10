<?php 

	include '../../../config.php';

	if(!empty($_FILES)) {

		if($clean_st == 0) {
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

		$manga_folder = "../../../chapters/edit/".$mangaURL;
		$chapter_folder = "../../../chapters/edit/".$mangaURL."/bolum-".$ch['bolum_no'];
		$tmp_folder = "../../../chapters/edit/".$mangaURL."/bolum-".$ch['bolum_no']."/tmp";

		if (!file_exists($manga_folder)) {
			mkdir($manga_folder);
		}

		if (!file_exists($chapter_folder)) {
			mkdir($chapter_folder);
		}

		if (!file_exists($tmp_folder)) {
			mkdir($tmp_folder);
		}

		$file_source = $_FILES['file']['tmp_name'];
		$location = $tmp_folder."/".$_FILES['file']['name'];

		move_uploaded_file($file_source, $location);
	}

?>