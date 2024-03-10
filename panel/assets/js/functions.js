function hesabagir(id) {

	$.ajax({

		url: siteurl+"assets/ajax/hesaba-gir.php",

		type: "POST",

		data: {"id":id},

		success: function (msg) {

	    	$('#ajax-msg').html(msg);

		}

	});

}



function lastOnline() {

	$.ajax({
		url: siteurl+"assets/ajax/last-online.php"
	});

}





function popup (button, hedef) {

	try {

		var b = document.querySelectorAll(button);

		var h = document.getElementById(hedef);



		b.forEach(function(rb) {

			rb.addEventListener("click", function() {

				var s = h.style.top;

				if (s == "0%") {

					h.style.top = "-100%";

				}

				else {

					h.style.top = "0%";

				}

			});	

		});



	}catch (err){}



};



function bolumZiple() {

	var ch = document.getElementById("getchapter").innerHTML;

	try{var page = document.querySelector('.sekmeBaslik').innerHTML}catch(err){};

	$.ajax({

		url: siteurl+"assets/ajax/zip-yap.php",

		type: "POST",

		data: {"id":ch,"page":page},

		success: function (msg) {

	    	$('#ajax-msg').html(msg);

		}

	});

}



function htmlTOcanvas(kaynak, hedef) {

	html2canvas(document.getElementById(kaynak), {

		width: 1920,

		height:1080

	}).then(function(canvas) {

	    document.getElementById(hedef).appendChild(canvas);

	});

}







function bolumSekmesi(button, hedef) {

	try {

		var b = document.getElementById(button);

		var h = document.getElementById(hedef);

		var a = b.querySelector("i");



		b.addEventListener("click", function() {

			var s = h.style.maxHeight;

			if (s == "1e+15%") {

				h.style.maxHeight = "0%";

				h.style.height = "0";

				h.style.transform = "scaleY(0)";

				h.style.opacity = "0";

				h.style.marginBottom = "0";

				a.style.transform = "rotate(0)";

			}

			else {

				h.style.maxHeight = "1e+15%";

				h.style.height = "auto";

				h.style.transform = "scaleY(1)";

				h.style.opacity = "1";

				h.style.marginBottom = "60px";

				a.style.transform = "rotate(90deg)";

			}

		});

	}catch(err){}	

};



function acilirPencere(button, hedef) {

	try {

		var b = document.getElementById(button);

		var h = document.getElementById(hedef);

		var a = b.querySelector("span:first-child");



		b.addEventListener("click", function() {

			var s = h.style.maxHeight;

			if (s == "1000px") {

				h.style.maxHeight = "0%";

				h.style.transform = "scaleY(0)";

				h.style.marginTop = "0";

				h.style.padding = "0";

				a.style.transform = "rotate(-90deg)";

			}

			else {

				h.style.maxHeight = "1000px";

				h.style.transform = "scaleY(1)";

				h.style.marginTop = "30px";

				h.style.padding = "20px 25px";

				a.style.transform = "rotate(0deg)";

			}

		});

	}catch(err){}	

};





function previewBeforeUpload(button, hedef) {

	try {

		document.querySelector(button).addEventListener("change", function(e){

			if(e.target.files.length == 0) {

				return;

			}

			let file = e.target.files[0];

			let url = URL.createObjectURL(file);

			document.querySelector(hedef+' img').src = url;

		});

	}catch (err){}

}



function sifreGoster_Gizle(button, hedef) {

	try {

		var passSt = false;

		var showPassBut = document.getElementById(button);

		var passInput = document.getElementById(hedef);

		var open_eye = document.getElementById("open_eye");

		var closed_eye = document.getElementById("closed_eye");

		

		showPassBut.addEventListener("click", function() {

			if (passSt == false) {

				passSt = true;

				passInput.type = "text";

				closed_eye.style.display = "block";

				open_eye.style.display = "none";

			}



			else {

				passSt = false;

				passInput.type = "password";

				closed_eye.style.display = "none";

				open_eye.style.display = "block";

			}

		});

	} catch(err){}

}



function kavramEkleButton(button, hedef,mainButton) {

	try {

		var b = document.getElementById(button);

		var h = document.getElementById(hedef);

		var m = document.getElementById(mainButton);



		b.addEventListener("click", function() {

			var s = h.style.display;

			if (s == "none") {

				h.style.display = "block";

				b.style.display = "none";

			}

			else {

				h.style.display = "none";

				m.style.display = "block";

			}

		});	

	} catch(err){}

}





function bildirim(mesaj) {

	try {

		var notification = document.getElementById('notification');

		notification.innerHTML = mesaj;



		notification.style.animation = "undefined";

		setTimeout(function(){

			notification.style.animation = "notification 4s linear";

		},100);

	

	} catch(err){}

}

