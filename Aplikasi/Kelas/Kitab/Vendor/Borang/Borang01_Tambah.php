<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Borang01_Tambah
{
#==========================================================================================
###########################################################################################
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($method, $myTable, $senarai, $cariID, $_jadual) = $pindah;

		if($method == 'biodata'):
			$this->medanTajuk($myTable, $class);
		elseif($method == 'rangka'):
		else:
			$this->medanTajuk($myTable, $class);
			/*$this->atasLabelSyarikat();
			list($mencari, $carian, $mesej) =
				$this->atasSemakData($senarai, $cariID, $_jadual);
			$this->atasInputCarian($mencari, $carian, $mesej, $class);*/
		endif;
	}
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n"; $class = 'col-sm-8';
?><div class="container">
<div class="form-group"><div class="<?php echo $class ?>">
	<div class="input-group input-group-lg">
	<span class="input-group-addon">Jadual <?php echo $myTable ?></span>
	</div>
</div></div>
</div><br><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
		$class = 'col-sm-8';
		?><div class="form-group">
	<div class="<?php echo $class ?>">
		<!--label for="inputSubmit" class="col-sm-3 control-label"><?=$myTable?></label -->
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large">
			<!-- input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large" -->
		</span>
		</div>
	</div>
</div><?php
	}
