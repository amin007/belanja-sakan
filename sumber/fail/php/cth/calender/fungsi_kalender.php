<?php
#-------------------------------------------------------------------------------------------------
	function calendar($m, $y, $timezone = 'Asia/Kuala_Lumpur')
	{# http://solletec.com/very-simple-php-calendar/
	#---------------------------------------------------------------------------------------------
		# set your default timezone here
		$date = new DateTime('now', new DateTimeZone($timezone));
		$today = array('d' => $date->format('d'),
			'm' => $date->format('m'),
			'y' => $date->format('Y')
		);
		$date->setDate($y, $m, 1);
	#---------------------------------------------------------------------------------------------
		# make title of month
		$monthTitle = ''
		. '<th><a class="prev" href="?m='
			. $date->modify('-1 month')->format('n')
			. '&amp;y=' . $date->format('Y') . '">&#9664;</a></th>'
		. '<th colspan="5" class="text-center">'
			. $date->modify('0 month')->format('F Y')
		. '</th>'
		. '<th><a class="next" href="?m='
			. $date->modify('+1 month')->format('n')
			. '&amp;y='.$date->format('Y').'">&#9654;</a></th>'
		. '';
	#---------------------------------------------------------------------------------------------
		$month = array(
			'this_month_start_dow' => $date->modify('-1 month')->format('w'),
			'this_month_days' => $date->format('t'),
			'prev_month_days' => $date->modify('-1 month')->format('t')
		);
		$day_ctr = -1;
		$days_arr = array();
		$days_arr = susunTarikh($m,$y,$today,$month,$day_ctr,$days_arr);
	#---------------------------------------------------------------------------------------------
		$calendar = paparTarikh($monthTitle,$days_arr);
	#---------------------------------------------------------------------------------------------
		return $calendar;
	}
#-------------------------------------------------------------------------------------------------
	function paparTarikh($monthTitle,$days_arr)
	{
		$calendar = ''//'<table class="calendar">'
		. '<table class="table">'
		//. '<tr class="month-heading">' . $monthTitle . '</tr>'
		. '<tr>' . $monthTitle . '</tr><tr>'
		//. '<tr class="week-heading">'
		. '<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>'
		. '</tr><tr>';
		# create the grid
		foreach ($days_arr as $k => $day)
		{
			$calendar .= (($k) % 7 == 0 ? '</tr><tr>' : '') . $day;
		}$calendar .= '</tr></table>';

		return $calendar;
	}
#-------------------------------------------------------------------------------------------------
	function susunTarikh($m,$y,$today,$month,$day_ctr,$days_arr)
	{
	#---------------------------------------------------------------------------------------------
		# previous month
		if ($month['this_month_start_dow'] > 0)
		{
			for ($i = $month['this_month_start_dow'] - 1; $i >= 0; $i--)
			{
				$day_ctr += 1;
				$class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ?
					'weekend-day other-month' : 'other-month';# Sat/Sun
				$days_arr[] = '<td class="' . $class . '">'
				. ($month['prev_month_days'] - $i)
				. '</td>';
			}
		}
	#---------------------------------------------------------------------------------------------
		# current month
		for ($i = 1; $i <= $month['this_month_days']; $i++)
		{
			$day_ctr += 1;
			$class = ($day_ctr % 7 == 5 || $day_ctr % 7 == 6) ?
				'weekend-day' : '';# Sat/Sun
			$class .= ($i == $today['d']
				&& $m == $today['m']
				&& $y == $today['y']) ?
				' today' : '';# today
			$days_arr[] = '<td class="' . $class . '">' . $i . '</td>';
		}
	#---------------------------------------------------------------------------------------------
		# next month
		if (count($days_arr) % 7 != 0)
		{
			for ($i = 1; $i <= count($days_arr) % 7; $i++)
			{
				$day_ctr += 1;
				$class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ?
					'weekend-day other-month' : 'other-month';# Sat/Sun
				$days_arr[] = '<td class="' . $class . '">' . $i . '</td>';
			}
		}
	#---------------------------------------------------------------------------------------------
		return $days_arr;
	#---------------------------------------------------------------------------------------------
	}
