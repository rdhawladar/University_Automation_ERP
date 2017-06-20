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
  `gardian_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ssc_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hsc_result` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_GPA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pr_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
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
INSERT INTO `osad_student` (`id`, `acd_session_id`, `app_sno`, `name_en`, `name_bn`, `father_name`, `mother_name`, `gardian_name`, `nationality`, `technology`, `ff_son`, `upjati`, `birthday`, `sex`, `religion`, `blood_group`, `pr_address`, `phone`, `email`, `password`, `class_id`, `section_id`, `parent_id`, `roll`, `transport_id`, `dormitory_id`, `dormitory_room_number`, `pay_no`, `pay_date`, `app_date`, `photo`, `pay_status`, `cur_address`, `register_number`) VALUES
	(12, 8, 0, 'Noor English', 'Noor Bangla', 'Noor Father Name', 'Noor Mother Name', 'Nor Guardian Name', 'bangladeshi', 'computer Science & Engineering, electrical & electronic engineering, bba', 'no', 'no', '01/11/1986', 'male', 'Islam', '', 'Noor Permanent Address', '03492349823749', 'webmaster.noor@gmail.com', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '2016-06-21', NULL, '', 'Noor Current Address', '101'),
	(13, 8, 0, 'test', 'test', 'ff', 'gg', 'hghgh', 'bangladeshi', 'Computer Science & Engineering (CSE), Electrical & electronics Engineering (EEE)', 'yes', 'yes', '06/07/2016', 'male', 'Islam', '', 'p address', '3453', 'webmaster.noor112@gmail.com', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '2016-06-21', NULL, 'Application Accepted', 'c add', '102'),
	(19, 8, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL),
	(28, 8, 0, 'Noor Test English', 'Noor test bangla', 'Noor test father', 'Noor test mother', 'Noor test guardian', 'afghan', 'Computer Science & Engineering (CSE), Electrical & electronics Engineering (EEE)', 'no', 'no', '1986-11-01', 'male', 'Islam', '', 'Noor Permanent Address', '01679624759', 'noor_kuet@yahoo.com', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, 'Application Accepted', 'Noor Current Address', '4321'),
	(29, 8, 0, 'jewel enlish', 'Jewel', 'jew g=f', 'j mn ', 'j g', 'bangladeshi', 'Computer Science & Engineering (CSE), Electrical & electronics Engineering (EEE)', 'yes', 'yes', '1090-06-08', 'male', 'Islam', '', 'jhg', '4234', 'hh', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, 'Selected For Exam', 'jh', '54321'),
	(30, 8, 0, 'a', 'Sujon A=med', 'b', 'n', 'a', 'bangladeshi', 'Computer Science & Engineering (CSE), Electrical & electronics Engineering (EEE)', 'yes', 'yes', '2016-06-02', 'male', 'Islam', '', 'hgh', '65', 'hy', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, 'Selected For Exam', 'ssd', '654'),
	(31, 8, 0, 'Ria', 'riadudl Islam', 'riad father', 'riD MOTHER', 'riad guardian', 'bangladeshi', 'Computer Science & Engineering (CSE), Electrical & electronics Engineering (EEE)', 'yes', 'no', '1970-06-01', 'male', 'Islam', '', 'riD PRESENT Aaddress', '6665', 'riad@gmail.com', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, NULL, 'Riad current address', NULL),
	(32, 8, 0, 'g', 'ff', 'g', 'g', '', '', 'English, ', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', NULL, 'Application Accepted', '', '5432');
/*!40000 ALTER TABLE `osad_student` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
