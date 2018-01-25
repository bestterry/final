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
// กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
$pdf->SetFont('angsana','',15);
$pdf->Text(55,66,iconv('UTF-8','cp874',$objr_name['name']),1,0,'C');
$pdf->Text(73,66,iconv('UTF-8','cp874',$objr_name['lastname']),1,0,'C');
$pdf->Text(38,75,iconv('UTF-8','cp874',$objr_name['address']),1,0,'C');
$pdf->Text(53,75,iconv('UTF-8','cp874',$objr_name['village_no']),1,0,'C');
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' ,  'กองการประปา สำนักงานเทศบาลตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา' ) , 0 , 1,'C' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'วันที่  '.DateThai($date) ) , 0 , 1,'R' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'เรียนหัวหน้ากองช่าง' ) , 0 , 1,'L' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'ข้าพเจ้า.................................................................................ตำแหน่ง............................................' ) , 0 , 1,'C' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'ขอเบิกวัสดุเพื่อใช้งาน       ติดตั้งมาตรวัดใหม่' ) , 0 , 1,'L' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'ตามคำร้องของ ......................................................................... ' ) , 0 , 1,'L' );
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , 'ที่อยู่              หมู่ที      ตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา 56210' ) , 0 , 1,'L' );
$pdf->Cell(0  ,  10, iconv( 'UTF-8','cp874' , 'รายละเอียดอุปกรณ์ที่ขอเบิกดังนี้' ) , 0 , 1,'L' );

$pdf->Cell(10,9,iconv('UTF-8','cp874','ลำดับ'),1,0,'C');
$pdf->Cell(80,9,iconv('UTF-8','cp874','รายการ'),1,0,'C');
$pdf->Cell(15,9,iconv('UTF-8','cp874','จำนวน'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','ราคา/หน่วย'),1,0,'C');
$pdf->Cell(20,9,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf->Cell(30,9,iconv('UTF-8','cp874','หมายเหตุ'),1,0,'C');
$pdf->Ln(9);

$num=1;
$total_money = 0;

foreach ($objq as $r) :
    $money  = $r['price_tool']*$r['count_tool'];
$pdf->Cell(10,8,iconv('UTF-8','cp874',$num),1,0,'C');
$pdf->Cell(80,8,iconv('UTF-8','cp874',$r['name_tool']),1,0,'C');
$pdf->Cell(15,8,iconv('UTF-8','cp874',$r['count_tool']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$r['price_tool']),1,0,'C');
$pdf->Cell(20,8,iconv('UTF-8','cp874',$money),1,0,'C');
$pdf->Cell(30,8,iconv('UTF-8','cp874',''),1,0,'C');
$pdf->Ln(8);
$num++;
$total_money = $total_money + $money;
endforeach;
$pdf->Cell(90,8,iconv('UTF-8','cp874','รวมเป็นเงิน'),1,0,'C');
$pdf->Cell(55,8,iconv('UTF-8','cp874',$total_money),1,0,'C');
$pdf->Ln(15);
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , 'ลงชื่อ............................................................ผู้ประมาณการ' ) , 0 , 1,'R' );
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , '(............................................................)                      ' ) , 0 , 1,'R' );
$pdf->Ln(8);
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , 'ลงชื่อ............................................................ผู้จ่าย              ' ) , 0 , 1,'R' );
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , '(............................................................)                      ' ) , 0 , 1,'R' );
$pdf->Ln(8);
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , 'ลงชื่อ............................................................ผู้อนุมัติ         ' ) , 0 , 1,'R' );
$pdf->Cell(0  ,  8, iconv( 'UTF-8','cp874' , '(............................................................)                      ' ) , 0 , 1,'R' );


$pdf->Output();
?>