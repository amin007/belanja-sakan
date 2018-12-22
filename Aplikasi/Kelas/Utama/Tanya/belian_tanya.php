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
		/*$jadual = array('`aes`','`kawalan_aes`','`aes_alam_sekitar`',
		'`aes_kp_205`','`aes_kp_206`','`aes_kp_207`','`aes_kp_800`',
		'`aes_perkhidmatan`','`aes_pertanian`');//*/
		$jadual = array('senarai_belanja');

		return $jadual;
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
		$idUser = $dataSulit->get('idUser');
		$namaPendek = $dataSulit->get('namaPendek');
		/*echo 'idUser=' . $dataSulit->get('idUser') . '<br>';
		echo 'namaPendek=' . $dataSulit->get('namaPendek') . '<br>';
		echo 'namaPenuh=' . $dataSulit->get('namaPenuh') . '<br>';
		echo 'email=' . $dataSulit->get('email') . '<br>';
		echo 'levelPengguna=' . $dataSulit->get('levelPengguna') . '';
		echo '<hr>';//*/

		return array($idUser,$namaPendek);
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
			list($myTable, $medan, $carian, $susun) = $this->jaduaLimaPerangkaan($idBorang);
		elseif($pilih == 'semuaBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSemuaBE($idBorang);
		elseif($pilih == 'hasilBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualHasilBE($idBorang);
		elseif($pilih == 'belanjaBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualBelanjaBE($idBorang);
		elseif($pilih == 'stafBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualStafBE($idBorang);
		elseif($pilih == 'staf02BE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualStafBE($idBorang);
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
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'senarai_belanja';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			/*$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'kp', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

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
	function jaduaLimaPerangkaan($idBorang)
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
	function jadualHasilBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*'; /*'`NoSiri`,`KodBanci`,`F2001`,`F2002`,`F2003`,`F2004`,`F2005`,`F2006`,`F2007`,`F2008`,`F2009`,`F2010`,
		`F2011`,`F2012`,`F2013`,`F2014`,`F2015`,`F2016`,`F2017`,`F2018`,`F2019`,`F2020`,
		`F2021`,`F2022`,`F2023`,`F2024`,`F2025`,`F2026`,`F2027`,`F2028`,`F2029`,`F2030`,
		`F2031`,`F2032`,`F2033`,`F2034`,`F2035`,`F2036`,`F2037`,`F2038`,`F2040`,`F2042`,
		`F2043`,`F2044`,`F2045`,`F2046`,`F2047`,`F2048`,`F2049`,`F2050`,`F2051`,`F2052`,
		`F2053`,`F2054`,`F2055`,`F2056`,`F2057`,`F2058`,`F2059`,`F2060`,`F2061`,`F2062`,
		`F2063`,`F2064`,`F2065`,`F2069`,`F2070`,`F2072`,`F2073`,`F2074`,`F2075`,`F2076`,
		`F2077`,`F2078`,`F2079`,`F2080`,`F2081`,`F2082`,`F2083`,`F2084`,`F2085`,`F2086`,
		`F2087`,`F2088`,`F2097`,`F2098`,`F2089`,`F2094`,`F2095`,`F2096`,`F2099`';//*/
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualBelanjaBE($idBorang)
	{
		$myTable = null;
		$medan = '*'; /*'`F2101`,`F2102`,`F2103`,`F2104`,`F2105`,`F2106`,`F2107`,`F2108`,`F2109`,`F2110`,
			`F2111`,`F2112`,`F2113`,`F2114`,`F2115`,`F2116`,`F2117`,`F2118`,`F2119`,`F2120`,
			`F2121`,`F2122`,`F2123`,`F2124`,`F2125`,`F2126`,`F2127`,`F2128`,`F2129`,`F2130`,
			`F2131`,`F2132`,`F2133`,`F2134`,`F2135`,`F2136`,`F2137`,`F2138`,`F2139`,`F2140`,
			`F2141`,`F2142`,`F2143`,`F2144`,`F2145`,`F2146`,`F2147`,`F2148`,`F2149`,`F2150`,
			`F2151`,`F2152`,`F2153`,`F2154`,`F2155`,`F2156`,`F2157`,`F2158`,`F2159`,`F2160`,
			`F2161`,`F2163`,`F2164`,`F2165`,`F2166`,`F2167`,`F2168`,`F2169`,`F2170`,
			`F2171`,`F2172`,`F2173`,`F2174`,`F2175`,`F2176`,`F2177`,`F2178`,`F2179`,`F2180`,
			`F2181`,`F2182`,`F2183`,`F2184`,`F2185`,`F2186`,`F2187`,`F2188`,`F2190`,
			`F2191`,`F2197`,`F2198`,`F2189`,`F2193`,`F2194`,`F2195`,`F2196`,`F2199`';//*/
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualStafBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'nosiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualSta02fBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'nosiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function buangNilai($bentukJadual01)
	{
		$this->semakPembolehubah($bentukJadual01,'teste');
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}