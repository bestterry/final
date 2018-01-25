<?php
require ('fpdf.php');
$pdf=new FPDF();
$pdf->SetMargins( 15,15,10 );



//ตัวส่งข้อมูลแสดงผล
$name=$_POST['txtname'];
$last=$_POST['txtlastname'];
$numh=$_POST['txtaddress'];
$village=$_POST['txtvillageno'];
$age=$_POST['txtage'];
$Noage=$_POST['txtNoage'];
$no=$_POST['txtno'];
$exp=$_POST['txtexp'];
$road=$_POST['txtroad'];
$career=$_POST['txtcareer'];
$place=$_POST['txtplace'];
$tell=$_POST['txttell'];
$bank=$_POST['txtbank'];
$branch=$_POST['txtbranch'];
$Nob=$_POST['txtNobank'];
$Tbank=$_POST['txtTypebank'];
$Nbank=$_POST['txtNamebank'];

// เพิ่มฟ้อนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');

//สร้างหน้าเอกสาร
$pdf->AddPage();

// กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
$pdf->SetFont('angsana','',14);

//หาพิกัดที่วางชื่อ
$pdf->Text(35 ,  94, iconv( 'UTF-8','cp874' , $name ) , 0 , 1 , 'C');
$pdf->Text(50 ,  94, iconv( 'UTF-8','cp874' , $last ) , 0 , 1 , 'C');
$pdf->Text(38 ,  108, iconv( 'UTF-8','cp874' , $numh ) , 0 , 1 , 'C');
$pdf->Text(108 ,  129, iconv( 'UTF-8','cp874' , $numh ) , 0 , 1 , 'C');
$pdf->Text(60 ,  108, iconv( 'UTF-8','cp874' , $village ) , 0 , 1 , 'C');
$pdf->Text(130 ,  129, iconv( 'UTF-8','cp874' , $village ) , 0 , 1 , 'C');
$pdf->Text(106 ,  94, iconv( 'UTF-8','cp874' , $age ) , 0 , 1 , 'C');
$pdf->Text(35 ,  101, iconv( 'UTF-8','cp874' , $Noage ) , 0 , 1 , 'C');
$pdf->Text(100 ,  101, iconv( 'UTF-8','cp874' , $no ) , 0 , 1 , 'C');
$pdf->Text(170 ,  101, iconv( 'UTF-8','cp874' , $exp ) , 0 , 1 , 'C');
$pdf->Text(80 ,  108, iconv( 'UTF-8','cp874' , $road ) , 0 , 1 , 'C');
$pdf->Text(152 ,  129, iconv( 'UTF-8','cp874' , $road ) , 0 , 1 , 'C');
$pdf->Text(108 ,  115, iconv( 'UTF-8','cp874' , $career ) , 0 , 1 , 'C');
$pdf->Text(165 ,  115, iconv( 'UTF-8','cp874' , $place ) , 0 , 1 , 'C');
$pdf->Text(35 ,  122, iconv( 'UTF-8','cp874' , $tell ) , 0 , 1 , 'C');
$pdf->Text(65 ,  150, iconv( 'UTF-8','cp874' , $bank ) , 0 , 1 , 'C');
$pdf->Text(110 ,  150, iconv( 'UTF-8','cp874' , $branch ) , 0 , 1 , 'C');
$pdf->Text(155 ,  150, iconv( 'UTF-8','cp874' , $Nob ) , 0 , 1 , 'C');
$pdf->Text(45 ,  156, iconv( 'UTF-8','cp874' , $Tbank ) , 0 , 1 , 'C');
$pdf->Text(83 ,  156, iconv( 'UTF-8','cp874' , $Nbank ) , 0 , 1 , 'C');


//ข้อความแบบฟอร์ม
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , 'แบบคำขอใช้น้ำประปา' ) , 0 , 1 , 'C' );
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , 'กองการประปาตำบลบ้านถ้ำ' ) , 0 , 1 , 'C' );
$pdf->Cell(0  , 15, iconv( 'UTF-8','cp874' , 'เขียนที่   ................................................' ),0,1,'R');
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , 'วันที่ ................เดือน.......................พ.ศ...............' ),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(0  , 7, iconv( 'UTF-8','cp874' , 'ข้อ ๑.  ขอติดตั้งมาตรวัตน้ำ.............นิ้ว' ),0,1,'R');
$pdf->Cell(0  , 7, iconv( 'UTF-8','cp874' , 'ข้อ ๒.  ขอย้ายมาตรวัตน้ำ                    ' ),0,1,'R');
$pdf->Cell(0  , 7, iconv( 'UTF-8','cp874' , 'ข้อ ๓.  ขอใช้น้ำประปาชั่วคราว           ' ),0,1,'R');
$pdf->Cell(0  , 7, iconv( 'UTF-8','cp874' , ' ข้อ ๔.  ขอโอนประเภทการใช้น้ำ         ' ),0,1,'R');
$pdf->Cell(0  , 7, iconv( 'UTF-8','cp874' , 'ข้อ ๕.  อื่นๆ.........................................' ),0,1,'R');

