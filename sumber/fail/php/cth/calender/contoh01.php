<?php include 'atas/diatas.php'; ?>

<div class="container">
<hr><h1>Ruangtamu - Kita Tanya Apa Khabar</h1><hr>
<div class="hero-unit">

	<a class="btn btn-primary btn-large" href="#">Pergi Lebih Jauh<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->
<br>
<?php include 'fungsi_kalender.php'; ?>
<table class="table">
<tr><?php
$tahun = 2019;
$setahun = array(1,2,3,4,5,6,7,8,9,10,11,12);
foreach($setahun as $bulan):
	echo "\n\t<td text-center>" . calendar($bulan,$tahun) . '</td>';
	echo ($bulan % 3 == '0') ? "</tr>\n<tr>\n" : "";
endforeach;
?></tr>
</table>
<br>
<table class="table table-bordered table-hover">
<thead class="thead-dark">
<tr>
	<th>ahad</th><th>isnin</th><th>selasa</th><th>rabu</th><th>khamis</th><th>jumaat</th><th>sabtu</th>
</tr>
</thead><!-- / class="thead-dark" -->
</table>

<?php
/*echo  '<br>(3 / 3) = ' . (3 / 3) . ' |(3 % 3) = ' . (3 % 3) . "\n";
echo  '<br>(6 / 3) = ' . (6 / 3) . ' |(6 % 3) = ' . (6 % 3) . "\n";
echo  '<br>(9 / 3) = ' . (9 / 3) . ' |(9 % 3) = ' . (9 % 3) . "\n";
echo '<br>(12 / 3) = ' . (12 / 3) . '|(12 % 3) = ' . (12 % 3) . "\n";
#----------------------------------------------------------------------------------------------------------
$hari = 7;
$bulan = 1;
$tahun = 2019;
$number = cal_days_in_month(CAL_GREGORIAN, $bulan , $tahun); // 31
echo "<br>There were {$number} days in {$bulan} {$tahun}<br>";

$jd=gregoriantojd($bulan,$hari,$tahun);
$namaHari = jddayofweek($jd,2);
$namaBulan = jdmonthname($jd,1);
echo "$hari-$bulan-$tahun : $namaHari | $namaBulan";//*/
?>
<?php include 'atas/dibawah.php'; ?>