/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.7.33 : Database - laravel-adminpanel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel-adminpanel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laravel-adminpanel`;

/*Table structure for table `body_parts` */

DROP TABLE IF EXISTS `body_parts`;

CREATE TABLE `body_parts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `body_parts` */

/*Table structure for table `genders` */

DROP TABLE IF EXISTS `genders`;

CREATE TABLE `genders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `korean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spanish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vietnamese` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `genders` */

insert  into `genders`(`id`,`english`,`korean`,`spanish`,`vietnamese`) values 
(1,'Male','남성','Masculino','Nam giới'),
(2,'Female','여자','Mujer','Giống cái');

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `languages` */

insert  into `languages`(`id`,`language`) values 
(3,'vietnamese'),
(4,'spanish');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_100000_create_password_resets_table',1),
(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
(3,'2021_11_24_000001_create_permissions_table',1),
(4,'2021_11_24_000002_create_roles_table',1),
(5,'2021_11_24_000003_create_users_table',1),
(6,'2021_11_24_000004_create_pains_table',1),
(7,'2021_11_24_000005_create_pain_types_table',1),
(8,'2021_11_24_000006_create_permission_role_pivot_table',1),
(9,'2021_11_24_000007_create_role_user_pivot_table',1),
(10,'2021_11_24_000008_add_relationship_fields_to_pains_table',1),
(11,'2021_11_24_000009_add_relationship_fields_to_pain_types_table',1);

/*Table structure for table `newspaper_details` */

DROP TABLE IF EXISTS `newspaper_details`;

CREATE TABLE `newspaper_details` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `newspaper_id` int(11) DEFAULT NULL,
  `page_no` int(20) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `newspaper_details` */

insert  into `newspaper_details`(`id`,`newspaper_id`,`page_no`,`image_path`,`created_at`,`deleted_at`,`updated_at`) values 
(6,1,3,'uploads/b5.png','2022-04-03 00:29:42',NULL,'2022-04-03 00:29:42');

/*Table structure for table `newspapers` */

DROP TABLE IF EXISTS `newspapers`;

CREATE TABLE `newspapers` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `newspapers` */

insert  into `newspapers`(`id`,`title`,`date`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'test newspaper','2022-04-03 00:00:00','2022-04-03 00:22:01','2022-04-03 00:22:13',NULL);

/*Table structure for table `pain_severities` */

DROP TABLE IF EXISTS `pain_severities`;

CREATE TABLE `pain_severities` (
  `id` int(20) NOT NULL,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `korean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spanish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vietnamese` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pain_severities` */

/*Table structure for table `pain_types` */

DROP TABLE IF EXISTS `pain_types`;

CREATE TABLE `pain_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `korean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spanish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vietnamese` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pain_id` bigint(20) unsigned NOT NULL,
  `created_by_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pain_fk_5411924` (`pain_id`),
  KEY `created_by_fk_5412100` (`created_by_id`),
  CONSTRAINT `created_by_fk_5412100` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  CONSTRAINT `pain_fk_5411924` FOREIGN KEY (`pain_id`) REFERENCES `pains` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pain_types` */

/*Table structure for table `pains` */

DROP TABLE IF EXISTS `pains`;

CREATE TABLE `pains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `korean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spanish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vietnamese` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_5412099` (`created_by_id`),
  CONSTRAINT `created_by_fk_5412099` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pains` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('admin@admin.com','$2y$10$eBVKzYBsr7H4Vghx6/fdKe3KnZ9Q3xOdTvE.jyG3JtBZRq37W3sFy','2022-02-07 16:07:27'),
