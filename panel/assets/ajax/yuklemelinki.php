<script>
	document.getElementById("hazir-getiriliyor").innerHTML= "Linkler oluşturuluyor...";
</script>
<?php 
	
	include '../../config.php';
	$chID = $_POST['chapter'];

	$bolum = $database->query("SELECT * FROM bolumler WHERE id = '$chID'")->fetch_assoc();

	$seriID = $bolum['manga_id'];
	$seri = $database->query("SELECT * FROM seriler WHERE id = '$seriID'")->fetch_assoc();

	$cevirmenID		= $bolum['cevirmen'];
	$redaktorID 	= $bolum['redaktor'];
	$cleanerID 		= $bolum['cleaner'];
	$typesetterID 	= $bolum['typesetter'];
	$kontrolID 	= $bolum['kontrolcu'];

	$cevirmen = $database->query("SELECT * FROM uyeler WHERE id = '$cevirmenID'")->fetch_assoc();
	$redaktor = $database->query("SELECT * FROM uyeler WHERE id = '$redaktorID'")->fetch_assoc();
	$cleaner = $database->query("SELECT * FROM uyeler WHERE id = '$cleanerID'")->fetch_assoc();
	$typesetter = $database->query("SELECT * FROM uyeler WHERE id = '$typesetterID'")->fetch_assoc();
	$kontrolcu = $database->query("SELECT * FROM uyeler WHERE id = '$kontrolID'")->fetch_assoc();


	$cevirmenU		= $cevirmen['user'];
	$redaktorU		= $redaktor['user'];
	$cleanerU		= $cleaner['user'];
	$typesetterU	= $typesetter['user'];
	$kontrolU		= $kontrolcu['user'];

	$mangaURL = url_cevir($seri['manga_name']);
	$chURL = "bolum-".$bolum['bolum_no'];
	
	$dizin = "../../chapters/typeset/".$mangaURL."/".$chURL;
	$dizin2 = "https://mangaefendisi.net/ekip/chapters/typeset/".$mangaURL."/".$chURL."/";

	$links = "&lt;img src=&quot;".$dizin2."!!!0kapak.jpg&quot; class=&quot;alignnone size-full wp-image-25580&quot;&gt;<br><br>";
	//$links = "";
	$pages = scandir($dizin);
	natsort($pages);
	foreach ($pages as $page) {
		if ($page == "." || $page == "..") continue;
		$links = $links."&lt;img src=&quot;".$dizin2.$page."&quot; class=&quot;alignnone size-full wp-image-25580&quot;&gt;<br><br>";
	}

	//ekip_log($userDB['user'].", ".$seri['manga_name']." ".$bolum['bolum_no']." kodlarını aldı.");

?>
<script>
	document.querySelector("#hazir-popup .zip-linki span:first-child").innerHTML = "<?php echo $links ?>";

	
	document.querySelector("#manga-kapak .kapak-img img").src = "<?php echo $siteurl.$seri['manga_cover'] ?>";
	document.querySelector("#manga-kapak .manga-isim2 h2").innerHTML = "<?php echo str_replace("i","I",$seri['manga_name']) ?>";
	document.querySelector("#manga-kapak .manga-isim h2").innerHTML = "<?php echo $bolum['bolum_no'] ?>.";

	document.getElementById("inp-cevirmen").innerHTML = "<?php echo $cevirmenU ?>";
	if ("<?php echo $redaktorU ?>".length > 1 ) {document.getElementById("inp-redaktor").innerHTML = "<?php echo $redaktorU ?>";}
	document.getElementById("inp-cleaner").innerHTML = "<?php echo $cleanerU ?>";
	document.getElementById("inp-redrawer").innerHTML = "<?php echo $typesetterU ?>";
	document.getElementById("inp-typesetter").innerHTML = "<?php echo $kontrolU ?>";
 
	setTimeout(function(){htmlTOcanvas("manga-kapak","canvas");},1000);
	setTimeout(function(){
		saveCanvasImage("<?php echo $dizin."/!!!0kapak.jpg" ?>");
		setInterval(function() {
			var x = document.getElementById("resimkayit").innerHTML;
			if(x == "1") {
				document.getElementById("ajax-msg").innerHTML = "";
			}

			document.querySelector("canvas").remove();

		},100);
		
	}, 2000);
	document.getElementById("getchapter").innerHTML = "<?php echo $chID ?>";
</script>