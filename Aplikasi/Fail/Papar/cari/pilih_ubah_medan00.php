	<table class="excel">
	<?php
	$class = $a = $b = null;
	$html = new \Aplikasi\Kitab\HTML_Input_Biasa();
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row ------------------------------------------------
	?><tbody><?php
		foreach ( $row[$kira] as $key=>$data )
		{
			?><tr><td align="right"><?php echo $key ?></td><?php
			$paparData = $html->addInput($class, $myTable,
			$a, $b, $key, $data);
			?><td><?php echo $paparData ?></td><?php
			?><td><?php echo $data ?></td><?php
			?></tr><?php echo "\n\t";
		}
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>
