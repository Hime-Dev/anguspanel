<?php

$role = $_GET['role'];

$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$id'");
$bolum = $bolum->fetch_assoc();

$mangaID = $bolum['manga_id'];
$manga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
$manga = $manga->fetch_assoc();

$manga_url = url_cevir($manga['manga_name']);

$kaynak = "../../chapters/typeset/".$manga_url."/bolum-".$bolum['bolum_no'];

if(!$sayfalar = scandir($kaynak)) echo $kaynak;
natsort($sayfalar);

if ($role == "son") {
	$kontrolMetni = $bolum['kontrol_metni'];
	$kontrol = explode("[[inputTextBox]]", $kontrolMetni);
}

$i = 1;
$l = 0;
foreach ($sayfalar as $sayfa) {
	if ($sayfa =='.' || $sayfa == '..' || $sayfa == 'tmp' || $sayfa == 'clean')	continue;
		$sayfaNo = str_replace(".","",preg_replace('/[^.%0-9]/', '', $sayfa));
	?>
	<div class="reader-image">
		<?php if ($role == "son") { ?>
			<form action="<?php echo $siteurl ?>assets/ajax/dropzone/kontrol-yukle.php?ch=<?php echo $id ?>&s=<?php echo $sayfa ?>" class="dropzone"></form>
		<?php } ?>
		<img class="lazy" src='https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif' data-src="<?php echo $siteurl."chapters/typeset/".$manga_url."/bolum-".$bolum['bolum_no']."/".$sayfa ?>?r=<?php echo time() ?>">

		<div class="reader-image-tools">
			
			<?php if ($role == "son") { ?>
				<a download target="_blank" href="../../chapters/typeset/<?php echo $manga_url."/bolum-".$bolum['bolum_no']."/".$sayfa ?>?r=<?php echo $bolum['typeset_teslim'] ?>" class="download-image">İndir</a>
				<?php if ($kontrol[$l] != ""): ?>
					<span class="kontrolcu_text"><?php echo $kontrol[$l] ?></span>
				<?php endif ?>
			<?php } else { ?>
				<input type="text" class="kontrolInput" placeholder="Sayfaya Not Brak">
			<?php } ?>
			<span><?php echo $sayfa ?></span>
		</div>
	</div>
	<?php 
		$i = $i+1;
		$l++;
	}
?>

<div class="reader">
	





</div>