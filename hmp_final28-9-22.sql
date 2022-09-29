/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - u433685697_hiremyprofile
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u433685697_hiremyprofile` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `u433685697_hiremyprofile`;

/*Table structure for table `admin_logs` */

DROP TABLE IF EXISTS `admin_logs`;

CREATE TABLE `admin_logs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_id` int(100) NOT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_id` int(255) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_logs` */

insert  into `admin_logs`(`id`,`admin_id`,`work`,`work_id`,`date`,`status`) values 
(10,1,'proposal',1,'July 03, 2022 16:02:10','approved'),
(11,1,'support_request',1,'July 03, 2022 16:34:56','processing '),
(12,1,'paypal_settings',0,'July 03, 2022 16:40:19','updated'),
(13,1,'payoneer_settings',0,'July 03, 2022 16:45:11','updated'),
(14,1,'paypal_settings',0,'July 03, 2022 16:45:34','updated'),
(15,1,'paypal_settings',0,'July 03, 2022 16:46:16','updated'),
(16,1,'language',2,'July 03, 2022 16:49:34','inserted'),
(17,1,'seller',2,'July 03, 2022 17:23:30','block-ban'),
(18,1,'seller_level',1,'July 04, 2022 16:27:28','updated'),
(19,1,'seller',2,'July 04, 2022 16:29:30','unblocked'),
(20,1,'seller',2,'July 04, 2022 16:35:37','block-ban'),
(21,1,'seller',2,'July 04, 2022 16:35:45','unblocked'),
(22,1,'seller_balance',3,'July 04, 2022 16:36:01','updated'),
(23,1,'seller_balance',2,'July 04, 2022 16:36:15','updated'),
(24,1,'request',1,'July 04, 2022 16:38:22','approved'),
(25,1,'proposal',4,'July 05, 2022 00:58:33','approved'),
(26,1,'seller_language',1,'July 05, 2022 02:29:19','inserted'),
(27,1,'seller_language',2,'July 05, 2022 02:29:38','inserted'),
(28,1,'seller_language',3,'July 05, 2022 02:29:51','inserted'),
(29,1,'seller_language',4,'July 05, 2022 02:30:05','inserted'),
(30,1,'seller_language',5,'July 05, 2022 02:30:17','inserted'),
(31,1,'proposal',5,'July 05, 2022 02:47:36','approved'),
(32,1,'proposal',6,'July 05, 2022 03:03:51','approved'),
(33,1,'request',2,'July 06, 2022 07:11:51','approved'),
(34,1,'request',4,'July 14, 2022 03:07:33','approved'),
(35,1,'request',5,'July 14, 2022 03:30:30','approved'),
(36,1,'proposal',7,'July 14, 2022 03:30:40','approved'),
(37,1,'general_settings',0,'July 18, 2022 15:19:14','updated'),
(38,1,'general_settings',0,'July 18, 2022 15:20:22','updated'),
(39,1,'general_settings',0,'July 18, 2022 16:55:17','updated'),
(40,1,'general_settings',0,'July 18, 2022 17:01:23','updated'),
(41,1,'general_settings',0,'July 18, 2022 17:05:53','updated'),
(42,1,'general_settings',0,'July 18, 2022 17:11:11','updated'),
(43,1,'general_settings',0,'July 18, 2022 17:12:18','updated'),
(44,1,'general_settings',0,'July 18, 2022 17:17:31','updated'),
(45,1,'general_settings',0,'July 18, 2022 17:18:57','updated'),
(46,1,'general_settings',0,'July 18, 2022 17:59:13','updated'),
(47,1,'general_settings',0,'July 22, 2022 09:19:01','updated'),
(48,1,'general_settings',0,'July 22, 2022 09:22:07','updated'),
(49,1,'general_settings',0,'July 27, 2022 13:07:59','updated'),
(50,1,'slide',27,'July 27, 2022 15:21:34','deleted'),
(51,1,'customer_support_settings',0,'July 27, 2022 15:23:11','updated'),
(52,1,'delivery_time',7,'July 27, 2022 15:26:38','updated'),
(53,1,'delivery_time',6,'July 27, 2022 15:27:32','updated'),
(54,1,'delivery_time',5,'July 27, 2022 15:28:34','updated'),
(55,1,'general_settings',0,'July 27, 2022 15:38:29','updated'),
(56,1,'general_settings',0,'July 27, 2022 15:41:19','updated'),
(57,1,'custom_css',0,'July 27, 2022 15:45:20','updated'),
(58,1,'seller_settings',0,'July 27, 2022 15:48:31','updated'),
(59,1,'general_settings',0,'July 27, 2022 15:52:32','updated'),
(60,1,'general_settings',0,'July 27, 2022 15:55:03','updated'),
(61,1,'general_settings',0,'July 27, 2022 17:51:06','updated'),
(62,1,'general_settings',0,'July 27, 2022 17:51:19','updated'),
(63,1,'general_settings',0,'July 28, 2022 11:16:11','updated'),
(64,1,'general_settings',0,'July 28, 2022 11:19:05','updated'),
(65,1,'general_settings',0,'July 28, 2022 17:48:10','updated'),
(66,1,'general_settings',0,'July 28, 2022 17:48:46','updated'),
(67,1,'term',3,'July 28, 2022 17:52:50','inserted'),
(68,1,'term',3,'July 28, 2022 17:55:21','deleted'),
(69,1,'term',2,'July 28, 2022 17:55:59','updated'),
(70,1,'page',10,'July 29, 2022 01:07:22','updated'),
(71,1,'page',10,'July 29, 2022 01:08:39','updated'),
(72,1,'page',11,'July 29, 2022 01:17:50','updated'),
(73,1,'term',1,'July 29, 2022 01:20:34','deleted'),
(74,1,'term',2,'July 29, 2022 01:20:39','deleted'),
(75,1,'page',12,'July 29, 2022 01:27:46','updated'),
(76,1,'card',1,'August 01, 2022 11:08:58','updated'),
(77,1,'card',2,'August 01, 2022 11:10:17','updated'),
(78,1,'card',3,'August 01, 2022 11:12:47','updated'),
(79,1,'card',4,'August 01, 2022 11:13:59','updated'),
(80,1,'card',5,'August 01, 2022 11:15:54','updated'),
(81,1,'card',6,'August 01, 2022 11:16:48','updated'),
(82,1,'card',3,'August 01, 2022 11:19:06','updated'),
(83,1,'card',3,'August 01, 2022 11:20:22','updated'),
(84,1,'box',6,'August 01, 2022 11:22:09','updated'),
(85,1,'box',5,'August 01, 2022 11:22:36','updated'),
(86,1,'box',4,'August 01, 2022 11:22:54','updated'),
(87,1,'page',13,'August 17, 2022 15:22:18','updated'),
(88,1,'page',13,'August 17, 2022 16:04:00','updated'),
(89,1,'page',13,'August 17, 2022 16:43:44','updated'),
(90,1,'page',13,'August 17, 2022 17:38:58','updated'),
(91,1,'page',13,'August 17, 2022 17:40:49','updated'),
(92,1,'page',13,'August 17, 2022 17:42:04','updated'),
(93,1,'page',13,'August 17, 2022 17:42:37','updated'),
(94,1,'page',13,'August 17, 2022 17:45:59','updated'),
(95,1,'page',13,'August 18, 2022 06:24:40','updated'),
(96,1,'page',14,'August 18, 2022 07:08:57','updated'),
(97,1,'page',14,'August 18, 2022 07:09:31','updated'),
(98,1,'page',13,'August 18, 2022 07:10:23','updated'),
(99,1,'page',13,'August 18, 2022 15:00:52','updated'),
(100,1,'general_settings',0,'August 22, 2022 12:00:21','updated'),
(101,1,'seller_level',4,'September 03, 2022 06:19:26','updated'),
(102,1,'seller_settings',0,'September 03, 2022 06:28:21','updated'),
(103,1,'proposal',3,'September 05, 2022 09:03:02','approved'),
(104,1,'seller_settings',0,'September 05, 2022 09:06:15','updated'),
(105,1,'seller_settings',0,'September 05, 2022 09:06:44','updated'),
(106,1,'seller_settings',0,'September 05, 2022 09:07:21','updated'),
(107,1,'videos',1,'September 13, 2022 15:34:33','updated'),
(108,1,'videos',1,'September 13, 2022 15:53:07','updated'),
(109,1,'videos',4,'September 14, 2022 06:00:25','inserted'),
(110,1,'videos',5,'September 14, 2022 08:57:17','inserted'),
(111,1,'videos',6,'September 14, 2022 08:57:46','inserted'),
(112,1,'instructions',7,'September 14, 2022 09:35:16','inserted'),
(113,1,'instructions',1,'September 14, 2022 09:42:29','deleted'),
(114,1,'instructions',2,'September 14, 2022 09:42:56','deleted'),
(115,1,'instructions',3,'September 14, 2022 09:43:03','deleted'),
(116,1,'instructions',4,'September 14, 2022 09:43:10','deleted'),
(117,1,'instructions',5,'September 14, 2022 09:43:16','deleted'),
(118,1,'instructions',6,'September 14, 2022 09:43:23','deleted'),
(119,1,'instructions',7,'September 14, 2022 09:54:03','updated'),
(120,1,'instructions',7,'September 14, 2022 09:54:25','updated'),
(121,1,'instructions',8,'September 14, 2022 09:55:09','inserted'),
(122,1,'instructions',9,'September 14, 2022 09:55:47','inserted'),
(123,1,'instructions',10,'September 14, 2022 09:56:18','inserted'),
(124,1,'instructions',11,'September 14, 2022 09:57:00','inserted'),
(125,1,'instructions',12,'September 14, 2022 09:57:40','inserted'),
(126,1,'instructions',7,'September 14, 2022 10:36:14','updated'),
(127,1,'instructions',7,'September 14, 2022 10:37:19','updated'),
(128,1,'instructions',7,'September 14, 2022 10:39:08','updated'),
(129,1,'home_section',0,'September 14, 2022 13:45:16','updated'),
(130,1,'home_section_5',0,'September 14, 2022 13:45:16','updated'),
(131,1,'home_section',0,'September 14, 2022 13:45:49','updated'),
(132,1,'home_section_5',0,'September 14, 2022 13:45:49','updated'),
(133,1,'home_section',0,'September 14, 2022 13:46:00','updated'),
(134,1,'home_section_5',0,'September 14, 2022 13:46:01','updated'),
(135,1,'proposal',8,'September 26, 2022 17:04:00','approved'),
(136,1,'proposal',8,'September 26, 2022 17:04:25','trashed'),
(137,1,'request',6,'September 26, 2022 19:52:05','approved'),
(138,1,'request',3,'September 26, 2022 19:58:57','approved');

/*Table structure for table `admin_notifications` */

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `content_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

insert  into `admin_notifications`(`id`,`seller_id`,`content_id`,`proposal_id`,`reason`,`date`,`status`) values 
(1,3,1,0,'proposal_report','July 18, 2022','unread');

/*Table structure for table `admin_rights` */

DROP TABLE IF EXISTS `admin_rights`;

CREATE TABLE `admin_rights` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` int(11) NOT NULL,
  `plugins` int(10) NOT NULL,
  `pages` int(11) NOT NULL,
  `blog` int(10) NOT NULL,
  `feedback` int(10) NOT NULL,
  `video_schedules` int(10) NOT NULL,
  `proposals` int(11) NOT NULL,
  `accounting` int(10) NOT NULL,
  `payouts` int(10) NOT NULL,
  `reports` int(11) NOT NULL,
  `inbox` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `buyer_requests` int(11) NOT NULL,
  `restricted_words` int(11) NOT NULL,
  `notifications` int(11) NOT NULL,
  `cats` int(11) NOT NULL,
  `delivery_times` int(11) NOT NULL,
  `seller_languages` int(11) NOT NULL,
  `seller_skills` int(11) NOT NULL,
  `seller_levels` int(10) NOT NULL,
  `customer_support` int(11) NOT NULL,
  `coupons` int(11) NOT NULL,
  `slides` int(11) NOT NULL,
  `terms` int(11) NOT NULL,
  `sellers` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `referrals` int(11) NOT NULL,
  `files` int(11) NOT NULL,
  `knowledge_bank` int(10) NOT NULL,
  `currencies` int(10) NOT NULL,
  `membplan` int(10) DEFAULT NULL,
  `languages` int(11) NOT NULL,
  `admins` int(11) DEFAULT NULL,
  `videos` int(11) NOT NULL,
  `instruction` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_rights` */

insert  into `admin_rights`(`id`,`admin_id`,`settings`,`plugins`,`pages`,`blog`,`feedback`,`video_schedules`,`proposals`,`accounting`,`payouts`,`reports`,`inbox`,`reviews`,`buyer_requests`,`restricted_words`,`notifications`,`cats`,`delivery_times`,`seller_languages`,`seller_skills`,`seller_levels`,`customer_support`,`coupons`,`slides`,`terms`,`sellers`,`orders`,`referrals`,`files`,`knowledge_bank`,`currencies`,`membplan`,`languages`,`admins`,`videos`,`instruction`) values 
(1,'1',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`admin_id`,`admin_name`,`admin_user_name`,`admin_email`,`admin_pass`,`admin_image`,`admin_contact`,`admin_country`,`admin_job`,`admin_about`,`isS3`) values 
(1,'admin','','itsoftexpert11@gmail.com','$2y$10$z9N9mveoJA7drWM6JNjarONOqqIizFmC5YihbyjYk.xTAjkJghqeq','',' ',' ',' ',' ',0);

/*Table structure for table `announcement_bar` */

DROP TABLE IF EXISTS `announcement_bar`;

CREATE TABLE `announcement_bar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enable_bar` int(10) NOT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bar_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_updated` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `announcement_bar` */

insert  into `announcement_bar`(`id`,`enable_bar`,`bg_color`,`text_color`,`bar_text`,`last_updated`,`language_id`) values 
(1,1,'#c0c0c0','#000000','\n<i class=\"fa fa-life-ring\" aria-hidden=\"true\"></i> Only for testing\r\n\r\n\r\n\r\n\r\n\r\n\n','1661612175',1);

/*Table structure for table `api_settings` */

DROP TABLE IF EXISTS `api_settings`;

CREATE TABLE `api_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enable_s3` int(10) NOT NULL,
  `s3_access_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s3_access_sceret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s3_bucket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s3_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s3_domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `api_settings` */

insert  into `api_settings`(`id`,`enable_s3`,`s3_access_key`,`s3_access_sceret`,`s3_bucket`,`s3_region`,`s3_domain`) values 
(1,0,'','','','','');

/*Table structure for table `app_info` */

DROP TABLE IF EXISTS `app_info`;

CREATE TABLE `app_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `app_info` */

insert  into `app_info`(`id`,`version`,`r_date`) values 
(1,'1.5.4','25 December 2020');

/*Table structure for table `app_license` */

DROP TABLE IF EXISTS `app_license`;

CREATE TABLE `app_license` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `purchase_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `app_license` */

insert  into `app_license`(`id`,`purchase_code`,`license_type`,`website`) values 
(1,'','','');

/*Table structure for table `archived_messages` */

DROP TABLE IF EXISTS `archived_messages`;

CREATE TABLE `archived_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `message_group_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `archived_messages` */

/*Table structure for table `article_cat` */

DROP TABLE IF EXISTS `article_cat`;

