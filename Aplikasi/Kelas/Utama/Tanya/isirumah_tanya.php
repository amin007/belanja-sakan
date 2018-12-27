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
	public function susunPembolehubah($a, $b = null, $c = null)
	{
		//$a = null;
		$p = array($a,$b,$c);
		if($a == 'senarai_isirumah1'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiIsirumah1($p);
		elseif($a == 'senarai_isirumah2'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiIsirumah2($p);
		elseif($a == 'xxx'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->xxx($p);
		else: //echo "\$a = $a <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun);# pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function ubahPencam($jadual,$b,$c)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualSenaraiIsirumah1($p)
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
	function jadualSenaraiIsirumah2($p)
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
#===========================================================================================
}