<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Dataxml_Tanya extends \Aplikasi\Kitab\Tanya
{
#===========================================================================================================
#----------------------------------------------------------------------------------------------------------#
	public function __construct() { parent::__construct(); }
#----------------------------------------------------------------------------------------------------------#
	public function medanUbah2($cariID)
	{
		$senaraiMedan = 'no,Nama_Penuh nama,email,nohp';

		return $senaraiMedan; # pulangkan pemboleubah
	}
#----------------------------------------------------------------------------------------------------------#
	public function tatasusunanCariID($jadual, $medan, $cari, $susun) 
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'alamat' => 'no 1000, ' . "\r" 
					. 'jalan 2000, ' . "\r" 
					. 'taman 3000 ' . "\r" 
					. 'poskod 40000',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#----------------------------------------------------------------------------------------------------------#
	public function tatasusunanCariMFG($jadual, $medan, $cari, $susun)
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'kumpulanIndustri' => 'MFG',
				'terimaProsesan' => 'J001',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#----------------------------------------------------------------------------------------------------------#
	public function tatasusunanCariPPT($jadual, $medan, $cari, $susun)
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'kumpulanIndustri' => 'PPT',
				'hantar_prosesan' => 'J001',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#----------------------------------------------------------------------------------------------------------#
	public function tatasusunanUbah2A($jadual, $medan, $cari, $susun) 
	{
		# ada nilai - cantum semua tatasusunan dalam satu
		$hasil = array (
			'msic2008' => array (
				0 => array (
						'S' => 'S',
						'msic2000' => '93099p',
						'msic' => '96094',
						'keterangan' => 'Perkhidmatan jagaan haiwan(2)',
						'notakaki' => '(2) Termasuk: penumpangan, perapian, mendudukkan '
						. 'dan melatih binatang peliharaan',
					),
				),
			'msic_v1' => array (
				0 => array (
						'msic' => '96094',
						'kp' => '85',
						'staf' => NULL,
						'keterangan' => 'Perkhidmatan jagaan haiwan',
						'notakaki' => 'Pet care services INCLUDE boarding, grooming, '
						. 'sitting and training pets '
						. 'NOT INCLUDE veterinary activities, see 7500 activities of '
						. 'fitness centres, see 93118',
					),
			),
			'msic_bandingan' => array (
				0 => array (
						'sv_newss' => '332',
						'sv_sidap' => '85',
						'msic2000p' => '93099p',
						'msic2000' => '93099',
						'msic' => '96094',
						'keterangan' => 'Aktiviti Perkhidmatan Persendirian',
						'Sektor' => 'Perkhidmatan (Lain-lain)',
					),
			),
			'msic2000' => array (),
			'msic2000_notakaki' => array (),
		);

		# ada nilai - pecah tatasusunan kepada beberapa bahagian
		$hasil1['satu'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);
		$hasil1['dua'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);
		$hasil1['tiga'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#----------------------------------------------------------------------------------------------------------#
	public function medanUbah($cariID) 
	{
		# Set pemboleubah
		# buat link
		$alamat1 = 'http://xxx/crud/ubah2/",kp,"/'.$cariID.'/2010/2015/'; 
		$url1 = '" <a target=_blank href=' . $alamat1 . '>SEMAK 1</a>"';
		$url2 = 'concat("<a target=_blank href=' . $alamat1 . '>SEMAK 2</a>")';
		# Set pemboleubah untuk sql
        $senaraiMedan = 'id,'
			. 'concat_ws("|",nama,operator,' . $url1 . ',' . $url2 . ') nama,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
 			. ' ) as data5P,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," tel",tel),' . "\r"
			. ' 	concat_ws("="," fax",fax),' . "\r"
			. ' 	concat_ws("="," orang",orang),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax)' . "\r"
 			. ' ) as dataHubungi,'
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat,' . "\r"
			//. 'concat_ws(" ",no,batu,( if (jalan is null, "", concat("JALAN ",jalan) ) ),'
			//. 'tmn_kg,poskod,dp_baru) alamat_baru,' . "\r"
			. 'tel,notel,fax,nofax,responden,orang,email,esurat,'
			. 'hasil,belanja,gaji,aset,staf,stok' . "\r" 
			. '';

		# pulangkan pemboleubah
		return $senaraiMedan;
	}
#----------------------------------------------------------------------------------------------------------#
	public function semakPost($senarai, $nilaiRM, $medanID, $dataID) 
	{
        foreach ($_POST as $myTable => $value)
        {   if ( in_array($myTable,$senarai) )
            {   foreach ($value as $kekunci => $papar)
				{	$posmen[$myTable][$kekunci]= 
						( in_array($kekunci,$nilaiRM) ) ? # $nilaiRM rujuk line 154
						str_replace( ',', '', bersih($papar) ) # buang koma	
						: bersih($papar);
				}	$posmen[$myTable][$medanID] = $dataID;
            }
        }

		return $posmen; # pulangkan nilai
	}
#----------------------------------------------------------------------------------------------------------#
	public function semakPosmen($posmen, $jadual) 
	{
		# valid guna gelung foreach
		foreach ($nilaiRM as $keyRM) # $nilaiRM rujuk line 154
		{# kod php untuk formula matematik
			$data = null;
			if(isset($posmen[$jadual][$keyRM])):
				eval( '$data = (' . $posmen[$jadual][$keyRM] . ');' );
				$posmen[$jadual][$keyRM] = $data;
			endif;
		}/*$nilaiTEKS = array('no','batu','jalan','tmn_kg');
		foreach ($nilaiTEKS as $keyTEKS)
		{# kod php untuk besarkan semua huruf aka uppercase
			if(isset($posmen[$jadual][$keyTEKS])):
				$posmen[$jadual][$keyTEKS] = strtoupper($posmen[$jadual][$keyTEKS]);
			endif;
		}//*/ # valid guna if
		if (isset($posmen[$jadual]['email']))
			$posmen[$jadual]['email']=strtolower($posmen[$jadual]['email']);
		//if (isset($posmen[$jadual]['dp_baru']))
		//	$posmen[$jadual]['dp_baru']=ucwords(strtolower($posmen[$jadual]['dp_baru']));
		if (isset($posmen[$jadual]['responden']))
			$posmen[$jadual]['responden']=mb_convert_case($posmen[$jadual]['responden'], MB_CASE_TITLE);
		if (isset($posmen[$jadual]['password']))
		{
			//$pilih = null;
			$pilih = 'md5'; # Hash::rahsia('md5', $posmen[$jadual]['password'])
			//$pilih = 'sha256'; # Hash::create('sha256', $posmen[$jadual]['password'], HASH_PASSWORD_KEY)
			if (empty($posmen[$jadual]['password']))
				unset($posmen[$jadual]['password']);
			elseif ($pilih == 'md5')
				$posmen[$jadual]['password'] = 
				\Aplikasi\Kitab\Hash::rahsia('md5', $posmen[$jadual]['password']);
			elseif ($pilih == 'sha256')
				$posmen[$jadual]['password'] = 
				\Aplikasi\Kitab\Hash::create('sha256', $posmen[$jadual]['password'], HASH_PASSWORD_KEY);
		}//*/

		return $posmen; # pulangkan nilai
	}
#----------------------------------------------------------------------------------------------------------#
	public function medanCari($cariID) 
	{ 
		# Set pemboleubah untuk sql
        $senaraiMedan = ''
			. 'msic,keterangan,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("","",seksyen),' . "\r"
			. ' 	concat_ws("","",bahagian),' . "\r"
			. ' 	concat_ws("","",kumpulan),' . "\r"
			. ' 	concat_ws("","",kelas)' . "\r"
 			. ' ) as jenis,'
			. 'msic2000,'
			. 'notakaki'
			. '';

		# pulangkan pemboleubah
		return $senaraiMedan;
	}
#----------------------------------------------------------------------------------------------------------#
	public function medanCari2($cariID) 
	{ 
		# Set pemboleubah untuk sql
        $senaraiMedan = ''
			. 'msic,kod_produk,keterangan,'
			. ' concat_ws("-",' . "\r"
			. ' 	concat_ws("","",msic),' . "\r"
			. ' 	concat_ws("","",p),' . "\r"
			. ' 	concat_ws("","",a)' . "\r"
 			. ' ) as jenis,'
			. 'mcpa2005,unit,code'
			. '';

		# pulangkan pemboleubah
		return $senaraiMedan;
	}
#----------------------------------------------------------------------------------------------------------#
	public function tukar_data_xml($dataCantum,$xml_user_info)
	{
		# function call to convert array to xml
		$xmlData = new \Aplikasi\Kitab\Tatasusunan;
		$xmlData->array_to_xml($dataCantum,$xml_user_info);

		# saving generated xml file
		//$namafail = 'sumber/fail/xml/emsic2008.xml';
		$namafail = 'sumber/fail/xml/emcpa2009.xml';
		$xml_file = $xml_user_info->asXML($namafail);
		//$xml_file = $xml_user_info->asXML();

		# success and error message based on xml creation
		if($xml_file)
		{
			echo 'XML file have been generated successfully.'
			. '<a target="_blank" href="' . URL . $namafail . '">Click here</a> | '
			. '<a href="' . URL . 'ruangtamu/pelawat">Ruang Legar</a>';
			//echo $xml_file;
		}
		else
		{
			echo 'XML file generation error.';
		}
		//*/
	}
#----------------------------------------------------------------------------------------------------------#
	public function susunDataMysql()
	{
		$data = array(
		'(BUSINESS MANAGEMENT CONSULTAN','(CARPET AND RUG SHAMPOOING, AN','(INSTALLATION OF DOORS, WINDOW',
		'(INTERIOR AND EXTERIOR PAINTIN','(LAUNDERING AND DRY-CLEANING,','(MANUFACTURE OF LUGGAGE, HANDB',
		'(RAISING, BREEDING AND PRODUCT','(RETAIL SALE OF ARTICLES OF CL','(RETAIL SALE OF FOOTWEAR)',
		'(RETAIL SALE OF FRESH OR PRESE','(RETAIL SALE OF RICE, FLOUR, O','(WHOLESALE AND RETAIL OF NEW M',
		'(WHOLESALE OF HABERDASHERY)','(WHOLESALE OF STATIONERY, BOOK','2. MOBILE PARTS SALES & SERVIC',
		'3. MENJUAL MAKANAN DAN MINUMAN','3. MOBILE RELOAD AGENT','4. COMMISSION AGENT',
		'> MEMBEKAL DAN MENJUAL PRODUK','ADVERTISING AND PROMOTION','AGEN HARTANAH',
		'AKSESORI','AKSESORI WANITA','ALAT TULIS, PEMBERSIHAN KAWASA','ARTIST MANAGEMENT',
		'BANDAR BUKIT BERUNTUNG','BANDAR DAMAI PERDANA','BANDAR MAHKOTA CHERAS','BANDAR PERDA',
		'BANDAR PUTRA BERTAM','BANDAR SERI ALAM','BANDAR SRI PERMAISURI','BANDAR TASEK MUTIARA',
		'BANDAR TUN RAZAK, CHERAS','BANDAR UTAMA','BANTUAN MENGAJAR, PAKAIAN SUKA','BATU 9',
		'BATU KAWAN','BENUT','BINJAI','BUKIT RAHMAN PUTRA','BUSINESS MANAGEMENT','DESA PANDAN',
		'FOOD & BEVERAGES','FOTOGRAFI','FROZEN FOOD','GAT LEBUH MACALLUM','GROCERY','HUMAN RESOURCES',
		'INDAHPURA','INTERIOR DESIGN','JALAN AMPANG PUTRA','JALAN KENANGA','JALAN MERU','JALAN PJS 9/1,',
		'JALAN PJU 8/1, DAMANSARA PERDA','JALAN SULTAN ISMAIL','JELUTONG','JUALAN BORONG DAN RUNCIT SEMUA',
		'JUALAN BORONG PAKAIAN','JUALAN RUNCIT PERABOT ISI RUMA','KANCHONG DARAT,','KATERING,','KELAPA SAWIT',
		'KEPONG BARU','KG BUKIT BELIMBING','KOTA KEMUNING, SEKSYEN 31','KUBANG SEMANG,','KUCHAI ENTREPRENEURS PARK',
		'MAKANAN','MAKANAN BERMASAK ISLAM','MAKANAN DAN MINUMAN, PENYEDIAA','MEMBEKAL DAN MENJUAL MAKANAN B',
		'MEMBEKAL DAN MENJUAL MAKANAN D','MEMBORONG, MEMBEKAL DAN MENJUA','MENCUCI KERETA','MENJUAL DAN MEMBEKAL PAKAIAN',
		'MENJUAL DAN MEMBELI ALAT GANTI','MENJUAL KOSMETIK','MENJUAL MAKANAN','MENJUAL PAKAIAN MUSLIMAH',
		'MENJUAL PRODUK KECANTIKAN DAN ','MENJUAL TUDUNG','MENYEDIAKAN PERKHIDMATAN PENGH','OFF JALAN KLANG LAMA',
		'PEMBEKAL ALAT TULIS ','PEMBERSIHAN SEMUA JENIS BANGUN','PENGURUSAN ACARA','PENTERNAKAN, PEMBIAKAN DAN PEN',
		'PERCETAKAN','PERFUME','PERKHIDMATAN MAKANAN DAN MINUM','PERUNDINGAN KOMPUTER','PLUMBING ','PUSAT PERDAGANGAN SERI KEMBANG',
		'RENGIT','SEGAMBUT','SEKSYEN 20','SELLING CLOTHING','SENTUL','SUNGAI BAKAP','TAMAN BAYU PERDANA','TAMAN BIDARA','TAMAN BUKIT INDAH,'
		,'TAMAN BUKIT KINRARA','TAMAN BUKIT MEWAH','TAMAN BUKIT SERDANG','TAMAN BUKIT SUBANG','TAMAN CHERAS','TAMAN INDAH',
		'TAMAN KINRARA','TAMAN KOTA','TAMAN KOTA JAYA','TAMAN LEMBAH MAJU','TAMAN MALURI','TAMAN MEGAH','TAMAN MOLEK,',
		'TAMAN MUTIARA CEMPAKA,','TAMAN MUTIARA,','TAMAN NUSA BESTARI','TAMAN NUSA BESTARI 2','TAMAN PANDAN INDAH','TAMAN PERLING',
		'TAMAN PRIMA SAUJANA','TAMAN PUTRA PERDANA','TAMAN PUTRI','TAMAN PUTRI KULAI,','TAMAN RINTING','TAMAN SAGA',
		'TAMAN SERDANG PERDANA','TAMAN SERI GOMBAK','TAMAN SETIA INDAH,','TAMAN SRI ANDALAS,','TAMAN SRI MANJA','TAMAN SUTERA,',
		'TAMAN UNGKU TUN AMINAH','TAMAN UNIVERSITI, SKUDAI','TAMAN USAHAWAN KEPONG UTARA','TAMAN UTAMA','TAMAN WANGSA PERMAI',
		'TANDA DAN ','TMN PUTRA','TONGKANG PECAH','TRAINING ','TRANSPORTATION SERVICES','USJ 1','WANGSA MELAWATI','WEDDING PLANNER'
		);

		return $data;
	}
#----------------------------------------------------------------------------------------------------------#
	public function susunDataMysql2()
	{
		$data = array(
		'KUALA PEGANG','KUPANG','LANDSCAPING','LANSKAP','LATIHAN KOMPUTER','LEBUHRAYA THEAN TEIK',
		'LEVEL 19 MENARA AIA','LIFE INSURANCE ','LOGISTIC','M','MAKANAN BASAH DAN KERING',
		'MAKANAN BERMASAK (ISLAM)','MAKANAN SEJUK BEKU','MANAGEMENT','MARKETING CONSULTANT',
		'MEDIA RELATIONS','MEMBEKAL & MENJUAL BAJA POKOK','MEMBEKAL & MENJUAL MAKANAN BER',
		'MEMBEKAL ALATAN TUKANGAN DAN P','MEMBEKAL BAHAN BINAAN','MEMBEKAL BARANGAN PERTANIAN',
		'MEMBEKAL CENDERAMATA DAN HADIA','MEMBEKAL PERALATAN DAN KELENGK','MEMBEKAL PERALATAN PERTANIAN, ',
		'MEMBEKAL PERALATAN SUKAN','MEMBELI DAN MENJUAL BARANG BAR','MEMBERSIH BANGUNAN DAN KAWASAN',
		'MEMBERSIH KAWASAN DAN LANDSKAP','MEMBERSIH PANTAI/SUNGAI/TERUSA','MEMBERSIHKAN KAWASAN DAN BANGU',
		'MEMPERBAHARUI INSURAN DAN CUKA','MENCUCI BANGUNAN DAN MEMBERSIH','MENCUCI DAN MEMBERSIH PAKAIAN ',
		'MENCUCI DAN MEMBERSIHKAN PAKAI','MENCUCI DAN MENGILAP (CUCI KER','MENGANGKAT SAMPAH',
		'MENGELUAR, MEMBEKAL DAN MENJUA','MENGURUS ACARA','MENGURUS, MEMPROMOSI DAN/ATAU ',
		'MENGURUSKAN MAJLIS KERAMAIAN D','MENJAHIT PAKAIAN','MENJUAL ALATAN ELEKTRIK & ELEK',
		'MENJUAL BARANG LUSUH','MENJUAL BARANG RUNCIT','MENJUAL BARANG-BARANG KEJURUTE',
		'MENJUAL BARANGAN KECANTIKAN DA','MENJUAL BARANGAN KOSMETIK DAN ','MENJUAL BARANGAN RUNCIT',
		'MENJUAL BARANGAN RUNCIT SEPERT','MENJUAL CENDERAMATA','MENJUAL DAN MEMBEKAL ALAT TULI',
		'MENJUAL DAN MEMBEKAL KOSMETIK ','MENJUAL DAN MEMBEKAL MAKANAN, ','MENJUAL DAN MEMBEKAL PERALATAN',
		'MENJUAL DAN MEMBEKAL PRODUK KE','MENJUAL KASUT','MENJUAL KEK','MENJUAL KERETA TERPAKAI',
		'MENJUAL MAKANAN DAN MINUMAN SE','MENJUAL MAKANAN KERING','MENJUAL PAKAIAN DAN AKSESORI W',
		'MENJUAL PERABOT','MENJUAL TUDUNG DAN PAKAIAN','MENJUAL, MEMBAIKI DAN MEMASANG',
		'MENYEDIAKAN KHIDMAT POTOSTAT ','MENYEDIAKAN MAKANAN DAN MINUMA','MENYEDIAKAN PENGHANTARAN MAKAN',
		'MENYEDIAKAN PERKHIDMATAN MAKAN','MENYEDIAKAN PERKHIDMATAN MEMBU','MENYEDIAKAN PERKHIDMATAN MENCE',
		'MENYEDIAKAN PERKHIDMATAN PENGU','MENYEDIAKAN PERKHIDMATAN SEWAA','MENYEMBUR DAN MENGECAT',
		'MEREKA, MENGHASILKAN DAN MEMAS','NO 99 JALAN AMPANG','OFF JALAN MERU','OFF JALAN SEMENYIH',
		'OFF JALAN SERUDING 59','ONLINE AND OFFLINE RETAIL AND ','OTHER FOOD SERVICE ACTIVITIES.',
		'OVERSEAS UNION GARDEN,','PA SYSTEM','PADANG MENORA','PAKAIAN, MAKANAN DAN MINUMAN, ','PANDAN INDAH,',
		'PANDAN JAYA','PARIT MESJID','PARIT SULONG','PELANGI INDAH, OFF JALAN MERU',
		'PEMADAM KEBAKARAN, PAKAIAN SER','PEMBAIKAN DAN PENYELENGGARAAN ',
		'PEMBEKAL AIS','PEMBELIAN, PENJUALAN, PENYEWAA','PEMBERSIHAN TAPAK BANGUNAN','PEMBORONG & PEMBEKAL PAKAIAN, ',
		'PEMBUATAN KONKRIT PRATUANGAN, ','PENCETAKAN','PENERBITAN','PENGURUSAN EVENT','PENYELENGGARAAN DAN PEMBAIKAN ',
		'PENYUNTINGAN VIDEO, PRODUKSI M','PERABOT DAN KELENGKAPAN RUMAH,',
		'PERALATAN DAN KELENGKAPAN TELE','PERALATAN KESELAMATAN JALAN RA','PERALATAN SUKAN','PERKHIDMATAN  KATERING',
		'PERKHIDMATAN ANDAMAN','PERKHIDMATAN CUCI KENDERAAN','PERKHIDMATAN DAN  PEMBUATAN KE',
		'PERKHIDMATAN HARTANAH, REKA BE','PERKHIDMATAN KEJURUTERAAN','PERKHIDMATAN MEMBERSIH KAWASAN',
		'PERKHIDMATAN MENCUCI BANGUNAN ','PERKHIDMATAN PEMBERSIHAN BANGU','PERKHIDMATAN PEMBERSIHAN DAN P',
		'PERKHIDMATAN PENGANGKUTAN','PERKHIDMATAN PENGANGKUTAN DARA','PERKHIDMATAN PENGHANTARAN BARA',
		'PERKHIDMATAN PENGURUSAN, PERKH','PERKHIDMATAN PENYELENGGARAAN, ','PERKHIDMATAN PERUNDINGAN PENGU',
		'PERKHIDMATAN SEWA KERETA','PERKHIDMATAN TELEKOMUNIKASI','PERMAS JAYA','PERMATANG PAUH','PERNIAGAAN ATAS TALIAN',
		'PERNIAGAAN MAKANAN DAN MINUMAN','PERSIARAN KEWAJIPAN','PERSIARAN PM/7','PERSIARAN RAJA MUDA MUSA,',
		'PERUNCITAN DAN PEMBORONG PRODU','PHOTOGRAPHY','POKOK SENA','PORT KLANG','PRODUCTION','PRODUK KECANTIKAN',
		'PRODUK KESIHATAN','PRODUKSI VIDEO, PRODUKSI FILEM','PROPERTIES RENTAL INCLUDING HI','PUCHONG','PUCHONG JAYA',
		'PUSAT BANDAR','PUSAT HENTIAN KAJANG,','PUSAT LATIHAN','PUSAT PERINDUSTRIAN SG CHUA,','PUSAT PERINDUSTRIAN SUNGAI CHU',
		'RAWANG MUTIARA BUSINESS CENTRE','RELAU','RENOVATIONS','RESTAURANT','RESTORAN MAKANAN SEGERA , REST',
		'ROTI, KEK DAN BISKUT','RUMAH PENGINAPAN','SALES AND MARKETING','SALES CONSULTANT','SAUJANA IMPIAN',
		'SECRETARIAL SUPPORT SERVICES','SEK 3, TAMAN KINRARA','SEKSYEN 15,','SEKSYEN 16','SEKSYEN 18',
		'SEKSYEN 31, KOTA KEMUNING','SEKSYEN 9, BANDAR MAHKOTA','SEMENYIH SENTRAL','SEMINAR','SENTUL PASAR',
		'SERI MANJUNG BUSINESS CENTRE','SEWAAN KANOPI','SG MERAB','SKUDAI,','SOUND AND LIGHTING SYSTEM',
		'SRI DAMANSARA, KEPONG','STAGE AND TENT','STATIONARY','SUBANG BESTARI, SEKSYEN U5','SUBANG JAYA','SUBANG PERDANA',
		'SUNGAI ARA','SUNGAI MANGGIS','SUNGAI NIBONG','SUNGAI RAMBAI','SUNGAI RENGIT,','SUNWAYMAS COMMERCIAL CENTRE',
		'SUPPLY STATIONARY','TAILORING','TALENTS/MODEL/ACTOR/ACTRESS','TAMAN AIR BIRU','TAMAN AMAN','TAMAN AMANPUTRA,',
		'TAMAN BAGAN,','TAMAN BAHAGIA','TAMAN BAYAM,','TAMAN BAYU PERDANA,','TAMAN BCB','TAMAN BERTAM INDAH',
		'TAMAN BUKIT CHERAS','TAMAN BUKIT KEMPAS','TAMAN BUKIT MALURI, KEPONG','TAMAN BUKIT MUTIARA','');

		return $data;
	}
#----------------------------------------------------------------------------------------------------------#
#===========================================================================================================
}