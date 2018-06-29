<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::unprepared('
-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;

-- Dumping data for table e-campus_db_2.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.announcement: ~2 rows (approximately)
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` (`ANNOUNCEMENTID`, `ANNOUNCEMENTTITLE`, `ANNOUNCEMENTBODY`, `DATEPUBLISHED`) VALUES
	(1, "Agaza", "Al 2sbo3 da agaza lekm kolloko", "2018-06-07 00:00:00"),
	(2, "ntega", "A+ lekom kollokm yalla heyaso", "2018-06-27 00:00:00");
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.author: ~0 rows (approximately)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_apicustom: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_apicustom` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_apicustom` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_apikey: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_apikey` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_apikey` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_dashboard: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_dashboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_dashboard` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_email_queues: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_email_queues` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_email_queues` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_email_templates: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_email_templates` DISABLE KEYS */;
INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
	(1, "Email Template Forgot Password Backend", "forgot_password_backend", NULL, "<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>", "[password]", "System", "system@crudbooster.com", NULL, "2018-06-25 15:09:27", NULL);
/*!40000 ALTER TABLE `cms_email_templates` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_logs: ~63 rows (approximately)
/*!40000 ALTER TABLE `cms_logs` DISABLE KEYS */;
INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
	(1, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-25 15:14:37", NULL),
	(2, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/department/add-save", "Add New Data  at Department", "", 1, "2018-06-25 15:20:23", NULL),
	(3, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/course/add-save", "Add New Data 1 at Course", "", 1, "2018-06-25 15:21:01", NULL),
	(4, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/ta/add-save", "Add New Data 1 at TA", "", 1, "2018-06-25 15:21:45", NULL),
	(5, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/groups/add-save", "Add New Data  at Group", "", 1, "2018-06-25 15:26:53", NULL),
	(6, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/groups/delete/1", "Delete data  at Group", "", 1, "2018-06-25 15:34:29", NULL),
	(7, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/groups/add-save", "Add New Data  at Group", "", 1, "2018-06-25 15:54:44", NULL),
	(8, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/tacourse/add-save", "Add New Data  at Ta Course", "", 1, "2018-06-25 15:57:54", NULL),
	(9, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/professor/add-save", "Add New Data 1 at Professor", "", 1, "2018-06-25 16:01:19", NULL),
	(10, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36", "http://fci-e-campus-api.local:8080/admin/professorcourse/add-save", "Add New Data  at Proffesor Course", "", 1, "2018-06-25 16:04:39", NULL),
	(11, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-27 22:05:00", NULL),
	(12, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/module_generator/delete/16", "Delete data Group at Module Generator", "", 1, "2018-06-27 22:57:33", NULL),
	(13, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/module_generator/delete/18", "Delete data Proffesor Course at Module Generator", "", 1, "2018-06-27 22:57:45", NULL),
	(14, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/module_generator/delete/15", "Delete data Ta Course at Module Generator", "", 1, "2018-06-27 22:57:55", NULL),
	(15, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/module_generator/delete/21", "Delete data Slots at Module Generator", "", 1, "2018-06-27 23:08:35", NULL),
	(16, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-28 19:23:28", NULL),
	(17, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/module_generator/delete/24", "Delete data Assign TA to Course at Module Generator", "", 1, "2018-06-28 19:46:47", NULL),
	(18, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/logout", "admin@crudbooster.com logout", "", 1, "2018-06-28 23:24:10", NULL),
	(19, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-28 23:24:16", NULL),
	(20, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/department/add-save", "Add New Data  at Department", "", 1, "2018-06-28 23:52:07", NULL),
	(21, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/department/add-save", "Add New Data  at Department", "", 1, "2018-06-28 23:52:29", NULL),
	(22, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/add-save", "Add New Data 1 at Course", "", 1, "2018-06-28 23:54:17", NULL),
	(23, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/add-save", "Add New Data 2 at Course", "", 1, "2018-06-28 23:55:30", NULL),
	(24, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/add-save", "Add New Data 3 at Course", "", 1, "2018-06-28 23:56:45", NULL),
	(25, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/add-save", "Add New Data 4 at Course", "", 1, "2018-06-28 23:57:26", NULL),
	(26, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 1 at TA", "", 1, "2018-06-28 23:59:35", NULL),
	(27, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 2 at TA", "", 1, "2018-06-29 00:00:51", NULL),
	(28, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 3 at TA", "", 1, "2018-06-29 00:02:05", NULL),
	(29, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 4 at TA", "", 1, "2018-06-29 00:03:08", NULL),
	(30, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professor/add-save", "Add New Data 1 at Professor", "", 1, "2018-06-29 00:04:39", NULL),
	(31, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professor/add-save", "Add New Data 2 at Professor", "", 1, "2018-06-29 00:05:44", NULL),
	(32, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professor/add-save", "Add New Data 3 at Professor", "", 1, "2018-06-29 00:06:40", NULL),
	(33, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professor/add-save", "Add New Data 4 at Professor", "", 1, "2018-06-29 00:08:09", NULL),
	(34, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/announcement/add-save", "Add New Data  at Announcement", "", 1, "2018-06-29 00:09:02", NULL),
	(35, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/announcement/add-save", "Add New Data  at Announcement", "", 1, "2018-06-29 00:09:36", NULL),
	(36, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/edit-save/4", "Update data  at Course", "<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>COURSETITLE</td><td>Gra</td><td>Graph</td></tr></tbody></table>", 1, "2018-06-29 00:17:34", NULL),
	(37, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/add-save", "Add New Data 5 at Course", "", 1, "2018-06-29 00:18:11", NULL),
	(38, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/course/delete/5", "Delete data 5 at Course", "", 1, "2018-06-29 00:18:19", NULL),
	(39, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/department/add-save", "Add New Data  at Department", "", 1, "2018-06-29 00:18:34", NULL),
	(40, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/department/delete/3", "Delete data  at Department", "", 1, "2018-06-29 00:19:38", NULL),
	(41, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-29 13:07:34", NULL),
	(42, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/logout", "admin@crudbooster.com logout", "", 1, "2018-06-29 13:27:03", NULL),
	(43, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-29 13:27:29", NULL),
	(44, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/login", "admin@crudbooster.com login with IP Address 127.0.0.1", "", 1, "2018-06-29 20:23:53", NULL),
	(45, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/prerequisitecourse/add-save", "Add New Data  at Assign Prerequisite Courses", "", 1, "2018-06-29 20:24:09", NULL),
	(46, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 1 at TA", "", 1, "2018-06-29 20:26:17", NULL),
	(47, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 2 at TA", "", 1, "2018-06-29 20:27:06", NULL),
	(48, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 3 at TA", "", 1, "2018-06-29 20:28:02", NULL),
	(49, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/ta/add-save", "Add New Data 4 at TA", "", 1, "2018-06-29 20:31:27", NULL),
	(50, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professor/add-save", "Add New Data 1 at Professor", "", 1, "2018-06-29 20:35:34", NULL),
	(51, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/groups20/add-save", "Add New Data  at Group", "", 1, "2018-06-29 20:36:06", NULL),
	(52, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/groups20/add-save", "Add New Data  at Group", "", 1, "2018-06-29 20:36:23", NULL),
	(53, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/groups20/add-save", "Add New Data  at Group", "", 1, "2018-06-29 20:36:37", NULL),
	(54, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/groups20/add-save", "Add New Data  at Group", "", 1, "2018-06-29 20:36:50", NULL),
	(55, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/prerequisitecourse/add-save", "Add New Data  at Assign Prerequisite Courses", "", 1, "2018-06-29 20:37:18", NULL),
	(56, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professorcourse23/add-save", "Add New Data  at Assign Professor to Course", "", 1, "2018-06-29 20:39:08", NULL),
	(57, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/tacourse25/add-save", "Add New Data  at Assign TA to Course", "", 1, "2018-06-29 20:40:26", NULL),
	(58, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/slots26/add-save", "Add New Data  at Assign Slots to Course", "", 1, "2018-06-29 20:43:39", NULL),
	(59, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professorcourse23/delete/1", "Delete data  at Assign Professor to Course", "", 1, "2018-06-29 20:50:26", NULL),
	(60, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/professorcourse23/add-save", "Add New Data  at Assign Professor to Course", "", 1, "2018-06-29 20:50:38", NULL),
	(61, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/tacourse25/add-save", "Add New Data  at Assign TA to Course", "", 1, "2018-06-29 20:52:18", NULL),
	(62, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/slots26/add-save", "Add New Data  at Assign Slots to Course", "", 1, "2018-06-29 20:54:14", NULL),
	(63, "127.0.0.1", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36", "http://fci-e-campus-api.local/admin/slots26/add-save", "Add New Data  at Assign Slots to Course", "", 1, "2018-06-29 20:54:59", NULL);
/*!40000 ALTER TABLE `cms_logs` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_menus: ~10 rows (approximately)
/*!40000 ALTER TABLE `cms_menus` DISABLE KEYS */;
INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
	(1, "Course", "Route", "AdminCourseControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 1, "2018-06-25 15:14:53", NULL),
	(2, "Department", "Route", "AdminDepartmentControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 2, "2018-06-25 15:16:04", NULL),
	(3, "TA", "Route", "AdminTaControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 3, "2018-06-25 15:16:59", NULL),
	(6, "Professor", "Route", "AdminProfessorControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 6, "2018-06-25 15:59:10", NULL),
	(8, "Announcement", "Route", "AdminAnnouncementControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 7, "2018-06-27 23:00:49", NULL),
	(9, "Group", "Route", "AdminGroups20ControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 8, "2018-06-27 23:03:22", NULL),
	(11, "Assign Prerequisite Courses", "Route", "AdminPrerequisitecourseControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 9, "2018-06-27 23:11:12", NULL),
	(12, "Assign Professor to Course", "Route", "AdminProfessorcourse23ControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 10, "2018-06-27 23:16:28", NULL),
	(14, "Assign TA to Course", "Route", "AdminTacourse25ControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 11, "2018-06-28 19:47:25", NULL),
	(15, "Assign Slots to Course", "Route", "AdminSlots26ControllerGetIndex", NULL, "fa fa-glass", 0, 1, 0, 1, 12, "2018-06-28 23:27:51", NULL);
/*!40000 ALTER TABLE `cms_menus` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_menus_privileges: ~15 rows (approximately)
/*!40000 ALTER TABLE `cms_menus_privileges` DISABLE KEYS */;
INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 1),
	(6, 6, 1),
	(7, 7, 1),
	(8, 8, 1),
	(9, 9, 1),
	(10, 10, 1),
	(11, 11, 1),
	(12, 12, 1),
	(13, 13, 1),
	(14, 14, 1),
	(15, 15, 1);
/*!40000 ALTER TABLE `cms_menus_privileges` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_moduls: ~26 rows (approximately)
/*!40000 ALTER TABLE `cms_moduls` DISABLE KEYS */;
INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, "Notifications", "fa fa-cog", "notifications", "cms_notifications", "NotificationsController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(2, "Privileges", "fa fa-cog", "privileges", "cms_privileges", "PrivilegesController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(3, "Privileges Roles", "fa fa-cog", "privileges_roles", "cms_privileges_roles", "PrivilegesRolesController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(4, "Users Management", "fa fa-users", "users", "cms_users", "AdminCmsUsersController", 0, 1, "2018-06-25 15:09:24", NULL, NULL),
	(5, "Settings", "fa fa-cog", "settings", "cms_settings", "SettingsController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(6, "Module Generator", "fa fa-database", "module_generator", "cms_moduls", "ModulsController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(7, "Menu Management", "fa fa-bars", "menu_management", "cms_menus", "MenusController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(8, "Email Templates", "fa fa-envelope-o", "email_templates", "cms_email_templates", "EmailTemplatesController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(9, "Statistic Builder", "fa fa-dashboard", "statistic_builder", "cms_statistics", "StatisticBuilderController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(10, "API Generator", "fa fa-cloud-download", "api_generator", "", "ApiCustomController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(11, "Log User Access", "fa fa-flag-o", "logs", "cms_logs", "LogsController", 1, 1, "2018-06-25 15:09:24", NULL, NULL),
	(12, "Course", "fa fa-glass", "course", "course", "AdminCourseController", 0, 0, "2018-06-25 15:14:53", NULL, NULL),
	(13, "Department", "fa fa-glass", "department", "department", "AdminDepartmentController", 0, 0, "2018-06-25 15:16:04", NULL, NULL),
	(14, "TA", "fa fa-glass", "ta", "ta", "AdminTaController", 0, 0, "2018-06-25 15:16:58", NULL, NULL),
	(15, "Ta Course", "fa fa-glass", "tacourse", "tacourse", "AdminTacourseController", 0, 0, "2018-06-25 15:18:32", NULL, "2018-06-27 22:57:55"),
	(16, "Group", "fa fa-glass", "groups", "groups", "AdminGroupsController", 0, 0, "2018-06-25 15:23:34", NULL, "2018-06-27 22:57:34"),
	(17, "Professor", "fa fa-glass", "professor", "professor", "AdminProfessorController", 0, 0, "2018-06-25 15:59:10", NULL, NULL),
	(18, "Proffesor Course", "fa fa-glass", "professorcourse", "professorcourse", "AdminProfessorcourseController", 0, 0, "2018-06-25 16:01:47", NULL, "2018-06-27 22:57:45"),
	(19, "Announcement", "fa fa-glass", "announcement", "announcement", "AdminAnnouncementController", 0, 0, "2018-06-27 23:00:49", NULL, NULL),
	(20, "Group", "fa fa-glass", "groups20", "groups", "AdminGroups20Controller", 0, 0, "2018-06-27 23:03:22", NULL, NULL),
	(21, "Slots", "fa fa-glass", "slots", "slots", "AdminSlotsController", 0, 0, "2018-06-27 23:07:06", NULL, "2018-06-27 23:08:35"),
	(22, "Assign Prerequisite Courses", "fa fa-glass", "prerequisitecourse", "prerequisitecourse", "AdminPrerequisitecourseController", 0, 0, "2018-06-27 23:11:12", NULL, NULL),
	(23, "Assign Professor to Course", "fa fa-glass", "professorcourse23", "professorcourse", "AdminProfessorcourse23Controller", 0, 0, "2018-06-27 23:16:28", NULL, NULL),
	(24, "Assign TA to Course", "fa fa-glass", "tacourse24", "tacourse", "AdminTacourse24Controller", 0, 0, "2018-06-28 19:24:36", NULL, "2018-06-28 19:46:47"),
	(25, "Assign TA to Course", "fa fa-glass", "tacourse25", "tacourse", "AdminTacourse25Controller", 0, 0, "2018-06-28 19:47:25", NULL, NULL),
	(26, "Assign Slots to Course", "fa fa-glass", "slots26", "slots", "AdminSlots26Controller", 0, 0, "2018-06-28 23:27:51", NULL, NULL);
/*!40000 ALTER TABLE `cms_moduls` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_notifications` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_privileges: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_privileges` DISABLE KEYS */;
INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
	(1, "Super Administrator", 1, "skin-red", "2018-06-25 15:09:25", NULL);
/*!40000 ALTER TABLE `cms_privileges` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_privileges_roles: ~26 rows (approximately)
/*!40000 ALTER TABLE `cms_privileges_roles` DISABLE KEYS */;
INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, 0, 0, 0, 1, 1, "2018-06-25 15:09:25", NULL),
	(2, 1, 1, 1, 1, 1, 1, 2, "2018-06-25 15:09:25", NULL),
	(3, 0, 1, 1, 1, 1, 1, 3, "2018-06-25 15:09:25", NULL),
	(4, 1, 1, 1, 1, 1, 1, 4, "2018-06-25 15:09:25", NULL),
	(5, 1, 1, 1, 1, 1, 1, 5, "2018-06-25 15:09:25", NULL),
	(6, 1, 1, 1, 1, 1, 1, 6, "2018-06-25 15:09:25", NULL),
	(7, 1, 1, 1, 1, 1, 1, 7, "2018-06-25 15:09:25", NULL),
	(8, 1, 1, 1, 1, 1, 1, 8, "2018-06-25 15:09:25", NULL),
	(9, 1, 1, 1, 1, 1, 1, 9, "2018-06-25 15:09:25", NULL),
	(10, 1, 1, 1, 1, 1, 1, 10, "2018-06-25 15:09:25", NULL),
	(11, 1, 0, 1, 0, 1, 1, 11, "2018-06-25 15:09:26", NULL),
	(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
	(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
	(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
	(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
	(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
	(17, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
	(18, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
	(19, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
	(20, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
	(21, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
	(22, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
	(23, 1, 1, 1, 1, 1, 1, 23, NULL, NULL),
	(24, 1, 1, 1, 1, 1, 1, 24, NULL, NULL),
	(25, 1, 1, 1, 1, 1, 1, 25, NULL, NULL),
	(26, 1, 1, 1, 1, 1, 1, 26, NULL, NULL);
/*!40000 ALTER TABLE `cms_privileges_roles` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_settings: ~16 rows (approximately)
/*!40000 ALTER TABLE `cms_settings` DISABLE KEYS */;
INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
	(1, "login_background_color", NULL, "text", NULL, "Input hexacode", "2018-06-25 15:09:26", NULL, "Login Register Style", "Login Background Color"),
	(2, "login_font_color", NULL, "text", NULL, "Input hexacode", "2018-06-25 15:09:26", NULL, "Login Register Style", "Login Font Color"),
	(3, "login_background_image", NULL, "upload_image", NULL, NULL, "2018-06-25 15:09:26", NULL, "Login Register Style", "Login Background Image"),
	(4, "email_sender", "support@crudbooster.com", "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Email Setting", "Email Sender"),
	(5, "smtp_driver", "mail", "select", "smtp,mail,sendmail", NULL, "2018-06-25 15:09:26", NULL, "Email Setting", "Mail Driver"),
	(6, "smtp_host", "", "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Email Setting", "SMTP Host"),
	(7, "smtp_port", "25", "text", NULL, "default 25", "2018-06-25 15:09:26", NULL, "Email Setting", "SMTP Port"),
	(8, "smtp_username", "", "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Email Setting", "SMTP Username"),
	(9, "smtp_password", "", "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Email Setting", "SMTP Password"),
	(10, "appname", "FCI E-campus", "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "Application Name"),
	(11, "default_paper_size", "Legal", "text", NULL, "Paper size, ex : A4, Legal, etc", "2018-06-25 15:09:26", NULL, "Application Setting", "Default Paper Print Size"),
	(12, "logo", "uploads/2018-06/c6bebdf667e7787f1e62b61fec97b128.png", "upload_image", NULL, NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "Logo"),
	(13, "favicon", NULL, "upload_image", NULL, NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "Favicon"),
	(14, "api_debug_mode", "true", "select", "true,false", NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "API Debug Mode"),
	(15, "google_api_key", NULL, "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "Google API Key"),
	(16, "google_fcm_key", NULL, "text", NULL, NULL, "2018-06-25 15:09:26", NULL, "Application Setting", "Google FCM Key");
/*!40000 ALTER TABLE `cms_settings` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_statistics: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_statistics` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_statistic_components: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_statistic_components` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_statistic_components` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.cms_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;
INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
	(1, "Super Admin", NULL, "admin@crudbooster.com", "$2y$10$dhnADX8SxG7rzitB3D4CdO.ZodXrA3tpC2y2PUifD//X4PsUmmE6O", 1, "2018-06-25 15:09:24", NULL, "Active");
/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.course: ~4 rows (approximately)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`id`, `COURSECODE`, `DEPTID`, `COURSETITLE`, `DESCRIPTION`, `STARTDATE`, `ENDDATE`, `PASSCODE`) VALUES
	(1, "CS1234", 1, "OS1", "Operating System", "2018-06-07 00:00:00", "2018-04-27 00:00:00", "ABC123"),
	(2, "CS127", 1, "ALG", "Algorithms", "2018-01-07 00:00:00", "2018-06-29 00:00:00", "CVN259"),
	(3, "IT335", 2, "Sig2", "Signals 2", "2018-01-07 00:00:00", "2018-06-29 00:00:00", "DFG457"),
	(4, "IT777", 2, "Graph", "Graphics", "2018-06-07 00:00:00", "2018-11-29 00:00:00", "FBH335");
