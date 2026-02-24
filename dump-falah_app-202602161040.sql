-- MySQL dump 10.13  Distrib 9.5.0, for Win64 (x86_64)
--
-- Host: localhost    Database: filament_app
-- ------------------------------------------------------
-- Server version	9.5.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


--
-- GTID state at the beginning of the backup 
--



--
-- Table structure for table `bast_lampirans`
--

DROP TABLE IF EXISTS `bast_lampirans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bast_lampirans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bast_id` bigint unsigned NOT NULL,
  `kit_starlink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bast_lampirans_bast_id_foreign` (`bast_id`),
  CONSTRAINT `bast_lampirans_bast_id_foreign` FOREIGN KEY (`bast_id`) REFERENCES `basts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bast_lampirans`
--

LOCK TABLES `bast_lampirans` WRITE;
/*!40000 ALTER TABLE `bast_lampirans` DISABLE KEYS */;
/*!40000 ALTER TABLE `bast_lampirans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basts`
--

DROP TABLE IF EXISTS `basts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_bast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `pihak_pertama_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pihak_pertama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_pertama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_kedua_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pihak_kedua_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_kedua_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `keterangan_fields` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lampiran_columns` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `basts_no_bast_unique` (`no_bast`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basts`
--

LOCK TABLES `basts` WRITE;
/*!40000 ALTER TABLE `basts` DISABLE KEYS */;
INSERT INTO `basts` VALUES (1,'BAST/FTG/II/2026/001','2026-02-13','Saeful','Kabag','PT FALAH TECH GLOBAL JAKARTA','Hidayat','Staf','PT MARAKAS INVESTAMA LOMBOK','expedisi jne',NULL,'2026-02-13 04:05:44','2026-02-13 04:05:44',NULL);
/*!40000 ALTER TABLE `basts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('dashboard-falah-tech-global-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6','i:1;',1771211435),('dashboard-falah-tech-global-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer','i:1771211435;',1771211435);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_01_13_104300_create_starlinks_table',1),(5,'2026_01_21_035558_add_division_and_note_to_starlinks_table',1),(6,'2026_01_22_000000_create_payments_table',1),(7,'2026_02_04_040727_create_basts_table',2),(8,'2026_02_06_094302_create_bast_lampirans_table',3),(9,'2026_02_06_104533_add_lampiran_columns_to_basts_table',4),(10,'2026_02_10_102351_add_keterangan_fields_to_basts_table',5),(11,'2026_02_10_103316_add_no_bast_to_basts_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `starlink_id` bigint unsigned NOT NULL,
  `payment_month` date NOT NULL,
  `amount` int DEFAULT NULL,
  `status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_starlink_id_foreign` (`starlink_id`),
  CONSTRAINT `payments_starlink_id_foreign` FOREIGN KEY (`starlink_id`) REFERENCES `starlinks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2Tcqy4FqFBnSZJpohULFDXVrWdt30777XIZrQcAy',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaEZ6RzRWbEZRcjcybnBPS3JDYThHNFQxU3FCNzlvbnZ3MU01cFdoWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7czo1OiJyb3V0ZSI7czozMDoiZmlsYW1lbnQuYWRtaW4ucGFnZXMuZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiMDA0NTM4N2FhNmU3MzNkYjk5MTI5OThkOGU5ZDdlY2YzZTA5MDIxN2Y5NzgwMmIzZTNkODI3NmZjNzY2NzI1ZCI7czo2OiJ0YWJsZXMiO2E6Mzp7czo0MDoiNmE0MjMwYWQ4YTRkMDc1Yzk0OGRlNjAyZWY4ZWVlZWJfY29sdW1ucyI7YToxMTp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjg6ImtpdF9uYW1lIjtzOjU6ImxhYmVsIjtzOjEyOiJLSVQgU3RhcmxpbmsiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjowO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Njoic3RhdHVzIjtzOjU6ImxhYmVsIjtzOjY6IlN0YXR1cyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJlbWFpbCI7czo1OiJsYWJlbCI7czoxNDoiRW1haWwgU3RhcmxpbmsiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjowO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6ODoibG9jYXRpb24iO3M6NToibGFiZWwiO3M6MTU6Ikxva2FzaSBTdGFybGluayI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo4OiJkaXZpc2lvbiI7czo1OiJsYWJlbCI7czoxNToiRGl2aXNpIFN0YXJsaW5rIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MDt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJzZXJpYWxfbnVtYmVyIjtzOjU6ImxhYmVsIjtzOjEzOiJTZXJpYWwgTnVtYmVyIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJzdGFybGlua19pZCI7czo1OiJsYWJlbCI7czoxMToiSUQgU3RhcmxpbmsiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToicm91dGVyX2lkIjtzOjU6ImxhYmVsIjtzOjk6IklEIFJvdXRlciI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJub3RlIjtzOjU6ImxhYmVsIjtzOjQ6Ik5vdGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjEwO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6Ijk5ODdkNTI0MGViMzA0ZDhjZjFkZTliODBmNGU5ZjQ3X2NvbHVtbnMiO2E6Mzp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE3OiJzdGFybGluay5raXRfbmFtZSI7czo1OiJsYWJlbCI7czoxMjoiS0lUIFN0YXJsaW5rIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoicGF5bWVudF9tb250aCI7czo1OiJsYWJlbCI7czoxNjoiQnVsYW4gUGVtYmF5YXJhbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Njoic3RhdHVzIjtzOjU6ImxhYmVsIjtzOjY6IlN0YXR1cyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO319czo0MDoiYjNjOWMwOWY1YjdjZTM0Mjc0ZDc4MjYxYTIzMDExODBfY29sdW1ucyI7YToxMDp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im5vX2Jhc3QiO3M6NToibGFiZWwiO3M6NToiTm9tb3IiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6InRhbmdnYWwiO3M6NToibGFiZWwiO3M6NzoiVGFuZ2dhbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoicGloYWtfcGVydGFtYV9uYW1hIjtzOjU6ImxhYmVsIjtzOjE4OiJOYW1hIFBpaGFrIFBlcnRhbWEiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjE6InBpaGFrX3BlcnRhbWFfamFiYXRhbiI7czo1OiJsYWJlbCI7czoyMToiSmFiYXRhbiBQaWhhayBQZXJ0YW1hIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjI0OiJwaWhha19wZXJ0YW1hX3BlcnVzYWhhYW4iO3M6NToibGFiZWwiO3M6MjQ6IlBlcnVzYWhhYW4gUGloYWsgUGVydGFtYSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNjoicGloYWtfa2VkdWFfbmFtYSI7czo1OiJsYWJlbCI7czoxNjoiTmFtYSBQaWhhayBLZWR1YSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxOToicGloYWtfa2VkdWFfamFiYXRhbiI7czo1OiJsYWJlbCI7czoxOToiSmFiYXRhbiBQaWhhayBLZWR1YSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMjoicGloYWtfa2VkdWFfcGVydXNhaGFhbiI7czo1OiJsYWJlbCI7czoyMjoiUGVydXNhaGFhbiBQaWhhayBLZWR1YSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6OTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX19fQ==',1771213214);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `starlinks`
--

DROP TABLE IF EXISTS `starlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `starlinks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `starlink_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `router_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','aktif','standby','suspend','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `starlinks_starlink_id_unique` (`starlink_id`),
  UNIQUE KEY `starlinks_serial_number_unique` (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `starlinks`
--

LOCK TABLES `starlinks` WRITE;
/*!40000 ALTER TABLE `starlinks` DISABLE KEYS */;
INSERT INTO `starlinks` VALUES (1,'KIT402500394JWJ','satgas65timika1@falahtechglobal.co.id','RO-HE308JGHE90 -be-satgas60timika01@kalamaya.co.id - ujicoba','POS MAKALA','KOOPS HABEMA','SN-KIT402500394JWJ','00200c8d-88f1091c-d8eed765','0100000000000000011ECC08','aktif','2026-02-02 04:34:00','2026-02-10 03:21:33'),(2,'KIT4025003815BB','40satgas16@falahtechglobal.co.id','be-pamtasmobile.ue9gr@addy.io','POS MOBILE','KOOPS HABEMA','SN-KIT4025003815BB','30200f93-05b0811b-d8c227e0','01000000000000000117A6A7','suspend','2026-02-03 22:25:25','2026-02-03 22:25:25'),(3,'KIT303968160','40satgas1@falahtechglobal.co.id',NULL,'POS HABEMA','KOOPS HABEMA','2DWC241800012775','01000000-00000000-00db12e0','010000000000000000D84E35','standby','2026-02-03 22:50:16','2026-02-03 22:50:16'),(4,'KIT4025003762CM','40satgas14@falahtechglobal.co.id',NULL,'DUKUNGAN OPERASI','KOOPS HABEMA','SN-KIT4025003762CM','30c09397-05b0811b-d8be05b1','010000000000000001197D3B','aktif','2026-02-04 00:24:23','2026-02-04 00:24:23'),(5,'KIT402500379FFG','40satgas23@falahtechglobal.co.id',NULL,'POS SEKTOR BARAT','KOOPS HABEMA','SN-KIT402500379FFG','50109701-c5116519-d8f812d7','010000000000000001195D19','aktif','2026-02-04 00:27:40','2026-02-04 00:27:40'),(6,' KIT303597724','satkomlek2@falahtechglobal.co.id',NULL,'POS SEKTOR TIMUR','KOOPS HABEMA','SN- KIT303597724','01000000-00000000-00d5e62f','010000000000000000CA4B73','aktif','2026-02-04 00:29:45','2026-02-04 00:29:45'),(7,'KIT402349264V42','satgas65timika8@falahtechglobal.co.id','be-satgas60.e2pdv@addy.io','POS TIMSUS','KOOPS HABEMA','4PBA02269599','3058111e-c191891b-98520a93','010000000000000001180D94','aktif','2026-02-04 00:40:53','2026-02-04 00:40:53'),(8,'KIT303597742','satkomlek3@falahtechglobal.co.id',NULL,'KOOPS HABEMA','KOOPS HABEMA','2DWC241200015138','01000000-00000000-00d5ceb2','010000000000000000E7641B','aktif','2026-02-06 03:26:48','2026-02-06 03:28:02');
/*!40000 ALTER TABLE `starlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$12$/F4HzOn5SGJJJ2vQojScdOFBiFEwuJujYdt.byM8Yo2GaedMF8uWS',NULL,'2026-01-26 09:35:30','2026-01-26 09:35:30'),(2,'Admin','admin@falahtechglobal.co.id',NULL,'$2y$12$VL84T7TFo244yCFqtfQXGOX4M6hCf5gfU8wF8BUhaXH.0o74fk6JW',NULL,'2026-02-15 20:01:28','2026-02-15 20:01:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'filament_app'
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-16 10:40:18
