<?php if (isset($_SESSION['id'])) {
	?>
		<script>window.location = '<?php echo $siteurl ?>';</script>
	<?php
} ?>
<div class="giris-yap">
	<div class="login-logo">
		<img src="<?php echo $siteurl ?>assets/img/logo.png" alt="">
	</div>
	<div class="login-form">

		<div id="attention"></div>
		
		<div class="form-input_name">
			Kullanıcı Adı
		</div>
		<label class="form-input_input">
			<i class="fas fa-user"></i>
			<input type="text" id="login-username" placeholder="Kullanıcı Adı Girin...">
		</label>
		<div class="form-input_name">
			Şifre
		</div>
		<label class="form-input_input">
			<i class="fas fa-key"></i>
			<input type="password" id="login-password" placeholder="Şifre Girin...">
		</label>
	</div>
	<div class="login-form-buttons">
		<label class="beni-hatirla">
			<input type="checkbox" id="beni-hatirla" checked value="1"> Beni Hatırla
		</label>
		<button id="login-button">
			Giriş Yap
		</button>
	</div>
</div>
