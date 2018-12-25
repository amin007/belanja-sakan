<?php
/*
-- contoh sql senarai table yang ada
-- Adminer 4.7.0 MySQL dump

DROP TABLE IF EXISTS `kod_dapatan`;
CREATE TABLE `kod_dapatan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kod` char(10) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `kod_isirumah`;
CREATE TABLE `kod_isirumah` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kod` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kod_isirumah` (`no`, `kod`, `keterangan`, `catatan`) VALUES
(1,	'nama_isi_rumah',	'nama\r\nSiapakah nama ketua isi rumah?\r\n(ketua keluarga mesti penerima pendpaatan)\r\nsenaraikan semua ahli biasa bagi isi rumah ini.\r\n\r\nWho is the name of the head of the household?\r\n(family leader must be the recipient of the treatment)\r\nlist all ordinary members of this household.',	''),
(2,	'pkir',	'perhubungan dengan ketua isi rumah',	''),
(3,	'noair',	'no ahli isi rumah',	''),
(4,	'j',	'jantina\r\n\r\n1. lelaki\r\n2. perempuan',	''),
(5,	'tk',	'tahun kelahiran',	''),
(6,	'u',	'umur',	''),
(7,	'ket',	'kumpulan etnik',	''),
(8,	'kw',	'kewarganegaraan\r\n\r\n1. warganegara malaysia\r\n2. bukan warganegara malaysia',	''),
(9,	'rs',	'residen\r\n\r\n1. ya\r\n2. tidak\r\n\r\n(untuk bukan warganegara malaysia)',	''),
(10,	'tp',	'taraf perkahwinan\r\n\r\n1. tidkapernah berkahwin\r\n2. berkahwin\r\n3. bali/duda\r\n4. bercerai\r\n5. berpisah',	''),
(11,	'ps',	'persekolahan\r\n\r\n1. tidak bersekolah\r\n2. bersekolah\r\n3. tamat persekolahan',	''),
(12,	'sts',	'nyatakan sebab utama tidak bersekolah atau tamat persekolahan bagi mereka yang berumur 7-18 tahun\r\n\r\n1. tidak mampu dari segi kewangan\r\n2. terlalu jauh dari institusi pendidikan\r\n3. tidak berminat\r\n4. cacat\r\n5. perlu bekerja untuk menambah pendapatan keluarga\r\n6. tiada sijil kelahiran\r\n7. tidak berkenaan',	''),
(13,	'pt',	'taraf pendidian rasmi tertinggi\r\n\r\n(bagi mereka yang bersekolah di luar negara, dapatkan jumlah tahun di bangk sekolah)',	''),
(14,	'sj',	'sijil tertinggi yang diperolehi disekolah, maktab atau universiti',	''),
(15,	'airba',	'no. ahli isi rumah',	''),
(16,	'ta',	'taraf aktiviti',	''),
(17,	'pp',	'penerima pendapatan\r\n1. ya\r\n2. tidak',	''),
(18,	'pk',	'pekerjaan',	''),
(19,	'pn',	'industri',	'');

DROP TABLE IF EXISTS `kod_mediumhasil`;
CREATE TABLE `kod_mediumhasil` (
  `no` int(11) NOT NULL DEFAULT '0',
  `kod` char(2) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kod_mediumhasil` (`no`, `kod`, `keterangan`, `catatan`) VALUES
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

DROP TABLE IF EXISTS `kod_puncahasil`;
CREATE TABLE `kod_puncahasil` (
  `no` int(11) NOT NULL DEFAULT '0',
  `kod` char(2) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kod_puncahasil` (`no`, `kod`, `keterangan`, `catatan`) VALUES
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
  `kataRahsia` mediumtext,
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
(1,	'admin1',	'360cea6bdd8203dcb002a81f3b7e7408',	NULL,	'admin1',	'01012019010000',	'admin1',	'admin1@duduk.mana',	'012345678',	'contoh password admin1satu'),
(2,	'user1',	'527404287f666a77506b77e5b6184c86',	NULL,	'user',	'010119010001',	'user1',	'user1@duduk.mana',	'011234567',	'contoh password user1satu'),
(3,	'user2',	'f64431857b59221f9f0a194b10a61d25',	NULL,	'user',	NULL,	'user2 daa',	'user2@duduk.mana',	'013456987',	'contoh password user2dua'),
(4,	'user3',	'252348978ab4d7387888c26247f31659',	NULL,	'user',	NULL,	'Boboiboy Kuasa 3',	'user3@galaksi.mana',	'0147852369',	'contoh password user3tiga');

DROP TABLE IF EXISTS `senarai_belanja`;
CREATE TABLE `senarai_belanja` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `catatan` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `senarai_belanja` (`no`, `nohp`, `jenis_belanja`, `tarikh`, `belanja_keterangan`, `belanja_kod`, `amaun_rm`, `harga_sebenar`, `punca_pembelian`, `medium_pembayaran`, `medium_edagang`, `catatan`) VALUES
(1,	'011234567',	NULL,	'2018-12-20',	'nasi goreng kampung',	NULL,	5.00,	1,	'14',	'01',	2,	'makan malam'),
(2,	'011234567',	NULL,	'2018-12-22',	'mee goreng udang',	NULL,	5.00,	1,	'15',	'09',	2,	NULL),
(3,	'013456987',	NULL,	'2018-12-23',	'grabcar',	NULL,	4.00,	1,	'20',	'05',	1,	'pergi dari rumah ke pejabat'),
(4,	'013456987',	NULL,	'2018-12-23',	'grabcar',	NULL,	4.00,	1,	'20',	'09',	1,	'kupon percuma daa. terima kasih grab.'),
(5,	'013456987',	NULL,	'2018-12-23',	'bayar pinjaman',	NULL,	20.00,	1,	'20',	'04',	1,	'kaklong punya duit daa'),
(6,	'0147852369',	NULL,	'2018-12-23',	'bubur ayam + teh tarik',	NULL,	5.65,	1,	'17',	'01',	2,	'makan di mcd jalan bakri muar'),
(7,	'0147852369',	NULL,	'2018-12-23',	'm&m chicmuffin + teh tarik',	NULL,	5.65,	1,	'17',	'01',	2,	'makan di mcd jalan bakri muar'),
(8,	'0147852369',	NULL,	'2018-12-23',	'6 keping biskut',	NULL,	9.40,	1,	'17',	'01',	2,	'beli dekat subway muar jalan arab/mariam.'),
(9,	'0147852369',	NULL,	'2018-12-23',	'6 inci steak & chse sub',	NULL,	11.15,	1,	'17',	'03',	2,	'beli dekat subway muar jalan arab/mariam.'),
(10,	'0147852369',	NULL,	'2018-12-23',	'(my) w4 edv 6in/wr/sld',	NULL,	10.90,	1,	'17',	'03',	2,	'beli dekat subway muar jalan arab/mariam.'),
(11,	'0147852369',	NULL,	'2018-12-23',	'6 inci bbq chicken strips sub + spice italian',	NULL,	4.70,	1,	'17',	'03',	2,	'beli dekat subway muar jalan arab/mariam.'),
(12,	'0147852369',	NULL,	'2018-12-23',	'10oz fountain drink + (my) w4 edv 6in/wr/sld',	NULL,	10.90,	1,	'17',	'03',	2,	'beli dekat subway muar jalan arab/mariam.'),
(13,	'0147852369',	NULL,	'2018-12-23',	'6 inci bbq chicken strips sub + chicken slide',	NULL,	4.70,	1,	'17',	'03',	2,	'beli dekat subway muar jalan arab/mariam.'),
(14,	'0147852369',	NULL,	'2018-12-24',	'makan kuih teo',	NULL,	2.00,	1,	'14',	'01',	2,	'kantin lhdn'),
(15,	'0147852369',	NULL,	'2018-12-24',	'milo',	NULL,	2.00,	1,	'14',	'01',	2,	'kantin lhdn');

DROP TABLE IF EXISTS `senarai_pendapatan`;
CREATE TABLE `senarai_pendapatan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_hasil` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `hasil_keterangan` text,
  `hasil_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `hasil_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_hasil` char(2) DEFAULT NULL,
  `medium_hasil` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `catatan` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_blok3`;
CREATE TABLE `z_blok3` (
  `no` int(11) NOT NULL DEFAULT '0',
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_blok4a`;
CREATE TABLE `z_blok4a` (
  `no` int(11) NOT NULL DEFAULT '0',
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `bulan` char(1) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_blok4b`;
CREATE TABLE `z_blok4b` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `bulan` char(1) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_blok4c`;
CREATE TABLE `z_blok4c` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) DEFAULT NULL,
  `jenis_belanja` varchar(50) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `belanja_keterangan` text,
  `belanja_kod` int(11) DEFAULT NULL,
  `amaun_rm` decimal(10,2) DEFAULT NULL,
  `harga_sebenar` tinyint(4) DEFAULT NULL COMMENT '1-harga sebenar/2-harga anggaran',
  `punca_pembelian` char(2) DEFAULT NULL,
  `medium_pembayaran` char(2) DEFAULT NULL,
  `medium_edagang` tinyint(4) DEFAULT NULL COMMENT '1-ya/2-tidak',
  `bulan` char(1) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk1`;
CREATE TABLE `z_hk1` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pk` char(2) NOT NULL,
  `pn` char(2) NOT NULL,
  `tp` text NOT NULL,
  `incs11` text,
  `incs12` text,
  `incs13` text,
  `incs14` text,
  `incs15` text,
  `incs16` text,
  `incs17` text,
  `incs18` text,
  `incs19a` text,
  `incs19b` text,
  `incs19c` text,
  `incs19` text,
  `incs01` text,
  `hk1` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk2`;
CREATE TABLE `z_hk2` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pk` char(2) NOT NULL,
  `a1` text,
  `a2` text,
  `b1` text,
  `b2` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4(a)` text,
  `c4(b)` text,
  `c4` text,
  `c5` text,
  `21a(i)` text,
  `21a(ii)` text,
  `21a(iii)` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk3`;
CREATE TABLE `z_hk3` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pk` char(2) NOT NULL,
  `a1` text,
  `a2` text,
  `a3` text,
  `a4` text,
  `b` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `21a(i)` text,
  `21a(ii)` text,
  `21a(iii)` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk4`;
CREATE TABLE `z_hk4` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pn` char(2) NOT NULL,
  `a1` text,
  `a2` text,
  `a3` text,
  `a4` text,
  `b1` text,
  `b2` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `21a(i)` text,
  `21a(ii)` text,
  `21a(iii)` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk5`;
CREATE TABLE `z_hk5` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pn` char(2) NOT NULL,
  `a1` text,
  `a2` text,
  `a3` text,
  `a4` text,
  `b1` text,
  `b2` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `21a(i)` text,
  `21a(ii)` text,
  `21a(iii)` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk6`;
CREATE TABLE `z_hk6` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `pn` char(2) NOT NULL,
  `a1` text,
  `a2` text,
  `a3` text,
  `a4` text,
  `b1` text,
  `b2` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  `21a(i)` text,
  `21a(ii)` text,
  `21a(iii)` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk7`;
CREATE TABLE `z_hk7` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `sayur-sebulan` text,
  `sayur-setahun` text,
  `kelapa-sebulan` text,
  `kelapa-setahun` text,
  `ikan-sebulan` text,
  `ikan-setahun` text,
  `ayam-sebulan` text,
  `ayam-setahun` text,
  `itik-sebulan` text,
  `itik-setahun` text,
  `telur-sebulan` text,
  `telur-setahun` text,
  `rambutan-sebulan` text,
  `rambutan-setahun` text,
  `durian-sebulan` text,
  `durian-setahun` text,
  `pisang-sebulan` text,
  `pisang-setahun` text,
  `kayu api-sebulan` text,
  `kayu api-setahun` text,
  `A=>lain2-sebulan` text,
  `A=>lain2-setahun` text,
  `B=>lain2-sebulan` text,
  `B=>lain2-setahun` text,
  `C=>lain2-sebulan` text,
  `C=>lain2-setahun` text,
  `jumlah-setahun` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_hk8`;
CREATE TABLE `z_hk8` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `incs22.1` text,
  `incs22.2` text,
  `incs22.3` text,
  `incs22.3(i)` text,
  `incs22.3(ii)` text,
  `incs22.3(iii)` text,
  `incs22` text,
  `incs23.1` text,
  `incs23.2` text,
  `incs23.3` text,
  `incs23.4` text,
  `incs23.4(i)` text,
  `incs23.4(ii)` text,
  `incs23.4(iii)` text,
  `incs23` text,
  `incs32a.1` text,
  `incs32a.2` text,
  `incs32a.2(i)` text,
  `incs32a.2(ii)` text,
  `incs32a` text,
  `incs32b.1` text,
  `incs32b.2` text,
  `incs32b.2(i)` text,
  `incs32b.2(ii)` text,
  `incs32b.2(iii)` text,
  `incs32b` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_jr4`;
CREATE TABLE `z_jr4` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pkir` char(2) DEFAULT NULL COMMENT 'hubungan dengan ketua isi rumah',
  `noair` char(2) DEFAULT NULL,
  `j` int(11) DEFAULT NULL COMMENT '1-lelaki | 2-perempuan',
  `tk` int(11) DEFAULT NULL COMMENT 'tahun kelahiran',
  `u` int(11) DEFAULT NULL COMMENT 'umur',
  `ket` int(11) DEFAULT NULL COMMENT 'kumpulan etnik',
  `kw` int(11) DEFAULT NULL COMMENT 'warganegara',
  `rs` int(11) DEFAULT NULL COMMENT 'residen',
  `tp` int(11) DEFAULT NULL COMMENT 'taraf perkahwinan',
  `ps` int(11) DEFAULT NULL COMMENT 'persekolahan',
  `sts` int(11) DEFAULT NULL COMMENT 'sebab tak sekolah',
  `pt` int(11) DEFAULT NULL COMMENT 'taraf pendidikan',
  `sj` int(11) DEFAULT NULL COMMENT 'sijil tertinggi',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_jra`;
CREATE TABLE `z_jra` (
  `no` int(11) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `airba` char(2) NOT NULL COMMENT 'no ahli isi rumah',
  `ta` char(2) NOT NULL COMMENT 'taraf aktiviti',
  `pp` tinyint(4) NOT NULL COMMENT 'penerima pendapatan',
  `pekerjaan` text NOT NULL COMMENT 'keterangan pekerjaan',
  `pk` char(6) NOT NULL COMMENT 'kod pekerjaan',
  `industri` text NOT NULL COMMENT 'keterangan industri',
  `pn` char(5) NOT NULL COMMENT 'kod industri'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_jrb1`;
CREATE TABLE `z_jrb1` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `airbb` char(2) NOT NULL,
  `incs11` int(11) DEFAULT NULL,
  `incs12` int(11) DEFAULT NULL,
  `incs13` int(11) DEFAULT NULL,
  `incs14` int(11) DEFAULT NULL,
  `incs15` int(11) DEFAULT NULL,
  `incs16` int(11) DEFAULT NULL,
  `incs17` int(11) DEFAULT NULL,
  `incs18` int(11) DEFAULT NULL,
  `incs19a` int(11) DEFAULT NULL,
  `incs19b` int(11) DEFAULT NULL,
  `incs19c` int(11) DEFAULT NULL,
  `incs19` int(11) DEFAULT NULL,
  `incs01` int(11) DEFAULT NULL,
  `incs21a(i)` int(11) DEFAULT NULL,
  `incs21a(ii)` int(11) DEFAULT NULL,
  `incs21a(iii)` int(11) DEFAULT NULL,
  `incs21a` int(11) DEFAULT NULL,
  `incs21b(i)` int(11) DEFAULT NULL,
  `incs21b(ii)` int(11) DEFAULT NULL,
  `incs21b(iii)` int(11) DEFAULT NULL,
  `incs21b` int(11) DEFAULT NULL,
  `incs21c` int(11) DEFAULT NULL,
  `incs21d(i)` int(11) DEFAULT NULL,
  `incs21d(ii)` int(11) DEFAULT NULL,
  `incs21d(iii)` int(11) DEFAULT NULL,
  `incs21d` int(11) DEFAULT NULL,
  `incs21e(i)` int(11) DEFAULT NULL,
  `incs21e(ii)` int(11) DEFAULT NULL,
  `incs21e(iii)` int(11) DEFAULT NULL,
  `incs2121e` int(11) DEFAULT NULL,
  `incs21na` int(11) DEFAULT NULL,
  `incs21ks` int(11) DEFAULT NULL,
  `incs21` int(11) DEFAULT NULL,
  `incs22` int(11) DEFAULT NULL,
  `incs23` int(11) DEFAULT NULL,
  `incs24` int(11) DEFAULT NULL,
  `incs02` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_jrb2`;
CREATE TABLE `z_jrb2` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `airbb` char(2) NOT NULL,
  `incs31` int(11) DEFAULT NULL,
  `incs32a` int(11) DEFAULT NULL,
  `incs32b` int(11) DEFAULT NULL,
  `incs32` int(11) DEFAULT NULL,
  `incs33` int(11) DEFAULT NULL,
  `incs34` int(11) DEFAULT NULL,
  `incs03` int(11) DEFAULT NULL,
  `incs41a` int(11) DEFAULT NULL,
  `incs41b` int(11) DEFAULT NULL,
  `incs41` int(11) DEFAULT NULL,
  `incs42` int(11) DEFAULT NULL,
  `incs43` int(11) DEFAULT NULL,
  `incs44` int(11) DEFAULT NULL,
  `incs45a` int(11) DEFAULT NULL,
  `incs45b` int(11) DEFAULT NULL,
  `incs45c` int(11) DEFAULT NULL,
  `incs45d` int(11) DEFAULT NULL,
  `incs45e` int(11) DEFAULT NULL,
  `incs45f` int(11) DEFAULT NULL,
  `incs45g` int(11) DEFAULT NULL,
  `incs45h` int(11) DEFAULT NULL,
  `incs45i` int(11) DEFAULT NULL,
  `incs45j` int(11) DEFAULT NULL,
  `incs45k` int(11) DEFAULT NULL,
  `incs45l` int(11) DEFAULT NULL,
  `incs45` int(11) DEFAULT NULL,
  `incs46a(i)` int(11) DEFAULT NULL,
  `incs46a(ii)` int(11) DEFAULT NULL,
  `incs46a` int(11) DEFAULT NULL,
  `incs46b` int(11) DEFAULT NULL,
  `incs46c` int(11) DEFAULT NULL,
  `incs46d(i)` int(11) DEFAULT NULL,
  `incs46d(ii)` int(11) DEFAULT NULL,
  `incs46d` int(11) DEFAULT NULL,
  `incs46e` int(11) DEFAULT NULL,
  `incs46f` int(11) DEFAULT NULL,
  `incs46` int(11) DEFAULT NULL,
  `incs05` int(11) DEFAULT NULL,
  `incs46tp73` int(11) DEFAULT NULL,
  `incs06` int(11) DEFAULT NULL,
  `incs07` int(11) DEFAULT NULL,
  `incs08` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_jrc`;
CREATE TABLE `z_jrc` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `airbb` char(2) NOT NULL,
  `tp61a` int(11) NOT NULL,
  `tp61b` int(11) NOT NULL,
  `tp61c` int(11) NOT NULL,
  `tp61` int(11) NOT NULL,
  `tp62` int(11) NOT NULL,
  `tp63` int(11) NOT NULL,
  `tp64a` int(11) NOT NULL,
  `tp64b` int(11) NOT NULL,
  `tp64c` int(11) NOT NULL,
  `tp64` int(11) NOT NULL,
  `tp65` int(11) NOT NULL,
  `tp66` int(11) NOT NULL,
  `tp67` int(11) NOT NULL,
  `tp73a` int(11) NOT NULL,
  `tp68` int(11) NOT NULL,
  `tp69` int(11) NOT NULL,
  `tp70` int(11) NOT NULL,
  `tp71` int(11) NOT NULL,
  `tp72a` int(11) NOT NULL,
  `tp72b` int(11) NOT NULL,
  `tp72c` int(11) NOT NULL,
  `tp73b` int(11) NOT NULL,
  `tp73` int(11) NOT NULL,
  `tp74` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `z_penerimaan_bulan_semasa`;
CREATE TABLE `z_penerimaan_bulan_semasa` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(20) NOT NULL,
  `noair` char(2) NOT NULL,
  `9a` text NOT NULL,
  `9b` text NOT NULL,
  `9c` text NOT NULL,
  `9d` text,
  `9e` text,
  `09` text,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-12-25 23:56:34*/