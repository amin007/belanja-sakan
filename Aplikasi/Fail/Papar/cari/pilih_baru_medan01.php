<?php
$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>';
//. "\r" . '<span class="badge">' . count($row) . '</span>';
//echo "\n<hr>$tajukjadual";
$html->medanCarian(
	array($this->_method, $myTable, $this->senarai, $this->cariID, $this->_jadual)
	);
for ($kira=0; $kira < count($row); $kira++)
{	foreach ( $row[$kira] as $key=>$data )
	{## papar data $row ----------------------------------------------------------
		$dataType = $this->_meta[$myTable][$key]['type'];
		$namaKey = "$key|$dataType";
	## ---------------------------------------------------------------------------
		?><div class="form-group row"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-2 control-label text-right"><?php
		echo $namaKey ?></label><?php echo "\n\t";
		?><div class="<?php echo $class2 ?>"><?php
		$paparData = $html->ubahInput2($this->bentukJadual01,
			$this->_meta, $myTable,$kira, $key, $data);
		echo "\n\t\t" . $paparData . "\n\t";
		?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
		?></div><!-- / class="form-group" --><?php echo "\n";
	}## --------------------------------------------------------------------------
}
?>
