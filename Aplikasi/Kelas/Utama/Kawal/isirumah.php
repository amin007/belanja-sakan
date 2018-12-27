<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Isirumah extends \Aplikasi\Kitab\Kawal
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
		$this->paparJadual(); # Set pembolehubah utama

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'pergi/mana';
		//echo '<br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
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
		header('location:' . URL);
		//exit;
	}
#===========================================================================================
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
		$this->papar->c2 = 'isirumah';
		$this->papar->_pilih = $p1;
		$this->papar->_method = 'isirumah';
		$this->papar->baruBorang = 'isirumah/baru';
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
			$data[0][$key2] = null;
			$table = $pilih['table'];
			//$meta[$key2]['nama'] = $pilih['name'];
			$meta[$table][$key2]['len'] = $pilih['len'];
			$meta[$table][$key2]['type'] = $pilih['native_type'];
			$meta[$table][$key2]['key'] = isset($pilih['flags'][1]) ?
				$pilih['flags'][0].'|'.$pilih['flags'][1] : null;
			$meta[$table][$key2]['type_pdo'] = $pilih['pdo_type'];
			$meta[$table][$key2]['type_precision'] = $pilih['precision'];
			unset($meta[$key]);
		endforeach;

		return array($data,$meta);
	}
#-------------------------------------------------------------------------------------------
	function panggilBorang01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($a,$b) = $this->tanya->//cariSql
			cariSemuaDataMeta
			($jadual, $medan, $carian, $susun);
		list($data,$meta) = $this->ubahMeta($b);
		$this->papar->_meta = $meta;
		$this->papar->senarai[$jadual] = $data;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilJadual01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($jadual, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($p1);
		list($data,$meta) = $this->tanya->//cariSql
			cariSemuaDataMeta
			($jadual, $medan, $carian, $susun);
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai[$jadual] = $data;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1, $jadual);
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function paparJadual()
	{# untuk paparkan jadual sahaja
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		/*$this->panggilKhas02('punca',null);
		$this->panggilKhas02('tukaran',null);
		$this->papar->c1 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);//*/
		$this->panggilJadual01('senarai_isirumah1');
		$this->panggilJadual01('senarai_isirumah2');
		//$this->panggilJadual('nama_pengguna');
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------
	public function baru()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		//$this->panggilKhas02('punca');
		//$this->panggilKhas02('tukaran');
		/*$this->papar->bentukJadual01 = $this->tanya->
			cariKhas01($this->papar->bentukJadual02);
		unset($this->papar->bentukJadual02);//*/
		$this->panggilBorang01('senarai_isirumah1');
		$this->panggilBorang01('senarai_isirumah2');
		//$this->pilihMedan('nama_pengguna');
		$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		/*$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=0);//*/
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
