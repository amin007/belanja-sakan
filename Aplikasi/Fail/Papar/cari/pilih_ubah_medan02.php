<?php echo "\n";
for ($kira=0; $kira < count($row); $kira++)
{	foreach ( $row[$kira] as $key=>$data )
	{## papar data $row ----------------------------------------------------------
		?><div class="form-group"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-2 control-label"><?php echo $key
		?></label><?php echo "\n\t";
		?><div class="<?php echo $class2 ?>"><?php
		$paparData = contohInput($data);
		echo "\n\t\t" . $paparData . "\n\t";
		?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
		?></div><!-- / class="form-group" --><?php echo "\n";
	}## --------------------------------------------------------------------------
}

function contohInput($data)
{
	$input2 = '<p class="form-control-static text-info">'
			. $data . '</p>';

	return $input2;
}