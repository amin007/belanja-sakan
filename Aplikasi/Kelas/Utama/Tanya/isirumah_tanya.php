<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Isirumah_Tanya extends \Aplikasi\Kitab\Tanya
{
#===========================================================================================
#------------------------------------------------------------------------------------------#
	public function __construct()
	{
		parent::__construct();
	}
#------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
#------------------------------------------------------------------------------------------#
	function contoh_sql01($url, $cariID)
	{
		$id1 = $url . 'kelas1/ubah/' . $cariID;
		$id2 = $url . 'kelas2/ubah/000/' . $cariID .'/2010/2015/';
		$id3 = $url . 'kelas3/ubah/",kp,"/' . $cariID .'/2010/2015/';
		$url1 = '" <a target=_blank href=' . $id1 . '>SEMAK 1</a>"';
		$url2 = '" <a target=_blank href=' . $id2 . '>SEMAK 2</a>"';
		$url3 = 'concat("<a target=_blank href=' . $id3 . '>SEMAK 3</a>")';

		$sql = ''
			. 'concat_ws("|",nama,' . $url1 . ',' . $url3 .') nama,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," responden",responden),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax),' . "\r"
			. ' 	concat_ws("="," orang_a",orang_a),' . "\r"
			. ' 	concat_ws("="," notel_a",notel_a),' . "\r"
			. ' 	concat_ws("="," nofax_a",nofax_a)' . "\r"
			. ' ) as dataHubungi,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
			. ' ) as data5P,nota';

		return $sql;
	}
#------------------------------------------------------------------------------------------#
	function contoh_data01($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	public function tanyaDataSesi()
	{
		$dataSulit = new \Aplikasi\Kitab\Sesi();
		//echo '<pre>'; print_r($_SESSION); echo '</pre>';
		$idUser = $dataSulit->get('bs_namaPendek');
		$nohp = $dataSulit->get('bs_nohp');
		/*echo 'idUser=' . $dataSulit->get('idUser') . '<br>';
		echo 'namaPendek=' . $dataSulit->get('namaPendek') . '<br>';
		echo 'namaPenuh=' . $dataSulit->get('namaPenuh') . '<br>';
		echo 'email=' . $dataSulit->get('email') . '<br>';
		echo 'levelPengguna=' . $dataSulit->get('levelPengguna') . '';
		echo '<hr>';//*/

		return array($idUser,$nohp);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
#------------------------------------------------------------------------------------------#
	function tentangMedan()
	{
		$a = 'kod'; $b = 'keterangan';
	#***************************************************************************************
		$k = 'hubungan';
		$b2 = ' KIR @ kpd isteri/suami KIR';
		$p[$k][]=array($a=>'01', $b=>'Ketua isi rumah (KIR)');
		$p[$k][]=array($a=>'02', $b=>'Isteri/suami ketua');
		$p[$k][]=array($a=>'03', $b=>'Anak KIR yg belum berkahwin');
		$p[$k][]=array($a=>'04', $b=>'Anak KIR yg telah berkahwin');
		$p[$k][]=array($a=>'05', $b=>'Menantu perempaun/lelaki KIR');
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
		$p[$k][]=array($a=>'0', $b=>'Jika tidak sekolah, jawap soalan ini');
		$p[$k][]=array($a=>'1', $b=>'Tidak mampu dari segi kewangan');
		$p[$k][]=array($a=>'2', $b=>'Terlalu jauh dari institusi pendidikan');
		$p[$k][]=array($a=>'3', $b=>'Tidak berminat');
		$p[$k][]=array($a=>'4', $b=>'Cacat');
		$p[$k][]=array($a=>'5', $b=>'Perlu bekerja untuk menambah pendapatan keluarga');
		$p[$k][]=array($a=>'6', $b=>'Tiada sijil kelahiran');
		$p[$k][]=array($a=>'7', $b=>'Tidak berkenaan');
	#***************************************************************************************
		$k = 'sijil_tertinggi';
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
#===========================================================================================
## untuk setkan nama $myTable,$medan,$carian,$susun
#------------------------------------------------------------------------------------------#
	public function susunPembolehubah($a, $b = null, $c = null)
	{
		//$a = null;
		$p = array($a,$b,$c);
		if($a == 'senarai_isirumah'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiIsirumah($p);
		elseif($a == 'xxx'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->xxx($p);
		else: //echo "\$a = $a <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun);# pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function ubahPencam($jadual,$apa,$cari)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		//list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $apa, # cari dalam medan apa
				'apa' => $cari); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualSenaraiIsirumah($p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			/*d$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function xxx($p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function pilihUbahPost()
	{
		$medan = 'no';
		$jadual = array('senarai_isirumah');

		return array($medan,$jadual);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}