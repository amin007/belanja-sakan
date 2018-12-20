<div class="container">
<div class="hero-unit">
<h1>Sesat daa</h1>
<p><?php echo $this->mesej; ?></p>
<pre><?php 
$url = dpt_url_xfilter();
if( isset($url) )
{
	echo '$url=>'; print_r($url);
}
$namaClass = huruf('Besar',$url[0]);
$namaFungsi = $url[1];
$a = isset($url[2]) ? '$' . $url[2] : '';
$b = isset($url[3]) ? ',$' . $url[3] : '';
$c = isset($url[4]) ? ',$' . $url[4] : '';
$d = isset($url[5]) ? ',$' . $url[5] : '';
$e = isset($url[6]) ? ',$' . $url[6] : '';
$f = isset($url[7]) ? ',$' . $url[7] : '';
$g = isset($url[8]) ? ',$' . $url[8] : '';
$h = isset($url[9]) ? ',$' . $url[9] : '';
$pencam = "$a$b$c$d$e$f$g$h";
?></pre>
</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<div class="container">
<pre><code>
Contoh fungsi dalam class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
#===========================================================================================
class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
class <?php echo $namaClass ?>_Tanya extends \Aplikasi\Kitab\Tanya
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function <?php echo $namaFungsi ?>(<?php echo $pencam ?>)
	{
		//echo '&lt;hr>Nama class :' . __METHOD__ . '()&lt;hr>';
		echo '&lt;pre>$_POST:'; print_r($_POST); echo '&lt;/pre>';//*/
	}
#-------------------------------------------------------------------------------------------
</code></pre>
</div><!-- / class="container" -->