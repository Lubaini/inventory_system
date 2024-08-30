
<?php

if (!empty($data)) {
	
require 'rotation.php';

$sales_amount = [];

foreach ($data as $value) {

	array_push($sales_amount, $value->total_cost);
	# code...
}


class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
	//Image rotated around its upper-left corner
	$this->Rotate($angle,$x,$y);
	$this->Image($file,$x,$y,$w,$h);
	$this->Rotate(0);
}
}

$pdf = new PDF('P','mm','A4');

$pdf->AddPage();

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Sales Report',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Meru Gas',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);

// foreach ($data as $value) {
$pdf->Cell(130 ,5,'Branch',0,0);
$pdf->Cell(25 ,5,'Date: '.date("d-m-Y"),0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,'Lilongwe',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);
// }
 
$pdf->RotatedImage('assets/img/2.png',84,20,20,20,4);
$pdf->SetFont('Arial','', 15);
$pdf->RotatedText(75,97,'',40);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(130 ,5,'LL Branches Sales Report:',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);

$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
// $pdf->Cell(15 ,6,'ITEM_ID',1,0,'C');
$pdf->Cell(65 ,6,'CUSTOMER',1,0,'C');
$pdf->Cell(38 ,6,'ITEM',1,0,'C');


$pdf->Cell(30 ,6,'PRICE',1,0,'C');
$pdf->Cell(20 ,6,'QTY',1,0,'C');
$pdf->Cell(45 ,6,'TOTAL',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

    foreach ($data as $value){
		// $pdf->Cell(25 ,6,$value->pname,1,0);
		
		
		$pdf->Cell(65 ,6,$value->first_name.''.$value->last_name,1,0);
		$pdf->Cell(38 ,6,$value->pname,1,0,'R');
		
		$pdf->Cell(30 ,6,'MK'.number_format($value->price,2),1,0,'R');
		$pdf->Cell(20 ,6,$value->quantity,1,0,'R');
		$pdf->Cell(45 ,6,'MK'.number_format($value->total_cost,2),1,1,'R');
    }
		

$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(35 ,6,'',0,0);
$pdf->Cell(45 ,6,'MK'.number_format(array_sum($sales_amount),2),1,1,'R');

$pdf->Output();

} else {?>

<p><b>Sales report is not ready to be generated...</b></p>
<br>
<!-- <a href="<?php echo URL('superuser'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Go Back Home</a> -->
<?php }?>