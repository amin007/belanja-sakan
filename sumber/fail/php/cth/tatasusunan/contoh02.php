<?php
#------------------------------------------------------------------------------------------#
	function tentangMedan()
	{
		$a = 'kod'; $b = 'keterangan';
	#***************************************************************************************
		$k = 'hubungan_kod';
		$b2 = ' KIR @ kpd isteri/suami KIR';
		$p[$k][]=array($a=>'01', $b=>'Ketua isi rumah (KIR)');
		$p[$k][]=array($a=>'02', $b=>'Isteri/suami ketua');
		$p[$k][]=array($a=>'03', $b=>'Anak KIR yg belum berkahwin');
		$p[$k][]=array($a=>'04', $b=>'Anak KIR yg telah berkahwin');
		$p[$k][]=array($a=>'05', $b=>'Menantu perempuan/lelaki KIR');
		$p[$k][]=array($a=>'06', $b=>'Cucu KIR');
		$p[$k][]=array($a=>'07', $b=>'Bapa/ibu'.$b2);
		$p[$k][]=array($a=>'08', $b=>'Datuk/Nenek'.$b2);
		$p[$k][]=array($a=>'09', $b=>'Abang/kakak'.$b2);
		$p[$k][]=array($a=>'10', $b=>'Org lain yg bersaudara dgn'.$b2);
		$p[$k][]=array($a=>'11', $b=>'Pembantu rumah');
		$p[$k][]=array($a=>'12', $b=>'Org lain yg tak bersaudara dgn'.$b2);
	#***************************************************************************************
		$k = 'jantina';
		$p[$k][]=array($a=>'1', $b=>'Lelaki');
		$p[$k][]=array($a=>'2', $b=>'Perempuan');
	#***************************************************************************************
		$k = 'warganegara';
		$p[$k][]=array($a=>'1', $b=>'Warganegara Malaysia');
		$p[$k][]=array($a=>'2', $b=>'Bukan Warganegara Malaysia');
	#***************************************************************************************
		$k = 'residen';
		$p[$k][]=array($a=>'1', $b=>'Ya');
		$p[$k][]=array($a=>'2', $b=>'Tidak');
	#***************************************************************************************
		$k = 'taraf_perkahwinan';
		$p[$k][]=array($a=>'1', $b=>'Tidak pernah berkahwin');
		$p[$k][]=array($a=>'2', $b=>'Berkahwin');
		$p[$k][]=array($a=>'3', $b=>'Balu/Duda');
		$p[$k][]=array($a=>'4', $b=>'Bercerai');
		$p[$k][]=array($a=>'5', $b=>'Berpisah');
	#***************************************************************************************
		$k = 'sekolah';
		$p[$k][]=array($a=>'1', $b=>'Tidak bersekolah');
		$p[$k][]=array($a=>'2', $b=>'Bersekolah');
		$p[$k][]=array($a=>'3', $b=>'Tamat Sekolah');
	#***************************************************************************************
		$k = 'sebab_tak_sek';
		$p[$k][]=array($a=>'0', $b=>'&nbsp;');
		$p[$k][]=array($a=>'1', $b=>'Tidak mampu dari segi kewangan');
		$p[$k][]=array($a=>'2', $b=>'Terlalu jauh dari institusi pendidikan');
		$p[$k][]=array($a=>'3', $b=>'Tidak berminat');
		$p[$k][]=array($a=>'4', $b=>'Cacat');
		$p[$k][]=array($a=>'5', $b=>'Perlu bekerja untuk menambah pendapatan keluarga');
		$p[$k][]=array($a=>'6', $b=>'Tiada sijil kelahiran');
		$p[$k][]=array($a=>'7', $b=>'Tidak berkenaan');
	#***************************************************************************************
		$k = 'pendidikan_tertinggi';
		$b1 = ':taraf persamaan pendidikan luar negara';
		$p[$k][]=array($a=>'00', $b=>'Pendidikan pra-sekolah|-'.$b1);
		$p[$k][]=array($a=>'11', $b=>'Thn 1|1'.$b1);
		$p[$k][]=array($a=>'12', $b=>'Thn 2|2'.$b1);
		$p[$k][]=array($a=>'13', $b=>'Thn 3|3'.$b1);
		$p[$k][]=array($a=>'14', $b=>'Thn 4|4'.$b1);
		$p[$k][]=array($a=>'15', $b=>'Thn 5|5'.$b1);
		$p[$k][]=array($a=>'16', $b=>'Thn 6|6'.$b1);
		$p[$k][]=array($a=>'21', $b=>'Kelas peralihan|7'.$b1);
		$p[$k][]=array($a=>'22', $b=>'Ting. 1|7/8'.$b1);
		$p[$k][]=array($a=>'23', $b=>'Ting. 2|8/9'.$b1);
		$p[$k][]=array($a=>'24', $b=>'Ting. 3|9/10'.$b1);
		$p[$k][]=array($a=>'31', $b=>'Ting. 4|10/11'.$b1);
		$p[$k][]=array($a=>'32', $b=>'Ting. 5|11/12'.$b1);
		$p[$k][]=array($a=>'33', $b=>'Prog. kemahiran asas -GIATMARA|-'.$b1);
		$p[$k][]=array($a=>'41', $b=>'Ting. 6(rendah)|12/13'.$b1);
		$p[$k][]=array($a=>'42', $b=>'Ting. 6(atas)|13/14'.$b1);
		$p[$k][]=array($a=>'43', $b=>'Matrikulasi');
		$p[$k][]=array($a=>'51', $b=>'Prog. sijil kemahiran khusus & teknikal');
		$p[$k][]=array($a=>'61', $b=>'Prog. sijil oleh badan2 yg memberi pengitirafan');
		$p[$k][]=array($a=>'62', $b=>'Prog. sijil drp kolej/politeknik/universiti'
		. ' @ yg setaraf');
		$p[$k][]=array($a=>'63', $b=>'Prog. sijil perguruan/kejururawatan/kesihatan bersekutu');
		$p[$k][]=array($a=>'64', $b=>'Prog. Diploma dlm kemahiran kursus & teknikal');
		$p[$k][]=array($a=>'65', $b=>'Prog. Diploma Lanjutan/Higher Nasional|'
		. '  Diploma kemahiran kursus & teknikal');
		$p[$k][]=array($a=>'66', $b=>'Prog. Diploma drp kolej/politeknik/universiti'
		. ' @ yg setaraf');
		$p[$k][]=array($a=>'67', $b=>'Prog. Diploma perguruan/kejururawatan/'
		. 'kesihatan bersekutu');
		$p[$k][]=array($a=>'71', $b=>'Prog.Ijazah Sarjana Muda/Diploma Lanjutan');
		$p[$k][]=array($a=>'72', $b=>'Prog. lepasan ijazah - KPLI');
		$p[$k][]=array($a=>'73', $b=>'Prog. Sarjana');
		$p[$k][]=array($a=>'81', $b=>'Prog. Ijazah Falsafah Kedoktoran)');
		$p[$k][]=array($a=>'82', $b=>'Skim pasca kedoktoran');
		$p[$k][]=array($a=>'91', $b=>'Masih belum bersekolah');
		$p[$k][]=array($a=>'22', $b=>'Tiada sijil');
		$p[$k][]=array($a=>'93', $b=>'Tidak berkenaan');
	#***************************************************************************************
		$k = 'sijil_tertinggi';
		$b1 = ' @ yg setaraf';
		$p[$k][]=array($a=>'01', $b=>'Masih belum bersekolah');
		$p[$k][]=array($a=>'02', $b=>'Tiada sijil');
		$p[$k][]=array($a=>'03', $b=>'Tidak berkenaan');
		$p[$k][]=array($a=>'11', $b=>'UPKK');
		$p[$k][]=array($a=>'12', $b=>'UPSR/UPSRA');
		$p[$k][]=array($a=>'21', $b=>'SRA');
		$p[$k][]=array($a=>'22', $b=>'PMR/SRP/LCE');
		$p[$k][]=array($a=>'31', $b=>'SMA/SMU');
		$p[$k][]=array($a=>'32', $b=>'4 Thanawi');
		$p[$k][]=array($a=>'33', $b=>'SPM/MCE/SC/FMCE/CSC');
		$p[$k][]=array($a=>'34', $b=>'SPVM/SPM(V)/MCVE');
		$p[$k][]=array($a=>'35', $b=>'GCE `O` Level');
		$p[$k][]=array($a=>'36', $b=>'Sijil kemahiran asas - Sijil GIATMARA');
		$p[$k][]=array($a=>'41', $b=>'STA/STAM/STU');
		$p[$k][]=array($a=>'42', $b=>'STPM/STP/HSC');
		$p[$k][]=array($a=>'43', $b=>'GCE `A` Level');
		$p[$k][]=array($a=>'44', $b=>'Sijil Matrikulasi');
		$p[$k][]=array($a=>'51', $b=>'Sijil kemahiran kursus & teknikal');
		$p[$k][]=array($a=>'61', $b=>'Sijil drp badan2 yg memberi pengitirafan'.$b1);
		$p[$k][]=array($a=>'62', $b=>'Sijil drp kolej'.$b1);
		$p[$k][]=array($a=>'63', $b=>'Sijil drp politeknik'.$b1);
		$p[$k][]=array($a=>'64', $b=>'Sijil drp universiti'.$b1);
		$p[$k][]=array($a=>'65', $b=>'Sijil perguruan/kejururawatan/kesihatan bersekutu');
		$p[$k][]=array($a=>'71', $b=>'Diploma dlm kemahiran kursus & teknikal');
		$p[$k][]=array($a=>'72', $b=>'Diploma Lanjutan/Higher Nasional Diploma'
		. ' dlm kemahiran kursus & teknikal');
		$p[$k][]=array($a=>'81', $b=>'Diploma drp kolej'.$b1);
		$p[$k][]=array($a=>'82', $b=>'Diploma drp politeknik'.$b1);
		$p[$k][]=array($a=>'83', $b=>'Diploma drp universiti'.$b1);
		$p[$k][]=array($a=>'84', $b=>'Diploma perguruan/kejururawatan/'
		. 'kesihatan bersekutu');
		$p[$k][]=array($a=>'91', $b=>'Ijazah Sarjana Muda/Diploma Lanjutan');
		$p[$k][]=array($a=>'92', $b=>'Diploma/Sijil pasca ijazah @ badan'
		. ' profesional - AACA/CA @KPLI');
		$p[$k][]=array($a=>'93', $b=>'Ijazah Sarjana');
		$p[$k][]=array($a=>'94', $b=>'Doktor Falsafah(PHD)');
		$p[$k][]=array($a=>'95', $b=>'Diploma/Sijil pasca kedoktoran');
	#***************************************************************************************
		$k = 'penerima_pendapatan';
		$p[$k][]=array($a=>'1', $b=>'Ya');
		$p[$k][]=array($a=>'2', $b=>'Tidak');
	#***************************************************************************************
		$k = 'taraf_aktiviti';
		$p[$k][]=array($a=>'01', $b=>'Majikan');
		$p[$k][]=array($a=>'02', $b=>'Pekerja kerajaan');
		$p[$k][]=array($a=>'03', $b=>'Pekerja swasta');
		$p[$k][]=array($a=>'04', $b=>'Bekerja sendiri');
		$p[$k][]=array($a=>'05', $b=>'Pekerja keluarga tanpa gaji');
		$p[$k][]=array($a=>'06', $b=>'Penganggur');
		$p[$k][]=array($a=>'07', $b=>'Suri rumah/menjaga rumah');
		$p[$k][]=array($a=>'08', $b=>'Pelajar');
		$p[$k][]=array($a=>'09', $b=>'Pesara kerajaan');
		$p[$k][]=array($a=>'10', $b=>'Pesara swasta');
		$p[$k][]=array($a=>'11', $b=>'Warga emas');
		$p[$k][]=array($a=>'12', $b=>'OKU');
		$p[$k][]=array($a=>'13', $b=>'Kanak-kanak');
		$p[$k][]=array($a=>'14', $b=>'Bayi');
		$p[$k][]=array($a=>'15', $b=>'Lain-lain');
	#***************************************************************************************
		return $p;
	}
#------------------------------------------------------------------------------------------#