#-------------------------------------------------------------------------------------------------
	function tajukBulan($date)
	{
		# make title of month
		$monthTitle =
		'<th><a class="prev" href="?m='
			. $date->modify('-1 month')->format('n')
			. '&amp;y=' . $date->format('Y') . '">&#9664;</a></th>'
		. '<th colspan="5" class="big">'
			. $date->modify('+1 month')->format('F Y')
		. '</th>'
		. '<th><a class="next" href="?m='
			. $date->modify('+1 month')->format('n')
			. '&amp;y='.$date->format('Y').'">&#9654;</a></th>';

		return $monthTitle;
	}
#-------------------------------------------------------------------------------------------------
##################################################################################################
#-------------------------------------------------------------------------------------------------
	function showmonth($month, $year, $tarikh)
	{# https://www.codeproject.com/Tips/661698/Simple-Calendar
	#---------------------------------------------------------------------------------------------
	$first_day = mktime(0,0,0,$month, 1, $year);  // Here we generate the first day of the month
	$title = date('F', $first_day);               // This gets us the month name
	$day_of_week = date('D', $first_day);         // day of week for 1st day of month
	#---------------------------------------------------------------------------------------------
	switch($day_of_week)
	{# blank days before months first day
		case "Sun": $blankdays = 0; break;
		case "Mon": $blankdays = 1; break;
		case "Tue": $blankdays = 2; break;
		case "Wed": $blankdays = 3; break;
		case "Thu": $blankdays = 4; break;
		case "Fri": $blankdays = 5; break;
		case "Sat": $blankdays = 6; break;
	}
	#---------------------------------------------------------------------------------------------
	$days_in_month = cal_days_in_month(0, $month, $year);# days in the month
	$papar = '';
	$papar .= '<table class="excel">';#table table-bordered
	$papar .= "\n\t" . '<tr><th colspan="7" class="text-center">';
	$papar .= " $title $year </th></tr>";
	$papar .= "\n\t" . '<tr class="text-center">';
	//foreach(array('S','M','T','W','T','F','S' as $namaHari):
	foreach(array('A','I','S','R','K','J','S') as $namaHari):
		$papar .= '<td width=90>' . $namaHari . '</td>';
	endforeach;
	$papar .= "</tr>";
	#---------------------------------------------------------------------------------------------
	$day_count = 1;
	$blank_cnt =  $blankdays;
	$papar .= "\n\t<tr>";
	#---------------------------------------------------------------------------------------------
	while ( $blank_cnt > 0 )# blank day table cells
	{
		$papar .= "<td>&nbsp;</td>";
		$blank_cnt--;
		$day_count++;
	}
	#---------------------------------------------------------------------------------------------
	$day_num = 1;# day number
	$cnt = $blankdays;# skip blank days in first week
	$today = date('d');
	#---------------------------------------------------------------------------------------------
	while ( $day_num <= $days_in_month )
	{# count days until done
		if ($cnt==7) {$cnt = 0;};
		while ($cnt < 7)
		{
			//$papar .= "<td>$day_num</td>";
			$papar .= semakTarikh($day_num,$tarikh,$month,$year,$cnt);
			$day_num++;
			$day_count++;
			$cnt++;
			if ($day_num > $days_in_month) {break;}
			if ($cnt == 7) { $papar .= "</tr>\n\t<tr>"; }
		}
	}
	#---------------------------------------------------------------------------------------------
	while ( $cnt > 1 && $cnt <=6 )
	{# continue with $cnt for end of month blank days
		$papar .= "<td>&nbsp;</td>";
		$cnt++;
	}if ($cnt == 7) { $papar .= "</tr>"; }
	#---------------------------------------------------------------------------------------------
	$papar .= "\n\t</table>";
	return $papar;
	}# end of function
