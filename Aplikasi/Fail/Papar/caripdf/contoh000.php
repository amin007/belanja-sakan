<?php
#---------------------------------------------------------------------------------------------------
# File name : contoh000.php
# original file : example_002.php
# Description : Contoh 000 for TCPDF class
#               Letak pembolehubah yang paling asas/simple
# Author: Nicola Asuni
# (c) Copyright:
# Nicola Asuni
# Tecnick.com LTD
# www.tecnick.com
# info@tecnick.com
/*
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 **/
#---------------------------------------------------------------------------------------------------
# create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
require 'atas/diatas.php';
require 'atas/pilih_jadual_bootstrap.php';
#---------------------------------------------------------------------------------------------------
# set pembolehubah
$jadual = ulangTable($this->senarai);
#---------------------------------------------------------------------------------------------------
$jadual = <<<EOD
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
<br>
$jadual
<br>
EOD;

$pdf->writeHTML($jadual, true, false, false, false, '');
#---------------------------------------------------------------------------------------------------
# Close and output PDF document
$pdf->Output('contoh000.pdf', 'I');//*/
#===================================================================================================
# END OF FILE
#===================================================================================================