CREATE TABLE `article_cat` (
  `article_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `article_cat_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`article_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article_cat` */

/*Table structure for table `buyer_requests` */

DROP TABLE IF EXISTS `buyer_requests`;

CREATE TABLE `buyer_requests` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `child_id` int(10) NOT NULL,
  `request_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_budget` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buyer_requests` */

insert  into `buyer_requests`(`request_id`,`seller_id`,`cat_id`,`child_id`,`request_title`,`request_description`,`request_file`,`delivery_time`,`request_budget`,`request_date`,`request_status`,`isS3`) values 
(1,3,6,58,'Website development','I need website from scratch in wordpress. Generations of Americans are accustomed to the food pyramid design, and it’s not going away. In fact, the Healthy Eating Pyramid and the Healthy Eating Plate (as well as the Kid’s Healthy Eating Plate) complement each other.\r\n\r\n','WebMedium_1656952582.jpeg','7 Days','100','July 04, 2022','active',0),
(2,3,6,11,'Wordpress website required','Wordpress website requiredWordpress website requiredWordpress website requiredWordpress website requiredWordpress website requiredWordpress website requiredWordpress website requiredWordpress website required','','1 Day','200','July 06, 2022','active',0),
(3,3,2,17,'wordpress','ftyut uyt yut iuyt iuyt utyi ytu uyg ygh8','','7 Days','15','July 13, 2022','active',0),
(4,3,6,11,'wordpress','fdygfuyg uygyug hgughjg hjgbuhb uhhb hbhbh hbhbhbjhbjhnfdygfuyg uygyug hgughjg hjgbuhb uhhb hbhbh hbhbhbjhbjhnfdygfuyg uygyug hgughjg hjgbuhb uhhb hbhbh hbhbhbjhbjhnfdygfuyg uygyug hgughjg hjgbuhb uhhb hbhbh hbhbhbjhbjhn','','6 Days','45','July 13, 2022','active',0),
(5,3,1,1,'need website design','I need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my websiteI need design for my website','','4 Days','65','July 13, 2022','active',0),
(6,2,6,56,'Need A laravel developer','should be well know about fronend also','dashboard_1664214603.png','2 Days','20','September 26, 2022','active',0),
(7,3,4,43,'I can do any type of php work','abc','','2 Days','10','September 27, 2022','active\r\n',0);

/*Table structure for table `buyer_reviews` */

DROP TABLE IF EXISTS `buyer_reviews`;

CREATE TABLE `buyer_reviews` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `review_buyer_id` int(10) NOT NULL,
  `buyer_rating` int(10) NOT NULL,
  `buyer_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_seller_id` int(10) NOT NULL,
  `review_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buyer_reviews` */

insert  into `buyer_reviews`(`review_id`,`proposal_id`,`order_id`,`review_buyer_id`,`buyer_rating`,`buyer_review`,`review_seller_id`,`review_date`) values 
(1,1,1,3,5,'great',2,'Jul 04 2022'),
(2,4,6,2,5,'best seller....................',3,'Sep 05 2022');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `proposal_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `proposal_qty` int(10) NOT NULL,
  `delivery_id` int(10) NOT NULL,
  `revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_used` int(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart` */

/*Table structure for table `cart_extras` */

DROP TABLE IF EXISTS `cart_extras`;

CREATE TABLE `cart_extras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart_extras` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_featured` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_watermark` int(10) NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`cat_id`,`cat_url`,`cat_image`,`cat_featured`,`enable_watermark`,`isS3`) values 
(1,'graphics-design','p1.png','yes',0,0),
(2,'digital-marketing','p2.png','yes',0,0),
(3,'writing-translation','p3.png','yes',0,0),
(4,'video-animation','p4.png','yes',0,0),
(6,'programming-tech','p5.png','yes',0,0),
(7,'business','p6.png','yes',0,0),
(8,'fun-lifestyle','p7.png','yes',0,0),
(9,'music-audio','p8.png','yes',0,0);

/*Table structure for table `categories_children` */

DROP TABLE IF EXISTS `categories_children`;

CREATE TABLE `categories_children` (
  `child_id` int(10) NOT NULL AUTO_INCREMENT,
  `child_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_parent_id` int(10) NOT NULL,
  PRIMARY KEY (`child_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories_children` */

insert  into `categories_children`(`child_id`,`child_url`,`child_parent_id`) values 
(1,'logo-design',1),
(2,'business-cards-amp-stationery',1),
(3,'illustration',1),
(4,'cartoons-caricatures',1),
(5,'flyers-posters',1),
(6,'book-covers-packaging',1),
(7,'web-amp-mobile-design',1),
(8,'social-media-design',1),
(9,'banner-ads',1),
(10,'social-media-marketing',2),
(11,'wordpress',6),
(12,'photoshop-editing',1),
(13,'3d-2d-models',1),
(14,'t-shirts',1),
(15,'presentation-design',1),
(16,'other',1),
(17,'seo',2),
(18,'web-traffic',2),
(19,'content-marketing',2),
(20,'video-marketing',2),
(21,'email-marketing',2),
(22,'search-display-marketing',2),
(23,'marketing-strategy',2),
(24,'web-analytics',2),
(25,'influencer-marketing',2),
(26,'local-listings',2),
(27,'domain-research',2),
(28,'e-commerce-marketing',2),
(29,'mobile-advertising',2),
(30,'resumes-cover-letters',3),
(31,'proofreading-editing',3),
(32,'translation',3),
(33,'creative-writing',3),
(34,'business-copywriting',3),
(35,'research-summaries',3),
(36,'articles-blog-posts',3),
(37,'press-releases',3),
(38,'transcription',3),
(39,'legal-writing',3),
(40,'other',3),
(41,'whiteboard-explainer-videos',4),
(42,'intros-animated-logos',4),
(43,'promotional-brand-videos',4),
(44,'editing-post-production',4),
(45,'lyric-music-videos',4),
(46,'spokespersons-testimonials',4),
(48,'other',4),
(49,'voice-over',9),
(50,'mixing-mastering',9),
(51,'producers-composers',9),
(52,'singer-songwriters',9),
(53,'session-musicians-singers',9),
(54,'jingles-drops',9),
(55,'sound-effects',9),
(56,'web-programming',6),
(58,'website-builders-cms',6),
(60,'ecommerce',6),
(61,'mobile-apps-web',6),
(62,'desktop-applications',6),
(63,'support-it',6),
(64,'chatbots',6),
(65,'data-analysis-reports',6),
(66,'convert-files',6),
(67,'databases',6),
(68,'user-testing',6),
(69,'other',6),
(70,'virtual-assistant',7),
(71,'market-research',7),
(72,'business-plans',7),
(73,'branding-services',7),
(74,'legal-consulting',7),
(75,'financial-consulting',7),
(76,'business-tips',7),
(77,'presentations',7),
(78,'career-advice',7),
(79,'flyer-distribution',7),
(80,'other',7),
(81,'online-lessons',8),
(82,'arts-crafts',8),
(83,'relationship-advice',8),
(84,'health-nutrition-fitness',8),
(85,'astrology-readings',8),
(86,'spiritual-healing',8),
(87,'family-genealogy',8),
(88,'collectibles',8),
(89,'greeting-cards-videos',8),
(91,'viral-videos',8),
(92,'pranks-stunts',8),
(93,'celebrity-impersonators',8),
(94,'other',8);

/*Table structure for table `cats_meta` */

DROP TABLE IF EXISTS `cats_meta`;

CREATE TABLE `cats_meta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `cat_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=816 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cats_meta` */

insert  into `cats_meta`(`id`,`cat_id`,`language_id`,`cat_title`,`cat_desc`) values 
(1,1,1,'Graphics & Design','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(2,2,1,'Digital Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(3,3,1,'Writing & Translation','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(4,4,1,'Video & Animation\r\n','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(5,6,1,'Programming & Tech\r\n','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(6,7,1,'Business\r\n','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(7,8,1,'Fun & Lifestyle\r\n','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(8,9,1,'Music & Audio','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(808,1,2,'',''),
(809,2,2,'',''),
(810,3,2,'',''),
(811,4,2,'',''),
(812,6,2,'',''),
(813,7,2,'',''),
(814,8,2,'',''),
(815,9,2,'','');

/*Table structure for table `child_cats_meta` */

DROP TABLE IF EXISTS `child_cats_meta`;

CREATE TABLE `child_cats_meta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `child_id` int(10) NOT NULL,
  `child_parent_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `child_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6915 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `child_cats_meta` */

insert  into `child_cats_meta`(`id`,`child_id`,`child_parent_id`,`language_id`,`child_title`,`child_desc`) values 
(1,1,1,1,'Logo Design','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(2,2,1,1,'Business Cards &amp; Stationery','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(3,3,1,1,'Illustration','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(4,4,1,1,'Cartoons Caricatures','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(5,5,1,1,'Flyers Posters','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(6,6,1,1,'Book Covers & Packaging','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(7,7,1,1,'Web &amp; Mobile Design','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(8,8,1,1,'Social Media Design','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(9,9,1,1,'Banner Ads','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(10,10,2,1,'Social Media Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(11,11,6,1,'WordPress','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(12,12,1,1,'Photoshop Editing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(13,13,1,1,'3D & 2D Models','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(14,14,1,1,'T-Shirts','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(15,15,1,1,'Presentation Design','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(16,16,1,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(17,17,2,1,'SEO','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(18,18,2,1,'Web Traffic','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(19,19,2,1,'Content Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(20,20,2,1,'Video Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(21,21,2,1,'Email Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(22,22,2,1,'Search & Display Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(23,23,2,1,'Marketing Strategy','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(24,24,2,1,'Web Analytics','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(25,25,2,1,'Influencer Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(26,26,2,1,'Local Listings','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(27,27,2,1,'Domain Research','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(28,28,2,1,'E-Commerce Marketing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(29,29,2,1,'Mobile Advertising','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(30,30,3,1,'Resumes & Cover Letters','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(31,31,3,1,'Proofreading & Editing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(32,32,3,1,'Translation','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(33,33,3,1,'Creative Writing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(34,34,3,1,'Business Copywriting','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(35,35,3,1,'Research & Summaries','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(36,36,3,1,'Articles & Blog Posts','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(37,37,3,1,'Press Releases','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(38,38,3,1,'Transcription','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(39,39,3,1,'Legal Writing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(40,40,3,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(41,41,4,1,'Whiteboard & Explainer Videos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(42,42,4,1,'Intros & Animated Logos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(43,43,4,1,'Promotional & Brand Videos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(44,44,4,1,'Editing & Post Production','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(45,45,4,1,'Lyric & Music Videos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(46,46,4,1,'Spokespersons & Testimonials','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(47,48,4,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(48,49,9,1,'Voice Over','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(49,50,9,1,'Mixing & Mastering','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(50,51,9,1,'Producers & Composers','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(51,52,9,1,'Singer-Songwriters','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(52,53,9,1,'Session Musicians & Singers','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(53,54,9,1,'Jingles & Drops','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(54,55,9,1,'Sound Effects','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(55,56,6,1,'Web Programming','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(56,58,6,1,'Website Builders & CMS','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(57,60,6,1,'Ecommerce','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(58,61,6,1,'Mobile Apps & Web','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(59,62,6,1,'Desktop applications','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(60,63,6,1,'Support & IT','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(61,64,6,1,'Chatbots','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(62,65,6,1,'Data Analysis & Reports','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(63,66,6,1,'Convert Files','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(64,67,6,1,'Databases','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(65,68,6,1,'User Testing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(66,69,6,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(67,70,7,1,'Virtual Assistant','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(68,71,7,1,'Market Research','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(69,72,7,1,'Business Plans','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(70,73,7,1,'Branding Services','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(71,74,7,1,'Legal Consulting','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(72,75,7,1,'Financial Consulting','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(73,76,7,1,'Business Tips','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(74,77,7,1,'Presentations','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(75,78,7,1,'Career Advice','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(76,79,7,1,'Flyer Distribution','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(77,80,7,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(78,81,8,1,'Online Lessons','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(79,82,8,1,'Arts & Crafts','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(80,83,8,1,'Relationship Advice','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(81,84,8,1,'Health, Nutrition & Fitness','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(82,85,8,1,'Astrology & Readings','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(83,86,8,1,'Spiritual & Healing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(84,87,8,1,'Family & Genealogy','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(85,88,8,1,'Collectibles','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(86,89,8,1,'Greeting Cards & Videos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(87,91,8,1,'Viral Videos','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(88,92,8,1,'Pranks & Stunts','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(89,93,8,1,'Celebrity Impersonators','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(90,94,8,1,'Other','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(6825,1,1,2,'',''),
(6826,2,1,2,'',''),
(6827,3,1,2,'',''),
(6828,4,1,2,'',''),
(6829,5,1,2,'',''),
(6830,6,1,2,'',''),
(6831,7,1,2,'',''),
(6832,8,1,2,'',''),
(6833,9,1,2,'',''),
(6834,10,2,2,'',''),
(6835,11,6,2,'',''),
(6836,12,1,2,'',''),
(6837,13,1,2,'',''),
(6838,14,1,2,'',''),
(6839,15,1,2,'',''),
(6840,16,1,2,'',''),
(6841,17,2,2,'',''),
(6842,18,2,2,'',''),
(6843,19,2,2,'',''),
(6844,20,2,2,'',''),
(6845,21,2,2,'',''),
(6846,22,2,2,'',''),
(6847,23,2,2,'',''),
(6848,24,2,2,'',''),
(6849,25,2,2,'',''),
(6850,26,2,2,'',''),
(6851,27,2,2,'',''),
(6852,28,2,2,'',''),
(6853,29,2,2,'',''),
(6854,30,3,2,'',''),
(6855,31,3,2,'',''),
(6856,32,3,2,'',''),
(6857,33,3,2,'',''),
(6858,34,3,2,'',''),
(6859,35,3,2,'',''),
(6860,36,3,2,'',''),
(6861,37,3,2,'',''),
(6862,38,3,2,'',''),
(6863,39,3,2,'',''),
(6864,40,3,2,'',''),
(6865,41,4,2,'',''),
(6866,42,4,2,'',''),
(6867,43,4,2,'',''),
(6868,44,4,2,'',''),
(6869,45,4,2,'',''),
(6870,46,4,2,'',''),
(6871,48,4,2,'',''),
(6872,49,9,2,'',''),
(6873,50,9,2,'',''),
(6874,51,9,2,'',''),
(6875,52,9,2,'',''),
(6876,53,9,2,'',''),
(6877,54,9,2,'',''),
(6878,55,9,2,'',''),
(6879,56,6,2,'',''),
(6880,58,6,2,'',''),
(6881,60,6,2,'',''),
(6882,61,6,2,'',''),
(6883,62,6,2,'',''),
(6884,63,6,2,'',''),
(6885,64,6,2,'',''),
(6886,65,6,2,'',''),
(6887,66,6,2,'',''),
(6888,67,6,2,'',''),
(6889,68,6,2,'',''),
(6890,69,6,2,'',''),
(6891,70,7,2,'',''),
(6892,71,7,2,'',''),
(6893,72,7,2,'',''),
(6894,73,7,2,'',''),
(6895,74,7,2,'',''),
(6896,75,7,2,'',''),
(6897,76,7,2,'',''),
(6898,77,7,2,'',''),
(6899,78,7,2,'',''),
(6900,79,7,2,'',''),
(6901,80,7,2,'',''),
(6902,81,8,2,'',''),
(6903,82,8,2,'',''),
(6904,83,8,2,'',''),
(6905,84,8,2,'',''),
(6906,85,8,2,'',''),
(6907,86,8,2,'',''),
(6908,87,8,2,'',''),
(6909,88,8,2,'',''),
(6910,89,8,2,'',''),
(6911,91,8,2,'',''),
(6912,92,8,2,'',''),
(6913,93,8,2,'',''),
(6914,94,8,2,'','');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idea_id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `comments` */

/*Table structure for table `contact_support` */

DROP TABLE IF EXISTS `contact_support`;

CREATE TABLE `contact_support` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `contact_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_support` */

insert  into `contact_support`(`contact_id`,`contact_email`) values 
(1,'admin-info@hiremyprofile.com');

/*Table structure for table `contact_support_meta` */

DROP TABLE IF EXISTS `contact_support_meta`;

CREATE TABLE `contact_support_meta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `contact_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_support_meta` */

insert  into `contact_support_meta`(`id`,`language_id`,`contact_heading`,`contact_desc`) values 
(1,1,'Submit A Support Request','If you have any questions, please feel free to contact us, Our customer service center is online 24/7.\r\n\r\n');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `countries` */

insert  into `countries`(`id`,`name`,`code`) values 
(1,'Afghanistan',93),
(2,'Aland Islands',0),
(3,'Albania',355),
(4,'Algeria',213),
(5,'American Samoa',1684),
(6,'Andorra',376),
(7,'Angola',244),
(8,'Anguilla',1264),
(9,'Antarctica',0),
(10,'Antigua And Barbuda',1268),
(11,'Argentina',54),
(12,'Armenia',374),
(13,'Aruba',297),
(14,'Australia',61),
(15,'Austria',43),
(16,'Azerbaijan',994),
(17,'Bahamas',1242),
(18,'Bahrain',973),
(19,'Bangladesh',880),
(20,'Barbados',1246),
(21,'Belarus',375),
(22,'Belgium',32),
(23,'Belize',501),
(24,'Benin',229),
(25,'Bermuda',1441),
(26,'Bhutan',975),
(27,'Bolivia',591),
(28,'Bosnia And Herzegovina',387),
(29,'Botswana',267),
(30,'Bouvet Island',0),
(31,'Brazil',55),
(32,'British Indian Ocean Territory',246),
(33,'Brunei Darussalam',673),
(34,'Bulgaria',359),
(35,'Burkina Faso',226),
(36,'Burundi',257),
(37,'Cambodia',855),
(38,'Cameroon',237),
(39,'Canada',1),
(40,'Cape Verde',238),
(41,'Cayman Islands',1345),
(42,'Central African Republic',236),
(43,'Chad',235),
(44,'Chile',56),
(45,'China',86),
(46,'Christmas Island',61),
(47,'Cocos (keeling) Islands',672),
(48,'Colombia',57),
(49,'Comoros',269),
(50,'Congo',242),
(51,'Congo, The Democratic Republic Of',0),
(52,'Cook Islands',682),
(53,'Costa Rica',506),
(54,'Cote D\'ivoire',225),
(55,'Croatia',385),
(56,'Cuba',53),
(57,'Cyprus',357),
(58,'Czech Republic',420),
(59,'Denmark',45),
(60,'Djibouti',253),
(61,'Dominica',1767),
(62,'Dominican Republic',1809),
(63,'Ecuador',593),
(64,'Egypt',20),
(65,'El Salvador',503),
(66,'Equatorial Guinea',240),
(67,'Eritrea',291),
(68,'Estonia',372),
(69,'Ethiopia',251),
(70,'Falkland Islands (malvinas)',500),
(71,'Faroe Islands',298),
(72,'Fiji',679),
(73,'Finland',358),
(74,'France',33),
(75,'French Guiana',594),
(76,'French Polynesia',689),
(77,'French Southern Territories',0),
(78,'Gabon',241),
(79,'Gambia',220),
(80,'Georgia',995),
(81,'Germany',49),
(82,'Ghana',233),
(83,'Gibraltar',350),
(84,'Greece',30),
(85,'Greenland',299),
(86,'Grenada',1473),
(87,'Guadeloupe',590),
(88,'Guam',1671),
(89,'Guatemala',502),
(90,'Guernsey',0),
(91,'Guinea',224),
(92,'Guinea-bissau',245),
(93,'Guyana',592),
(94,'Haiti',509),
(95,'Heard Island And Mcdonald Islands',0),
(96,'Holy See (vatican City State)',39),
(97,'Honduras',504),
(98,'Hong Kong',852),
(99,'Hungary',36),
(100,'Iceland',354),
(101,'India',91),
(102,'Indonesia',62),
(103,'Iran, Islamic Republic Of',98),
(104,'Iraq',964),
(105,'Ireland',353),
(106,'Isle Of Man',0),
(107,'Israel',972),
(108,'Italy',39),
(109,'Jamaica',1876),
(110,'Japan',81),
(111,'Jersey',0),
(112,'Jordan',962),
(113,'Kazakhstan',7),
(114,'Kenya',254),
(115,'Kiribati',686),
(116,'Korea, Democratic People\'s Republic Of',850),
(117,'Korea, Republic Of',82),
(118,'Kuwait',965),
(119,'Kyrgyzstan',996),
(120,'Lao People\'s Democratic Republic',856),
(121,'Latvia',371),
(122,'Lebanon',961),
(123,'Lesotho',266),
(124,'Liberia',231),
(125,'Libyan Arab Jamahiriya',218),
(126,'Liechtenstein',423),
(127,'Lithuania',370),
(128,'Luxembourg',352),
(129,'Macao',853),
(130,'North Macedonia',0),
(131,'Madagascar',261),
(132,'Malawi',265),
(133,'Malaysia',60),
(134,'Maldives',960),
(135,'Mali',223),
(136,'Malta',356),
(137,'Marshall Islands',692),
(138,'Martinique',596),
(139,'Mauritania',222),
(140,'Mauritius',230),
(141,'Mayotte',269),
(142,'Mexico',52),
(143,'Micronesia, Federated States Of',691),
(144,'Moldova, Republic Of',373),
(145,'Monaco',377),
(146,'Mongolia',976),
(147,'Montserrat',1664),
(148,'Morocco',212),
(149,'Mozambique',258),
(150,'Myanmar',95),
(151,'Namibia',264),
(152,'Nauru',674),
(153,'Nepal',977),
(154,'Netherlands',31),
(155,'Netherlands Antilles',599),
(156,'New Caledonia',687),
(157,'New Zealand',64),
(158,'Nicaragua',505),
(159,'Niger',227),
(160,'Nigeria',234),
(161,'Niue',683),
(162,'Norfolk Island',672),
(163,'Northern Mariana Islands',1670),
(164,'Norway',47),
(165,'Oman',968),
(166,'Pakistan',92),
(167,'Palau',680),
(168,'Palestinian Territory, Occupied',970),
(169,'Panama',507),
(170,'Papua New Guinea',675),
(171,'Paraguay',595),
(172,'Peru',51),
(173,'Philippines',63),
(174,'Pitcairn',0),
(175,'Poland',48),
(176,'Portugal',351),
(177,'Puerto Rico',1787),
(178,'Qatar',974),
(179,'Reunion',262),
(180,'Romania',40),
(181,'Russian Federation',70),
(182,'Rwanda',250),
(183,'Saint Helena',290),
(184,'Saint Kitts And Nevis',1869),
(185,'Saint Lucia',1758),
(186,'Saint Pierre And Miquelon',508),
(187,'Saint Vincent And The Grenadines',1784),
(188,'Samoa',684),
(189,'San Marino',378),
(190,'Sao Tome And Principe',239),
(191,'Saudi Arabia',966),
(192,'Senegal',221),
(193,'Serbia And Montenegro',381),
(194,'Seychelles',248),
(195,'Sierra Leone',232),
(196,'Singapore',65),
(197,'Slovakia',421),
(198,'Slovenia',386),
(199,'Solomon Islands',677),
(200,'Somalia',252),
(201,'South Africa',27),
(202,'South Georgia And The South Sandwich Islands',0),
(203,'Spain',34),
(204,'Sri Lanka',94),
(205,'Sudan',249),
(206,'Suriname',597),
(207,'Svalbard And Jan Mayen',47),
(208,'Swaziland',268),
(209,'Sweden',46),
(210,'Switzerland',41),
(211,'Syrian Arab Republic',963),
(212,'Taiwan, Province Of China',886),
(213,'Tajikistan',992),
(214,'Tanzania, United Republic Of',255),
(215,'Thailand',66),
(216,'Timor-leste',670),
(217,'Togo',228),
(218,'Tokelau',690),
(219,'Tonga',676),
(220,'Trinidad And Tobago',1868),
(221,'Tunisia',216),
(222,'Turkey',90),
(223,'Turkmenistan',7370),
(224,'Turks And Caicos Islands',1649),
(225,'Tuvalu',688),
(226,'Uganda',256),
(227,'Ukraine',380),
(228,'United Arab Emirates',971),
(229,'United Kingdom',44),
(230,'United States',1),
(231,'United States Minor Outlying Islands',1),
(232,'Uruguay',598),
(233,'Uzbekistan',998),
(234,'Vanuatu',678),
(235,'Venezuela',58),
(236,'Viet Nam',84),
(237,'Virgin Islands, British',1284),
(238,'Virgin Islands, U.S.',1340),
(239,'Wallis And Futuna',681),
(240,'Western Sahara',212),
(241,'Yemen',967),
(242,'Zambia',260),
(243,'Zimbabwe',263),
(245,'Myanmar (Burma)',0);

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `coupon_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_limit` int(10) NOT NULL,
  `coupon_used` int(10) NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

/*Table structure for table `coupons_used` */

DROP TABLE IF EXISTS `coupons_used`;

CREATE TABLE `coupons_used` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `proposal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons_used` */

/*Table structure for table `currencies` */

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `currencies` */

insert  into `currencies`(`id`,`name`,`symbol`) values 
(1,'Afghan afghani','&#065;&#102;'),
(2,'Albanian lek','&#076;&#101;&#107;'),
(3,'Algerian dinar','&#1583;&#1580;'),
(4,'Euro','&#8364;'),
(5,'Angolan kwanza','&#075;&#122;'),
(6,'East Caribbean dollar','&#036;'),
(7,'Argentine peso','&#036;'),
(8,'Armenian dram','AMD'),
(9,'Aruban florin','&#402;'),
(10,'Australian dollar','&#036;'),
(11,'Azerbaijani manat','&#1084;&#1072;&#1085;'),
(12,'Bahamian dollar','&#036;'),
(13,'Bahraini dinar','.&#1583;.&#1576;'),
(14,'Bangladeshi taka','&#2547;'),
(15,'Barbadian dollar','&#036;'),
(16,'Belarusian ruble','&#112;&#046;'),
(17,'Belizean dollar','&#066;&#090;&#036;'),
(18,'West African CFA franc','CFA'),
(19,'Bermudian dollar','&#036;'),
(20,'Bhutanese ngultrum','&#078;&#117;&#046;'),
(21,'Bolivian boliviano','&#036;&#098;'),
(22,'US dollar','&#036;'),
(23,'Bosnia and Herzegovina convertible mark','&#075;&#077;'),
(24,'Botswana pula','&#080;'),
(25,'Brazilian real','&#082;&#036;'),
(26,'Brunei dollar','&#036;'),
(27,'Bulgarian lev','&#1083;&#1074;'),
(28,'Burmese kyat','&#075;'),
(29,'Burundian franc','&#070;&#066;&#117;'),
(30,'Cambodian riel','&#6107;'),
(31,'Central African CFA franc','&#070;&#067;&#070;&#065;'),
(32,'Canadian dollar','&#036;'),
(33,'Cape Verdean escudo','&#036;'),
(34,'Cayman Islands dollar','&#036;'),
(35,'Chilean peso','&#036;'),
(36,'Chinese renminbi','&#165;'),
(37,'Colombian peso','&#036;'),
(38,'Comorian franc','&#067;&#070;'),
(39,'Congolese franc','&#070;&#067;'),
(40,'New Zealand dollar','NZ&#036;'),
(41,'Costa Rican colón','&#8353;'),
(42,'Croatian kuna','&#107;&#110;'),
(43,'Cuban peso','&#8369;'),
(44,'Netherlands Antilles guilder','&#402;'),
(45,'Czech koruna','&#075;&#269;'),
(46,'Danish krone','&#107;&#114;'),
(47,'Djiboutian franc','&#070;&#100;&#106;'),
(48,'Dominican peso','&#082;&#068;&#036;'),
(49,'Egyptian pound','EGP'),
(50,'Salvadoran colón','&#036;'),
(51,'Eritrean nakfa','Nfk'),
(52,'Ethiopian birr','&#066;&#114;'),
(53,'Falkland Islands pound','&#163;'),
(54,'Fijian dollar','&#036;'),
(55,'CFP franc','&#070;'),
(56,'Gambian dalasi','&#068;'),
(57,'Georgian lari','&#4314;'),
(58,'Ghanian cedi','&#162;'),
(59,'Gibraltar pound','&#163;'),
(60,'Guatemalan quetzal','&#081;'),
(61,'British pound','&#163;'),
(62,'Guinean franc','&#070;&#071;'),
(63,'Guyanese dollar','&#036;'),
(64,'Haitian gourde','&#071;'),
(65,'Honduran lempira','&#076;'),
(66,'Hong Kong dollar','&#036;'),
(67,'Hungarian forint','&#070;&#116;'),
(68,'Icelandic króna','&#107;&#114;'),
(69,'Indian rupee','&#8377;'),
(70,'Indonesian rupiah','&#082;&#112;'),
(71,'Iranian rial','&#65020;'),
(72,'Iraqi dinar','&#1593;.&#1583;'),
(73,'Israeli new sheqel','&#8362;'),
(74,'Jamaican dollar','&#074;&#036;'),
(75,'Japanese yen ','&#165;'),
(76,'Jordanian dinar','&#074;&#068;'),
(77,'Kazakhstani tenge','&#1083;&#1074;'),
(78,'Kenyan shilling','&#075;&#083;&#104;'),
(79,'North Korean won','&#8361;'),
(80,'Kuwaiti dinar','&#1583;.&#1603;'),
(81,'Kyrgyzstani som','&#1083;&#1074;'),
(82,'South Korean won','&#8361;'),
(83,'Lao kip','&#8365;'),
(84,'Latvian lats','&#076;&#115;'),
(85,'Lebanese pound','&#163;'),
(86,'Lesotho loti','&#076;'),
(87,'Liberian dollar','&#036;'),
(88,'Libyan dinar','?.?'),
(89,'Swiss franc','&#067;&#072;&#070;'),
(90,'Lithuanian litas','&#076;&#116;'),
(91,'Macanese pataca','&#077;&#079;&#080;&#036;'),
(92,'Macedonian denar','&#1076;&#1077;&#1085;'),
(93,'Malagasy ariary','&#065;&#114;'),
(94,'Malawian kwacha','&#077;&#075;'),
(95,'Malaysian ringgit','&#082;&#077;'),
(96,'Maldivian rufiyaa','.&#1923;'),
(97,'Mauritanian ouguiya','&#085;&#077;'),
(98,'Mauritian rupee','&#8360;'),
(99,'Mexican peso','&#036;'),
(100,'Moldovan leu','&#076;'),
(101,'Mongolian tugrik','&#8366;'),
(102,'Moroccan dirham','&#1583;.&#1605;.'),
(103,'Mozambican metical','&#077;&#084;'),
(104,'Namibian dollar','&#036;'),
(105,'Nepalese rupee','&#8360;'),
(106,'Nicaraguan córdoba','&#067;&#036;'),
(107,'Nigerian naira','&#8358;'),
(108,'Norwegian krone','&#107;&#114;'),
(109,'Omani rial','&#65020;'),
(110,'Pakistani rupee','&#8360;'),
(111,'Panamanian balboa','&#066;&#047;&#046;'),
(112,'Papua New Guinea kina','&#075;'),
(113,'Paraguayan guarani','&#071;&#115;'),
(114,'Peruvian nuevo sol','&#083;&#047;&#046;'),
(115,'Philippine peso','&#8369;'),
(116,'Polish zloty','&#122;&#322;'),
(117,'Qatari riyal','&#65020;'),
(118,'Romanian leu','&#108;&#101;&#105;'),
(119,'Russian ruble','&#1088;&#1091;&#1073;'),
(120,'Rwandan franc','&#1585;.&#1587;'),
(121,'Samoan t?l?','&#087;&#083;&#036;'),
(122,'São Tomé and Príncipe dobra','&#068;&#098;'),
(123,'Saudi riyal','&#65020;'),
(124,'Serbian dinar','&#1044;&#1080;&#1085;&#046;'),
(125,'Seychellois rupee','&#8360;'),
(126,'Sierra Leonean leone','&#076;&#101;'),
(127,'Singapore dollar','S&#036;'),
(128,'Solomon Islands dollar','&#036;'),
(129,'Somali shilling','&#083;'),
(130,'South African rand','&#082;'),
(131,'Sri Lankan rupee','&#8360;'),
(132,'St. Helena pound','&#163;'),
(133,'Sudanese pound','&#163;'),
(134,'Surinamese dollar','&#036;'),
(135,'Swazi lilangeni','&#076;'),
(136,'Swedish krona','&#107;&#114;'),
(137,'Syrian pound','&#163;'),
(138,'New Taiwan dollar','&#078;&#084;&#036;'),
(139,'Tajikistani somoni','&#084;&#074;&#083;'),
(140,'Tanzanian shilling','Sh'),
(141,'Thai baht ','&#3647;'),
(142,'Tongan pa’anga','&#084;&#036;'),
(143,'Trinidad and Tobago dollar','&#036;'),
(144,'Tunisian dinar','&#1583;.&#1578;'),
(145,'Turkish lira','&#x20BA;'),
(146,'Turkmenistani manat','&#109;'),
(147,'Ugandan shilling','&#085;&#083;&#104;'),
(148,'Ukrainian hryvnia','&#8372;'),
(149,'United Arab Emirates dirham','&#1583;.&#1573;'),
(150,'Uruguayan peso','&#036;&#085;'),
(151,'Uzbekistani som','&#1083;&#1074;'),
(152,'Vanuatu vatu','&#086;&#084;'),
(153,'Venezuelan bolivar','&#066;&#115;'),
(154,'Vietnamese dong','&#8363;'),
(155,'Yemeni rial','&#65020;'),
(156,'Zambian kwacha','&#090;&#075;'),
(157,'Zimbabwean dollar','&#090;&#036;'),
(158,'Jersey pound','&#163;'),
(159,'Libyan dinar','&#1604;.&#1583;');

/*Table structure for table `currency_converter_settings` */

DROP TABLE IF EXISTS `currency_converter_settings`;

CREATE TABLE `currency_converter_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enable` int(10) NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `currency_converter_settings` */

insert  into `currency_converter_settings`(`id`,`enable`,`api_key`,`main_currency`,`server`) values 
(1,0,'','','');

/*Table structure for table `delivery_times` */

DROP TABLE IF EXISTS `delivery_times`;

CREATE TABLE `delivery_times` (
  `delivery_id` int(10) NOT NULL AUTO_INCREMENT,
  `delivery_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_proposal_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `delivery_times` */

insert  into `delivery_times`(`delivery_id`,`delivery_title`,`delivery_proposal_title`) values 
(1,'Up to 24 hours','1 Day'),
(2,'Up to 2 Days','2 Days'),
(3,'Up to 3 Days','3 Days'),
(4,'Up to 4 Days','4 Days'),
(5,'Up to 7 Days','7 Days'),
(6,'Up to 15 Days','15 Days'),
(7,'Up to 30 Days','30 Days');

/*Table structure for table `dusupay_orders` */

DROP TABLE IF EXISTS `dusupay_orders`;

CREATE TABLE `dusupay_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `content_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_id` int(10) NOT NULL,
  `revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minutes` int(10) NOT NULL,
  `extras` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dusupay_orders` */

/*Table structure for table `enquiry_types` */

DROP TABLE IF EXISTS `enquiry_types`;

CREATE TABLE `enquiry_types` (
  `enquiry_id` int(10) NOT NULL AUTO_INCREMENT,
  `enquiry_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `enquiry_types` */

insert  into `enquiry_types`(`enquiry_id`,`enquiry_title`) values 
(1,'Order Support '),
(2,'Review Removal '),
(3,'Account Support'),
(4,'Report A Bug \r\n');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,1) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `expenses` */

/*Table structure for table `favorites` */

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `favourite_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  PRIMARY KEY (`favourite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `favorites` */

/*Table structure for table `featured_proposals` */

DROP TABLE IF EXISTS `featured_proposals`;

CREATE TABLE `featured_proposals` (
  `featured_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `end_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`featured_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `featured_proposals` */

/*Table structure for table `follow_following_unfllow` */

DROP TABLE IF EXISTS `follow_following_unfllow`;

CREATE TABLE `follow_following_unfllow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` varchar(250) DEFAULT NULL,
  `followed_id` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `follow_following_unfllow` */

insert  into `follow_following_unfllow`(`id`,`follower_id`,`followed_id`,`status`) values 
(23,'2','3','active'),
(24,'3','2','active');

/*Table structure for table `footer_links` */

DROP TABLE IF EXISTS `footer_links`;

CREATE TABLE `footer_links` (
  `link_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `footer_links` */

insert  into `footer_links`(`link_id`,`language_id`,`icon_class`,`link_title`,`link_url`,`link_section`) values 
(1,1,'','Graphics &amp; Design','/categories/graphics-design','categories'),
(2,1,'','Digital Marketing','/categories/digital-marketing','categories'),
(3,1,'','Writing & Translation\r\n','/categories/writing-translation','categories'),
(4,1,'','Video & Animation\r\n','/categories/video-animation','categories'),
(5,1,'','Music & Audio\r\n','/categories/music-audio','categories'),
(6,1,'','Programming & Tech\r\n','/categories/programming-tech','categories'),
(7,1,'','Business\r\n','/categories/business','categories'),
(8,1,'','Fun & Lifestyle\r\n','/categories/fun-lifestyle','categories'),
(10,1,'fa-google-plus-official','fa-google-plus-official','#','follow'),
(11,1,'fa-twitter','','#','follow'),
(12,1,'fa-facebook','','#','follow'),
(13,1,'fa-linkedin','','#','follow'),
(14,1,'fa-pinterest','','#','follow'),
(15,1,'fa fa-life-ring','Customer Support','/customer_support','about'),
(16,1,'fa-question-circle','How It Works','/how-it-works','about'),
(17,1,'fa-book','Knowledge Bank','/knowledge_bank/','about'),
(18,1,'fa-rss','Blog','/blog/','about'),
(19,1,'fa fa-comments-o','Feedback','/feedback/','about');

/*Table structure for table `general_settings` */

DROP TABLE IF EXISTS `general_settings`;

CREATE TABLE `general_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `site_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_www` int(10) NOT NULL,
  `site_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_mobile_logo` int(10) NOT NULL,
  `site_mobile_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_favicon_s3` int(10) NOT NULL,
  `site_logo_image_s3` int(10) NOT NULL,
  `site_mobile_logo_s3` int(10) NOT NULL,
  `site_logo_s3` int(10) NOT NULL,
  `site_watermark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_hover_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_border_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_switcher` int(10) NOT NULL,
  `enable_google_translate` int(10) NOT NULL,
  `tinymce_api_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recaptcha_site_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recaptcha_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_app_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apple_app_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_social_login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_app_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_app_secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_client_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_client_secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jwplayer_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_one_rating` int(10) NOT NULL,
  `level_one_orders` int(10) NOT NULL,
  `level_two_rating` int(10) NOT NULL,
  `level_two_orders` int(10) NOT NULL,
  `level_top_rating` int(10) NOT NULL,
  `level_top_orders` int(10) NOT NULL,
  `approve_proposals` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_proposals` int(10) NOT NULL,
  `disable_local_video` int(10) NOT NULL,
  `proposal_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisions_list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_unlimited_revisions` int(10) NOT NULL,
  `signup_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `relevant_requests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_referrals` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `knowledge_bank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral_money` int(10) NOT NULL,
  `site_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_format` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_maintenance_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make_phone_number_required` int(10) NOT NULL,
  `order_auto_complete` int(10) NOT NULL,
  `wish_do_manual_payouts` int(10) NOT NULL,
  `payouts_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payouts_anyday` int(10) NOT NULL,
  `enable_websocket` int(10) NOT NULL,
  `websocket_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileApp_apiKey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `general_settings` */

insert  into `general_settings`(`id`,`site_title`,`site_www`,`site_name`,`site_favicon`,`site_logo_type`,`site_logo_text`,`site_logo_image`,`enable_mobile_logo`,`site_mobile_logo`,`site_logo`,`site_favicon_s3`,`site_logo_image_s3`,`site_mobile_logo_s3`,`site_logo_s3`,`site_watermark`,`google_analytics`,`site_color`,`site_hover_color`,`site_border_color`,`site_desc`,`site_keywords`,`site_author`,`site_url`,`site_email_address`,`site_copyright`,`site_timezone`,`language_switcher`,`enable_google_translate`,`tinymce_api_key`,`recaptcha_site_key`,`recaptcha_secret_key`,`google_app_link`,`apple_app_link`,`enable_social_login`,`fb_app_id`,`fb_app_secret`,`g_client_id`,`g_client_secret`,`jwplayer_code`,`level_one_rating`,`level_one_orders`,`level_two_rating`,`level_two_orders`,`level_top_rating`,`level_top_orders`,`approve_proposals`,`edited_proposals`,`disable_local_video`,`proposal_email`,`revisions_list`,`enable_unlimited_revisions`,`signup_email`,`relevant_requests`,`enable_referrals`,`knowledge_bank`,`referral_money`,`site_currency`,`currency_position`,`currency_format`,`enable_maintenance_mode`,`make_phone_number_required`,`order_auto_complete`,`wish_do_manual_payouts`,`payouts_date`,`payouts_anyday`,`enable_websocket`,`websocket_address`,`mobileApp_apiKey`) values 
(1,'hiremyprofile.com',1,'Hiremyprofile','fevicon Image 2022-07-10 at 7.13.34 PM.png','image','','WhatsApp Image 2022-06-24 at 5.42.20 PM.jpeg',1,'WhatsApp Image 2022-07-10 at 7.13.34 PM.jpeg','WhatsApp Image 2022-07-10 at 7.13.34 PM.jpeg',0,0,0,0,'water mark 2022-07-10 at 7.13.34 PM copy.jpeg','','#00cedc','#00cedc','#00cedc','Hire my profile is a freelance market place, here you can Post  Free Projects &amp; Hire Top Freelancers. Here you can get  Professional support even after your work is done.','..','..','http://localhost/hmp_final/hiremyprofile','info@hiremyprofile.com','© 2022- Preferred Outsourcing Pvt. Ltd','America/Chicago',0,0,'','','','','','no','','','','','',85,10,95,25,1,1,'yes',0,0,'yes','',0,'yes','yes','yes','yes',1,'22','left','us','no',0,2,1,'',0,0,'','');

/*Table structure for table `hide_seller_messages` */

DROP TABLE IF EXISTS `hide_seller_messages`;

CREATE TABLE `hide_seller_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hider_id` int(10) NOT NULL,
  `hide_seller_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hide_seller_messages` */

/*Table structure for table `home_cards` */

DROP TABLE IF EXISTS `home_cards`;

CREATE TABLE `home_cards` (
  `card_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `card_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_cards` */

insert  into `home_cards`(`card_id`,`language_id`,`card_title`,`card_desc`,`card_link`,`card_image`,`isS3`) values 
(1,1,'Logo Design','Build Your Brand','https://www.hiremyprofile.com//categories/graphics-design/logo-design','1.jpg',0),
(2,1,'Social Media','Reach More Customers','https://www.hiremyprofile.com//categories/digital-marketing/social-media-marketing','2.jpg',0),
(3,1,'Video-animation','The Perfect Video-animation','https://www.hiremyprofile.com//categories/video-animation','7.jpg',0),
(4,1,'Translation','Go Global.','https://www.hiremyprofile.com//categories/writing-translation/translation','4.jpg',0),
(5,1,'Illustration','Color Your Dreams','https://www.hiremyprofile.com//categories/graphics-design/illustration','5.jpg',0),
(6,1,'Photoshop Expert','Hire A Designer','https://www.hiremyprofile.com//categories/graphics-design/photoshop-editing','6.jpg',0);

/*Table structure for table `home_section` */

DROP TABLE IF EXISTS `home_section`;

CREATE TABLE `home_section` (
  `section_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `section_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_short_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_section` */

insert  into `home_section`(`section_id`,`language_id`,`section_heading`,`section_short_heading`) values 
(1,1,'','');

/*Table structure for table `home_section_5` */

DROP TABLE IF EXISTS `home_section_5`;

CREATE TABLE `home_section_5` (
  `section_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `section_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_short_heading` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_section_5` */

insert  into `home_section_5`(`section_id`,`language_id`,`section_heading`,`section_short_heading`,`video_url`) values 
(1,1,'A whole world of freelance talent at your fingertips','&lt;ul&gt;\r\n	&lt;li&gt;The best for every budget Find high-quality services at every price point. No hourly rates, just project-based pricing.&lt;/li&gt;\r\n	&lt;li&gt;Quality work done quickly Find the right freelancer to begin working on your project within minutes.&lt;/li&gt;\r\n	&lt;li&gt;Protected payments, every time Always know what you&amp;#39;ll pay upfront. Your payment isn&amp;#39;t released until you approve the work.&lt;/li&gt;\r\n	&lt;li&gt;24/7 support Questions? Our round-the-clock support team is available to help anytime, anywhere.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n','https://www.youtube.com/embed/9xwazD5SyVg');

/*Table structure for table `home_section_slider` */

DROP TABLE IF EXISTS `home_section_slider`;

CREATE TABLE `home_section_slider` (
  `slide_id` int(100) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_section_slider` */

insert  into `home_section_slider`(`slide_id`,`slide_name`,`slide_image`,`isS3`) values 
(1,'Slide 1','main.png',0),
(2,'Slide 2','1.png',0),
(3,'Slide 3','2.jpg',0),
(4,'Slide 4','3.jpg',0);

/*Table structure for table `ideas` */

DROP TABLE IF EXISTS `ideas`;

CREATE TABLE `ideas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `seller_id` int(100) NOT NULL,
  `votes` int(100) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ideas` */

insert  into `ideas`(`id`,`seller_id`,`votes`,`title`,`content`,`date`) values 
(8,3,0,'this is test for post idea','test idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea posttest idea post','17 August 2022, 09:24 AM');

/*Table structure for table `inbox_messages` */

DROP TABLE IF EXISTS `inbox_messages`;

CREATE TABLE `inbox_messages` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `message_group_id` int(10) NOT NULL,
  `message_sender` int(10) NOT NULL,
  `message_receiver` int(10) NOT NULL,
  `message_offer_id` int(10) NOT NULL,
  `message_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAgo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inbox_messages` */

insert  into `inbox_messages`(`message_id`,`message_group_id`,`message_sender`,`message_receiver`,`message_offer_id`,`message_desc`,`message_file`,`message_date`,`dateAgo`,`bell`,`message_status`,`isS3`) values 
(1,697425537,3,2,0,'\nhi there\n','','11:24: July 03, 2022','2022-07-03 11:24:28','over','read',0),
(2,697425537,3,2,0,'\nyou there?\n','','11:29: July 03, 2022','2022-07-03 11:29:30','over','read',0),
(3,697425537,2,3,0,'\nHi\n','','11:29: July 03, 2022','2022-07-03 11:29:39','over','read',0),
(4,697425537,3,2,0,'\nyes\n','','11:29: July 03, 2022','2022-07-03 11:29:53','over','read',0),
(5,697425537,3,2,0,'\ntell me\n','','11:30: July 03, 2022','2022-07-03 11:30:01','over','read',0),
(6,697425537,2,3,0,'\nI am good\n','','11:30: July 03, 2022','2022-07-03 11:30:08','over','read',0),
(7,697425537,2,3,0,'\nhi\n','','11:30: July 03, 2022','2022-07-03 11:30:20','over','read',0),
(8,697425537,3,2,0,'\ndo you know wordpress?\n','','11:30: July 03, 2022','2022-07-03 11:30:41','over','read',0),
(9,697425537,2,3,0,'\nyes\n','','11:30: July 03, 2022','2022-07-03 11:30:52','over','read',0),
(10,697425537,2,3,1,'','','11:37: July 03, 2022','2022-07-03 11:37:01','over','read',0),
(11,697425537,3,2,0,'\nsir please check\n','','11:56: July 03, 2022','2022-07-03 11:56:32','over','read',0),
(12,697425537,2,3,0,'\nwhat \n','','11:57: July 03, 2022','2022-07-03 11:57:04','over','read',0),
(13,697425537,3,2,0,'\noffer sir\n','','11:57: July 03, 2022','2022-07-03 11:57:32','over','read',0),
(14,697425537,3,2,0,'\nok\n','','11:57: July 03, 2022','2022-07-03 11:57:56','over','read',0),
(15,697425537,3,2,0,'\nsure\n','','11:57: July 03, 2022','2022-07-03 11:57:59','over','read',0),
(16,697425537,2,3,0,'\nI don\'t want to buy\n','','11:58: July 03, 2022','2022-07-03 11:58:45','over','read',0),
(17,697425537,2,3,0,'\nreport maaro isko bhai\n','','12:05: July 03, 2022','2022-07-03 12:05:10','over','read',0),
(18,697425537,2,3,0,'\nya scammer hai\n','','12:05: July 03, 2022','2022-07-03 12:05:13','over','read',0),
(19,697425537,2,3,0,'\n...\n','','12:06: July 03, 2022','2022-07-03 12:06:40','over','read',0),
(20,697425537,2,3,0,'\nwho are you?\n','','12:14: July 03, 2022','2022-07-03 12:14:19','over','read',0),
(21,697425537,2,3,0,'\nthere?\n','','12:24: July 03, 2022','2022-07-03 12:24:32','over','read',0),
(22,697425537,2,3,0,'\nyeh kisne likha hai&nbsp;\n','','12:24: July 03, 2022','2022-07-03 12:24:46','over','read',0),
(23,697425537,2,3,0,'\nhi\n','','12:17: July 04, 2022','2022-07-04 12:17:35','over','read',0),
(24,697425537,3,2,0,'\nyes\n','','12:17: July 04, 2022','2022-07-04 12:17:59','over','read',0),
(25,697425537,3,2,0,'\nthe is the \n','D5F2A628-3CF2-410A-A6EA-59BB7ABC8F4E_1656985493.png','08:45: July 04, 2022','2022-07-04 20:45:04','over','read',0),
(26,697425537,3,2,2,'','28368085-6CFE-481A-8DDB-E2F240C5B3D7.jpeg','08:46: July 04, 2022','2022-07-04 20:46:33','over','read',0),
(27,1633735556,5,2,0,'\nhi there\n','','09:37: July 04, 2022','2022-07-04 21:37:50','over','read',0),
(28,697425537,2,3,0,'\n123456 \n','gettyimages-946150830-1024x1024_1657091626.jpg','02:13: July 06, 2022','2022-07-06 02:13:57','over','read',0),
(29,1633735556,2,5,0,'\n1234\n','','02:14: July 06, 2022','2022-07-06 02:14:59','active','unread',0),
(30,697425537,2,3,0,'\n14561456\n','','02:15: July 06, 2022','2022-07-06 02:15:15','over','read',0);

/*Table structure for table `inbox_sellers` */

DROP TABLE IF EXISTS `inbox_sellers`;

CREATE TABLE `inbox_sellers` (
  `inbox_seller_id` int(10) NOT NULL AUTO_INCREMENT,
  `message_group_id` int(10) NOT NULL,
  `message_id` int(10) NOT NULL,
  `offer_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `popup` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `message_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`inbox_seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inbox_sellers` */

insert  into `inbox_sellers`(`inbox_seller_id`,`message_group_id`,`message_id`,`offer_id`,`sender_id`,`receiver_id`,`popup`,`time`,`message_status`) values 
(1,697425537,30,0,2,3,0,1657091715,'read'),
(2,1765887475,0,0,2,2,0,0,'empty'),
(3,1633735556,29,0,2,5,1,1657091699,'unread'),
(4,996902520,0,0,6,2,0,0,'empty');

/*Table structure for table `instant_deliveries` */

DROP TABLE IF EXISTS `instant_deliveries`;

CREATE TABLE `instant_deliveries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `enable` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` int(10) NOT NULL,
  `watermark_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `instant_deliveries` */

insert  into `instant_deliveries`(`id`,`proposal_id`,`enable`,`message`,`watermark`,`watermark_file`,`file`,`isS3`) values 
(164,1,0,'',0,'','',0),
(165,2,0,'',0,'','',0),
(166,3,0,'',0,'','',0),
(167,4,0,'',0,'','',0),
(168,5,0,'',0,'','',0),
(169,6,0,'',0,'','',0),
(170,7,0,'jkhksadkakhdkjhadkjhasd',0,'','',0),
(171,8,0,'',0,'','',0);

/*Table structure for table `instructions` */

DROP TABLE IF EXISTS `instructions`;

CREATE TABLE `instructions` (
  `instruction_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `instruction_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_for` int(10) NOT NULL,
  `instruction_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`instruction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `instructions` */

insert  into `instructions`(`instruction_id`,`language_id`,`instruction_title`,`instruction_desc`,`instruction_for`,`instruction_icon`,`instruction_color_code`) values 
(7,1,'Find a service that you need','Compare prices, portfolios, delivery time, ratings and community recommendations in order to find a seller that best suits your needs. If you have a specific question, simply send them an enquiry. You can also post a request.',1,'fa-search','text-primary'),
(8,1,'Submit your details','Be as detailed as possible so the seller can provide you with the quality service that you are expecting. Your payment is held secure until you confirm that the service is performed to your satisfaction.',1,'fa-file-text-o','text-warning'),
(9,1,'Follow up the transaction','Exchange files and feedback with the seller via the built-in conversation and transaction management system. The seller will deliver service within a specified time frame.',1,'fa-comments-o','text-danger'),
(10,1,'Proposal/Service Delivered','Once you are happy with the service performed &amp; delivered, you can mark the transaction complete, and we\'ll make sure that the seller gets paid. Help the community by leaving a feedback for the seller.',1,'fa-check-square-o','text-green1'),
(11,1,'Request For Modification','If for some reason you are not satisfied with the work delivered. you can go ahead and request for modification, and your seller will',1,'fa-refresh','text-purple'),
(12,1,'Rate Your Seller','Once completed, please rate and provide feedback about your seller. This will help inform the decisions of other buyers looking',1,'fa-star','text-nacho-cheese'),
(13,1,'Find a service that you need','Compare prices, portfolios, delivery time, ratings and community recommendations in order to find a seller that best suits your needs. If you have a specific question, simply send them an enquiry. You can also post a request.',2,'fa-search','text-primary'),
(14,1,'Submit your details','Be as detailed as possible so the seller can provide you with the quality service that you are expecting. Your payment is held secure until you confirm that the service is performed to your satisfaction.',2,'fa-file-text-o','text-warning'),
(15,1,'Follow up the transaction','Exchange files and feedback with the seller via the built-in conversation and transaction management system. The seller will deliver service within a specified time frame.',2,'fa-comments-o','text-danger'),
(16,1,'Proposal/Service Delivered','Once you are happy with the service performed &amp; delivered, you can mark the transaction complete, and we\'ll make sure that the seller gets paid. Help the community by leaving a feedback for the seller.',2,'fa-check-square-o','text-green1'),
(17,1,'Request For Modification','If for some reason you are not satisfied with the work delivered. you can go ahead and request for modification, and your seller will',2,'fa-refresh','text-purple'),
(18,1,'Rate Your Seller','Once completed, please rate and provide feedback about your seller. This will help inform the decisions of other buyers looking',2,'fa-star','text-nacho-cheese');

/*Table structure for table `knowledge_bank` */

DROP TABLE IF EXISTS `knowledge_bank`;

CREATE TABLE `knowledge_bank` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `article_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_image_s3` int(10) NOT NULL,
  `top_image_s3` int(10) NOT NULL,
  `bottom_image_s3` int(10) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `knowledge_bank` */

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_lang` int(10) NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `languages` */

insert  into `languages`(`id`,`title`,`image`,`default_lang`,`direction`,`template_folder`,`isS3`) values 
(1,'English','english.png',1,'left','en',0),
(2,'Spanish','WhatsApp Image 2022-06-24 at 1.52.30 PM (1).jpeg',0,'','sp',0);

/*Table structure for table `languages_relation` */

DROP TABLE IF EXISTS `languages_relation`;

CREATE TABLE `languages_relation` (
  `relation_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `language_id` int(11) NOT NULL,
  `language_level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `languages_relation` */

insert  into `languages_relation`(`relation_id`,`seller_id`,`language_id`,`language_level`) values 
(1,3,1,'conversational'),
(2,5,1,'basic'),
(3,5,2,'Fluent');

/*Table structure for table `memb_plan_detail` */

DROP TABLE IF EXISTS `memb_plan_detail`;

CREATE TABLE `memb_plan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT NULL,
  `memb_tbl_id` varchar(255) DEFAULT NULL,
  `memb_start_date` varchar(255) DEFAULT NULL,
  `memb_end_date` varchar(255) DEFAULT NULL,
  `memb_pyment_status` varchar(255) DEFAULT NULL,
  `memb_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `memb_plan_detail` */

insert  into `memb_plan_detail`(`id`,`seller_id`,`memb_tbl_id`,`memb_start_date`,`memb_end_date`,`memb_pyment_status`,`memb_status`) values 
(3,3,'1','September 26, 2022, 06:34:40pm','October 26, 2022, 06:34:40pm','received','active');

/*Table structure for table `membership_table` */

DROP TABLE IF EXISTS `membership_table`;

CREATE TABLE `membership_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(255) DEFAULT NULL,
  `create_active_service` varchar(255) DEFAULT NULL,
  `bids_per_month` varchar(255) DEFAULT NULL,
  `skills` int(11) DEFAULT NULL,
  `client_engagement` varchar(255) DEFAULT NULL,
  `daily_withdrawal_req` varchar(255) DEFAULT NULL,
  `employer_follow` varchar(255) DEFAULT NULL,
  `percentage_per_project` double DEFAULT NULL,
  `get_recom` varchar(255) DEFAULT NULL,
  `create_portfolio` varchar(255) DEFAULT NULL,
  `custome_desc` varchar(255) DEFAULT NULL,
  `referrals` varchar(255) DEFAULT NULL,
  `project_bookmark` varchar(255) DEFAULT NULL,
  `custom_cover_photo` varchar(255) DEFAULT NULL,
  `create_offer_coupon` varchar(255) DEFAULT NULL,
  `free_highlight_bids` varchar(255) DEFAULT NULL,
  `hide_project_others` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `plan_price_month` double DEFAULT NULL,
  `plan_discount_month` double DEFAULT NULL,
  `plan_price_annuel` double DEFAULT NULL,
  `plan_discount_annuel` double DEFAULT NULL,
  `plan_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `membership_table` */

insert  into `membership_table`(`id`,`plan_name`,`create_active_service`,`bids_per_month`,`skills`,`client_engagement`,`daily_withdrawal_req`,`employer_follow`,`percentage_per_project`,`get_recom`,`create_portfolio`,`custome_desc`,`referrals`,`project_bookmark`,`custom_cover_photo`,`create_offer_coupon`,`free_highlight_bids`,`hide_project_others`,`account_type`,`plan_price_month`,`plan_discount_month`,`plan_price_annuel`,`plan_discount_annuel`,`plan_status`) values 
(1,'Starter','1','20',20,'Yes','Yes','Yes',10,'Yes','Upto 5','Yes','Yes','No','No','No','No','No','No',0,0,0,0,'active'),
(2,'Basic One Month Trail','5','150',50,'Yes','Yes','Yes',9.5,'Yes','Upto 10','Yes','Yes','20','Yes','Yes','5','25','No',8.99,0,96.99,0,'active'),
(3,'Professional','10','500',200,'Yes','Yes','Yes',9,'Yes','Upto 10','Yes','Yes','50','Yes','Yes','20','75','No',12.99,0,150,0,'active'),
(4,'Premium','20','1500',400,'Yes','Yes','Yes',8,'Yes','Unlimited','Yes','Yes','Unlimited','Use Business Logo','Yes','50','Unlimited','Yes',20,0,200,0,'active');

/*Table structure for table `messages_offers` */

DROP TABLE IF EXISTS `messages_offers`;

CREATE TABLE `messages_offers` (
  `offer_id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages_offers` */

insert  into `messages_offers`(`offer_id`,`sender_id`,`proposal_id`,`order_id`,`description`,`delivery_time`,`amount`,`status`) values 
(1,2,1,2,'I will install wordpress theme','5 Days','25','accepted'),
(2,3,4,3,'Test','1 Day','56','accepted');

/*Table structure for table `my_buyers` */

DROP TABLE IF EXISTS `my_buyers`;

CREATE TABLE `my_buyers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `completed_orders` int(10) NOT NULL,
  `amount_spent` int(10) NOT NULL,
  `last_order_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `my_buyers` */

insert  into `my_buyers`(`id`,`seller_id`,`buyer_id`,`completed_orders`,`amount_spent`,`last_order_date`) values 
(1,2,3,4,50,'September 05, 2022'),
(2,3,2,3,76,'September 05, 2022');

/*Table structure for table `my_sellers` */

DROP TABLE IF EXISTS `my_sellers`;

CREATE TABLE `my_sellers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `completed_orders` int(10) NOT NULL,
  `amount_spent` int(10) NOT NULL,
  `last_order_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `my_sellers` */

insert  into `my_sellers`(`id`,`buyer_id`,`seller_id`,`completed_orders`,`amount_spent`,`last_order_date`) values 
(1,3,2,4,50,'September 05, 2022'),
(2,2,3,3,76,'September 05, 2022');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notification_id` int(10) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(10) NOT NULL,
  `sender_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcm_notification_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`notification_id`,`receiver_id`,`sender_id`,`order_id`,`reason`,`date`,`bell`,`status`,`fcm_notification_status`) values 
(1,2,'admin_1',1,'approved','July 03, 2022','over','read',NULL),
(2,3,'admin_1',1,'approved_request','July 04, 2022','over','read',NULL),
(3,2,'3',1,'order','July 04, 2022','over','read',NULL),
(4,3,'2',1,'cancellation_request','July 04, 2022','over','unread',NULL),
(5,2,'3',1,'order_message','12:14: July 04, 2022','over','unread',NULL),
(6,2,'3',1,'decline_cancellation_request','July 04, 2022','over','read',NULL),
(7,3,'2',1,'order_message','12:15: July 04, 2022','over','read',NULL),
(8,3,'2',1,'order_delivered','July 04, 2022','over','unread',NULL),
(9,2,'3',1,'order_revision','July 04, 2022','over','read',NULL),
(10,2,'3',2,'order','July 04, 2022','over','read',NULL),
(11,2,'3',2,'order_message','12:20: July 04, 2022','over','read',NULL),
(12,3,'2',1,'order_delivered','July 04, 2022','over','read',NULL),
(13,2,'3',1,'order_completed','July 04, 2022','over','read',NULL),
(14,3,'2',1,'seller_order_review','July 04, 2022','over','read',NULL),
(15,2,'3',1,'buyer_order_review','July 04, 2022','over','read',NULL),
(16,3,'admin_1',4,'approved','July 05, 2022','over','unread',NULL),
(17,3,'2',3,'order','July 05, 2022','over','unread',NULL),
(18,3,'2',4,'order','July 05, 2022','over','read',NULL),
(19,5,'admin_1',5,'approved','July 05, 2022','over','unread',NULL),
(20,2,'admin_1',6,'approved','July 05, 2022','over','read',NULL),
(21,3,'admin_1',2,'approved_request','July 06, 2022','over','unread',NULL),
(22,3,'2',2,'offer','July 06, 2022','over','read',NULL),
(23,3,'admin_1',4,'approved_request','July 14, 2022','over','unread',NULL),
(24,3,'2',4,'offer','July 13, 2022','over','read',NULL),
(25,3,'admin_1',5,'approved_request','July 14, 2022','over','unread',NULL),
(26,2,'admin_1',7,'approved','July 14, 2022','over','read',NULL),
(27,2,'3',5,'order','August 12, 2022','over','read',NULL),
(28,3,'2',6,'order','September 05, 2022','over','read',NULL),
(29,3,'2',6,'order_message','12:40: September 05, 2022','over','unread',NULL),
(30,2,'3',6,'order_delivered','September 05, 2022','over','read',NULL),
(31,2,'3',7,'order','September 05, 2022','over','read',NULL),
(32,3,'2',6,'order_completed','September 05, 2022','active','read',NULL),
(33,2,'3',6,'seller_order_review','September 05, 2022','over','read',NULL),
(34,3,'2',6,'buyer_order_review','September 05, 2022','over','unread',NULL),
(35,3,'2',6,'order_tip','September 05, 2022','over','read',NULL),
(36,2,'admin_1',3,'approved','September 05, 2022','over','unread',NULL),
(37,3,'admin_1',8,'approved','September 26, 2022','over','unread',NULL),
(38,2,'admin_1',6,'approved_request','September 26, 2022','over','read',NULL),
(39,3,'admin_1',3,'approved_request','September 26, 2022','over','unread',NULL),
(40,3,'2',5,'offer','September 27, 2022','over','unread',NULL),
(41,3,'2',5,'offer','September 27, 2022','over','unread',NULL),
(42,2,'3\r\n',0,'seller now following you','','active','read',NULL);

/*Table structure for table `order_conversations` */

DROP TABLE IF EXISTS `order_conversations`;

CREATE TABLE `order_conversations` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watermark` int(10) NOT NULL,
  `watermark_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_conversations` */

insert  into `order_conversations`(`c_id`,`order_id`,`sender_id`,`message`,`file`,`date`,`reason`,`status`,`watermark`,`watermark_file`,`isS3`) values 
(1,1,2,'I want to cancel','','12:14: Jul 04, 2022','Buyer requested that I cancel this order.','decline_cancellation_request',0,'',0),
(2,1,3,'fghjjhg jhgj gjh jhgh ','','12:14: July 04, 2022','','message',0,'',0),
(3,1,2,'heres your order','CORRECT QUIZ_1656954934.pdf','12:15: July 04, 2022','','message',0,'',0),
(4,1,2,'yes','','12:07: July 04 2022','','message',0,'',0),
(5,1,3,'jkghkjhkj kjhj jkh','','12:16: July 04, 2022','','revision',0,'',0),
(6,2,3,'done','','12:20: July 04, 2022','','message',0,'',0),
(7,1,2,',m.m','','12:07: July 04 2022','','message',0,'',0),
(8,6,2,'please start as discussed','','12:40: September 05, 2022','','message',0,'',0),
(9,6,3,'done','','02:09: September 05 2022','','message',0,'',0);

/*Table structure for table `order_extras` */

DROP TABLE IF EXISTS `order_extras`;

CREATE TABLE `order_extras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_extras` */

/*Table structure for table `order_tips` */

DROP TABLE IF EXISTS `order_tips`;

CREATE TABLE `order_tips` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_tips` */

insert  into `order_tips`(`id`,`order_id`,`amount`,`message`,`date`) values 
(10,6,5,'for good work','September 05, 2022');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_duration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_revisions_used` int(10) NOT NULL,
  `order_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` int(10) NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `order_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order_qty` int(10) NOT NULL,
  `order_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order_active` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`order_number`,`order_duration`,`order_time`,`order_date`,`order_revisions`,`order_revisions_used`,`order_description`,`seller_id`,`buyer_id`,`proposal_id`,`order_price`,`order_qty`,`order_fee`,`order_active`,`complete_time`,`order_status`) values 
(1,'1838561772','2 Days','Jul 06, 2022 17:13:46','July 04, 2022','3',1,'',2,3,1,'10',1,'0','no','Jul 06, 2022 12:21:41','completed'),
(2,'2021926091','5 Days','Jul 09, 2022 17:20:36','July 04, 2022','0',0,'',2,3,1,'25',1,'0','yes','','progress'),
(3,'253972912','1 Day','Jul 06, 2022 01:50:57','July 05, 2022','0',0,'',3,2,4,'56',1,'0','yes','','pending'),
(4,'1832953432','1 Day','Jul 06, 2022 02:01:46','July 05, 2022','0',0,'',3,2,4,'10',1,'0','yes','','pending'),
(5,'995704034','1 Day','Aug 13, 2022 04:08:19','August 12, 2022','2',0,'',2,3,1,'5',1,'0','yes','','pending'),
(6,'1951264286','1 Day','Sep 06, 2022 05:40:41','September 05, 2022','0',0,'',3,2,4,'10',1,'0','no','Sep 07, 2022 02:36:02','completed'),
(7,'1266447882','2 Days','Sep 07, 2022 07:41:46','September 05, 2022','3',0,'',2,3,1,'10',1,'0','yes','','pending');

/*Table structure for table `package_attributes` */

DROP TABLE IF EXISTS `package_attributes`;

CREATE TABLE `package_attributes` (
  `attribute_id` int(100) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(100) NOT NULL,
  `package_id` int(100) NOT NULL,
  `attribute_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `package_attributes` */

insert  into `package_attributes`(`attribute_id`,`proposal_id`,`package_id`,`attribute_name`,`attribute_value`) values 
(1,1,1,'Quick Delivery','N/A'),
(2,1,2,'Quick Delivery','N/A'),
(3,1,3,'Quick Delivery','Available');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`url`,`date`) values 
(10,'privacy-policy','July 29, 2022'),
(11,'copyright-trademark-infringement','July 29, 2022'),
(12,'terms-amp-conditions','July 29, 2022'),
(13,'refundandcancellationpolicy','August 18, 2022'),
(14,'feesandcharges','August 18, 2022');

/*Table structure for table `pages_meta` */

DROP TABLE IF EXISTS `pages_meta`;

CREATE TABLE `pages_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pages_meta` */

insert  into `pages_meta`(`id`,`page_id`,`language_id`,`title`,`content`) values 
(17,10,1,'Privacy Policy','\n<h2 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 13.5pt; font-weight: 700; white-space: pre-wrap;\">Our privacy obligations</span><br></h2><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Hire My Profile is governed by the Indian&nbsp; Privacy Principles&nbsp; under the Privacy Act. The (governing body)</span><span style=\"font-size:14.5pt;font-family:Roboto,sans-serif;color:#ff0000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">regulate how personal information is handled by Hiremyprofile.com</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">\'Personal information\' means information or an opinion about an identified individual, or an individual who is reasonably identifiable. Hire My Profile&nbsp; Privacy Policy applies to personal information collected and/or held by HMP..</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">This Privacy Policy also explains how we process \'personal data\' about people in the European Union (EU), as required under the General Data Protection Regulation (GDPR).</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We will review this policy regularly, and we may update it from time to time.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The types of personal information we collect and hold</span></h3><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We collect personal information about our users in order to provide our products, services, and customer support. Our products, services, and customer support are provided through many platforms including but not limited to: websites, phone apps, email, and telephone. The specific platform and product, service, or support you interact with may affect the personal data we collect.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Not all information requested, collected, and processed by us is \"Personal Information\" as it does not identify you as a specific natural person. This will include the majority of \"User Generated Content\" that you provide us with the intention of sharing with other users. Such \"Non-Personal Information\" is not covered by this privacy policy. However, as non-personal information may be used in aggregate or be linked with existing personal information; when in this form it will be treated as personal information. As such, this privacy policy will list both types of information for the sake of transparency.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In some situations users may provide us with personal information without us asking for it, or through means not intended for the collection of particular types of information. Whilst we may take reasonable steps to protect this data, the user will have bypassed our systems, processes, and control and thus the information provided will not be governed by this privacy policy.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In some situations users may provide us personal information over platforms that are outside our control; for example through social media or forums. Whilst any information collected by us is governed by this Privacy Policy, the platform by which it was communicated will be governed by its own Privacy Policy.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">How we collect personal information</span></h3><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Information that you specifically give us</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">While you use our products and services you may be asked to provide certain types of personal information. This might happen through our website, applications, online chat systems, telephone, paper forms, or in-person meetings. We will give you a Collection Notice at the time, to explain how we will use the personal information we are asking for. The notice may be written or verbal.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We may request, collect, or process the following information:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Account Details - username, password, profile picture.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Contact Details - email address, phone number.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Location Details - physical address, billing address, timezone.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Identity Details - full name, proof of identity (e.g. drivers license, passport), proof of address (e.g. utility bill), photograph of the user.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Financial Information - credit card details, wire transfer details, payment processor details (e.g. skrill, paypal), tax numbers.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">User Generated Content - project descriptions and attachments, bid description, user profiles, user reviews, contest descriptions and attachment, user messages etc.</span></p></li></ul><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Information that we collect from others</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Users can give permission for us to connect to their account on other platforms to collect personal information. This includes but is not limited to Facebook, LinkedIn, and Google. Information collected will be governed by this Privacy Policy. Users can stop us from collecting data from other platforms by removing our access on the other platform or by contacting our support team.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Users have the ability to invite non-users to our platform by providing contact details such as email address. In these situations, the information will be collected and stored by us to contact the non-user and to prevent abuse of the invite systems.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your payment provider may transmit information about the payment that we may collect or process.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In some situations, personal information of users may be collected from public sources.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We may collect or process the following information:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Basic Details - username, profile picture.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Contact Details - email address, phone number.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Location Details - Physical Address, billing address, timezone.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Financial Information - payment account details (e.g. paypal email address and physical address), and wire transfer details.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">List of contacts - email provider address book.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">User Generated Content - user profile.</span></p></li></ul><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Information we collect as you use our service</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We maintain records of the interactions we have with our users, including the products, services and customer support we have provided. This includes the interactions our users have with our platform such as when a user has viewed a page or clicked a button.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In order to deliver certain products or services we may passively collect your GPS coordinates, where available from your device. Most modern devices such as smartphones will display a permission request when our platform requests this data.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">When we are contacted we may collect personal information that is intrinsic to the communication. For example, if we are contacted via email, we will collect the email address used.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We may collect or process the following information:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Metadata - IP address, computer and connection information, referring web page, standard web log information, language settings, timezone, etc.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Device Information - device identifier, device type, device plugins, hardware capabilities, etc.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Location - GPS position.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Actions - pages viewed, buttons clicked, time spent viewing, search keywords, etc.</span></p></li></ul><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Links to other sites</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">On our website, you will encounter links to third party websites. These links may be from us, or they may appear as content generated by other users. These linked sites are not under our control and thus we are not responsible for their actions. Before providing your personal information via any other website, we advise you to examine the terms and conditions of using that website and its privacy policy.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">How we use personal information</span></h3><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The information we request, collect, and process is primarily used to provide users with the product or service they have requested. More specifically, we may use your personal information for the following purposes:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to provide the service or product you have requested;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to facilitate the creation of a User Contract (see Terms of Service for more information);</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to provide technical or other support to you;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to answer enquiries about our services, or to respond to a complaint;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to promote our other programs, products or services which may be of interest to you (unless you have opted out from such communications);</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to allow for debugging, testing and otherwise operate our platforms;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to conduct data analysis, research and otherwise build and improve our platforms;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">to comply with legal and regulatory obligations;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">if otherwise permitted or required by law; or</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">for other purposes with your consent, unless you withdraw your consent for these purposes.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The \'lawful processing\' grounds on which we will use personal information about our users are (but are not limited to):</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">when a user has given consent;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">when necessary for the performance of a contract to which the user is party;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">processing is necessary for compliance with our legal obligations;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">processing is necessary in order to protect the vital interests of our users or of another natural person.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">processing is done in pursuing our legitimate interests, where these interests do not infringe on the rights of our users.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We use automated decision when helping matching users to jobs. The primary way this occurs is through how we rank users. These rankings are produced by analyzing user generated content, user activity and the outcome of jobs; in this context, user generated content will include reviews that users receive when completing jobs. More information on these ranking guides can be found in our community articles. Automated decision making is also used to recommend potential jobs to our users and as a part of our marketplace security systems.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">When we disclose personal information</span></h3><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Our third party service providers</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The personal information of users may be held, transmitted to or processed on our behalf outside India, including \'in the cloud\', by our third party service providers. Our third party service providers are bound by contract to only use your personal information on our behalf, under our instructions.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Our third party service providers include:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Cloud hosting, storage, networking and related providers</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">SMS providers</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Payment and banking providers</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Marketing and analytics providers</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Security providers</span></p></li></ul><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Third party applications</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Through the&nbsp; Hire My Profile API it is possible for users to grant third party applications access to their Hire My Profile. Depending on the permissions that are granted, these applications may be able to access some personal information or do actions on the users\' behalf. These third party applications are not controlled by us and will be governed by their own privacy policy. Users are able to remove third party applications from access their data through their settings.</span></p><h4 dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:12pt;margin-bottom:2pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Other disclosures and transfers</span></h4><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We may also disclose your personal information to third parties for the following purposes:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">if necessary to provide the service or product you have requested;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">we receive court orders, subpoenas or other requests for information by law enforcement;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">if otherwise permitted or required by law; or</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">for other purposes with your consent.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">As we are a global company, with offices around the world, your personal information may be processed by staff in any of our offices.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Accessing, correcting, or downloading your personal information</span></h3><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You have the right to request access to the personal information HMP holds about you. Unless an exception applies, we must allow you to see the personal information we hold about you, within a reasonable time period, and without unreasonable expense for no charge. Most personal information can be accessed by logging into your account. If you wish to access information that is not accessible through the platform, or wish to download all personal information we hold on you in a portable data format, please contact our Privacy Officer.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You also have the right to request the correction of the personal information we hold about you. All your personal information can be updated through the user settings pages. If you require assistance please contact our customer support.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Exercising your other rights</span></h3><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You have a number of other rights in relation to the personal data HMP holds about you, however, there may be restrictions on how you may exercise the rights. This is largely due to the nature of the products and services we provide. Much of the data we collect is in order to facilitate contracts between users, facilitate payments, and provide protection for the legitimate users of our marketplace - these data uses are protected against the below rights.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You have the right to:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">seek human review of automated decision-making or profiling</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">opt-out of direct marketing, and profiling for marketing</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">erasure</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">temporary restriction of processing.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Human review of automated decision making / profiling - In the case of our ranking algorithms, it is not possible to exercise this right as this ranking is a fundamental part of the marketplace that users participate in, opting out would mean not being able to participate in the marketplace. Decisions affecting marketplace security are already reviewed by humans.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Direct marketing and profiling - users can control what emails they receive through their settings page.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Erasure - Most personal information and user generated content cannot be deleted as they are used to support contracts between users, document financial transactions, and are used in providing protecting other legitimate users of the marketplace. In the case of non-personal data that can be linked with personal data, it will either be erased or otherwise anonymised from the personal data.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Temporary restriction to processing - under certain circumstances you may exercise this right, in particular if you believe that the personal data we have is not accurate, or you believe that we do not have legitimate grounds for processing your information. In either case you may exercise this right by contacting our privacy officer.</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Unless stated above, users may exercise any of the above rights by contacting our Privacy Officer.</span></p><h3 dir=\"ltr\" style=\"line-height:1.7999999999999998;margin-top:14pt;margin-bottom:4pt;\"><span style=\"font-size:13.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">To contact our Privacy Officer</span></h3><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you have an enquiry or a complaint about the way we handle your personal information, or to seek to exercise your privacy rights in relation to the personal information we hold about you, you may contact our Privacy Officer as follows:</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">By Email:&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">info@hiremyprofile.com</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">By Mail:&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Preferred Outsourcing Pvt. Ltd. </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">OFFICE ADDRESS, 126, First Floor Bank Road&nbsp; </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Ambala Hr 133001</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">For the purposes of the GDPR, our Privacy Officer is also our Data Protection Officer (DPO).</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">While we endeavor to resolve complaints quickly and informally, if you wish to proceed to a formal privacy complaint, we request that you make your complaint in writing to our Privacy Officer, by mail or email as above. We will acknowledge your formal complaint within 10 working days of receipt.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:24pt;font-family:Arial;color:#404145;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Cookies</span></h3><p><b style=\"font-weight:normal;\" id=\"docs-internal-guid-fb766d6a-7fff-324e-a579-ba3318945755\"><br></b></p><p dir=\"ltr\" style=\"line-height:1.92;margin-top:12pt;margin-bottom:12pt;\"><span style=\"font-size:15pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We use cookies and similar technologies (such as web beacons, pixels, tags, and scripts) to improve and personalize your experience, provide our services, analyze website performance and for marketing purposes. To learn more about how we and our third party service providers use cookies and your control over these Cookies, please see our Cookie Policy.</span></p><p><b style=\"font-weight:normal;\"><br></b></p><h3 dir=\"ltr\" style=\"line-height:1.56;margin-top:0pt;margin-bottom:0pt;\"></h3>\n'),
(18,10,2,'',''),
(19,11,1,'HMP Copyright, Trademark Infringement','\n<h1 dir=\"ltr\" style=\"line-height:1.2705882352941176;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 3.75pt 0pt;\"><span style=\"font-size:25.5pt;font-family:Arial;color:#0e0e0f;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Intellectual Property Claims (Copyright (DMCA), Trademark Infringement)</span></h1><h2 dir=\"ltr\" style=\"line-height:1.44;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:7.5pt 0pt 7.5pt 0pt;\"><span style=\"font-size:24pt;font-family:Arial;color:#404145;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">REPORTING CLAIMS OF COPYRIGHT INFRINGEMENT</span></h2><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">HMP\'s content is based on User Generated Content (UGC). HMP does not check user uploaded/created content for violations of copyright or other rights. However, if you believe any of the uploaded content violates your copyright or a related exclusive right, you should follow the process below. HMP looks into reported violations and removes or disables content shown to be violating third party rights.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In order to allow us to review your report promptly and effectively, a copyright infringement notice (\"Notice\") should include the following:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Identification of your copyrighted work and what is protected under the copyright(s) that you are referring to</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your copyright certificate(s)/designation(s) and the type, e.g., registered or unregistered&nbsp;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Proof of your copyrights ownership, such as the registration number or a copy of the registration certificate</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A short description of how our user(s) allegedly infringe(s) your copyright(s)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Clear reference to the materials you allege are infringing and which you are requesting to be removed, for example a link to the deliverable provided to a user, etc.&nbsp;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your complete name, address, email address, and telephone number.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement made under penalty of perjury that the information provided in the notice is accurate and that you are the copyright owner or the owner of an exclusive right that is being infringed, or are authorized to make the complaint on behalf of the copyright owner or the owner of an exclusive right that is being infringed.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your electronic or physical signature</span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">To be considered effective, a Notification of Alleged Infringement must be submitted in writing and include the following information:</span></p></li></ul><ol style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Physical or electronic signature of the owner, or a person authorized to act on behalf of the owner, of an exclusive copyright that has allegedly been infringed</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Identification of the copyrighted material claimed to have been infringed</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Identification of the material that is claimed to be infringing or to be the subject of infringing activity that is to be removed or access to which is to be disabled</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Information reasonably sufficient to permit HireMyProfile to locate the material that is claimed to be infringing or to be the subject of infringing activity</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Information reasonably sufficient to permit HireMyProfile to contact person submitting the Notification, such as a physical address, email address, and telephone number</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement that the person submitting the Notification has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law</span></p></li><li dir=\"ltr\" style=\"list-style-type:decimal;font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 19pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:0pt;margin-bottom:14pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement that the information in the Notification is accurate, and under penalty of perjury, that the person submitting the Notification is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed</span></p></li></ol><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:22pt;padding:0pt 0pt 7.5pt 0pt;\">&nbsp;</p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can send your Notice to our designated Copyright Claims Agent at:</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Preferred Outsourcing Pvt. Ltd.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Attention: Copyright Claims Agent</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Preferred Outsourcing Pvt. Ltd. </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">OFFICE ADDRESS, 126, First Floor Bank Road&nbsp; </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Ambala Hr 133001</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\">&nbsp;</p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Alternatively you can submit the Notice electronically to info@hiremyprofile.com or by submitting a ticket to our DMCA&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Note that we will provide the user who is allegedly infringing your copyright with information about the Notice and allow them to respond. In cases where sufficient proof of infringement is provided, we may remove or suspend the reported materials prior to receiving the user\'s response. In cases where the allegedly infringing user provides us with a proper counter-notification indicating that it is permitted to post the allegedly infringing material, we may notify you and then replace the removed or disabled material. In all such cases, we will act in accordance with copyright law.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you fail to comply with all of the requirements as per copyright law.</span><span style=\"font-size:17.5pt;font-family:Arial;color:#ff0000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Notice may not be effective.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Please be aware that if you knowingly materially misrepresent that material or activity on the Website is infringing your copyright, you may be held liable for damages (including costs and attorneys\' fees) as per copyright law.</span></p><h2 dir=\"ltr\" style=\"line-height:1.44;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:7.5pt 0pt 7.5pt 0pt;\"><span style=\"font-size:24pt;font-family:Arial;color:#404145;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">COUNTER-NOTIFICATION PROCEDURES</span></h2><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you believe that material you posted on the site was removed or access to it was disabled by mistake or misidentification, you may file a counter-notification with us (a \"Counter-Notice\") by submitting written notification to our DMCA / Copyright Claims agent (identified above). Pursuant to the DMCA, the Counter-Notice must include substantially the following:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your physical or electronic signature.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">An identification of the material that has been removed or to which access has been disabled and the location at which the material appeared before it was removed or access disabled.&nbsp;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Adequate information by which we can contact you (including your name, postal address, telephone number and, if available, e-mail address).</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement under penalty of perjury by you that you have a good faith belief that the material identified above was removed or disabled as a result of a mistake or misidentification of the material to be removed or disabled.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:22pt;padding:0pt 0pt 7.5pt 0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement that you will consent to the jurisdiction of the Federal District Court for the judicial district in which your address is located (or if you reside outside the United States for any judicial district in which the Website may be found) and that you will accept service from the person (or an agent of that person) who provided the Website with the complaint at issue.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The DMCA allows us to restore the removed content if the party filing the original DMCA Notice does not file a court action against you within ten business days of receiving the copy of your </span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Counter-Notice</span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">. Please be aware that if you knowingly materially misrepresent that material or activity on the Website was removed or disabled by mistake or misidentification, you may be held liable for damages (including costs and attorneys\' fees) as per copyright law.</span><span style=\"font-size:14.5pt;font-family:Arial;color:#ff0000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">&nbsp;</span></p><h2 dir=\"ltr\" style=\"line-height:1.44;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:7.5pt 0pt 7.5pt 0pt;\"><span style=\"font-size:24pt;font-family:Arial;color:#404145;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">TRADEMARK INFRINGEMENT</span></h2><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Hiremyprofile.com content is based on User Generated Content (UGC). Hiremyprofile does not check user uploaded/created content for violations of trademark or other rights. However, if you believe any of the uploaded content violates your trademark, you should follow the process below. Hiremyprofile looks into reported violations and removes or disables content shown to be violating third party trademark rights.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In order to allow us to review your report promptly and effectively, a trademark infringement notice (\"TM Notice\") should include the following:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Identification of your trademark and the goods/services for which you claim trademark rights</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your trademark registration certificate and a printout from the pertinent country\'s trademark office records showing current status and title of the registration. Alternatively, a statement that your mark is unregistered, together with a court ruling confirming your rights</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A short description of how our user(s) allegedly infringe(s) your trademark(s)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Clear reference to the materials you allege are infringing and which you are requesting to be removed, for example, a link to the deliverable provided to a user, etc.&nbsp;</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your complete name, address, email address, and telephone number.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the trademark owner, its agent, or the law.</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">A statement made under penalty of perjury that the information provided in the notice is accurate and that you are the trademark or are authorized to make the complaint on behalf of the trademark owner</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;margin-left: 12pt;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.542857142857143;background-color:#ffffff;margin-top:0pt;margin-bottom:22pt;padding:0pt 0pt 7.5pt 0pt;\" role=\"presentation\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your electronic or physical signature</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can send your Notice to:</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Preferred Outsourcing Pvt Ltd.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Attention: Trademark Complaints</span></p><p dir=\"ltr\" style=\"line-height:1.4727272727272727;margin-top:0pt;margin-bottom:7pt;\"><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Preferred Outsourcing Pvt. Ltd. </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">OFFICE ADDRESS, 126, First Floor Bank Road&nbsp; </span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:10.5pt;font-family:Roboto,sans-serif;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Ambala Hr 133001</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Alternatively you can submit the Notice electronically to </span><span style=\"font-size:10.5pt;font-family:Arial;color:#1dbf73;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">trademark comp</span><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> or by submitting a ticket to our Trademark Complaint email id.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Note that we will provide the user who is allegedly infringing your trademark with information about the TM Notice and allow them to respond. In cases where sufficient proof of infringement is provided, we may remove or suspend the reported materials prior to receiving the user\'s response. In cases where the allegedly infringing user provides us with information indicating that it is permitted to post the allegedly infringing material, we may notify you and then replace the removed or disabled material. In all such cases, we will act in accordance with applicable law.</span></p><h2 dir=\"ltr\" style=\"line-height:1.44;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:7.5pt 0pt 7.5pt 0pt;\"><span style=\"font-size:24pt;font-family:Arial;color:#404145;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">REPEAT INFRINGERS</span></h2><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10.5pt;font-family:Arial;color:#62646a;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">It is our policy in appropriate circumstances to disable and/or terminate the accounts of users who are repeat infringers.</span></p><p dir=\"ltr\" style=\"line-height:1.7142857142857142;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 13.5pt 0pt;\">&nbsp;</p><p><span id=\"docs-internal-guid-85a311c5-7fff-92df-b556-6eb85be89df2\"><br></span></p>\n'),
(20,11,2,'',''),
(21,12,1,'Terms &amp; Conditions','\n<h2 dir=\"ltr\" style=\"line-height:1.5;margin-right: 90pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; font-family: Arial; font-size: 10.5pt; font-weight: 700; white-space: pre-wrap;\">This document explains the rules that keep our marketplace running.</span><br></h2><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We call these rules our</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> Terms of Use</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">. They apply to Hiremyprofile.com and all the websites and apps we own or run. (And by </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">we</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">, we mean Hiremyprofile</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> and our affiliates</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">, which we may also refer to as </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">us</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">.)&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">These terms explain how we expect you to behave when you&rsquo;re using Hiremyprofile &ndash; whether you&rsquo;re a registered</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> user</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> or unregistered </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">site visitor</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> on our site.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Please read these rules carefully: by using our site, you&rsquo;re agreeing to follow them.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Contents</span></p><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1. About licenses and third party content</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.1 We let you use our site and services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.2 We can stop you using our site and services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.3 We keep the rights to our intellectual property</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4 You can use Hiremyprofile to share your content with the world</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 60pt;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.1 You&rsquo;re responsible for what you post</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 60pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.2 Other people have some rights to what you post</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 60pt;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.3 We&rsquo;re open to your ideas</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.5 Third parties post on Hiremyprofile too</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.6 You can make a copyright complaint</span></p><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">2. What you&rsquo;re allowed to do on Hiremyprofile</span></p><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3. What you&rsquo;re not allowed to do on Hiremyprofile</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.1 Post unacceptable content</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.2 Act in a misleading or fraudulent way</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.3 Treat others unfairly&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#1155cc;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.4 Abuse our feedback system</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.5 Other uses that </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">aren&rsquo;t</span><a href=\"https://www.upwork.com/legal#other\" style=\"text-decoration:none;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> allowed</span></a></p><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:8pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">4. Enforcing our terms of use</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">4.1 We enforce these rules</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-left: 30pt;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">4.2 Tell us if you see someone breaking these rules</span></p><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">5. Definitions</span></p><h2 dir=\"ltr\" style=\"line-height:1.2857142857142856;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1. About licenses and third party content</span></h2><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Here we&rsquo;ve included the conditions for using our site, which we do our best to keep running smoothly (1.1). That means we have the right to stop people from using our site and services if needed (1.2).&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can&rsquo;t use our intellectual property (1.3), but you can post your own content to Hiremyprofile. You&rsquo;re responsible for this content (1.4), and equally, we&rsquo;re not responsible for content you come across from other users (1.5). If you think someone is using something you&rsquo;ve copyrighted, just let us know (1.6).</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.1 We let you use our site and services</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Technically, we&rsquo;re giving you a &lsquo;limited license&rsquo; to the site. Here&rsquo;s what that means.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;re happy for you to access our website and services (known as the </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">services</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">). You&rsquo;re free to have this access (or</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">limited license</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">) as long as you follow these terms of use and all of our other Terms of Service as they apply to you.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;ll do our best to make sure our </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">services</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> are safe and working as they should, but we can&rsquo;t guarantee you&rsquo;ll have access continuously. In fact, we might even stop providing certain features or the services completely, and don&rsquo;t have to give notice if we do.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.2 We can stop letting you use our services</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We can take away your right to use our services at any time.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you violate our Terms of Use or other parts of our Terms of Service, we can take away your access to Hiremyprofile. Officially, this is called terminating your license,</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">and if it happens, we&rsquo;ll tell you and you must stop using our services immediately.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.3 We keep the rights to our intellectual property</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Using our services doesn&rsquo;t mean you can use any of our trademarks or other intellectual property, like copyrights and patents. We keep all of our rights to our intellectual property, even though we let you use our services.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Our logos and names are our trademarks and registered in certain jurisdictions. Any other product or company names, logos or similar marks and symbols you see on Hiremyprofile may be trademarked by our partners or other users like you.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4 You can use Hiremyprofile to share your content with the world</span></h3><h4 dir=\"ltr\" style=\"line-height:1.62;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.1 You&rsquo;re responsible for what you post</span></h4><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You&rsquo;re responsible for how you use our site and anything you post on it. If someone makes a claim against us because of anything you put on the site, you agree to compensate us for our legal fees and expenses (the lawyers call this, &lsquo;indemnification&rsquo;).</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">When you post </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">content</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> on (or through) our site or give us content for posting, you agree that you&rsquo;re completely responsible for that content and we&rsquo;re not. You also agree to only post or give us content that:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">you have the right to post</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">is legal</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:16pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">doesn&rsquo;t violate anyone&rsquo;s rights, including intellectual property rights.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You acknowledge and agree that whoever posts content is responsible for any harm caused to anyone by that content &ndash; not Hiremyprofile &ndash; and that you&rsquo;ll compensate and defend us, our partners, employees and representatives against any costs or legal or government action we have because of your content.</span></p><h4 dir=\"ltr\" style=\"line-height:1.62;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.2 Other people have some rights to what you post</span></h4><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">By posting content on the site, you give other people some rights to that content.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Whenever you post content on our site, you give us and our affiliates a permanent right (called an &lsquo;irrevocable and non-exclusive worldwide license&rsquo;) to use, edit and share that content &ndash; across the world and without paying royalties. If your name, voice and image appear in content you post, we also might use those on the site or in our day-to-day business. For example, if you&rsquo;re a freelancer, we might share your profile with clients we think could be a good match.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You also give each user and site visitor the right to access and use your content through the site. They also have the right to use, copy and share your content &ndash; as long as they do it through the site, and follow both our Terms of Service and the law.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We might show ads near your content and information, without compensating you. Depending on choices you make in your profile, we might also include your name or photo when promoting one of our features.</span></p><h4 dir=\"ltr\" style=\"line-height:1.62;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.4.3 We&rsquo;re open to your ideas</span></h4><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;d love to hear your thoughts on improving Hiremyprofile. Here&rsquo;s what happens when you share them.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can send us comments and suggestions about our services and ways to improve them. If you do, you&rsquo;re agreeing your ideas are free and unsolicited, and you don&rsquo;t expect or ask anything in return, unless we&rsquo;ve specifically asked you for your ideas and offered something in return (we like to keep our word).&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You agree we&rsquo;re free to use, change and share the idea as we like, without being obligated to to give you anything for it. And if you do send us an idea, you also agree that this doesn&rsquo;t affect our right to use similar or related</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">ideas</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> &ndash;</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">including those we already have or get from others.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.5 Third parties post on Hiremyprofile, too</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Anyone else who uses our site is responsible for what they post or link on Hiremyprofile.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;re not responsible for the accuracy or reliability of any content shared by other people on our site, unless they&rsquo;re officially working for us when they share or post the content. Any content represents the views of the person sharing it, not Hiremyprofile.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Our site might also contain links or other access to third-party websites and applications. These sites and applications are owned and run by other parties, not Hiremyprofile. If we use a link or application that goes to a third-party website, it doesn&rsquo;t mean that we endorse it and you agree that you use it without our endorsement.&nbsp;</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.6 You can make a copyright complaint</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you think content on our site infringes your rights, you can ask to have it removed.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;re committed to following U.S. copyright and related laws and need site visitors and users to follow them as well. That means you can&rsquo;t use our site to store or share anything that infringes anyone&rsquo;s intellectual property rights, including their rights under U.S. copyright law.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">If you own copyrighted work and think your rights under U.S. copyright law have been infringed by anything on our site, the Digital Millennium Copyright Act means you can ask us to take it down.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">2. What you&rsquo;re allowed to</span><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">do on Hiremyprofile</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can only use our services for work and to learn from the information we share.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Our site and services were made to be used for business, not for personal or consumer use. We run our marketplace to help users find each other, build working relationships, and make and receive payments for that work.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can also use some of our services to get information we think might be interesting and useful for our site visitors and users &ndash; like our Hiremyprofile blog. While we do our best to make sure that this information is timely and accurate, there might sometimes be mistakes. We don&rsquo;t make any guarantees about information posted on our site, so never use it as tax or legal advice. And you should always double-check the information for yourself.</span></p><h2 dir=\"ltr\" style=\"line-height:1.2857142857142856;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3. What you&rsquo;re </span><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">not </span><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">allowed to do on Hiremyprofile</span></h2><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Certain uses of the site are not allowed. Here we go into much more depth about those things, including:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">posting unacceptable content (3.1)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">acting in a misleading or fraudulent way (3.2)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">treating others unfairly (3.3)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">abusing our feedback system (3.4)</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:16pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">other uses that aren&rsquo;t allowed (3.5)</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">In short, you&rsquo;re not allowed to use our services to do (or encourage others to do) anything that is illegal, fraudulent or harmful. If you don&rsquo;t see something on one of the lists below, you shouldn&rsquo;t assume it&rsquo;s allowed. When in doubt, contact us to check.</span></p><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.1 Posting unacceptable content</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can&rsquo;t offer, share, support or try to find anything that:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">is illegal or defamatory</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">is violent, discriminatory or harassing, either generally or towards a specific person or group (or encourages others to be), including anyone who is part of a legally protected group</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">is sexually explicit or related to sex work or escort services</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">is in any way related to child exploitation</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">would infringe on any intellectual property rights, including copyrights</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">would violate our </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Terms of Service, </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">another website&rsquo;s</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">terms of service, or any similar contract</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">would go against professional or academic standards or policies &ndash; including improperly submitting someone else&rsquo;s work as your own, or by ghost-writing essays, tests, or certifications</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:16pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">involves purchasing or requesting a fake review or is connected in any way to making or sharing misleading content (like &lsquo;deep fakes&rsquo; or &lsquo;fake news&rsquo;) which is intended to deceive others.</span></p></li></ul><h3 dir=\"ltr\" style=\"line-height:1.56;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:13.5pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.2 Acting in a misleading or fraudulent way</span></h3><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">On Hiremyprofile, you can&rsquo;t do anything that&rsquo;s dishonest or meant to fool others.&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">You can&rsquo;t misrepresent yourself, your experience, skills or professional qualifications, or that of others. This includes:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">lying about your experience, skills or professional qualifications</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">passing off any part of someone else&rsquo;s profile or identity as your own</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">using a profile picture that isn&rsquo;t you, misrepresents your identity or is someone else</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">impersonating or falsely attributing statements to any person or entity, including an Hiremyprofile representative or forum leader</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:16pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">falsely claiming or implying you&rsquo;re connected to a person or organization (including Hiremyprofile) &ndash; for example, you can&rsquo;t say you work for a particular company when you don&rsquo;t, and agencies can&rsquo;t use a freelancer&rsquo;s</span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"> </span><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">profile if they&rsquo;ve stopped working together.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.2;background-color:#ffffff;margin-top:8pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Similarly, you must always be honest about who&rsquo;s doing the work. That means you can&rsquo;t:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">allow someone else to use your account, which misleads other users or</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:16pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">falsely claim one freelancer will do a job when another will actually do it &ndash; including submitting a proposal on behalf of a freelancer who can&rsquo;t or won&rsquo;t do the work.</span></p></li></ul><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:8pt;margin-bottom:0pt;padding:0pt 0pt 8pt 0pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We&rsquo;re particularly invested in avoiding fraud and misrepresentations when it comes to payments. This means:&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Freelancers can&rsquo;t fraudulently charge a client in any way, including by:</span></p><ul style=\"margin-top:0;margin-bottom:0;padding-inline-start:48px;\"><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:16pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">falsifying the hours, keystrokes or clicks recorded in the Hiremyprofile app</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">reporting or billing time you haven&rsquo;t actually worked</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">reporting time worked by someone else and claiming you did the work</span></p></li><li dir=\"ltr\" style=\"list-style-type:disc;font-size:10pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.38;m'),
(22,12,2,'',''),
(23,13,1,'Refund &amp; Cancellation Policy','\n<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(63, 108, 175);\"><b><i>Refund to your Wallet Balance</i></b></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">If your order was cancelled, the funds will be credited to your Hiremyprofile Balance. Hiremyprofile doesn\'t automatically process refunds to your payment provider after an order\'s cancellation. You will see the credited funds just next to your profile picture.</p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Refund timeline</b></span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Once a refund is initiated, the refund will take different amounts of time to reflect&mdash;depending on which method you choose to receive the funds.</p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Example: PayPal or Credit Card.<span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p6\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0); min-height: 12px;\"><br></p><table cellspacing=\"0\" cellpadding=\"0\" class=\"t1\"><tbody><tr><td valign=\"top\" class=\"td1\" style=\"width: 117px; height: 67px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p7\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51);\"><span class=\"s2\" style=\"letter-spacing: 0.2px;\"><b>PayPal</b></span></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Helvetica; min-height: 14px;\"><br></p></td><td valign=\"top\" class=\"td2\" style=\"width: 316px; height: 67px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p9\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\">Refunds are usually completed within 24 hours of the request being processed by Customer Support.<span class=\"Apple-converted-space\">&nbsp;</span></p></td></tr><tr><td valign=\"top\" class=\"td3\" style=\"width: 117px; height: 100px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p7\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51);\"><span class=\"s2\" style=\"letter-spacing: 0.2px;\"><b>Credit card</b></span></p><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0); min-height: 12px;\"><span class=\"s2\" style=\"letter-spacing: 0.2px;\"><b>&nbsp;</b></span></p></td><td valign=\"top\" class=\"td4\" style=\"width: 316px; height: 100px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p9\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\">Refunds take slightly longer due to the card issuer\'s processing time.<span class=\"Apple-converted-space\">&nbsp; </span>Usually, credit card refunds are completed within 7 to 10 days of the request being processed by Customer Support. However, in extreme cases, it can take up to 2 weeks.</p></td></tr></tbody></table><p class=\"p11\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0); min-height: 18px;\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b></b></span><br></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Incomplete refunds</b></span></p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">If the funds credited to your payment provider are incomplete, remember that orders are refunded to your Hiremyprofile balance, and sometimes those funds are reused when you make any <i>new</i> purchases. This is why the funds credited to your payment provider may seem incomplete. Check your most recent orders to confirm if they were paid for using your Hiremyprofile balance. If you have any issues regarding your account balance, contact <a href=\"https://www.hiremyprofile.com//customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Customer Support.<span class=\"Apple-converted-space\">&nbsp;</span></span></a></p><p class=\"p12\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 13.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 15px;\"><b>&nbsp;</b></p><p class=\"p13\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Refunds to a different card or PayPal account</b></span></p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">We are only able to refund funds to the original payment source used to process the payment. Hiremyprofile is not able to change the card or PayPal account to where the funds will be credited.</p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p13\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Refund currency</b></span></p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">If you paid for your order using a currency other than US dollars, your refund will be processed in the same currency and amount used in the payment.</p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">For any further questions or concerns relating to your refund, contact <a href=\"https://www.hiremyprofile.com//customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Customer Support.<span class=\"Apple-converted-space\">&nbsp;</span></span></a></p><p class=\"p6\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0); min-height: 12px;\"><br></p><p class=\"p6\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(0, 0, 0); min-height: 12px;\"><br></p><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(63, 108, 175);\"><b><i>Cancellations</i></b></p><p class=\"p15\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">While you should always aim to satisfy your buyers&rsquo; needs, sometimes things don&rsquo;t work as planned and cancellation is the best way to resolve an ongoing order. When addressing an issue, be sure to communicate clearly and politely throughout the entire cancellation process.</p><p class=\"p16\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(109, 109, 109);\"><span class=\"s4\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; color: rgb(26, 26, 28);\">&nbsp;</span><i>Important! Cancellations should always be considered as a last resort. Cancelling orders negatively affects the buyer experience, as well as your valuable time and potential income.</i></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;&nbsp;</span></p><p class=\"p13\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Different kinds of cancellations<span class=\"Apple-converted-space\">&nbsp;</span></b></span></p><ul class=\"ul1\" style=\"font-size: medium;\"><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s5\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; color: rgb(0, 0, 0);\"><b>Buyer</b></span>-requested cancellations: If an order is marked as very late (24 hours or more), buyers can request to cancel. If you have already worked on the order, this can result in you not receiving payment. Avoid this Situation.<br></li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s5\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; color: rgb(0, 0, 0);\"><b>Seller</b></span>-requested cancellations: If you request to cancel, the order will be cancelled if your buyer doesn\'t respond (after 48 hours). Always use the <a href=\"https://www.hiremyprofile.com/customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Resolution Center</span></a> to work things out with your buyer before contacting Customer Support.<br></li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s5\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; color: rgb(0, 0, 0);\"><b>Mutual cancellations</b></span>: When <i>both</i> parties can&rsquo;t agree, resolve an order using this cancellation.</li></ul><p class=\"p18\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 51px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(109, 109, 109);\"><span class=\"s4\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; color: rgb(26, 26, 28);\"><br></span><i>Important: If your buyer doesn&rsquo;t respond to you within 2 days of initiating a mutual cancellation, the job is automatically cancelled. The same applies if a buyer requests the cancellation, and you remain unresponsive.<br></i></p><ul class=\"ul1\" style=\"font-size: medium;\"><li class=\"li19\" style=\"margin: 0px 0px 6px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s5\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; color: rgb(0, 0, 0);\"><b>Admin</b></span>: If you can&rsquo;t agree with your buyer, or if your buyer won&rsquo;t mutually cancel, contact <a href=\"https://www.hiremyprofile.com/customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Customer Support</span></a> to assist.</li></ul><p class=\"p20\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Using the Resolution Center</b></span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">We always encourage both our sellers and buyers to try and resolve disputes within ongoing orders and to avoid cancellations. To easily resolve any disputes with your buyer, use the <a href=\"https://www.hiremyprofile.com/customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Resolution Center.</span></a></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><br></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(0, 0, 0);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Cancellations &amp; your seller level</b></span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">When evaluating a seller, all cancellations are taken into account. We are aware that some cancellations are inevitable and those cancellations have a lower impact on your performance scores.<span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><br></p><p class=\"p21\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Order Completion Rate (OCR)</b></span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Order completion refers to the successful conclusion of an order&mdash;where a buyer receives and approves the service that they purchased. One of the ways your performance as a seller is evaluated through the OCR:<span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">By keeping a steady OCR, build relationships with buyers, and grow your business. It also enables you to track the quality of the service you&rsquo;re providing and influence your Service&rsquo;s position in the search rankings.<span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 6px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Arial; color: rgb(63, 108, 175);\"><b><i>Tips to decrease cancellations</i></b></p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Always do your best to deliver on time:<span class=\"Apple-converted-space\">&nbsp;</span></p><ul class=\"ul1\" style=\"font-size: medium;\"><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s6\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Symbol;\"></span>Plan your work, and make sure your delivery time is realistic</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\"><span class=\"s7\" style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Symbol; color: rgb(0, 0, 0);\"></span>If on-time delivery is not possible, use the Extend Delivery option in the <a href=\"https://www.hiremyprofile.com/customer_support\"><span class=\"s3\" style=\"text-decoration-line: underline; color: rgb(16, 60, 192);\">Resolution Center<br></span></a></li></ul><p class=\"p22\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Arial; color: rgb(109, 109, 109);\"><i>Important! Delivering an empty message or sending incomplete work, to avoid late delivery, is a violation of Hiremyprofile&rsquo;s Terms of Service. This can result in your account being reviewed.</i></p><p class=\"p23\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51); min-height: 16px;\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b></b></span><br></p><p class=\"p24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>General guidelines<span class=\"Apple-converted-space\">&nbsp;</span></b></span></p><ul class=\"ul1\" style=\"font-size: medium;\"><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Make sure to only provide services that match your skill set&mdash;don&rsquo;t offer to do anything you can&rsquo;t do or are not qualified to do</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">On your Service page, accurately display your latest and original work</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Set reasonable delivery times<span class=\"Apple-converted-space\">&nbsp;</span></li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Be very clear about the pricing and scope of your Service&mdash;clear enough to avoid misunderstandings.</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Communicate with your buyer and make sure you&rsquo;re aligned on the service&mdash;if you are confused, contact your buyer for clarification</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">When you receive an order, make sure that you have all the necessary information to start working</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">If cancellation is inevitable, don&rsquo;t wait until the last minute&mdash;give your buyer an adequate warning</li></ul><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28); min-height: 12px;\"><br></p><p class=\"p24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial; color: rgb(51, 51, 51);\"><span class=\"s1\" style=\"letter-spacing: 0.3px;\"><b>Prevent cancellations:</b></span></p><ul class=\"ul1\" style=\"font-size: medium;\"><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Be proactive: Communicate all the necessary info on your Service description, requirements, and extras before the order to set you up for success before it&rsquo;s even purchased</li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Be prepared: If one of your buyers is unresponsive, initiate a mutual cancellation<span class=\"Apple-converted-space\">&nbsp;</span></li><li class=\"li17\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11.5px; line-height: normal; font-family: Arial; color: rgb(26, 26, 28);\">Review delivery times: If you find that you are often tempted to cancel because you&rsquo;re too busy, give yourself more time to deliver</li></ul>\n'),
(24,13,2,'',''),
(25,14,1,'Fees and Charges','\n<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 17px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: Helvetica; color: rgb(15, 116, 98);\"><span class=\"s1\" style=\"text-decoration-line: underline;\"><b>For Employers</b></span></p><p class=\"p2\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: Helvetica; color: rgb(15, 116, 98);\"><b>Projects</b></p><p class=\"p3\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Buyer is free to sign up, post a project, receive bids from freelancers, review the freelancer\'s portfolio and discuss the project requirements. If you choose to award the project, we charge you a small project fee relative to the value of the selected bid, as an introduction fee.</p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">The cost and how this fee is charged depends on the type of project.</p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27); min-height: 14px;\"><br></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">For fixed price projects, a fee of 1.5% or &#8377;100.00 INR (whichever is greater) is levied at the time a project has been awarded by you. If you subsequently pay the freelancer more than the original bid amount we will also charge the project fee on any overage payments.</p><p class=\"p5\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27); min-height: 14px;\"><br></p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">For hourly projects, a fee of 1.5% is levied on each payment that you make to the freelancer.</p><p class=\"p4\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">You may cancel the project from your dashboard at any time for up to seven (7) days after the project has been accepted for a full refund of your fee.</p><p class=\"p6\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98); min-height: 20px;\'><b></b><br></p><p class=\"p7\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98);\'><b>Services</b></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">At the time of ordering a service, employers must provide funds equivalent to the total service price. The payment is protected by the Hiremyprofile&rsquo;s Milestone Payment System. Only release the payment once you are 100% happy with the work that has been delivered.</p><p class=\"p9\" style=\"margin-right: 0px; margin-bottom: 17px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: Helvetica; color: rgb(15, 116, 98); min-height: 22px;\"><b></b><br></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 17px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: Helvetica; color: rgb(15, 116, 98);\"><span class=\"s1\" style=\"text-decoration-line: underline;\"><b>For Freelancers</b></span></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Freelancer is free to sign up, create a profile, select skills of projects you are interested in, upload a portfolio, receive project notifications, discuss project details with the employer, bid on projects (free members receive initially 50 bids per month).</p><p class=\"p7\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98);\'><b>Projects</b></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">For fixed price projects or if you are hired directly on any of your services, , we charge you a small project fee relative to the value of the selected bid on release of each milestone, as an introduction fee. If you are subsequently paid more than the original bid amount, we will also charge the project fee on any overage payments.</p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">For hourly projects, the fee is levied on each payment as it is made by the employer to you.</p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">The fee for fixed price projects is 10% of &#8377;150.00 INR, whichever is greater, and 10% for hourly projects.</p><p class=\"p7\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98);\'><b>Taxes</b></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Taxes are applied based on local rates and rules defined by the user\'s country of residence / registered country.</p><table cellspacing=\"0\" cellpadding=\"0\" class=\"t1\"><tbody><tr><td valign=\"top\" class=\"td1\" style=\"width: 217px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Australia - Goods and Service Tax (GST)</i></b></span></p></td><td valign=\"top\" class=\"td2\" style=\"width: 216px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>10%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td3\" style=\"width: 217px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Chile - Value Added Tax (VAT)</i></b></span></p></td><td valign=\"top\" class=\"td4\" style=\"width: 216px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>19%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td1\" style=\"width: 217px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>European Union - Value Added Tax (VAT)</i></b></span></p></td><td valign=\"top\" class=\"td2\" style=\"width: 216px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><a href=\"https://ec.europa.eu/taxation_customs/vat-rates_en\"><b><i>VAT rates</i></b><b><i></i></b></a></span></p></td></tr><tr><td valign=\"top\" class=\"td3\" style=\"width: 217px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>India - Tax Collected at Source (TCS)</i></b></span></p></td><td valign=\"top\" class=\"td4\" style=\"width: 216px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>1%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td1\" style=\"width: 217px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>India - Tax Deducted at Source (TDS)</i></b></span></p></td><td valign=\"top\" class=\"td2\" style=\"width: 216px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>1% / 5%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td3\" style=\"width: 217px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Mexico - Income Tax Withholding</i></b></span></p></td><td valign=\"top\" class=\"td4\" style=\"width: 216px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>1% / 20%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td1\" style=\"width: 217px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Mexico - Value Added Tax (VAT)</i></b></span></p></td><td valign=\"top\" class=\"td2\" style=\"width: 216px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>16%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td3\" style=\"width: 217px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Russia - Value Added Tax (VAT)</i></b></span></p></td><td valign=\"top\" class=\"td4\" style=\"width: 216px; height: 45px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>20%</i></b></span></p></td></tr><tr><td valign=\"top\" class=\"td1\" style=\"width: 217px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p10\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><span class=\"s2\"><b><i>Switzerland - Value Added Tax (VAT)</i></b></span></p></td><td valign=\"top\" class=\"td2\" style=\"width: 216px; height: 46px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p11\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(63, 108, 175);\"><b><i>7.7%</i></b></p></td></tr></tbody></table><p class=\"p12\" style=\"margin-right: 0px; margin-bottom: 45px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 12.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27); min-height: 16px;\"><br></p><p class=\"p7\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98);\'><b>Withdrawal Fees</b></p><p class=\"p13\" style=\"margin-right: 0px; margin-bottom: 48px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Fees may be optionally levied depending on the method of withdrawal. Additional fees may be levied by the third party offering the withdrawal method.</p><table cellspacing=\"0\" cellpadding=\"0\" class=\"t1\"><tbody><tr><td valign=\"top\" class=\"td5\" style=\"width: 212px; height: 85px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>Express Withdrawl</i></p><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>Paypal</i></p><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>Payoneer</i></p><p class=\"p15\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><span class=\"s2\"><i>International Wire</i></span></p></td><td valign=\"top\" class=\"td6\" style=\"width: 216px; height: 85px; border-style: solid; border-width: 1px; border-color: rgb(0, 0, 0); padding: 4px;\"><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>FREE</i></p><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>FREE</i></p><p class=\"p14\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>FREE</i></p><p class=\"p16\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 11px; line-height: normal; font-family: Helvetica; color: rgb(49, 49, 49);\"><i>(Tentative)</i></p></td></tr></tbody></table><p class=\"p6\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98); min-height: 20px;\'><b></b><br></p><p class=\"p7\" style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; font-family: \"PT Sans Narrow\"; color: rgb(15, 116, 98);\'><b>Maintenance Fee</b></p><p class=\"p13\" style=\"margin-right: 0px; margin-bottom: 48px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">User Accounts that have not logged in for six months will incur a maintenance fee of up to &#8377;1250.00 INR per month until either the account is terminated or reactivated for storage, bandwidth, support and management costs of providing hosting of the user\'s profile, portfolio storage, listing in directories, provision of the HireMyProfile service, file storage and message storage. These fees will be refunded upon request by users on subsequent reactivation</p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 17px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: Helvetica; color: rgb(15, 116, 98);\"><span class=\"s1\" style=\"text-decoration-line: underline;\"><b>Membership Plans</b></span></p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Select from a range of membership plans to determine the fees you pay for our service. You can work on the site as either an employer or freelancer as a free member, or gain additional benefits as a paid member by upgrading to a paid plan.</p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">Memberships will recur on either a monthly or annual basis on the anniversary of your subscription, unless cancelled. If funds are insufficient we will try to renew your membership for up to 30 days, until funds are made available.</p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">You may cancel your membership at any time from the user settings page, which will cease billing at the end of your subscription period without additional costs.</p><p class=\"p8\" style=\"margin-right: 0px; margin-bottom: 18px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27);\">View our membership plans</p><p class=\"p17\" style=\"margin-right: 0px; margin-bottom: 48px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27); min-height: 14px;\"><br></p><p class=\"p18\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 10.5px; line-height: normal; font-family: Roboto; color: rgb(13, 18, 27); min-height: 14px;\"><br></p>\r\n\n'),
(26,14,2,'','');

/*Table structure for table `payment_settings` */

DROP TABLE IF EXISTS `payment_settings`;

CREATE TABLE `payment_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `min_proposal_price` int(10) NOT NULL,
  `comission_percentage` int(10) NOT NULL,
  `days_before_withdraw` int(10) NOT NULL,
  `withdrawal_limit` int(10) NOT NULL,
  `featured_fee` int(10) NOT NULL,
  `featured_duration` int(10) NOT NULL,
  `featured_proposal_while_creating` int(10) NOT NULL,
  `processing_feeType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_fee` int(10) NOT NULL,
  `enable_paypal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_currency_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_app_client_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_app_client_secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_sandbox` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_payoneer` int(10) NOT NULL,
  `enable_stripe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_publishable_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_webhook_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_currency_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_dusupay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_sandbox` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_currency_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_api_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_webhook_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_payout_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusupay_payout_provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_payza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payza_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payza_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payza_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_coinpayments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_merchant_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_withdrawal_fee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_public_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_private_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coinpayments_ipn_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_paystack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_public_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_mercadopago` int(10) NOT NULL,
  `mercadopago_access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mercadopago_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mercadopago_sandbox` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment_settings` */

insert  into `payment_settings`(`id`,`min_proposal_price`,`comission_percentage`,`days_before_withdraw`,`withdrawal_limit`,`featured_fee`,`featured_duration`,`featured_proposal_while_creating`,`processing_feeType`,`processing_fee`,`enable_paypal`,`paypal_email`,`paypal_currency_code`,`paypal_app_client_id`,`paypal_app_client_secret`,`paypal_sandbox`,`enable_payoneer`,`enable_stripe`,`stripe_secret_key`,`stripe_publishable_key`,`stripe_webhook_key`,`stripe_currency_code`,`enable_dusupay`,`dusupay_sandbox`,`dusupay_currency_code`,`dusupay_api_key`,`dusupay_secret_key`,`dusupay_webhook_hash`,`dusupay_method`,`dusupay_provider_id`,`dusupay_payout_method`,`dusupay_payout_provider_id`,`enable_payza`,`payza_email`,`payza_currency_code`,`payza_test`,`enable_coinpayments`,`coinpayments_merchant_id`,`coinpayments_currency_code`,`coinpayments_withdrawal_fee`,`coinpayments_public_key`,`coinpayments_private_key`,`coinpayments_ipn_secret`,`enable_paystack`,`paystack_public_key`,`paystack_secret_key`,`enable_mercadopago`,`mercadopago_access_token`,`mercadopago_currency`,`mercadopago_sandbox`) values 
(1,5,12,1,5,10,1,1,'fixed',2,'yes','test@gmail.com','','','','on',1,'no','','','','','no','on','','','','','','','','','no','','USD','off','no','','','sender','','','','no','','',0,'','',0);

/*Table structure for table `payouts` */

DROP TABLE IF EXISTS `payouts`;

CREATE TABLE `payouts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payouts` */

/*Table structure for table `plugins` */

DROP TABLE IF EXISTS `plugins`;

CREATE TABLE `plugins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `plugins` */

/*Table structure for table `post_categories` */

DROP TABLE IF EXISTS `post_categories`;

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_categories` */

/*Table structure for table `post_categories_meta` */

DROP TABLE IF EXISTS `post_categories_meta`;

CREATE TABLE `post_categories_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_creator` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_categories_meta` */

/*Table structure for table `post_comments` */

DROP TABLE IF EXISTS `post_comments`;

CREATE TABLE `post_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_comments` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

/*Table structure for table `posts_meta` */

DROP TABLE IF EXISTS `posts_meta`;

CREATE TABLE `posts_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts_meta` */

/*Table structure for table `proposal_modifications` */

DROP TABLE IF EXISTS `proposal_modifications`;

CREATE TABLE `proposal_modifications` (
  `modification_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `modification_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`modification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposal_modifications` */

/*Table structure for table `proposal_packages` */

DROP TABLE IF EXISTS `proposal_packages`;

CREATE TABLE `proposal_packages` (
  `package_id` int(100) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(100) NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposal_packages` */

insert  into `proposal_packages`(`package_id`,`proposal_id`,`package_name`,`description`,`revisions`,`delivery_time`,`price`) values 
(1,1,'Basic','Install basic theme with 5 basic plugins','2','1','5'),
(2,1,'Standard','Install basic theme with 8 basic plugins','3','2','10'),
(3,1,'Advance','Install advance theme with unlimited plugins','5','1','15'),
(4,2,'Basic','','0','1','5'),
(5,2,'Standard','','0','1','10'),
(6,2,'Advance','','0','1','15'),
(7,3,'Basic','STARTER Free Theme + 15 hot products + 5 days free support + Basic optimization','0','4','5'),
(8,3,'Standard','STARTER Free Theme + 15 hot products + 5 days free support + Basic optimization','0','3','10'),
(9,3,'Advance','STARTER Free Theme + 15 hot products + 5 days free support + Basic optimization','0','1','15'),
(10,4,'Basic','jkhkh','0','1','5'),
(11,4,'Standard','hjhjh','0','1','10'),
(12,4,'Advance','hjhkh','0','1','15'),
(13,5,'Basic','This is for testing','0','1','5'),
(14,5,'Standard','This is for testing','0','1','10'),
(15,5,'Advance','This is for testing','0','1','15'),
(16,6,'Basic','Very detailed penetration testing using different tools and detailed reporting for the tests\r\n\r\n','0','1','5'),
(17,6,'Standard','Very detailed penetration testing using different tools and detailed reporting for the tests\r\n\r\n','0','1','10'),
(18,6,'Advance','Very detailed penetration testing using different tools and detailed reporting for the tests\r\n\r\n','0','1','15'),
(19,7,'Basic','ajdhjkashd','0','1','5'),
(20,7,'Standard','hkjhkhk','0','1','10'),
(21,7,'Advance','kkhkh','0','1','15'),
(22,8,'Basic','','0','1','5'),
(23,8,'Standard','','0','1','10'),
(24,8,'Advance','','0','1','15');

/*Table structure for table `proposal_referrals` */

DROP TABLE IF EXISTS `proposal_referrals`;

CREATE TABLE `proposal_referrals` (
  `referral_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `order_id` int(100) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `referrer_id` int(10) NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`referral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposal_referrals` */

/*Table structure for table `proposals` */

DROP TABLE IF EXISTS `proposals`;

CREATE TABLE `proposals` (
  `proposal_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_cat_id` int(10) NOT NULL,
  `proposal_child_id` int(10) NOT NULL,
  `proposal_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_img1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_img2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_img3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_img4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_img1_s3` int(10) NOT NULL,
  `proposal_img2_s3` int(10) NOT NULL,
  `proposal_img3_s3` int(10) NOT NULL,
  `proposal_img4_s3` int(10) NOT NULL,
  `proposal_video_s3` int(10) NOT NULL,
  `proposal_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_enable_referrals` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_referral_money` int(10) NOT NULL,
  `proposal_referral_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_featured` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_toprated` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_seller_id` int(10) NOT NULL,
  `delivery_id` int(10) NOT NULL,
  `proposal_revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `proposal_rating` int(11) NOT NULL,
  `proposal_views` int(10) NOT NULL,
  `proposal_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`proposal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposals` */

insert  into `proposals`(`proposal_id`,`proposal_title`,`proposal_url`,`proposal_cat_id`,`proposal_child_id`,`proposal_price`,`proposal_img1`,`proposal_img2`,`proposal_img3`,`proposal_img4`,`proposal_video`,`proposal_img1_s3`,`proposal_img2_s3`,`proposal_img3_s3`,`proposal_img4_s3`,`proposal_video_s3`,`proposal_desc`,`buyer_instruction`,`proposal_tags`,`proposal_enable_referrals`,`proposal_referral_money`,`proposal_referral_code`,`proposal_featured`,`proposal_toprated`,`proposal_seller_id`,`delivery_id`,`proposal_revisions`,`level_id`,`language_id`,`proposal_rating`,`proposal_views`,`proposal_status`) values 
(1,'I will install wordpress theme ','i-will-install-wordpress-theme',6,11,'0','WhatsApp Image 2022-06-23 at 12.37.17 PM_1656864049.png','122_inmotn_logo-08_1656864064.png','501303B2-E0E8-4AD0-9590-7E6CCCD3C4C5_1656864076.png','E42B6D8E-1B56-4E0E-BA3C-368E7795BFD9_1656864088.png','',0,0,0,0,0,'\n<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\">Hi There,</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\">Are you looking for a&nbsp;<span style=\"font-weight: 700;\">highly&nbsp;professional</span>&nbsp;Elementor&nbsp;<span style=\"font-weight: 700;\">Wordpress Website, WooCommerce Store, Blog or Corporate Site?</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\">You are on a right&nbsp;<span style=\"font-weight: 700;\">GIG.&nbsp;</span>&nbsp;We can help you with getting a&nbsp;<span style=\"font-weight: 700;\">fully responsive</span>&nbsp;and&nbsp;<span style=\"font-weight: 700;\">professional</span>&nbsp;<span style=\"font-weight: 700;\">WordPress</span>&nbsp;<span style=\"font-weight: 700;\">site</span>,&nbsp;<span style=\"font-weight: 700;\">store</span>&nbsp;or a&nbsp;<span style=\"font-weight: 700;\">blog</span>&nbsp;in<span style=\"font-weight: 700;\">&nbsp;Elementor PRO&nbsp;</span>to&nbsp;<span style=\"font-weight: 700;\">power-boost</span>&nbsp;your&nbsp;<span style=\"font-weight: 700;\">credibility</span>&nbsp;on the web to attract more&nbsp;<span style=\"font-weight: 700;\">customers</span>&nbsp;and&nbsp;<span style=\"font-weight: 700;\">opportunities</span>.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\">We are specialised in creating all types of WordPress websites such as personal, business and portfolio, blogs, e-commerce, and corporate websites in&nbsp;<span style=\"font-weight: 700;\">Elementor PRO</span>.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><span style=\"font-weight: 700;\"><span style=\"background: rgb(255, 236, 209);\">We are offering free 30 minutes consultation video to discuss the project requirements.</span></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><span style=\"font-weight: 700;\">What will you get in this gig?</span></p><ul style=\"list-style: none none; margin-right: 5px; margin-bottom: 0px; margin-left: 5px; padding: 0px;\"><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\"><span style=\"font-weight: 700;\"><span style=\"background: rgb(255, 236, 209);\">Elementor PRO License ($49, you will get free in this gig)</span></span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Professional and Modern WordPress website design</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">100%&nbsp;<span style=\"font-weight: 700;\">Responsive</span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">100%&nbsp;<span style=\"font-weight: 700;\">SEO Friendly Structure</span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Speed<span style=\"font-weight: 700;\">&nbsp;Optimized</span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\"><span style=\"font-weight: 700;\">Highly Secure</span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\"><span style=\"font-weight: 700;\">Unlimited Revisions</span></li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">After Sale&nbsp;<span style=\"font-weight: 700;\">free support</span>.&nbsp;</li></ul><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px;\"><br style=\'color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'></p>\r\n\n','I need server details and theme to install.','wordpress,html,php','no',0,'','yes','',2,1,'0',1,0,5,44,'active'),
(2,'testing','testing',1,1,'0','gettyimages-946150830-1024x1024_1656866698.png','','','','',0,0,0,0,0,'\n<p><img src=\"data:image/png;base64,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j/5V7qprD7Ea79eNtVL/qGYAmPSOt5zAr9atwEvbXseUERditv1aOC68BkOyB6W6aT2eX/Jj62f1+H+eDXhj5ybk2AbgiZsW4brxV8IiJKd6LwPAlLDWM2dxtq0t1c0gIiIiIiIiIiIiIkqJjPR0ZGVmpLoZkfk7gMduBQ66gXYAkonBVIIAWAHkTwD+8/WubiH1Ut6TTVjrrsXaTzZg4746pAlpGJI9CEP75SA9LT3Vzesx/JKEEy0ncazlKzSdPo5RQ4bjxolXY5b9alwx6mKkW5P74AgDwJQ07R0daG/vQEdHByRJkv+lulFEREREREREREREREkiQB7pKwgCrFYr0tKsSLNaU92s6NRhvbu2Ai8+AXy6U0ntHeUOviDI/0YXAqWPAWMmd1tzqfdq93dgr+8z7GtqxKdHD+Lo6ROpblKPkW61YkROPkYPHYFx4ijkZA9EmqXrrh0MABMRERERERERERERERER9RHJSSRNREREREREREREREREREQpxwAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfwQAwEREREREREREREREREVEfkZasBS1d9w6+PN0CSH5Ifj8kQQAkKfC+X5KQabVgWL9sSJKEtLQ0SMr7FkFAms2GsYP6Y86kCZAACMlqGFEXkvwSBEv0s9XMNERE1LNs9TWgbOufsd27D5AASZIgSRIEQUCaxQoA6PD74Zf8EITwa7wgCIAAXCSORuWl38NleeO6exOIiM55nkN+PPOGHw1ftEOSOrQ/T00RBEAQrBh7XhoeuMEC+3A+P01EREQ9gyT5AUmK/T66oP9DEPj9higWH35cj4snF6W6GUSmJC0A/OXp05D88ocOBAEWAH7lPUm5cTowKxMWQZCDwxqSIAAdHSg8T1ReACPA1KOpQQDBIqCp6Si2bKvDzl170N7eDgCwWq2YOGEcLru0GLlDh+rmIeqV5Au5/N+xnsfa+dgHqJd4aOMf4G4+BIskfy2R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','','LOGO','no',0,'','yes','',2,1,'0',1,0,0,0,'active'),
(3,'Make your shopify profitable website, shopify store or Dropshipping store Extraordinary and Expand your sales to NEXT LEVEL','make-your-shopify-profitable-website-shopify-store-or-dropshipping-store-extraordinary-and-expand-your-sales-to-next-level',6,58,'0','ERP issue_1656954697.png','','','','',0,0,0,0,0,'\n<p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'><span style=\"font-weight: 700;\"><span style=\"background: rgb(255, 236, 209);\">WE ARE EXPERT IN SHOPIFY BRANDED STORE DESIGN</span></span>&nbsp;&#11088;</p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'><br></p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>Make your&nbsp;<span style=\"background: rgb(255, 236, 209);\">shopify profitable website, shopify store or Dropshipping store</span>&nbsp;<span style=\"background: rgb(255, 236, 209);\">Extraordinary and Expand</span>&nbsp;your sales to&nbsp;<span style=\"background: rgb(255, 236, 209);\">NEXT LEVEL</span></p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'><br></p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>Are you looking&nbsp;<span style=\"background: rgb(255, 236, 209);\">PROFESSIONAL SHOPIFY EXPERT</span>&nbsp;to design a stunning profitable shopify website / shopify store for your business ? Or want to Professional look of your old shopify website so you can make more&nbsp;<span style=\"background: rgb(255, 236, 209);\">MONEY</span>&nbsp;? Our&nbsp;<span style=\"background: rgb(255, 236, 209);\">SHOPIFY WEBSITE DESIGNERS</span>&nbsp;know how to gain more customers traffic and increase sales with product shopify store.</p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'><br></p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>&#11088;<span style=\"font-weight: 700;\"><span style=\"background: rgb(255, 236, 209);\">&nbsp;MY TEAM PROVIDE :</span></span></p><ul style=\'list-style: none none; margin-right: 5px; margin-bottom: 0px; margin-left: 5px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Creation fully custom responsive profitable shopify store with best selling products.</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Full customize shopify website through admin panel.</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Add your company or brand logo.</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Slider integration.</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Add products / categories / collections.</li><li style=\"margin: 0px 0px 0px 24px; outline: 0px; padding: 0px; list-style: outside none disc;\">Create necessary pages (contact, about, faq, privacy policy etc).</li></ul>\n','','php','no',0,'','yes','',2,1,'0',1,0,0,0,'active'),
(4,'gjgsdjgj','gjgsdjgj',1,2,'0','Screenshot 2022-07-03 at 10.58.23 PM_1656982547.png','','','','\nbig_buck_bunny_720p_20mb_1656982647.mp4\r\n\n',0,0,0,0,0,'\n<p>jhkhkhjkhkjhkjhjkhkjhjkhjkhjk new test</p>\r\n\n','jhkhkjhkhj test only','html,php,wordpress','no',0,'','yes','',3,1,'0',1,1,5,18,'active'),
(5,'This is for testing','this-is-for-testing',1,2,'0','WhatsApp Image 2022-06-29 at 12.30.02 PM_1656989213.png','','','','',0,0,0,0,0,'\n<p>This is for testing&nbsp;This is for testing&nbsp;This is for testing&nbsp;This is for testing&nbsp;This is for testingThis is for testingThis is for testingThis is for testingThis is for testingThis is for testingThis is for testingThis is for testing<br></p>\n','','wordpress,seo,logo','no',0,'','yes','',5,1,'0',1,0,0,15,'active'),
(6,'I will perform pen tests for websites, servers and networks\r\n','i-will-perform-pen-tests-for-websites-servers-and-networks',6,63,'0','Screenshot 2022-04-25 at 9.26.30 PM_1656990079.png','','','','',0,0,0,0,0,'\n<p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>I can perform Black box, Grey box and White box. (Depending on requirements)</p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>Deliverable include consolidated report, having an organization monetary positive impact.</p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>For more information feel free to contact.</p><p style=\'margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; padding: 0px; color: rgb(98, 100, 106); font-family: Macan, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px;\'>Thanks.</p>\n','','secutiry,pen testing','no',0,'','no','',2,1,'0',1,0,0,15,'active'),
(7,'agsggaHSGGSHa','agsggahsggsha',1,2,'0','Frame 3_1657769401.png','Screen Shot 2022-07-13 at 12.01.54 AM_1657769409.png','','','',0,0,0,0,0,'\n<p>amsnajsdjkahsdjkhaskdhas jkd. hdk askdhakd ka dkjash jkashd kjhas dkjsjk djkahsdjkashd jaks dhjkas djkas djkahs djkhas dhkjasd kjas dkjasdhjk asdjk hajsk dhkasd</p>\n','','logo','no',0,'','no','',2,1,'0',1,0,0,13,'active'),
(8,'I will create web page ','i-will-create-web-page',1,7,'0','dashboard_1664199066.png','','','','',0,0,0,0,0,'\n<p>asdffgg</p>\n','','php,sql','no',0,'','no','',3,1,'0',1,1,0,0,'active');

/*Table structure for table `proposals_extras` */

DROP TABLE IF EXISTS `proposals_extras`;

CREATE TABLE `proposals_extras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposals_extras` */

insert  into `proposals_extras`(`id`,`proposal_id`,`name`,`price`) values 
(1,1,'Customisation of theme ',25);

/*Table structure for table `proposals_faq` */

DROP TABLE IF EXISTS `proposals_faq`;

CREATE TABLE `proposals_faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proposals_faq` */

insert  into `proposals_faq`(`id`,`proposal_id`,`title`,`content`) values 
(1,1,'What is this?','This is a gig'),
(2,1,'What is your name','My name is this..');

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `purchase_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_fee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `purchases` */

insert  into `purchases`(`purchase_id`,`seller_id`,`order_id`,`reason`,`amount`,`processing_fee`,`method`,`date`) values 
(1,3,1,'order','10','','shopping_balance','July 04, 2022'),
(2,3,2,'order','25','','shopping_balance','July 04, 2022'),
(3,2,3,'order','56','','shopping_balance','July 05, 2022'),
(4,2,4,'order','10','','shopping_balance','July 05, 2022'),
(5,2,6,'featured_listing','10','','shopping_balance','July 04, 2022'),
(6,3,5,'order','5','','shopping_balance','August 12, 2022'),
(7,2,6,'order','10','','shopping_balance','September 05, 2022'),
(8,3,7,'order','10','','shopping_balance','September 05, 2022'),
(9,2,6,'order_tip','5','','shopping_balance','September 05, 2022'),
(10,3,4,'featured_listing','10','','shopping_balance','September 05, 2022'),
(11,2,1,'featured_listing','10','','shopping_balance','September 05, 2022'),
(12,2,6,'featured_listing','10','','shopping_balance','September 05, 2022');

/*Table structure for table `recent_proposals` */

DROP TABLE IF EXISTS `recent_proposals`;

CREATE TABLE `recent_proposals` (
  `recent_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  PRIMARY KEY (`recent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `recent_proposals` */

insert  into `recent_proposals`(`recent_id`,`seller_id`,`proposal_id`) values 
(9,5,1),
(11,6,1),
(15,3,5),
(18,2,4),
(21,3,1);

/*Table structure for table `referrals` */

DROP TABLE IF EXISTS `referrals`;

CREATE TABLE `referrals` (
  `referral_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `referred_id` int(10) NOT NULL,
  `comission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`referral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `referrals` */

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reporter_id` int(10) NOT NULL,
  `content_id` int(10) NOT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

insert  into `reports`(`id`,`reporter_id`,`content_id`,`content_type`,`reason`,`additional_information`,`date`,`status`) values 
(1,3,1,'proposal','Non Original Content','please check','July 18, 2022','');

/*Table structure for table `revenues` */

DROP TABLE IF EXISTS `revenues`;

CREATE TABLE `revenues` (
  `revenue_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`revenue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `revenues` */

insert  into `revenues`(`revenue_id`,`seller_id`,`order_id`,`reason`,`amount`,`date`,`end_date`,`status`) values 
(1,2,1,'order','8','July 05, 2022','July 05, 2022 12:21:53','cleared'),
(2,3,6,'order','8','September 06, 2022','September 06, 2022 03:26:12','cleared'),
(3,3,6,'order_tip','5','September 06, 2022','September 06, 2022 03:31:01','cleared');

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) NOT NULL,
  `work_id` int(10) NOT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sales` */

insert  into `sales`(`id`,`buyer_id`,`work_id`,`payment_method`,`amount`,`profit`,`processing_fee`,`action`,`date`) values 
(1,3,1,'shopping_balance','10','0','0','order','2022-07-04'),
(2,3,2,'shopping_balance','25','0','0','order','2022-07-04'),
(3,3,1,'shopping_balance','10','2','0','order_completed','2022-07-04'),
(4,2,3,'shopping_balance','56','0','0','order','2022-07-05'),
(5,2,4,'shopping_balance','10','0','0','order','2022-07-05'),
(6,2,6,'shopping_balance','10','10','0','featured_fee','2022-07-04'),
(7,3,5,'shopping_balance','5','0','0','order','2022-08-12'),
(8,2,6,'shopping_balance','10','0','0','order','2022-09-05'),
(9,3,7,'shopping_balance','10','0','0','order','2022-09-05'),
(10,2,6,'shopping_balance','10','2','0','order_completed','2022-09-05'),
(11,2,6,'shopping_balance','5','0','0','order_tip','2022-09-05'),
(12,3,4,'shopping_balance','10','10','0','featured_fee','2022-09-05'),
(13,2,1,'shopping_balance','10','10','0','featured_fee','2022-09-05'),
(14,2,6,'shopping_balance','10','10','0','featured_fee','2022-09-05');

/*Table structure for table `section_boxes` */

DROP TABLE IF EXISTS `section_boxes`;

CREATE TABLE `section_boxes` (
  `box_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `box_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `section_boxes` */

insert  into `section_boxes`(`box_id`,`language_id`,`box_title`,`box_desc`,`box_image`,`isS3`) values 
(4,1,'Your Terms','Whatever you need to simplify your to do list, no matter your budget.\r\n','time.png',0),
(5,1,'Your Timeline','Find services based on your goals and deadlines, its that simple.','desk.png',0),
(6,1,'Your Safety','Your payment is always secure, Hiremyprofile is built to protect your peace of mind.','tv.png',0);

/*Table structure for table `seller_accounts` */

DROP TABLE IF EXISTS `seller_accounts`;

CREATE TABLE `seller_accounts` (
  `account_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `withdrawn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `current_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `used_purchases` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pending_clearance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `month_earnings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_accounts` */

insert  into `seller_accounts`(`account_id`,`seller_id`,`withdrawn`,`current_balance`,`used_purchases`,`pending_clearance`,`month_earnings`) values 
(1,1,'0','0','0','0','0'),
(2,2,'0','5897','111','0','8'),
(3,3,'0','4953','60','0','13'),
(4,4,'0','0','0','0','0'),
(5,5,'0','0','0','0','0'),
(6,6,'0','0','0','0','0'),
(7,7,'0','0','0','0','0'),
(8,8,'0','0','0','0','0'),
(9,9,'0','0','0','0','0'),
(10,10,'0','0','0','0','0'),
(11,11,'0','0','0','0','0'),
(12,12,'0','0','0','0','0');

/*Table structure for table `seller_languages` */

DROP TABLE IF EXISTS `seller_languages`;

CREATE TABLE `seller_languages` (
  `language_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_languages` */

insert  into `seller_languages`(`language_id`,`language_title`) values 
(1,'English'),
(2,'Spanish'),
(3,'German'),
(4,'Punjabi'),
(5,'Hindi');

/*Table structure for table `seller_levels` */

DROP TABLE IF EXISTS `seller_levels`;

CREATE TABLE `seller_levels` (
  `level_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_levels` */

insert  into `seller_levels`(`level_id`) values 
(1),
(2),
(3),
(4);

/*Table structure for table `seller_levels_meta` */

DROP TABLE IF EXISTS `seller_levels_meta`;

CREATE TABLE `seller_levels_meta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `level_id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_levels_meta` */

insert  into `seller_levels_meta`(`id`,`language_id`,`level_id`,`title`) values 
(1,1,1,'New Seller'),
(2,1,2,'Level One'),
(3,1,3,'Level Two'),
(4,1,4,'Top Rated A');

/*Table structure for table `seller_payment_settings` */

DROP TABLE IF EXISTS `seller_payment_settings`;

CREATE TABLE `seller_payment_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `level_id` int(10) NOT NULL,
  `commission_percentage` int(10) NOT NULL,
  `payout_day` int(100) NOT NULL,
  `payout_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payout_anyday` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_payment_settings` */

insert  into `seller_payment_settings`(`id`,`level_id`,`commission_percentage`,`payout_day`,`payout_time`,`payout_anyday`) values 
(1,1,20,26,'15:00',0),
(2,2,15,20,'01:00',0),
(3,3,10,15,'01:00',0),
(4,4,5,1,'03:00',1);

/*Table structure for table `seller_reviews` */

DROP TABLE IF EXISTS `seller_reviews`;

CREATE TABLE `seller_reviews` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `review_seller_id` int(10) NOT NULL,
  `seller_rating` int(10) NOT NULL,
  `seller_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_reviews` */

insert  into `seller_reviews`(`review_id`,`order_id`,`review_seller_id`,`seller_rating`,`seller_review`) values 
(1,1,2,5,'good '),
(2,6,3,5,'Great Emp......................');

/*Table structure for table `seller_skills` */

DROP TABLE IF EXISTS `seller_skills`;

CREATE TABLE `seller_skills` (
  `skill_id` int(10) NOT NULL AUTO_INCREMENT,
  `skill_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_skills` */

insert  into `seller_skills`(`skill_id`,`skill_title`) values 
(1,'PHP'),
(2,'wordpress'),
(3,'Vue js'),
(4,'web designing'),
(5,'ui/ux');

/*Table structure for table `seller_type_status` */

DROP TABLE IF EXISTS `seller_type_status`;

CREATE TABLE `seller_type_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `message_group_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seller_type_status` */

insert  into `seller_type_status`(`id`,`seller_id`,`message_group_id`,`time`,`status`) values 
(1,3,'697425537','2022-07-04 20:44:53','untyping'),
(2,2,'697425537','2022-07-06 02:15:17','typing'),
(3,5,'1633735556','2022-07-04 21:37:50','untyping'),
(4,2,'1633735556','2022-07-06 02:14:59','typing');

/*Table structure for table `sellers` */

DROP TABLE IF EXISTS `sellers`;

CREATE TABLE `sellers` (
  `seller_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_wallet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_payouts` int(100) NOT NULL,
  `seller_paypal_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_payoneer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_m_account_number` bigint(100) NOT NULL,
  `seller_m_account_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_cover_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_image_s3` int(10) NOT NULL,
  `seller_cover_image_s3` int(10) NOT NULL,
  `seller_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_headline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_level` int(10) NOT NULL,
  `seller_language` int(10) NOT NULL,
  `seller_recent_delivery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_rating` int(10) NOT NULL,
  `seller_offers` int(10) NOT NULL,
  `seller_referral` int(10) NOT NULL,
  `seller_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_verification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_vacation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_vacation_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_vacation_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_register_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_sound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `enable_notifications` int(10) NOT NULL DEFAULT 1,
  `seller_activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` int(10) NOT NULL,
  `inbox_push_notification_status` tinyint(1) NOT NULL,
  `order_message_push_notification_status` tinyint(1) NOT NULL,
  `order_update_push_notification_status` tinyint(1) NOT NULL,
  `buyer_req_push_notification_status` tinyint(1) NOT NULL,
  `myproposal_push_notification_status` tinyint(1) NOT NULL,
  `myaccount_push_notification_status` int(11) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sellers` */

insert  into `sellers`(`seller_id`,`seller_name`,`seller_user_name`,`seller_email`,`seller_wallet`,`seller_phone`,`seller_payouts`,`seller_paypal_email`,`seller_payoneer_email`,`seller_m_account_number`,`seller_m_account_name`,`seller_pass`,`seller_image`,`seller_cover_image`,`seller_image_s3`,`seller_cover_image_s3`,`seller_country`,`seller_city`,`seller_headline`,`seller_about`,`seller_level`,`seller_language`,`seller_recent_delivery`,`seller_rating`,`seller_offers`,`seller_referral`,`seller_ip`,`seller_verification`,`seller_vacation`,`seller_vacation_reason`,`seller_vacation_message`,`seller_register_date`,`enable_sound`,`enable_notifications`,`seller_activity`,`seller_timezone`,`seller_status`,`device_type`,`device_token`,`inbox_push_notification_status`,`order_message_push_notification_status`,`order_update_push_notification_status`,`buyer_req_push_notification_status`,`myproposal_push_notification_status`,`myaccount_push_notification_status`) values 
(1,'saeed ansari','sadiss','john.vasplus@gmail.com','','+92 3145224850',0,'','',0,'','$2y$10$5./B.uLS70V/4ClpwinKnep71eFNX4vCkwmqAkRIL5nrQRQudQaFa','','',0,0,'Pakistan','','','',1,0,'none',0,10,689475593,'2407:aa80:314:a013:cd9c:31b9:d93d:3a1','1329537456','off','','','July 03, 2022','yes',1,'2022-07-03 04:21:30','Asia/Karachi','online','',0,0,0,0,0,0,0),
(2,'test client','testclient','test@test.com','','+91 ',0,'','',0,'','$2y$10$gbUovS1RYqv1e16GdB45Kud9lkGhUEYr6nc3JaslLz9TGaX/h.u8O','','',0,0,'India','','','',1,0,'July 04, 2022',100,6,1650209321,'::1','ok','off','','','July 03, 2022','yes',1,'2022-09-27 14:06:12','Asia/Kolkata','online','',0,0,0,0,0,0,0),
(3,'testseller ','testseller','testseller@123gmail.com','','+91 998989898923',0,'','',0,'','$2y$10$u8EiK.dfcNuyihi7Az4EWOLYiSHN/SfN5Nh7RBIC/2rQ4nqCVL3eu','','',0,0,'USA','ttest','','',1,1,'September 05, 2022',100,10,467610880,'::1','ok','off','','','July 03, 2022','yes',1,'2022-09-27 13:53:56','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(4,'testseller1','testseller1','testseller@1234gmail.com','','+93 998989898923',0,'','',0,'','$2y$10$fKZNJlCJbZTDP5NmlH4.IebIu7hrWeisSfstMWYRAsft5GnSGkQUC','','',0,0,'USA','','','',1,0,'none',0,10,1815194636,'59.89.18.216','ok','off','','','July 04, 2022','yes',1,'2022-07-04 21:35:44','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(5,'testseller2','testseller2','test@test123.com','','+91 998989898923',0,'','',0,'','$2y$10$bi8G7KONeO2nb2E.ChnKN.3t0O2New5SeqmbpQKLT1McShmZRlECO','','',0,0,'India','','','',1,0,'none',0,10,2008067736,'59.89.18.216','ok','off','','','July 04, 2022','yes',1,'2022-07-04 21:48:43','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(6,'Nish','Nish','marwaha.nishtha20@gmail.com','','+91 7015751296',0,'','',0,'','$2y$10$tVfHviOFIC4lkMeRa3/M2ul/3W778CbSot879THIKHG6K1mnZjC2y','','',0,0,'India','','','',1,0,'none',0,10,2012900884,'59.89.18.216','ok','off','','','July 04, 2022','yes',1,'2022-07-05 04:46:35','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(7,'Charvi','charvi','charvi@gmail.com','','+93 123443434',0,'','',0,'','$2y$10$TGztse.77yFavIBRLOaL4O4qQwdt9ImtTfIZWT.IvRo.WHbA3q//K','','',0,0,'India','','','',1,0,'none',0,10,1517461044,'117.222.238.170','ok','off','','','July 13, 2022','yes',1,'2022-07-13 22:04:17','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(8,'Raj M','raj','raj@gmail.com','','+91 123456789',0,'','',0,'','$2y$10$PLEQeDJvioe.tCW9Ky3kH.3rC0aul6Wc4ZPKZqdHp7/8bjW1vjl0C','','',0,0,'India','','','',1,0,'none',0,10,1190174763,'59.89.28.206','ok','off','','','July 15, 2022','yes',1,'2022-07-15 12:25:46','Asia/Kolkata','online','',0,0,0,0,0,0,0),
(9,'Nishtha','NishM','marwaha.nishtha20@01gmail.com','','+93 9654087707',0,'','',0,'','$2y$10$O8lHByPQMtWlWWqR134QOun/Bn2Wrhvb1jHMcpurQG/xS7CVj1pRG','','',0,0,'India','','','',1,0,'none',0,10,804541231,'59.89.22.109','2087425845','off','','','July 15, 2022','yes',1,'2022-07-16 15:04:37','Asia/Kolkata','online','',0,0,0,0,0,0,0),
(10,'Nishtha ','Nish01','itsoftexpert01@gmail.com','','+93 9992778523',0,'','',0,'','$2y$10$3UjGR7UGy5Wn2dZhUzabwOUIcFqTrkarPFU2woI8hY92dI0fdmsta','','',0,0,'India','','','',1,0,'none',0,10,528475981,'61.0.53.37','ok','off','','','July 28, 2022','yes',1,'2022-07-28 22:05:45','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(11,'Nishtha112','Nishtha012','itsoftexpert12@gmail.com','','+93 9992778523',0,'','',0,'','$2y$10$A7ALtk/ue/iV1sIOktc7nONyAmzs0IsoVYVc1BnjDFLAProv1H6MW','','',0,0,'India','','','',1,0,'none',0,10,172732384,'61.0.53.37','1527250477','off','','','July 28, 2022','yes',1,'2022-07-28 23:43:06','Asia/Kolkata','offline','',0,0,0,0,0,0,0),
(12,'itsoftexpert111','itsoftexpert111','itsoftexpert11@gmail.com','',' ',0,'','',0,'','$2y$10$/4qXRHDoUIJ9aibd1JoUb.vMRmCg9Afbpt3MaKdOpdcYxUD5tnxUK','','',0,0,'India','','','',1,0,'none',0,10,622815157,'106.204.36.5','ok','off','','','July 29, 2022','yes',1,'2022-09-03 02:25:06','Asia/Kolkata','offline','',0,0,0,0,0,0,0);

/*Table structure for table `send_offers` */

DROP TABLE IF EXISTS `send_offers`;

CREATE TABLE `send_offers` (
  `offer_id` int(10) NOT NULL AUTO_INCREMENT,
  `request_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `send_offers` */

insert  into `send_offers`(`offer_id`,`request_id`,`sender_id`,`proposal_id`,`description`,`delivery_time`,`amount`,`status`) values 
(1,2,2,1,'page-sidebarpage-sidebarpage-sidebarpage-sidebar','4 Days','100','active'),
(2,4,2,1,'I can do this, please chat ','1 Day','50','active'),
(3,5,2,2,'yyy','1 Day','5','active'),
(4,5,2,2,'yyy','1 Day','5','active');

/*Table structure for table `site_currencies` */

DROP TABLE IF EXISTS `site_currencies`;

CREATE TABLE `site_currencies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `currency_id` int(10) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `site_currencies` */

/*Table structure for table `skills_relation` */

DROP TABLE IF EXISTS `skills_relation`;

CREATE TABLE `skills_relation` (
  `relation_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `skill_id` int(10) NOT NULL,
  `skill_level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `skills_relation` */

insert  into `skills_relation`(`relation_id`,`seller_id`,`skill_id`,`skill_level`) values 
(1,5,1,'Intermediate'),
(2,5,2,'Expert'),
(3,2,1,'Expert'),
(4,2,2,'Expert'),
(5,2,3,'Expert'),
(6,2,4,'Expert'),
(7,2,5,'Expert'),
(10,3,1,'Beginner'),
(11,3,2,'Intermediate'),
(15,3,3,'Intermediate'),
(16,3,4,'Intermediate');

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `slide_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `slider` */

insert  into `slider`(`slide_id`,`language_id`,`slide_name`,`slide_desc`,`slide_image`,`slide_url`,`isS3`) values 
(32,1,'','','art-artist-canvas-374054.jpg','https://www.pixinal.com',0),
(33,1,'','','art-dark-ethnic-1038041.jpg','https://www.gigtodo.com',0);

/*Table structure for table `smtp_settings` */

DROP TABLE IF EXISTS `smtp_settings`;

CREATE TABLE `smtp_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `library` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_smtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `smtp_settings` */

insert  into `smtp_settings`(`id`,`library`,`enable_smtp`,`host`,`port`,`secure`,`username`,`password`) values 
(1,'php_mailer','no','','','','','');

/*Table structure for table `spam_words` */

DROP TABLE IF EXISTS `spam_words`;

CREATE TABLE `spam_words` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `spam_words` */

insert  into `spam_words`(`id`,`word`) values 
(1,'PayPal'),
(2,'payoneer'),
(3,'pay'),
(4,'mobile'),
(5,'contact'),
(6,'email'),
(7,'skype'),
(8,'number'),
(9,'.com'),
(10,'direct'),
(12,'Pay'),
(13,'Poop'),
(15,'bad word'),
(16,'siva'),
(17,'Machi'),
(18,'city'),
(19,'facebook'),
(20,'$kyp');

/*Table structure for table `starred_messages` */

DROP TABLE IF EXISTS `starred_messages`;

CREATE TABLE `starred_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `message_group_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `starred_messages` */

/*Table structure for table `support_conversations` */

DROP TABLE IF EXISTS `support_conversations`;

CREATE TABLE `support_conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL,
  `attachment` text DEFAULT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `support_conversations` */

/*Table structure for table `support_tickets` */

DROP TABLE IF EXISTS `support_tickets`;

CREATE TABLE `support_tickets` (
  `ticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(10) NOT NULL,
  `number` int(11) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_rule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isS3` int(10) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `support_tickets` */

insert  into `support_tickets`(`ticket_id`,`enquiry_id`,`number`,`sender_id`,`subject`,`message`,`order_number`,`order_rule`,`attachment`,`date`,`status`,`isS3`) values 
(1,3,502880928,3,'I need a supportI need a support','I need a supportI need a supportI need a supportI need a supportI need a supportI need a supportI need a supportI need a supportI need a supportI need a support','','','','11:33 Jul 03, 2022','processing ',0),
(2,1,1853894212,3,'I need a support','test support working','76566','Buyer','','06:32 Aug 30, 2022','open',0);

/*Table structure for table `temp_extras` */

DROP TABLE IF EXISTS `temp_extras`;

CREATE TABLE `temp_extras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `temp_extras` */

/*Table structure for table `temp_orders` */

DROP TABLE IF EXISTS `temp_orders`;

CREATE TABLE `temp_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `content_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_id` int(10) NOT NULL,
  `revisions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minutes` int(10) NOT NULL,
  `video` int(10) NOT NULL,
  `extras` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `temp_orders` */

/*Table structure for table `terms` */

DROP TABLE IF EXISTS `terms`;

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `term_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `terms` */

/*Table structure for table `top_proposals` */

DROP TABLE IF EXISTS `top_proposals`;

CREATE TABLE `top_proposals` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `top_proposals` */

/*Table structure for table `unread_messages` */

DROP TABLE IF EXISTS `unread_messages`;

CREATE TABLE `unread_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `message_group_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unread_messages` */

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `video_id` int(10) NOT NULL AUTO_INCREMENT,
  `language_id` int(10) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_section` int(10) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `videos` */

insert  into `videos`(`video_id`,`language_id`,`video_title`,`video_desc`,`video_url`,`video_section`) values 
(1,1,'Tim and Dan joo, Co founder','When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.','https://www.youtube.com/embed/9xwazD5SyVg',1),
(2,1,'Tim and Dan jo 1','When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.','https://www.youtube.com/embed/9xwazD5SyVg',2),
(3,1,'Tim and Dan jo 2','When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.','https://www.youtube.com/embed/9xwazD5SyVg',3),
(4,1,'Tim and Dan joo, Co founder 2','tets test etest ','https://www.youtube.com/embed/9xwazD5SyVg',1),
(5,1,'Tim and Dan joo, Co founder 3','When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.','https://www.youtube.com/embed/9xwazD5SyVg',1),
(6,1,'Tim and Dan joo, Co founder 3','When you want to create a business bigger than your self, you need a lots of help.That\'s what fiverr does.','https://www.youtube.com/embed/9xwazD5SyVg',1);

/*Table structure for table `withdrawals` */

DROP TABLE IF EXISTS `withdrawals`;

CREATE TABLE `withdrawals` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `withdrawals` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
