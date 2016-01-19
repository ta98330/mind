-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: mysql137.heteml.jp
-- Generation Time: 2016 年 1 月 19 日 14:07
-- サーバのバージョン： 5.6.13-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `_student15`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `mf_impressions`
--

CREATE TABLE IF NOT EXISTS `mf_impressions` (
  `id` int(5) DEFAULT NULL,
  `rep` int(3) DEFAULT '1',
  `datetime` datetime DEFAULT NULL,
  `bfaf` varchar(5) DEFAULT NULL,
  `ang` int(3) DEFAULT NULL,
  `sad` int(3) DEFAULT NULL,
  `anxiety` int(3) DEFAULT NULL,
  `joy` int(3) DEFAULT NULL,
  `stress` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
