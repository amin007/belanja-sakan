<?php
# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_am';
$pilihJadual = 'jadual_bootstrap';
//$pilihJadual = 'ubah_medan01'; # borang biodata berasaskan table
//$pilihJadual = 'ubah_medan02'; # borang ubah berasaskan bootstrap

# untuk kod baru
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';

# papar hasil carian
$cari1 = '&nbsp;|&nbsp;'; $cari2 = '';
/*foreach ($this->carian as $kunci => $nilai)
	$cari1 .= ( count($this->carian)==0 ) ? $nilai : $nilai . ' | ';/*/
foreach ($this->senarai as $kunci2 => $nilai2)
	$cari2 .= ( count($nilai2)==0 ) ? $kunci2 . " = Kosong<br>\r"
	: $kunci2 . ' = ' . count($nilai2) . "<br>\r";
//echo "Anda mencari = $cari1\r<br>$cari2\r<hr>\r";//*/
echo '<a class="btn btn-primary" href="'
. URL . 'belian/google2">Tambah Baru</a>' . "\n";

//if(!isset($this->cariID))
//	echo '<h1>data kosong daa</h1>';
//else # jenis template
	include $this->template . '.php';
#-------------------------------------------------------------------------------
//echo '<pre>$c1='; print_r($this->c1); echo '</pre>';
//echo '<pre>$_meta='; print_r($this->_meta); echo '</pre>';