$pdf->Ln(5);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' , 'ข้าพเจ้า.......................................................................................อายุ................ปี'),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' , 'เกิดวันที่.................................เลขบัตรประชาชน........................................................................................วันหมดอายุ........................................' ),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' , 'อยู่บ้านเลขที่.................หมู่ที่....................ถนน......................................   ตำบล............บ้านถ้ำ...........  อำเภอ..............ดอกคำใต้................' ),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' , 'จังหวัด .........พะเยา.........รหัสไปรษณีย์.........๕๖๑๒๐.........  อาชีพ.............................................  สถานที่ทำงาน..............................................' ),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' ,'โทรศัพท์ ....................................'),0,1);
$pdf->cell(5 , 7, iconv( 'UTF-8','cp874' ,'มีความประสงค์จะดำเนินการตามข้อ...................  สำหรับบ้านเลขที่.................  หมู่ที่..................  ถนน........................  ตำบล.....บ้านถ้ำ.......'),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' ,'อำเภอ.............ดอกคำใต้.............  จังหวัด..........พะเยา...........  โดยมีท่อประปาผ่านหน้าบ้านขนาด..................มม.'),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' ,'ในการชำระเงินค่าติดตั้งระบบประปา ข้าพเจ้าได้เเจ้งความจำนงการชำระเงินค่าติดตั้งระบบประปาโดย ' ),0,1);
$pdf->Cell(0 , 7, iconv( 'UTF-8','cp874' ,'ข้อ ๑.   หักเงินบัญชีฝากธนาคาร.......................................จำกัด  สาขา......................................  เลขที่บัญชี............................................ '),0,1);
$pdf->Cell(0 , 5, iconv( 'UTF-8','cp874' ,'            ประเภทบัญชี..............................  ชื่อบัญชี...................................' ),0,1);
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'ข้อ ๒.  ชำระที่สำนักงานเทศบาลตำบลบ้านถ้ำด้วยตนเอง' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'ข้อ ๓.  ชำระผ่านสื่ออื่น ๆ เช่น ผ่านบริการตัวเเทนเก็บเงินของเทศบาลฯ ' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'         ข้าพเจ้ายินดีที่จะให้ความสะดวกเเก่เจ้าหน้าที่ของการประปาตำบลบ้านถ้ำในการสำรวจเเละปฏิบัติตามระเบียบ ข้อบังคับของกองการ' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'ประปาเทศบาลตำบลบ้านถ้ำเกี่ยวกับการขอใช้น้ำประปาทุกประการ ซึ่งเจ้าหน้าที่ได้ชี้เเจงให้ข้าพเจ้าได้ทราบเเล้ว' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'เอกสารยื่นประกอบการยื่นคำขอ' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'๑.   บัตรประจำตัวประชาน                                                                                    (ลงชื่อ)......................................(ผู้ขอใช้น้ำประปา)' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'๒.   สำเนาทะเบียนบ้าน                                                                                                 (..........................................)' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'๓.   หลักฐานอื่นๆ' ) , 0 , 1  );
$pdf->Cell(0 , 10 ,iconv( 'UTF-8','cp874' ,'______________________________________________________________________________________________________') , 0 , 1  );
$pdf->Ln(5);
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'เรียน   นายกเทศมนตรีฯ  เพื่อโปรดพิจารณาอนุมัติ                                                                   อนุมัติ' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'(ลงชื่อ)..............................................                                                                (ลงชื่อ)..............................................' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'              (นาย  ราชันย์   สิทธิตัน )                                                                               (นายกฤษณพันธ์    ผดุงศร)' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'           นายช่างไฟฟ้า    ปฏิบัติหน้าที่                                                                 รองนายกเทศมนตรี   ปฏิบัติการเเทน' ) , 0 , 1  );
$pdf->Cell(0 , 7 ,iconv( 'UTF-8','cp874' ,'                  หัวหน้าการประปา                                                                                  นายกเทศมนตรีตำบลบ้านถ้ำ' ) , 0 , 1  );

$pdf->AddPage(); //เพื่มหน้า //หน้า2
$pdf->SetFont('angsana','',14);

//หาพิกัดที่วางชื่อ หน้า2
$pdf->Text(125 ,  51, iconv( 'UTF-8','cp874' , $name ) , 0 , 1 , 'C');
$pdf->Text(140 ,  51, iconv( 'UTF-8','cp874' , $last ) , 0 , 1 , 'C');
$pdf->Text(190 ,  51, iconv( 'UTF-8','cp874' , $numh ) , 0 , 1 , 'C');
$pdf->Text(24 ,  58, iconv( 'UTF-8','cp874' , $village ) , 0 , 1 , 'C');
//ข้อความ
$pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , 'สัญญาการใช้น้ำประปา' ) , 0 , 1 , 'C' );
$pdf->Ln(20);

