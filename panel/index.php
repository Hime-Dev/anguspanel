<?php
require 'header.php';
require 'leftsidebar.php';
?>

	<div class="container">
		<div class="content">
			<?php 

				$duyurular = $database->query("SELECT * FROM duyurular ORDER BY tarih DESC");

				while ($duyuru = $duyurular->fetch_assoc()) {
					$duyuruUserId = $duyuru['user_id'];
					$gonderen = $database->query("SELECT * FROM uyeler WHERE id = '$duyuruUserId'");
					$gonderen = $gonderen->fetch_assoc();
			?>
			<div class="duyuru">
				<div class="profile">
					<div class="profile-pic">
						<img class="lazy" src="https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" data-src="<?php 
							if(!$gonderen['profile'] == null) {
								echo $siteurl.$gonderen['profile'];
							}

							else {
								echo $siteurl."assets/img/profile.jpg";
							}
						?>" alt="Profil Resmi">
					</div>
					<div class="user-name">
						<?php echo $gonderen['user'] ?>
					</div>
				</div>
				<div class="tarih">
					<?php echo gecen_sure($duyuru['tarih']) ?>
				</div>
				<h4 class="duyuru-baslik">
					<?php echo $duyuru['baslik'] ?>
				</h4>
				<div class="duyuru-icerik">
					<?php echo $duyuru['icerik'] ?>
				</div>
				<?php if ($additional == "admin" OR $additional == "mod") { ?>
					<div class="duyuru-sil" onclick="duyurusil('<?php echo $duyuru['id'] ?>')">
						<i class="fas fa-trash"></i>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>

<?php
require 'rightsidebar.php';
require 'footer.php';
?>