#-------------------------------------------------------------------------------------------------
	function semakTarikh($day_num,$tarikh,$month,$year,$cutiminggu)
	{
		$hariini = $tarikh['harian'];
		$bulanini = $tarikh['bulanan'];
		$hri = str_pad($day_num, 2, '0', STR_PAD_LEFT);
		$bln = str_pad($month, 2, '0', STR_PAD_LEFT);
		$semak = $hri.'/'.$bln;
		$style = 'style="text-align:center;background-color:#000000;color:#ffffff"';
		$style2 = 'style="text-align:center;background-color:#cccccc;color:#000000"';
		if($day_num == $hariini && $month == $bulanini):
			//$p = '<td class="text-center"><strong>'.$day_num.'</strong></td>';
			$p = '<td class="text-center">'.$day_num.'</td>';
		elseif(in_array($cutiminggu,array('5','6'))):#hari jumaat dan sabtu
			$p = '<td '.$style2.'>'.$day_num.'</td>';
		elseif(
			in_array($semak,array('24/01','25/02','25/03','25/04','23/05','25/06',
			'25/07','22/08','25/09','17/10','25/11','18/12'))
			):#tarikh gaji
			$p = '<td '.$style.'><strong>'
			.$day_num.'<br>Gaji</strong></td>';
		elseif(
			in_array($semak,array('21/01','05/02','06/02',/*thn baru cina*/
			'23/03','01/05','06/05','19/05','05/06','06/06','11/08','31/08',
			'01/09','09/09','16/09','05/10',
			'27/10','09/11','25/12'/*krismas*/))
			):#cuti umum
			$p = '<td '.$style.'><i>'.$day_num.'<br>'
			.cutiUmum($semak).'</i></td>';
		else:
			$p = '<td class="text-center">'.$day_num.'</td>';
		endif;

		return $p;
	}//*/
#-------------------------------------------------------------------------------------------------
	function cutiUmum($semak)
	{# Cuti Umum Johor 2019 ->https://publicholidays.com.my/ms/johor/2019-dates/
		if($semak == '21/01') $cu = 'Thaipusam';#21 Jan	Isnin	Hari Thaipusam
		if($semak == '05/02') $cu = 'CNY';#5 Feb	Selasa	Tahun Baru Cina
		if($semak == '06/02') $cu = 'CNY';#6 Feb	Rabu	Tahun Baru Cina Hari Kedua
		if($semak == '23/03') $cu = 'Keputeraan Sultan Johor';
			#23 Mac	Sabtu	Hari Keputeraan Sultan Johor
		if($semak == '01/05') $cu = 'Pekerja';#1 Mei	Rabu	Hari Pekerja
		if($semak == '06/05') $cu = 'Awal Ramadan';#6 Mei	Isnin	Awal Ramadan
		if($semak == '19/05') $cu = 'Wesak';#19 Mei	Ahad	Hari Wesak
		if($semak == '05/06') $cu = 'Raya Puasa';#5 Jun	Rabu	Hari Raya Aidilfitri
		if($semak == '06/06') $cu = 'Raya Puasa';#6 Jun	Khamis	Hari Raya Aidilfitri Hari Kedua
		if($semak == '11/08') $cu = 'Haji';#11 Ogos	Ahad	Hari Raya Haji
		if($semak == '31/08') $cu = 'Merdeka';#31 Ogos	Sabtu	Hari Kebangsaan
		if($semak == '01/09') $cu = 'Muharam';#1 Sep	Ahad	Awal Muharram/Cuti Hari Kebangsaan
		if($semak == '09/09') $cu = 'Agong';#9 Sep	Isnin	Hari Keputeraan YDP Agong
		if($semak == '16/09') $cu = 'Msia';#16 Sep	Isnin	Hari Malaysia
		if($semak == '05/10') $cu = 'Hol';#5 Okt	Sabtu	Hari Hol Almarhum Sultan Iskandar
		if($semak == '27/10') $cu = 'Dewali';#27 Okt	Ahad	Hari Deepavali
		if($semak == '09/11') $cu = 'Maulidur';#9 Nov	Sabtu	Maulidur Rasul
		if($semak == '25/12') $cu = 'Krismas';#25 Dis	Rabu	Hari Krismas
		#
		/*'30/05','31/05',pesta keamatan
		'01/06','02/06',hari gawai
		*/
		return $cu;
	}
#-------------------------------------------------------------------------------------------------
	function warnaTD($a)
	{
		$p[] = 'class="table-active"';
		$p[] = 'class="table-primary"';
		$p[] = 'class="table-secondary"';
		$p[] = 'class="table-success"';
		$p[] = 'class="table-danger"';
		$p[] = 'class="table-warning"';
		$p[] = 'class="table-info"';
		$p[] = 'class="table-light"';
		$p[] = 'class="table-dark"';

		return $p[$a];
	}
#-------------------------------------------------------------------------------------------------