function ibankopyala(element){
	var text = document.getElementById(element).innerHTML;
	var textAlani = document.createElement('textarea');
	textAlani.value = text;
	document.body.appendChild(textAlani);
	textAlani.select();
	document.execCommand('copy');
	textAlani.style.display = 'none';
	bildirim("Kopyalandı");
}



function kopyala(button,hedef){

	try{

		var b = document.querySelector(button);

		b.addEventListener("click",function(){

		    var cop = document.createElement("div");

		    cop.setAttribute("contentEditable", true);

		    cop.innerHTML = document.querySelector(hedef).innerHTML;

		    cop.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 

		    b.appendChild(cop);

		    cop.focus();

		    document.execCommand("copy");

		    b.removeChild(cop);

		    bildirim("Kopyalandı");

		});

	} catch(err){}

}









function satirEkle() {

	try {

		var x = document.querySelectorAll("#rows label input")

		var rCount = x.length;

		var y = x[rCount - 1];

		if(y.value != "") {

			setTimeout(100)

			rCount++;

			var allRows = document.getElementById("rows");



			crRow = document.createElement("label");

			crRow.setAttribute("class","row");

			crRow.setAttribute("id", "row"+rCount);

			allRows.appendChild(crRow);



			crSpan = document.createElement("span");

			crSpan.setAttribute("class","rownum");

			const textnode = document.createTextNode(rCount);

			crSpan.appendChild(textnode);

			document.getElementById("row"+rCount).appendChild(crSpan);



			crInput = document.createElement('input');

			crInput.setAttribute("type", "text");

			crInput.setAttribute("name", "satir"+rCount);

			crInput.setAttribute("id", "satir"+rCount);

			crInput.setAttribute("tabindex", rCount);

			document.getElementById("row"+rCount).appendChild(crInput);



			crSelect = document.createElement('select');

			crSelect.setAttribute("name", "rowtype"+rCount);

			crSelect.setAttribute("id", "rowtype"+rCount);

			crSelect.setAttribute("class", "rowtype");

			document.getElementById("row"+rCount).appendChild(crSelect);



			var kaynak = document.getElementById("rowoptions");

			var kopya = kaynak.cloneNode(true);  

			document.getElementById("rowtype"+rCount).appendChild(kopya);

		}

	}catch(err) {}

}























/*AJAX*/





function donusOnayla(id) {

	var chid = id;

	$.ajax({

		url: siteurl+"assets/ajax/ekibe-al-doldur.php",

		type: "POST",

		data: {"chapter":chid},

    	success: function (msg) {

        	$('#ajax-msg').html(msg);

    	}

	});

}



function yuklemelinki(id) {

	var chid = id;

	$.ajax({

		url: siteurl+"assets/ajax/yuklemelinki.php",

		type: "POST",

		data: {"chapter":chid},

    	success: function (msg) {

        	$('#bolum-sonuc span:first-child').html(msg);

    	}

	});

}



function bakiye_sifirla(id) {

	$.ajax({

		url: siteurl+"assets/ajax/bakiye_sifirla.php",

		type: "POST",

		data: "id="+id,

		success: function (msg) {

        	$('#ajax-msg').html(msg);

    	}

	});

}



function banla(id) {

	var hammer = document.getElementById('banhammer'+id);

	hammer.style.transform = "rotate(-77deg)";





	var player= document.getElementById('pl');

	player.play();



	var css = 'banhammer'+id+':hover{ transform: unset !important }';

	var style = document.createElement('style');





	if (style.styleSheet) {

	    style.styleSheet.cssText = css;

	} else {

	    style.appendChild(document.createTextNode(css));

	}



	document.getElementsByTagName('head')[0].appendChild(style);



	setTimeout(function () {

		var broken = document.getElementById('broken'+id);

		broken.style.display = 'block';



		var bannedYazi = document.getElementById('banlandi');

		bannedYazi.style.display = "flex";

		bannedYazi.style.opacity = '1';

		setTimeout(function(){

			bannedYazi.style.letterSpacing = '150px';

		},500);

		setTimeout(function(){

			bannedYazi.style.display ="none";

			bannedYazi.style.opacity = "0";

			bannedYazi.style.letterSpacing = "0";

		},2000);



		$.ajax({

			url: siteurl+"assets/ajax/banla.php",

			type: "POST",

			data: "id="+id,

		});

	},80);	

}



