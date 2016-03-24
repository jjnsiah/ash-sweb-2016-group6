CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Major` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`FacultyID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `labcourses` (
  `CourseID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `labs` (
  `LabID` int(11) NOT NULL AUTO_INCREMENT,
  `LabName` varchar(50) DEFAULT NULL,
  `LabLocation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`LabID`),
  UNIQUE KEY `LabName_UNIQUE` (`LabName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='					';


CREATE TABLE `equipment` (
  `Barcode` int(11) NOT NULL AUTO_INCREMENT,
  `EquipmentName` varchar(45) DEFAULT NULL,
  `LabID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Barcode`),
  KEY `LabID_idx` (`LabID`),
  CONSTRAINT `LabID` FOREIGN KEY (`LabID`) REFERENCES `labs` (`LabID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `requests` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `Barcode` int(11) DEFAULT NULL,
  `FacultyID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `TimeRequested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`RequestID`),
  KEY `StudentID_idx` (`StudentID`),
  KEY `Barcode_idx` (`Barcode`),
  KEY `FacultyID_idx` (`FacultyID`),
  KEY `CourseID_idx` (`CourseID`),
  CONSTRAINT `Barcode` FOREIGN KEY (`Barcode`) REFERENCES `equipment` (`Barcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CourseID` FOREIGN KEY (`CourseID`) REFERENCES `labcourses` (`CourseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FacultyID` FOREIGN KEY (`FacultyID`) REFERENCES `faculty` (`FacultyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `StudentID` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




