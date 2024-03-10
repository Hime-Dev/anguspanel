<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/responsive.css?v<?php echo $sitever?>">
	<link rel="stylesheet" href="<?php echo $siteurl ?>assets/css/style.css?v<?php echo $sitever?>">
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?php echo $siteurl ?>assets/js/functions.js?v<?php echo $sitever ?>"></script>



<body>
	<div class="rain front-row"></div>
	<div class="rain back-row"></div>

	<section>
		<img src="<?php echo $siteurl ?>assets/banned-image.jpg">
	</section>

	<div class="bilgilendirmeler">
		<div class="banlandin">
			BANLANDIN!
		</div>
		<div class="bilgi-kutusu">
			<div class="banlayan-kisi">
				<span><?php
					$ban = $database->query("SELECT * FROM ban_sebepleri WHERE user_id = '$userDBID' ORDER BY id DESC")->fetch_assoc();

					$banlayan = $database->query("SELECT * FROM uyeler WHERE id = '".$ban['banlayan']."'")->fetch_assoc();

					echo $banlayan['user'];
				?></span> Tarafından Banlandın.
			</div>
			<div class="ban-sebebi">
				<span>Ban Sebebi: </span><em><?php

					if ($ban['ban_sebebi'] == null OR $ban['ban_sebebi'] == "") {
						echo "Belirtilmemiş";
					}

					else {
						 echo $ban['ban_sebebi'];
					}

			?></em>
			</div>
			<div class="hata-bildirin">
				Eğer bir hata olduğunu düşünüyorsanız discord üzerinden bildirin
			</div>
			<div class="banlanan-kisi">
				<?php $banlanan = $database->query("SELECT * FROM uyeler WHERE id = '".$ban['user_id']."'")->fetch_assoc(); echo $banlanan['user']; ?>
			</div>		
		</div>
	</div>	
</body>

