-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 10 月 19 日 00:19
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(11) NOT NULL,
  `life_flg` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `login`, `password`, `kanri_flg`, `life_flg`) VALUES
(1, '井原純輝', '四街道', 'ihara@test.jp', 'Sherlock', 'Holmes', 0, 0),
(2, 'ホームズ', 'ベーカー街221B', 'Holmes@test.jp', '', '', 0, 0),
(3, 'シャーロックホームズ', 'ベーカー街221B', 'holmes@bs.jp', 'HOLMES', '221B', 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `customer_id` int(12) NOT NULL,
  `syouhin_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `favorite`
--

INSERT INTO `favorite` (`customer_id`, `syouhin_id`) VALUES
(1, 1),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`, `age`) VALUES
(2, 'junki', 't@test.jp', 'ホームズ', '2017-05-26 16:06:24', 20),
(3, 'yamada', 'yama@test.jp', 'ホームズ', '2018-09-22 16:06:50', 30),
(4, 'tanaka', 'tana@test1t.jp', 'ホームズ', '2018-09-22 16:07:40', 20),
(5, 'suzuki', 'suzu@test.jp', 'ホームズ', '2018-09-22 16:07:40', 40),
(6, '井原純輝', 'ihara@test.jp', 'テスト', '2018-09-22 17:30:07', 10),
(7, '井原', 'test1@test.jp', '', '2018-09-22 18:12:59', 20),
(8, '井原', 'i@test.jp', 'あああ', '2018-09-22 18:13:18', 40),
(9, 'ihara', 'ihara@test.jp', '', '2018-09-29 16:21:33', 40);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, '管理者A', 'kanri1', 'kanri1', 1, 0),
(5, '一般B', 'ippan1', 'ippan1', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `customer_id` int(12) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `purchase`
--

INSERT INTO `purchase` (`customer_id`, `id`) VALUES
(1, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(3, 2),
(3, 2),
(3, 2),
(3, 2),
(3, 1),
(3, 3),
(4, 3),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_detail` (
  `purchase_id` int(12) NOT NULL,
  `syouhin_id` int(12) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `syouhin_id`, `count`) VALUES
(2, 0, 1),
(2, 0, 1),
(2, 0, 1),
(2, 0, 1),
(2, 1, 1),
(2, 1, 1),
(2, 3, 1),
(3, 2, 1),
(3, 2, 4),
(3, 4, 1),
(3, 4, 1),
(3, 4, 1),
(3, 4, 1),
(3, 3, 3),
(3, 1, 6),
(3, 3, 1),
(3, 3, 3),
(4, 1, 3),
(4, 1, 1),
(4, 2, 1),
(4, 1, 5);

-- --------------------------------------------------------

--
-- テーブルの構造 `syouhin`
--

CREATE TABLE IF NOT EXISTS `syouhin` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `syouhin`
--

INSERT INTO `syouhin` (`id`, `name`, `price`) VALUES
(1, '緋色の研究', 400),
(2, '四つの署名', 497),
(3, '恐怖の谷', 529),
(4, 'バスカヴィル家の犬', 594),
(5, '３人ガリデブ', 594);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syouhin`
--
ALTER TABLE `syouhin`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `syouhin`
--
ALTER TABLE `syouhin`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
