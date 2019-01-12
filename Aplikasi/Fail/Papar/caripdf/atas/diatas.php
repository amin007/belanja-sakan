<?php
# Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
#---------------------------------------------------------------------------------------------------
# create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
/*
echo '<br>PDF_PAGE_ORIENTATION = ' . PDF_PAGE_ORIENTATION;
echo '<br>PDF_UNIT = ' . PDF_UNIT;
echo '<br>PDF_PAGE_FORMAT = ' . PDF_PAGE_FORMAT;
*/

# set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Amin Ledang');
$pdf->SetTitle('Contoh Asas');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

# remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

# set margins
//SetMargins($left,$top,$right = -1,$keepmargins = false)
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(5, 5, 5);

# set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

# set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
#---------------------------------------------------------------------------------------------------
# set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//$pdf->SetFont('times', 'BI', 12);# set font
//$pdf->AddPage();# add a page
$pdf->AddPage('L', 'A4');# A4 LANDSCAPE
