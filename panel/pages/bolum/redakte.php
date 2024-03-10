<?php 
	$findCh = $database->query("SELECT * FROM bolumler WHERE id = '$id'");
	$ch = $findCh->fetch_assoc();
	$mangaID = $ch['manga_id'];

	$findManga = $database->query("SELECT * FROM seriler WHERE id = '$mangaID'");
	$manga = $findManga->fetch_assoc();

	$mangaURL = url_cevir($manga['manga_name']);
	$bolumURL = "bolum-".$ch['bolum_no'];

	$tmp_file 		= "../../chapters/ceviri/".$mangaURL."/tmp_bolum-".$ch['bolum_no'].".txt";

	$chapter_file 	= "../../chapters/ceviri/".$mangaURL."/bolum-".$ch['bolum_no'].".txt";

	if (file_exists($tmp_file)) {
		unlink($tmp_file);
	}
?>

<h3 class="sekmeBaslik">Bölüm <?php echo $bolum['bolum_no'] ?></h3>


<h1>Redakte</h1>

<div class="bolum-top">
	<div class="links">
		<span class="white-box"><?php echo $seri['manga_name'] ?></span>
		<a href="<?php echo $seri['ceviri_kaynak'] ?>" target="_blank" class="bolum-link">
			Serinin Kaynağına Git
		</a>
		<a href="<?php echo $siteurl."chapters/ceviri/".$mangaURL."/bolum-".$ch['bolum_no'].".txt"?>" download target="_blank" class="bolum-link">
			Çeviriyi İndir
		</a>
		<span class="bolum-link" id="kavram-button">
			<i class="fa-solid fa-clipboard-list"></i> Kavram Defteri
		</span>
		<span class="bolum-link" id="bolumu-birak">Bölümü Bırak</span>
	</div>
	<div class="info">
		<i class="fa-solid fa-circle-info"></i>
		<p>
			Serinin kaynağına gidip kaynaktan çeviriyor olduğunuz bölüme girin. Bölümün çevirisini bir txt dosyasına uygun formatta yazdıktan sonra aşağıdaki yükleme alanına çevirinizi bırakın. Gönder butonuna tıkladığınızda bölümünüz sisteme kaydedilecektir.
		</p>
	</div>
</div>


<div style="box-sizing:border-box;padding:15px;" id="bolum-panel">

	<fieldset style="margin-bottom: 35px">
		<legend>Çevirmen Notu</legend>
		<?php if ($bolum['cevirmen_note'] != null) {
			echo $bolum['cevirmen_note'];
		} else {
			echo "<span style='opacity: 0.5'>Not Bırakılmamış...</span>";
		} ?>
	</fieldset>


	<script>
	  Dropzone.options.uploadCeviri = {
		  	acceptedFiles: ".txt",
		  	dictDefaultMessage: "TXT dosyasını yükle.",
	  };
	</script>
	<form action="<?php echo $siteurl ?>assets/ajax/dropzone/ceviri-yukle.php?ch=<?php echo $id ?>" class="dropzone" id="uploadCeviri"></form>



	<textarea placeholder="Buradan Bölümün Çevirmenine Geri Bildirim Gönderebilirsiniz" class="placeanote"></textarea>

	<div class="bolum-sayfasi_bot">
		<div id="redakte-gonder" class="bolum-gonder">
			Bölümü Gönder
		</div>		
	</div>

</div>

<div id="kavram-defteri" class="popup">
	<div class="popup-inner">
		<h4><?php echo $seri['manga_name'] ?> Kavramlar Listesi</h4>
		<div id="kavramlari-kapat" class="popup-kapat">
			<i class="fa-solid fa-xmark"></i>
		</div>
		<div class="kavram-ara">
			<input type="search" id="kavram-ara" placeholder="Kavram Ara">
		</div>	

		<ul class="popup-list">

			<li class="kavramlar-list-item">
				<span>İngilizce</span>
				<span>Türkçe</span>
				<span>Ekleyen</span>
				<span></span>
			</li>

			<li class="kavramlar-list-item">
				<span>Spiritual Road</span>
				<span>Ruhani Yol</span>
				<span>Kamikato</span>
				<span><i class="fas fa-pen"></i></span>
			</li>
		</ul>
		<button id="kavram-ekle" style="display:block">
			<i class="fas fa-plus" style="color:white"></i> Kavram Ekle
		</button>
		<div id="kavram-ekle_input" style="display:none">
			<input type="text" id="kavram-ingilizce" placeholder="İngilizce">
			<input type="text" id="kavram-turkce" placeholder="Türkçe">
			<span id="kavram_onay"><i class="fa-solid fa-check"></i></span>
			<span id="kavram_iptal"><i class="fa-solid fa-xmark"></i></span>
		</div>
		<span style="position:absolute;right:0px;background: lightgray;padding: 5px 10px;border-top-left-radius: 5px;color: rgba(0,0,0,30%);box-shadow: 0 0 5px rgba(0,0,0,55%);cursor:pointer;" onclick="document.getElementById('editingKavramlar').checked = false;document.querySelector(':root').style.setProperty('--kavram','block')">Hatayla karşılaşırsanız buraya tıklayın</span>
	</div>
</div>




<div id="kavram-guncelle"></div>
<div id="kavram-kaynak" style="display: none;"><ul></ul></div>
<input type="checkbox" id="editingKavramlar" style="display: none">

<script>
	kavramEkle(<?php echo $seri['id'] ?>,<?php echo $userDBID ?>,"kavram_onay","kavram-ingilizce","kavram-turkce");
	setInterval(function() {kavramGuncelle(<?php echo $seri['id'] ?>,"kavram-ara");}, 100);
</script>

<?php if ($ceviri_st == "0" OR $ceviri_st == "1") { ?>
	<style>
		li.kavramlar-list-item span {width: 50%;}
	</style>
<?php } ?>


