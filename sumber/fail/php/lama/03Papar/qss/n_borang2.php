<?php if( isset($this->bentukJadual01[0]) ): ?>
<form id="form1" name="form1" method="post" action="pengguna_dalam/kemaskini/borang/borangA_proses.php">
<!-- ************************************************************************************************************************************ -->
<table width="99%" border="0" align="center" id="tbl2">
<tr>
	<td colspan="9" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN A: HASIL (Tidak termasuk CBP)</b></div></td>
</tr>
<tr>
	<td align="left" bgcolor="#FFFF99" class="textdescrp1"><strong>1. HASIL</strong></td>
	<!-- td width="202" bgcolor="#FFFF99"><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<!-- td width="196" bgcolor="#FFFF99"><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
<?php foreach(pilihBulan($this->suku) as $papar):?>
	<td bgcolor="#FFFF99" align="center"><?php echo $papar ?></td>
<?php endforeach; ?>
</tr>
<tr>
	<td align="left" class="textdescrp2" >1.1 Hasil kendalian / Perolehan / Jualan
	<a href="nota/nota-1.php?a=315&b=01&c=49" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
	<i class="fas fa-info-circle"></i></a></td>
<?php
//$ulang = array('F0007a','F0007b','F0007c','F0007d','F0008a','F0008b','F0008c','F0008d');
$ulang = array('F0007a','F0007b','F0007c','F0007','F0008a','F0008b','F0008c','F0008');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td align="left" class="textdescrp2">1.2 Pendapatan lain
	<a href="nota/nota-1-3.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
	<i class="fas fa-info-circle"></i></a></td>
<?php
//$ulang = array('F0009a','F0009b','F0009c','F0009d','F0010a','F0010b','F0010c','F0010d');
$ulang = array('F0009a','F0009b','F0009c','F0009','F0010a','F0010b','F0010c','F0010');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td height="28" align="left" class="textdescrp1">1.3 JUMLAH HASIL</td>
<?php
//$ulang = array('F0011a','F0011b','F0011c','F0011d','F0012a','F0012b','F0012c','F0012d');
$ulang = array('F0011a','F0011b','F0011c','F0011','F0012a','F0012b','F0012c','F0012');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" 
		style="width:120px;text-align:right;background-color:#e1e4e2;"
		value="<?php //echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999" readonly/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td colspan="1" height="53" align="left" class="textdescrp2">
	1.4 Catatan<!-- Jika jumlah hasil yang dilaporkan untuk suku tahun ini meningkat<br>
	atau menurun sekurang-kurangnya 30% berbanding suku tahun<br>
	sebelumnya,	sila nyatakan sebab berlakunya perbezaan tersebut. -->
	</td>
	<td colspan="6" align="left">
		<textarea name="hasil_a" id="hasil_a" cols="100" rows="3"
		style="resize:none;" tabindex="9">KERETA SEDANG DI BAIK PULIH SEPANJANG BULAN MAC</textarea>
	</td>
</tr>
<tr>
	<td colspan="9" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN B: PERBELANJAAN (Tidak termasuk CBP)</b></div></td>
</tr>
<tr>
	<td align="left" bgcolor="#FFFF99" class="textdescrp1"><strong>2. PERBELANJAAN</strong></td>
	<!-- td width="202" bgcolor="#FFFF99"><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<!-- td width="196" bgcolor="#FFFF99"><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
<?php foreach(pilihBulan($this->suku) as $papar):?>
	<td bgcolor="#FFFF99" align="center"><?php echo $papar ?></td>
<?php endforeach; ?>
</tr>
<tr>
	<td align="left" class="textdescrp2">2.1 Perbelanjaan kendalian / Kos Jualan
		<a href="nota/nota-2-1.php?b=01" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<i class="fas fa-info-circle"></i></a>
	</td>
<?php $ulang = array('F0013a','F0013b','F0013c','F0013','F0014a','F0014b','F0014c','F0014');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td align="left" class="textdescrp2">2.2 Perbelanjaan lain
		<a href="nota/nota-2-3.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<i class="fas fa-info-circle"></i></a>
	</td>
<?php $ulang = array('F0015a','F0015b','F0015c','F0015','F0016a','F0016b','F0016c','F0016');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td align="left" class="textdescrp2">2.3 Jumlah Gaji & Upah
		<a href="nota/nota-2-4.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<i class="fas fa-info-circle"></i></a>
	</td>