#------------------------------------------------------------------------------------------
	public function atasLabelSyarikat()
	{
		echo "\n"; ?><style>
.floating-menu {
	padding: 5px;; width: 300px; z-index: 100;
	position: fixed; bottom: 0px; right: 0px;
}
</style><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function atasSemakData($senarai, $cariID, $_jadual)
	{
		if(isset($senarai['kes'][0]['newss'])):
			# set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = $cariID;
			$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
			else: # set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = null;
			$mesej = '::' . $cariID . ' tiada dalam ' . $_jadual;
		endif;

		return array($mencari, $carian, $mesej);
	}
#------------------------------------------------------------------------------------------
	public function atasInputCarian($mencari, $carian, $mesej, $class)
	{
		echo "\n";?><div class="container">
<form method="GET" action="<?=$mencari;?>" class="form-inline" autocomplete="off">
<div class="form-group">
	<label for="carian"><h1>Ubah Kawalan<?=$mesej?></h1></label>
	<div class="input-group">
		<input type="text" name="cari" value="<?=$carian;?>"
		class="form-control" id="inputString"
		onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon"><input type="submit" value="mencari"></span>
	</div>
</div>
<div class="suggestionsBox" id="suggestions" style="display: none;">
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br><?php echo "\n";
	}
###########################################################################################
#------------------------------------------------------------------------------------------
	public function ubahInput($paparSahaja,$jadual,$kira,$key,$data)
	{	# istihar pembolehubah
		$name = 'name="' . $jadual . '[' . $key . ']"';
		$dataType = myGetType($data);
		# css
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();

		//if ( in_array($key,array(...)) )
		if(in_array($key,array('nota','nota_prosesan','catatan','CatatNota')))
			$input = $this->inputTextarea($tab2, $name, $data); #kod utk textarea
		elseif ( in_array($key,array('password','kataLaluan')) )
			$input = $this->inputPassword($tab2, $tab3, $name, $data, 
				$classInput, $komenInput, $jadual, $key);
		elseif(in_array($key,dpt_senarai('jadual_biodata2') )) #senarai medan untuk biodata
			$input = $this->inputBiodata($tab2, $tab3, $name, $data, 
				$classInput, $komenInput);
		elseif ( in_array($key,array('keterangan')) ) # kod html untuk bukan input type
			$input = $this->inputJadual($paparSahaja);
		elseif(in_array($key,array('hasil','belanja','bilpekerja','gaji',
			'hartatetap','stokakhir','staf','aset','stok')))
			$input = $this->inputNumber($tab2, $tab2, $name, $data,
				$classInput, $komenInput);
		elseif ( in_array($key,array('lawat','terima','hantar','hantar_prosesan')) )
			$input = $this->inputTarikh($tab2, $tab2, $name, $data,
				$classInput, $komenInput, $jadual, $key);
		elseif(in_array($key,array('no','batu','jalan','tmn_kg','daerah')))
			$input = $this->inputAlamatBaru($tab2, $tab3, $name, $data, 
				$classInput, $komenInput);
		elseif(in_array($key,array('namax','emailx','responden','fe',
			'mko','respon')))
			$input = $this->inputTeksBesar($tab2, $tab3, $name, $data, 
				$classInput, $komenInput);
		elseif(in_array($key,array('pecah5P')))
			$input = $this->inputTeksTakData($tab2, $tab3, $name);
		else
		{#kod untuk lain2
			$input = $tab2 . '<p class="form-control-static text-info">' 
				   . $data . '</p>';
		}

		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
	public function ubahInput2($jenis,$jadual,$kira,$key,$data)
	{	# istihar pembolehubah
		$name = 'name="' . $jadual . '[' . $key . ']"';
		$dataType = $jenis[$key]['type'];// myGetType($data);
		$semua = array($jenis,$jadual,$kira,$key,$data,$name);
		# css
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		//if ( in_array($key,array(...)) )
		if( in_array($key,array('password','kataLaluan')) )
			$input = $this->inputPassword($this->css(),$semua);
		/*elseif(in_array($dataType,array('VAR_STRING')))
			$input = $this->inputTeksBesar($this->css(),$semua);
		/*elseif(in_array($dataType,array('BLOB')))
			$input = $this->inputTextarea($this->css(),$semua); #kod utk textarea
		elseif ( in_array($dataType,array('DATE')) )
			$input = $this->inputTarikh($this->css(),$semua);
		elseif(in_array($dataType,array('NUMBER')))
			$input = $this->inputNumber($this->css(),$semua);//*/
		else
		{#kod untuk lain2
			$input = $tab2 . '<p class="form-control-static text-info">'
				   . $data . '</p>';
		}

		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function ccs()
	{
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang 
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$classInput = 'input-group input-group';
		$komenInput = '<!-- / "input-group input-group" -->';

		return array($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,$classInput,$komenInput);
	}
#------------------------------------------------------------------------------------------
	function labelBawah($data)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$input2 = ($data==null) ? '' :
				'<span class="input-group-addon">'
				. $data . '</span>'
				. $tab2;

		return $input2;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function inputTextarea($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,$classInput,$komenInput)
			= $this->css();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return ''
		. '<textarea ' . $name . ' rows="1" cols="20"' . $tab2 
		. ' class="form-control">' . $data . '</textarea>'
		. $tab2 . '<pre>' . $data . '</pre>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputPassword($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$jadual, $key)
	{
		$name2 = 'name="' . $jadual . '[' . $key . 'X]"';

		return ''
		//'<div class="input-group input-group-sm">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="password" ' . $name	. $tab3 
		. ' placeholder="Taip kata laluan" class="form-control">'
		. '<input type="password" ' . $name2 . $tab3 
		. ' placeholder="Taip lagi sekali" class="form-control">'
		//. $tab2 . '</div>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputBiodata($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{
		return $tab2 
		. '<div class="'.$classInput.'">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="text" ' . $name  . ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . $this->labelBawah($data)
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputNumber($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{
		return '<div class="input-group input-group-sm">' . $tab2
		. '<span class="input-group-addon">Nilai</span>'
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">' . $tab2
		. '<span class="input-group-addon">' . kira($data) . '</span>'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTarikh($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$jadual, $key)
	{
		#terima - style="font-family:sans-serif;font-size:10px;"
		$X = 'name="' . $jadual . '[' . $key . 'X]"';
		$dataX = ($key=='hantar_prosesan') ?
			'<input type="checkbox" ' . $X . ' value="x"> Utk Prosesan : ' . $data
			: '<input type="checkbox" ' . $X . ' value="x"> ' . $data;

		return '<div class="input-group input-group-sm">' . $tab3
		. '<span class="input-group-addon">' . $dataX . '</span>' . $tab3
		. '<input type="date" ' . $name //. 'class="input-date tarikh" readonly>'
		. ' value="' . $data . '"'
		. $tab3 . ' class="form-control date-picker"'
		. $tab3 . ' placeholder="Cth: 2014-05-01"'
		. $tab3 . ' id="date' . $key . '" data-date-format="yyyy/mm/dd"/>'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputAlamatBaru($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{			
		return '<div class="input-group input-group">' . $tab3
		. '<span class="input-group-addon">' . $data . '</span>' . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksBesar($semua,$css)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,$classInput,$komenInput)
			= $css;
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		#kod utk input text saiz besar
		return '<div class="input-group input-group-lg">' . $tab3
		. '<span class="input-group-addon">' . $data . '</span>' . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksKecil($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{
		#kod utk input text saiz besar
		return '<div class="input-group input-group-sm">' . $tab3
		. '<span class="input-group-addon">' . $data . '</span>' . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksTakData($tab2, $tab3, $name)
	{
		#kod utk input text saiz besar
		return ''
		//'<div class="input-group input-group">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="text" ' . $name
		. ' class="form-control">'
		//. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputJadual($paparSahaja)
	{
		//echo '$paparSahaja-><pre>'; print_r($paparSahaja) . '<pre>';
		//var_export($paparSahaja) . '<pre>';
		# set nama class untuk jadual
		$jadual1 = ' table-striped'; # tambah zebra
		$jadual2 = ' table-bordered';
		$jadual3 = ' table-hover';
		$jadual4 = ' table-condensed';
		$classJadual = 'table' . $jadual4 . $jadual3;
		$header = $id = null;

		foreach ($paparSahaja as $myTable => $bilang)
		{# mula ulang $bilang
			//echo "<h1>$myTable</h1>";
			Html_Table::papar_jadual($bilang, $myTable, 
			$pilih=5, $classJadual, $header = 'abc', $id);
		}# tamat ulang $bilang //*/
		echo "\n";

		return '';
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}