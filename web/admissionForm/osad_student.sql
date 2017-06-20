-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for pundro



-- Dumping structure for table pundro.osad_student
DROP TABLE IF EXISTS `osad_student`;
CREATE TABLE IF NOT EXISTS `osad_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acd_session_id` int(11) NOT NULL,
  `app_sno` int(11) NOT NULL,
  `name_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday`` longtext COLLATE utf8_unicode_ci NOT NULL,
  `present_village_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `present_post_office` longtext COLLATE utf8_unicode_ci NOT NULL,
  `present_post_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `present_police_station` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `present_district_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ssc_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hsc_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `country` longtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` int(11) NOT NULL,
  `ssc_certificate` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pay_no` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `app_date` date NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cur_address` longtext COLLATE utf8_unicode_ci,
  `register_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acd_session_id` (`acd_session_id`),
  CONSTRAINT `osad_student_ibfk_1` FOREIGN KEY (`acd_session_id`) REFERENCES `acd_session` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pundro.osad_student: ~8 rows (approximately)
DELETE FROM `osad_student`;
/*!40000 ALTER TABLE `osad_student` DISABLE KEYS */;
INSERT INTO `osad_student` (`id`, `acd_session_id`, `app_sno`, `name_en`, `name_bn`, `father_name`, `mother_name`, `gardian_name`, `nationality`, `ssc_result``, `hsc_result``, `total_GPA``, `birthday`, `sex`, `religion`, `blood_group`, `pr_address`, `phone`, `email`, `password`, `class_id`, `section_id`, `parent_id`, `dormitory_id``, `dormitory_room_number``, `pay_no`, `pay_date`, `app_date`, `photo`, `pay_status`, `cur_address`, `register_number`) VALUES
	(12, 8, 0, 'Noor English', 'Noor Bangla', 'Noor Father Name', 'Noor Mother Name', 'Nor Guardian Name', 'bangladeshi', '5', '5', '10', '01/11/1986', 'male', 'Islam', 'AB+', 'Noor Permanent Address', '03492349823749', 'webmaster.noor@gmail.com', '', 0, 0, 0, 0,'','0000-00-00', '2016-06-21', NULL, '','', 'Noor Current Address', '101'),
	(13, 8, 0, 'Noor English', 'Noor Bangla', 'Noor Father Name', 'Noor Mother Name', 'Nor Guardian Name', 'bangladeshi', '5', '5', '10', '01/11/1986', 'male', 'Islam', 'AB+', 'Noor Permanent Address', '03492349823749', 'webmaster.noor@gmail.com', '', 0, 0, 0, 0,'','0000-00-00', '2016-06-21', NULL, '','', 'Noor Current Address', '101'),
	(14, 8, 0, 'Noor English', 'Noor Bangla', 'Noor Father Name', 'Noor Mother Name', 'Nor Guardian Name', 'bangladeshi', '5', '5', '10', '01/11/1986', 'male', 'Islam', 'AB+', 'Noor Permanent Address', '03492349823749', 'webmaster.noor@gmail.com', '', 0, 0, 0, 0,'','0000-00-00', '2016-06-21', NULL, '','', 'Noor Current Address', '101'),
	(15, 8, 0, 'Noor English', 'Noor Bangla', 'Noor Father Name', 'Noor Mother Name', 'Nor Guardian Name', 'bangladeshi', '5', '5', '10', '01/11/1986', 'male', 'Islam', 'AB+', 'Noor Permanent Address', '03492349823749', 'webmaster.noor@gmail.com', '', 0, 0, 0, 0,'','0000-00-00', '2016-06-21', NULL, '','', 'Noor Current Address', '101');
/*!40000 ALTER TABLE `osad_student` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
