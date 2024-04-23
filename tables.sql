--phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: cycle2.eecs.ku.edu
-- Generation Time: Sep 25, 2009 at 11:01 AM
-- Server version: 5.1.37
-- PHP Version: 5.2.9
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
--
--
-- --------------------------------------------------------
--
-- Table structure for table 'CHECKEDOUT'
--
DROP TABLE IF EXISTS CHECKEDOUT;
CREATE TABLE IF NOT EXISTS CHECKEDOUT (
BARCODE varchar(14) NOT NULL REFERENCES BOOK (BARCODE),
ACCOUNTID varchar(12) NOT NULL REFERENCES ACCOUNT (ACCOUNTID),
DUEDATE datetime DEFAULT NULL,
PRIMARY KEY (BARCODE, ACCOUNTID)
);
--
-- Dumping data for table 'CHECKEDOUT'
--
INSERT INTO CHECKEDOUT (BARCODE, ACCOUNTID, DUEDATE)
VALUES('', '', '');

-- --------------------------------------------------------
--
-- Table structure for table 'ACCOUNT'
--
DROP TABLE IF EXISTS ACCOUNT;
CREATE TABLE IF NOT EXISTS ACCOUNT (
ACCOUNTID varchar(12) NOT NULL,
UNAME varchar(20) DEFAULT NULL,
HOMEADDRESS varchar(20) DEFAULT NULL,
FEES varchar(3) DEFAULT NULL,
HOMELOCATION varchar(20) DEFAULT NULL REFERENCES LOCATION (LOCNAME),
PRIMARY KEY (ACCOUNTID)
);
--
-- Dumping data for table 'ACCOUNT'
--
INSERT INTO ACCOUNT (ACCOUNTID, UNAME, HOMEADDRESS, FEES, HOMELOCATION)
VALUES('', '', '', '', '');

-- --------------------------------------------------------
--
-- Table structure for table 'EMPLOYEE'
--
DROP TABLE IF EXISTS EMPLOYEE;
CREATE TABLE IF NOT EXISTS EMPLOYEE (
EMPLOYID varchar(12) NOT NULL,
ENAME varchar(25) DEFAULT NULL,
SALARY varchar(6) DEFAULT NULL,
LOCNAME varchar(20) DEFAULT NULL REFERENCES LOCATION (LOCNAME),
PASS varchar(20) DEFAULT NULL, 
PRIMARY KEY (EMPLOYID)
);
--
-- Dumping data for table 'EMPLOYEE'
--
INSERT INTO EMPLOYEE (EMPLOYID, ENAME, SALARY, LOCNAME, PASS) VALUES('',
'', '', '', '');

-- --------------------------------------------------------
--
-- Table structure for table 'LOCATION'
--
DROP TABLE IF EXISTS LOCATION;
CREATE TABLE IF NOT EXISTS LOCATION (
LOCNAME varchar(20) NOT NULL,
ADDRESS varchar(25) DEFAULT NULL,
PRIMARY KEY (LOCNAME)
);
--
-- Dumping data for table 'LOCATION'
--
INSERT INTO SHIP (LOCNAME, ADDRESS) VALUES('', '');

-- --------------------------------------------------------
--
-- Table structure for table 'BOOK'
--
DROP TABLE IF EXISTS BOOK;
CREATE TABLE IF NOT EXISTS BOOK (
BARCODE varchar(14) NOT NULL,
ISBN varchar(13) DEFAULT NULL,
ATLOC varchar(20) DEFAULT NULL REFERENCES LOCATION (LOCNAME),
PRIMARY KEY (BARCODE),
);
--
-- Dumping data for table 'BOOK'
--
INSERT INTO BOOK (BARCODE, ISBN, ATLOC) 
VALUES('','', '');

-- --------------------------------------------------------
--
-- Table structure for table 'BOOKINFO'
--
DROP TABLE IF EXISTS BOOKINFO;
CREATE TABLE IF NOT EXISTS BOOKINFO (
ISBN varchar(13) NOT NULL REFERENCES BOOK (ISBN),
PUBDATE datetime DEFAULT NULL,
TITLE varchar(25) DEFAULT NULL,
PRIMARY KEY (ISBN),
);
--
-- Dumping data for table 'BOOKINFO'
--
INSERT INTO BOOKINFO (ISBN, PUBDATE, TITLE) 
VALUES('','', '');

-- --------------------------------------------------------
--
-- Table structure for table 'BOOKAUTHORS'
--
DROP TABLE IF EXISTS BOOKAUTHORS;
CREATE TABLE IF NOT EXISTS BOOKAUTHORS (
BARCODE varchar(14) NOT NULL REFERENCES BOOK (BARCODE),
AUTHOR varchar(25) NOT NULL,
PRIMARY KEY (BARCODE, AUTHOR),
);
--
-- Dumping data for table 'BOOKAUTHORS'
--
INSERT INTO BOOKAUTHORS (BARCODE, AUTHOR) 
VALUES('','');

-- --------------------------------------------------------
--
-- Table structure for table 'BOOKGENRE'
--
DROP TABLE IF EXISTS BOOKGENRE;
CREATE TABLE IF NOT EXISTS BOOKGENRE (
BARCODE varchar(14) NOT NULL REFERENCES BOOK (BARCODE),
GENRE varchar(15) NOT NULL,
PRIMARY KEY (BARCODE, GENRE),
);
--
-- Dumping data for table 'BOOKGENRE'
--
INSERT INTO BOOKGENRE (BARCODE, GENRE) 
VALUES('','');


