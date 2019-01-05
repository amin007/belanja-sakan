<?php include 'atas/diatas.php'; ?>
<br>
<?php include 'fungsi_kalender.php';
echo  '<br>(3 / 3) = ' . (3 / 3) . ' |(3 % 3) = ' . (3 % 3) . "\n";
echo  '<br>(6 / 3) = ' . (6 / 3) . ' |(6 % 3) = ' . (6 % 3) . "\n";
echo  '<br>(9 / 3) = ' . (9 / 3) . ' |(9 % 3) = ' . (9 % 3) . "\n";
echo '<br>(12 / 3) = ' . (12 / 3) . '|(12 % 3) = ' . (12 % 3) . "\n";
//*/?>
<table class="table">
<tr><?php
$tahun = 2019;
$setahun = array(1,2,3,4,5,6,7,8,9,10,11,12);
foreach($setahun as $bulan):
	echo "\n\t<td class=\"text-center\">"
	. "\n\t<!-- *********************************************************************** -->\n\t"
	. showmonth($bulan,$tahun)
	. "\n\t<!-- *********************************************************************** -->\n\t"
	. '</td>';
	//echo "\n\t<td text-center>Bulan " . $bulan . '</td>';
	echo ($bulan % 3 == '0') ? "\n</tr>\n<tr>" : "";
endforeach;
?></tr>
</table>

<?php include 'atas/dibawah.php'; ?>