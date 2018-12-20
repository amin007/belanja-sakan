<div class="container">
<hr><h1>Ruangtamu - Kita Tanya Apa Khabar</h1><hr>
<div class="hero-unit">
<p><?php
$Sesi = new \Aplikasi\Kitab\Sesi();
$Sesi->init();
//echo '<pre>'; print_r($_SESSION); echo '</pre>';
echo 'namaPendek=' . $Sesi->get('bs_namaPendek') . '<br>';
echo 'namaPenuh=' . $Sesi->get('bs_namaPenuh') . '<br>';
echo 'levelPengguna=' . $Sesi->get('bs_levelPengguna') . '<br>';
echo 'url=' . URL . '';
//*/
?></p>

	<a class="btn btn-primary btn-large" href="<?php echo URL ?>ruangtamu/logout">Pergi Lebih Jauh<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-success btn-large" target="_blank" href="<?php echo URL ?>dapatan">Dapatan<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-danger btn-large" target="_blank" href="<?php echo URL ?>belian">Belian<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-warning btn-large" target="_blank" href="<?php echo URL ?>semakan">semakan<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<?php //echo semakDataSesi(); ?>