('asaboor.art@gmail.com','$2y$10$.ohrwHSb2a9eOTfQhNo2.ejO5rqoZjhVxXfPwUt8BQVeR9km/AM5G','2022-02-07 16:34:42'),
('ar8497376@gmail.com','$2y$10$J0kKV2L7e0GA50bqRqHbm.Oipzy615dqB0VPz9CE17kl982hWLn3K','2022-02-08 13:03:03'),
('abdulrehmanahmed20@gmail.com','$2y$10$SZ6sbCXpBY3G1HR8cBzgGusQgHvBsFcuBF4wZQiqmDNLJiiFh8YS6','2022-02-08 13:33:56'),
('b17101004.abdulrehman@gmail.com','$2y$10$CPO2386Z1RS75x/quJ7z4ehaU5/OUCRoDy2H.em9GZPYeYYkkFmkm','2022-02-08 13:41:57');

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  KEY `role_id_fk_5411837` (`role_id`),
  KEY `permission_id_fk_5411837` (`permission_id`),
  CONSTRAINT `permission_id_fk_5411837` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_5411837` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`role_id`,`permission_id`) values 
(1,1),
(1,42),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(1,15),
(1,16),
(1,27),
(2,4),
(2,5),
(2,6),
(2,9),
(2,10),
(2,12),
(2,14),
(2,16),
(2,27),
(1,30),
(1,31),
(1,32),
(1,33),
(1,34),
(1,35),
(1,36),
(1,37),
(1,38),
(1,39),
(1,40),
(1,41),
(1,42),
(1,43),
(1,44),
(1,45),
(1,46),
(1,47),
(1,48);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'user_management_access',NULL,'2021-12-20 12:37:19',NULL),
(2,'permission_create',NULL,NULL,NULL),
(3,'permission_edit',NULL,NULL,NULL),
(4,'permission_show',NULL,NULL,NULL),
(5,'permission_delete',NULL,NULL,NULL),
(6,'permission_access',NULL,NULL,NULL),
(7,'role_create',NULL,NULL,NULL),
(8,'role_edit',NULL,NULL,NULL),
(9,'role_show',NULL,NULL,NULL),
(10,'role_delete',NULL,NULL,NULL),
(11,'role_access',NULL,NULL,NULL),
(12,'user_create',NULL,NULL,NULL),
(13,'user_edit',NULL,NULL,NULL),
(14,'user_show',NULL,NULL,NULL),
(15,'user_delete',NULL,NULL,NULL),
(16,'user_access',NULL,NULL,NULL),
(27,'profile_password_edit',NULL,NULL,NULL),
(29,'abcd','2021-12-20 18:06:36','2022-01-08 15:06:30','2022-01-08 15:06:30'),
(30,'pain_access',NULL,NULL,NULL),
(31,'pain_type_access',NULL,NULL,NULL),
(32,'pain_edit',NULL,NULL,NULL),
(33,'pain_create',NULL,NULL,NULL),
(34,'pain_type_edit',NULL,NULL,NULL),
(35,'pain_type_create',NULL,NULL,NULL),
(36,'pain_delete',NULL,NULL,NULL),
(37,'pain_type_delete',NULL,NULL,NULL),
(38,'pain_show',NULL,NULL,NULL),
(39,'pain_type_show',NULL,NULL,NULL),
(40,'newspaper_access',NULL,NULL,NULL),
(41,'newspaper_edit',NULL,NULL,NULL),
(42,'newspaper_show',NULL,NULL,NULL),
(43,'newspaper_delete',NULL,NULL,NULL),
(44,'newspaper_create',NULL,NULL,NULL),
(45,'newspaperdetails_access',NULL,NULL,NULL),
(46,'newspaperdetails_create',NULL,NULL,NULL),
(47,'newspaperdetails_edit',NULL,NULL,NULL),
(48,'newspaperdetails_delete',NULL,NULL,NULL);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  KEY `user_id_fk_5411846` (`user_id`),
  KEY `role_id_fk_5411846` (`role_id`),
  CONSTRAINT `role_id_fk_5411846` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_5411846` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`user_id`,`role_id`) values 
(1,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Admin',NULL,NULL,NULL),
(2,'User','2022-02-28 15:26:34','2021-12-22 11:14:16',NULL);

/*Table structure for table `user_records` */

DROP TABLE IF EXISTS `user_records`;

CREATE TABLE `user_records` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `pain_id` bigint(20) unsigned DEFAULT NULL,
  `pain_type_id` bigint(20) unsigned DEFAULT NULL,
  `severity_id` int(20) DEFAULT NULL,
  `body_part_id` int(20) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pains` (`pain_id`),
  KEY `fk_users` (`user_id`),
  KEY `fk_pain_types` (`pain_type_id`),
  KEY `f_severity` (`severity_id`),
  KEY `fk_body_parts` (`body_part_id`),
  CONSTRAINT `f_severity` FOREIGN KEY (`severity_id`) REFERENCES `pain_severities` (`id`),
  CONSTRAINT `fk_body_parts` FOREIGN KEY (`body_part_id`) REFERENCES `body_parts` (`id`),
  CONSTRAINT `fk_pain_types` FOREIGN KEY (`pain_type_id`) REFERENCES `pain_types` (`id`),
  CONSTRAINT `fk_pains` FOREIGN KEY (`pain_id`) REFERENCES `pains` (`id`),
  CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_records` */

/*Table structure for table `user_selected_pains` */

DROP TABLE IF EXISTS `user_selected_pains`;

CREATE TABLE `user_selected_pains` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pain_table_id` bigint(20) NOT NULL,
  `severity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_selected_pains` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `language_id` int(20) DEFAULT NULL,
  `gender_id` int(20) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_genders` (`gender_id`),
  KEY `fk_languages` (`language_id`),
  CONSTRAINT `fk_genders` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `fk_languages` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`first_name`,`last_name`,`email`,`status`,`language_id`,`gender_id`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Alex','Alex','Hales','admin@admin.com','Active',3,1,'2022-02-09 13:41:18','$2y$10$Hcv9P6xytiSADZQp5zV2m.ku8b5bRwh.f5pIWib03RyM1UCJIxflm',NULL,NULL,'2022-03-07 08:00:37',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
