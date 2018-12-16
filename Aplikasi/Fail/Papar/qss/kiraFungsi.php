<?php
#-----------------------------------------------------------------------------------------------
function setNilaiAwal($bentukJadual01,$bentukJadual02)
{
	$respon = (isset($bentukJadual01['F0002'])) ? $bentukJadual01['F0002'] : null;
	$newss = (isset($bentukJadual01['newss'])) ? $bentukJadual01['newss'] : null;
	$nama_pertubuhan = (isset($bentukJadual01['nama_pertubuhan'])) ?
		$bentukJadual01['nama_pertubuhan'] : null;
	$msic2008 = (isset($bentukJadual01['msic2008'])) ? $bentukJadual01['msic2008'] : null;
	$F1201 = (isset($bentukJadual01['F1201'])) ? $bentukJadual01['F1201'] : null;
	# tatasusunan yang lain
	$fe = (isset($bentukJadual02['fe2018'])) ? $bentukJadual02['fe2018'] : null;
	$utama = (isset($bentukJadual02['bbu_sbu'])) ? $bentukJadual02['bbu_sbu'] : null;
	# gabung tatasusunan yang lain
	$kp = (isset($bentukJadual02['kp'])) ? $bentukJadual02['kp'] : null;
	$kp2 = (isset($bentukJadual02['msic2008'])) ? $bentukJadual02['msic2008'] : null;
	$subsektor = (isset($bentukJadual02['subsektor'])) ? $bentukJadual02['subsektor'] : null;
	$industri = $kp . '|' . $kp2 . '|' . $subsektor;
	$alamat1 = (isset($bentukJadual02['alamat1'])) ? $bentukJadual02['alamat1'] : null;
	$alamat2 = (isset($bentukJadual02['alamat2'])) ? $bentukJadual02['alamat2'] : null;
	$poskod = (isset($bentukJadual02['poskod'])) ? $bentukJadual02['poskod'] : null;
	$bandar = (isset($bentukJadual02['bandar'])) ? $bentukJadual02['bandar'] : null;
	$alamat = $industri . "\n" . $alamat1 . ' ' . $alamat2 . ' ' . $poskod . ' ' . $bandar;

	return array($respon,$newss,$nama_pertubuhan,$msic2008,$F1201,$fe,$utama,$subsektor,$alamat);
}
#-----------------------------------------------------------------------------------------------
function paparTR($bentukJadual01,$bentukJadual02)
{
	$ulang = array('kod_negeri'=>'Kod&nbsp;Negeri',
	'pusat_operasi'=>'Pusat&nbsp;Operasi',
	'strata'=>'Strata',
	);
	foreach ($ulang as $papar => $lihat):
		echo "\n\t\t" . '<tr><td bgcolor="#e9e7e9">' . $lihat . '</td><td>'
		. jumlah($bentukJadual01,$papar) . '</td></tr>';
	endforeach;
	$ulang = $papar = $lihat = null;
	$ulang = array(
		'kp'=>'Kod Survei',
		'msic_asal'=>'Kod&nbsp;Industri',
		'cara_terima'=>'Cara Terima Borang',
		);
	foreach ($ulang as $papar => $lihat):
		echo "\n\t\t" . '<tr><td bgcolor="#e9e7e9">' . $lihat . '</td><td>'
		. jumlah($bentukJadual02,$papar) . '</td></tr>';
	endforeach;
	//*/
}
#-----------------------------------------------------------------------------------------------
function jumlah($bentukJadual01,$papar)
{
	return (isset($bentukJadual01[$papar])) ?
	$bentukJadual01[$papar] : 0;
}
#-----------------------------------------------------------------------------------------------
function paparFont($bentukJadual01,$key)
{
	$data = (isset($bentukJadual01[$key])) ? $bentukJadual01[$key] : '&nbsp;';
	$font = $key . '|<font color="red">' . $data . '</font>';

	return $font;
}
#-----------------------------------------------------------------------------------------------
function kiraJika($ulang,$bentukJadual01,$key)
{
	if ( in_array($key,array($ulang[3],$ulang[7])) )
		$font = kiraJumlah($bentukJadual01,$key);
	else
		$font = $key . '|<font color="blue">'
		. jumlah($bentukJadual01,$key) . '</font>';

	return $font;
}
#-----------------------------------------------------------------------------------------------
function kiraJumlah($bentukJadual01,$key)
{
	$blnA = jumlah($bentukJadual01,$key . 'a');
	$blnB = jumlah($bentukJadual01,$key . 'b');
	$blnC = jumlah($bentukJadual01,$key . 'c');
	$kira = $blnA + $blnB + $blnC;
	$font = $key . '|<font color="red">' . $kira . '</font>';

	return $font;
}
#-----------------------------------------------------------------------------------------------
function stafGaji($namajadual,$data)
{
	$ulang[$namajadual][] = array('Kategori'=>'(a)Pemilik',
		'Bil'=>'01',
		'Lelaki'=>$data['F1601'],
		'Perempuan'=>$data['F1701'],
		'Staf'=>$data['F1801'],
		'Jumlah Gaji'=>null);
	$ulang[$namajadual][] = array('(b)Pekerja bergaji(sepenuh masa)',
		'02',$data['F1602'],$data['F1702'],$data['F1802'],$data['F1902']);
	$ulang[$namajadual][] = array('Kategori'=>'(c)Pekerja bergaji(sambilan)',
		'03',$data['F1603'],$data['F1703'],$data['F1803'],$data['F1903']);
	$ulang[$namajadual][] = array('Kategori'=>'()Jumlah(a+b+c)',
		'99',$data['F1699'],$data['F1799'],$data['F1899'],$data['F1999']);
	return $ulang;
}
#-----------------------------------------------------------------------------------------------
	/*//echo "\n" . '<table class="table table-bordered table-sm">';
	echo "\n" . '<table class="excel">';
	foreach($ulang as $key): echo "\n" . '<tr>';
		foreach($key as $val):
			echo '<td>' . $val . '</td>';
		endforeach; echo '</tr>';
	endforeach;
	echo '</table>';*/
