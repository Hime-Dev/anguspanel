<h3 class="sekmeBaslik">Duyuru Ekle</h3>
<form action="" method="post">
	
	<input type="text" required name="duyuru-baslik" id="duyuru-baslik" placeholder="Duyuru Başlığı">
	<textarea  name="duyuru_editor" id="duyuru_editor"></textarea>

	<div><input type="submit" class="bolum-gonder duyuru-gonder" value="Duyuruyu Yayımla"></button></div>

</form>
<div>
<?php echo $_POST['duyuru_editor'] ?>
</div>

<?php 
	
	if ($_POST) {
		$heading = $_POST['duyuru-baslik'];
		$content = str_replace("'", "&#39;",$_POST['duyuru_editor']);
		$tarih = date("Y-m-d H:i:s");


		if($database->query("INSERT INTO duyurular (user_id,baslik,icerik,tarih) VALUES ('".$userDBID."','".$heading."','".$content."','".$tarih."')")) {
			?>
				<script>window.location = "<?php echo $siteurl?>admin/duyuru";</script>
			<?php 
		} else {
			echo "Bir Hata ile Karşılaşıldı. Hata Kodu: ".$database->errno;
		}
	}

?>