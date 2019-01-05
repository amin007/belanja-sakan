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
	function showmonth($month, $year)
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
	$papar .= '<table class="table">';
	$papar .= "\n\t" . '<tr><th colspan="7" class="text-center">';
	$papar .= " $title $year </th></tr>";
	$papar .= "\n\t" . '<tr>';
	$papar .= '<td width=42>S</td>';
	$papar .= '<td width=42>M</td>';
	$papar .= '<td width=42>T</td>';
	$papar .= '<td width=42>W</td>';
	$papar .= '<td width=42>T</td>';
	$papar .= '<td width=42>F</td>';
	$papar .= '<td width=42>S</td>';
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
			$papar .= ($day_num == $today) ?
				"<td>|$day_num|</td>"
				:"<td>$day_num</td>";
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
	}
	#---------------------------------------------------------------------------------------------
	$papar .= "\n\t</table>";
	return $papar;
	}# end of function
#-------------------------------------------------------------------------------------------------
	function warnaTD($a)
	{
		$p[] = 'class="table-active"';
		$p[] = 'class="table-primary"';
		$p[] = 'class="table-secondary"';
		$p[] = 'class="table-success"';
		$p[] = 'class="table-danger"';
		$p[] = 'class="table-warning"';
		$p[] = '<td class="table-info"';
		$p[] = 'class="table-light"';
		$p[] = '<td class="table-dark"';

		return $p[$a];
	}
#-------------------------------------------------------------------------------------------------