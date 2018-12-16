<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Qss extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';

		# Pergi papar kandungan
		$lokasi = 'qss/google/';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
		//$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medanID','dataID','bentukJadual01','bentukJadual02','bentukJadual03',
			'_pilih','_5p','template','pilihJadual','template2','pilihJadual2');
		$takWujud = array(); $kira = 0;

		foreach($semak as $apa):
			if(isset($this->papar->$apa)):
				echo '<br>$this->papar->' . $apa . ' : ';
				print_r($this->papar->$apa);
			else:
				$takWujud[$kira++] = '$this->papar->' . $apa;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : ';
		print_r($takWujud);
		echo '</font></pre>';
	}
##-----------------------------------------------------------------------------------------
	function kandunganPaparan($pilih, $myTable)
	{
		//$this->papar->senarai[$myTable] = null;
		$this->papar->myTable = $myTable;
		$this->papar->carian[] = 'semua';
		$this->papar->c1 = $this->papar->c2 = null;
		$this->papar->_pilih = $pilih;
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
##-----------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
# mula - semak database
###------------------------------------------------------------------------------------------
	function panggilTable($myJadual,$pilih,$medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()';
		# Set pembolehubah utama
		//$jadual = explode('-', $myJadual);
		list($medan, $carian, $susun) = $this->tanya->setPencam($pilih,$medanID,$dataID);
		$this->papar->senarai[$myJadual] = $this->tanya->//cariSql
			cariSemuaData
			("`$myJadual`", $medan, $carian, $susun);
		if( count($this->papar->senarai[$myJadual]) == 0 ):
			//echo '<hr>jumlah ' . $myJadual . ' kosong';
			unset($this->papar->senarai[$myJadual]);
		else:
			$this->papar->bentukJadual01 = $this->papar->senarai[$myJadual];
			$this->papar->_jadual = $myJadual;
		endif;//*/
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
	}
###------------------------------------------------------------------------------------------
	function panggilTable01($myJadual,$pilih,$medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()';
		# Set pembolehubah utama
		//$jadual = explode('-', $myJadual);
		list($medan, $carian, $susun) = $this->tanya->setPencam($pilih,$medanID,$dataID);
		$this->papar->bentukJadual02 = $this->tanya->//cariSql
			cariSemuaData
			("`$myJadual`", $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
	}
###------------------------------------------------------------------------------------------
# tamat - semak database
#==========================================================================================
#-------------------------------------------------------------------------------------------
	function semaknama($nama)
	{
		# Semak data $_POST
		echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
		echo '<pre>$nama->'; print_r($nama) . '</pre>| ';
		echo 'Kod:' . \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $nama) . ': ';
		//echo 'Kod:' . RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) . ': ';
	}
#-------------------------------------------------------------------------------------------
	public function google($action = 'x')
	{
		# Set pemboleubah utama
		$this->papar->idBorang = (isset($_GET['cari'])) ? $_GET['cari'] : null;
		$random = rand(-30, 30);
		$this->papar->pautan = URL . 'qss/temui/400/1/' . $random;
		$fail = array('index','index1','index2','b_ubah','1cari');
		$pilihFail = $fail[4];
		$this->_folder = 'borang';

		# Pergi papar kandungan
		//$this->debugKandunganPaparan(); # Semak data dulu
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function temui($a,$b,$c2) # daripada fungsi index()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//$this->semakPembolehubah($_POST);
		$cari = bersih($_POST['cari']);

		# Pergi papar kandungan
		$lokasi = 'qss/suku3/' . $cari;
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
	public function suku1($action = 'hasil')
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		$pilihFail = $this->pilihFail($action);

		# Pergi papar kandungan
		//$this->debugKandunganPaparan(); # Semak data dulu
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function suku2($dataID = null, $suku = 2, $action = 'hasil')
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pemboleubah utama
		$this->papar->suku = $suku;
		$this->pilihSuku2($dataID);
		$pilihFail = $this->pilihFail($action);

		# Pergi papar kandungan
		//$this->debugKandunganPaparan(); # Semak data dulu
		//$this->_folder = 'borang'; //echo "$this->_folder|$pilihFail";
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function suku3($dataID = null, $suku = 3, $action = 'hasil')
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pemboleubah utama
		$this->papar->suku = $suku;
		$this->pilihSuku3($dataID);
		$pilihFail = $this->pilihFail($action);

		# Pergi papar kandungan
		//$this->debugKandunganPaparan(); # Semak data dulu
		//$this->_folder = 'borang'; //echo "$this->_folder|$pilihFail";
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	function pilihFail($action = 'hasil')
	{
		if($action == 'rangka'):
			$pilihFail = 'tab01_rangka';
		elseif($action == 'hasil'):
			$pilihFail = 'qss01_hasil';
			//$pilihFail = 'tab02_hasil';
		elseif($action == 'aset'):
			$pilihFail = 'tab03_aset';
		elseif($action == 'tambahan'):
			$pilihFail = 'tab04_tambahan';
		elseif($action == 'edagang'):
			$pilihFail = 'tab05_edagang';
		else:
			$fail = array('index','index1','index2','b_ubah','soalan4');
			$pilihFail = $fail[2];
		endif;

		return $pilihFail;
	}
#-------------------------------------------------------------------------------------------
	function pilihSuku2($dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$medanID = 'newss';
		$this->papar->medanID = $medanID;
		$this->papar->dataID = $dataID;
		$senarai = array('qss2018-q2-mk','qss2018-q2-ejen_hartanah',
		'qss2018-q2-kesenian','qss2018-q2-profesional','qss2018-q2-penginapan',
		'qss2018-q2-pengangkutan_penyimpanan','qss2018-q2-kesihatan',
		'qss2018-q2-fnb','qss2018-q2-perkhidmatan_lain',
		'qss2018-q2-pks','qss2018-q2-pendidikan');

		foreach($senarai as $myJadual):
			//echo "<br>RENAME TABLE `$myJadual` TO `$myJadual`; ";
			$this->panggilTable($myJadual,'semuaJadual',$medanID,$dataID);
		endforeach;
			$this->panggilTable01('qss2018-q2-rangka','semuaJadual',$medanID,$dataID);
	}
#-------------------------------------------------------------------------------------------
	function pilihSuku3($dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$medanID = 'newss';
		$this->papar->medanID = $medanID;
		$this->papar->dataID = $dataID;
		$senarai = array('qss-q3-mk','qss-q3-ejen_hartanah',
		'qss-q3-kesenian','qss-q3-profesional','qss-q3-penginapan',
		'qss-q3-pengangkutan_penyimpanan','qss-q3-kesihatan',
		'qss-q3-fnb','qss-q3-perkhidmatan_lain',
		'qss-q3-pks','qss-q3-pendidikan');

		foreach($senarai as $myJadual):
			//echo "<br>RENAME TABLE `$myJadual` TO `$myJadual`; ";
			$this->panggilTable($myJadual,'semuaJadual',$medanID,$dataID);
		endforeach;
			$this->panggilTable01('qss-q3-1rangka_proses','semuaJadual',$medanID,$dataID);
			//$this->panggilTable02('qss-q3-1rangka_matnor','semuaJadual',$medanID,$dataID);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}