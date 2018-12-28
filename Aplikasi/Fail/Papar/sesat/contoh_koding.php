<?php
$namaClass = huruf('Besar',$url[0]);
$namaFungsi = isset($url[1]) ? $url[1] : 'index';
$a = isset($url[2]) ? '$' . $url[2] : '';
$b = isset($url[3]) ? ',$' . $url[3] : '';
$c = isset($url[4]) ? ',$' . $url[4] : '';
$d = isset($url[5]) ? ',$' . $url[5] : '';
$e = isset($url[6]) ? ',$' . $url[6] : '';
$f = isset($url[7]) ? ',$' . $url[7] : '';
$g = isset($url[8]) ? ',$' . $url[8] : '';
$h = isset($url[9]) ? ',$' . $url[9] : '';
$pencam = "$a$b$c$d$e$f$g$h";
?>

<hr><div class="container">
<pre><code>
Contoh fungsi dalam class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
--------------------------------------------------------------------------------------------
&lt;?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '&lt;hr>Nama class :' . __METHOD__ . '&lt;hr>';
		//echo '&lt;hr>Nama function :' . __FUNCTION__ . '&lt;hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		echo '&lt;hr> Nama class : ' . __METHOD__ . '&lt;hr>';
		$this->paparJadual(); # Set pembolehubah utama

		# Pergi papar kandungan
		//$this->_folder = 'cari';
		$fail = array('1cari','index','b_ubah');
		//echo '&lt;br>$fail = ' . $fail[0] . '&lt;hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'pergi/mana';
		//echo '&lt;br>location: ' . URL . $lokasi;
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
		echo '&lt;pre>$jadual = ' . $jadual . '|&lt;br>';
		print_r($senarai); echo '&lt;/pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '&lt;pre>sebelum:'; print_r($_SESSION) . '&lt;/pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location:' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function <?php echo $namaFungsi ?>(<?php echo $pencam ?>)
	{
		//echo '&lt;hr>Nama class :' . __METHOD__ . '()&lt;hr>';
		$this->semakPembolehubah($_POST,'POST');//*/
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------
</code></pre>
<hr>
<pre><code>
Contoh fungsi dalam class <?php echo $namaClass ?>_Tanya extends \Aplikasi\Kitab\Tanya
--------------------------------------------------------------------------------------------
&lt;?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class <?php echo $namaClass ?>_Tanya extends \Aplikasi\Kitab\Tanya
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
		echo '&lt;pre>$jadual = ' . $jadual . '|&lt;br>';
		print_r($senarai); echo '&lt;/pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
#------------------------------------------------------------------------------------------#
</code></pre>
<hr>
</div><!-- / class="container" -->