$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '             สัญญาฉบับนี้ทำขึ้น เมื่อวันที่..........  เดือน.................................. พ.ศ................. ณ สำนักงานเทศบาลตำบลบ้านถ้ำ' ) , 0 , 1);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , 'ระหว่าง.......................................... ตัวแทนการประปาเทศบาลบ้านถ้ำฝ่ายหนึ่ง กับ..........................................................อยู่บ้านเลขที่.............. ' ) , 0 , 1);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , 'หมู่ที่......... ตำบลบ้านถ้ำ  อำเภอดอกคำใต้    จังหวัดพะเยา  ซึ่งในสัญญานี้เรียกกว่า ”ผู้ใช้น้ำ” อีกฝ่ายหนึ่งโดยมีข้อตกลงดังนี้' ) , 0 , 1);
$pdf->Cell(0  ,  15, iconv( 'UTF-8','cp874' , '              ข้อ ๑ “ผู้ใช้น้ำ” ยอมรับว่า “เทศบัญญัติ เรื่องระเบียบด้วยการใช้น้ำประปาของการประปาเทศบาลตำบลบ้านถ้ำ พ.ศ.๒๕๕๔”' ) , 0 , 1);
$pdf->Cell(0  ,  -1, iconv( 'UTF-8','cp874' , 'ซึ่งแนบท้ายใบเป็นสาระสำคัญส่วนหนึ่งของสัญญานี้และ ”ผู้ใช้น้ำ” ยินยอมปฏิบัติตามเทศบัญญัติฯ ท้ายสัญญาทุกประการ' ) , 0 , 1);
$pdf->Cell(0  ,  15, iconv( 'UTF-8','cp874' , '              ข้อ ๒ ”ผู้ใช้น้ำ” ยอมรับว่าสัญญานี้มีผลบังคับใช้ได้ตลอดไปจนกว่าการประปาเทศบาลบ้านถ้ำจะยกเลิกใช้สัญญา หรือ ”ผู้ใช้น้ำ”' ) , 0 , 1);
$pdf->Cell(0  ,  -1, iconv( 'UTF-8','cp874' , 'ขอยกเลิกสัญญาหรือได้โอนสิทธิ์การใช้น้ำให้ผู้อื่นโดยยินยอมของการประปาเทศบาลตำบลบ้านถ้ำ จึงถือว่าสัญญานี้เป็นอันระงับสิ้นไป' ) , 0 , 1);
$pdf->Cell(0  ,  15, iconv( 'UTF-8','cp874' , '              ข้อ ๓ ”ผู้ใช้น้ำ” สัญญาว่า จะปฏิบัติตามข้อบังคับ ระเบียบและประกาศของการประปาเทศบาลตำบลบ้านถ้ำอันเกี่ยวกับเรื่อง' ) , 0 , 1);
$pdf->Cell(0  ,  -1, iconv( 'UTF-8','cp874' , 'น้ำประปาที่ใช้อยู่หรือที่จะเปลี่ยนแปลงแก้ไข หรือที่ตราขึ้นใหม่ทุกประการ ' ) , 0 , 1);
$pdf->Ln(5);
$pdf->Cell(0 ,  15, iconv( 'UTF-8','cp874' , '              สัญญานี้ทำขึ้นสองฉบับ โดยมีความเป็นอย่างเดียวกัน ทั้งสองฝ่ายเข้าใจข้อความโดยละเอียดแล้วจึงขอลงลายมือชื่อไว้เป็นสำคัญ' ) , 0 , 1);
$pdf->Cell(0  ,  -1, iconv( 'UTF-8','cp874' , 'ต่อหน้าพยานและเก็บไว้ฝ่ายละฉบับ' ) , 0 , 1);
$pdf->Ln(70);

$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '                                                                                                (ลงชื่อ).........................................................ผู้ใช้น้ำ' ) , 0 , 1);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '                                                                                                      (.............................................................)' ) , 0 , 1);
$pdf->Ln(5);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '                                                                                                (ลงชื่อ).....................................................ตัวแทนการประปาฯ' ) , 0 , 1);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '                                                                                                      (.............................................................)' ) , 0 , 1);
$pdf->Ln(30);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '(ลงชื่อ).........................................................พยาน                                                                  (ลงชื่อ).........................................................พยาน' ) , 0 , 1);
$pdf->Cell(0  ,  7, iconv( 'UTF-8','cp874' , '       (...........................................................)                                                                                    (...........................................................)' ) , 0 , 1);


$pdf->Output();
?>