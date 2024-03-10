<h3 class="sekmeBaslik">Tüm Bildirimler</h3>
<ul class="bildirimler">
	<?php 
	$nots = $database->query("SELECT * FROM notifications WHERE `user_id` = '$userDBID' ORDER BY `date` DESC");
	$unread = $database->query("SELECT * FROM notifications WHERE `user_id` = '$userDBID' AND `read` = '0'");
	?>

		<div style="text-align: right;margin: 30px 5px;">
			<span style="background: red;padding: 5px 10px;border-radius: 5px;color: white;font-family: 'Ubuntu';font-weight: 700;"><?php echo $unread->num_rows ?> Okunmamış Bildirim</span>
		</div>
	<?php

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
</ul>