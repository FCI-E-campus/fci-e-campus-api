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
	    	INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, \'Email Template Forgot Password Backend\', \'forgot_password_backend\', NULL, \'<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>\', \'[password]\', \'System\', \'system@crudbooster.com\', NULL, \'2018-06-25 15:09:27\', NULL);

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/login\', \'admin@crudbooster.com login with IP Address 127.0.0.1\', \'\', 1, \'2018-06-25 15:14:37\', NULL),
(2, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/department/add-save\', \'Add New Data  at Department\', \'\', 1, \'2018-06-25 15:20:23\', NULL),
(3, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/course/add-save\', \'Add New Data 1 at Course\', \'\', 1, \'2018-06-25 15:21:01\', NULL),
(4, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/ta/add-save\', \'Add New Data 1 at TA\', \'\', 1, \'2018-06-25 15:21:45\', NULL),
(5, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/groups/add-save\', \'Add New Data  at Group\', \'\', 1, \'2018-06-25 15:26:53\', NULL),
(6, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/groups/delete/1\', \'Delete data  at Group\', \'\', 1, \'2018-06-25 15:34:29\', NULL),
(7, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/groups/add-save\', \'Add New Data  at Group\', \'\', 1, \'2018-06-25 15:54:44\', NULL),
(8, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/tacourse/add-save\', \'Add New Data  at Ta Course\', \'\', 1, \'2018-06-25 15:57:54\', NULL),
(9, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/professor/add-save\', \'Add New Data 1 at Professor\', \'\', 1, \'2018-06-25 16:01:19\', NULL),
(10, \'127.0.0.1\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36\', \'http://fci-e-campus-api.local:8080/admin/professorcourse/add-save\', \'Add New Data  at Proffesor Course\', \'\', 1, \'2018-06-25 16:04:39\', NULL);

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, \'Course\', \'Route\', \'AdminCourseControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 1, \'2018-06-25 15:14:53\', NULL),
(2, \'Department\', \'Route\', \'AdminDepartmentControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 2, \'2018-06-25 15:16:04\', NULL),
(3, \'TA\', \'Route\', \'AdminTaControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 3, \'2018-06-25 15:16:59\', NULL),
(4, \'Ta Course\', \'Route\', \'AdminTacourseControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 4, \'2018-06-25 15:18:33\', NULL),
(5, \'Group\', \'Route\', \'AdminGroupsControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 5, \'2018-06-25 15:23:34\', NULL),
(6, \'Professor\', \'Route\', \'AdminProfessorControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 6, \'2018-06-25 15:59:10\', NULL),
(7, \'Proffesor Course\', \'Route\', \'AdminProfessorcourseControllerGetIndex\', NULL, \'fa fa-glass\', 0, 1, 0, 1, 7, \'2018-06-25 16:01:47\', NULL);

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1);

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, \'Notifications\', \'fa fa-cog\', \'notifications\', \'cms_notifications\', \'NotificationsController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(2, \'Privileges\', \'fa fa-cog\', \'privileges\', \'cms_privileges\', \'PrivilegesController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(3, \'Privileges Roles\', \'fa fa-cog\', \'privileges_roles\', \'cms_privileges_roles\', \'PrivilegesRolesController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(4, \'Users Management\', \'fa fa-users\', \'users\', \'cms_users\', \'AdminCmsUsersController\', 0, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(5, \'Settings\', \'fa fa-cog\', \'settings\', \'cms_settings\', \'SettingsController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(6, \'Module Generator\', \'fa fa-database\', \'module_generator\', \'cms_moduls\', \'ModulsController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(7, \'Menu Management\', \'fa fa-bars\', \'menu_management\', \'cms_menus\', \'MenusController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(8, \'Email Templates\', \'fa fa-envelope-o\', \'email_templates\', \'cms_email_templates\', \'EmailTemplatesController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(9, \'Statistic Builder\', \'fa fa-dashboard\', \'statistic_builder\', \'cms_statistics\', \'StatisticBuilderController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(10, \'API Generator\', \'fa fa-cloud-download\', \'api_generator\', \'\', \'ApiCustomController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(11, \'Log User Access\', \'fa fa-flag-o\', \'logs\', \'cms_logs\', \'LogsController\', 1, 1, \'2018-06-25 15:09:24\', NULL, NULL),
(12, \'Course\', \'fa fa-glass\', \'course\', \'course\', \'AdminCourseController\', 0, 0, \'2018-06-25 15:14:53\', NULL, NULL),
(13, \'Department\', \'fa fa-glass\', \'department\', \'department\', \'AdminDepartmentController\', 0, 0, \'2018-06-25 15:16:04\', NULL, NULL),
(14, \'TA\', \'fa fa-glass\', \'ta\', \'ta\', \'AdminTaController\', 0, 0, \'2018-06-25 15:16:58\', NULL, NULL),
(15, \'Ta Course\', \'fa fa-glass\', \'tacourse\', \'tacourse\', \'AdminTacourseController\', 0, 0, \'2018-06-25 15:18:32\', NULL, NULL),
(16, \'Group\', \'fa fa-glass\', \'groups\', \'groups\', \'AdminGroupsController\', 0, 0, \'2018-06-25 15:23:34\', NULL, NULL),
(17, \'Professor\', \'fa fa-glass\', \'professor\', \'professor\', \'AdminProfessorController\', 0, 0, \'2018-06-25 15:59:10\', NULL, NULL),
(18, \'Proffesor Course\', \'fa fa-glass\', \'professorcourse\', \'professorcourse\', \'AdminProfessorcourseController\', 0, 0, \'2018-06-25 16:01:47\', NULL, NULL);

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, \'Super Administrator\', 1, \'skin-red\', \'2018-06-25 15:09:25\', NULL);

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, \'2018-06-25 15:09:25\', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, \'2018-06-25 15:09:25\', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, \'2018-06-25 15:09:25\', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, \'2018-06-25 15:09:25\', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, \'2018-06-25 15:09:25\', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, \'2018-06-25 15:09:25\', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, \'2018-06-25 15:09:25\', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, \'2018-06-25 15:09:25\', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, \'2018-06-25 15:09:25\', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, \'2018-06-25 15:09:25\', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, \'2018-06-25 15:09:26\', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 18, NULL, NULL);

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, \'login_background_color\', NULL, \'text\', NULL, \'Input hexacode\', \'2018-06-25 15:09:26\', NULL, \'Login Register Style\', \'Login Background Color\'),
(2, \'login_font_color\', NULL, \'text\', NULL, \'Input hexacode\', \'2018-06-25 15:09:26\', NULL, \'Login Register Style\', \'Login Font Color\'),
(3, \'login_background_image\', NULL, \'upload_image\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Login Register Style\', \'Login Background Image\'),
(4, \'email_sender\', \'support@crudbooster.com\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'Email Sender\'),
(5, \'smtp_driver\', \'mail\', \'select\', \'smtp,mail,sendmail\', NULL, \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'Mail Driver\'),
(6, \'smtp_host\', \'\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'SMTP Host\'),
(7, \'smtp_port\', \'25\', \'text\', NULL, \'default 25\', \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'SMTP Port\'),
(8, \'smtp_username\', \'\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'SMTP Username\'),
(9, \'smtp_password\', \'\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Email Setting\', \'SMTP Password\'),
(10, \'appname\', \'CRUDBooster\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Application Name\'),
(11, \'default_paper_size\', \'Legal\', \'text\', NULL, \'Paper size, ex : A4, Legal, etc\', \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Default Paper Print Size\'),
(12, \'logo\', \'\', \'upload_image\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Logo\'),
(13, \'favicon\', \'\', \'upload_image\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Favicon\'),
(14, \'api_debug_mode\', \'true\', \'select\', \'true,false\', NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'API Debug Mode\'),
(15, \'google_api_key\', \'\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Google API Key\'),
(16, \'google_fcm_key\', \'\', \'text\', NULL, NULL, \'2018-06-25 15:09:26\', NULL, \'Application Setting\', \'Google FCM Key\');

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, \'Super Admin\', NULL, \'admin@crudbooster.com\', \'$2y$10$dhnADX8SxG7rzitB3D4CdO.ZodXrA3tpC2y2PUifD//X4PsUmmE6O\', 1, \'2018-06-25 15:09:24\', NULL, \'Active\');

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `COURSECODE`, `DEPTID`, `COURSETITLE`, `DESCRIPTION`, `STARTDATE`, `ENDDATE`, `PASSCODE`) VALUES
(1, \'ABDEC\', 1, \'asdasdasd\', \'adsaddsd\', \'2018-06-25 00:00:00\', \'2018-06-26 00:00:00\', \'123123\');

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPTID`, `DEPARTMENTNAME`, `DESCRIPTION`) VALUES
(1, \'Hello\', \'dasdas\');

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GROUPID`, `COURSECODE`, `GROUPNAME`) VALUES
(1, \'ABDEC\', \'New group\');

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, \'2018_06_16_000000_create_author_table\', 1),
(2, \'2018_06_16_000001_create_admin_table\', 1),
(3, \'2018_06_16_000002_create_staticmap_table\', 1),
(4, \'2018_06_16_000003_create_officialmaterialuploader_table\', 1),
(5, \'2018_06_16_000004_create_taskcreator_table\', 1),
(6, \'2018_06_16_000005_create_department_table\', 1),
(7, \'2018_06_16_000007_create_professor_table\', 1),
(8, \'2018_06_16_000008_create_ta_table\', 1),
(9, \'2018_06_16_000009_create_student_table\', 1),
(10, \'2018_06_16_000010_create_course_table\', 1),
(11, \'2018_06_16_000011_create_task_table\', 1),
(12, \'2018_06_16_000012_create_extramaterials_table\', 1),
(13, \'2018_06_16_000013_create_forum_table\', 1),
(14, \'2018_06_16_000015_create_professorcourse_table\', 1),
(15, \'2018_06_16_000016_create_announcement_table\', 1),
(16, \'2018_06_16_000016_create_groups_table\', 1),
(17, \'2018_06_16_000018_create_tacourse_table\', 1),
(18, \'2018_06_16_000021_create_officialmaterial_table\', 1),
(19, \'2018_06_16_000022_create_post_table\', 1),
(20, \'2018_06_16_000023_create_studentcourse_table\', 1),
(21, \'2018_06_16_000024_create_comment_table\', 1),
(22, \'2018_06_18_183045_create_prerequisitecourse\', 1),
(23, \'2018_06_18_193514_add_foreign_key_to_prerequisitecourse\', 1),
(24, \'2018_06_20_211557_create_slots\', 1),
(25, \'2018_06_20_215327_add_foreign_key_to_slots\', 1),
(26, \'2018_06_23_002736_create_official_material_uploaders_table\', 1),
(27, \'2016_08_07_145904_add_table_cms_apicustom\', 2),
(28, \'2016_08_07_150834_add_table_cms_dashboard\', 2),
(29, \'2016_08_07_151210_add_table_cms_logs\', 2),
(30, \'2016_08_07_151211_add_details_cms_logs\', 2),
(31, \'2016_08_07_152014_add_table_cms_privileges\', 2),
(32, \'2016_08_07_152214_add_table_cms_privileges_roles\', 2),
(33, \'2016_08_07_152320_add_table_cms_settings\', 2),
(34, \'2016_08_07_152421_add_table_cms_users\', 2),
(35, \'2016_08_07_154624_add_table_cms_menus_privileges\', 2),
(36, \'2016_08_07_154624_add_table_cms_moduls\', 2),
(37, \'2016_08_17_225409_add_status_cms_users\', 2),
(38, \'2016_08_20_125418_add_table_cms_notifications\', 2),
(39, \'2016_09_04_033706_add_table_cms_email_queues\', 2),
(40, \'2016_09_16_035347_add_group_setting\', 2),
(41, \'2016_09_16_045425_add_label_setting\', 2),
(42, \'2016_09_17_104728_create_nullable_cms_apicustom\', 2),
(43, \'2016_10_01_141740_add_method_type_apicustom\', 2),
(44, \'2016_10_01_141846_add_parameters_apicustom\', 2),
(45, \'2016_10_01_141934_add_responses_apicustom\', 2),
(46, \'2016_10_01_144826_add_table_apikey\', 2),
(47, \'2016_11_14_141657_create_cms_menus\', 2),
(48, \'2016_11_15_132350_create_cms_email_templates\', 2),
(49, \'2016_11_15_190410_create_cms_statistics\', 2),
(50, \'2016_11_17_102740_create_cms_statistic_components\', 2),
(51, \'2017_06_06_164501_add_deleted_at_cms_moduls\', 2);

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `PROFUSERNAME`, `DEPTID`, `PROFPASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONENUMBER`, `ActivationCode`, `isActiveted`, `DATEOFBIRTH`) VALUES
(1, \'amr96\', 1, \'121312\', \'Omar\', \'Salama\', \'omarfawzi96@gmail.com\', \'1120879248\', \'adsasdsds\', 1, \'2018-06-26\');

--
-- Dumping data for table `professorcourse`
--

INSERT INTO `professorcourse` (`professorcourseID`, `COURSECODE`, `PROFUSERNAME`) VALUES
(1, \'ABDEC\', \'amr96\');

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id`, `TAUSERNAME`, `DEPTID`, `TAPASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PHONENUMBER`, `DATEOFBIRTH`, `ActivationCode`, `isActiveted`) VALUES
(1, \'Omar Salama\', 1, \'123456\', \'Omar\', \'Salama\', \'omarfawzi96@gmail.com\', \'1120879248\', \'2018-06-19\', \'adasdasd\', 1);

--
-- Dumping data for table `tacourse`
--

INSERT INTO `tacourse` (`TACOURSEID`, `TAUSERNAME`, `COURSECODE`, `GROUPID`) VALUES
(1, \'salama96\', \'ABDEC\', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

	    ');
    }
}
