
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

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `laravoyager` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `laravoyager`;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2023-01-11 15:03:30','2023-01-11 15:03:30'),(2,NULL,1,'Category 2','category-2','2023-01-11 15:03:30','2023-01-11 15:03:30');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(29,5,'id','number','ID',1,0,0,0,0,0,NULL,1),(30,5,'author_id','text','Author',1,0,1,1,0,1,NULL,2),(31,5,'category_id','text','Category',1,0,1,1,1,0,NULL,3),(32,5,'title','text','Title',1,1,1,1,1,1,NULL,4),(33,5,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,5),(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,6),(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),(37,5,'meta_description','text_area','Meta Description',1,0,1,1,1,1,NULL,9),(38,5,'meta_keywords','text_area','Meta Keywords',1,0,1,1,1,1,NULL,10),(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,13),(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,NULL,14),(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,NULL,15),(44,6,'id','number','ID',1,0,0,0,0,0,NULL,1),(45,6,'author_id','text','Author',1,0,0,0,0,0,NULL,2),(46,6,'title','text','Title',1,1,1,1,1,1,NULL,3),(47,6,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,4),(48,6,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,5),(49,6,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),(50,6,'meta_description','text','Meta Description',1,0,1,1,1,1,NULL,7),(51,6,'meta_keywords','text','Meta Keywords',1,0,1,1,1,1,NULL,8),(52,6,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),(53,6,'created_at','timestamp','Created At',1,1,1,0,0,0,NULL,10),(54,6,'updated_at','timestamp','Updated At',1,0,0,0,0,0,NULL,11),(55,6,'image','image','Page Image',0,1,1,1,1,1,NULL,12),(60,14,'id','text','Id',1,0,0,0,0,0,'{}',1),(61,14,'nom','text','Nom',0,1,1,1,1,1,'{}',2),(62,14,'sigfox_device','text','Sigfox Device',0,1,1,1,1,1,'{}',3),(63,14,'altitude','text','Altitude',0,1,1,1,1,1,'{}',4),(64,14,'longitude','text','Longitude',0,1,1,1,1,1,'{}',5),(65,14,'latitude','text','Latitude',0,1,1,1,1,1,'{}',6),(66,14,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),(67,14,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(68,15,'id','text','Id',1,0,0,0,0,0,'{}',1),(69,15,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',2),(70,15,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(71,15,'pression','text','Pression',0,1,1,1,1,1,'{}',4),(72,15,'temperature','text','Temperature',0,1,1,1,1,1,'{}',5),(74,15,'balise_id','text','Balise Id',0,1,1,1,1,1,'{}',6),(75,14,'balise_hasmany_releve_balise_relationship','relationship','releve_balises',0,1,1,1,1,1,'{\"model\":\"App\\\\ReleveBalise\",\"table\":\"releve_balises\",\"type\":\"hasMany\",\"column\":\"balise_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"balises\",\"pivot\":\"0\",\"taggable\":null}',9),(76,15,'releve_balise_belongsto_balise_relationship','relationship','balises',0,1,1,1,1,1,'{\"model\":\"App\\\\Balise\",\"table\":\"balises\",\"type\":\"belongsTo\",\"column\":\"balise_id\",\"key\":\"id\",\"label\":\"nom\",\"pivot_table\":\"balises\",\"pivot\":\"0\",\"taggable\":null}',7),(84,19,'id','text','Id',1,1,1,0,0,0,'{}',1),(85,19,'nom','text','Nom',0,1,1,1,1,1,'{}',2),(86,19,'latitude','text','Latitude',0,1,1,1,1,1,'{}',3),(87,19,'longitude','text','Longitude',0,1,1,1,1,1,'{}',4),(88,19,'code_postal','text','Code Postal',0,1,1,1,1,1,'{}',5),(89,19,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',6),(90,19,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(91,20,'id','text','Id',1,1,1,0,0,0,'{}',1),(92,20,'nom_parking','text','Nom Parking',0,1,1,1,1,1,'{}',3),(93,20,'latitude','text','Latitude',0,1,1,1,1,1,'{}',4),(94,20,'longitude','text','Longitude',0,1,1,1,1,1,'{}',5),(95,20,'nombre_place_dispo','text','Nombre Place Dispo',0,1,1,1,1,1,'{}',6),(96,20,'nombre_place_total','text','Nombre Place Total',0,1,1,1,1,1,'{}',7),(97,20,'seuil_critique','text','Seuil Critique',0,1,1,1,1,1,'{}',8),(98,20,'seuil_alerte','text','Seuil Alerte',0,1,1,1,1,1,'{}',9),(99,20,'ville_id','text','Ville Id',1,1,1,1,1,1,'{}',2),(100,20,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',10),(101,20,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',11),(102,21,'id','text','Id',1,1,1,0,0,0,'{}',1),(103,21,'nom_noeud','text','Nom Noeud',0,1,1,1,1,1,'{}',3),(104,21,'type_noeud','text','Type Noeud',0,1,1,1,1,1,'{}',4),(105,21,'dev_eui','text','Dev Eui',0,1,1,1,1,1,'{}',5),(106,21,'parking_id','text','Parking Id',1,1,1,1,1,1,'{}',2),(107,21,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',6),(108,21,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_name_singular` varchar(255) NOT NULL,
  `display_name_plural` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy','','',1,0,NULL,'2023-01-11 15:03:31','2023-01-11 15:03:31'),(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,NULL,'2023-01-11 15:03:31','2023-01-11 15:03:31'),(7,'Balise','balise','Balise','Balises',NULL,'App\\Balise',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2023-01-13 09:07:51','2023-01-13 09:07:51'),(14,'balises','balises','Balise','Balises',NULL,'App\\Balise',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2023-01-13 10:16:09','2023-01-13 10:16:09'),(15,'releve_balises','releve-balises','Releve Balise','Releve Balises',NULL,'App\\ReleveBalise',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2023-03-31 14:03:26','2023-03-31 15:01:09'),(19,'villes','villes','Ville','Villes',NULL,'App\\Models\\Ville',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2024-02-13 09:32:24','2024-02-13 09:34:23'),(20,'parkings','parkings','Parking','Parkings',NULL,'App\\Models\\Parking',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2024-02-13 09:40:43','2024-02-13 09:40:43'),(21,'noeud_loras','noeud-loras','Noeud Lora','Noeud Loras',NULL,'App\\Models\\NoeudLora',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2024-03-19 08:48:06','2024-03-19 08:48:06');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2023-01-11 15:03:30','2023-01-11 15:03:30',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,10,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,11,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,12,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2023-01-11 15:03:30','2023-01-11 15:03:30','voyager.settings.index',NULL),(12,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2023-01-11 15:03:31','2023-01-11 15:03:31','voyager.posts.index',NULL),(13,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2023-01-11 15:03:31','2023-01-11 15:03:31','voyager.pages.index',NULL),(14,1,'Balises','','_self',NULL,NULL,NULL,15,'2023-01-13 09:07:51','2023-01-13 09:07:51','voyager.balise.index',NULL),(21,1,'Balises','','_self',NULL,NULL,NULL,16,'2023-01-13 10:16:09','2023-01-13 10:16:09','voyager.balises.index',NULL),(22,1,'Releve Balises','','_self',NULL,NULL,NULL,17,'2023-03-31 14:03:26','2023-03-31 14:03:26','voyager.releve-balises.index',NULL),(24,1,'Villes','','_self',NULL,NULL,NULL,18,'2024-02-13 09:32:24','2024-02-13 09:32:24','voyager.villes.index',NULL),(25,1,'Parkings','','_self',NULL,NULL,NULL,19,'2024-02-13 09:40:43','2024-02-13 09:40:43','voyager.parkings.index',NULL),(26,1,'Noeud Loras','','_self',NULL,NULL,NULL,20,'2024-03-19 08:48:07','2024-03-19 08:48:07','voyager.noeud-loras.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2023-01-11 15:03:30','2023-01-11 15:03:30');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1),(25,'2016_01_01_000000_create_pages_table',2),(26,'2016_01_01_000000_create_posts_table',2),(27,'2016_02_15_204651_create_categories_table',2),(28,'2017_04_11_000000_alter_post_nullable_fields_table',2),(29,'2024_02_07_084233_create_villes_table',3),(30,'2024_02_07_124144_create_parkings_table',4),(31,'2024_02_07_090432_create_utilisateurs_table',5),(32,'2024_02_13_132819_create_noeud_loras_table',5),(33,'2014_10_12_200000_add_two_factor_columns_to_users_table',6),(34,'2024_04_03_124416_create_sessions_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `noeud_loras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noeud_loras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_noeud` varchar(255) DEFAULT NULL,
  `type_noeud` varchar(255) DEFAULT NULL,
  `dev_eui` varchar(255) DEFAULT NULL,
  `parking_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `noeud_loras_parking_id_foreign` (`parking_id`),
  CONSTRAINT `noeud_loras_parking_id_foreign` FOREIGN KEY (`parking_id`) REFERENCES `parkings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `noeud_loras` WRITE;
/*!40000 ALTER TABLE `noeud_loras` DISABLE KEYS */;
INSERT INTO `noeud_loras` VALUES (1,'D1','Output','1234',4,NULL,'2024-04-10 07:40:13'),(2,'D2','Output','4321',4,NULL,'2024-04-10 07:41:29'),(3,'A1','Output','0000',4,NULL,'2024-04-10 07:41:34'),(4,'D3','Output','7890',2,NULL,'2024-04-10 07:40:13'),(5,'D4','Output','1111',2,NULL,'2024-04-10 07:40:13'),(6,'A2','Output','6542',2,NULL,'2024-04-10 07:40:13');
/*!40000 ALTER TABLE `noeud_loras` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2023-01-11 15:03:31','2023-01-11 15:03:31');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `parkings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parkings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_parking` varchar(255) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `nombre_place_dispo` int(11) DEFAULT NULL,
  `nombre_place_total` int(11) DEFAULT NULL,
  `seuil_critique` varchar(255) DEFAULT NULL,
  `seuil_alerte` varchar(255) DEFAULT NULL,
  `ville_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parkings_ville_id_foreign` (`ville_id`),
  CONSTRAINT `parkings_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `parkings` WRITE;
/*!40000 ALTER TABLE `parkings` DISABLE KEYS */;
INSERT INTO `parkings` VALUES (1,'Allées de la République',44.86,-0.04,0,200,'#FFA500','#FF0000',1,NULL,'2024-04-10 07:39:36'),(2,'Place Maréchal de Turenne',44.85,-0.04,0,180,'#FFA500','#FF0000',1,NULL,'2024-04-09 09:52:21'),(3,'Tourny',44.84,-0.57,0,200,'#FFA500','#FF0000',2,NULL,'2024-04-09 09:52:27'),(4,'Pey Berland',44.83,-0.58,0,220,'#FFA500','#FF0000',2,NULL,'2024-04-09 09:52:32');
/*!40000 ALTER TABLE `parkings` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(2,'browse_bread',NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(3,'browse_database',NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(4,'browse_media',NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(5,'browse_compass',NULL,'2023-01-11 15:03:30','2023-01-11 15:03:30'),(6,'browse_menus','menus','2023-01-11 15:03:30','2023-01-11 15:03:30'),(7,'read_menus','menus','2023-01-11 15:03:30','2023-01-11 15:03:30'),(8,'edit_menus','menus','2023-01-11 15:03:30','2023-01-11 15:03:30'),(9,'add_menus','menus','2023-01-11 15:03:30','2023-01-11 15:03:30'),(10,'delete_menus','menus','2023-01-11 15:03:30','2023-01-11 15:03:30'),(11,'browse_roles','roles','2023-01-11 15:03:30','2023-01-11 15:03:30'),(12,'read_roles','roles','2023-01-11 15:03:30','2023-01-11 15:03:30'),(13,'edit_roles','roles','2023-01-11 15:03:30','2023-01-11 15:03:30'),(14,'add_roles','roles','2023-01-11 15:03:30','2023-01-11 15:03:30'),(15,'delete_roles','roles','2023-01-11 15:03:30','2023-01-11 15:03:30'),(16,'browse_users','users','2023-01-11 15:03:30','2023-01-11 15:03:30'),(17,'read_users','users','2023-01-11 15:03:30','2023-01-11 15:03:30'),(18,'edit_users','users','2023-01-11 15:03:30','2023-01-11 15:03:30'),(19,'add_users','users','2023-01-11 15:03:30','2023-01-11 15:03:30'),(20,'delete_users','users','2023-01-11 15:03:30','2023-01-11 15:03:30'),(21,'browse_settings','settings','2023-01-11 15:03:30','2023-01-11 15:03:30'),(22,'read_settings','settings','2023-01-11 15:03:30','2023-01-11 15:03:30'),(23,'edit_settings','settings','2023-01-11 15:03:30','2023-01-11 15:03:30'),(24,'add_settings','settings','2023-01-11 15:03:30','2023-01-11 15:03:30'),(25,'delete_settings','settings','2023-01-11 15:03:30','2023-01-11 15:03:30'),(31,'browse_posts','posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(32,'read_posts','posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(33,'edit_posts','posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(34,'add_posts','posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(35,'delete_posts','posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(36,'browse_pages','pages','2023-01-11 15:03:31','2023-01-11 15:03:31'),(37,'read_pages','pages','2023-01-11 15:03:31','2023-01-11 15:03:31'),(38,'edit_pages','pages','2023-01-11 15:03:31','2023-01-11 15:03:31'),(39,'add_pages','pages','2023-01-11 15:03:31','2023-01-11 15:03:31'),(40,'delete_pages','pages','2023-01-11 15:03:31','2023-01-11 15:03:31'),(41,'browse_Balise','Balise','2023-01-13 09:07:51','2023-01-13 09:07:51'),(42,'read_Balise','Balise','2023-01-13 09:07:51','2023-01-13 09:07:51'),(43,'edit_Balise','Balise','2023-01-13 09:07:51','2023-01-13 09:07:51'),(44,'add_Balise','Balise','2023-01-13 09:07:51','2023-01-13 09:07:51'),(45,'delete_Balise','Balise','2023-01-13 09:07:51','2023-01-13 09:07:51'),(76,'browse_balises','balises','2023-01-13 10:16:09','2023-01-13 10:16:09'),(77,'read_balises','balises','2023-01-13 10:16:09','2023-01-13 10:16:09'),(78,'edit_balises','balises','2023-01-13 10:16:09','2023-01-13 10:16:09'),(79,'add_balises','balises','2023-01-13 10:16:09','2023-01-13 10:16:09'),(80,'delete_balises','balises','2023-01-13 10:16:09','2023-01-13 10:16:09'),(81,'browse_releve_balises','releve_balises','2023-03-31 14:03:26','2023-03-31 14:03:26'),(82,'read_releve_balises','releve_balises','2023-03-31 14:03:26','2023-03-31 14:03:26'),(83,'edit_releve_balises','releve_balises','2023-03-31 14:03:26','2023-03-31 14:03:26'),(84,'add_releve_balises','releve_balises','2023-03-31 14:03:26','2023-03-31 14:03:26'),(85,'delete_releve_balises','releve_balises','2023-03-31 14:03:26','2023-03-31 14:03:26'),(91,'browse_villes','villes','2024-02-13 09:32:24','2024-02-13 09:32:24'),(92,'read_villes','villes','2024-02-13 09:32:24','2024-02-13 09:32:24'),(93,'edit_villes','villes','2024-02-13 09:32:24','2024-02-13 09:32:24'),(94,'add_villes','villes','2024-02-13 09:32:24','2024-02-13 09:32:24'),(95,'delete_villes','villes','2024-02-13 09:32:24','2024-02-13 09:32:24'),(96,'browse_parkings','parkings','2024-02-13 09:40:43','2024-02-13 09:40:43'),(97,'read_parkings','parkings','2024-02-13 09:40:43','2024-02-13 09:40:43'),(98,'edit_parkings','parkings','2024-02-13 09:40:43','2024-02-13 09:40:43'),(99,'add_parkings','parkings','2024-02-13 09:40:43','2024-02-13 09:40:43'),(100,'delete_parkings','parkings','2024-02-13 09:40:43','2024-02-13 09:40:43'),(101,'browse_noeud_loras','noeud_loras','2024-03-19 08:48:07','2024-03-19 08:48:07'),(102,'read_noeud_loras','noeud_loras','2024-03-19 08:48:07','2024-03-19 08:48:07'),(103,'edit_noeud_loras','noeud_loras','2024-03-19 08:48:07','2024-03-19 08:48:07'),(104,'add_noeud_loras','noeud_loras','2024-03-19 08:48:07','2024-03-19 08:48:07'),(105,'delete_noeud_loras','noeud_loras','2024-03-19 08:48:07','2024-03-19 08:48:07');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,NULL,'Lorem Ipsum Post',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/post1.jpg','lorem-ipsum-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2023-01-11 15:03:31','2023-01-11 15:03:31'),(2,0,NULL,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2023-01-11 15:03:31','2023-01-11 15:03:31'),(3,0,NULL,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2023-01-11 15:03:31','2023-01-11 15:03:31'),(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2023-01-11 15:03:31','2023-01-11 15:03:31');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2023-01-11 15:03:30','2023-01-11 15:03:30'),(2,'user','Normal User','2023-01-11 15:03:30','2023-01-11 15:03:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('utCkmyojYBYfhDYb3pFLXfkaro2eNci2mNMLyt1t',1,'172.23.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMzdsWjBIWXBGdFB2NlFaQ1V1Njc5Tzl5Mjloc3lsVG81ZVpnem9DRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90b3VzTGVzTm9ldWRzTG9yYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1712734894);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',5,'pt','Post','2023-01-11 15:03:31','2023-01-11 15:03:31'),(2,'data_types','display_name_singular',6,'pt','Página','2023-01-11 15:03:31','2023-01-11 15:03:31'),(3,'data_types','display_name_singular',1,'pt','Utilizador','2023-01-11 15:03:31','2023-01-11 15:03:31'),(4,'data_types','display_name_singular',4,'pt','Categoria','2023-01-11 15:03:31','2023-01-11 15:03:31'),(5,'data_types','display_name_singular',2,'pt','Menu','2023-01-11 15:03:31','2023-01-11 15:03:31'),(6,'data_types','display_name_singular',3,'pt','Função','2023-01-11 15:03:31','2023-01-11 15:03:31'),(7,'data_types','display_name_plural',5,'pt','Posts','2023-01-11 15:03:31','2023-01-11 15:03:31'),(8,'data_types','display_name_plural',6,'pt','Páginas','2023-01-11 15:03:31','2023-01-11 15:03:31'),(9,'data_types','display_name_plural',1,'pt','Utilizadores','2023-01-11 15:03:31','2023-01-11 15:03:31'),(10,'data_types','display_name_plural',4,'pt','Categorias','2023-01-11 15:03:31','2023-01-11 15:03:31'),(11,'data_types','display_name_plural',2,'pt','Menus','2023-01-11 15:03:31','2023-01-11 15:03:31'),(12,'data_types','display_name_plural',3,'pt','Funções','2023-01-11 15:03:31','2023-01-11 15:03:31'),(13,'categories','slug',1,'pt','categoria-1','2023-01-11 15:03:31','2023-01-11 15:03:31'),(14,'categories','name',1,'pt','Categoria 1','2023-01-11 15:03:31','2023-01-11 15:03:31'),(15,'categories','slug',2,'pt','categoria-2','2023-01-11 15:03:31','2023-01-11 15:03:31'),(16,'categories','name',2,'pt','Categoria 2','2023-01-11 15:03:31','2023-01-11 15:03:31'),(17,'pages','title',1,'pt','Olá Mundo','2023-01-11 15:03:31','2023-01-11 15:03:31'),(18,'pages','slug',1,'pt','ola-mundo','2023-01-11 15:03:31','2023-01-11 15:03:31'),(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2023-01-11 15:03:31','2023-01-11 15:03:31'),(20,'menu_items','title',1,'pt','Painel de Controle','2023-01-11 15:03:31','2023-01-11 15:03:31'),(21,'menu_items','title',2,'pt','Media','2023-01-11 15:03:31','2023-01-11 15:03:31'),(22,'menu_items','title',12,'pt','Publicações','2023-01-11 15:03:31','2023-01-11 15:03:31'),(23,'menu_items','title',3,'pt','Utilizadores','2023-01-11 15:03:31','2023-01-11 15:03:31'),(24,'menu_items','title',11,'pt','Categorias','2023-01-11 15:03:31','2023-01-11 15:03:31'),(25,'menu_items','title',13,'pt','Páginas','2023-01-11 15:03:31','2023-01-11 15:03:31'),(26,'menu_items','title',4,'pt','Funções','2023-01-11 15:03:31','2023-01-11 15:03:31'),(27,'menu_items','title',5,'pt','Ferramentas','2023-01-11 15:03:31','2023-01-11 15:03:31'),(28,'menu_items','title',6,'pt','Menus','2023-01-11 15:03:31','2023-01-11 15:03:31'),(29,'menu_items','title',7,'pt','Base de dados','2023-01-11 15:03:31','2023-01-11 15:03:31'),(30,'menu_items','title',10,'pt','Configurações','2023-01-11 15:03:31','2023-01-11 15:03:31');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin','admin@admin.com','users/default.png',NULL,'$2y$10$xXyH.NFafYtp.LIP83FwZu8c4h576afKAjwG8xWBLIVaWEB5XJm/C',NULL,NULL,NULL,'OiTZu4MyW5OYGjB2E0iu6pBw4W2JEmnTWb6AkVtsM5u8YF8SMCIHIo3oe9fY',NULL,'2023-01-11 15:03:31','2023-01-11 15:03:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ville_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateurs_nom_unique` (`nom`),
  UNIQUE KEY `utilisateurs_prenom_unique` (`prenom`),
  UNIQUE KEY `utilisateurs_mail_unique` (`mail`),
  UNIQUE KEY `utilisateurs_role_unique` (`role`),
  KEY `utilisateurs_ville_id_foreign` (`ville_id`),
  CONSTRAINT `utilisateurs_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'Castillon-la-bataille',44.849,-5464,33000,NULL,'2024-04-10 07:38:31'),(2,'Bordeaux',44.83332,-0.5667,33000,NULL,'2024-04-10 07:38:37');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

