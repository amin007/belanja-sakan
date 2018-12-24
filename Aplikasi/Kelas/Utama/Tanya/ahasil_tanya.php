<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Ahasil_Tanya extends \Aplikasi\Kitab\Tanya
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
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($bentukJadual01,'teste');
	}
#------------------------------------------------------------------------------------------#
#------------------------------------------------------------------------------------------#
	function pilihPencam()
	{
		$a = 'kod'; $b = 'keterangan';
		$c0['kod_hasil'] = array(
		[0] = Array( [$a] => '11', [$b] => 'Upah dan gaji '
			. '(sebelum potongan cukai pendapatan, pencaruman KWSP, dll.)|11' ),
		[1] = Array( [$a] => '12', [$b] => 'Elaun (cth : elaun sara hidup, '
			. 'elaun pakar, elaun perumahan, elaun luar negeri, dll.)|12' ),
		[2] = Array( [$a] => '13', [$b] => 'Bonus|13' ),
		[3] = Array( [$a] => '14', [$b] => 'Wang tunai lain (cth : komisen, '
			. 'tip, pendapatan daripada kerja lebih masa, dll.)|14' ),
		[4] = Array( [$a] => '15', [$b] => 'Makanan percuma / konsesi|15' ),
		[5] = Array( [$a] => '16', [$b] => 'Tempat menginap percuma'
			. '/ konsesi|16' ),
		[6] = Array( [$a] => '17', [$b] => 'Barang pengguna dan perkhidmatan'
			. ' percuma / konsesi|17' ),
		[7] = Array( [$a] => '18', [$b] => 'Pembayaran lain yang diterima'
			. ' berupa mata benda (cth : padi, getah, kelapa, dll.)|18' ),
		[8] = Array( [$a] => '19', [$b] => 'Pencaruman majikan kepada KWSP,'
			. ' PERKESO, dll.|19' ),
		[9] = Array( [$a] => '01', [$b] => '[A] JUMLAH PENDAPATAN'
			. ' PEKERJAAN BERGAJI[INCS{(11)+(12)+ ... +(19)}]|01' ),
		[10] = Array( [$a] => '21A', [$b] => '(i) Pertanian [Gunakan'
			. ' Helaian Kerja PPIR/HK-3 & 4]|21A' ),
		[11] = Array( [$a] => '21NA', [$b] => '(ii) Bukan Pertanian[Gunakan'
			. ' PPIR/HK-5]|21NA' ),
		[12] = Array( [$a] => '21KS', [$b] => 'Kegunaan sendiri [Gunakan'
			. ' Helaian kerja PPIR/HK-1]|21KS' ),
		[13] = Array( [$a] => '21', [$b] => 'JUMLAH PENDAPATAN'
			. ' PEKERJAAN SENDIRI [INCS{(21A)+(21NA)+(21KS}]|21' ),
		[14] = Array( [$a] => '22', [$b] => '(i)Sewa dinilai bagi rumah'
			. ' yang diduduki oleh pemiliknya [Gunakan'
			. ' Helaian Kerja PPIR/HK-6 ...INCS22]|22' ),
		[15] = Array( [$a] => '23', [$b] => '(ii)Sewa rumah atau harta lain'
			. ' (masukkan sewa tanah dan rumahsekali) [Gunakan'
			. ' Helaian Kerja PPIR/HK-6 ...INCS23]|23' ),
		[16] = Array( [$a] => '24', [$b] => '(iii)Sewa daripada tempat menginap'
			. ' (cth : sewa bilik di TK tersebut)|24' ),
		[17] = Array( [$a] => '02', [$b] => '[B] JUMLAH PENDAPATAN LAIN'
			. ' DIPEROLEH [INCS{(21)+(22)+(23)+(24)}]|02' ),
		[18] = Array( [$a] => '31', [$b] => 'a.(i) Royalti (cth :'
			. ' hak cipta, paten dan hak yg. serupa)|31' ),
		[19] = Array( [$a] => '32', [$b] => '(ii) Sewa daripada tanah'
			. ' pertanian [Gunakan Helaian Kerja PPIR/HK-6 ...INCS32]|32' ),
		[20] = Array( [$a] => '33', [$b] => '(iii) Faedah (cth :'
			. ' deposit bank, bil, bon, pinjaman, dll.)|33' ),
		[21] = Array( [$a] => '34', [$b] => '(iv) Dividen (cth :'
			. '  hak milik saham, saham amanah dll.)|34' ),
		[22] = Array( [$a] => '03', [$b] => '[C]JUMLAH PENDAPATAN'
			. ' DARIPADA HARTA [INCS{(31)+(32)+(33)+(34)}]|03' ),
		[23] = Array( [$a] => '41', [$b] => 'b.(i)	Kiriman wang yang diterima'
			. ' (daripada isi rumah yang lain dalam dan luar negeri)|41' ),
		[24] = Array( [$a] => '42', [$b] => '(ii) Nafkah|42' ),
		[25] = Array( [$a] => '43', [$b] => '(iii) Biasiswa /'
			. ' Dermasiswa / Fellowships|43' ),
		[26] = Array( [$a] => '44', [$b] => '(iv) Pencen|44' ),
		[27] = Array( [$a] => '45', [$b] => '(v) Pembayaran lain berkala'
			. ' yang diterima (cth : harta pesaka, kumpulan wang amanah, dll)|45' ),
		[28] = Array( [$a] => '46', [$b] => '(vi) Hadiah berupa wang'
			. ' tunai atau mata benda|46' ),
		[29] = Array( [$a] => '05', [$b] => '[D] JUMLAH PINDAHAN SEMASA'
			. ' YANG DITERIMA [INCS{(41)+(42)+ ... +(46)}]|05' ),
		[30] = Array( [$a] => '06', [$b] => '[E] JUMLAH PINDAHAN SEMASA'
			. ' BERSIH YANG DITERIMA[INCS05-TP 73 (Rujuk PPIR 3)]|06' ),
		[31] = Array( [$a] => '07', [$b] => 'JUMLAH KASAR'
			. ' [INCS{(01)+(02)+(03)+(05)}]|07'),
		[32] = Array( [$a] => '08', [$b] => 'JUMLAH BERSIH'
			. ' [INCS{(01)+(02)+(03)+(06)}]|08'),
		//[] = Array( [$a] => '-', [$b] => '*'),
		);

		return $c0;
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}