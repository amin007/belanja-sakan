<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Login_Tanya extends \Aplikasi\Kitab\Tanya
{
#==========================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	function dapatid($nama)
	{
		//echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
		echo '<pre>$nama->'; print_r($nama) . '</pre>| ';
		//echo 'Kod:' . \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $nama) . ': ';
		//echo 'Kod:' . RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) . ': ';
		# rujuk https://gist.github.com/odan/1d4ff4c4088e906a5a49
		$garam = \Aplikasi\Kitab\RahsiaHash::cincang($nama);
		echo '<br>Kod:' . $garam . ': ';
		//$nama = $nama . 'cubaan';
		echo '<br>Kod:' . \Aplikasi\Kitab\RahsiaHash::sahkan($nama, $garam) . ': ';
		//*/
	}
#---------------------------------------------------------------------------------------------------#
	function contoh01($medan = '*', $jadual = 'nama_pengguna')
	{
		$semakLogin = $this->db->prepare("
			SELECT  $medan FROM  $jadual WHERE 
			email = :username AND kataLaluan = :password");

		$semakLogin->execute(array(
			':username' => $_POST['username'],
			':password' => \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $_POST['password'])
			//':password' => \Aplikasi\Kitab\RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
		));

		$semakLogin->debugDumpParams(); # semak $sth->debugDumpParams()
		$data = $semakLogin->fetch(); # dapatkan medan terlibat
		$kira = $semakLogin->rowCount(); # kira jumlah data
		//*/
		//$data = $this->data_contoh(0); # data olok-olok | dapatkan medan terlibat
		//$kira = $this->data_contoh(1); # data olok-olok | kira jumlah data	
		echo ' |<pre>$data='; print_r($data); echo '</pre> | $kira=' . $kira;

		//$this->kunciPintu($kira, $data); # pilih pintu masuk
	}
#---------------------------------------------------------------------------------------------------#
	function contoh02($pilih)
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
#---------------------------------------------------------------------------------------------------#
#==========================================================================================
}