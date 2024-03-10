<h3 class="sekmeBaslik">Bildirim Gönder</h3>
<form action="" method="post">
	
	<input type="text" required name="bildirim-baslik" id="bildirim-baslik" placeholder="Bildirim Başlığı">
	<textarea  name="bildirim_editor"></textarea>
	<select name="bildirim_hedefi" required>
		<option value="0" disabled selected>Kime Gönderilecek?</option>
		<optgroup label="Toplu Bildirim">
			<option value="a1">Herkes</option>
			<option value="a2">Modlar</option>
			<option value="a3">Çevirmenler</option>
			<option value="a4">Cleanerlar</option>
			<option value="a5">Typesetterlar</option>
		</optgroup>
		<optgroup label="Kullanıcılar">
			<?php 
				$uyeler = $database->query("SELECT * FROM uyeler");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
						<option value="<?php echo $uye['id'] ?>"><?php echo $uye['user'] ?></option>
					<?php
				}
			?>
		</optgroup>
	</select>

	<div><input type="submit" class="bolum-gonder bildirim-gonder" value="Bildirim Gönder"></button></div>

</form>

<?php 

	if (isset($_POST) AND $_POST['bildirim_hedefi'] != "0") {

		date_default_timezone_set('Europe/Istanbul');
		$heading = $_POST['bildirim-baslik'];
		$content = $_POST['bildirim_editor'];
		$hedef = $_POST['bildirim_hedefi'];

		$check = substr($hedef,0,1);
		

		//Rol ise
		if ($check == "a") {
			if ($hedef == "a1") {
				$uyeler = $database->query("SELECT * FROM uyeler");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
					<script>
						var hedef = "member";
						var id = <?php echo $uye['id'] ?>;
						var type = "1";
						var baslik = "<?php echo $heading ?>";
						var icerik = "<?php echo $content ?>";
						sendNotification(hedef,id,type,baslik,icerik);
					</script>
					<?php					
				}
			}
			else if ($hedef == "a2") {
				$uyeler = $database->query("SELECT * FROM uyeler WHERE additional_role = 'mod'");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
					<script>
						var hedef = "member";
						var id = <?php echo $uye['id'] ?>;
						var type = "1";
						var baslik = "<?php echo $heading ?>";
						var icerik = "<?php echo $content ?>";
						sendNotification(hedef,id,type,baslik,icerik);
					</script>
					<?php					
				}
			}
			else if ($hedef == "a3") {
				$uyeler = $database->query("SELECT * FROM uyeler WHERE ceviri_st = '1'");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
					<script>
						var hedef = "member";
						var id = <?php echo $uye['id'] ?>;
						var type = "1";
						var baslik = "<?php echo $heading ?>";
						var icerik = "<?php echo $content ?>";
						sendNotification(hedef,id,type,baslik,icerik);
					</script>
					<?php					
				}
			}
			else if ($hedef == "a4") {
				$uyeler = $database->query("SELECT * FROM uyeler WHERE clean_st = '1'");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
					<script>
						var hedef = "member";
						var id = <?php echo $uye['id'] ?>;
						var type = "1";
						var baslik = "<?php echo $heading ?>";
						var icerik = "<?php echo $content ?>";
						sendNotification(hedef,id,type,baslik,icerik);
					</script>
					<?php					
				}
			}
			
			else if ($hedef == "a5") {
				$uyeler = $database->query("SELECT * FROM uyeler WHERE typeset_st = '1'");
				while ($uye = $uyeler->fetch_assoc()) {
					if ($uye['status'] == "left" OR $uye['status'] == "banned") continue;
					?>
					<script>
						var hedef = "member";
						var id = <?php echo $uye['id'] ?>;
						var type = "1";
						var baslik = "<?php echo $heading ?>";
						var icerik = "<?php echo $content ?>";
						sendNotification(hedef,id,type,baslik,icerik);
					</script>
					<?php					
				}
			}
			
		}

		//Üye İse
		else {
			?>
			<script>
				var hedef = "member";
				var id = <?php echo $hedef ?>;
				var type = "1";
				var baslik = "<?php echo $heading ?>";
				var icerik = "<?php echo $content ?>";
				sendNotification(hedef,id,type,baslik,icerik);
			</script>
			
			<?php
		}


	}
?>