function ceviriGuncelle(ch_id) {

	try {

		var x = document.querySelectorAll("#rows label");

		var rCount = x.length;

		var cevirimetni = "";

		var chid = ch_id;



		x.forEach(function(a) {

			if(a.querySelector("input").value == "") {

				var satirIcerigi = " ";

			}

			else {

				var satirIcerigi = a.querySelector("input").value;

			}

			cevirimetni += "[row]"+a.querySelector("select").value;

			cevirimetni += satirIcerigi;

		});

		cevirimetni = cevirimetni.slice(0,-10);	

		if(document.querySelector("label#row1 input").value == '') {cevirimetni = ''};	

		$.ajax({

			url: siteurl+"assets/ajax/ceviri-defter.php",

			type: "POST",

			data: {"chapter":chid,"rowcount":rCount,"metin":cevirimetni},

        	success: function (msg) {

            	$('#ajax-msg').html(msg);

        	}

		});



		bildirim("Çeviri Kaydedildi");



	} catch(err) { alert(err)}

}







function ceviriGetir(id) {

	var chid = id;

	$.ajax({

		url: siteurl+"assets/ajax/defter-getir.php",

		type: "POST",

		data: {"chapter":chid},

    	success: function (msg) {

        	$('#ceviri_getir').html(msg);

    	}

	});

}





function kavramEkle(seri,ekleyen,button,input,input2) {

	try {

		var seriid = seri;

		var kavramEkle_button = document.getElementById(button);



		kavramEkle_button.addEventListener("click", function() {	

			var kavramEkle_ingilizce  = document.getElementById(input).value;

			var kavramEkle_turkce  = document.getElementById(input2).value;

			$.ajax({

				url: siteurl+"assets/ajax/kavram-ekle.php",

				type: "POST",

				data: {"seri":seriid,"ekleyen":ekleyen,"ingilizce":kavramEkle_ingilizce,"turkce":kavramEkle_turkce},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});

		});

	} catch(err){}

}



function kavramGuncelle(seri,input) {

	try {

		var check = document.getElementById('editingKavramlar').checked;

		if (check == false) {

			var seriid = seri;

			var kavram = document.getElementById(input).value;



			$.ajax({

				url: siteurl+"assets/ajax/kavram-guncelle.php",

				type: "POST",

				data: {"seri":seriid,"kavram":kavram},

		    	success: function (msg) {

		    		$('#kavram-guncelle').html(msg);

		    		

		    		var defter = document.querySelector("#kavram-defteri ul.popup-list");

		    		var kaynak = document.querySelector("#kavram-kaynak ul");

		    		if (defter.innerHTML != kaynak.innerHTML) {

		    			defter.innerHTML = kaynak.innerHTML;

		    		}

		    	}

			});

		}

	} catch(err) {}

}



function odulVer() {

	try {

		var uye = document.getElementById('uye').innerHTML;

		var role = document.getElementById('role').innerHTML;

		var ch = document.getElementById('ch').innerHTML;

		$.ajax({

			url: siteurl+"assets/ajax/odul-ver.php",

			type: "POST",

			data: {"uye":uye,"role":role, "ch":ch},

	    	success: function (msg) {

	    		$('#ajax-msg').html(msg);

	    	}

		});

	} catch(err) {}

}



function geriGonder() {

	try {

		var uye = document.getElementById('uye').innerHTML;

		var role = document.getElementById('role').innerHTML;

		var ch = document.getElementById('ch').innerHTML;

		$.ajax({

			url: siteurl+"assets/ajax/geri-gonder.php",

			type: "POST",

			data: {"uye":uye,"role":role,"ch":ch},

	    	success: function (msg) {

	    		$('#ajax-msg').html(msg);

	    	}

		});

	} catch (err) {}

}



function bolumuOnayla() {

	try {

		var uye = document.getElementById('uye').innerHTML;

		var role = document.getElementById('role').innerHTML;

		var ch = document.getElementById('ch').innerHTML;

		$.ajax({

			url: siteurl+"assets/ajax/bolumu-onayla.php",

			type: "POST",

			data: {"uye":uye,"role":role,"ch":ch},

	    	success: function (msg) {

	    		$('#ajax-msg').html(msg);

	    	}

		});

	} catch (err) {}

}



function bolumGizle(id) {

	try {

		

		setTimeout(function () {

			var input = document.querySelector(".chapter-table#bolum-tablosu"+id+" .manga-infos .manga-hazirlayan input").checked;

			if (input == true) {

				document.querySelector(".chapter-table#bolum-tablosu"+id).classList.value="chapter-table gizli-bolum";

			}

			else {

				document.querySelector(".chapter-table#bolum-tablosu"+id).classList.value="chapter-table";

			}

		



		

			$.ajax({

				url: siteurl+"assets/ajax/bolumu-gizle.php",

				type: "POST",

				data: {"id":id, "value": input},

		    	success: function (msg) {

		    		$('#ajax-msg').html(msg);

		    	}

			});	

		},350);

	} catch (err) {}

}





