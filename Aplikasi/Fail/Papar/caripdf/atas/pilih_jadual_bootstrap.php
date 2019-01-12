<?php
#---------------------------------------------------------------------------------------------------
function ulangTable($senarai)
{
	foreach ($senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>'
		. "\r" . '<span class="badge">' . count($row) . '</span>';
		$t = table($tajukjadual,$row);
	} // if ( count($row)==0 )
	return $t;
}
#---------------------------------------------------------------------------------------------------
}
function table($tajukjadual,$row)
{
	$t = '<table border="1" class="table">' . "\n";
	$t .= '<h3>'. $tajukjadual . '</h3>' . "\n";
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			$t .= '<thead><tr><th>#</th>';
			foreach ( array_keys($row[$kira]) as $tajuk )
			{
				$t .= "<th>$tajuk</th>";
			}
			$t .= "</tr></thead>\n";
			$printed_headers = true;
		}
	# papar data $row ------------------------------------------------
	$t .= '<tr><td align="center">' . ($kira+1) . '</td>';
		//$html = new \Aplikasi\Kitab\Html_TD;
		//$html = new \Aplikasi\Kitab\Jadual01;
		foreach ( $row[$kira] as $key=>$data )
		{
			/*$dataKey = $this->_meta[$myTable][$key]['key'];
			$dataType = $this->_meta[$myTable][$key]['type'];
			$semua = array($key,$data,$dataKey,$dataType,
			$this->_meta,$this->c1,$this->c2);
			//$t .= $html::paparData($semua);//*/
			$t .= "<th>$data</th>";
			//$html::gaya01($dataType,$data);
		}
	$t .= "</tr>\n";
	}#-----------------------------------------------------------------
	$t .= "</table>\n";

	return $t;
}
#---------------------------------------------------------------------------------------------------