/*!40000 ALTER TABLE `course` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.department: ~2 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DEPTID`, `DEPARTMENTNAME`, `DESCRIPTION`) VALUES
	(1, "CS", "Computer Science"),
	(2, "IT", "Information Technology");
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.extramaterials: ~0 rows (approximately)
/*!40000 ALTER TABLE `extramaterials` DISABLE KEYS */;
/*!40000 ALTER TABLE `extramaterials` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.forum: ~0 rows (approximately)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`GROUPID`, `COURSECODE`, `GROUPNUM`, `TAUSERNAME`) VALUES
	(1, "2", 1, "1"),
	(2, "1", 1, "2"),
	(3, "4", 1, "3"),
	(4, "3", 1, "4");
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.migrations: ~44 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, "2016_08_07_145904_add_table_cms_apicustom", 1),
	(2, "2016_08_07_150834_add_table_cms_dashboard", 1),
	(3, "2016_08_07_151210_add_table_cms_logs", 1),
	(4, "2016_08_07_151211_add_details_cms_logs", 1),
	(5, "2016_08_07_152014_add_table_cms_privileges", 1),
	(6, "2016_08_07_152214_add_table_cms_privileges_roles", 1),
	(7, "2016_08_07_152320_add_table_cms_settings", 1),
	(8, "2016_08_07_152421_add_table_cms_users", 1),
	(9, "2016_08_07_154624_add_table_cms_menus_privileges", 1),
	(10, "2016_08_07_154624_add_table_cms_moduls", 1),
	(11, "2016_08_17_225409_add_status_cms_users", 1),
	(12, "2016_08_20_125418_add_table_cms_notifications", 1),
	(13, "2016_09_04_033706_add_table_cms_email_queues", 1),
	(14, "2016_09_16_035347_add_group_setting", 1),
	(15, "2016_09_16_045425_add_label_setting", 1),
	(16, "2016_09_17_104728_create_nullable_cms_apicustom", 1),
	(17, "2016_10_01_141740_add_method_type_apicustom", 1),
	(18, "2016_10_01_141846_add_parameters_apicustom", 1),
	(19, "2016_10_01_141934_add_responses_apicustom", 1),
	(20, "2016_10_01_144826_add_table_apikey", 1),
	(21, "2016_11_14_141657_create_cms_menus", 1),
	(22, "2016_11_15_132350_create_cms_email_templates", 1),
	(23, "2016_11_15_190410_create_cms_statistics", 1),
	(24, "2016_11_17_102740_create_cms_statistic_components", 1),
	(25, "2017_06_06_164501_add_deleted_at_cms_moduls", 1),
	(26, "2018_06_16_000000_create_author_table", 1),
	(27, "2018_06_16_000001_create_admin_table", 1),
	(28, "2018_06_16_000002_create_staticmap_table", 1),
	(29, "2018_06_16_000003_create_officialmaterialuploader_table", 1),
	(30, "2018_06_16_000004_create_taskcreator_table", 1),
	(31, "2018_06_16_000005_create_department_table", 1),
	(32, "2018_06_16_000007_create_professor_table", 1),
	(33, "2018_06_16_000008_create_ta_table", 1),
	(34, "2018_06_16_000009_create_student_table", 1),
	(35, "2018_06_16_000010_create_course_table", 1),
	(36, "2018_06_16_000011_create_task_table", 1),
	(37, "2018_06_16_000012_create_extramaterials_table", 1),
	(38, "2018_06_16_000013_create_forum_table", 1),
	(39, "2018_06_16_000015_create_professorcourse_table", 1),
	(40, "2018_06_16_000016_create_announcement_table", 1),
	(41, "2018_06_16_000016_create_groups_table", 1),
	(42, "2018_06_16_000018_create_tacourse_table", 1),
	(43, "2018_06_16_000021_create_officialmaterial_table", 1),
	(44, "2018_06_16_000022_create_post_table", 1),
	(45, "2018_06_16_000023_create_studentcourse_table", 1),
	(46, "2018_06_16_000024_create_comment_table", 1),
	(47, "2018_06_18_183045_create_prerequisitecourse", 1),
	(48, "2018_06_20_211557_create_slots", 1),
	(49, "2018_06_23_002736_create_official_material_uploaders_table", 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.officialmaterial: ~0 rows (approximately)
/*!40000 ALTER TABLE `officialmaterial` DISABLE KEYS */;
/*!40000 ALTER TABLE `officialmaterial` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.officialmaterialuploader: ~0 rows (approximately)
/*!40000 ALTER TABLE `officialmaterialuploader` DISABLE KEYS */;
/*!40000 ALTER TABLE `officialmaterialuploader` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.official_material_uploaders: ~0 rows (approximately)
/*!40000 ALTER TABLE `official_material_uploaders` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_material_uploaders` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.post: ~0 rows (approximately)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.prerequisitecourse: ~2 rows (approximately)
/*!40000 ALTER TABLE `prerequisitecourse` DISABLE KEYS */;
INSERT INTO `prerequisitecourse` (`prerequisitecourseID`, `COURSECODE`, `COU_COURSECODE`) VALUES
	(1, "2", "1"),
	(2, "4", "3");
