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
	#***************************************************************************************
	$c0['kod_hasil'] = array(
		0=>array( $a=>'11', $b=>'Upah & gaji(sebelum potongan cukai pendapatan,'
			. ' pencaruman KWSP, dll.)|11' ),
		1=>array( $a=>'12', $b=>'Elaun(cth:elaun sara hidup, elaun pakar, elaun'
			. ' perumahan, elaun luar negeri, dll.)|12' ),
		2=>array( $a=>'13', $b=>'Bonus|13' ),
		3=>array( $a=>'14', $b=>'Wang tunai lain(cth:komisen, tip, pendapatan'
			. ' daripada kerja lebih masa, dll.)|14' ),
		4=>array( $a=>'15', $b=>'Makanan percuma/konsesi|15' ),
		5=>array( $a=>'16', $b=>'Tempat menginap percuma/konsesi|16' ),
		6=>array( $a=>'17', $b=>'Barang pengguna & perkhidmatan percuma/konsesi|17' ),
		7=>array( $a=>'18', $b=>'Pembayaran lain yang diterima berupa mata benda'
			. ' (cth : padi, getah, kelapa, dll.)|18' ),
		8=>array( $a=>'19', $b=>'Pencaruman majikan kepada KWSP, PERKESO, dll.|19' ),
		9=>array( $a=>'01', $b=>'[A] JUMLAH PENDAPATAN PEKERJAAN BERGAJI'
			. ' [INCS{(11)+(12)+'
			. ' ... +(19)}]|01' ),
		10=>array( $a=>'21A', $b=>'(i) Pertanian [Gunakan Helaian Kerja'
			. ' PPIR/HK-3 & 4]|21A' ),
		11=>array( $a=>'21NA', $b=>'(ii) Bukan Pertanian[Gunakan'
			. ' PPIR/HK-5]|21NA' ),
		12=>array( $a=>'21KS', $b=>'Kegunaan sendiri [Gunakan Helaian kerja'
			. ' PPIR/HK-1]|21KS' ),
		13=>array( $a=>'21', $b=>'JUMLAH PENDAPATAN PEKERJAAN SENDIRI'
			. ' [INCS{(21A)+(21NA)+(21KS}]|21' ),
		14=>array( $a=>'22', $b=>'(i)Sewa dinilai bagi rumah yang diduduki oleh pemiliknya'
			. ' [Gunakan Helaian Kerja PPIR/HK-6 ...INCS22]|22' ),
		15=>array( $a=>'23', $b=>'(ii)Sewa rumah atau harta lain (masukkan sewa tanah dan'
			. ' rumahsekali) [Gunakan Helaian Kerja PPIR/HK-6 ...INCS23]|23' ),
		16=>array( $a=>'24', $b=>'(iii)Sewa daripada tempat menginap (cth :'
			. ' sewa bilik di  TK tersebut)|24' ),
		17=>array( $a=>'02', $b=>'[B] JUMLAH PENDAPATAN LAIN DIPEROLEH'
			. ' [INCS{(21)+(22)+(23)+(24)}]|02' ),
		18=>array( $a=>'31', $b=>'a.(i) Royalti (cth : hak cipta, paten dan'
			. ' hak yg. serupa)|31' ),
		19=>array( $a=>'32', $b=>'(ii) Sewa daripada tanah pertanian [Gunakan Helaian'
			. ' Kerja PPIR/HK-6 ...INCS32]|32' ),
		20=>array( $a=>'33', $b=>'(iii) Faedah (cth : deposit bank, bil, bon,'
			. ' pinjaman, dll.)|33' ),
		21=>array( $a=>'34', $b=>'(iv) Dividen (cth :  hak milik saham,'
			. ' saham amanah dll.)|34' ),
		22=>array( $a=>'03', $b=>'[C]JUMLAH PENDAPATAN DARIPADA HARTA'
			. ' [INCS{(31)+(32)+(33)+(34)}]|03' ),
		23=>array( $a=>'41', $b=>'b.(i)	Kiriman wang yang diterima (daripada isi rumah'
			. ' yang lain dalam dan luar negeri)|41' ),
		24=>array( $a=>'42', $b=>'(ii) Nafkah|42' ),
		25=>array( $a=>'43', $b=>'(iii) Biasiswa / Dermasiswa / Fellowships|43' ),
		26=>array( $a=>'44', $b=>'(iv) Pencen|44' ),
		27=>array( $a=>'45', $b=>'(v) Pembayaran lain berkala yang diterima (cth : harta'
			. ' pesaka, kumpulan wang amanah, dll)|45' ),
		28=>array( $a=>'46', $b=>'(vi) Hadiah berupa wang tunai atau mata benda|46' ),
		29=>array( $a=>'05', $b=>'[D] JUMLAH PINDAHAN SEMASA YANG DITERIMA [INCS{(41)+'
			. ' (42)+ ... +(46)}]|05' ),
		30=>array( $a=>'06', $b=>'[E] JUMLAH PINDAHAN SEMASA BERSIH YANG DITERIMA'
			. ' [INCS05-TP 73 (Rujuk PPIR 3)]|06' ),
		31=>array( $a=>'07', $b=>'JUMLAH KASAR [INCS{(01)+(02)+(03)+(05)}]|07'),
		32=>array( $a=>'08', $b=>'JUMLAH BERSIH [INCS{(01)+(02)+(03)+(06)}]|08')
		//=>array( $a=>'-', $b=>'*'),
		);
	#***************************************************************************************
		$c0['kod_bayarwajibdenda'] = array(
			0=>array( $a=>'61', $b=>'1. Cukai pendapatan / Zakat pendapatan	| 61'),
			1=>array( $a=>'62', $b=>'2. Cukai lain (cth : cukai jalan, cukai lapangan'
				. ' terbang, dll.) | 62'),
			2=>array( $a=>'63', $b=>'3. Bayaran wajib dan denda (cth : bayaran pasport,'
				. ' ujian memandu, pendaftaran kereta motor, lesen memandu, dll.) | 63'),
			3=>array( $a=>'64', $b=>'4. Pencaruman kepada KWSP / Skim Keselamatan Sosial'
				. ' (pencaruman majikan dan pekerja)|64	'),
			4=>array( $a=>'65', $b=>'5. Bayaran pampasan kerana kecederaan, ganti rugi'
				. ' berdasarkan undang-undang, dll.|65'),
			5=>array( $a=>'66', $b=>'6. Bayaran nafkah atau harta warisan|66'),
			6=>array( $a=>'67', $b=>'7. Biasiswa, dermasiswa dan fellowships|67'),
			7=>array( $a=>'73A', $b=>'Jumlah / Total   INCS 73A = (TP61 + TP62 +...+ TP67)|73A'),
			8=>array( $a=>'68', $b=>'8. Pemberian kepada badan agama atau derma amal | 68'),
			9=>array( $a=>'69', $b=>'9. Yuran keahlian kepada kesatuan sekerja, parti politik,'
				. ' kelab sosial, dll.|69'),
			10=>array( $a=>'70', $b=>'10. Hadiah berupa wang tunai atau mata benda|70'),
			11=>array( $a=>'71', $b=>'11. Pindahan lain (terangkan)|71'),
			12=>array( $a=>'72A', $b=>'12. Pemberian kepada isi rumah lain:a) Malaysia'
				. ' |72a'),
			13=>array( $a=>'72B', $b=>'12. Pemberian kepada isi rumah lain:b) '
				. ' Negara-Negara lain / Foreign|72b'),
			14=>array( $a=>'72C', $b=>'12. Pemberian kepada isi rumah lain:c) '
				. ' Nyatakan Negara / Specify Country|72c'),
			15=>array( $a=>'73B', $b=>'Jumlah/TotaL INCS 73B = (TP68 + TP69 +...+'
				. ' TP72a + TP72b)|73B'),
			16=>array( $a=>'TP73', $b=>'Jumlah/Total TP73 = (INCS 73A + INCS 73B)|73')
			//=>array( $a=>'-', $b=>'*'),
		);
	#***************************************************************************************
		$c0['kod_xtvttani'] = array(
			=>array( $a=>'A1', $b=>'1.Penerimaan daripada jualan barang-barang keluaran|A1'),
			=>array( $a=>'A2', $b=>'2.Jumlah perbelanjaan:-|A2'),
			=>array( $a=>'B1', $b=>'2.Keuntungan  bersih  sebagaimana  tercatat  dalam'
				. ' penyata kira-kira|B1'),
			=>array( $a=>'B2', $b=>'3.Anggaran semula perkara B1 untuk tahun rujukan |B2'),
			=>array( $a=>'C1', $b=>'1.Pendapatan bersih tahunan Sama ada [A1 - A2]'
				. '  atau [B1 atau B2] | C1'),
			=>array( $a=>'C2', $b=>'2.Peratus pembahagian yang dipegang oleh'
				. '  ahli-ahli isi rumah | C2'),
			=>array( $a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3'),
			=>array( $a=>'C4A', $b=>'4.Jumlah nilai bagi keluaran sendiri yang'
				. ' digunakan untuk : (a) Kegunaan sendiri | c4a'),
			=>array( $a=>'C4B', $b=>'4.Jumlah nilai bagi keluaran sendiri yang'
				. ' digunakan untuk : (b) Lain-lain (seperti zakat, biji benih,'
				. ' pemberian, dll.)|c4b'),
			=>array( $a=>'C4', $b=>'4.Jumlah nilai bagi keluaran sendiri yang'
				. ' digunakan : C4 = (a) + (b) |C4'),
			=>array( $a=>'C5', $b=>'5.Pendapatan bersih yang diterima oleh'
				. ' ahli isi rumah	C5 = C3 + C4 | C5')
		//=>array( $a=>'-', $b=>'*'),
		);
	#***************************************************************************************
		$c0['kod_perikanan'] = array(
			=>array( $a=>'A1', $b=>'1.Nilai jumlah jualan (termasuk ikan kolam'
				. '  / sangkar, air tawar dan air payau / laut)|A1'),
			=>array( $a=>'A2', $b=>'2.Pendapatan yang diterima daripada sewaan bot'
				. ' / perkakas dalam sua belas (12) bulan yang lalu |A2'),
			=>array( $a=>'A3', $b=>'3.Lain-lain|A3'),
			=>array( $a=>'A4', $b=>'A4 =  A1  +  A2 + A3|A4'),
			=>array( $a=>'B', $b=>'1.Jumlah perbelanjaan | B'),
			=>array( $a=>'C1', $b=>'1.Pendapatan bersih tahunan (A4 - B)|C1'),
			=>array( $a=>'C2', $b=>'2.Peratus pembahagian yang dipegang oleh'
				. ' ahli isi rumah|C2'),
			=>array( $a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3'),
			=>array( $a=>'C4', $b=>'4.Anggaran barangan keluaran yang digunakan'
				. ' sendiri setahun|C4'),
			=>array( $a=>'C5', $b=>'5.Pendapatan bersih yang diterima oleh'
				. ' ahli isi rumah[C5 = C3 + C4]|C5')
		//=>array( $a=>'-', $b=>'*'),
		);
	#***************************************************************************************
		return ($c0);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}