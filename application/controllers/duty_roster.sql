/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  TMSS-ICT
 * Created: Nov 12, 2016
 */
DROP TABLE IF EXISTS `duty_roster`;
CREATE TABLE IF NOT EXISTS `duty_roster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramName` longtext COLLATE utf8_unicode_ci,
  `BatchName` longtext COLLATE utf8_unicode_ci,
  `SessionName` longtext COLLATE utf8_unicode_ci,
  `Year` longtext COLLATE utf8_unicode_ci,
  `SemesterName` longtext COLLATE utf8_unicode_ci NOT NULL,
  `CourseName` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ExamType` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `StartTime` longtext COLLATE utf8_unicode_ci NOT NULL,
  `EndTime` longtext COLLATE utf8_unicode_ci NOT NULL,
  `RoomNo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `InstructorId` longtext COLLATE utf8_unicode_ci NOT NULL,
  `InstructorName` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Signature` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Remarks` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11374 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
