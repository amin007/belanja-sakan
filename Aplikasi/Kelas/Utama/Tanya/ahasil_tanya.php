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
		$k = 'kod_hasil';
		$p[$k][]=array($a=>'11', $b=>'Upah & gaji(sebelum potongan cukai pendapatan,'
		. ' pencaruman KWSP, dll.)|11' );
		$p[$k][]=array($a=>'12', $b=>'Elaun(cth:elaun sara hidup, elaun pakar, elaun'
		. ' perumahan, elaun luar negeri, dll.)|12' );
		$p[$k][]=array($a=>'13', $b=>'Bonus|13' );
		$p[$k][]=array($a=>'14', $b=>'Wang tunai lain(cth:komisen, tip, pendapatan'
		. ' daripada kerja lebih masa, dll.)|14' );
		$p[$k][]=array($a=>'15', $b=>'Makanan percuma/konsesi|15' );
		$p[$k][]=array($a=>'16', $b=>'Tempat menginap percuma/konsesi|16' );
		$p[$k][]=array($a=>'17', $b=>'Barang pengguna & perkhidmatan percuma/konsesi|17' );
		$p[$k][]=array($a=>'18', $b=>'Pembayaran lain yg diterima berupa mata benda'
		. ' (cth:padi, getah, kelapa, dll.)|18' );
		$p[$k][]=array($a=>'19a', $b=>'Pencaruman majikan kpd KWSP|19a' );
		$p[$k][]=array($a=>'19b', $b=>'Pencaruman majikan kpd PERKESO, dll.|19b' );
		$p[$k][]=array($a=>'19c', $b=>'Pencaruman majikan kpd dll.|19c' );
		$p[$k][]=array($a=>'19', $b=>'Jumlah [19a+19b+19c]|19' );
		$p[$k][]=array($a=>'01', $b=>'[A]JUMLAH PENDAPATAN PEKERJAAN BERGAJI'
		. ' [INCS{(11)+(12)+ ... +(19)}]|01' );
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil drp pertanian & perikanan:'
		$b2 = '[Gunakan helaian kerja PPIK/HK-2/3]';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. $b2 . '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21A(iii)');
		$p[$k][]=array($a=>'21A', $b=>'Jumlah [21A(i)+21A(ii)+21A(iii)]|21A');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'21NA', $b=>'(ii) Bukan Pertanian[Gunakan'
		. ' PPIR/HK-5]|21NA');
		$p[$k][]=array($a=>'21KS', $b=>'Kegunaan sendiri [Gunakan Helaian kerja'
		. ' PPIR/HK-1]|21KS');
		$p[$k][]=array($a=>'21', $b=>'JUMLAH PENDAPATAN PEKERJAAN SENDIRI'
		. ' [INCS{(21A)+(21NA)+(21KS}]|21');
		$p[$k][]=array($a=>'22', $b=>'(i)Sewa dinilai bagi rumah yg diduduki oleh pemiliknya'
		. ' [Gunakan Helaian Kerja PPIR/HK-6 ...INCS22]|22');
		$p[$k][]=array($a=>'23', $b=>'(ii)Sewa rumah atau harta lain (masukkan sewa tanah &'
		. ' rumahsekali) [Gunakan Helaian Kerja PPIR/HK-6 ...INCS23]|23');
		$p[$k][]=array($a=>'24', $b=>'(iii)Sewa daripada tempat menginap (cth :'
		. ' sewa bilik di  TK tersebut)|24');
		$p[$k][]=array($a=>'02', $b=>'[B] JUMLAH PENDAPATAN LAIN DIPEROLEH'
		. ' [INCS{(21)+(22)+(23)+(24)}]|02');
		$p[$k][]=array($a=>'31', $b=>'a.(i) Royalti(cth:hak cipta, paten &'
		. ' hak yg. serupa)|31');
		$p[$k][]=array($a=>'32', $b=>'(ii) Sewa daripada tanah pertanian [Gunakan Helaian'
		. ' Kerja PPIR/HK-6 ...INCS32]|32');
		$p[$k][]=array($a=>'33', $b=>'(iii) Faedah(cth:deposit bank, bil, bon,'
		. ' pinjaman, dll.)|33');
		$p[$k][]=array($a=>'34', $b=>'(iv) Dividen(cth: hak milik saham,'
		. ' saham amanah dll.)|34');
		$p[$k][]=array($a=>'03', $b=>'[C]JUMLAH PENDAPATAN DARIPADA HARTA'
		. ' [INCS{(31)+(32)+(33)+(34)}]|03');
		$p[$k][]=array($a=>'41', $b=>'b.(i)	Kiriman wang yg diterima (daripada isi rumah'
		. ' yg lain dalam & luar negeri)|41');
		$p[$k][]=array($a=>'42', $b=>'(ii) Nafkah|42');
		$p[$k][]=array($a=>'43', $b=>'(iii) Biasiswa/Dermasiswa/Fellowships|43');
		$p[$k][]=array($a=>'44', $b=>'(iv) Pencen|44');
		$p[$k][]=array($a=>'45', $b=>'(v) Pembayaran lain berkala yg diterima(cth:harta'
		. ' pesaka, kumpulan wang amanah, dll)|45');
		$p[$k][]=array($a=>'46', $b=>'(vi) Hadiah berupa wang tunai atau mata benda|46');
		$p[$k][]=array($a=>'05', $b=>'[D]JUMLAH PINDAHAN SEMASA YG DITERIMA [INCS{(41)+'
		. ' (42)+ ... +(46)}]|05');
		$p[$k][]=array($a=>'06', $b=>'[E]JUMLAH PINDAHAN SEMASA BERSIH YG DITERIMA'
		. ' [INCS05-TP 73 (Rujuk PPIR 3)]|06');
		$p[$k][]=array($a=>'07', $b=>'JUMLAH KASAR[INCS{(01)+(02)+(03)+(05)}]|07' );
		$p[$k][]=array($a=>'08', $b=>'JUMLAH BERSIH[INCS{(01)+(02)+(03)+(06)}]|08');
		//$p[$k][]=array($a=>'-', $b=>'*');
		);
	#***************************************************************************************
		$k = 'kod_bayarwajibdenda';
		$p[$k][]=array($a=>'61', $b=>'1. Cukai pendapatan/Zakat pendapatan|61');
		$p[$k][]=array($a=>'62', $b=>'2. Cukai lain (cth:cukai jalan, cukai lapangan'
		. ' terbang, dll.)|62');
		$p[$k][]=array($a=>'63', $b=>'3. Bayaran wajib & denda(cth:bayaran pasport,'
		. ' ujian memandu, pendaftaran kereta motor, lesen memandu, dll.) | 63');
		$p[$k][]=array($a=>'64', $b=>'4. Pencaruman kepada KWSP / Skim Keselamatan Sosial'
		. ' (pencaruman majikan & pekerja)|64');
		$p[$k][]=array($a=>'65', $b=>'5. Bayaran pampasan kerana kecederaan, ganti rugi'
		. ' berdasarkan undang-undang, dll.|65');
		$p[$k][]=array($a=>'66', $b=>'6. Bayaran nafkah atau harta warisan|66');
		$p[$k][]=array($a=>'67', $b=>'7. Biasiswa, dermasiswa & fellowships|67');
		$p[$k][]=array($a=>'73A', $b=>'Jumlah/Total INCS 73A = (TP61 + TP62 +...+ TP67)|73A');
		$p[$k][]=array($a=>'68', $b=>'8. Pemberian kepada badan agama atau derma amal | 68');
		$p[$k][]=array($a=>'69', $b=>'9. Yuran keahlian kepada kesatuan sekerja, parti politik,'
		. ' kelab sosial, dll.|69');
		$p[$k][]=array($a=>'70', $b=>'10. Hadiah berupa wang tunai atau mata benda|70');
		$p[$k][]=array($a=>'71', $b=>'11. Pindahan lain(terangkan)|71');
		$p[$k][]=array($a=>'72A', $b=>'12. Pemberian kepada isi rumah lain:a)Malaysia'
		. ' |72a');
		$p[$k][]=array($a=>'72B', $b=>'12. Pemberian kepada isi rumah lain:b)'
		. ' Negara-Negara lain / Foreign|72b');
		$p[$k][]=array($a=>'72C', $b=>'12. Pemberian kepada isi rumah lain:c)'
		. ' Nyatakan Negara / Specify Country|72c');
		$p[$k][]=array($a=>'73B', $b=>'Jumlah/TotaL INCS 73B = (TP68 + TP69 +...+'
		. ' TP72a + TP72b)|73B');
		$p[$k][]=array($a=>'TP73', $b=>'Jumlah/Total TP73 = (INCS 73A + INCS 73B)|73')
		//=>array( $a=>'-', $b=>'*');
		);
	#***************************************************************************************
		$k = 'kod_xtvttani';
		$p[$k][]=array($a=>'A1', $b=>'1.Penerimaan daripada jualan barang-barang keluaran|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Jumlah perbelanjaan|A2');
		$p[$k][]=array($a=>'B1', $b=>'2.Keuntungan  bersih  sebagaimana  tercatat  dalam'
		. ' penyata kira-kira|B1');
		$p[$k][]=array($a=>'B2', $b=>'3.Anggaran semula perkara B1 untuk tahun rujukan |B2');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan Sama ada [A1 - A2]'
		. '  atau [B1 atau B2] | C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. '  ahli-ahli isi rumah | C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4A', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan untuk:(a) Kegunaan sendiri | c4a');
		$p[$k][]=array($a=>'C4B', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan untuk:(b) Lain-lain (seperti zakat, biji benih,'
		. ' pemberian, dll.)|c4b');
		$p[$k][]=array($a=>'C4', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan : C4=(a)+(b) |C4');
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah	C5 = C3 + C4 | C5')
		//=>array( $a=>'-', $b=>'*');
		);
	#***************************************************************************************
		$k = 'kod_perikanan';
		$p[$k][]=array($a=>'A1', $b=>'1.Nilai jumlah jualan (termasuk ikan kolam'
		. '/sangkar, air tawar & air payau / laut)|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Pendapatan yg diterima daripada sewaan bot'
		. '/perkakas dalam sua belas (12) bulan yg lalu |A2');
		$p[$k][]=array($a=>'A3', $b=>'3.Lain-lain|A3');
		$p[$k][]=array($a=>'A4', $b=>'A4 =  A1  +  A2 + A3|A4');
		$p[$k][]=array($a=>'B', $b=>'1.Jumlah perbelanjaan | B');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan (A4 - B)|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. ' ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4', $b=>'4.Anggaran barangan keluaran yg digunakan'
		. ' sendiri setahun|C4');
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah[C5 = C3 + C4]|C5')
		//=>array( $a=>'-', $b=>'*');
		);
	#***************************************************************************************
		return ($c0);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}