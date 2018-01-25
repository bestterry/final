<?php
require 'fpdf.php';
require '../../../connect/connect.php';
require '../manage_statistic/menu/time_format.php';
$conn->set_charset("UTF-8");

class PDF extends FPDF{
    function header(){
        $this->Addfont('angsa','','angsa.php');
        $this->SetFont('angsa','','20');
        $this->Cell(180,10,iconv('UTF-8','TIS-620','                                                    สถิติการใช้น้ำ'),0,0,'');
        $this->Ln();
        $this->Addfont('angsa','','angsa.php');
        $this->SetFont('angsa','','18');
        $this->Cell(180,10,iconv('UTF-8','TIS-620','                                               องค์การบริหารส่วนตำบลบ้านถ้ำ'),0,0,'');
        $this->Ln();
        $this->Addfont('angsa','','angsa.php');
        $this->SetFont('angsa','','15');
        $this->Setfillcolor(180,180,255);
        $this->SetDrawcolor(50,50,100);
        $this->Cell(50,10,iconv('UTF-8','TIS-620','ปี พ.ศ.'),1,0,'C',true);
        $this->Cell(50,10,iconv('UTF-8','TIS-620','หน่วยน้ำที่ใช้'),1,0,'C',true);
        $this->Cell(50,10,iconv('UTF-8','TIS-620','จำนวนเงิน'),1,0,'C',true);

        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->Setfont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }


}


$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(30,15,20);
$pdf->AddPage('','A4',0);
$pdf->Addfont('angsa','','angsa.php');
$pdf->SetFont('angsa','','15');


// echo $yearbefore;
// echo $yearafter;
//  die();
$year_before=$_GET['year_before'];
$year_after=$_GET['year_after'];
$query="SELECT datatime,sum(money),sum(meter_united) FROM meter_management WHERE (datatime between '$year_before-01-01' and '$year_after-12-31') GROUP BY YEAR(datatime)";
$data=mysqli_query($conn,$query);
$sql_search_sum="SELECT sum(meter_united),sum(money) FROM meter_management  WHERE (datatime between '$year_before-01-01' and '$year_after-12-31')  ";
$data_sum=mysqli_query($conn,$sql_search_sum);
$objr_sum=mysqli_fetch_array($data_sum);

foreach ($data as $m ):
    $pdf->Cell(50,9,DateThaiYear($m['datatime']),1,0,'C');
    $pdf->Cell(50,9,$m['sum(meter_united)'],1,0,'C');
    $pdf->Cell(50,9,$m['sum(money)'],1,0,'C');

    $pdf->Ln();
endforeach;
$pdf->Ln();
$pdf->Cell(50,10,iconv('UTF-8','TIS-620','ปี พ.ศ.'),1,0,'C');
$pdf->Cell(50,10,iconv('UTF-8','TIS-620','จำนวนค่าน้ำที่ใช้ทั้งหมด'),1,0,'C');
$pdf->Cell(50,10,iconv('UTF-8','TIS-620','จำนวนเงินทที่ได้รับั้งหมด'),1,0,'C');
$pdf->Ln();
$pdf->Cell(50,10,iconv('UTF-8','TIS-620',DateThaiYear($year_before).'  ถึง  '.DateThaiYear($year_after)),1,0,'C');
$pdf->Cell(50,10,iconv('UTF-8','TIS-620',$objr_sum['sum(meter_united)']),1,0,'C');
$pdf->Cell(50,10,iconv('UTF-8','TIS-620',$objr_sum['sum(money)']),1,0,'C');
$pdf->Output();
?>