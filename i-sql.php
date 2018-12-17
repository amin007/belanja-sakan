<?php
/*
-- contoh sql senarai table yang ada
-- Adminer 4.6.3 MySQL dump

DROP TABLE IF EXISTS `kod_mediumpembayaran`;
CREATE TABLE `kod_mediumpembayaran` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kod` char(2) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kod_mediumpembayaran` (`no`, `kod`, `keterangan`, `catatan`) VALUES
(1,	'01',	'bayaran terus | direct payment',	''),
(2,	'02',	'cek/bank draf/kiriman wang/wang pos\r\n|check / bank draft / remittance / postal order',	''),
(3,	'03',	'kad atm/debit/kad prabayar(contoh: tng)\r\n|atm / debit card / prepaid card (e.g: tng)',	''),
(4,	'04',	'perbankan melalui internet/telefon\r\n|banking via internet / phone',	''),
(5,	'05',	'pembayaran melalui telefon\r\n|payment by phone',	''),
(6,	'06',	'kad kredit/kad caj\r\n|credit card / charge card',	''),
(7,	'07',	'kredit selain dari menggunakan kad kredit\r\n|credit other than using a credit card',	''),
(8,	'08',	'sewa beli | hire purchase',	''),
(9,	'09',	'percuma | free',	''),
(10,	'10',	'lain-lain (contoh:konsesi)\r\n|others (eg: concessions)',	'');

DROP TABLE IF EXISTS `kod_puncapembelian`;
CREATE TABLE `kod_puncapembelian` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kod` char(2) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kod_puncapembelian` (`no`, `kod`, `keterangan`, `catatan`) VALUES
(1,	'01',	'pasar basah',	''),
(2,	'02',	'pasar borong',	''),
(3,	'03',	'pasar tani/pasar tamu',	''),
(4,	'04',	'pasar malam',	''),
(5,	'05',	'kedai runcit di dalam pasar basah/pasar borong',	''),
(6,	'06',	'kedai runcit',	''),
(7,	'07',	'kedai runcit/akhbar di pusat membeli belah',	''),
(8,	'08',	'pasar mini / mini market',	''),
(9,	'09',	'Pasar raya',	''),
(10,	'10',	'departmental store',	''),
(11,	'11',	'Kedai `convenience`',	''),
(12,	'12',	'Pasar raya besar (Hypermarket)',	''),
(13,	'13',	'kedai khusus',	''),
(14,	'14',	'restoran/kedai makan',	''),
(15,	'15',	'restoran bercawangan / food court',	''),
(16,	'16',	'gerai kecil/karavan/ food truck/kiosk',	''),
(17,	'17',	'restoran berhawa dingin / restoran 24 jam',	''),
(18,	'18',	'stesen petrol',	''),
(19,	'19',	'farmasi',	''),
(20,	'20',	'pembelian atas talian/pembelian melalui tempahan',	''),
(21,	'21',	'lain-lain',	'');

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
(1,	'admin1',	'360cea6bdd8203dcb002a81f3b7e7408',	'',	'admin1',	'01012019010000',	'admin1',	'admin1@duduk.mana',	'012345678',	'contoh password admin1satu'),
(2,	'user1',	'527404287f666a77506b77e5b6184c86',	'',	'user',	'010119010001',	'user1',	'user1@duduk.mana',	'011234567',	'contoh password user1satu');

DROP TABLE IF EXISTS `senarai_belanja`;
CREATE TABLE `senarai_belanja` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` enum('01,02,03,04,05,06,07,08,09,10') DEFAULT NULL,
  `mediaum_edagang` int(11) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `catatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-12-17 05:18:18
*/
