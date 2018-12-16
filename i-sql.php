<?php
/*
contoh sql untuk nama_pengguna
-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `nama_pengguna`;
CREATE TABLE `nama_pengguna` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(70) NOT NULL DEFAULT '',
  `kataLaluan` varchar(255) NOT NULL DEFAULT '',
  `kataRahsia` mediumtext NOT NULL,
  `level` varchar(50) DEFAULT 'user',
  `nokp` varchar(20) DEFAULT NULL,
  `Nama_Penuh` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT '',
  `nohp` varchar(20) NOT NULL,
  `CatatNota` text,
  PRIMARY KEY (`namaPengguna`,`kataLaluan`),
  KEY `Bil` (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `nama_pengguna` (`no`, `namaPengguna`, `kataLaluan`, `kataRahsia`, `level`, `nokp`, `Nama_Penuh`, `email`, `nohp`, `CatatNota`) VALUES
(1,	'admin1',	'360cea6bdd8203dcb002a81f3b7e7408',	'',	'admin',	'01012019010000',	'admin1',	'admin1@duduk.mana',	'012345678',	'contoh password admin1satu'),
(2,	'user1',	'527404287f666a77506b77e5b6184c86',	'',	'user',	'010119010001',	'user1',	'user1@duduk.mana',	'011234567',	'contoh password user1satu');

-- 2018-12-16 21:36:48

*/