<?php $ulang = array('F0017a','F0017b','F0017c','F0017','F0018a','F0018b','F0018c','F0018');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td height="31" align="left" class="textdescrp1"><span class="textdescrp2">2.4 JUMLAH PERBELANJAAN</span></td>
<?php $ulang = array('F0019a','F0019b','F0019c','F0019','F0020a','F0020b','F0020c','F0020');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
$suku = kiraJika($ulang,$this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $suku ?><br>
		<input type="text" id="<?php echo $papar ?>" 
		style="width:120px;text-align:right;background-color:#e1e4e2;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
</tr>
<tr>
	<td colspan="1" height="60" align="left" class="textdescrp2">
	2.5 Jika jumlah perbelanjaan yang dilaporkan untuk suku tahun ini meningkat<br>
	atau menurun sekurang-kurangnya 30% berbanding suku tahun<br>
	sebelumnya,	sila nyatakan sebab berlakunya perbezaan tersebut.
	</td>
	<td colspan="6" align="left">
		<textarea name="perbelanjaan_b" id="perbelanjaan_b" cols="100" rows="3" 
		style="resize:none;" tabindex="20">KERETA SEDANG DI BAIK PULIH SEPANJANG BULAN MAC</textarea>
	</td>
</tr>
<tr>
	<td colspan="9" bgcolor="#FFFF99"><div align="center"><b>BAHAGIAN C: BILANGAN PEKERJA (Pada akhir suku tahun)</b></div></td>
</tr>
<tr>
	<td align="left" bgcolor="#FFFF99" class="textdescrp1">&nbsp;</td>
	<!-- td width="202" bgcolor="#FFFF99"><div align="center">Suku Tahun (4S 2017)<br />1 Oktober - 31 Disember 2017</div></td -->
	<!-- td width="196" bgcolor="#FFFF99"><div align="center">Suku Tahun (1S 2018)<br />1 Januari - 31 Mac 2018</div></td -->
<?php foreach(pilihBulan($this->suku) as $papar):?>
	<td bgcolor="#FFFF99" align="center"><?php echo $papar ?></td>
<?php endforeach; ?>
</tr>
<tr>
	<td height="27" align="left" class="textdescrp1"><strong>3. JUMLAH PEKERJA</strong> &nbsp;
		<a href="nota/nota-3.php" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
		<i class="fas fa-info-circle"></i></a>
	</td>
<?php $ulang = array('F0021a','F0021b','F0021c');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $papar ?><br>
		<input type="text" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php endforeach; ?>
	<td><?php echo paparFont($this->bentukJadual01[0],'F0021');?><br>
		<input  name="f2122c_p" type="text" id="f2122c_p" 
		style="width:120px;text-align:right;" tabindex="21"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
<?php $ulang = array('F0022a','F0022b','F0022c');
foreach ($ulang as $papar):
$jumlah = jumlah($this->bentukJadual01[0],$papar);
?>
	<td align="left"><?php echo $papar ?><br>
		<input type="text" style="width:120px;text-align:right;"
		value="<?php echo $jumlah ?>"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
		</div>
	</td>
<?php endforeach; ?>
	<td><?php echo paparFont($this->bentukJadual01[0],'F0022');?><br>
		<input name="f2122c_c" type="text" id="f2122c_c"
		style="width:120px;text-align:right;" tabindex="22"
		onblur="this.value=addCommas(this.value);info_pekerja_A();"
		class="auto" data-v-max="999999999999" data-v-min="-9999999999999"/>
	</td>
</tr>
<tr>
	<td colspan="1" height="60" align="left" class="textdescrp2">
	3.1 Jika jumlah pekerja yang dilaporkan untuk suku tahun ini meningkat<br>
	atau menurun sekurang-kurangnya 30% berbanding suku tahun<br>
	sebelumnya,	sila nyatakan sebab berlakunya perbezaan tersebut.
	</td>
	<td colspan="6" align="left">
		<textarea name="pekerja_c" id="pekerja_c" cols="90" rows="3" 
		style="resize:none;" tabindex="23"></textarea >
	</td>
</tr>
</table>
<?php
	$ulang = stafGaji('Staf &  Gaji',$this->bentukJadual01[0]);
	//echo '<pre>'; print_r($ulang); echo '</pre>';
	$html = new \Aplikasi\Kitab\Html_Table;
	foreach ($ulang as $myTable => $row):
		$html->papar_jadual($row, $myTable, $pilih = '1', $classTable = null);
	endforeach;//*/

# jika $this->bentukJadual01[0] tidak wujud
else: echo "\n" . '<hr>Data tidak wujud<hr>' . "\n";
endif;
?>

<div class='menu1' style='display: none'>
<button id="btnHide">X</button><br/>
Check number 0003 / 0005 <br/>
</div>
<div class='menu2' style='display: none'>
<button id="btnHide2">X</button><br/>
Check number 0010 / 0011 <br/>
</div>
<div class='menu3' style='display: none'>
<button id="btnHide3">X</button><br/>
Check number 0002 / 0004 <br/>
</div>
<div class='menu4' style='display: none'>
<button id="btnHide4">X</button><br/>
Check number 0012 / 0013 <br/>
</div>
<div class='menu5' style='display: none'>
Check number 0074 <br/>
</div>
<div class='error30percent' id="hasilkurang" style='display: none'>
Penurunan Jumlah Hasil kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="hasilmelebihi" style='display: none'>
Kenaikan Jumlah Hasil melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="belanjakurang" style='display: none'>
Penurunan Jumlah Perbelanjaan kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="belanjamelebihi" style='display: none'>
Kenaikan Jumlah Perbelanjaan melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="kerjakurang" style='display: none'>
Penurunan Jumlah Perbelanjaan kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<div class='error30percent' id="kerjamelebihi" style='display: none'>
Kenaikan Jumlah Pekerja melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut. <br/>
</div>
<style>
.menu1 {
   
    position:fixed;
    border: 1px solid black;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
}
.menu2 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:60px;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
	
}
.menu3 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:120px;
    right:1%;
	padding:5px 5px;
	background-color:red;
	color:white;
	
}
.menu4 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:180px;
    right:1%;
	padding:5px 5px;
	background-color:#bffcc0;
	color:black;
	
}
.menu5 {
   
    position:fixed;
    border: 1px solid black;
    background: #fff;
	margin-top:120px;
    right:1%;
	padding:5px 5px;
	background-color:red;
	color:white;
	
}
.error30percent
{
   
    position:relative;
    border: 1px solid black;
    background: #fff;
	margin-top:0px;
	text-align:center;
	padding:5px 5px;
	background-color:#7E0E0E;
	color:white;
	border-color:#F00;
	font-size:12px; font-weight:100;
	font-family: "Helvetica Neue", Arial, "Liberation Sans", FreeSans, sans-serif;
	
}

</style>
</form>