/*!40000 ALTER TABLE `prerequisitecourse` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.professor: ~1 rows (approximately)
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` (`id`, `PROFUSERNAME`, `DEPTID`, `PROFPASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONENUMBER`, `ActivationCode`, `isActiveted`, `DATEOFBIRTH`) VALUES
	(1, "Abdallah", 1, "jbrkfk%$$777", "Abdallah", "Abdalazim", "abdallah@gmail.com", "0223514655", "ORBRRV77", 1, "2018-06-29");
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.professorcourse: ~1 rows (approximately)
/*!40000 ALTER TABLE `professorcourse` DISABLE KEYS */;
INSERT INTO `professorcourse` (`professorcourseID`, `COURSECODE`, `PROFUSERNAME`) VALUES
	(1, "2", "1");
/*!40000 ALTER TABLE `professorcourse` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.slots: ~3 rows (approximately)
/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
INSERT INTO `slots` (`SLOTID`, `DAY`, `STARTTIME`, `DURATION`, `GROUPID`, `SLOTTYPE`, `PLACE`, `COURSECODE`) VALUES
	(1, "Sun", "22:30:45", 90, 1, "3", "Modarg 7", "2"),
	(2, "Mon", "22:45:15", 90, 1, "1", "Modarg Ebrahim farag", "2"),
	(3, "Mon", "22:45:30", 90, 2, "2", "Lab 7", "1");
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.staticmap: ~0 rows (approximately)
/*!40000 ALTER TABLE `staticmap` DISABLE KEYS */;
/*!40000 ALTER TABLE `staticmap` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.student: ~0 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.studentcourse: ~0 rows (approximately)
/*!40000 ALTER TABLE `studentcourse` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentcourse` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.ta: ~4 rows (approximately)
/*!40000 ALTER TABLE `ta` DISABLE KEYS */;
INSERT INTO `ta` (`id`, `TAUSERNAME`, `DEPTID`, `TAPASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONENUMBER`, `DATEOFBIRTH`, `ActivationCode`, `isActiveted`) VALUES
	(1, "Treka", 1, "jrnbhf8546", "Mohamed", "AboTreka", "Treka@gmail.com", "0223564178", "2018-06-29", "RFNO77", 1),
	(2, "Kota", 1, "rjnr864$$", "Mohamed", "Barakat", "kota@gmail.com", "0223564189", "2018-06-27", "EFNOFN77", 1),
	(3, "Gom2a", 2, "rnb64^^&", "Waal", "Gomaa", "Gom2a@gmail.com", "0223561478", "2018-06-29", "RFOMR77", 1),
	(4, "Fathi", 2, "jkbr%^786", "Ahmed", "Fathi", "Fathi@gmail.com", "0223155546", "2018-06-27", "VNORN77", 1);
/*!40000 ALTER TABLE `ta` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.tacourse: ~2 rows (approximately)
/*!40000 ALTER TABLE `tacourse` DISABLE KEYS */;
INSERT INTO `tacourse` (`TACOURSEID`, `TAUSERNAME`, `COURSECODE`, `GROUPID`) VALUES
	(1, "1", "2", 1),
	(2, "2", "1", 2);
/*!40000 ALTER TABLE `tacourse` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.task: ~0 rows (approximately)
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

-- Dumping data for table e-campus_db_2.taskcreator: ~0 rows (approximately)
/*!40000 ALTER TABLE `taskcreator` DISABLE KEYS */;
/*!40000 ALTER TABLE `taskcreator` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, "") */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

	    ');
    }
}
