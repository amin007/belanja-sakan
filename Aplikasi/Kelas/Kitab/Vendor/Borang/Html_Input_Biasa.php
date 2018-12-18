<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Html_Input
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
#------------------------------------------------------------------------------------------
	public static function dropmenuInsert($tabline, $jenisData)
	{
		$input2 = '';
		$tatasusunan = @explode(',', $jenisData);
		foreach ($tatasusunan as $key => $value)
		{
			$input2 .= $tabline;
			$input2 .= ($key==0) ? '<option>' :
				'<option value="' . $value . '">';
			$input2 .= ucfirst($value);
			$input2 .= '</option>';
		}

		return $input2;
	}
#------------------------------------------------------------------------------------------
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($myTable, $senarai, $cariID, $_jadual) = $pindah;
		$this->atasLabelSyarikat();
		list($mencari, $carian, $mesej) = $this->atasSemakData($senarai, $cariID, $_jadual);
		$this->atasInputCarian($mencari, $carian, $mesej, $class);
	}
#------------------------------------------------------------------------------------------
	public function atasSemakData($senarai, $cariID, $_jadual)
	{
		if(isset($senarai['kes'][0]['newss'])):
			# set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = $cariID;
			$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
			list($namaSyarikat, $semak1, $semak3) = explode("|", $senarai['kes'][0]['nama']);
			?><nav class="floating-menu">
			<p class="bg-primary">
			<?php echo "\n&nbsp;" . $namaSyarikat ?>
			</p></nav>
			<?php
		else: # set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = null;
			$mesej = '::' . $cariID . ' tiada dalam ' . $_jadual;
		endif;

		return array($mencari, $carian, $mesej);
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n";
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">Jadual <?php echo $myTable ?></span>
		</div>
	</div>
</div><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large">
			<input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large">
		</span>
		</div>
	</div>
</div><?php
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}