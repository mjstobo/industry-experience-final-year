<?php

// create new PDF document
//tcpdf loaded via Composer from https://packagist.org/packages/tecnick.com/tcpdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document header information. This appears at the top of each page of the PDF document
$pdf->SetHeaderData(PDF_HEADER_LOGO, 25, "Eating Disorders Victoria","\nLevel 2, Collingwood Football Club Community Centre,\nCnr Lulie and Abbot Street, Abbotsford, 3067 VIC, Australia \nPh: 1300 550 236 \t\t\t\t\t\t\t\t\t E: mjstobo@gmail.com
\nABN: 24010832192\nCharity Reg No: DGR 900224708");



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 6));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED,'', 12);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->SetFont('', '', 10);
$pdf->AddPage();

$pdf->Ln();




$table= $this->PDF->createPDFLoan($loan, $lic1);

$pdf->writeHTML($table, true, true, true,true,'');

ob_clean();

//Close and output PDF document
$pdf->Output('loan.pdf');
exit();
?>
