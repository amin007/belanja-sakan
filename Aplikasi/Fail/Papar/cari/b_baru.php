<?php
# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_am';
//$pilihJadual = 'baru_medan00'; # borang baru berasaskan table
//$pilihJadual = 'baru_medan01'; # borang baru berasaskan bootstrap
$pilihJadual = 'baru_medan02'; # borang ubah berasaskan bootstrap

# untuk kod baru
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';
//echo 'template = ' . $this->template . "\r<hr>";//*/

//if(!isset($this->cariID))
//	echo '<h1>data kosong daa</h1>';
//else # jenis template
	include $this->template . '.php';
#---------------------------------------------------------------------------------------
echo '<pre>$meta='; print_r($this->_meta); echo '</pre>';