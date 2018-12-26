<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Qss_Tanya extends \Aplikasi\Kitab\Tanya
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
#=====================================================================================================
#---------------------------------------------------------------------------------------------------#
	public function setPencam($pilih,$medanID,$dataID)
	{
		//$pilih = null;
		if($pilih == 'semuaJadual'): //echo "\$pilih = $pilih <br>";
			list($medan, $carian, $susun) = $this->semuaJadual($medanID,$dataID);
		else: //echo "\$pilih = $pilih <br>";
			$medan = $carian = $susun = null;
		endif;

		return array($medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function semuaJadual($medanID,$dataID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'%like%', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function dataBanci2016()
	{
		$data = array('301','302','303','304','305','306','308','309','310','311','312',
			'313','314','315','316','317','318','319','320','322','323','324','325','328',
			'330','331','332','333','334','335','336','392','393','840','850','890'
		);

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}