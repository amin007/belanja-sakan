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
		$this->panggilKhas02('punca',null);
		$this->panggilKhas02('tukaran',null);
		$this->papar->c1 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);
		$this->panggilJadual('senarai_pendapatan');
		//$this->panggilJadual('nama_pengguna');//*/
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
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
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
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
	function kandunganPaparan($p1, $jadual)
	{
		$this->papar->myTable = $jadual;
		$this->papar->_jadual = $jadual;
		$this->papar->carian[] = 'semua';
		if(!isset($this->papar->c1))
			$this->papar->c1 = null;
		$this->papar->c2 = 'ahasil';
		$this->papar->_pilih = $p1;
		$this->papar->_method = 'ahasil';
		$this->papar->baruBorang = 'ahasil/baru';
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
			unset($meta[$key]);
		endforeach;

		return $meta;
	}
#-------------------------------------------------------------------------------------------
	function panggilJadual($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($data,$meta) = $this->tanya->pilihMedan03($jadual, $medan, $carian, $susun);
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai[$jadual] = $data;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function pilihMedan($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($data,$meta) = $this->tanya->pilihMedan03//cariSql
			($jadual, $medan, $carian, $susun);
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai[$jadual] = $this->tanya->borangBaru01();
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);//*/
	}
#-------------------------------------------------------------------------------------------
	function tambahMedanDB($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual) = $this->tanya->tambahPembolehubah($p1);
		$this->papar->medan = $this->tanya->pilihMedan02($jadual);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilTable($jadual,$medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($p1, $medan, $carian, $susun) =
			$this->tanya->susunTatasusunan($medanID,$dataID);
		list($data,$meta) = $this->tanya->//cariSql
			cariSemuaDataMeta
			($jadual, $medan, $carian, $susun);
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->carian[0] = $dataID;
		$this->papar->senarai[$jadual] = $data;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($jadual, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		$this->papar->bentukJadual01[$p1] = $this->tanya->//cariSql
			cariSemuaData
			($jadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas02($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		$this->papar->bentukJadual02[$p1] = $this->tanya->//cariSql
			cariSemuaData
			($jadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	public function ubahSimpan($p1)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$medanID) = $this->ubahsuaiPost($p1);
		//echo '<br>$medanID=' . $medanID . '<br>';
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

		return array($posmen,$senaraiJadual,$medanID);# pulangkan nilai
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
	public function baru()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$this->panggilKhas02('punca');
		$this->panggilKhas02('tukaran');
		$this->papar->bentukJadual01 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);//*/
		$this->pilihMedan('senarai_pendapatan');
		//$this->pilihMedan('nama_pengguna');
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=0);//*/
	}
#-------------------------------------------------------------------------------------------
	public function baruSimpan($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$senaraiJadual = array('senarai_pendapatan');
		# ubahsuai $posmen
		$posmen = $this->ubahsuaiPostBaru($senaraiJadual);
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			//$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location:' . URL . '';
		header('location:' . URL . 'ahasil');//*/
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
		$this->panggilKhas02('punca');
		$this->panggilKhas02('tukaran');
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