function bolum(id,role,index) {

	$.ajax({

		url: "assets/ajax/bolum-al.php",

		type: "POST",

		data: {"id":id,"role":role,"index":index},

    	success: function (msg) {

        	$('#ajax-msg').html(msg);

    	}

	});

}





function sendNotification(hedef,id,type,baslik,icerik,tarih) {

	if (tarih == null || tarih == "") tarih = "";

	$.ajax({

		url: siteurl+"assets/ajax/notification.php",

		type: "POST",

		data: {"hedef":hedef,"id":id,"type":type,"baslik":baslik,"icerik":icerik,"tarih":tarih},

    	success: function (msg) {

        	$('#ajax-msg').html(msg);

    	}

	});

}



function saveCanvasImage(id) {

	if(canvas = document.querySelector("#canvas canvas:last-child")) {

		var dataURL = canvas.toDataURL();

		$.ajax({

			url: siteurl+"assets/ajax/resmi-kaydet.php",

			type: "POST",

			data: {"imgBase64": dataURL,"chapter": id},

	    	success: function (msg) {

	        	$('#ajax-msg').html(msg);

	    	}
		});
	}

	else {
		setTimeout(function(){saveCanvasImage(id)},300);
	}

	document.querySelector("canvas").remove();

}



function duyurusil(id) {

	bildirim("5 Saniye içinde duyuru silinecek. İptal etmek için sayfayı yenile!");

	setTimeout(function(){

		$.ajax({

			url: siteurl+"assets/ajax/duyuru-sil.php",

			type: "POST",

			data: {"id":id},

	    	success: function (msg) {

	        	$('#ajax-msg').html(msg);

	    	}

		});

	},5000);

}



function bolumusil(id) {

	bildirim("5 Saniye içinde bölüm silinecek. İptal etmek için sayfayı yenile!");

	setTimeout(function(){

		$.ajax({

			url: siteurl+"assets/ajax/bolumu-sil.php",

			type: "POST",

			data: {"id":id},

	    	success: function (msg) {

	        	$('#ajax-msg').html(msg);

	    	}

		});

	},5000);

}



function seriyisil(id) {

	bildirim("15 Saniye içinde seri ve tüm bölümleri silinecek. İptal etmek için sayfayı yenile!");

	setTimeout(function(){

		$.ajax({

			url: siteurl+"assets/ajax/seriyi-sil.php",

			type: "POST",

			data: {"id":id},

	    	success: function (msg) {

	        	$('#ajax-msg').html(msg);

	    	}

		});

	},5000);

}



function kavramCevir(id,user) {

	try {

		var checkbox = document.getElementById("editingKavramlar");

		var kav = document.getElementById("kav"+id);

		var en = document.getElementById("en"+id);

		var tr = document.getElementById("tr"+id);

		var ekleyen = document.querySelector("#kav"+id+" span:nth-child(3)");

		var root = document.querySelector(":root");



		var enC = en.innerHTML;

		var trC = tr.innerHTML;

		var ekleyenC = ekleyen.innerHTML;



		if (checkbox.checked == false) {

			checkbox.checked = true;



			setTimeout(function() {

				enC = en.innerHTML;

				trC = tr.innerHTML;

				ekleyenC = ekleyen.innerHTML;

				kav.innerHTML = "";

				

				crInput = document.createElement("input");

				crInput.setAttribute("id","en"+id);

				crInput.setAttribute("value",enC);

				kav.appendChild(crInput);



				crInput = document.createElement("input");

				crInput.setAttribute("id","tr"+id);

				crInput.setAttribute("value",trC);

				kav.appendChild(crInput);



				crSpan = document.createElement("span");

				kav.appendChild(crSpan);

				document.querySelector('#kav'+id+' span:last-child').innerHTML = ekleyenC;



				crSpan = document.createElement("span");

				kav.appendChild(crSpan);

				crI = document.createElement("i");

				crI.setAttribute("class","fas fa-check");

				crI.setAttribute("style","display:block");

				crI.setAttribute("onclick","kavramCevir("+id+","+user+")");

				crSpan.appendChild(crI);



				root.style.setProperty('--kavram', "none");

			},300);



		} else {



			enS = document.getElementById("en"+id).value;

			trS = document.getElementById("tr"+id).value;



			$.ajax({

				url: siteurl+"assets/ajax/kavram-degistir.php",

				type: "POST",

				data: {"id":id,"ingilizce":enS,"turkce":trS,"user":user},

		    	success: function (msg) {

		        	$('#ajax-msg').html(msg);

		    	}

			});



			root.style.setProperty('--kavram', "block");



			bildirim("Kavram Başarıyla Düzenlendi!");



			setTimeout(function() {checkbox.checked = false;},300);

		}

	} catch(err) {}

}



















