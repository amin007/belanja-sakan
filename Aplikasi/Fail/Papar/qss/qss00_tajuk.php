<table width="961" align="center" height="20">
<tr><td height="20" colspan="4" align="left" >
	<p><div class="textdescrp"></div></p>
</td></tr>
<tr style="display:none;">
	<td colspan="4" align="left" height="20" >
		<input type="hidden" name="nosiri" id="nosiri" value="" />
		<input type="hidden" name="kod" id="kod" value="01" />
		Kod Respon<input type="text" name="kod_respon" id="kod_respon" size="4"/>
		Status<input type="text" name="cara_terima" id="cara_terima" size="8" />
		<input  name="get_lang" id="get_lang" type="hidden" />
	</td>
</tr>
<tr height="0">
	<td width="400" align="left" valign="top" class="textdescrp2">No. SSM:</td>
	<td align="left" valign="top">
		<!-- input type="text" name="no_ssm" id="no_ssm" value="" disabled="disabled" />
		<input type="hidden" name="iduser" id="iduser" value="" / -->
		<form class="mx-2 my-auto d-inline w-50" action="<?php echo URL ?>qss/temui/400/1/-16" method="POST">
			No.&nbsp;Pendaftaran Syarikat /Perniagaan&nbsp;
			<input type="text" name="cari"
			value="<?php echo $newss ?>"
			placeholder="Cari Newss / Nama" class="form-control" />
		</form><!-- / class="form-inline" -->
	</td>
	<td width="400" rowspan="4" align="left">
		<table width="108" align="center">
		<!-- tr><td width="98" bgcolor="#FF0000"><div align="center"><em>Error</em></div></td></tr>
		<tr><td bgcolor="#bffcc0"><div align="center"><em>Force Accept</em></div></td></tr -->
		<tr><td bgcolor="#87ceeb" align="center">Respon:<?php echo $respon ?></td></tr>
		<tr><td bgcolor="#87ceeb" align="center">FE:<?php echo $fe ?></td></tr>
		</table><br>
		<table border="1" id="maklumat">
		<tr><td bgcolor="#e9e7e9">No Siri</td><td><?php echo $newss ?></td></tr>
		<tr><td bgcolor="#e9e7e9">Suku&nbsp;Tahun</td><td>1</td></tr>
		<tr><td bgcolor="#e9e7e9">Tahun</td><td>2018</td></tr>
		<tr><td bgcolor="#e9e7e9">BBU/SBU</td><td><?php echo $utama ?></td></tr>
		</table>
	</td>
	<td width="400" rowspan="4" align="left">
		<table border="1" id="maklumat"><?php
		if( isset($this->bentukJadual01[0]) && isset($this->bentukJadual02[0]) )
		paparTR($this->bentukJadual01[0],$this->bentukJadual02[0]);
		?></table>
	</td>
</tr>
<tr>
	<td align="left" class="textdescrp2">Syarikat :</td>
	<td align="left"><input type="text" name="msic" value="<?php echo $nama_pertubuhan ?>"
	maxlength="60" size="60" disabled="disabled"></td>
</tr>
<tr>
	<td align="left" class="textdescrp2">Kod Industri Asal :</td>
	<td align="left"><input type="text" name="msic" id="msic"
	value="<?php echo $msic2008 ?>"
	maxlength="60" size="60" disabled="disabled"></td>
</tr>
<tr>
	<td align="left" class="textdescrp2">Kod Industri Baru :</td>
	<td align="left"><input name="msic_baru" type="text"
	value="<?php echo $F1201 ?>"
	maxlength="60" size="60" disabled="disabled"></td>
</tr>
<tr>
	<td align="left" class="textdescrp2">&nbsp;</td>
	<td align="left"><textarea name="msic_desc" id="msic_desc" cols="70" rows="3" style="resize:none;"
	disabled="disabled"><?php echo $alamat ?></textarea></td>
</tr>
</table>
<!-- ************************************************************************************************************************************ -->