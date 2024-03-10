<?php 
	include '../../config.php';

	$seriID = $_POST['seri'];
	$kavram = $_POST['kavram'];

	if ($kavram == "") {
		$kavramlar = $database->query("SELECT * FROM kavramlar WHERE manga_id = '$seriID' ORDER BY ingilizce ASC");
	} else {
		$kavramlar = $database->query("SELECT * FROM kavramlar WHERE manga_id = '$seriID' AND ingilizce LIKE '%".$kavram."%' ORDER BY ingilizce ASC");
	}

	?>


	<script>
		document.querySelector('#kavram-kaynak ul').innerHTML = "";
		crLi = document.createElement("li");
		crLi.setAttribute("class","kavramlar-list-item");
		document.querySelector('#kavram-kaynak ul').appendChild(crLi);

		crSpan = document.createElement("span");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li span:last-child').innerHTML = "İngilizce";

		crSpan = document.createElement("span");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li span:last-child').innerHTML = "Türkçe";

		crSpan = document.createElement("span");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li span:last-child').innerHTML = "Ekleyen";

		<?php if ($ceviri_st != 0) { ?>
			crSpan = document.createElement("span");
			crLi.appendChild(crSpan);
		<?php } ?>
		


	<?php

	while($kavram = $kavramlar->fetch_assoc()) {
		$uyeID = $kavram['ekleyen'];
		$uye = $database->query("SELECT * FROM uyeler WHERE id = '$uyeID'");
		$uye = $uye->fetch_assoc();
		?>

		crLi = document.createElement("li");
		crLi.setAttribute("class","kavramlar-list-item");
		crLi.setAttribute("id","kav<?php echo $kavram['id'] ?>");
		document.querySelector('#kavram-kaynak ul').appendChild(crLi);

		crSpan = document.createElement("span");
		crSpan.setAttribute("id","en<?php echo $kavram['id'] ?>");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li:last-child span:last-child').innerHTML = "<?php echo $kavram['ingilizce'] ?>";

		crSpan = document.createElement("span");
		crSpan.setAttribute("id","tr<?php echo $kavram['id'] ?>");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li:last-child span:last-child').innerHTML = "<?php echo $kavram['turkce'] ?>";

		crSpan = document.createElement("span");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li:last-child span:last-child').innerHTML = "<?php echo $uye['user'] ?>";

		<?php if ($ceviri_st != 0) { ?>
					crSpan = document.createElement("span");
					crLi.appendChild(crSpan);
					crI = document.createElement("i");
					crI.setAttribute("class","fas fa-pen");
					crI.setAttribute("onclick","kavramCevir(<?php echo $kavram['id'] ?>,<?php echo $userDBID ?>)");
					crSpan.appendChild(crI);
		<?php } ?>


		<?php
	} if ($kavramlar->num_rows == 0) {
		?>
		crLi = document.createElement("li");
		crLi.setAttribute("class","kavramlar-list-item");
		document.querySelector('#kavram-kaynak ul').appendChild(crLi);

		crSpan = document.createElement("span");
		crSpan.setAttribute("style","width:100%;cursor:unset;opacity:0.5;color:red;border-color:black;font-style:italic;justify-content:center;");
		crLi.appendChild(crSpan);
		document.querySelector('#kavram-kaynak ul li:last-child span:last-child').innerHTML = "Şu an boşluğa bakıyorsunuz.";

		<?php
	} 

	?>

	</script>


