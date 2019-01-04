<?php
#-------------------------------------------------------------------------------------------------
function calendar($m, $y, $timezone = 'Asia/Kuala_Lumpur')
{# http://solletec.com/very-simple-php-calendar/
#-------------------------------------------------------------------------------------------------
	# set your default timezone here
	$date = new DateTime('now', new DateTimeZone($timezone));
	$today = array('d' => $date->format('d'),
		'm' => $date->format('m'),
		'y' => $date->format('Y')
	);
	$date->setDate($y, $m, 1);
#-------------------------------------------------------------------------------------------------
	$month = array(
		'this_month_start_dow' => $date->modify('-1 month')->format('w'),
		'this_month_days' => $date->format('t'),
		'prev_month_days' => $date->modify('-1 month')->format('t')
	);
	$days_arr = array();
	$day_ctr = -1;
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
	# current month
	for ($i = 1; $i <= $month['this_month_days']; $i++)
	{
		$day_ctr += 1;
		$class = ($day_ctr % 7 == 0 || $day_ctr % 7 == 6) ? 
			'weekend-day' : '';# Sat/Sun
		$class .= ($i == $today['d']
			&& $m == $today['m']
			&& $y == $today['y']) ?
			' today' : '';# today
		$days_arr[] = '<td class="' . $class . '">' . $i . '</td>';
	}
#-------------------------------------------------------------------------------------------------
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
#-------------------------------------------------------------------------------------------------
	$calendar = '
	<table class="calendar">
	<tr class="month-heading">
	<th><a class="prev" href="?m='
		. $date->modify('-1 month')->format('n')
		. '&amp;y=' . $date->format('Y') . '">&#9664;</a></th>'
	. '<th colspan="5" class="big">' 
		. $date->modify('+1 month')->format('F Y') 
	. '</th>'
	. '<th><a class="next" href="?m='
		. $date->modify('+1 month')->format('n')
		. '&amp;y='.$date->format('Y').'">&#9654;</a></th></tr>'
	. '<tr class="week-heading">'
	. '<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>'
	. '</tr><tr>';
#-------------------------------------------------------------------------------------------------
	# create the grid
	foreach ($days_arr as $k => $day) 
	{
		$calendar .= (($k) % 7 == 0 ? '</tr><tr>' : '') . $day;
	}
#-------------------------------------------------------------------------------------------------
	$calendar .= '</tr></table>';
#-------------------------------------------------------------------------------------------------
	return $calendar;
}
#-------------------------------------------------------------------------------------------------