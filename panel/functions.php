<?php 
	function url_cevir($url_yazisi){
		$a = str_replace("'", "", str_replace(".", "-", str_replace(":", "-", str_replace( 'ğ', 'g', str_replace( 'ü', 'u', str_replace( 'ö', 'o', str_replace( 'ç', 'c', str_replace( 'ş', 's', str_replace( 'ı', 'i', str_replace ( ' ', '-', str_replace("?", "", str_replace("&","",mb_strtolower($url_yazisi)))))))))))));
		return $a;
	}

	function ch_status($status,$user) {
		if ($status == "0" AND $user == null) 
			return "dokunulmamis";
		else if ($status == "0" AND $user != null) 
			return "yapiliyor";
		else if ($status == "1") 
			return "hazir";
			
	}

	function gecen_sure($tarih)	{
		date_default_timezone_set('Europe/Istanbul');
		$tarih = strtotime($tarih);

		$time_difference = time()-$tarih;

		$seconds = $time_difference ;
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 );
		$days = round($time_difference / 86400 );
		$weeks = round($time_difference / 604800 );
		$months = round($time_difference / 2419200 );
		$years = round($time_difference / 29030400 );
		// Seconds
		if($seconds <= 60) { echo "$seconds saniye önce"; }
		//Minutes
		else if($minutes <=60) {
			if($minutes==1) {
				echo "1 dakika önce"; }
			else {
				echo "$minutes dakika önce";
			}
		}
		//Hours
		else if($hours <=24) {
			if($hours==1) {
				echo "1 saat önce";
			}
			else {
				echo "$hours saat önce";
			}
		}
		//Days
		else if($days <= 7) {
			if($days==1) {
				echo "1 gün önce";
			}
			else {
				echo "$days gün önce";
			}
		}
		//Weeks
		else if($weeks <= 4) {
			if($weeks==1) {
				echo "1 hafta önce";
			}
			else {
				echo "$weeks hafta önce";
			}
		}
		//Months
		else if($months <=12) {
			if($months==1) {
				echo "1 ay önce";
			}
			else {
				echo "$months ay önce";
			}
		}
		//Years
		else {
			if($years==1) {
				echo "1 yıl önce";
			}
			else {
				echo "$years yıl önce";
			}
		}
	}

	function Zip($source, $destination) {    
	    if (!extension_loaded('zip') || !file_exists($source)) {     
	        return false;     
	    }       

	    $zip = new ZipArchive();    
	    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {    
	        return false;    
	    }    

	    if (is_dir($source) === true)      
	    {      
	        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);        

	        foreach ($files as $file)     
	        {      
	            $file = str_replace('\\', '/', $file);     

	            // Ignore "." and ".." folders        
	            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )        
	                continue;    

	            if (is_dir($file) === true)    
	            {    
	                $zip->addEmptyDir(str_replace($source . '/', '', $file));    
	            }    
	            else if (is_file($file) === true)    
	            {    
	                $zip->addFile($file, str_replace($source . '/', '', $file));      
	            }       
	        }      
	    }
	    else if (is_file($source) === true)    
	    {    
	        $zip->addFromString(basename($source), file_get_contents($source));    
	    }    

	    echo "<script>var zipstatus = true;</script>";

	    return $zip->close();    
	}  

	function createpass(){
		$karakterler = "1234567890abcdefghijKLMNOPQRSTuvwxyzABCDEFGHIJklmnopqrstUVWXYZ0987654321?!={}[]()*-_";
		$sifre = '';
		for($i=0;$i<20;$i++) {
			$sifre .= $karakterler[rand() % 84];
		}
		return $sifre;
	}

	function tirnak($text) {
		$text = str_replace("'","&#39;",
			str_replace(":","&#58;",
				str_replace('"','&#34;',$text)
			)
		);
		return $text;
	}

	function bakiye_log($mesaj) {
		global $database;
		$tarih = date("Y-m-d H:i:s");
		$mesaj = tirnak($mesaj);
		$database->query("INSERT INTO bakiye_kaydi(icerik) VALUES('".$mesaj."')");
	}

	function ekip_log($mesaj) {
		global $database;
		$tarih = date("Y-m-d H:i:s");
		$mesaj = tirnak($mesaj);
		$database->query("INSERT INTO kayit_defteri(icerik,time) VALUES('".$mesaj."','".$tarih."')");
	}

	function ucretlendirme($kb) {
        if ($kb > 0) $tl = 8;
        if ($kb >= 2) $tl = 12;
        if ($kb >= 3) $tl = 14;
        if ($kb >= 4) $tl = 16;
        if ($kb >= 5) $tl = 18;
        if ($kb >= 6) $tl = 19;
        if ($kb >= 7) $tl = 20.5;
        if ($kb >= 8) $tl = 22;
        if ($kb >= 9) $tl = 23;
        if ($kb >= 10) $tl = 24;
        if ($kb > 10) {
            $kb = ceil($kb);
            $tl = $tl + 0.5 * ($kb - 11);
        } 
        return $tl;
    }


	


?>