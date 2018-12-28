<!-- h1> Ini Template Borang </h1 -->
<?php
//$html = new Aplikasi\Kitab\Borang01_Tambah;
$html = new Aplikasi\Kitab\BrgBaru01;
$aksi = URL . $this->_method . '/baruSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
#----------------------------------------------------------------------------------------------------
if(isset($this->senarai))
	echo "\n" . '<form method="POST" action="' . $aksi . '" class="form-horizontal">';
#----------------------------------------------------------------------------------------------------
foreach($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		include 'pilih_' . $pilihJadual . '.php';
	}#if ( count($row)==0 )
}
#----------------------------------------------------------------------------------------------------
if(isset($this->senarai))
{
	$html->medanHantar($this->myTable, $class1);
	echo "\n" . '</form><!-- / class="form-horizontal" -->';
}
#----------------------------------------------------------------------------------------------------
/*<!-- / class="container" -->*/ ?>
