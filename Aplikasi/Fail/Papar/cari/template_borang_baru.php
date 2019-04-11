<!-- h1> Ini Template Borang Baru </h1 -->
<table border="1" class="table"><tr><td>
<!--  mula - senarai borang baru ------------------------------------------------------------------------------- -->
<?php
//$html = new Aplikasi\Kitab\Borang01_Tambah;
$html = new Aplikasi\Kitab\BrgBaru01;
$aksi = URL . $this->_method . '/baruSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data

foreach($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
#----------------------------------------------------------------------------------------------------
		$html->medanCarian(
			array($this->_method, $myTable, $this->senarai, $this->cariID, $this->_jadual)
			);
		echo "\n" . '<form method="POST" action="' . $aksi . '" class="form-horizontal">' . "\n";
		include 'b_baru/pilih_' . $pilihJadual . '.php';
		$html->medanHantar($this->myTable, $class1);
		echo "\n<!-- ========================================================================="
		. "======================== -->\n" . '</form><!-- / class="form-horizontal" -->' . "\n";
#----------------------------------------------------------------------------------------------------
	}#if ( count($row)==0 )
}
/*<!-- / class="container" -->*/
?>
<!--  mula - senarai borang baru ------------------------------------------------------------------------------- -->
</td>
<td>
<!--  mula - senarai jadual yang ada --------------------------------------------------------------------------- -->
<?php
foreach($this->bentukJadual01 as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
#----------------------------------------------------------------------------------------------------
		$tajukjadual = $myTable;
		include 'pilih_jadual_am.php';
		//include 'pilih_jadual_bootstrap.php';
#----------------------------------------------------------------------------------------------------
	}#if ( count($row)==0 )
}
?>
<!-- tamat - senarai jadual yang ada --------------------------------------------------------------------------- -->
</td></tr></table>