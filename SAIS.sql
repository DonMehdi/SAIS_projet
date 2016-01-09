CREATE DATABASE `SAIS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `SAIS`;


CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(10) NOT NULL,
  `User_Password` varchar(15) NOT NULL,
  `User_Type` int(10) NOT NULL,
  `User_First_Name` varchar(30) NOT NULL,
  `User_Last_Name` varchar(30) NOT NULL,
  `User_Position` varchar(30) NOT NULL,
  `User_Address` text NOT NULL,
  `User_Contact` varchar(30) NOT NULL,
  `User_Email` varchar(30) NOT NULL,
  `User_Society_ID` int(10) NOT NULL,
  `User_Event_ID` int(10) NOT NULL,
  PRIMARY KEY (`User_ID`),
  FOREIGN KEY (`User_Society_ID`) REFERENCES Society(`Society_ID`),
  FOREIGN KEY (`User_Event_ID`) REFERENCES Event(`Event_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `society` (
  `Society_ID` int(10) NOT NULL,
  `Society_Name` varchar(50) NOT NULL,
  `Society_Category` varchar(30) NOT NULL,
  `Society_Address` text NOT NULL,
  PRIMARY KEY (`Society_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `event` (
  `Event_ID` int(10) NOT NULL,
  `Event_Name` varchar(100) NOT NULL,
  `Event_Start_Date` DATE NOT NULL,
  `Event_End_Date` DATE NOT NULL,
  `Event_Start_Time` varchar(30) NOT NULL,
  `Event_End_Time` varchar(30) NOT NULL,
  `Event_Venue` varchar(30) NOT NULL,
  `Event_Category` varchar(30) NOT NULL,
  `Event_Budget_Required` varchar(30) NOT NULL,
  `Event_Status` varchar(30) NOT NULL,
  `Event_Society_ID` int(10) NOT NULL,
  PRIMARY KEY (`Event_ID`),
  FOREIGN KEY (`Event_Society_ID`) REFERENCES Society(`Society_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `meeting` (
  `Meeting_ID` int(10) NOT NULL,
  `Meeting_Date` DATE NOT NULL,
  `Meeting_Time` varchar(30) NOT NULL,
  `Meeting_Venue` varchar(30) NOT NULL,
  `Meeting_Agenda` text NOT NULL,
  `Meeting_Minutes` text NOT NULL,
  `Meeting_Attendee` text NOT NULL,
  `Meeting_Society_ID` int(10) NOT NULL,
  PRIMARY KEY (`Meeting_ID`),
  FOREIGN KEY (`Meeting_Society_ID`) REFERENCES Society(`Society_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `saps` (
  `SAPS_ID` int(10) NOT NULL,
  `SAPS_Student_Name` varchar(30) NOT NULL,
  `SAPS_Student_ID` int(10) NOT NULL,
  `SAPS_Points` decimal(4,2) NOT NULL,
  `SAPS_Status` varchar(30) NOT NULL,
  `SAPS_Society_ID` varchar(30) NOT NULL,
  PRIMARY KEY (`SAPS_ID`),
  FOREIGN KEY (`SAPS_Society_ID`) REFERENCES Society(`Society_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT DELAYED IGNORE INTO `user` (`User_ID`,`User_Password`,`User_Type`,`User_First_Name`,`User_Last_Name`,`User_Position`,`User_Address`,`User_Contact`,`User_Email`,`User_Society_ID`) VALUES
(1041109557,'123456',1,'Mohammed','Abdulilah','','A1-2-3,AAA,Melaka,12345,Malaysia','0176264640','mohammed_alagel@yahoo.com',0);