<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/12/2560
 * Time: 0:42
 */
 $date = date("d-m-Y ");
$house_id = $_GET['house_id'];
require('fpdf.php');
require '../../../connect/connect.php';
 $sql = "SELECT * FROM receive_withdraw_tool INNER JOIN description_tool ON (receive_withdraw_tool.tool_id=description_tool.description_tool_id) WHERE receive_withdraw_tool.house_id='$house_id'";
 $objq = mysqli_query($conn,$sql);
 $sql_name = "SELECT * FROM house INNER JOIN customer ON house.customer_id = customer.customer_id WHERE house.house_id=$house_id";
 $objq_name = mysqli_query($conn,$sql_name);
 $objr_name = mysqli_fetch_array($objq_name);
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}


$pdf=new FPDF('P','mm','A4');
// ตั้งค่าขอบกระดาษทุกด้าน 20 มิลลิเมตร
$pdf->SetMargins(25, 15,20);
$pdf->AddFont('angsana','','angsa.php');


//สร้างหน้าเอกสาร
$pdf->AddPage();

$pdf->Addfont('angsa','','angsa.php');
$pdf->SetFont('angsana','',15);
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'วันที่  '.DateThai($date) ) , 0 , 1,'R' );
// กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
$pdf->SetFont('angsana','',20);
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' ,  'ใบเสร็จรับเงิน' ) , 0 , 1,'C' );
$pdf->Ln(7);
$pdf->SetFont('angsana','',15);
$pdf->Text(45  ,  52, iconv( 'UTF-8','cp874' ,  $objr_name['name'].'        '.$objr_name['lastname'] ) , 0 , 1,'C' );
$pdf->Text(48  ,  59, iconv( 'UTF-8','cp874' ,  $objr_name['address']) , 0 , 1,'C' );
$pdf->Text(67  ,  59, iconv( 'UTF-8','cp874' ,  $objr_name['village_no']) , 0 , 1,'C' );

$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' ,  'กองการประปา สำนักงานเทศบาลตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา' ) , 0 , 1,'C' );
$pdf->Ln(7);
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' ,  'ชื่อลูกค้า .............................................................' ) , 0 , 1,'L' );
$pdf->Ln(2);
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' ,  'ที่อยู่ บ้านเลขที่...........หมู่ที่........... ต.บ้านถ้ำ อ.ดอกคำใต้  จ.พะเยา 56210' ) , 0 , 1,'L' );
$pdf->Ln(5);
$pdf->Cell(10,9,iconv('UTF-8','cp874','ลำดับ'),1,0,'C');
$pdf->Cell(80,9,iconv('UTF-8','cp874','รายการ'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','จำนวน'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','หน่วยนับ'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','ราคา/หน่วย'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf->Ln(9);

$num=1;
$total_money = 0;

foreach ($objq as $r) :
    $money  = $r['price_tool']*$r['count_tool'];
$pdf->Cell(10,8,iconv('UTF-8','cp874',$num),1,0,'C');
$pdf->Cell(80,8,iconv('UTF-8','cp874',$r['name_tool']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$r['count_tool']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$r['unit']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$r['price_tool']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$money),1,0,'C');
$pdf->Ln(8);
$num++;
$total_money = $total_money + $money;
endforeach;
$pdf->Cell(90,8,iconv('UTF-8','cp874','รวมเป็นเงิน(บาท)'),1,0,'C');
$pdf->Cell(80,8,iconv('UTF-8','cp874',$total_money),1,0,'C');
$pdf->Ln(15);
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , 'ลงชื่อ............................................................ผู้รับเงิน' ) , 0 , 1,'R' );
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , '(............................................................)           ' ) , 0 , 1,'R' );
$pdf->Ln(8);

$pdf->Output();
?>