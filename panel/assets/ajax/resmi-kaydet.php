<?php 

	include '../../config.php';

	$hedef = $_POST['chapter'];


	define('UPLOAD_DIR', $hedef);  
	$img = $_POST['imgBase64'];  
	$img = str_replace('data:image/png;base64,', '', $img);  
	$img = str_replace(' ', '+', $img);  
	$data = base64_decode($img);  
	$file = UPLOAD_DIR;  
	$success = file_put_contents($file, $data);  
	print $success ? $file : 'Unable to save the file.'; 

	echo "<span id='resimkayit'>1</span>";

?>