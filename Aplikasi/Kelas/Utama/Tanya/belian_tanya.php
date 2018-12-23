<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Belian_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($bentukJadual01,'teste');
	}
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
	public function contoh_cariKhas01($a,$b,$c,$d)
	{
		$medan[0] = array(
			'newss' => '000000123456',
			'nossm' => 'JR0001234',
			'nama' => 'Biar Rahsia',
			'fe' => '','hantar' => '',
			'tik' => '<input type="checkbox">',
			'mko' => '','R' => '',
			'nama_kp' => 'pembuatan',
			'kp' => '205',
			'msic2008' => '10101'
		);
		$medan[1] = array(
			'newss' => '000000123457',
			'nossm' => 'JR0001235',
			'nama' => 'Biar Rahsia2',
			'fe' => '','hantar' => '',
			'tik' => '<input type="checkbox">',
			'mko' => '','R' => '',
			'nama_kp' => 'pembuatan',
			'kp' => '205',
			'msic2008' => '10101'
		);

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function contoh_cariKhas02($a,$b,$c,$d)
	{
		$medan[0] = array(
			'newss' => '000000123456',
			'nossm' => 'JR0001234',
			'nama' => 'Biar Rahsia',
			'operator' => '',
			'alamat' => 'NO 1, JALAN 2, TAMAN 3 48000 MUAR',
		);

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
	public function contoh_cariKhas04($medan1)
	{
		$medan2['harga_sebenar'][0]['kod'] = '1';
		$medan2['harga_sebenar'][0]['keterangan'] = 'harga sebenar';
		$medan2['harga_sebenar'][1]['kod'] = '2';
		$medan2['harga_sebenar'][1]['keterangan'] = 'harga anggaran';
		$medan2['medium_edagang'][0]['kod'] = '1';
		$medan2['medium_edagang'][0]['keterangan'] = 'ya';
		$medan2['medium_edagang'][1]['kod'] = '2';
		$medan2['medium_edagang'][1]['keterangan'] = 'tidak';
		$medan = array_merge($medan1, $medan2);

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
#---------------------------------------------------------------------------------------------------#
	function pilihJadual()
	{
		$jadual = array('senarai_belanja');

		return $jadual;
	}
#---------------------------------------------------------------------------------------------------#
	function pilihUbahPost()
	{
		$medan = 'no';
		$jadual = array('senarai_belanja');

		return array($medan,$jadual);
	}
#---------------------------------------------------------------------------------------------------#
	function jadualDataCorp($cariApa)
	{
		$jadual = $this->pilihJadual();
		$medan = '*';
		# cari id berasaskan newss/ssm/sidap/nama
		//$id['nama'] = bersih(isset($_POST['cari']) ? $_POST['cari'] : null);
		$apa = bersih(isset($cariApa[1]) ? $cariApa[1] : null);
		//$apa = $cariApa[1];

		return array($jadual,$medan,$apa);
	}
#---------------------------------------------------------------------------------------------------#
	function dataCorp($cariApa)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$cariApa->'; print_r($cariApa); echo '</pre>';
		$carian = null;
		if($_POST==null || empty($_POST) ):
			$carian .= null;
		else:
			list($jadual, $medan, $apa) = $this->jadualDataCorp($cariApa);
			$carian[] = array( 'fix'=>'z%like%','atau'=>'WHERE',
				'medan' => 'concat_ws("",newss,nossm,nama)',
				'apa' => $apa );
			$cariID = $apa;
		endif;

		//echo '<pre>$jadual->'; print_r($jadual); echo '</pre>';
		//echo '<pre>$medan->'; print_r($medan); echo '</pre>';
		//echo '<pre>$carian->'; print_r($carian); echo '</pre>';
		//echo '<pre>$cariID->'; print_r($cariID); echo '</pre>';

		return array($jadual, $medan, $carian, $cariID);
	}
#---------------------------------------------------------------------------------------------------#
	public function medanRangka()
	{
		$medan = 'newss,ssm,concat_ws("<br>",nama,operator) as nama,'
			. 'fe,batchProses,hantar_prosesan,mko,respon R,msic2008,kp,nama_kp,'
			. 'concat_ws("<br>",alamat1,alamat2,poskod,bandar,negeri) as alamat'
			//. 'concat_ws("<br>",semak1,mdt,notamdt2014,notamdt2012,notamdt2011) as nota_lama'
			. "\r";

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function medanData()
	{
		$medan = 'newss,nossm,nama,fe,"<input type=\"checkbox\">" as tik,' . "\r"
			//. 'concat_ws("<br>",alamat1,alamat2,poskod,bandar,negeri) as alamat,'
			. 'mko,respon R,survei,kp,msic2008,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
			. ' ) as data5P,nota'
			. "\r";

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
	public function susunPembolehubah($pilih,$idBorang = null)
	{
		//$pilih = null;
		if($pilih == 'punca_pembelian'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodPuncapembelian();
		elseif($pilih == 'medium_pembayaran'): //echo "\$pilih = $pilih <br>";
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
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
	function jadualSenaraiBelanja()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($idUser,$nohp) = $this->tanyaDataSesi();
		$myTable = 'senarai_belanja';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'nohp', # cari dalam medan apa
				'apa' => $nohp); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
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
#---------------------------------------------------------------------------------------------------#
	function susunTatasusunan($medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function susunTatasusunan2($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}