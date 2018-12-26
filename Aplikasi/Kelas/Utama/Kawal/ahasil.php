<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Ahasil extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		//$this->papar->c1 = $this->tanya->pilihPencam();
		$this->panggilKhas02('punca_hasil',null);
		$this->panggilKhas02('medium_hasil',null);
		$this->papar->c1 = $this->tanya->
			contoh_cariKhas02($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilJadual('senarai_pendapatan');
		//$this->panggilJadual('nama_pengguna');//*/
		$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		/*$this->_folder = 'cari';
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'belian/google2';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
##------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>'; print_r($senarai); echo '</pre>';//*/
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function debugPost($debugData)
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$takWujud = array(); $kira = 0;

		foreach($debugData as $semak):
			if(isset($$semak)):
				echo '<br>$' . $semak . ' : '; print_r($$semak);
			else:
				$takWujud[$kira++] = '$' . $semak;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font><hr></pre>';

		//$this->debugPost();//*/
	}
#-------------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','kiramedan','bentukJadual01','bentukJadual02','bentukJadual03',
			'_pilih','_method','_meta','template','pilihJadual','template2','pilihJadual2');
		$takWujud = array(); $kira = 0;

		foreach($semak as $apa):
			if(isset($this->papar->$apa)):
				echo '<br>$this->papar->' . $apa . ' : ';
				print_r($this->papar->$apa);
			else:
				$takWujud[$kira++] = '$this->papar->' . $apa;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font><hr></pre>';
	}
#-------------------------------------------------------------------------------------------
	function kandunganPaparan($p1, $myTable)
	{
		//$this->papar->senarai[$myTable] = null;
		$this->papar->myTable = $myTable;
		$this->papar->_jadual = $myTable;
		$this->papar->carian[] = 'semua';
		if(!isset($this->papar->c1))
			$this->papar->c1 = null;
		$this->papar->c2 = null;
		$this->papar->_pilih = $p1;
		$this->papar->_method = 'belian';
		$this->papar->cariID = 'papar';
		$this->papar->template = 'template_biasa';
		$this->papar->pilihJadual = 'pilih_jadual_am';
		$this->papar->template2 = 'template_khas02';
		$this->papar->pilihJadual2 = 'pilih_jadual_am2';
		$this->papar->template3 = 'template_khas03';
		$this->papar->pilihJadual3 = 'pilih_jadual_am';
		//$this->papar->template2 = 'template_bootstrap';
		//$this->papar->template3 = 'template_bootstrap_table';
		//$this->papar->template1 = 'template_khas01';
		//*/
	}
#-------------------------------------------------------------------------------------------
	function ubahMeta($meta)
	{
		$kira = count($meta);
		//echo "<hr> bil untuk \$meta = $kira <br>";
		foreach($meta as $key => $pilih):
			$key2 = $pilih['name'];
			//$meta[$key2]['table'] = $pilih['table'];
			//$meta[$key2]['nama'] = $pilih['name'];
			$meta[$key2]['len'] = $pilih['len'];
			$meta[$key2]['type'] = $pilih['native_type'];
			$meta[$key2]['key'] = isset($pilih['flags'][1]) ?
				$pilih['flags'][0].'|'.$pilih['flags'][1] : null;
			$meta[$key2]['type_pdo'] = $pilih['pdo_type'];
			$meta[$key2]['type_precision'] = $pilih['precision'];
			/*unset($meta[$key]['table']);
			unset($meta[$key]['name']);
			unset($meta[$key]['len']);
			unset($meta[$key]['native_type']);
			unset($meta[$key]['flags']);
			unset($meta[$key]['pdo_type']);
			unset($meta[$key]['precision']);//*/
			unset($meta[$key]);
		endforeach;
		//$this->semakPembolehubah($meta);
		return $meta;
	}
