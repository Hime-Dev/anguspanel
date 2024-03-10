<div class="mobile-menu" id="mobile-menu">
	<div class="ust-bolum">
		<a class="not-but" href="<?php echo $siteurl ?>bildirimler">
			<i class="fa-solid fa-bell"></i>
			<?php $unread = $database->query("SELECT * FROM notifications WHERE `user_id` = '$userDBID' AND `read` = '0'");
			if ($unread->num_rows != 0) { ?>
				<span class="unread-count">
					<?php 
						if ($unread->num_rows > 9) {
							echo "9+";
						} else {
							echo $unread->num_rows;
						}
					?>
				</span>
			<?php } ?>
		</a>
		<div class="welcome-msg">
			Hoşgeldin <?php echo $userDB['user'] ?>
		</div>
		<?php if ($admin == true) { ?>
		<a href="<?php echo $siteurl ?>admin/log" class="admin-button">
			<i class="fa-solid fa-circle-check"></i>
		</a>
		<?php } ?>
		<a href="<?php echo $siteurl ?>bakiyeler" class="admin-button">
			<i class="fa-solid fa-money-bill-1-wave"></i>
		</a>
		<a class="logout" id="mobile-logout-button">
			<i class="fa-solid fa-arrow-right-from-bracket"></i>
		</a>
	</div>
	<ul class="mobile-nav-menu">
		<a href="<?php echo $siteurl ?>ekip">
			<li>Ekip</li>
		</a>
		<a href="<?php echo $siteurl ?>bolumler">
			<li>Bölümler</li>
		</a>
		<a href="<?php echo $siteurl ?>seri-listesi">
			<li>Seriler</li>
		</a>
	</ul>

	<div class="notifications">
		<ul>
			<?php 
			$nots = $database->query("SELECT * FROM notifications WHERE `user_id` = '$userDBID' ORDER BY `date` DESC LIMIT 5");

			if ($nots->num_rows > 0) {
				while($not = $nots->fetch_assoc()) {
			?>
				<a href="<?php echo $siteurl."bildirim/".$not['id'] ?>">
					<li<?php if ($not['read'] == 1) echo " class='read_notif'"; ?>>
						<span class="notification-type type<?php echo $not['type'];?>"></span>
						<div class="notification-msg">
							<?php echo $not['heading'] ?>
						</div>
						<div class="notification-time">
							<?php echo gecen_sure($not['date']) ?>
						</div>
					</li>
				</a>
			<?php } }?>
			<a href="<?php echo $siteurl ?>bildirimler">
				<li>
					Tümünü Gör
				</li>
			</a>
		</ul>
	</div>
</div>