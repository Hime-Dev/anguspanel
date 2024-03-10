<?php 

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}


require 'admin-header.php';
require 'sidebar.php';
?>

<div class="container">

	<?php require 'pages/'.$page.".php"; ?>

</div>

<?php
require 'footer.php';
?>