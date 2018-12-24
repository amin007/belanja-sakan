<?php
$bootstrapCSS_413 = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css';
 $ceruleanCSS_413 = 'https://maxcdn.bootstrapcdn.com/bootswatch/4.1.3/cerulean/bootstrap.min.css';
 $fontawesome_510 = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Belanja Sakan</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo $bootstrapCSS_413 ?>" rel="stylesheet" type="text/css">
<link href="<?php echo $fontawesome_510 ?>" rel="stylesheet" type="text/css">

<style type="text/css">
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:11px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align: top;
}
table.excel tbody th { text-align:center; vertical-align: top; }
table.excel tbody td { vertical-align:bottom; }
table.excel tbody td
{
	padding: 0 3px; border: 1px solid #aaaaaa;
	background:#ffffff;
}
.fa-input {font-family: FontAwesome}
</style>
</head>
<body>

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

<!-- Footer
================================================== -->
<footer class="footer">
	<div class="container">
		<span class="label label-info">
		&copy; Hak Cipta Terperihara 2018. Theme Asal Bootstrap Twitter
		</span>
	</div>
</footer>

<!-- khas untuk jquery dan js2 lain
<?php
      $jquery_cdn = 'https://code.jquery.com/jquery-2.2.3.min.js';
 $bootstrapJS_413 = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js';
?>
================================================== -->
<script type="text/javascript" src="<?php echo $jquery_cdn ?>"></script>
<script type="text/javascript" src="<?php echo $bootstrapJS_413 ?>"></script>
</body>
</html>
