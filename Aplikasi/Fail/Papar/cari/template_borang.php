<!-- h1> Ini Template Borang </h1 -->
<?php
//$html = new Aplikasi\Kitab\Borang01_Tambah;
$html = new Aplikasi\Kitab\BrgBaru01;
$aksi = URL . $this->_method . '/baruSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6 '; # untuk $data

echo "\n";?><br>
<br><span class="border border-secondary">
<form method="POST" action="<?php echo $aksi ?>" class="form-horizontal">
<?php echo "\n";
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		include 'pilih_' . $pilihJadual . '.php';
	}#if ( count($row)==0 )
}
echo '<hr>';
$html->medanHantar($this->myTable, $class1);
/*<!-- / class="container" -->*/ ?>
</form><!-- / class="form-horizontal" -->
</span><!-- / class="border border-secondary" --><br>

<div class="spinner-border" role="status">
	<span class="sr-only">Loading...</span>
</div>