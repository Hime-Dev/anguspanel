window.onload = function() {

	popup("#kavram-button","kavram-defteri");

	popup("#kavramlari-kapat","kavram-defteri");



	popup("#izin-iste","izin-popup");

	popup("#izin-kapat","izin-popup");





	popup("#ekipten-ayril","ekipten-ayril-popup");

	popup("#ekipten-ayril-kapat","ekipten-ayril-popup");

	popup("#ekipten-ayril-iptal","ekipten-ayril-popup");





	popup("#bolumu-birak","bolumu-birak-popup");

	popup("#bolumu-birak-kapat","bolumu-birak-popup");

	popup("#bolumu-birak-iptal","bolumu-birak-popup");





	popup("#ekip-onay-ac","ekibe-al-popup");

	popup("#ekibe-al-kapat","ekibe-al-popup");





	popup("#ekip-ret-ac","ekibe-almayi-reddet-popup");

	popup("#ekibe-almayi-reddet-kapat","ekibe-almayi-reddet-popup");





	popup(".chapter-bot-right-span","hazir-popup");

	popup("#hazir-kapat","hazir-popup");





	kavramEkleButton("kavram-ekle","kavram-ekle_input","kavram-ekle");

	kavramEkleButton("kavram_iptal","kavram-ekle_input", "kavram-ekle");





	bolumSekmesi("ceviriButton", "lCeviriBolumleri");

	bolumSekmesi("redakteButton", "lRedakteBolumleri");

	bolumSekmesi("cleanButton", "lCleanBolumleri");

	bolumSekmesi("dizgiButton", "lDizgiBolumleri");

	bolumSekmesi("kontrolButton", "lKontrolBolumleri");



	bolumSekmesi("ceviriSekmeButon","ceviribolumleriSekmesi");

	bolumSekmesi("redakteSekmeButon","redaktebolumleriSekmesi");

	bolumSekmesi("cleanSekmeButon","cleanbolumleriSekmesi");

	bolumSekmesi("dizgiSekmebuton","dizgibolumleriSekmesi");

	bolumSekmesi("kontrolSekmebuton","kontrolbolumleriSekmesi");





	bolumSekmesi("mobile-menu-button","mobile-menu");



	acilirPencere("oge-ekle-button","oge-ekle-box");



	previewBeforeUpload("#seri_ekle_photo", ".seri-ekle-cover");

	previewBeforeUpload("#upload_profile_photo", ".upload-photo");



	sifreGoster_Gizle("show_pass","user_password");









	//Add Event Listener

	try /*Bölümleri Gizle*/ {

		//Çeviri Sayısı

			try {

				var ceviriSekme = document.querySelector("#ceviriSekmeButon small em");

				var ceviriS = ceviriSekme.innerHTML;

				ceviriS = ceviriS.slice(1,-1);

				ceviriS = Number(ceviriS);

			} catch(err) {}

		//Clean Sayısı

			try {

				var cleanSekme = document.querySelector("#cleanSekmeButon small em");

				var cleanS = cleanSekme.innerHTML;

				cleanS = cleanS.slice(1,-1);

				cleanS = Number(cleanS);

			} catch(err) {}

		//Dizgi Sayısı

			try {

				var dizgiSekme = document.querySelector("#dizgiSekmebuton small em");

				var dizgiS = dizgiSekme.innerHTML;

				dizgiS = dizgiS.slice(1,-1);

				dizgiS = Number(dizgiS);

			} catch(err) {}

		//Kontrol Sayısı

			try {

				var kontrolSekme = document.querySelector("#kontrolSekmebuton small em");

				var kontrolS = kontrolSekme.innerHTML;

				kontrolS = kontrolS.slice(1,-1);

				kontrolS = Number(kontrolS);

			} catch(err) {}





		var bolumleri_gizle = document.getElementById("bolumlerigizle");



		

		bolumleri_gizle.addEventListener("change",function() {

			var durum = bolumleri_gizle.checked;

			if (durum == true) {

				document.querySelector(":root").style.setProperty('--alinanBolum', "none");



				//Çevirileri Güncelleyelim

					var alinanCeviriS = document.querySelectorAll("#ceviribolumleriSekmesi .alinanBolum");

					alinanCeviriS = alinanCeviriS.length;

					sonucS = ceviriS - alinanCeviriS;

					ceviriSekme.innerHTML = "("+sonucS+")";



				//Cleanleri Güncelleyelim

					var alinanCleanS = document.querySelectorAll("#cleanbolumleriSekmesi .alinanBolum");

					alinanCleanS = alinanCleanS.length;

					sonucS = cleanS - alinanCleanS;

					cleanSekme.innerHTML = "("+sonucS+")";



				//Dizgileri Güncelleyelim

					var alinanDizgiS = document.querySelectorAll("#dizgibolumleriSekmesi .alinanBolum");

					alinanDizgiS = alinanDizgiS.length;

					sonucS = dizgiS - alinanDizgiS;

					dizgiSekme.innerHTML = "("+sonucS+")";



			} else {

				document.querySelector(":root").style.setProperty('--alinanBolum', "flex");

				ceviriSekme.innerHTML = "("+ceviriS+")";

				cleanSekme.innerHTML = "("+cleanS+")";

				dizgiSekme.innerHTML = "("+dizgiS+")";

			}

		});

	} catch(err) {}



	try {

		var seriTypeSelect = document.querySelector("select#seri-ekle-type");

		seriTypeSelect.addEventListener("change", function(){

			var type = seriTypeSelect.value;

			if (type == "2") {

				document.getElementById("seri-ekle-roles").style.display = "flex";

			}

			else {

				document.getElementById("seri-ekle-roles").style.display = "none";

			}

		});

	} catch(err) {}











	//Geri Gönderme İşlemi

	try {

		var geriButton = document.getElementById("gerigonder");

		geriButton.addEventListener("click", geriGonder);

	} catch(err) {}





	//Onay Verme İşlemi

	try {

		var geriButton = document.getElementById("bolumu_onayla");

		geriButton.addEventListener("click", bolumuOnayla);

	} catch(err) {}



















	//Mobil Menü butonları

	try {

		var chMenuButton = document.getElementById("chapter-menu-aside-button");

		var chMenuKapat = document.getElementById("ch-menu-kapat");

		var proMenuButton = document.getElementById("profile-menu-aside-button");

		var proMenuKapat = document.getElementById("pro-menu-kapat");



		function chMenuAyar() {

			var chMenu = document.querySelector("aside.lSidebar");

			var s = chMenu.style.left;



			if(s == "0%") {

				chMenu.style.left = "-100%";

				chMenuButton.style.left = "0%";

			}

			else {

				chMenu.style.left = "0%";

				chMenuButton.style.left = "100%";

			}

		}



		function proMenuAyar() {

			var proMenu = document.querySelector("aside.rSidebar");

			var s = proMenu.style.right;



			if(s == "0%") {

				proMenu.style.right = "-100%";

				proMenuButton.style.right = "0%";

			}

			else {

				proMenu.style.right = "0%";

				proMenuButton.style.right = "100%";

			}

		}



		chMenuButton.addEventListener("click", chMenuAyar);

		chMenuKapat.addEventListener("click", chMenuAyar);

		proMenuButton.addEventListener("click", proMenuAyar);

		proMenuKapat.addEventListener("click", proMenuAyar);







	} catch(err) {}





















































	//AJAX



	try /*Log-in*/ {

		var login_button = document.getElementById("login-button");

		login_button.addEventListener("click",function() {

			var user = document.getElementById("login-username").value;

			var pass = document.getElementById("login-password").value;

			var reme = document.getElementById("beni-hatirla").checked;

			$.ajax({

				url: siteurl+"assets/ajax/giris-yap.php",

				type: "POST",

				data: {"user":user,"pass":pass,"reme":reme},

	        	success: function (msg) {

	            	$('#attention').html(msg);

	        	}

			});

		});

	}

	

	catch(err) {

	  console.log("giriş yap sayfasında değil");

	}



	try /*Log-out*/ {

		var logout_button = document.getElementById("logout-button");

		logout_button.addEventListener("click",function() {

			$.ajax({

				url: siteurl+"assets/ajax/cikis-yap.php",

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});



		var mobileLogout_button = document.getElementById("mobile-logout-button");

		mobileLogout_button.addEventListener("click",function() {

			$.ajax({

				url: siteurl+"assets/ajax/cikis-yap.php",

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	}

	

	catch(err) {

	  console.log("header yok");

	}



	try /*Versiyon*/ {

		var update_button = document.getElementById('verupdate');

		update_button.addEventListener("click", function() {

		var input = document.getElementById('sitever').value;

			$.ajax({

				url: siteurl+"assets/ajax/version-update.php",

				type: "POST",

				data: {"sitever":input},

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}



	try /*Duyuru*/ {

		var duyuruGonder_button = document.querySelector('.bolum-gonder.duyuru-gonder');

		duyuruGonder_button.addEventListener("click", function() {

			var heading = document.getElementById('duyuru-baslik').value;

			var duyurucontent = ClassicEditor.instances['duyuru_editor'].getData();

			$.ajax({

				url: siteurl+"assets/ajax/duyuru-ekle.php",

				type: "POST",

				data: {"head":heading,"duyuru":duyurucontent},

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}



	try /*İzin İste*/ {

		var izin_button = document.getElementById('izin-gonder');

		izin_button.addEventListener("click", function() {

			var sure = document.getElementById('izin_gun').value;

			var sebep = document.getElementById('izin-sebep').value;

			$.ajax({

				url: siteurl+"assets/ajax/izin-iste.php",

				type: "POST",

				data: {"sure":sure,"sebep":sebep},

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}





	try /*Ekipten Ayril*/ {

		var ayril_button = document.getElementById('ekipten-ayril-onay');

		ayril_button.addEventListener("click", function() {

			$.ajax({

				url: siteurl+"assets/ajax/ekipten-ayril.php",

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}





	try /*Ekipten Ayril*/ {

		var bolumuBirak_button = document.getElementById('bolumu-birak-onay');

		bolumuBirak_button.addEventListener("click", function() {

			var ch = document.getElementById('getchapter').innerHTML;

			var role = document.getElementById('getrole').innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/bolumu-birak.php",

				type: 'POST',

				data: {"ch":ch,"role":role},

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}





	try /*Profil Güncelle*/ {

		$('#profile_form').on('submit',function(e){

			e.preventDefault();

			$.ajax({

				url: siteurl+"assets/ajax/profil-guncelle.php",

				type: 'POST',

				data: new FormData(this),

				contentType: false,

				processData: false,

				success: function(data){

					$('#ajax-msg').html(data);

				}

			});

		});

	} catch (err) {}







	try /*Ekibe Geri Al*/ {

		var geriAl_Button = document.getElementById("ekibe-al-gonder");

		geriAl_Button.addEventListener("click", function() {

			var userID = document.getElementById("uyeID").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/ekibe-al.php",

				type: "POST",

				data: {"id":userID},

				success: function (msg) {

			    	$('#ajax-msg').html(msg);

				}

			});

		});

	} catch(err) {}







	try /*Ekibe Almayı Reddet*/ {

		var geriAl_Button = document.getElementById("ekip-ret-gonder");

		geriAl_Button.addEventListener("click", function() {

			var userID = document.getElementById("uyeID").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/ekibe-almayi-reddet.php",

				type: "POST",

				data: {"id":userID},

				success: function (msg) {

			    	$('#ajax-msg').html(msg);

				}

			});

		});

	} catch(err) {}







	try /*Bölümler Sayfası Seri Filtresi*/ {

		var seri_filtresi = document.getElementById('serifiltresi');

		serifiltresi.addEventListener("change", function() {

			var filtre = serifiltresi.value;

			$.ajax({

				url: siteurl+"assets/ajax/seri-filtresi.php",

				type: "POST",

				data: {"seri":filtre},

				success: function (msg) {

	            	$('#ajax-msg').html(msg);

	        	}

			});

		});

	} catch(err){}





	try /*Edit Ziple*/ {

		var download_pagesButton = document.getElementById("download_pages");

		download_pagesButton.addEventListener("click", function() {

			bildirim("Zip Yapılıyor... Lütfen Bekleyin.");

			bolumZiple();

		});



	} catch (err) {}





	try /*Seri Ekle*/ {

		$('#seri_form').on('submit',function(e){

			e.preventDefault();

			$.ajax({

				url: siteurl+"assets/ajax/seri-ekle.php",

				type: "POST",

				data: new FormData(this),

				contentType: false,

				processData: false,

				success: function (msg) {

			    	$('#ajax-msg').html(msg);

				}

			});

		});

	} catch(err) {}



	try /*Bölüm Ekle*/ {

		var bolum_ekleButton = document.getElementById('bolumu-gonder');

		bolum_ekleButton.addEventListener("click", function() {

			var m = document.getElementById('bolum-ekle-seri').value;

			var c = document.getElementById('bolum-ekle-num').value;

			var o = document.getElementById('bolum-oncelik').value;

			$.ajax({

				url: siteurl+"assets/ajax/bolum-ekle.php",

				type: "POST",

				data: {"m":m,"c":c,'o':o},

				success: function (msg) {

			    	$('#ajax-msg').html(msg);

				}

			});

		});

	} catch(err) {}



	try /*Üye Ekle*/ {

		var uye_ekleButton = document.getElementById('uyeyi-gonder');

		uye_ekleButton.addEventListener("click", function() {

			var u = document.getElementById('uye-ekle-user').value;

			var c = document.getElementById('uye-ceviri-durumu').value;

			var r = document.getElementById('uye-redakte-durumu').value;
			
			var cl = document.getElementById('uye-clean-durumu').value;

			var t = document.getElementById('uye-typeset-durumu').value;

			var k = document.getElementById('uye-kontrol-durumu').value;

			$.ajax({

				url: siteurl+"assets/ajax/uye-ekle.php",

				type: "POST",

				data: {"u":u,"c":c,"r":r,"cl":cl,"t":t,"k":k},

				success: function (msg) {

			    	$('#uye-ekle-pass').html(msg);

				}

			});

		});

	} catch(err) {}



	try /*Gizlenenleri Göster*/ {



		var gizlenenleri_goster = document.getElementById('gizlilerigoster');

		gizlenenleri_goster.addEventListener("change", function() {

			var value = gizlenenleri_goster.checked;



			if (value == true) {

				document.querySelector(":root").style.setProperty('--gizliBolum', "flex");

			} else {

				document.querySelector(":root").style.setProperty('--gizliBolum', "none");

			}





		});





	} catch(err) {}



	try /*Ban Tablosu*/{

		var banlanan_guncelle = document.getElementById('banlananlar-guncelle');

		banlanan_guncelle.addEventListener("click", function() {

			var satirlar = document.querySelectorAll('.banlananlar-table .banlananlar-tr');

			satir_sayisi = satirlar.length;

			for (var i = 1; i < satir_sayisi; i++) {

				var id = i;

				var sebep = document.querySelector(".banlananlar-tr#user-"+i+" textarea").value;

				$.ajax({

					url: siteurl+"assets/ajax/ban-guncelle.php",

					type: "POST",

					data: {"id":id,"sebep":sebep},

			    	success: function (msg) {

			        	$('#ajax-msg').html(msg);

			    	}

				});

			}

			bildirim("Tablo Başarıyla Güncellendi");

		})

	} catch(err) {}









	//** BÖLÜM GÖNDERME İŞLEMLERİ **/



	

	try {

		var ceviri_gonderici = document.getElementById('ceviri-gonder');

		ceviri_gonderici.addEventListener("click", function() {

			var x  = document.querySelector(".placeanote").value;

			var ch = document.getElementById("getchapter").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/ceviri.php",

				type: "POST",

				data: {"note":x,"chapter":ch},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}

	try {

		var redakte_gonderici = document.getElementById('redakte-gonder');

		redakte_gonderici.addEventListener("click", function() {

			var x  = document.querySelector(".placeanote").value;

			var ch = document.getElementById("getchapter").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/redakte.php",

				type: "POST",

				data: {"note":x,"chapter":ch},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}



	try {

		var clean_gonderici = document.getElementById('clean-gonder');

		clean_gonderici.addEventListener("click", function() {

			var x  = document.querySelector(".placeanote").value;

			var ch = document.getElementById("getchapter").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/clean.php",

				type: "POST",

				data: {"note":x,"chapter":ch},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}



	try {

		var typeset_gonderici = document.getElementById('typeset-gonder');

		typeset_gonderici.addEventListener("click", function() {

			var x  = document.querySelector(".placeanote").value;

			var ch = document.getElementById("getchapter").innerHTML;

			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/typeset.php",

				type: "POST",

				data: {"note":x,"chapter":ch},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}



	try {

		var kontrol_gonderici = document.getElementById('kontrol-gonder');

		kontrol_gonderici.addEventListener("click", function() {

			var x  = document.querySelector(".placeanote").value;

			var ch = document.getElementById("getchapter").innerHTML;



			var textBoxes = document.querySelectorAll(".kontrolInput");



			var kontrol = "";

			textBoxes.forEach(function(input) {

				kontrol = kontrol + input.value + "[[inputTextBox]]";

			})

			kontrol = kontrol.slice(0,-16)



			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/kontrol.php",

				type: "POST",

				data: {"note":x,"chapter":ch,"kontrol":kontrol},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}



	try {

		var hazir_gonderici = document.getElementById('hazir-gonder');

		hazir_gonderici.addEventListener("click", function() {

			var ch = document.getElementById("getchapter").innerHTML;



			$.ajax({

				url: siteurl+"assets/ajax/bolum-gonder/hazir.php",

				type: "POST",

				data: {"chapter":ch},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch (err) {}



	





	



	

    /*setTimeout(function () {

        $(".lazy").each(function () {

            $(this).attr("src", $(this).attr("data-src"));

        });





    }, 1000);*/



     $(window).scroll(function () {

        $(".lazy").each(function () {

            if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {

                $(this).attr("src", $(this).attr("data-src"));

            }

        });

    });



     setTimeout(function() {

     	window.scrollTo(0, 1);

     	setTimeout(function() {

			window.scrollTo(0,0);	     	

	     }, 500);



     }, 1000);







}	







   

