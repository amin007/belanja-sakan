<?php include 'atas/diatas.php'; ?>

<div class="container">
<hr><h1>Ruangtamu - Kita Tanya Apa Khabar</h1><hr>
<div class="hero-unit">

	<a class="btn btn-primary btn-large" href="#">Pergi Lebih Jauh<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->
<br>
<?php include 'fungsi_kalender.php'; ?>
<?php 
$bulan = 1;
$tahun = 2019;

echo calendar($bulan , $tahun); ?>
<br>
<table class="table table-bordered table-hover">
<thead class="thead-dark">
<tr>
	<th>ahad</th><th>isnin</th><th>selasa</th><th>rabu</th><th>khamis</th><th>jumaat</th><th>sabtu</th>
</tr>
</thead><!-- / class="thead-dark" -->
</table>


<?php
$hari = 7;
$bulan = 1;
$tahun = 2019;
$number = cal_days_in_month(CAL_GREGORIAN, $bulan , $tahun); // 31
echo "There were {$number} days in {$bulan} {$tahun}<br>";

$jd=gregoriantojd($bulan,$hari,$tahun);
$namaHari = jddayofweek($jd,2);
$namaBulan = jdmonthname($jd,1);
echo "$hari-$bulan-$tahun : $namaHari | $namaBulan";
?>


<?php include 'atas/dibawah.php'; ?>