<style>

	.bilgilendirmeler {
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100vh;
	}

	.bilgilendirmeler .banlandin {
	    text-align: center;
	    position: absolute;
	    font-size: 70px;
	    top: 30px;
	    width: 100%;
	    color: #c60000;
	    font-family: 'roboto';
	    font-weight: bold;
	    letter-spacing: 10px;
	    text-shadow: 0 0 1px #00000080, 0 0 2px #00000070, 0 0 3px #0000008c, 0 0 4px #0000007a, 0 0 5px #2929292b;
	}

	.bilgilendirmeler .bilgi-kutusu {
	    bottom: 55px;
	    position: absolute;
	    width: 60%;
	    margin-left: 20%;
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	}

	.bilgilendirmeler .bilgi-kutusu .hata-bildirin {
	    font-size: 13px;
	    margin-top: 15px;
	}

	.bilgilendirmeler .bilgi-kutusu .banlayan-kisi span {
	    color: #dcdcdc;
	    font-weight: 700;
	    font-style: italic;
	    margin-right: 6px;
	    font-size: 22px;
	}

	.bilgilendirmeler .bilgi-kutusu * {
	    color: white;
	    font-family: 'poppins';
	    font-weight: 400;
	    text-shadow: 0 0 7px #a8a8a8;
	    font-size: 20px;
	}

	.bilgilendirmeler .bilgi-kutusu .banlanan-kisi {
	    position: fixed;
	    top: 37%;
	    font-size: 50px;
	    font-family: 'oswald';
	    right: 35%;
	}


	body {
		background-image: url(assets/banned-image.jpg);
	    display: flex;
	    justify-content: center;
	    align-content: center;
	    align-items: center;
	    margin: 0;
	    height: 100vh;
	    backdrop-filter: blur(5px);
	    position: relative;
	    overflow: hidden;
	}

	.rain {
	  position: absolute;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  z-index: 2;
	  overflow: hidden;
	}

	.rain.back-row {
	  display: none;
	  z-index: 1;
	  bottom: 60px;
	  opacity: 0.5;
	}

	.drop {
	  position: absolute;
	  bottom: 100%;
	  width: 15px;
	  height: 120px;
	  pointer-events: none;
	  animation: drop 0.5s linear infinite;
	}

	@keyframes drop {
	  0% {
	    transform: translateY(0vh);
	  }
	  75% {
	    transform: translateY(90vh);
	  }
	  100% {
	    transform: translateY(90vh);
	  }
	}

	.stem {
	  width: 1px;
	  height: 60%;
	  margin-left: 7px;
	  background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.25));
	  animation: stem 0.5s linear infinite;
	}

	@keyframes stem {
	  0% {
	    opacity: 1;
	  }
	  65% {
	    opacity: 1;
	  }
	  75% {
	    opacity: 0;
	  }
	  100% {
	    opacity: 0;
	  }
	}

	.splat {
	  width: 15px;
	  height: 10px;
	  border-top: 2px dotted rgba(255, 255, 255, 0.5);
	  border-radius: 50%;
	  opacity: 1;
	  transform: scale(0);
	  animation: splat 0.5s linear infinite;
	  display: none;
	}

	@keyframes splat {
	  0% {
	    opacity: 1;
	    transform: scale(0);
	  }
	  80% {
	    opacity: 1;
	    transform: scale(0);
	  }
	  90% {
	    opacity: 0.5;
	    transform: scale(1);
	  }
	  100% {
	    opacity: 0;
	    transform: scale(1.5);
	  }
	}

	.toggles {
	  position: absolute;
	  top: 0;
	  left: 0;
	  z-index: 3;
	}

	.toggle {
	  position: absolute;
	  left: 20px;
	  width: 50px;
	  height: 50px;
	  line-height: 51px;
	  box-sizing: border-box;
	  text-align: center;
	  font-family: sans-serif;
	  font-size: 10px;
	  font-weight: bold;
	  background-color: rgba(255, 255, 255, 0.2);
	  color: rgba(0, 0, 0, 0.5);
	  border-radius: 50%;
	  cursor: pointer;
	  transition: background-color 0.3s;
	}

	.toggle:hover {
	  background-color: rgba(255, 255, 255, 0.25);
	}

	.toggle:active {
	  background-color: rgba(255, 255, 255, 0.3);
	}

	.toggle.active {
	  background-color: rgba(255, 255, 255, 0.4);
	}

	.splat-toggle {
	  top: 20px;
	}

	.back-row-toggle {
	  top: 90px;
	  line-height: 12px;
	  padding-top: 14px;
	}

	.single-toggle {
	  top: 160px;
	}

	body.single-toggle .drop {
	  display: none;
	}

	body.single-toggle .drop:nth-child(10) {
	  display: block;
	}

	body section {
 		width: 100%;
	    overflow: hidden;
	    box-shadow: 0 0 13px #00000078;
	}

	section img {
	    width: 100%;
	    height: 100vh;
	}
			

	@media (max-width: 720px) {
		section img {
			width: 130%;
	   		margin-left: -10%;
	   		height: unset;
		}

		.bilgilendirmeler .banlandin {
		    font-size: 50px;
		    letter-spacing: 2px;
		}

		.bilgilendirmeler .bilgi-kutusu {
		    width: 96%;
		    margin-left: 2%;
		}

		.bilgilendirmeler .bilgi-kutusu * {
		    font-size: 15px;
		}

		.bilgilendirmeler .bilgi-kutusu .banlayan-kisi span {
		    font-size: 17px;
		    margin-right: 3px;
		}

		.bilgilendirmeler .bilgi-kutusu .hata-bildirin {
		    text-align: center;
		}

		.bilgilendirmeler .bilgi-kutusu .banlanan-kisi {
		    font-size: 28px;
		    top: 43%;
		    right: 22%;
		}
	}
</style>


<script>
	var makeItRain = function() {
	  //clear out everything
	  $('.rain').empty();

	  var increment = 0;
	  var drops = "";
	  var backDrops = "";

	  while (increment < 100) {
	    //couple random numbers to use for various randomizations
	    //random number between 98 and 1
	    var randoHundo = (Math.floor(Math.random() * (98 - 1 + 1) + 1));
	    //random number between 5 and 2
	    var randoFiver = (Math.floor(Math.random() * (5 - 2 + 1) + 2));
	    //increment
	    increment += randoFiver;
	    //add in a new raindrop with various randomizations to certain CSS properties
	    drops += '<div class="drop" style="left: ' + increment + '%; bottom: ' + (randoFiver + randoFiver - 1 + 100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div></div>';
	    backDrops += '<div class="drop" style="right: ' + increment + '%; bottom: ' + (randoFiver + randoFiver - 1 + 100) + '%; animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"><div class="stem" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div><div class="splat" style="animation-delay: 0.' + randoHundo + 's; animation-duration: 0.5' + randoHundo + 's;"></div></div>';
	  }

	  $('.rain.front-row').append(drops);
	  $('.rain.back-row').append(backDrops);
	}

	$('.splat-toggle.toggle').on('click', function() {
	  $('body').toggleClass('splat-toggle');
	  $('.splat-toggle.toggle').toggleClass('active');
	  makeItRain();
	});

	$('.back-row-toggle.toggle').on('click', function() {
	  $('body').toggleClass('back-row-toggle');
	  $('.back-row-toggle.toggle').toggleClass('active');
	  makeItRain();
	});

	$('.single-toggle.toggle').on('click', function() {
	  $('body').toggleClass('single-toggle');
	  $('.single-toggle.toggle').toggleClass('active');
	  makeItRain();
	});

	makeItRain();
</script>	