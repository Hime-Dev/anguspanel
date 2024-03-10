<?php 
	$nID = $_GET['id'];
	$database->query("UPDATE notifications SET `read` = '1' WHERE id = '$nID'");

	$notif = $database->query("SELECT * FROM notifications WHERE id = '$nID'");
	$notif = $notif->fetch_assoc();

	if ($notif['user_id'] != $userDBID) {
		echo "Hobb! Utanmıyon mu lan sen milletin özel bildirimlerini okumaya ha? Bildiriyorum bu hareketini Kami'ye he haberin olsun. Yer mi lan Kanada çocuğu he?";
		?><script>sendNotification("member","1","3","<?php echo $userDB['user']?> bir şeyler deniyor.","Bu eleman link değiştirerek başkalarının mesajlarını okumaya çalıştı. Bildirim ID: #<?php echo $notif['id'] ?>");</script><?php
		die();
	}
?>



<div class="notification-content">
	<a href="<?php echo $siteurl ?>bildirimler" class="geri-don"><i class="fa-solid fa-arrow-left"></i></a>
	<h3><?php echo $notif['heading'] ?></h3>
	<p><?php
	$bildirim = $notif['content'];
	$bildirim = str_replace("\n", "<br>", $bildirim);
	echo $bildirim;

?></p>
	
</div>