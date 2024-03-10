-- MySQL dump 10.19  Distrib 10.3.35-MariaDB, for Linux (x86_64)
--
-- Host: localhost
-- ------------------------------------------------------
-- Server version	10.3.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ver` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `site_url` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayarlar`
--

LOCK TABLES `ayarlar` WRITE;
/*!40000 ALTER TABLE `ayarlar` DISABLE KEYS */;
INSERT INTO `ayarlar` VALUES (1,'1.4.2','https://ekip.example.com/');
/*!40000 ALTER TABLE `ayarlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bakiye_kaydi`
--

DROP TABLE IF EXISTS `bakiye_kaydi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bakiye_kaydi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4293 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bakiye_kaydi`
--

LOCK TABLES `bakiye_kaydi` WRITE;
/*!40000 ALTER TABLE `bakiye_kaydi` DISABLE KEYS */;
/*!40000 ALTER TABLE `bakiye_kaydi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ban_istisnalari`
--

DROP TABLE IF EXISTS `ban_istisnalari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ban_istisnalari` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ban_istisnalari`
--

LOCK TABLES `ban_istisnalari` WRITE;
/*!40000 ALTER TABLE `ban_istisnalari` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban_istisnalari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ban_sebepleri`
--

DROP TABLE IF EXISTS `ban_sebepleri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ban_sebepleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ban_sebebi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `banlayan` int(11) DEFAULT NULL,
  `banlanma_zamani` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ban_sebepleri`
--

LOCK TABLES `ban_sebepleri` WRITE;
/*!40000 ALTER TABLE `ban_sebepleri` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban_sebepleri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolumler`
--

DROP TABLE IF EXISTS `bolumler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_id` int(11) NOT NULL,
  `bolum_no` float NOT NULL,
  `oncelik` varchar(5) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'F',
  `ceviri` int(11) NOT NULL DEFAULT 0,
  `cevirmen` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cevirmen_note` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `ceviri_alim` timestamp NULL DEFAULT NULL,
  `ceviri_teslim` timestamp NULL DEFAULT NULL,
  `redakte` int(11) NOT NULL DEFAULT 0,
  `redaktor` int(11) DEFAULT 1,
  `redaktor_note` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `redakte_alim` timestamp NULL DEFAULT NULL,
  `redakte_teslim` timestamp NULL DEFAULT NULL,
  `clean` int(11) NOT NULL DEFAULT 0,
  `cleaner` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cleaner_note` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `clean_alim` timestamp NULL DEFAULT NULL,
  `clean_teslim` timestamp NULL DEFAULT NULL,
  `typeset` int(11) NOT NULL DEFAULT 0,
  `typesetter` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `typesetter_note` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `typeset_alim` timestamp NULL DEFAULT NULL,
  `typeset_teslim` timestamp NULL DEFAULT NULL,
  `kontrol` int(11) NOT NULL DEFAULT 0,
  `kontrolcu` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kontrolcu_note` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `kontrol_alim` timestamp NULL DEFAULT NULL,
  `kontrol_teslim` timestamp NULL DEFAULT NULL,
  `bolum_gizliligi` int(11) NOT NULL DEFAULT 0,
  `kontrol_metni` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `hazir` int(11) NOT NULL DEFAULT 0,
  `fiyat` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1557 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolumler`
--

LOCK TABLES `bolumler` WRITE;
/*!40000 ALTER TABLE `bolumler` DISABLE KEYS */;
/*!40000 ALTER TABLE `bolumler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ceza_sistemi`
--

DROP TABLE IF EXISTS `ceza_sistemi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ceza_sistemi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gonullu_tarih` timestamp NULL DEFAULT NULL,
  `ceza` int(11) NOT NULL DEFAULT 0,
  `son_ceza` timestamp NULL DEFAULT NULL,
  `son_af` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ceza_sistemi`
--

LOCK TABLES `ceza_sistemi` WRITE;
/*!40000 ALTER TABLE `ceza_sistemi` DISABLE KEYS */;
/*!40000 ALTER TABLE `ceza_sistemi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donen_talepler`
--

DROP TABLE IF EXISTS `donen_talepler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donen_talepler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `talep` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `onay` int(11) NOT NULL DEFAULT 0,
  `onay_ret_sahibi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donen_talepler`
--

LOCK TABLES `donen_talepler` WRITE;
/*!40000 ALTER TABLE `donen_talepler` DISABLE KEYS */;
/*!40000 ALTER TABLE `donen_talepler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duyurular`
--

DROP TABLE IF EXISTS `duyurular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `baslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duyurular`
--

LOCK TABLES `duyurular` WRITE;
/*!40000 ALTER TABLE `duyurular` DISABLE KEYS */;
/*!40000 ALTER TABLE `duyurular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `izinler`
--

DROP TABLE IF EXISTS `izinler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `izinler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bitis_tarihi` datetime NOT NULL,
  `sebep` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sure` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `iptal` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `izinler`
--

LOCK TABLES `izinler` WRITE;
/*!40000 ALTER TABLE `izinler` DISABLE KEYS */;
/*!40000 ALTER TABLE `izinler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kavramlar`
--

DROP TABLE IF EXISTS `kavramlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kavramlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_id` int(11) NOT NULL,
  `ekleyen` int(11) NOT NULL,
  `ingilizce` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `turkce` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `eklenme_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=992 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kavramlar`
--

LOCK TABLES `kavramlar` WRITE;
/*!40000 ALTER TABLE `kavramlar` DISABLE KEYS */;
/*!40000 ALTER TABLE `kavramlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kayit_defteri`
--

DROP TABLE IF EXISTS `kayit_defteri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kayit_defteri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25050 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kayit_defteri`
--

LOCK TABLES `kayit_defteri` WRITE;
/*!40000 ALTER TABLE `kayit_defteri` DISABLE KEYS */;
/*!40000 ALTER TABLE `kayit_defteri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `heading` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2049 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seriler`
--

DROP TABLE IF EXISTS `seriler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_name` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `manga_cover` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cumleler` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `turler` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ceviri_kaynak` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `clean_kaynak` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `availability` int(11) NOT NULL DEFAULT 0,
  `cevirmen` int(11) DEFAULT NULL,
  `cleaner` int(11) DEFAULT NULL,
  `typesetter` int(11) DEFAULT NULL,
  `kontrolcu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seriler`
--

LOCK TABLES `seriler` WRITE;
/*!40000 ALTER TABLE `seriler` DISABLE KEYS */;
/*!40000 ALTER TABLE `seriler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `pass` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `profile` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `about` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `ceviri_st` int(11) NOT NULL DEFAULT 0,
  `redakte_st` int(11) NOT NULL DEFAULT 0,
  `clean_st` int(11) NOT NULL DEFAULT 0,
  `typeset_st` int(11) NOT NULL DEFAULT 0,
  `kontrol_st` int(11) NOT NULL DEFAULT 0,
  `ucretli` int(11) NOT NULL DEFAULT 0,
  `ad_soyad` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `iban` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bakiye` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `status` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ayrilik` timestamp(6) NULL DEFAULT NULL,
  `additional_role` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `account_year` datetime NOT NULL DEFAULT current_timestamp(),
  `last_ch` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uyeler`
--

LOCK TABLES `uyeler` WRITE;
/*!40000 ALTER TABLE `uyeler` DISABLE KEYS */;
/*!40000 ALTER TABLE `uyeler` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-23 10:20:47
