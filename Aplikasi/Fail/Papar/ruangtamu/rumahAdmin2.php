<?php include 'atas4.1.3/diatas.php'; ?>

<div class="container">
<hr><h1>Admin2home - Kita Tanya Apa Khabar</h1><hr>
<hr><h2>Untuk Projek HIES sahaja</h2><hr>
<div class="hero-unit">
<p><?php
$Sesi = new \Aplikasi\Kitab\Sesi();
$Sesi->init();
//echo '<pre>'; print_r($_SESSION); echo '</pre>';
echo 'namaPendek=' . $Sesi->get('bs_namaPendek') . '<br>';
echo 'namaPenuh=' . $Sesi->get('bs_namaPenuh') . '<br>';
echo 'email=' . $Sesi->get('bs_email') . '<br>';
echo 'nohp=' . $Sesi->get('bs_nohp') . '<br>';
echo 'levelPengguna=' . $Sesi->get('bs_levelPengguna') . '<br>';
echo 'url=' . URL . '';
//*/
?></p>

	<a class="btn btn-primary btn-large" href="<?php echo URL ?>admin2home/logout">Keluar<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-success btn-large" href="<?php echo URL ?>dapatan">Dapatan<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-danger btn-large" href="<?php echo URL ?>belian">Belian<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-warning btn-large" href="<?php echo URL ?>semakan">Semakan<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<?php include 'atas4.1.3/dibawah.php'; ?>