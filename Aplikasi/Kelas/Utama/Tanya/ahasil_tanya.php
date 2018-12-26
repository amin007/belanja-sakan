<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Ahasil_Tanya extends \Aplikasi\Kitab\Tanya
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
		//$this->semakPembolehubah($bentukJadual01,'teste');
	}
#------------------------------------------------------------------------------------------#
	public function contoh_borangBaru01()
	{
		$medan[0] = array(
			//'no' => null, //int(11) Auto Increment
			'nohp' => null, //varchar(20)
			'noair' => null, //char(2)
			//'jenis_hasil' => null, //varchar(50)
			'tarikh' => null, //date
			'hasil_keterangan' => null, //text
			//'hasil_kod' => null, //int(11)
			'amaun_rm' => null, //decimal(10,2)
			'nilai_sebenar' => null, //tinyint(4)|1-sebenar/2-anggaran
			'punca' => null, //char(2)
			'tukaran' => null, //
			'edagang' => null, //int(11)|1-ya/2-tidak
			'catatan' => null, //text
			//'password' => null, //text
		);

		return $medan;
	}
#------------------------------------------------------------------------------------------#
	public function contoh_cariKhas02($medan1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$medanA['nilai_sebenar'][0]['kod'] = '1';
		$medanA['nilai_sebenar'][0]['keterangan'] = 'sebenar';
		$medanA['nilai_sebenar'][1]['kod'] = '2';
		$medanA['nilai_sebenar'][1]['keterangan'] = 'anggaran';
		$medanA['edagang'][0]['kod'] = '1';
		$medanA['edagang'][0]['keterangan'] = 'ya';
		$medanA['edagang'][1]['kod'] = '2';
		$medanA['edagang'][1]['keterangan'] = 'tidak';
		$medanA = array_merge($medan1, $medanA);
		//$medan = array_merge($medanA, $this->pilihPencam());
		//$this->semakPembolehubah($medan,'medan');

		return $medan;
	}
#------------------------------------------------------------------------------------------#
#------------------------------------------------------------------------------------------#
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
	public function susunPembolehubah($pilih, $dataID = null)
	{
		//$pilih = null;
		if($pilih == 'punca'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodPuncaHasil();
		elseif($pilih == 'tukaran'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodMediumHasil();
		elseif($pilih == 'senarai_pendapatan'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiPendapatan();
		elseif($pilih == 'nama_pengguna'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualNamaPengguna();
		elseif($pilih == 'xxx'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->xxx();
		else: //echo "\$pilih = $pilih <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function kodPuncaHasil()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'kod_puncahasil';
		$medan = 'kod,keterangan';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function kodMediumHasil()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'kod_mediumhasil';
		$medan = 'kod,keterangan';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualSenaraiPendapatan()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'senarai_pendapatan';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}