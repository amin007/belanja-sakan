<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Belian_Tanya extends \Aplikasi\Kitab\Tanya
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
	public function contoh_cariKhas03()
	{
		$medan[0] = array(
			//'no' => null, //int(11) Auto Increment
			'nohp' => null, //varchar(20)
			//'jenis_belanja' => null, //varchar(50)
			'tarikh' => null, //date
			'belanja_keterangan' => null, //text
			//'belanja_kod' => null, //int(11)
			'amaun_rm' => null, //decimal(10,2)
			'harga_sebenar' => null, //tinyint(4)|1-harga sebenar/2-harga anggaran
			'punca_pembelian' => null, //char(2)
			'medium_pembayaran' => null, //enum('01,02,03,04,05,06,07,08,09,10')
			'medium_edagang' => null, //int(11)|1-ya/2-tidak
			'catatan' => null, //text
			//'password' => null, //text
		);

		return $medan;
	}
#------------------------------------------------------------------------------------------#
	public function contoh_cariKhas04($medan1)
	{
		$medan2['nilai_sebenar'][0]['kod'] = '1';
		$medan2['nilai_sebenar'][0]['keterangan'] = 'harga sebenar';
		$medan2['nilai_sebenar'][1]['kod'] = '2';
		$medan2['nilai_sebenar'][1]['keterangan'] = 'harga anggaran';
		$medan2['edagang'][0]['kod'] = '1';
		$medan2['edagang'][0]['keterangan'] = 'ya';
		$medan2['edagang'][1]['kod'] = '2';
		$medan2['edagang'][1]['keterangan'] = 'tidak';
		$medan = array_merge($medan1, $medan2);

		return $medan;
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
#------------------------------------------------------------------------------------------#
	function pilihJadual()
	{
		$jadual = array('senarai_belanja');

		return $jadual;
	}
#------------------------------------------------------------------------------------------#
	function pilihUbahPost()
	{
		$medan = 'no';
		$jadual = array('senarai_belanja');

		return array($medan,$jadual);
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
	public function susunPembolehubah($pilih,$idBorang = null)
	{
		//$pilih = null;
		if($pilih == 'punca'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodPuncapembelian();
		elseif($pilih == 'tukaran'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodMediumpembayaran();
		elseif($pilih == 'senarai_belanja'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiBelanja();
		elseif($pilih == 'nama_pengguna'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualNamaPengguna();
		elseif($pilih == 'limaPerangkaan'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jaduaLimaPerangkaan();
		else: //echo "\$pilih = $pilih <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function kodPuncapembelian()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'kod_puncapembelian';
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
	function kodMediumpembayaran()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'kod_mediumpembayaran';
		$medan = 'kod,keterangan';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'newss', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualSenaraiBelanja()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($idUser,$nohp) = $this->tanyaDataSesi();
		$myTable = 'senarai_belanja';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'nohp', # cari dalam medan apa
				'apa' => $nohp); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualNamaPengguna()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'nama_pengguna';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'level', # cari dalam medan apa
				'apa' => 'user'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}