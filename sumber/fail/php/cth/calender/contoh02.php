<?php include 'atas/diatas.php'; ?>
<?php include 'fungsi_kalender.php';
$tarikh['harian'] = date('d');
$tarikh['bulanan'] = date('m');
$tarikh['tahunan'] = date('Y');
//echo '$harian=' . $tarikh['harian'] . '|$bulanan=' . $tarikh['bulanan'] . '|$tahunan=' . $tarikh['tahunan'];
/*echo  '<br>(3 / 3) = ' . (3 / 3) . ' |(3 % 3) = ' . (3 % 3) . "\n";
echo  '<br>(6 / 3) = ' . (6 / 3) . ' |(6 % 3) = ' . (6 % 3) . "\n";
echo  '<br>(9 / 3) = ' . (9 / 3) . ' |(9 % 3) = ' . (9 % 3) . "\n";
echo '<br>(12 / 3) = ' . (12 / 3) . '|(12 % 3) = ' . (12 % 3) . "\n";
//*/?>
<div align="center">
<table>
<tr><?php
$tahun = 2019;
$setahun = array(1,2,3,4,5,6,7,8,9,10,11,12);
foreach($setahun as $bulan):
	echo "\n\t<td class=\"align-top\">"
	. "\n\t<!-- *********************************************************************** -->\n\t"
	. showmonth($bulan,$tahun,$tarikh)
	. "\n\t<!-- *********************************************************************** -->\n\t"
	. "</td>\n\t<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	//echo "\n\t<td text-center>Bulan " . $bulan . '</td>';
	echo ($bulan % 3 == '0') ? "\n</tr>\n<tr>" : "";
endforeach;
?></tr>
</table></div><!-- align="center" -->

<?php include 'atas/dibawah.php'; ?>