<?php 

require 'config.php';

header("X-Robots-Tag: noindex, nofollow", true);



if (!isset($_SESSION['id']) AND $_GET['page'] != "giris-yap") {
		?>

			<script>window.location = '<?php echo $siteurl ?>giris-yap';</script>

		<?php

	}

?>

<!DOCTYPE html>

<html>

<head>



	<!--SiteURL-->

	<script>var siteurl = "<?php echo $siteurl ?>";</script>

	

	<!--jQuery-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



	<!--Font Awesome-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



	<!--DropZone-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />





	<!--ckEditor-->

	<script src="ckeditor/ckeditor.js"></script>



	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/style.css?v<?php echo $sitever?>"><link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/responsive.css?v<?php echo $sitever?>">

	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/animations.css?v<?php echo $sitever?>">

	<script type="text/javascript" src="<?php echo $siteurl ?>assets/js/functions.js?v<?php echo $sitever ?>"></script>

	<script type="text/javascript" src="<?php echo $siteurl ?>assets/js/onload.js?v<?php echo $sitever ?>"></script>



	<!--Activity-->

    <script>lastOnline();setInterval(lastOnline,3000);</script>



    <?php 

		/*Botlar*/

		include 'botlar/bolum-birakma-botu.php';

		include 'botlar/ceza-kesme-botu.php';

	?>	

	<title>Ekip | Manga Efendisi</title>

	

</head>

<body>

	<div id="ajax-msg"></div>



<header class="admin-items">

	<a class="logo" href="<?php echo $siteurl ?>">

		Manga Efendisi

	</a>

	<nav>

		<ul>

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

	</nav>

	<div class="user-nav">

		<?php if (isset($_SESSION['id'])) { ?>

		<div class="not-but">

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

		<div class="welcome-msg">

			Hoşgeldin <?php echo $userDB['user'] ?>

		</div>

		<?php if ($admin == true) { ?>

		<a href="<?php echo $siteurl ?>admin/log" class="admin-button">

			<i class="fa-solid fa-shield"></i>

		</a>

		<?php } ?>

		<a href="<?php echo $siteurl ?>bakiyeler" class="admin-button">

			<i class="fa-solid fa-money-bill-1-wave"></i>

		</a>

		<a class="logout" id="logout-button">

			<i class="fa-solid fa-arrow-right-from-bracket"></i>

		</a>

		<?php } ?>

	</div>



	<?php include 'mobile-menu.php'; ?>

	<span id="mobile-menu-button"><i class="fa-solid fa-bars"></i></span>

</header>



<?php if (isset($_SESSION['id'])) { ?>

	<div class="mobile-menu-aside-buttons">

		<div id="chapter-menu-aside-button"><i class="fa-solid fa-bars-staggered"></i></div>

		<div id="profile-menu-aside-button"><i class="fa-solid fa-user"></i></div>

	</div>

 <?php } ?>



<div id="notification"></div>



<section id="swup">

