<?php 

if (isset($_GET['page'])) {
	$page = $_GET['page'];

	if ($page == "admin") {
		?>
			<script>
				window.location.href = "<?php echo $siteurl ?>admin/log"
			</script>
		<?php
	}
}

require 'header.php';
if (isset($_SESSION['id'])) {
require 'leftsidebar.php';
}
?>

<div class="container">

	<?php require 'pages/'.$page.".php"; ?>

</div>

<?php
if (isset($_SESSION['id'])) {
require 'rightsidebar.php';
}
require 'footer.php';
?>