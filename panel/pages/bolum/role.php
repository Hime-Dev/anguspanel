<?php 

if (isset($_GET['role'])) {
	$role = $_GET['role'];
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

require '../../header.php';
require '../../leftsidebar.php';

$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$id'");
$bolum = $bolum->fetch_assoc();

$seriID = $bolum['manga_id'];
$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'");
$seri = $seri->fetch_assoc();

if ($role == "ceviri") {
	$uRole = "cevirmen";
} else if ($role == "redakte") {
	$uRole = "redaktor";
} else if ($role == "clean") {
	$uRole = "cleaner";
} else if ($role == "typeset") {
	$uRole = "typesetter";
} else if ($role == "kontrol") {
	$uRole = "kontrolcu";
}


?>

<span id="getchapter" style="display:none"><?php echo $bolum['id'] ?></span>
<span id="getrole" style="display:none"><?php echo $uRole ?></span>

<div class="container bolumcontent">
	

	<?php
		if($role == "son" AND $admin == true) { ?>
			<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
			<?php require "son.php";
		}
		else if ($bolum[$uRole] != $userDBID)
			echo "Bir hata meydana geldi. Bölüm size ait olmayabilir veya URL yazımında bir hata olabilir.";	
		else {
	?>
		<img src="<?php echo $siteurl.$seri['manga_cover'] ?>" alt="">
			<?php require $role.".php";
		}
	?>
	

	<div id="bolumu-birak-popup" class="popup">
		<div class="popup-inner">
			<div class="popup-kapat" id="bolumu-birak-kapat">
				<i class="fa-solid fa-xmark"></i>
			</div>
			<h3>Bu Bölümü Bırakmak istediğinize Emin Misiniz?</h3>
			<span>Eğer Bölümü Bırakırsanız Başka Birisi Kendi Üstüne Alabilir. Bölüme Başladıysanız ve Yeterli Vaktiniz varsa Yapıp Göndermeniz Tavsiye Edilir.</span>
			<div class="user-ch_buttons">
				<button id="bolumu-birak-onay" class="popup-button" style="background: green">
					Evet
				</button>
				<button id="bolumu-birak-iptal" class="popup-button" style="background: darkred">
					Hayır
				</button>
			</div>
		</div>
	</div>

</div>

<?php
require '../../rightsidebar.php';
require '../../footer.php';
?>