#-----------------------------------------------------------------------------------------------
function paparData($bentukJadual01,$papar)
{
	return (isset($bentukJadual01[$papar])) ?
	'&nbsp;&nbsp;&nbsp;' . $bentukJadual01[$papar] . '&nbsp;&nbsp;&nbsp;'
	: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
#-----------------------------------------------------------------------------------------------
function pilihTajuk($suku)
{
	$sukuDuluBM = array(1=>'ST4',2=>'ST1',3=>'ST2',4=>'ST3');
	$sukuDuluBI = array(1=>'Q4',2=>'Q1',3=>'Q2',4=>'Q3');
	$sukuDuluTempoh[1] = '1 Oktober - 31 Disember ';
	$sukuDuluTempoh[2] = '1 Januari - 31 Mac  ';
	$sukuDuluTempoh[3] = '1 April - 30 Jun ';
	$sukuDuluTempoh[4] = '1 Julai - 31 September ';
	$sukuKiniBM = array(1=>'ST1',2=>'ST2',3=>'ST3',4=>'ST4');
	$sukuKiniBI = array(1=>'Q1',2=>'Q2',3=>'Q3',4=>'Q4');
	$sukuKiniTempoh[1] = '1 Januari - 31 Mac ';
	$sukuKiniTempoh[2] = '1 April - 30 Jun ';
	$sukuKiniTempoh[3] = '1 Julai - 31 September ';
	$sukuKiniTempoh[4] = '1 Oktober - 31 Disember 2018 ';

	return array($sukuDuluBM[$suku],$sukuDuluBI[$suku],$sukuDuluTempoh[$suku],
	$sukuKiniBM[$suku],$sukuKiniBI[$suku],$sukuKiniTempoh[$suku]);
}
#-----------------------------------------------------------------------------------------------
function paparTajuk($suku)
{
	list($sukuDuluBM,$sukuDuluBI,$sukuDuluTempoh,
	$sukuKiniBM,$sukuKiniBI,$sukuKiniTempoh) = pilihTajuk($suku);
	$tahun = '2018';
	echo '<td colspan="4" align="center">'
	. "\n\t\t" . '<strong>SUKU TAHUN (' . $sukuDuluBM . '&nbsp;' . $tahun . ')</strong>'
	. "\n\t\t" . '/<i>QUARTER(' . $sukuDuluBI . '&nbsp;' . $tahun . ')</i>'
	. "\n\t\t" . '<br>' . $sukuDuluTempoh . '</td>'
	. "\n\t" . '<td colspan="4" align="center">'
	. "\n\t\t" . '<strong>SUKU TAHUN (' . $sukuKiniBI . '&nbsp;' . $tahun . ')</strong>'
	. "\n\t\t" . '/<i>QUARTER(' . $sukuKiniBI . '&nbsp;' . $tahun . ')</i>'
	. "\n\t\t" . '<br>' . $sukuKiniTempoh . '</div></td>';
}
#-----------------------------------------------------------------------------------------------
function pilihBulan($suku)
{
	$ulangSuku[1] = array('Okt 2017','Nov 2017','Dis 2017','&nbsp;4S 2017','Jan 2018','Feb 2018','Mac 2018','&nbsp;1S 2018');
	$ulangSuku[2] = array('Jan 2018','Feb 2018','Mac 2018','&nbsp;1S 2018','Apr 2018','Mei 2018','Jun 2018','&nbsp;2S 2018');
	$ulangSuku[3] = array('Apr 2018','Mei 2018','Jun 2018','&nbsp;2S 2018','Jul 2018','Ogo 2018','Sep 2018','&nbsp;3S 2018');
	$ulangSuku[4] = array('Jul 2018','Ogo 2018','Sep 2018','&nbsp;3S 2018','Okt 2018','Nov 2018','Dis 2018','&nbsp;4S 2018');
	return $ulangSuku[$suku];
}
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------