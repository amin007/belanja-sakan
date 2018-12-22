<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Login extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		//echo '<br>class Index extends Kawal';
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->menuatas = 'tak';
		$this->papar->TajukBesar = 'Sila Login';

		# Pergi papar kandungan
		header('location:' . URL);
		//$this->paparKandungan($this->_folder, 'index');
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude = 0)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
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
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
#------------------------------------------------------------------------------------------
	function register()
	{
		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'register');
	}
#------------------------------------------------------------------------------------------
	function registerid()
	{
		# debug $_POST
		echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';

		# Set pemboleubah utama
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$senarai = array($myTable);
		# Bentuk tatasusunan
		$posmen = $this->ubahsuaiPostBaru($senarai);
		//$senaraiData = $this->tanya->ubahPosmen($posmen, $myTable);
		# sql insert
		$this->tanya->tambahSql($jadual, $posmen[$jadual]);
		//$this->tanya->tambahData($jadual, $posmen[$jadual]);
		//$this->log_sql($myTable, $medan, $senaraiData);
		# Semak data
			//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
			//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';
			//echo '<pre>$senaraiData='; print_r($senaraiData); echo '</pre>';

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . '/rangkabaru/selesai';
		//header('location: ' . URL . ''); //*/
	}
#------------------------------------------------------------------------------------------
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
#------------------------------------------------------------------------------------------
	function salah()
	{
		# debug
		//$this->tanya->dapatid($_POST['password']);
		$this->papar->mesej = 'Ada masalah pada user dan password';

		# Set pemboleubah utama
		$this->papar->sesat = 'Enjin Carian - Sesat';
		$this->papar->isi = '';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'salah', $noInclude=1);
	}
#------------------------------------------------------------------------------------------
	function semakid()
	{
		# debug $_POST
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';

		# semak data $this->tanya->ujiID(); 
		//$this->tanya->semakid();
		$this->loginid();
		//*/
	}
#------------------------------------------------------------------------------------------
	function login()
	{
		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'login2', $noInclude=1);
	}
#------------------------------------------------------------------------------------------
	function loginid()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# semak data $_POST
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$email = $_POST['username'];
		$passwordAsal = $_POST['password'];
		$password = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $passwordAsal);
		# semak database
			$carian[] = array('fix'=>'or(x=)', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $email); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $password); # benda yang dicari
		# mula cari $cariID dalam $myJadual
			$cariNama =
				$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, null);
				//$this->tanya->cariSql("`$myTable`", $medan, $carian, null);
				$kira = sizeof($cariNama);//*/
		# semak pembolehubah
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';
		//echo '<pre>password->'; print_r($password); echo '</pre>';
		/*echo '<pre>$cariNama::'; print_r($cariNama); echo '</pre>';
		echo '<hr>$data->' . sizeof($cariNama) . '<hr>';//*/

		$this->kunciPintu($kira, $cariNama); # pilih pintu masuk
	}
#------------------------------------------------------------------------------------------
	function kunciPintu($kira, $data)
	{
		/*echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		echo "<pre>\$kira=$kira | \$data =>";
		print_r($data); echo '</pre>';//*/
		if ($kira == 1) 
		{	# login berjaya
			\Aplikasi\Kitab\Sesi::init(); # setkan $_SESSION utk 
			# namaPenuh,namaPendek,email,kataLaluan,level 
			\Aplikasi\Kitab\Sesi::set('bs_namaPendek', $data[0]['namaPendek']);
			\Aplikasi\Kitab\Sesi::set('bs_namaPenuh', $data[0]['namaPenuh']);
			\Aplikasi\Kitab\Sesi::set('bs_email', $data[0]['email']);
			\Aplikasi\Kitab\Sesi::set('bs_nohp', $data[0]['nohp']);
			\Aplikasi\Kitab\Sesi::set('bs_levelPengguna', $data[0]['level']);
			\Aplikasi\Kitab\Sesi::set('bs_loggedIn', true);
			//echo '<hr>Berjaya';
			$this->levelPengguna($data[0]['level']);
		} 
		else # login gagal
		{	echo '<hr>Tidak Berjaya';
			header('location:' . URL . 'login/salah');
		}//*/
	}
#------------------------------------------------------------------------------------------
	function levelPengguna($level)
	{
		/*echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		echo "<pre>\$level = $level </pre>";//*/
		//header('location:' . URL . 'ruangtamu');
		if(in_array($level,array('kawal','fe','user')))
			header('location:' . URL . 'ruangtamu');
		elseif(in_array($level,array('pegawai','pegawai2')))
			header('location:' . URL . 'ruangtamu');
		elseif(in_array($level,array('pentadbir','admin1home')))
			header('location:' . URL . 'admin1home');
		else
			header('location:' . URL . '');//*/
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}