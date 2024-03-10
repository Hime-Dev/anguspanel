<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/responsive.css?v<?php echo $sitever?>">

</head>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="<?php echo $siteurl ?>assets/js/functions.js?v<?php echo $sitever ?>"></script>



<div class="izin">

	<video src="<?php echo $siteurl ?>assets/izin.mp4?<?php echo rand(1,1000000000) ?>" type="video/mp4" autoplay muted loop></video>

	<div class="yazi">

		<div class="izinlisin">

			İzninin Bitmesine Şu Kadar Süre Kaldı:

		</div>

		<div class="sayac">

			<span id="day">0</span> :

			<span id="hour">0</span> :

			<span id="minute">0</span> :

			<span id="second">0</span>

		</div>

		<form method="post">

			<input type="hidden" value="<?php echo $izin['id'] ?>" name="id">

			<input type="submit" name="izinIptal" id="izinIptal" value="İzni İptal Et">

		</form>

	</div>

	<div class="audio">

		<h4>Lofi Beats</h4>

		<audio id="audio">

			<source src="<?php echo $siteurl ?>assets/lofi.mp3?<?php echo rand(1,1000000000) ?>" type="audio/mp3">

		</audio>

	</div>

</div>



<?php 

	if (isset($_POST['izinIptal'])) {

		$izinID = $_POST['id'];

		$tarih = date("Y-m-d H:i:s");
		$database->query("UPDATE izinler SET bitis_tarihi = '$tarih', iptal = '1' WHERE id = '$izinID'");

		?>

		<script>setTimeout(function() {window.location.reload()},50);</script>

		<?php

	}

?>



<script>

	var audio = document.getElementById('audio');

	audio.play();

	window.onload = function() {

		var audio = document.getElementById('audio');

		audio.play();

	}



	setInterval(function() {audio.play()}, 10);

</script>





<script>

	const countDate = new Date('<?php echo $bitis ?>').getTime();



	function counter() {

		const now = new Date().getTime();

		let sonuc = countDate - now;



		let second = 1000;

		let minute = second * 60;

		let hour = minute * 60;

		let day = hour * 24;



		let d = Math.floor(sonuc / (day));

		let h = Math.floor((sonuc  % (day)) / (hour));

		let m = Math.floor((sonuc  % (hour)) / (minute));

		let s = Math.floor((sonuc  % (minute)) / (second));



		if (0 >= d && 0 >= h && 0 >= m && 0 >= s) { 

			document.getElementById('day').innerText = "0";

			document.getElementById('hour').innerText =	"0";

			document.getElementById('minute').innerText = "0";

			document.getElementById('second').innerText = "0";

			setTimeout(function() {window.location.reload()},1500);

		}

		else {

			document.getElementById('day').innerText = d;

			document.getElementById('hour').innerText = h;

			document.getElementById('minute').innerText = m;

			document.getElementById('second').innerText = s;

		}

	}



	counter();



	setInterval(counter,1000);





</script>



<style>

	@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&display=swap');

	

	body {

	    margin: 0;

	    overflow: hidden;

	}



	.izin {

	    display: flex;

	    justify-content: center;

	    align-items: center;

	    position: relative;

	    top: 0;

	    left: 0;

	    height: 100vh;

	    width: 100%;

	}



	.izin .yazi {

	    position: fixed;

	    width: 100%;

	    height: 100%;

	    top: 0;

	    left: 0;

	    display: flex;

	    justify-content: center;

	    align-items: center;

	    flex-direction: column;

	    font-size: 33px;

	    font-family: 'Orbitron', sans-serif;

	    font-weight: 700;

	    user-select: none;

	}



	.izin .yazi .izinlisin {

	    width: 30%;

	    text-align: center;

	    color: white;

	    text-shadow: 0 0 20px rgb(128 11 50 / 90%);

	}



	#izinIptal {

	    appearance: none;

	    background: #ffffff73;

	    padding: 5px 15px;

	    border-radius: 5px;

	    font-size: 17px;

	    font-family: sans-serif;

	    font-weight: 700;

	    border: 0;

	    box-shadow: 0 0 12px rgb(255 61 237 / 27%);

	    cursor: pointer;

	    transition: 300ms;

	}



	#izinIptal:hover {

	    background: #ffffff30;

	}



	.izin .yazi .sayac {

	    color: darkred;

	    margin: 15px;

	    font-size: 55px;

	}



	.audio {

	    position: fixed;

	    bottom: 0;

	    left: 0;

	    width: 100%;

	}



	.audio audio {

	    width: 100%;

	    background: white;

	    height: 30px;

	    box-shadow: 0 0 15px 15px rgb(0 0 0 / 50%);

	    border-radius: 15px 15px 0 0;

	}

	.audio h4 {

	    font-family: sans-serif;

	    font-size: 29px;

	    box-sizing: border-box;

	    margin: 18px;

	    color: white;

	    text-shadow: 0 0 2px #0000008a, 0 0 7px #0000005e, 0 0 12px #0000009e;

	    background: pink;

	    display: inline-block;

	    padding: 5px 15px;

	    border-radius: 10px;

	    box-shadow: 0 0 5px 5px rgb(0 0 0 / 45%);

	}

</style>