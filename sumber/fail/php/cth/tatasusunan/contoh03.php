<?php
include 'contoh02.php';
#------------------------------------------------------------------------------------------#
	function cariKhas01($medan1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$mula = 0;
		foreach($medan1 as $key => $nilai0):
		foreach($nilai0 as $key1 => $nilai1):
		foreach($nilai1 as $key2 => $nilai2):
			if($key2 == 'medan')
			{
				$key3[$key1] = $nilai2;
			}
			if($key2 == 'kod')
			{
				$namaMedan = $key3[$key1];
				//echo "<br>\$medanA[$namaMedan][$key1][$key2] = $nilai2\n";
				$medanA[$namaMedan][$mula]['kod'] = $nilai2;
			}
			if($key2 == 'keterangan')
			{
				$namaMedan = $key3[$key1];
				$medanA[$namaMedan][$mula++]['keterangan'] = $nilai2;
			}
		endforeach;endforeach;$mula = 0;endforeach;
		/*$medanB['edagang'][0]['kod'] = '1';
		$medanB['edagang'][0]['keterangan'] = 'ya';
		$medanB['edagang'][1]['kod'] = '2';
		$medanB['edagang'][1]['keterangan'] = 'tidak';*/
		//$medan = array_merge($medan1, $medanA);
		//$this->semakPembolehubah($medan1,'medan1');
		//$this->semakPembolehubah($medanA,'medanA');
		//$this->semakPembolehubah($medanB,'medanB');
		//echo "\n<hr>tamat<hr>\n";
		//*/

		return $medanA;
	}
#------------------------------------------------------------------------------------------#
	function cariKhas02($medan1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		echo "<pre>INSERT INTO kod_borang01(`jadual`,`medan`,`kod`,`keterangan`)\r"
			. "VALUES\r";
		$mula = 0;
		foreach($medan1 as $key => $nilai0):
		foreach($nilai0 as $key1 => $nilai1):
			$a = '';
			echo "('senarai_isirumah','$key',";
		foreach($nilai1 as $key2 => $nilai2):
			//echo "<br>\$medanA[$key][$key1][$key2] = $nilai2\n";
			$a .= "'$nilai2',";
		endforeach;
			echo substr($a,0,-1) . "),\r";
		endforeach;endforeach;
		/*$medanB['edagang'][0]['kod'] = '1';
		$medanB['edagang'][0]['keterangan'] = 'ya';
		$medanB['edagang'][1]['kod'] = '2';
		$medanB['edagang'][1]['keterangan'] = 'tidak';*/
		//echo "\n<hr>tamat<hr>\n";
		//*/

		return $medanA;
	}
#------------------------------------------------------------------------------------------#
	function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakData($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------#

//echo '<pre>'; var_export(tentangMedan()); echo '</pre>';
$medan = tentangMedan();
//semakPembolehubah($medan,'medan');
$medanA = cariKhas02($medan);
semakPembolehubah($medanA,'medanA');