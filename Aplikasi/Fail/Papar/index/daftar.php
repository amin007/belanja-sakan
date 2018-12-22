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

<!-- Jadual nama_pengguna ########################################### -->
<br><br><br>
<div class="container">
<div class="form-group row"><div class="col-sm-8">
	<div class="input-group input-group-lg">
		<div class="input-group-prepend"><span class="input-group-text">
		Daftar Pengguna
		</span></div>
	</div>
</div></div>
<form method="POST" action="<?php echo URL ?>login/registerid"
class="form-horizontal">
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Nama Pengguna</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group-lg">
			<input type="text" name="nama_pengguna[namaPengguna]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : user1
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Kata Laluan</label>
	<div class="col-sm-6 ">
		<input type="password" name="nama_pengguna[kataLaluan]"
			 placeholder="Taip kata laluan" class="form-control">
		<input type="password" name="nama_pengguna[kataLaluanX]"
			 placeholder="Taip lagi sekali" class="form-control">
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Nama Penuh</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[Nama_Penuh]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : Polan Bin Polan
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[email]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : user1@duduk.mana
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">No. Tel. Pintar</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[nohp]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : 012345678
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<div class="col-sm-8">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="submit" name="Simpan" value="Daftar" class="btn btn-primary btn-large">
		</span>
		</div>
	</div>
</div></form>
<!-- / class="form-horizontal" -->
</div><!-- / class="container" -->
<!-- Jadual nama_pengguna ########################################### -->
<!-- menu tengah bawah -->
<!-- Footer
================================================== -->
<!-- footer class="footer">
	<div class="container">
		<span class="label label-info">
		&copy; Hak Cipta Terperihara 2016. Theme Asal Bootstrap Twitter
		</span>
	</div>
</footer -->

<!-- khas untuk jquery dan js2 lain
<?php
      $jquery_cdn = 'https://code.jquery.com/jquery-2.2.3.min.js';
 $bootstrapJS_413 = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js';
?>
================================================== -->
<script type="text/javascript" src="<?php echo $jquery_cdn ?>"></script>
<script type="text/javascript" src="<?php echo $bootstrapJS_413 ?>"></script>
<script type="text/javascript">
// kod jquery global
	$(document).ready(function(){
		/* ---------- Text editor ---------- */
		$('.cleditor').cleditor();

		/* ---------- Datapicker ---------- */
		$('.date-picker').datepicker();

		/* ---------- Choosen ---------- */
		$('[data-rel="chosen"],[rel="chosen"]').chosen();

		/* ---------- Placeholder Fix for IE ---------- */
		$('input, textarea').placeholder();

		/* ---------- Auto Height texarea ---------- */
		$('textarea').autosize();
		
		/* ---------- Masked Input ---------- */
		$("#date").mask("99/99/9999");
		$("#phone").mask("(999) 999-9999");
		$("#tin").mask("99-9999999");
		$("#ssn").mask("999-99-9999");
		
		$.mask.definitions['~']='[+-]';
		$("#eyescript").mask("~9.99 ~9.99 999");
		
		/* ---------- Textarea with limits ---------- */
		$('#limit').inputlimiter({
			limit: 10,
			limitBy: 'words',
			remText: 'You only have %n word%s remaining...',
			limitText: 'Field limited to %n word%s.'
		});
		
		/* ---------- Timepicker for Bootstrap ---------- */
		$('#timepicker1').timepicker();
		
		/* ---------- DateRangepicker for Bootstrap ---------- */
		$('#daterange').daterangepicker();
		
		/* ---------- Bootstrap Wysiwig ---------- */
		$('.editor').wysiwyg();
		
		/* ---------- Colorpicker for Bootstrap ---------- */
		$('#colorpicker1').colorpicker();	
	});
</script>
</body>
</html>
