-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2013 at 09:24 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asav`
--

-- --------------------------------------------------------

--
-- Table structure for table `childmessages`
--

CREATE TABLE IF NOT EXISTS `childmessages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Author` int(11) DEFAULT NULL,
  `Child` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `Message` text NOT NULL,
  `IsForwarded` bit(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Author` (`Author`),
  KEY `Child` (`Child`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Sponsor` int(10) DEFAULT NULL,
  `Picture` int(10) DEFAULT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Genre` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Genre` (`Genre`),
  KEY `Sponsor` (`Sponsor`),
  KEY `Picture` (`Picture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Id`, `Name`) VALUES
(1, 'Benin'),
(2, 'France'),
(3, 'Suisse');


-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`Id`, `Name`) VALUES
(1, 'Monsieur'),
(2, 'Madame'),
(3, 'Couple');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Id`, `Name`) VALUES
(1, 'sponsor'),
(2, 'staff'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Author` int(10) DEFAULT NULL,
  `Child` int(10) DEFAULT NULL,
  `Childmessage` int(11) DEFAULT NULL,
  `Report` int(11) DEFAULT NULL,
  `Staffboard` int(11) DEFAULT NULL,
  `Path` varchar(255) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text,
  `Created` date NOT NULL,
  `Modified` date DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Child` (`Child`),
  KEY `Childmessage` (`Childmessage`),
  KEY `Staffboard` (`Staffboard`),
  KEY `Author` (`Author`),
  KEY `Report` (`Report`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Country` int(10) NOT NULL,
  `Genre` int(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Country` (`Country`),
  KEY `Genre` (`Genre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  `Child` int(10) NOT NULL,
  `Person` int(10) NOT NULL,
  `RelationType` int(10) NOT NULL,
  `IsHosted` bit(1) NOT NULL,
  `IsTutor` bit(1) NOT NULL,
  PRIMARY KEY (`Child`,`Person`,`RelationType`),
  KEY `Person` (`Person`),
  KEY `RelationType` (`RelationType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relationtypes`
--

CREATE TABLE IF NOT EXISTS `relationtypes` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `relationtypes`
--

INSERT INTO `relationtypes` (`Id`, `Name`) VALUES
(1, 'parrain');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Author` int(10) DEFAULT NULL,
  `Child` int(10) NOT NULL,
  `Status` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreationDate` date NOT NULL,
  `UpdateDate` date NOT NULL,
  `VisitDate` date NOT NULL,
  `ActionsNutricient` text,
  `ActionsSchcool` text,
  `ActionsOther` text,
  `NoteNutricient` text NOT NULL,
  `NoteSchool` text NOT NULL,
  `NoteOther` text,
  PRIMARY KEY (`Id`),
  KEY `Author` (`Author`),
  KEY `Child` (`Child`),
  KEY `Status` (`Status`),
  KEY `Type` (`Type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reportstatus`
--

CREATE TABLE IF NOT EXISTS `reportstatus` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reportstatus`
--

INSERT INTO `reportstatus` (`Id`, `Status`) VALUES
(4, '√âcrit'),
(5, 'Trait√©'),
(6, 'Retour aux agents'),
(7, 'Publi√© au Comit√©'),
(8, 'Publi√© aux parrains et au Comit√©'),
(9, 'Class√©');

-- --------------------------------------------------------

--
-- Table structure for table `reporttypes`
--

CREATE TABLE IF NOT EXISTS `reporttypes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reporttypes`
--

INSERT INTO `reporttypes` (`Id`, `Name`) VALUES
(1, 'Compte rendu'),
(2, 'Point trimestriel');

-- --------------------------------------------------------

--
-- Table structure for table `staffboard`
--

CREATE TABLE IF NOT EXISTS `staffboard` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Author` int(11) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `DateCreated` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Author` (`Author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Country` int(10) NOT NULL,
  `Genre` int(10) NOT NULL,
  `Group` int(10) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ZipCode` int(10) DEFAULT NULL,
  `Town` varchar(60) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` binary(20) NOT NULL,
  `Salt` varchar(32) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Country` (`Country`),
  KEY `Genre` (`Genre`),
  KEY `Group` (`Group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Country`, `Genre`, `Group`, `Firstname`, `Lastname`, `Birthday`, `Address`, `ZipCode`, `Town`, `Email`, `Username`, `Password`, `Salt`) VALUES
(1, 3, 1, 3, 'John', 'Smith', '2000-01-01', '-', 0, '-', 'admin@admin.com', 'admin', 'Åv´„I…k¨!q˙~œòÀU˙F', 'cd68f4f9ff98f9abb1e5874d22a3693e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `childmessages`
--
ALTER TABLE `childmessages`
  ADD CONSTRAINT `childmessages_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `childmessages_ibfk_2` FOREIGN KEY (`Child`) REFERENCES `children` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`Genre`) REFERENCES `genres` (`Id`),
  ADD CONSTRAINT `children_ibfk_2` FOREIGN KEY (`Sponsor`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `children_ibfk_3` FOREIGN KEY (`Picture`) REFERENCES `media` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_6` FOREIGN KEY (`Report`) REFERENCES `reports` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`Child`) REFERENCES `children` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`Childmessage`) REFERENCES `childmessages` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`Staffboard`) REFERENCES `staffboard` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_5` FOREIGN KEY (`Author`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`Country`) REFERENCES `countries` (`Id`),
  ADD CONSTRAINT `people_ibfk_2` FOREIGN KEY (`Genre`) REFERENCES `genres` (`Id`);

--
-- Constraints for table `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `relationships_ibfk_1` FOREIGN KEY (`Child`) REFERENCES `children` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relationships_ibfk_2` FOREIGN KEY (`Person`) REFERENCES `people` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relationships_ibfk_3` FOREIGN KEY (`RelationType`) REFERENCES `relationtypes` (`Id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`Child`) REFERENCES `children` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`Author`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`Status`) REFERENCES `reportstatus` (`Id`),
  ADD CONSTRAINT `reports_ibfk_4` FOREIGN KEY (`Type`) REFERENCES `reporttypes` (`Id`);

--
-- Constraints for table `staffboard`
--
ALTER TABLE `staffboard`
  ADD CONSTRAINT `staffboard_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `users` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Country`) REFERENCES `countries` (`Id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`Genre`) REFERENCES `genres` (`Id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`Group`) REFERENCES `groups` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
