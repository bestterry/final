<?php
require('fpdf.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'waterwork');
$con->set_charset("UTF-8");
$pdf=new FPDF('P','mm','A5');
// ตั้งค่าขอบกระดาษทุกด้าน 20 มิลลิเมตร
$pdf->SetMargins(25, 15,20);
$pdf->AddFont('angsana','','angsa.php');


//สร้างหน้าเอกสาร
$pdf->AddPage();

$pdf->Addfont('angsa','','angsa.php');
// กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
$pdf->SetFont('angsana','',12);

$query_address="SELECT * FROM datauser INNER JOIN address ON datauser.userid=address.userid WHERE address.villageid='1200'";
$objq_address=mysqli_query($con, $query_address);
$objr_address=mysqli_fetch_array($objq_address);




//datetime
$query_date="SELECT * FROM datameter WHERE villageid='1200'";
$objq_date=mysqli_query($con, $query_date);
$objr_date=mysqli_fetch_array($objq_date);
$datatime=$objr_date['datatime'];
$datatime = new DateTime($datatime);
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return " $strMonthThai $strYear";
}
$strDate = $datatime->format('M-Y');
//echo DateThai($strDate);

// datetime
//die();
$query="SELECT * FROM datameter WHERE villageid='1200'";
$objq=mysqli_query($con, $query);



foreach ($objq as $meter):

//สร้างตาราง
$dis = 0;
 if($meter['meter']<=40){
   $dis=5; 
}
elseif ($meter['meter']<=50){
   $dis=6;
}
else $dis=7;

//ที่อยู่เเละชื่อ
$pdf->Text(45,23,iconv('UTF-8','cp874',DateThai($meter['datatime'])),1,0,'C');
$pdf->Text(102,23,iconv('UTF-8','cp874',$objr_address['userid']),1,0,'C');
$pdf->Text(45,28,iconv('UTF-8','cp874',$objr_address['name']),1,0,'C');
$pdf->Text(60,28,iconv('UTF-8','cp874',$objr_address['lastname']),1,0,'C');
$pdf->Text(35,33,iconv('UTF-8','cp874',$objr_address['address']),1,0,'C');
$pdf->Text(38,33,iconv('UTF-8','cp874','หมู่ที่'),1,0,'C');
$pdf->Text(45,33,iconv('UTF-8','cp874',$objr_address['villageno']),1,0,'C');
$pdf->Text(50,33,iconv('UTF-8','cp874','ต.บ้้านถ้ำ   อ.ดอกคำใต้  จ.พะเยา 56120'),1,0,'C');

$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '      ใบเสร็จรับเงินค่าน้ำประปาและใบกำกับภาษี เลขที่.......' ) , 0 , 1,'C' );
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ประจำเดือน...........................................    หมายเลขผู้ใช้น้ำประปา..................' ) , 0 , 1);
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ชื่อ-นามสกุล......................................................................................................' ) , 0 , 1 );
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ที่อยู่...................................................................................................................' ) , 0 , 1 );
$pdf->Ln(5);

$pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งก่อน'),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งหลัง'),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','หน่วยที่ใช้'),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['total_meter']-$meter['meter']),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['total_meter']),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['meter']),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874',''),0,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','ราคาหน่วยละ'),0,0,'R');
$pdf->Cell(30,21,iconv('UTF-8','cp874',''),1,0,'C');
$pdf->Cell(-30,7,iconv('UTF-8','cp874',$dis),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','เป็นเงิน'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['money']),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','ภาษีมูลค่าเพิ่ม 7% เป็นเงิน'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',($meter['money']*0.07)),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','รวมเป็นเงินทั้งหมด'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',($meter['money']*0.07)+$meter['money']),1,0,'C');
$pdf->Ln(7);
$pdf->Text(0, 106,iconv('UTF-8','cp874','-----------------------------------------------------------------------------------------------------------------------------------------------------------------------'),1,0,'C');

//ยืนยันรับเงิน(ส่วนของการประปา)
$pdf->Text(20,96,iconv('UTF-8','cp874','ได้รับเงินถูกต้องแล้ว.................................................พนักงานเก็บเงิน       ......./......./....... วันที่รับเงิน'),1,0);
$pdf->Text(20,102,iconv('UTF-8','cp874','(ลงชื่อ) ................................................................. หัวหน้าหน่วยงานคลัง'),1,0);
//ยืนยันรับเงิน(ส่วนของผู้ใช้น้ำ)
$pdf->Text(20,186,iconv('UTF-8','cp874','โปรดชำระเงินภายในวันที่       ......./......./....... '),1,0);
$pdf->Text(20,192,iconv('UTF-8','cp874','(ลงชื่อ) ................................................................. พนักงานเก็บเงิน'),1,0);
$pdf->Text(24,198,iconv('UTF-8','cp874','(...............................................................................)'),1,0);


//ใบเสร็จส่วนที่2
$pdf->Ln(20);
//ที่อยู่เเละชื่อ2
$pdf->Text(45, 117,iconv('UTF-8','cp874',DateThai($meter['datatime'])),1,0,'C');
$pdf->Text(102, 117,iconv('UTF-8','cp874',$objr_address['userid']),1,0,'C');
$pdf->Text(45, 122,iconv('UTF-8','cp874',$objr_address['name']),1,0,'C');
$pdf->Text(60, 122,iconv('UTF-8','cp874',$objr_address['lastname']),1,0,'C');
$pdf->Text(35, 127,iconv('UTF-8','cp874',$objr_address['address']),1,0,'C');
$pdf->Text(38, 127,iconv('UTF-8','cp874','หมู่ที่'),1,0,'C');
$pdf->Text(45, 127,iconv('UTF-8','cp874',$objr_address['villageno']),1,0,'C');
$pdf->Text(50, 127,iconv('UTF-8','cp874','ต.บ้้านถ้ำ   อ.ดอกคำใต้  จ.พะเยา 56120'),1,0,'C');

$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '      ใบเสร็จรับเงินค่าน้ำประปาและใบกำกับภาษี เลขที่.......' ) , 0 , 1,'C' );
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ประจำเดือน...........................................    หมายเลขผู้ใช้น้ำประปา..................' ) , 0 , 1);
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ชื่อ-นามสกุล......................................................................................................' ) , 0 , 1 );
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ที่อยู่...................................................................................................................' ) , 0 , 1 );
$pdf->Ln(5);

$pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งก่อน'),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งหลัง'),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','หน่วยที่ใช้'),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['total_meter']-$meter['meter']),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['total_meter']),1,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['meter']),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874',''),0,0,'C');
$pdf->Cell(30,7,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','ราคาหน่วยละ'),0,0,'R');
$pdf->Cell(30,21,iconv('UTF-8','cp874',''),1,0,'C');
$pdf->Cell(-30,7,iconv('UTF-8','cp874',$dis),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','เป็นเงิน'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',$meter['money']),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','ภาษีมูลค่าเพิ่ม 7% เป็นเงิน'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',($meter['money']*0.07)),0,0,'C');
$pdf->Ln(7);

$pdf->Cell(60,7,iconv('UTF-8','cp874','รวมเป็นเงินทั้งหมด'),0,0,'R');
$pdf->Cell(30,7,iconv('UTF-8','cp874',($meter['money']*0.07)+$meter['money']),1,0,'C');
$pdf->Ln(7);



$pdf->AddPage();
endforeach;

$pdf->Output();
?>