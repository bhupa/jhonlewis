-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: jhonlewis
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` int(10) unsigned DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,'Bhupendra','Sapkota','nijbhup27@gmail.com',NULL,'9860921715','13-05-2020','1',NULL,'2020-05-04 18:01:50','2020-05-04 18:01:50',NULL,NULL,NULL,NULL),(2,'Bhupendra','Sapkota','nijbhup27@gmail.com',NULL,'9860921715','24-05-1979','1',NULL,'2020-05-06 13:04:55','2020-05-06 13:04:55',NULL,'Frame Consultation','Late Morning','Others'),(3,'Bhupendra','Sapkota','nijbhup27@gmail.com',NULL,'9860921715','14-05-2020','1',NULL,'2020-05-06 13:40:55','2020-05-06 13:40:55',NULL,'Eye Examination','Early Morning','Mr.'),(4,'Bhupendra','Sapkota','nijbhup27@gmail.com',NULL,'9860921715','07-05-2020','1',NULL,'2020-05-06 14:21:47','2020-05-06 14:21:47',NULL,'Eye Examination','Late Afternoon','Mr.');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_schedule`
--

DROP TABLE IF EXISTS `appointment_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_schedule`
--

LOCK TABLES `appointment_schedule` WRITE;
/*!40000 ALTER TABLE `appointment_schedule` DISABLE KEYS */;
INSERT INTO `appointment_schedule` VALUES (1,'Dolore est sed impe','dolore-est-sed-impe',1,'2020-05-10','1','2020-05-04 18:00:57','2020-05-04 18:01:00',NULL,NULL,NULL,NULL),(2,'Quos quaerat numquam','quos-quaerat-numquam',1,'2020-05-12','1','2020-05-04 18:01:11','2020-05-04 18:01:14',NULL,NULL,NULL,NULL),(3,'Tempore ipsum aut','tempore-ipsum-aut',1,'2020-05-13','1','2020-05-04 18:01:24','2020-05-04 18:01:27',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `appointment_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'cazal','cazal','banners/1588165301Cazal_Banner_2019_Legends.jpg',1,'1','cazal',NULL,'2020-04-29 13:01:41','2020-04-29 13:01:44'),(2,'cazal 12','cazal-12','banners/1588165325slide-2.jpg',1,'1','cazal 12',NULL,'2020-04-29 13:02:05','2020-04-29 13:02:09'),(3,'cazal 123','cazal-123','banners/1588165352slide-3.jpg',1,'1','cazal 123',NULL,'2020-04-29 13:02:32','2020-04-29 13:02:36'),(4,'cazal 1234','cazal-1234','banners/1588165442slide-4.jpg',1,'1','cazal 1234',NULL,'2020-04-29 13:04:02','2020-04-29 13:04:05');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selling` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Cazal','cazal','brand/1588576442cazal.png','Cazal eyewear is internationally renowned brand for extraordinary frame. Cazal frames have always been designed to be unique, unmistakable works of art.','<p><span style=\"font-weight: 400;\">Cazal eyewear is internationally&nbsp;renowned brand&nbsp;for extraordinary frame. Cazal frames have always been designed to be unique, unmistakable works of art.&nbsp;Cazal eyewear collection is available with wide range of eyeglasses and sunglasses, which most are available for prescription lenses. Find the Cazal eyewear at the John Lewis Opticians.&nbsp;Cazal eyewear&nbsp;offers many different styles and colors. All Cazal sunglasses are UV protected. All original&nbsp;Cazal eyewear&nbsp;packaging and materials are included with your Eyeglasses and Sunglasses and are made in&nbsp;Germany. All Cazal eyewear come with a 1 year warranty. &nbsp;Place your order for Cazal eyewear&nbsp;directly online or call us at 0208-316-1121</span></p>',1,1,NULL,'2020-04-30 09:04:42','2020-05-04 07:14:02',1),(2,'Dita','dita','brand/1588576422dita.png','A name synonymous with high-end fashion, DITA eyewear has been the celebrity go-to for over two decades.','<p><span style=\"font-weight: 400;\">A name synonymous with high-end fashion, DITA eyewear has been the celebrity go-to for over two decades. Holding a pair of DITA frames in your hands can&rsquo;t compare with any other brand. DITA&rsquo;s design and manufacturing standards are the benchmark by which all other luxury brands are judged- making them upper echelon. Launched in 1995 by co-founders Jeff Solorio and John Juniper, DITA&rsquo;s mission was (and still is) to create innovative, high-quality crafted eyewear with a unique look and feel.</span></p>\r\n<p><span style=\"font-weight: 400;\">DITA quickly gained popularity internationally by forging relationships within culture, style, sports, and entertainment. The brand is focused on redefining traditional standards. DITA transcends conventions by offering eyewear that ranges from bold character frames to new interpretations of timeless shapes through innovative technology.</span></p>\r\n<p>&nbsp;</p>',1,1,NULL,'2020-04-30 09:05:18','2020-05-04 07:13:42',1),(3,'Tomford','tomford','brand/15882375881588146555163-3-011.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',1,1,'2020-05-04 07:07:26','2020-04-30 09:06:28','2020-05-04 07:07:26',0),(4,'Rayban','rayban','brand/1588576404rayban.png','Timeless style, authenticity and freedom of expression are the core values of Ray-Ban, a leader in sun and prescription eyewear for generations','<p><span style=\"font-weight: 400;\">Timeless style, authenticity and freedom of expression are the core values of Ray-Ban, a leader in sun and prescription eyewear for generations. Since the introduction of the iconic Aviator model created for the aviators of the United States Army, Ray-Ban has been at the forefront of cultural change, becoming a symbol of self-expression, worn by celebrities and public figures all around the world.</span></p>\r\n<p>&nbsp;</p>',1,1,NULL,'2020-05-04 07:08:00','2020-05-04 07:13:24',1),(5,'OAKLEY','oakley','brand/1588576391oakley.jpg','Established in 1975 and acquired in 2007, Oakley is one of the leading product design and sport performance brands in the world,','<p><span style=\"font-weight: 400;\">Established in 1975 and acquired in 2007, Oakley is one of the leading product design and sport performance brands in the world, chosen by world-class athletes to compete at the highest level possible. The holder of more than 850 patents, Oakley is also known for its innovative lens technologies, including PRIZMTM. Oakley extended its position as a sports eyewear brand into apparel and accessories, offering men&rsquo;s and women&rsquo;s product lines that appeal to sport performance, active and lifestyle consumers. </span></p>',1,1,NULL,'2020-05-04 07:09:08','2020-05-04 07:13:11',1);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand_banner`
--

DROP TABLE IF EXISTS `brand_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand_banner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_banner`
--

LOCK TABLES `brand_banner` WRITE;
/*!40000 ALTER TABLE `brand_banner` DISABLE KEYS */;
INSERT INTO `brand_banner` VALUES (1,'Dita','dita','brand-banners/1588617974dita-banner.jpg',1,'1',NULL,'2020-05-04 18:46:14','2020-05-04 18:46:18'),(2,'cazal','cazal','brand-banners/1588617995cazal-banner-2fw1900fh600.jpg',1,'1',NULL,'2020-05-04 18:46:35','2020-05-04 18:46:39'),(3,'olay','olay','brand-banners/1588618016Oakley-banner.jpg',1,'1',NULL,'2020-05-04 18:46:56','2020-05-04 18:46:59'),(4,'Rayban','rayban','brand-banners/1588618038Rayban 1.jpg',1,'1','2020-05-06 10:40:40','2020-05-04 18:47:18','2020-05-06 10:40:40'),(5,'Rayban','rayban-1','brand-banners/1588761635Rayban.jpg',1,'1','2020-05-06 10:44:10','2020-05-06 10:40:35','2020-05-06 10:44:10'),(6,'Rayban','rayban','brand-banners/1588761806Rayban 2.jpg',1,'1',NULL,'2020-05-06 10:43:26','2020-05-06 10:43:28'),(7,'Rayban','rayban-1','brand-banners/1588761869Rayban 1.jpg',1,'1',NULL,'2020-05-06 10:44:29','2020-05-06 10:44:32');
/*!40000 ALTER TABLE `brand_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Green',0,'green','2020-04-06 09:11:13','2020-04-06 09:11:13'),(2,'Black',0,'black','2020-04-06 14:55:34','2020-04-06 14:55:34'),(3,'Voilent',0,'voilent','2020-04-06 14:56:06','2020-04-06 14:56:06'),(4,'Est non consequuntu',0,'est-non-consequuntu','2020-04-06 15:21:54','2020-04-06 15:21:54'),(5,'Facere sit minim qu',0,'facere-sit-minim-qu','2020-04-06 15:22:18','2020-04-06 15:22:18'),(6,'Blue',0,'blue','2020-04-16 02:45:58','2020-04-16 02:45:58'),(7,'Normal only one color',0,'normal-only-one-color','2020-04-16 03:48:17','2020-04-16 03:48:17'),(8,'Red',0,'red','2020-04-16 03:54:09','2020-04-16 03:54:09'),(9,'all color',0,'all-color','2020-04-16 04:50:56','2020-04-16 04:50:56'),(10,'Black/Brown(c1)',0,'black-brown-c1','2020-04-16 09:25:34','2020-04-16 09:25:34'),(11,'Black/Brown(c2)',0,'black-brown-c2','2020-04-16 09:26:18','2020-04-16 09:26:18'),(12,'Black Gold Sun',0,'black-gold-sun','2020-04-16 09:38:15','2020-04-16 09:38:15'),(13,'Havana Gold',0,'havana-gold','2020-04-16 09:58:48','2020-04-16 09:58:48'),(14,'Matta Black',0,'matta-black','2020-04-16 10:05:34','2020-04-16 10:05:34'),(15,'003 GOLD',0,'003-gold','2020-05-03 14:40:11','2020-05-03 14:40:11'),(16,'002 BICOLOUR',0,'002-bicolour','2020-05-03 14:41:38','2020-05-03 14:41:38'),(17,'GREY GRADIENT',0,'grey-gradient','2020-05-07 00:19:13','2020-05-07 00:19:13'),(18,'302 BLACK-GOLD',0,'302-black-gold','2020-05-07 00:20:28','2020-05-07 00:20:28'),(19,'398 BROWN',0,'398-brown','2020-05-07 00:21:36','2020-05-07 00:21:36'),(20,'001 GOLD',0,'001-gold','2020-05-07 00:51:05','2020-05-07 00:51:05'),(21,'002 BLACK-GOLD',0,'002-black-gold','2020-05-07 00:52:10','2020-05-07 00:52:10'),(22,'002 CRYSTAL-GOLD',0,'002-crystal-gold','2020-05-07 00:55:49','2020-05-07 00:55:49'),(23,'702 BLACK-RED',0,'702-black-red','2020-05-07 00:59:56','2020-05-07 00:59:56'),(24,'GUN METAL',0,'gun-metal','2020-05-25 08:00:59','2020-05-25 08:00:59'),(25,'BLACK PALLADIUM - AIR',0,'black-palladium-air','2020-05-25 08:02:04','2020-05-25 08:02:04'),(26,'TORTOISE/WHITE GOLD',0,'tortoise-white-gold','2020-05-25 08:07:47','2020-05-25 08:07:47'),(27,'WHITE GOLD - AIR',0,'white-gold-air','2020-05-25 08:13:39','2020-05-25 08:13:39'),(28,'WHITE GOLD - LAND',0,'white-gold-land','2020-05-25 08:15:48','2020-05-25 08:15:48');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu` enum('header','footer','content') COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'Shipping','shipping','Free delivery to all UK addresses on prescription glasses and sunglasses. If you opt to collect from our shop it is free for orders of any value.','<p>Free delivery to all UK addresses on prescription glasses and sunglasses. If you opt to collect from our shop it is free for orders of any value.</p>\r\n<p>When your order is shipped you will receive a notice via email with your reference number which you can use on Royal Mail website to track your order.</p>\r\n<p>We always calculate a fully delivered price so you will never have to pay any additional charges when your order arrives.</p>\r\n<p>With almost everything on johnlewisopticians.co.uk available for International Delivery, you can send your order to over 60 countries around the world, including North America, Australia, the Middle East and China.</p>\r\n<p>All our shipment is guaranteed and insured.</p>\r\n<p>We aim to dispatch all received orders within 1-2 working days. If you purchase one of our in-stock products we will ensure that your new spectacles or sunglasses reach on your doorstep as fast as possible or within delivery time. Orders placed on a Saturday, Sunday or UK Bank holiday will be dispatched the following working day. For all royal mail deliveries a signature is required.</p>\r\n<p>We cannot be responsible for any failed deliveries of johnlewisopticians.co.uk, either due to wrong address or unavailability of a signature on delivery. If goods are returned to us for these reasons we will re-charge for postage and handling.</p>\r\n<p>Should you have any questions regarding your order you can always contact us via&nbsp;<a title=\"Contact US\" href=\"http://www.johnlewisopticians.co.uk/contact-us/\">contact us</a>&nbsp;page or telephone us on +44 0208 316 1121, Monday to Saturaday&nbsp;from 9am. To 6pm.</p>\r\n<p>&nbsp;</p>\r\n<table style=\"border-collapse: collapse; width: 100%; height: 162px;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 20%; height: 18px;\"><strong>Destinations</strong></td>\r\n<td style=\"width: 20%; height: 18px;\">&nbsp;<strong>Services</strong></td>\r\n<td style=\"width: 20%; height: 18px;\"><strong>Cost</strong></td>\r\n<td style=\"width: 40%; height: 18px;\" colspan=\"2\"><strong>Delivery Days</strong></td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 20%; height: 18px;\">&nbsp;</td>\r\n<td style=\"width: 20%; height: 18px;\">&nbsp;</td>\r\n<td style=\"width: 20%; height: 18px;\">&nbsp;</td>\r\n<td style=\"width: 20%; height: 18px;\"><strong>Dispatch</strong></td>\r\n<td style=\"width: 20%; height: 18px;\"><strong>Shipping</strong></td>\r\n</tr>\r\n<tr style=\"height: 36px;\">\r\n<td style=\"width: 20%; height: 36px;\">&nbsp;&nbsp; UK</td>\r\n<td style=\"width: 20%; height: 36px;\">Royal Mail 1st Recorded</td>\r\n<td style=\"width: 20%; height: 36px;\">Free</td>\r\n<td style=\"width: 20%; height: 36px;\">Within 3-4 working Day</td>\r\n<td style=\"width: 20%; height: 36px;\">5-6 working Days</td>\r\n</tr>\r\n<tr style=\"height: 36px;\">\r\n<td style=\"width: 20%; height: 36px;\">International (Within Europe)</td>\r\n<td style=\"width: 20%; height: 36px;\">EU Deliveries Limited</td>\r\n<td style=\"width: 20%; height: 36px;\">&pound;7.50/order</td>\r\n<td style=\"width: 20%; height: 36px;\">Within 9-11 working Days</td>\r\n<td style=\"width: 20%; height: 36px;\">2-4 working Days</td>\r\n</tr>\r\n<tr style=\"height: 54px;\">\r\n<td style=\"width: 20%; height: 54px;\">International (rest of the World)</td>\r\n<td style=\"width: 20%; height: 54px;\">International Deliveries Limited</td>\r\n<td style=\"width: 20%; height: 54px;\">&pound;25/order</td>\r\n<td style=\"width: 20%; height: 54px;\">Within 4-11 working Days</td>\r\n<td style=\"width: 20%; height: 54px;\">2-4 working Days</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>',1,NULL,2,NULL,'2020-03-26 13:40:20','2020-05-03 13:50:50','footer',NULL),(2,'About Us','about-us','John Lewis Opticians Woolwich  has built a strong reputation for providing the highest standard of optical care and services, including sight tests, contact lens fittings, spectacles, sunglasses and prescription sunglasses.','<p><span style=\"font-weight: 400;\">John Lewis Opticians is not just another opticians which sells spectacles and sunglasses. Our optical team is here for a professional service specifically for your needs. We have designer frames which would be chosen specially for your face.</span></p>\r\n<p><span style=\"font-weight: 400;\">We have been serving the optical needs since 1987 and we are confident that we not only provide the best spectacle wear but also fulfil all the optical needs of our Patients.</span></p>\r\n<p><span style=\"font-weight: 400;\">Good eyecare starts with you and finishes with us. Book an appointment with us with one of our friendly Optical team member and your eyes would be examined with care by our Ophthalmologist. After the eye examination our Optical Team would work alongside you to choose the best possible frames for you, along with the best various possibilities to translate the prescription into a pair of spectacles with the best Ophthalmic lenses. Give us a try and be satisfied.</span></p>',1,'content/1588237034about-us.jpg',2,NULL,'2020-03-26 13:40:55','2020-05-01 00:54:11','header',NULL),(3,'Terms & Conditions','terms-conditions','These Terms and Conditions govern the supply of goods sold by John Lewis Opticians (referred to as “we” and “us”) of 13 Plumstead Road, Woolwich, London, SE18 7BZ.','<div>\r\n<h3>1. Our Contract</h3>\r\n</div>\r\n<div>\r\n<p>These Terms and Conditions govern the supply of goods sold by John Lewis Opticians (referred to as &ldquo;we&rdquo; and &ldquo;us&rdquo;) of 13 Plumstead Road, Woolwich, London, SE18 7BZ.</p>\r\n<p>These Terms and Conditions in combination with an order form constitute the complete agreement between us and the customer. Our acceptance of your order and full or part payment constitutes a legally binding contract between us on these terms and conditions.This contract is subject to and governed by UK National law.</p>\r\n<p>When you place an order, you will receive an acknowledgement e-mail confirming receipt of your order. This email will only be an acknowledgement and will not constitute acceptance of your order. A contract between us for the purchase of the goods will not be formed until your payment has been approved by us and we have debited your credit or debit card.</p>\r\n<p>Upon receiving your order we carry out a standard pre-authorisation check on your payment card to ensure there are sufficient funds to fulfil the transaction. Goods will not be dispatched until this pre-authorisation check has been completed. Your card will be debited once the order has been accepted.</p>\r\n<h3>2. Conditions of Sale</h3>\r\n<p>Customers must be 16 years of age or over.&nbsp;&nbsp;If purchasing a prescriptive pair of spectacles the customer must have been issued with a prescription within the last 2 years. If requested, a copy of this prescription must be provided to us.</p>\r\n<h3>3. Price &amp; Payment</h3>\r\n<p><strong>3.1</strong>&nbsp;We only currently accept British Pounds (GBP).Your payment through this site will be processed through PayPal. Your debit / credit card will be billed by PayPal. You undertake that all the information provided to PayPal for the processing of payment is correct and debit/credit card used is your own. You acknowledge that PayPal will be entitled to verify the authenticity and sufficiency of the payment information you provide.</p>\r\n<p><strong>3.2</strong>&nbsp;The price of the Goods will be set out in our price list in force on our website at the time we confirm your Order. Our prices may change at any time, but price changes will not affect Orders that we have confirmed with you. These prices include VAT. However, if the rate of VAT changes between the date of the Order and the date of delivery or performance, we will adjust the rate of VAT that you pay, unless you have already paid for the Goods in full before the change in the rate of VAT takes effect.</p>\r\n<p>Where we are providing Goods to you, you must make payment for Goods in advance by credit or debit card.</p>\r\n<h3>4. Delivery &amp; Title</h3>\r\n<p>Goods will be supplied in accordance with your order and title will be transferred once payment is made by the customer in full.</p>\r\n<h3>5. Liability</h3>\r\n<p><strong>5.1</strong>&nbsp;If you have notified us of a problem with the goods, we will replace or repair any goods that are damaged or defective.</p>\r\n<p>We will not be liable to you for any inconvenience, disappointment, indirect or consequential loss or damage arising out of any problem in relation to the goods and we shall have no liability to pay any money to you by way of compensation other than any refund we make under these conditions. This does not affect your statutory rights as a consumer.</p>\r\n<p><strong>5.2&nbsp;</strong>We shall have no liability to you for any failure or delay in supply or delivery or for any damage or defect to goods supplied or delivered hereunder that is caused by any event or circumstance beyond our reasonable control (including, without limitation, strikes, lockouts and other industrial disputes.)</p>\r\n<h3>6. General</h3>\r\n<p>If any part of these conditions is invalid, illegal or unenforceable (including any provision in which we exclude our liability to you) the validity, legality or enforceability of any other part of these conditions will not be affected. This contract shall be governed by and interpreted in accordance with United Kingdom law.</p>\r\n<h3>7. VAT</h3>\r\n<p>All prices include VAT at the current rate.</p>\r\n<h3>8. Accessories</h3>\r\n<p>All frames come with one appropriate case and microfibre lens cloth.</p>\r\n<h3>9. Design, Images and Reproduction</h3>\r\n<p>Images, codes, layout and style are all copyright. Reproduction in whole, or in part, is strictly prohibited without written permission.</p>\r\n<h3>10. Refunds</h3>\r\n<p>If you are unhappy with your product(s) you can return these to us as long as they are in perfect condition under the&nbsp;<a title=\"Returns &amp; Refunds\" href=\"http://www.johnlewisopticians.co.uk/returns/\">Returns and Refunds</a>&nbsp;policy.&nbsp;&nbsp;We recommend you use Royal Mail Special Delivery and cover the insurance for the total cost of the item, this will also give you proof of delivery.</p>\r\n<h3>11. Cancellation Rights</h3>\r\n<p>Under the Distance Selling Regulations, you have the right to cancel the contract at any time until seven working days after the date of delivery of the Goods. This does not apply to custom-made items. If your Order has been dispatched, you will need to return the Goods to the address below:<br />John Lewis Opticians<br />13 Plumstead Road<br />Woolwich<br />SE18 7BZ.</p>\r\n</div>',1,NULL,2,NULL,'2020-03-26 13:41:41','2020-05-03 13:47:01','footer',NULL),(4,'How to get prescription','how-to-get-prescription','How to get prescription\r\nYour prescription is yours by law. The optician is legally obliged to hand you your prescription once you leave the testing room.','<p>How to get prescription<br />Your prescription is yours by law. The optician is legally obliged to hand you your prescription once you leave the testing room.</p>',1,NULL,2,NULL,'2020-03-26 13:42:26','2020-05-03 13:47:49','footer',NULL),(5,'Guarantee & Warranty','guarantee-warranty','John Lewis Opticians is official retailer of listed brands. At johnlewisopticians.co.uk, you can purchase designer eyewear and contact lenses at risk-free with great service.  Being in the optical industry since 1987, johnlewisopticians.co.uk guarantees genuine designer eyewear, all supported by guarantees and warranties.','<h2><strong>Authenticity Guaranteed</strong></h2>\r\n<p>John Lewis Opticians is official retailer of listed brands. At<a title=\"Reglaze &amp; Repair\" href=\"http://www.johnlewisopticians.co.uk/\">&nbsp;johnlewisopticians.co.uk</a>, you can purchase designer eyewear and contact lenses at risk-free with great service.&nbsp; Being in the optical industry since 1987, johnlewisopticians.co.uk guarantees genuine designer eyewear, all supported by guarantees and warranties.</p>\r\n<p>If you have any questions or concerns regarding our products, please contact us at:</p>\r\n<p>John Lewis Opticians<br />13 Plumstead Road<br />Woolwich<br />t: 02083161121<br />info@johnlewisopticians.co.uk</p>\r\n<p><strong>Note:&nbsp;</strong>We do not have any branch.</p>',1,NULL,2,NULL,'2020-03-26 13:43:33','2020-05-03 13:51:21','footer',NULL),(6,'Returns & Refunds','returns-refunds','If your order has already been despatched or delivered, then you’ll need to follow our Returns procedure in the event of any unwanted products. You can also of course return them to:','<h2>Order and returns</h2>\r\n<p>If your order has already been despatched or delivered, then you&rsquo;ll need to follow our Returns procedure in the event of any unwanted products. You can also of course return them to:</p>\r\n<p>John Lewis Opticians<br />13 Plumstead Road<br />Woolwich<br />SE18 7BZ.</p>\r\n<p>We do not have any branch.</p>',1,NULL,2,NULL,'2020-03-26 13:44:42','2020-05-03 13:46:08','footer',NULL),(7,'NHS Entitlement','nhs-entitlement','John Lewis Opticians accept the NHS vouchers and has offers help towards the cost of glasses. The NHS provides free eye test and help towards the cost of glasses based on age, health or income','<p>John Lewis Opticians accept the NHS vouchers and has offers help towards the cost of glasses. The NHS provides free eye test and help towards the cost of glasses based on age, health or income.</p>\r\n<h2>Who qualifies for FREE NHS eye test?</h2>\r\n<h3>Age</h3>\r\n<ul>\r\n<li>Under 16</li>\r\n<li>Under 19 and in full time education</li>\r\n<li>Over 60</li>\r\n</ul>\r\n<h3>Health</h3>\r\n<ul>\r\n<li>Diagnosed with diabetes or glaucoma</li>\r\n<li>Registered blind or partially sighted</li>\r\n<li>40 years of age or over and close relative have a glaucoma</li>\r\n<li>Prescribed complex lenses under the NHS optical voucher scheme</li>\r\n</ul>\r\n<h3>Income</h3>\r\n<ul>\r\n<li>Income support or Income based Jobseekers allowance</li>\r\n<li>Income-related Employment and support allowance</li>\r\n<li>Pension Credit guarantee credit</li>\r\n<li>NHS Tax credit Exemption Certificate</li>\r\n<li>Valid HC2 and HC3 certificate</li>\r\n</ul>\r\n<p>Everyone should have an eye examination on every two years. If you are under above entitlement, you are eligible for free&nbsp;NHS eye examinations. If&nbsp;it is less than two years since your last test, then you should check with your optician and find out wethere you are qualifiy for another free NHS eye examination. The NHS will pay for every year eye examinations for following groups.</p>\r\n<ul>\r\n<li>if you are under 16</li>\r\n<li>if you are above 70</li>\r\n<li>if you have diabetes</li>\r\n<li>if you are 40 &amp; over and have a family glaucoma history</li>\r\n</ul>\r\n<p>The NHS will provide help towards the cost of glasses if you are</p>\r\n<ul>\r\n<li>Under 16 or Under 19 and in full time education</li>\r\n<li>Prescribed complex lenses under the NHS optical voucher scheme</li>\r\n<li>Income support or Income based Jobseekers allowance</li>\r\n<li>Income-related Employment and support allowance</li>\r\n<li>Pension Credit guarantee credit</li>\r\n<li>NHS Tax credit Exemption Certificate</li>\r\n<li>Valid HC2 and HC3 certificate</li>\r\n</ul>\r\n<p>For a eye test, book an&nbsp;<a title=\"Book Eye Test\" href=\"http://www.johnlewisopticians.co.uk/book-eye-test/\" target=\"_blank\" rel=\"noopener\">eye test online</a>&nbsp;today.</p>\r\n<p>For more information whether you qualify for a free eye test, please contact&nbsp;<a title=\"NHS Direct\" href=\"http://www.nhsdirect.nhs.uk/\" target=\"_blank\" rel=\"noopener\"><abbr title=\"National Health Service\">NHS</abbr>&nbsp;Direct</a>&nbsp;on 0845 46 47.</p>\r\n<p>You can order online and note you are sending your GOS 3 voucher to us. Once we receive the voucher we will contact you and refund the value of the voucher.</p>\r\n<p>Send us the voucher first and on receipt of the voucher we will contact you and manually complete your order without the need for refunding.</p>',1,NULL,2,NULL,'2020-03-27 06:04:19','2020-05-03 13:45:59','footer',NULL),(8,'Eye Care','eye-care','At John Lewis Opticians, our status as a true independent opticians means that your eyecare, aftercare and service is personalised to you and that you are given our best attention and get individual professional advice every time.','<h3><strong>Eyecare- The importance of regular eye examinations</strong></h3>\r\n<p><span style=\"font-weight: 400;\">At John Lewis Opticians Woolwich, we recommend that regular eye examinations are a vital part of any health care programme. Each examination is tailored specifically to an individual and no eye test is ever the same. Eye examinations are an important way of monitoring your general health and maintaining your eyes at their optimum focus.</span></p>\r\n<p><span style=\"font-weight: 400;\">Healthy, well looked after eyes can make a massive difference to your all round well-being and the best way to maintain this is through regular eye tests. Using the latest eye examination technology, we can quickly establish the state of your vision. Your eyesight is your most precious sense and deserves the highest standards of professional care. After all, without good vision it is difficult to enjoy most everyday activities, including reading, driving and watching TV. But poor sight may also indicate the presence of potentially serious eye diseases such as glaucoma and macular degeneration, or general health problems like diabetes and high blood pressure.</span></p>\r\n<p><span style=\"font-weight: 400;\">We recommend sight examinations on a 2 yearly basis, exceptions being children, contact lens wearers and people with certain medical conditions who should be seen annually. If you have any concerns about your vision, you should contact us immediately. Our practice is committed to the highest standards of professional eyecare. This means we will discuss your individual needs, examine your eyes thoroughly, use modern equipment, answer your questions and offer you eyewear that meets all of your requirements. As an independent optician we also believe in giving you a friendly and personalised service.</span></p>\r\n<p><span style=\"font-weight: 400;\">At John Lewis Opticians, our status as a true independent practice means that your eyecare, aftercare and service is personalised to you and that you are given our best attention and get individual professional advice every time.</span></p>\r\n<p><span style=\"font-weight: 400;\">We provide specialist eye examinations, specialist contact lens fitting. Our eye tests can be booked over the phone, online or by visiting store. Same day appointments are usually available for patients who need to be seen urgently.</span></p>\r\n<h3><strong>Children&rsquo;s Eye Examinations</strong></h3>\r\n<p><span style=\"font-weight: 400;\">Although serious vision problems during childhood are rare, routine eye checks are offered to new-born babies and young children to identify any problems early on.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Free NHS sight tests are also available at opticians for children under 16 and for young people under 19 in full-time education.</span></p>\r\n<p><span style=\"font-weight: 400;\">Specialist assessments are performed on young children to ascertain their quality of vision and spectacle prescription. More detailed examinations are available for children with learning difficulties such as dyslexia or those requiring contact lenses or orthokeratolo</span></p>\r\n<h3><strong>Contact Lens Examinations</strong></h3>\r\n<p><span style=\"font-weight: 400;\">At John Lewis Opticians, we pride ourselves on being able to offer the very latest in contact lens technology and aftercare. We always have a substantial stock of branded lenses including high prescriptions with a same day service in most cases</span></p>',1,'content/1588237132eyecare.jpg',1,NULL,'2020-04-30 08:58:52','2020-05-04 02:17:45','header',NULL),(9,'Contact Lens','contact-lens','Sometimes life’s just easier without glasses. Wearing contact lenses can be hugely liberating – allowing you to be active, try out different looks, and experience clear vision without a frame around your world.','<p><span style=\"font-weight: 400;\">Sometimes life&rsquo;s just easier without glasses. Wearing contact lenses can be hugely liberating &ndash; allowing you to be active, try out different looks, and experience clear vision without a frame around your world. Getting the right contact lenses for you is so much more than simply obtaining the cheapest deal around. Our range of contacts promote not only excellent vision but you can choose them to fit in with your life.</span></p>\r\n<p><span style=\"font-weight: 400;\">Our Optometrists are experienced in fitting all types of contact lens, including &ndash; gas permeable or soft &ndash; standard designs, lenses to correct astigmatism and bifocal designs.</span></p>\r\n<p><span style=\"font-weight: 400;\">We also specialise in designing bespoke contact lenses to provide a starting point for anyone who is interested in trying Ortho K lenses or suffers from Keratoconus.</span></p>\r\n<p><span style=\"font-weight: 400;\">We carry a large stock of 1 day disposable lenses at both our Practices and carry fitting stock for extended wear lenses to our practice for those of you who wear your lenses on a regular basis. Also, we are specialised and experienced in fitting contact lenses as well</span></p>\r\n<p><span style=\"font-weight: 400;\">Being one of the largest contact lens suppliers in London, we have access to all the major brands and are able to offer trial fittings of the latest designs as soon as they are available. We can deliver your contact lenses directly to you same day or deliver it to you via post if you cannot come into practice. <a id=\"booknow\" href=\"/shop\">ORDER NOW</a></span></p>\r\n<ul>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Acuvue</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Alcon &amp; Ciba vision</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Coopervision</span></li>\r\n</ul>\r\n<p><strong>CONTACT LENS OPTIONS:</strong></p>\r\n<ul>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Daily disposables</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Fortnightly lenses</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Monthly lenses</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Toric lenses (for astigmatism)</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Multifocal lenses (for presbyopia)</span></li>\r\n<li style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">Coloured lenses</span></li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Here at John Lewis Opticians we stock all types of contact lenses from daily disposables to monthly wear lenses. Using the very latest in contact lens technology, our dedicated staff will take the time to help you find the right lenses for you.</span></p>',1,'content/1588237189contact-lens.jpg',1,NULL,'2020-04-30 08:59:49','2020-05-06 01:46:08','header',NULL),(10,'Frames & Brands','frame-brand','Here at John Lewis Opticians, we present to you one of the largest curation of beautifully  designer glasses and designer sunglasses in store.Designer Glasses and Designer Sunglasses have become more than a way to improve eyesight and protect eyes from the sun','<p><span style=\"font-weight: 400;\">Here at John Lewis Opticians, we present to you one of the largest curation of beautifully&nbsp; designer glasses and designer sunglasses in store.</span></p>\r\n<p><span style=\"font-weight: 400;\">Designer Glasses and Designer Sunglasses have become more than a way to improve eyesight and protect eyes from the sun. Not only are designer sunglasses and designer glasses fashionable they are also an essential way to protect your eyes from the harmful rays produced by the sun</span></p>\r\n<p><span style=\"font-weight: 400;\">Choose from leading frame names and boutique brands. We are known for our extensive selection of the best frames, most coveted sun glasses and on trend innovations in the industry. From super premium brands to luxury must-haves and to mid range and budget names we have your perfect match</span></p>',1,'content/1588595684frame.jpg',1,NULL,'2020-04-30 09:08:23','2020-05-04 12:34:44','header',NULL),(11,'Home','home','Established in 1986,  Welcome to John Lewis Opticians Woolwich, an Independent Opticians, Contact Lens Specialists and Dispensing Opticians at Woolwich, London SE18 7BZ. \r\nWe are not just another optician which sells spectacles and sunglasses. Our optical team is here for a professional service specifically for your needs. We have designer frames which would be chosen specially for your face','<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql\">\r\n<div dir=\"auto\">Established in 1986, Welcome to John Lewis Opticians Woolwich, an Independent Opticians, Contact Lens Specialists and Dispensing Opticians at Woolwich, London SE18 7BZ.</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql\">\r\n<div dir=\"auto\">We are not just another optician which sells spectacles and sunglasses. Our optical team is here for a professional service specifically for your needs. We have designer frames which would be chosen specially for your face</div>\r\n</div>',1,'content/1588244652home.jpeg',1,NULL,'2020-04-30 11:04:12','2020-05-03 16:04:38','content',NULL),(12,'Service','service','At John Lewis Woolwich, we recommend that regular eye examinations are a vital part of any health care programme.','<p><span style=\"font-weight: 400;\">At John Lewis Opticians Woolwich, We offer a full range of services at the practice. We examine your eyes for health and vision problems, diagnose and treat eye disease, and work with children and professionals to improve their performance by enhancing their vision and providing advice on preventive care.</span></p>\r\n<p><span style=\"font-weight: 400;\">Please see below for a comprehensive list of services.</span></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\">Eye Test </span></li>\r\n<li><span style=\"font-weight: 400;\">Contact Lens Test &amp; Fittings </span></li>\r\n<li><span style=\"font-weight: 400;\">Repair </span></li>\r\n<li><span style=\"font-weight: 400;\">Prescription Glasses &amp; Sunglasses</span></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',1,'content/1588678397Services 2.jpg',1,NULL,'2020-05-03 13:52:55','2020-05-06 01:48:01','header',NULL),(13,'Opening Hours','opening-hours','Monday - Friday: 09:30 - 18:00\r\nWe are closed Saturday & Sunday','<div class=\"appointment-model-header\">\r\n<h3>Opening Times</h3>\r\n<span class=\"time\">Monday - Saturday: <strong>09:00 - 18:00</strong></span> <span class=\"time-text\">We are closed on Sunday</span></div>',1,NULL,1,NULL,'2020-05-05 05:07:10','2020-05-05 12:14:15','content',NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specalists` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_subscribe`
--

DROP TABLE IF EXISTS `email_subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_subscribe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_subscribe`
--

LOCK TABLES `email_subscribe` WRITE;
/*!40000 ALTER TABLE `email_subscribe` DISABLE KEYS */;
INSERT INTO `email_subscribe` VALUES (1,'Kaden','Meadows','joto@mailinator.net','2020-05-05 05:07:37','2020-05-05 05:07:37');
/*!40000 ALTER TABLE `email_subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frame_category`
--

DROP TABLE IF EXISTS `frame_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frame_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `frame_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frame_category`
--

LOCK TABLES `frame_category` WRITE;
/*!40000 ALTER TABLE `frame_category` DISABLE KEYS */;
INSERT INTO `frame_category` VALUES (1,'Gucci','acuvue',1,2,2,NULL,'2020-04-16 02:10:24','2020-04-16 02:16:15'),(2,'Adidas','adidas',1,2,1,NULL,'2020-04-16 02:10:57','2020-04-16 02:11:33'),(3,'Bvlgari','bvlgari',1,2,1,NULL,'2020-04-16 02:19:47','2020-04-16 02:19:51'),(4,'Cazal','cazal',1,2,1,NULL,'2020-04-16 02:20:32','2020-04-16 02:21:13'),(5,'Dolce & Gabbana','dolce-gabbana',1,2,1,NULL,'2020-04-16 02:21:21','2020-04-16 02:21:25'),(6,'Hugo boss','hugo-boss',1,2,1,NULL,'2020-04-16 02:21:53','2020-04-16 02:22:02'),(7,'Ray-ban Optics','ray-ban-optics',1,2,1,NULL,'2020-04-16 02:23:12','2020-04-16 02:24:48'),(8,'Dolce & Gabbana','dolce-gabbana-1',1,2,2,NULL,'2020-04-16 02:24:57','2020-04-16 02:25:02'),(9,'Silhouette','silhouette',1,2,2,NULL,'2020-04-16 02:25:58','2020-04-16 02:26:26'),(10,'Giorgio Armani','giorgio-armani',1,2,2,NULL,'2020-04-16 02:26:23','2020-04-16 02:26:30'),(11,'Givenchy','givenchy',1,2,2,NULL,'2020-04-16 02:26:53','2020-04-16 02:26:58'),(12,'William Morris','william-morris',1,2,2,NULL,'2020-04-16 02:27:20','2020-04-16 02:27:24'),(13,'Ralph Lauren Polo','ralph-lauren-polo',1,2,3,NULL,'2020-04-16 02:28:00','2020-04-16 02:28:03'),(14,'Rodenstock','rodenstock',1,2,3,NULL,'2020-04-16 02:28:28','2020-04-16 02:28:48'),(15,'Prada','prada',1,2,3,NULL,'2020-04-16 02:29:00','2020-04-16 02:29:14'),(16,'Persol','persol',1,2,3,NULL,'2020-04-16 02:29:41','2020-04-16 02:29:51'),(17,'Police','police',1,2,3,NULL,'2020-04-16 02:30:12','2020-04-16 02:30:34'),(18,'Jaeger','jaeger',1,2,3,NULL,'2020-04-16 02:30:41','2020-04-16 02:31:32'),(19,'St Dupont','st-dupont',1,2,4,NULL,'2020-04-16 02:31:15','2020-04-16 02:31:29'),(20,'Hilton Internation','hilton-internation',1,2,4,NULL,'2020-04-16 02:31:39','2020-04-16 02:31:55'),(21,'Tom Ford','tom-ford',1,2,4,NULL,'2020-04-16 02:32:02','2020-04-16 02:32:06'),(22,'Nakamura','nakamura',1,2,4,NULL,'2020-04-16 02:32:28','2020-04-16 02:32:31'),(23,'Oxford','oxford',1,2,4,NULL,'2020-04-16 02:32:54','2020-04-16 02:32:58'),(24,'X-Eyes','x-eyes',1,2,4,NULL,'2020-04-16 02:33:26','2020-04-16 02:33:30');
/*!40000 ALTER TABLE `frame_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frames`
--

DROP TABLE IF EXISTS `frames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frames` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frames`
--

LOCK TABLES `frames` WRITE;
/*!40000 ALTER TABLE `frames` DISABLE KEYS */;
INSERT INTO `frames` VALUES (1,'Stylish Frame','stylish-frame',1,2,NULL,'2020-04-16 02:03:33','2020-04-16 02:03:44'),(2,'Designer Frames','designer-frames',1,2,NULL,'2020-04-16 02:03:54','2020-04-16 02:04:35'),(3,'Sunglasses','sunglasses',1,2,NULL,'2020-04-16 02:04:46','2020-04-16 02:04:58'),(4,'Contact Lenses','contact-lenses',1,2,NULL,'2020-04-16 02:05:05','2020-04-16 02:05:09');
/*!40000 ALTER TABLE `frames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glasses`
--

DROP TABLE IF EXISTS `glasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glasses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glasses`
--

LOCK TABLES `glasses` WRITE;
/*!40000 ALTER TABLE `glasses` DISABLE KEYS */;
INSERT INTO `glasses` VALUES (1,'Men\'s Glasses','men-s-glasses',1,2,NULL,'2020-04-15 14:00:14','2020-04-15 14:00:17'),(2,'Children\'s Glasses','children-s-glasses',1,2,NULL,'2020-04-15 14:01:34','2020-04-15 14:01:41'),(3,'Women\'s Glasses','women-s-glasses',1,2,NULL,'2020-04-15 14:02:02','2020-04-15 14:02:07'),(4,'Rimless Glasses','rimless-glasses',1,2,NULL,'2020-04-15 14:12:55','2020-04-15 14:14:45');
/*!40000 ALTER TABLE `glasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lenses`
--

DROP TABLE IF EXISTS `lenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lenses`
--

LOCK TABLES `lenses` WRITE;
/*!40000 ALTER TABLE `lenses` DISABLE KEYS */;
INSERT INTO `lenses` VALUES (1,'Acuvue','acuvue',1,2,NULL,'2020-04-16 02:34:37','2020-04-16 02:34:41'),(2,'Ciba Vision','ciba-vision',1,2,NULL,'2020-04-16 02:35:00','2020-04-16 02:35:14'),(3,'Cooper Vision','cooper-vision',1,2,NULL,'2020-04-16 02:35:19','2020-04-16 02:35:23'),(4,'Fresh Look Contact Lenses','fresh-look-contact-lenses',1,2,NULL,'2020-04-16 02:35:42','2020-04-16 02:35:49');
/*!40000 ALTER TABLE `lenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_10_083315_create_users_type__table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2020_03_24_162405_create_blog_categories__table',1),(5,'2020_03_24_162430_create_blog__table',1),(6,'2020_03_25_020627_create_banner_table',1),(7,'2020_03_25_024306_create_package_table',1),(8,'2020_03_25_051202_create_service_table',1),(9,'2020_03_25_095500_create_content_table',1),(10,'2020_03_25_143315_create_doctor_table',1),(11,'2020_03_25_181418_create_appointment_table',1),(12,'2020_03_14_110637_create_setting_table',2),(13,'2020_03_27_063755_create_contact_table',3),(14,'2020_03_27_090933_create_testimonial_table',3),(15,'2020_03_27_111623_create_glasses_table',3),(16,'2020_03_27_143645_create_sunglasses_table',3),(17,'2020_03_27_151922_create_lenses_table',3),(18,'2020_03_27_154359_create_frames_table',3),(19,'2020_03_28_030514_create_frame_category_table',3),(20,'2020_03_28_092731_create_discount_table',3),(21,'2020_03_28_160616_create_product_table',3),(22,'2020_03_29_011314_create_color_table',3),(23,'2020_03_29_070008_create_stock_table',3),(25,'2020_04_04_025844_create_sales_report_table',4),(26,'2020_04_04_030510_create_transaction_table',4),(27,'2020_04_04_032650_create_shipping_address_table',4),(28,'2020_04_04_060909_add_first_name_to_users',4),(29,'2020_04_04_070005_create_whishlist_table',4),(30,'2020_03_25_083837_create_appointment_schedule_table',5),(31,'2020_04_07_101427_add_end_to_appointment_schedule',5),(32,'2020_04_08_035840_add_schedule_to_appointment',5),(33,'2020_04_08_073045_create_websockets_statistics_entries_table',6),(34,'2020_04_08_124244_create_notification_table',6),(35,'2020_04_04_025700_create_order_table',7),(36,'2020_04_30_015343_create_brand_table',8),(37,'2020_05_01_021909_add_display_orders_to_service',9),(38,'2020_05_01_132616_create_shop_product_lists_table',9),(39,'2020_05_01_134118_add_type_shop_product_lists',9),(40,'2020_05_03_030747_add_type_to_content',10),(41,'2020_05_03_033528_add_parent_id_to_content',10),(42,'2020_05_03_110302_add_brand_id_to_product',10),(43,'2020_05_04_033401_add_selling_to_brand',11),(44,'2020_05_04_173039_add_detials_to_appointment_schedule',12),(45,'2020_05_04_181334_create_brand_banner_table',13),(46,'2020_05_05_034120_create_email_subscribe_table',14),(47,'2020_05_06_003325_add_postal_to_users',15),(48,'2020_05_06_012411_add_postal_to_shipping_address',16),(49,'2020_05_06_013929_add_postal_to_appointment',16),(50,'2020_05_06_043458_add_model_to_product',16),(51,'2020_05_08_014842_add_type_to_product',17),(52,'2020_05_08_053512_add_type_to_product',18),(53,'2020_05_26_134259_add_gender_to_product',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,1,NULL,1,'http://68.183.35.136/notifications/1','New Order has been places',0,'2020-05-03 14:43:17','2020-05-03 14:43:17'),(2,1,NULL,2,'http://68.183.35.136/notifications/2','New Order has been places',0,'2020-05-03 15:15:57','2020-05-03 15:15:57'),(3,8,NULL,3,'http://68.183.35.136/notifications/3','New Order has been places',0,'2020-05-04 13:16:57','2020-05-04 13:16:57'),(4,11,NULL,4,'http://68.183.35.136/notifications/4','New Order has been places',0,'2020-05-04 13:17:28','2020-05-04 13:17:28');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received` tinyint(1) DEFAULT NULL,
  `return` tinyint(1) DEFAULT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'600.00','0','1','#ORDER01',0,0,1,'2020-05-03 14:43:15','2020-05-03 14:43:15'),(2,'600.00','0','1','#ORDER02',0,0,1,'2020-05-03 15:15:56','2020-05-03 15:15:56'),(3,'400.00','0','1','#ORDER03',0,0,8,'2020-05-04 13:16:56','2020-05-04 13:16:56'),(4,'200.00','0','1','#ORDER04',0,0,11,'2020-05-04 13:17:27','2020-05-04 13:17:27');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('nijbhup27@gmail.com','2Ub5tjwDqBFoG5ZVZPPW44oFJKIeg0ZidzfPN1wIptMcq6EhQDYTQRX3ZHCw','2020-04-06 08:45:59'),('nijbhup27@gmail.com','GShczXBghjIZBllvoI5fj41nZ1peeb9miEHSlQhXYThdpUpkOvqMAQUeJmAH','2020-04-06 08:46:38'),('nijbhup27@gmail.com','6zq6Ou98J77BVNdZX5RGwIDaAl2IxVDwKyEazM3e8Ev5vWHHfWIgQNLQ9qge','2020-04-06 08:48:05'),('nijbhup27@gmail.com','pX2n3VPtAgXuFhvlQxX6RG8hG5SC95aT8X3isN6bcEXwLGaABQUlVU72Mdtm','2020-05-04 13:08:29');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(10) unsigned NOT NULL,
  `frame_id` int(10) unsigned DEFAULT NULL,
  `frame_category_id` int(10) unsigned DEFAULT NULL,
  `glass_id` int(10) unsigned DEFAULT NULL,
  `lens_id` int(10) unsigned DEFAULT NULL,
  `sunglass_id` int(10) unsigned DEFAULT NULL,
  `discount_id` int(10) unsigned DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` tinyint(1) DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('eye-wear','sunglass','kid-wear') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'200','1 years','760','cazal 760','cazal-760','56 - 16 - 140',NULL,1,'this is nulll','#PR01','products/15885167251.jpg','2020-05-03 14:38:45','2020-05-08 05:54:40',NULL,1,NULL,'sunglass',NULL),(2,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'399.00','No','959','Cazal 959','cazal-959','9/18',NULL,1,'this is nulll','#PR02','products/158881068311-0959096_front_1_1.jpg','2020-05-07 00:18:03','2020-05-08 05:54:52',NULL,1,NULL,'sunglass',NULL),(3,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'399.00','No','991','Cazal 991','cazal-991','62/12',NULL,1,'this is nulll','#PR03','products/158881111211-0959096_front_1_1.jpg','2020-05-07 00:25:12','2020-05-08 05:55:11',NULL,1,NULL,'sunglass',NULL),(4,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'399.00','No','992','Cazal 992','cazal-992','62/15',NULL,0,'this is nulll','#PR04','products/158881259411-0959096_front_1_1.jpg','2020-05-07 00:49:54','2020-05-08 05:54:26',NULL,1,NULL,'sunglass',NULL),(5,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'799.00','No','002','Cazal  002','cazal-002','42/26',NULL,0,'this is nulll','#PR05','products/158881285611-00020014226_front_1_1.jpg','2020-05-07 00:54:16','2020-05-08 05:54:15',NULL,1,NULL,'sunglass',NULL),(6,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'479.00','No','163/3 leather','Cazal 163/3 Leather','cazal-163-3-leather','59/12',NULL,0,'this is nulll','#PR06','products/158881311011-0163001-3_front_1.jpg','2020-05-07 00:58:30','2020-05-07 00:58:34',NULL,1,NULL,'eye-wear',NULL),(7,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'415.00','No','DTS705','KADER','kader','145-57-18',NULL,0,'this is nulll','#PR07','products/1590393040DITA1.jpg','2020-05-25 07:50:40','2020-05-25 07:50:47',NULL,2,NULL,'sunglass',NULL),(8,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'415.00','NO','DLS101-61','LSA-101','lsa-101','144-61-14',NULL,1,'this is nulll','#PR08','products/1590393547dls101-61-01_swatch_2.jpg','2020-05-25 07:59:07','2020-05-25 07:59:24',NULL,2,NULL,'sunglass',NULL),(9,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'290.00','No','DLX405-54','LSA-405','lsa-405','150-53-18',NULL,0,'this is nulll','#PR09','products/1590393858swatch_3_3.jpg','2020-05-25 08:04:18','2020-05-25 08:06:19',NULL,2,NULL,'sunglass',NULL),(10,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'310.00','No','DLS102-57','LSA-102','lsa-102','145-57-14',NULL,0,'this is nulll','#PR10','products/1590394367dls102-57-02_swatch.jpg','2020-05-25 08:12:47','2020-05-25 08:12:53',NULL,2,NULL,'sunglass',NULL),(11,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'149.60',NULL,'Standard','Stagebeam','stagebeam','50-19',NULL,0,'this is nulll','#PR11','products/1590395114Screenshot 2020-05-25 at 2.09.50 PM.png','2020-05-25 08:25:14','2020-05-25 08:25:19',NULL,5,NULL,'sunglass',NULL),(12,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'159.20','No','Standard','Bolster','bolster','136-20-52',NULL,0,'this is nulll','#PR12','products/1590395321Screenshot 2020-05-25 at 2.13.27 PM.png','2020-05-25 08:28:41','2020-05-25 08:28:47',NULL,5,NULL,'sunglass',NULL),(13,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'$159.20',NULL,'Standard','Base Plane R','base-plane-r','139-19-50',NULL,0,'this is nulll','#PR13','products/1590395437Screenshot 2020-05-25 at 2.15.22 PM.png','2020-05-25 08:30:37','2020-05-25 08:30:42',NULL,5,NULL,'sunglass',NULL),(14,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'186.40','No','Standard','Pitchman™ R Carbon','pitchman-r-carbon','138-19-50',NULL,0,'this is nulll','#PR14','products/1590395609Screenshot 2020-05-25 at 2.18.15 PM.png','2020-05-25 08:33:29','2020-05-25 08:33:34',NULL,5,NULL,'sunglass',NULL),(15,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'123.20','No','RB3447 029 50-21','ORIGINAL WAYFARER CLASSIC','original-wayfarer-classic','150-22-50',NULL,0,'this is nulll','#PR15','products/1590395985Screenshot 2020-05-25 at 2.24.28 PM.png','2020-05-25 08:39:45','2020-05-25 08:39:48',NULL,4,NULL,'sunglass',NULL),(16,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'123',NULL,'RB3025 L0205 58-14','AVIATOR CLASSIC','aviator-classic','135-58-14',NULL,0,'this is nulll','#PR16','products/1590398109805289602057_shad_qt.jpeg','2020-05-25 09:15:09','2020-05-25 09:15:17',NULL,4,NULL,'sunglass',NULL),(17,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'123.20','No','RB3548N 001 51-21','HEXAGONAL FLAT LENSES','hexagonal-flat-lenses','145-21-51',NULL,0,'this is nulll','#PR17','products/15903982598053672611649_shad_qt.jpeg','2020-05-25 09:17:39','2020-05-27 07:31:14',NULL,4,NULL,'sunglass','men'),(18,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'105.60','No','RB4171 710/71 54-18','ERIKA CLASSIC','erika-classic','145-18-54',NULL,0,'this is nulll','#PR18','products/15903987838053672475920_shad_qt.jpeg','2020-05-25 09:26:23','2020-05-27 07:30:58',NULL,4,NULL,'sunglass','men');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_report`
--

DROP TABLE IF EXISTS `sales_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `stock_id` int(10) unsigned NOT NULL,
  `piece` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispatch` tinyint(1) DEFAULT '0',
  `return` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_report`
--

LOCK TABLES `sales_report` WRITE;
/*!40000 ALTER TABLE `sales_report` DISABLE KEYS */;
INSERT INTO `sales_report` VALUES (1,1,1,21,'3','200.00','600.00',NULL,'0.00',0,0,'2020-05-03 14:43:15',NULL),(2,2,1,21,'3','200.00','600.00',NULL,'0.00',0,0,'2020-05-03 15:15:56',NULL),(3,3,1,22,'2','200.00','400.00',NULL,'0.00',0,0,'2020-05-04 13:16:56',NULL),(4,4,1,21,'1','200.00','200.00',NULL,'0.00',0,0,'2020-05-04 13:17:27',NULL);
/*!40000 ALTER TABLE `sales_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'EYE TEST','1','eye-test','services/1588577561Services.jpg','<p><span style=\"font-weight: 400;\">At John Lewis Woolwich, we recommend that regular eye examinations are a vital part of any health care programme. They are essential to ensure normal visual development in&nbsp;children&nbsp;and for the early detection of conditions affecting the eyes and general health. &nbsp;We provide specialist eye examinations,&nbsp;specialist contact lens fitting.</span></p>\r\n<p><span style=\"font-weight: 400;\">Each examination is tailored specifically to an individual and no eye test is ever the same. Eye examinations are an important way of monitoring your general health and maintaining your eyes at their optimum focus. We recommend sight examinations on a 2 yearly basis, exceptions being children, contact lens wearers and people with certain medical conditions who should be seen annually.</span></p>\r\n<p><span style=\"font-weight: 400;\">After noting any history or eye symptoms you may have, our Optometrists will carry out detailed examinations to determine your refractive error and the general health of your eyes and surrounding tissues. Supplementary examinations may be carried out if necessary. We also carry out NHS examinations.</span></p>\r\n<p><span style=\"font-weight: 400;\">Private sight examinations of 30 mins. duration is available on request</span></p>',1,'At John Lewis Woolwich, we recommend that regular eye examinations are a vital part of any health care programme.',NULL,'2020-04-29 15:27:45','2020-05-04 07:32:41',NULL),(2,'CONTACT LENS TEST & FITTING','1','contact-lens-test-and-fitting','services/1588577626Services 2.jpg','<p><span style=\"font-weight: 400;\">If you are already a contact lens wearer and are coming to see us for a check-up &ndash; please don&rsquo;t forget to wear your lenses when you attend for your appointment: you need to have been wearing them for at least one hour before we examine your eyes.</span></p>\r\n<p><strong>To make an appointment</strong></p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\">call us on 020 83161121</span></li>\r\n<li><span style=\"font-weight: 400;\">Email: info@johnlewisopticians.co.uk or <a href=\"/appointment\">book online</a><a href=\"/appointment\">.</a></span></li>\r\n</ul>',1,'If you are already a contact lens wearer and are coming to see us for a check-up – please don’t forget to wear your lenses',NULL,'2020-04-29 15:29:54','2020-05-06 01:50:54',NULL),(3,'PRESCRIPTION  & SUNGLASSES','1','prescription-glasses-and-sunglasses','services/1588174339images.png','<p>&nbsp;</p>\r\n<p>We glaze your glasses or sunglasses either Single vision and &nbsp;Multifocal Glasses at reasonable price.</p>\r\n<p>&nbsp;</p>\r\n<p>If you have a pair of glasses and require a new prescription or you have broken a lens, you don&rsquo;t have to buy new glasses. Our glazing service is really easy to use; all you need to do is download our form.</p>',1,'PRESCRIPTION  & SUNGLASSES',NULL,'2020-04-29 15:32:19','2020-05-05 12:02:35',NULL),(4,'REPAIR','1','repair','services/1588174482Screen-Shot-2016-02-20-at-3.05.31-PM.png','<p><span style=\"font-weight: 400;\">We repair any type of spectacles at reasonable price.</span></p>',1,'We repair any type of spectacles at reasonable price.',NULL,'2020-04-29 15:34:42','2020-05-05 11:59:31',NULL);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'Email','info@johnlewisopticians.co.uk','email',1,NULL,'2020-03-27 06:09:31','2020-03-27 06:09:44'),(2,'Phone','02083161121','phone',1,NULL,'2020-03-27 06:09:53','2020-03-27 06:09:59'),(3,'Address','13 Plumstead Road Woolwich, SE18 7BZ, London, UK','address',1,NULL,'2020-03-27 06:10:15','2020-05-03 16:04:16'),(4,'Opening Hours','Monday To Sunday 9:00 AM - 6:00 PM','opening-hours',1,NULL,'2020-03-27 06:10:37','2020-03-27 06:10:43'),(5,'Company Regd. No','982345 13','company-regd-no',1,NULL,'2020-03-27 06:11:00','2020-03-27 06:11:04'),(6,'For Admin','nijbhup27@gmail.com','for-admin',0,NULL,'2020-04-07 03:31:53','2020-04-07 03:31:53'),(7,'Reply Email','info@johnlewisopticians.co.uk','reply-email',0,NULL,'2020-04-07 03:32:28','2020-04-07 03:32:28');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address`
--

LOCK TABLES `shipping_address` WRITE;
/*!40000 ALTER TABLE `shipping_address` DISABLE KEYS */;
INSERT INTO `shipping_address` VALUES (1,1,'Gay','Morrow','nigubagyce@mailinator.net','Sit dolores ex dele','Adipisci nesciunt i','+1 (593) 651-9213','2020-05-03 14:43:15','2020-05-03 14:43:15',NULL,NULL),(2,2,'Gay','Morrow','nigubagyce@mailinator.net','Sit dolores ex dele','Adipisci nesciunt i','+1 (593) 651-9213','2020-05-03 15:15:56','2020-05-03 15:15:56',NULL,NULL),(3,3,'Kirsten','Rocha','qalyfane@mailinator.net','Commodo ipsa qui in','Doloremque optio pa','+1 (401) 133-1644','2020-05-04 13:16:56','2020-05-04 13:16:56',NULL,NULL),(4,4,'Ganesh','Thapa','ganeshthapa@live.com','asddsdsd','LONDON','07429067450','2020-05-04 13:17:27','2020-05-04 13:17:27',NULL,NULL);
/*!40000 ALTER TABLE `shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_lists`
--

DROP TABLE IF EXISTS `shop_product_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('eye-care','sunglass','kid-wear') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_lists`
--

LOCK TABLES `shop_product_lists` WRITE;
/*!40000 ALTER TABLE `shop_product_lists` DISABLE KEYS */;
INSERT INTO `shop_product_lists` VALUES (1,'Vivien Figueroa','Labore eiusmod nihil','vivien-figueroa','product-lists/1588752526armani-exchange-logo.jpg',1,1,'Sed voluptas optio',1,NULL,'2020-05-06 08:08:46','2020-05-06 08:08:50','eye-care'),(2,'Marvin Mullins','Aspernatur quo exerc','marvin-mullins','product-lists/1588752568brand-1920-page.jpg',1,1,'Ullam aut quidem sin',1,NULL,'2020-05-06 08:09:28','2020-05-06 08:17:21','eye-care'),(3,'Castor Sanchez','Iste proident esse','castor-sanchez','product-lists/1588753065burberry-new-logo.jpg',1,1,'Alias voluptatibus r',2,NULL,'2020-05-06 08:17:45','2020-05-06 08:17:56','eye-care'),(4,'Dorothy Franklin','Odit quia adipisicin','dorothy-franklin','product-lists/1588753172bvlgari.jpg',1,1,'Quas deleniti laboru',5,NULL,'2020-05-06 08:19:32','2020-05-06 08:19:40','eye-care'),(5,'Garth Jensen','Sequi elit ullamco','garth-jensen','product-lists/1588754230cartier.png',1,1,'Saepe ducimus cum c',2,NULL,'2020-05-06 08:37:10','2020-05-06 08:37:14','eye-care'),(6,'Wesley Lynn','Enim rem elit volup','wesley-lynn','product-lists/1588754249cazal-eyewear-logo.png',1,1,'Iste nisi aut volupt',5,NULL,'2020-05-06 08:37:29','2020-05-06 08:37:33','eye-care'),(7,'Selma Mcconnell','Nesciunt proident','selma-mcconnell','product-lists/1588754289CAZAL-Logo-1074-2.jpg',1,1,'Ipsum itaque ut qua',1,NULL,'2020-05-06 08:38:09','2020-05-06 08:38:12','eye-care'),(8,'Jena Hammond','Rerum neque in elige','jena-hammond','product-lists/1588754315chanel.jpg',1,1,'Amet sit voluptatem',1,NULL,'2020-05-06 08:38:35','2020-05-06 08:38:38','eye-care'),(9,'Kasimir Leblanc','In aperiam enim sapi','kasimir-leblanc','product-lists/1588754341dita.png',1,1,'Eiusmod a sint conse',2,NULL,'2020-05-06 08:39:01','2020-05-06 08:39:04','eye-care'),(10,'Yvonne Middleton','Voluptatem non enim','yvonne-middleton','product-lists/1588754374emporio-armani_0.jpg',1,1,'Temporibus vero aut',4,NULL,'2020-05-06 08:39:34','2020-05-06 08:39:42','eye-care'),(11,'Victor Oneill','Similique voluptas d','victor-oneill','product-lists/1588754421Invoice - GOC11290.jpg',1,1,'Excepturi adipisicin',1,NULL,'2020-05-06 08:40:21','2020-05-06 08:40:25','eye-care'),(12,'Abdul Patton','Qui nisi voluptates','abdul-patton','product-lists/1588754453logo-gucci.png',1,1,'Omnis neque ut rerum',5,NULL,'2020-05-06 08:40:53','2020-05-06 08:41:01','eye-care'),(13,'Duncan Lara','Vel rerum dolore lab','duncan-lara','product-lists/1588754556Logo-Jimmy_Choo.png',1,1,'Architecto ut qui en',1,NULL,'2020-05-06 08:42:36','2020-05-06 08:42:42','eye-care'),(14,'Ignacia Mason','At excepteur proiden','ignacia-mason','product-lists/1588754582michael-kors-1.jpg',1,1,'Modi aliqua Hic con',5,NULL,'2020-05-06 08:43:02','2020-05-06 08:43:11','eye-care'),(15,'Blythe Marsh','Harum delectus mini','blythe-marsh','product-lists/1588754616Oakley.jpg',1,1,'Aliquam in maxime en',5,NULL,'2020-05-06 08:43:36','2020-05-06 08:43:41','eye-care'),(16,'Kuame Petty','Ea ea ipsa nostrud','kuame-petty','product-lists/1588754648police.jpg',1,1,'Facilis ea corporis',4,NULL,'2020-05-06 08:44:08','2020-05-06 08:44:17','eye-care'),(17,'Byron Cervantes','Pariatur Rerum cupi','byron-cervantes','product-lists/1588754695pradaeyewear-1920-page.jpg',1,1,'Qui ea nostrud Nam e',1,NULL,'2020-05-06 08:44:55','2020-05-06 08:45:01','eye-care'),(18,'Teagan Berg','Quasi impedit quia','teagan-berg','product-lists/1588754723ralph-lauren-eyewear_0.jpg',1,1,'Aliqua Laboris corp',1,NULL,'2020-05-06 08:45:23','2020-05-06 08:45:27','eye-care'),(19,'Wade Bowen','Veniam nobis sequi','wade-bowen','product-lists/1588754812Rayban.png',1,1,'Ipsum qui cumque ex',1,NULL,'2020-05-06 08:46:52','2020-05-06 08:47:11','eye-care'),(20,'Russell Dorsey','Sit autem aliquip i','russell-dorsey','product-lists/1588754862Silhouette-Logo.png',0,1,'Necessitatibus vel s',1,'2020-05-06 08:49:01','2020-05-06 08:47:42','2020-05-06 08:49:01','eye-care'),(21,'Russell Dorsey','Sit autem aliquip i','russell-dorsey-1','product-lists/1588754873Silhouette-Logo.png',1,1,'Necessitatibus vel s',1,NULL,'2020-05-06 08:47:53','2020-05-06 08:48:57','eye-care'),(22,'Wanda Holland','Aut sunt optio dolo','wanda-holland','product-lists/1588768522pennine-optical-logo.png',1,1,'Vel eum rerum tenetu',2,NULL,'2020-05-06 12:35:22','2020-05-06 12:35:26','kid-wear'),(23,'Nyssa Lowery','Repudiandae vel enim','nyssa-lowery','product-lists/1588768545ray-ban.jpg',1,1,'Ex eligendi praesent',5,NULL,'2020-05-06 12:35:45','2020-05-06 12:35:48','kid-wear'),(24,'Bo Rojas','Rem quis molestias t','bo-rojas','product-lists/1588768601cazal-eyewear-logo.png',1,1,'Nisi id do eiusmod v',1,NULL,'2020-05-06 12:36:41','2020-05-06 12:36:45','sunglass'),(25,'Basia Simpson','Consequat Rem maxim','basia-simpson','product-lists/1588768620dita.png',1,1,'Totam inventore moll',2,NULL,'2020-05-06 12:37:00','2020-05-06 12:37:03','sunglass'),(26,'Neve Alvarez','Veritatis aspernatur','neve-alvarez','product-lists/1588768639michael-kors-1.jpg',1,1,'Consequatur Quis el',1,NULL,'2020-05-06 12:37:19','2020-05-06 12:37:23','kid-wear'),(27,'Arsenio Joseph','Quia unde excepturi','arsenio-joseph','product-lists/1588768665Oakley.jpg',1,1,'Sit eos tenetur quo',5,NULL,'2020-05-06 12:37:45','2020-05-06 12:37:48','sunglass'),(28,'Eaton Brock','Repudiandae aliquip','eaton-brock','product-lists/1588768687ralph-lauren-eyewear_0.jpg',1,1,'Veniam commodo cons',5,NULL,'2020-05-06 12:38:07','2020-05-06 12:38:11','sunglass'),(29,'Linus Morales','Ipsum repudiandae q','linus-morales','product-lists/1588768709Rayban.png',1,1,'Placeat molestiae d',4,NULL,'2020-05-06 12:38:29','2020-05-06 12:38:33','sunglass');
/*!40000 ALTER TABLE `shop_product_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piece` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (4,3,8,'freshlook-colors','stock/1587009249freshlook_one_day_colors_2_1.png','20','Freshlook Colors',1,'2020-04-16 03:54:09','2020-04-16 03:54:14'),(9,11,7,'all-in-one-1','stock/1587027969Acuvue-advance-for-astigmatism.jpg','30','All in one',1,'2020-04-16 09:06:09','2020-04-16 09:06:16'),(12,14,9,'all-in-one-3','stock/1587028372Acuvue-oasys-with-hydraclear.jpg','20','All in one',1,'2020-04-16 09:12:52','2020-04-16 09:12:57'),(13,15,9,'all-in-one-4','stock/1587028745Jaeger-Glasses-264-Gunmetal-400x180.jpg','20','All in one',1,'2020-04-16 09:19:05','2020-04-16 09:19:08'),(14,16,10,'black-brown','stock/1587029134William-Morris-Frazer-glasses.jpg','12','Black/Brown',1,'2020-04-16 09:25:34','2020-04-16 09:25:38'),(15,16,11,'brown-blue','stock/1587029178William-Morris-Frazer-glasses.jpg','20','Brown/Blue',1,'2020-04-16 09:26:18','2020-04-16 09:26:23'),(17,19,8,'brand-color','stock/1587030821163-3-011.png','20','brand color',1,'2020-04-16 09:53:41','2020-04-16 09:53:59'),(18,20,13,'havana-gold','stock/1587031128cazal-60043-001-56_1_1.jpg','30','Havana Gold',1,'2020-04-16 09:58:48','2020-04-16 10:00:12'),(19,20,12,'black-gold','stock/1587031196cazal-60043-001-56_1_1.jpg','20','Black Gold',1,'2020-04-16 09:59:56','2020-04-16 10:00:08'),(20,21,14,'matta-black','stock/1587031534cazal-60043-001-56_1_1.jpg','20','Matta Black',1,'2020-04-16 10:05:34','2020-04-16 10:05:41'),(21,1,15,'003-gold','stock/15885168112.jpg','20','003 GOLD',1,'2020-05-03 14:40:11','2020-05-03 14:40:17'),(22,1,16,'002-bicolour','stock/158851689811-0760002_front_1.jpg','22','002 BICOLOUR',1,'2020-05-03 14:41:38','2020-05-03 14:41:44'),(23,2,17,'grey-gradient','stock/158881075311-0959096_front_1_1.jpg','12','GREY GRADIENT',1,'2020-05-07 00:19:13','2020-05-07 00:19:23'),(24,2,18,'302-black-gold','stock/158881082811-0959302_front_1.jpg','10','302 BLACK-GOLD',1,'2020-05-07 00:20:28','2020-05-07 00:20:32'),(25,2,19,'398-brown','stock/158881089611-0959398_front_1.jpg','10','398 BROWN',0,'2020-05-07 00:21:36','2020-05-07 00:21:36'),(26,4,21,'001-gold','stock/158881266511-0992002_front_1.jpg','12','002 BLACK-GOLD',1,'2020-05-07 00:51:05','2020-05-07 00:52:10'),(27,4,20,'001-gold-1','stock/158881269811-0959096_front_1_1.jpg','12','001 GOLD',1,'2020-05-07 00:51:38','2020-05-07 00:51:51'),(28,5,22,'002-crystal-gold','stock/158881294911-00020024226_front_1.jpg','12','002 CRYSTAL-GOLD',1,'2020-05-07 00:55:49','2020-05-07 00:55:55'),(29,6,23,'702-black-red','stock/158881319611-0163001-3_front_1 (1).jpg','12','702 BLACK-RED',1,'2020-05-07 00:59:56','2020-05-07 01:00:00'),(30,8,24,'gun-metal','stock/1590393659dls101-61-04_swatch_2.jpg','10','GUN METAL',1,'2020-05-25 08:00:59','2020-05-25 08:01:06'),(31,8,25,'black-palladium-air','stock/1590393725dls101-61-04_swatch_2.jpg','12','BLACK PALLADIUM - AIR',1,'2020-05-25 08:02:05','2020-05-25 08:02:09'),(32,9,26,'tortoise-white-gold','stock/1590394161swatch_2_3.jpg','10','TORTOISE/WHITE GOLD',1,'2020-05-25 08:07:47','2020-05-25 08:09:21'),(33,9,2,'black','stock/1590394209swatch_1_3.jpg','10','BLACK',1,'2020-05-25 08:10:09','2020-05-25 08:10:13'),(34,10,27,'white-gold-air','stock/1590394419dls102-57-02_swatch.jpg','10','WHITE GOLD - AIR',1,'2020-05-25 08:13:39','2020-05-25 08:13:44'),(35,10,24,'gun-metal-1','stock/1590394479dls102-57-04_swatch_1.jpg','10','GUN METAL',1,'2020-05-25 08:14:39','2020-05-25 08:15:45'),(36,10,28,'white-gold-land','stock/1590394548dls102-57-03_swatch_1.jpg','10','WHITE GOLD - LAND',1,'2020-05-25 08:15:48','2020-05-25 08:15:55');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunglasses`
--

DROP TABLE IF EXISTS `sunglasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunglasses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunglasses`
--

LOCK TABLES `sunglasses` WRITE;
/*!40000 ALTER TABLE `sunglasses` DISABLE KEYS */;
INSERT INTO `sunglasses` VALUES (1,'Cazal','cazal',1,2,NULL,'2020-04-15 15:50:47','2020-04-15 15:50:57'),(2,'Ray-Ban Sunglass','ray-ban-sunglass',1,2,NULL,'2020-04-15 15:51:07','2020-04-16 02:02:28');
/*!40000 ALTER TABLE `sunglasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `service_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `paypal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,2,'PAYID-L2XNQ2Q32E45972SK974011P','2020-05-03 15:15:57','2020-05-03 15:15:57'),(2,3,'PAYID-L2YBLLA48481506SH975345K','2020-05-04 13:16:57','2020-05-04 13:16:57'),(3,4,'PAYID-L2YBLKY4TN66811L50914342','2020-05-04 13:17:28','2020-05-04 13:17:28');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type_id` int(10) unsigned DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jhon lewis Admin','jhon@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'$2y$10$AAIIegqDzdwBn3EFHTAv8eqJ5D5abHjhwDvrYFhuF2SNyLQDIJ1ny',NULL,NULL,NULL,NULL,NULL,NULL),(2,'Jhon lewis Bhupendra','nijbhup27@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,'$2y$10$zCpE/dWv6CtQzf1dxEchEe4AT.LX.X47VmVszUtiodXmC.8Bi.rZi',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Jhon lewis Reception','reception@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,2,'$2y$10$pvbHfOJwC3owwajxxmW/8eTo09afDSJ28PGHT4qrHR5BifBKmVBmC',NULL,NULL,NULL,NULL,NULL,NULL),(4,'Test User','test@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'$2y$10$bVjrKRAyF2uDSccdEpvo6uoWvHAqhe0vm6crSLGzK6RrmIEwr5f/a',NULL,NULL,NULL,NULL,NULL,NULL),(5,'Bhupendra Sapkota','genstechnologyuk@gmail.com','Nijgadh','9860921715','users/1586231779GENS UK 17 -1.jpg','Nepal','2','44401',0,NULL,NULL,'$2y$10$eCVghiwh5HyFZnk/YmP6CO/WXLrNv7jAE6Lzju1CtWQy7w3C3DnX2',NULL,'2020-04-07 03:10:26','2020-04-07 03:56:19','Test','Data',NULL),(6,'dvddvd','ganeshthapa90@gmail.com','fgfgf','07429067450',NULL,NULL,NULL,NULL,0,NULL,NULL,'$2y$10$FtxtU9Ek6sII0Ax2cG7oaeyRwZdjNmsyuxaETMPmeg0MU3fap1eye',NULL,'2020-04-10 14:04:53','2020-04-10 14:04:53',NULL,NULL,NULL),(8,'Bhupendra Sapkota','test123@gmail.com','Nijgadh','9860921715',NULL,NULL,NULL,NULL,0,NULL,NULL,'$2y$10$PL.JVB.uq/JkB/TIjpXDs.MNjfiHwEoiODTYhs/8fkdiYyAY9jjIO',NULL,'2020-05-04 13:04:03','2020-05-04 13:04:03',NULL,NULL,NULL),(9,'Deepak Gaire','deep_gaire@yahoo.com','5 Burrage Place, London, UK','07832904242',NULL,NULL,NULL,NULL,0,NULL,NULL,'$2y$10$lEmiS4tW2/0i1F8fKjnv.OyBf5WBodhkte8TnaD9H.dkINFtK8l2S',NULL,'2020-05-04 13:04:15','2020-05-04 13:04:15',NULL,NULL,NULL),(11,'Ganesh Thapa','ganeshthapa@live.com','13 Plumstead Road','07429067450',NULL,NULL,NULL,NULL,0,NULL,NULL,'$2y$10$NufQ4FNWjQ5jh8s4Q0/Eu.Wn8McG0.KxusnQSfEOI0mbNuFkjM1p.',NULL,'2020-05-04 13:08:52','2020-05-04 13:08:52',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_type_`
--

DROP TABLE IF EXISTS `users_type_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_type_` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_type_`
--

LOCK TABLES `users_type_` WRITE;
/*!40000 ALTER TABLE `users_type_` DISABLE KEYS */;
INSERT INTO `users_type_` VALUES (1,'Admin','admin',0,NULL,NULL),(2,'Receptionist','receptionist',0,NULL,NULL);
/*!40000 ALTER TABLE `users_type_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whishlist`
--

DROP TABLE IF EXISTS `whishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whishlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whishlist`
--

LOCK TABLES `whishlist` WRITE;
/*!40000 ALTER TABLE `whishlist` DISABLE KEYS */;
INSERT INTO `whishlist` VALUES (1,1,11,'2020-05-04 13:09:27','2020-05-04 13:09:27');
/*!40000 ALTER TABLE `whishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-28  7:31:37
