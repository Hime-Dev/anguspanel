<?php 
error_reporting(0);

/*****************************************************************/

/*****************
 * Site Ayarları *
 * ***************/

//veritabanının sunucudaki ismi
$veritabani_ismi = "mang_ekip";
$veritabani_user = "mang_ekip";
$veritabani_pass = "";


/*****************************************************************/

/******************
 * TOKEN OLUŞTURMA*
 * ***************/



/************************
 * VERİTABANI İŞLEMLERİ *
 * **********************/

$database = mysqli_connect("localhost",$veritabani_user,$veritabani_pass, $veritabani_ismi);
header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

if(!$database) {echo "Veritabanı Bağlantı Hatası!<br>";}

$ayarlar = $database->query("SELECT * FROM ayarlar");
$ayar = $ayarlar->fetch_assoc();

//site ayarları
$siteurl = $ayar['site_url'];
$sitever = $ayar['ver'];

//Türkçe Karakter
mysqli_query($database,"SET NAMES utf8");
mysqli_query($database,"SET CHARACTER SET utf8");


/**Üyelik İşlemleri**/

$sifreMethod = "AES-128-CBC";
$sifreKey = "";

session_start();
if (isset($_SESSION['id'])) {
    $userDBID = $_SESSION['id'];
    $user = $database->query("SELECT * FROM uyeler WHERE id = '$userDBID'");
    $userDB = $user->fetch_assoc();

        //Admin sayfası sorgusu
        $additional = $userDB['additional_role'];
        if (
            $additional == "admin" OR
            $additional == "mod"
        ) {
            $admin = true;
        } else {
            $admin = false;
        }

        //Rol seviyeleri sorgusu
        $ceviri_st = $userDB['ceviri_st'];
        $redakte_st = $userDB['redakte_st'];
        $clean_st = $userDB['clean_st'];
        $typeset_st = $userDB['typeset_st'];
        $kontrol_st = $userDB['kontrol_st'];

        //İzin Sorgusu
        $izinler = $database->query("SELECT * FROM izinler WHERE user_id = '$userDBID'");
        if ($izinler->num_rows>0) {
            while($izin = $izinler->fetch_assoc()) {
                if($izin['iptal'] != "1") {
                    $bitis = $izin['bitis_tarihi'];
                    $sebep = $izin['sebep'];
                    $gunumuz = time();
                    $sonuc = strtotime($bitis) - $gunumuz;
                    if ($sonuc > 0) {
                        include 'error-pages/izin.php';
                        die();
                    } 
                }
            }
        }

        //Status Sorgusu
        if ($userDB['status'] == "left") {
            include 'error-pages/left.php';
            die();
        } else if ($userDB['status'] == "banned") {
            include 'error-pages/banned.php';
            die();
        }


}

else if (isset($_COOKIE['user'])) {
    $cookie = json_decode($_COOKIE['user'], true);
    $username = $cookie['user'];
    $pass = $cookie['pass'];
    if($user = $database->query("SELECT * FROM uyeler WHERE user = '$username'")) {
        $user = $user->fetch_assoc();
        if ($user['pass'] == $pass) {
            $_SESSION['id'] = $user['id'];
            echo "<script>window.location.reload()</script>";
        }
    }
}






/*************
 * EKSTRALAR *
 * **********/

require 'functions.php';

?>