#-------------------------------------------------------------------------------------------
	function panggilJadual($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($data,$meta) = $this->tanya->pilihMedan03($myTable, $medan, $carian, $susun);
		//$this->papar->kiramedan[$myTable] = $meta;
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai[$myTable] = $data;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function pilihMedan($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($result,$meta) = $this->tanya->pilihMedan03($myTable, $medan, $carian, $susun);
		//$this->papar->kiramedan[$myTable] = $meta;
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai[$myTable] = $this->tanya->contoh_cariKhas03();
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function tambahMedanDB($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable) = $this->tanya->tambahPembolehubah($p1);
		$this->papar->medan = $this->tanya->pilihMedan02($myTable);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myTable, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function panggilTable($myJadual,$medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($p1, $medan, $carian, $susun) =
			$this->tanya->susunTatasusunan($medanID,$dataID);
		list($result,$meta) = $this->tanya->//cariSql
			cariSemuaDataMeta
			($myJadual, $medan, $carian, $susun);
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->carian[0] = $dataID;
		$this->papar->senarai[$myJadual] = $result;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myJadual, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas01($p1,$p2)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		$this->papar->bentukJadual01[$p1] = $this->tanya->//cariSql
			cariSemuaData
			($myTable, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas02($p1,$p2)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		$this->papar->bentukJadual02[$p1] = $this->tanya->//cariSql
			cariSemuaData
			($myTable, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $myTable);
	}
#-------------------------------------------------------------------------------------------
	public function ubahSimpan($p1)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable,$medanID) = $this->ubahsuaiPost($p1);
		//echo '<br>$dataID=' . $dataID . '<br>';
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->//ubahSqlSimpan
			ubahSimpan
			($posmen[$jadual], $jadual, $medanID);
		}# tamat ulang table

		# Pergi papar kandungan
		$lokasi = 'belian/';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($p1)
	{
		list($medanID,$senaraiJadual) = $this->tanya->pilihUbahPost($p1);

		$posmen = array(); //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
				}
		endif; endforeach;//*/

		/*echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return array($posmen,$senaraiJadual,$senaraiJadual[0],$medanID); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost1($p1)
	{
		$senaraiJadual = $this->tanya->pilihJadual($p1);
		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';

		$posmen = array();
		foreach ($_POST as $myTable => $value):
		if ( in_array($myTable,$senaraiJadual) ):
			foreach ($value as $kekunci => $papar)
			{
				$posmen[$myTable][$kekunci] = bersih($papar);
			}//*/
		endif; endforeach;

		/*$debugData = array('pilih','senaraiJadual','medanID','dataID','posmen');
		echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return array($posmen,$senaraiJadual,$senaraiJadual[0]); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function insertID($p1)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable) = $this->ubahsuaiPost1($p1);
		//echo '<hr><pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			//$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# Pergi papar kandungan
		$lokasi = '' . $myTable;
		echo '<br>location: ' . URL . $lokasi;
		//header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function bentuksoalan()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->papar->soalan = $this->tanya->soalan();

		# Pergi papar kandungan
		$this->_folder = 'borang';
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		$fail = array('index','b_ubah','z_contoh_link_pill','soalan4');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function google2()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('punca_pembelian',null);
		$this->panggilKhas02('medium_pembayaran',null);
		$this->papar->bentukJadual01 = $this->tanya->
			contoh_cariKhas04($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->pilihMedan('senarai_belanja');
		//$this->pilihMedan('nama_pengguna');
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=0);
	}
#-------------------------------------------------------------------------------------------
	public function baruSimpan($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$_POST:'; print_r($_POST); echo '</pre>';//*/
		$senaraiJadual = array('senarai_belanja');
		# ubahsuai $posmen
		$posmen = $this->ubahsuaiPostBaru($senaraiJadual);
		//echo '<br>$dataID=' . $dataID . '<br>';
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			//$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location: ' . URL . '';
		header('location: ' . URL . ''); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPostBaru($senaraiJadual)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $value):
		if ( in_array($myTable,$senaraiJadual) ):
			foreach ($value as $kekunci => $papar)
			{
				$posmen[$myTable][$kekunci] = bersih($papar);
			}//*/
		endif; endforeach;

		return $posmen;
	}
#-------------------------------------------------------------------------------------------
	public function ubah($dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('punca_pembelian',null);
		$this->panggilKhas02('medium_pembayaran',null);
		$this->papar->bentukJadual01 = $this->tanya->
			contoh_cariKhas04($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilTable('senarai_belanja','no',$dataID);
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[3], $noInclude=0);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}