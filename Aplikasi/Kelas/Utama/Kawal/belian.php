<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Belian extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama

		# Pergi papar kandungan
		$lokasi = 'belian/google2';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
		/*$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);*/
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
		echo '<pre>'; print_r($senarai); echo '</pre>';//*/
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
#-------------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','bentukJadual01','bentukJadual02','bentukJadual03',
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

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font>';
		echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	function kandunganPaparan($pilih, $myTable)
	{
		//$this->papar->senarai[$myTable] = null;
		$this->papar->myTable = $myTable;
		$this->papar->_jadual = $myTable;
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
#-------------------------------------------------------------------------------------------
	function pilihMedan($pilih)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,'');
		list($result,$meta) = $this->tanya->pilihMedan03($myTable, $medan, $carian, $susun);
		$this->papar->medan = $meta;
		$this->papar->senarai[$myTable] = $result;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myTable, $myTable);
		//$this->debugKandunganPaparan($pilih, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function tambahMedanDB($pilih)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable) = $this->tanya->tambahPembolehubah($pilih);
		$this->papar->medan = $this->tanya->pilihMedan02($myTable);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myTable, $myTable);
		//$this->debugKandunganPaparan($pilih, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function panggilTable($myJadual,$medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($entah, $medan, $carian, $susun) = $this->tanya->jadualAES($medanID,$dataID);
		$this->papar->senarai[$myJadual] = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myJadual, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas01($pilih)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,'');
		$this->papar->bentukJadual01[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myTable, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myTable);
		//$this->debugKandunganPaparan($pilih, $myTable);
	}
#-------------------------------------------------------------------------------------------
	function panggilKhas02($pilih,$entah)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($myTable, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,'');
		$this->papar->bentukJadual02[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myTable, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myTable);
		//$this->debugKandunganPaparan($pilih, $myTable);
	}
#-------------------------------------------------------------------------------------------
	public function updateID($pilih)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable,$medanID) = $this->ubahsuaiPost($pilih);
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
		$lokasi = 'vendor/profile';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($pilih)
	{
		list($senaraiJadual) = $this->tanya->pilihJadual($pilih);

		$posmen = array(); //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
					//$posmen[$myTable][$medanID] = $dataID;
				}
		endif; endforeach;//*/

		$debugData = array('pilih','senaraiJadual','medanID','dataID','posmen');
		echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return array($posmen,$senaraiJadual,$senaraiJadual[0]); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function insertID($pilih)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable) = $this->ubahsuaiPost2($pilih);
		//echo '<hr><pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			//$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# Pergi papar kandungan
		$lokasi = '' . $myTable;
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
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
		//$this->panggilKhas01('kod_puncapembelian',null);
		//$this->panggilKhas01('kod_mediumpembayaran',null);
		$this->pilihMedan('senarai_belanja');
		//$this->pilihMedan('nama_pengguna');
		$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		//$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}
