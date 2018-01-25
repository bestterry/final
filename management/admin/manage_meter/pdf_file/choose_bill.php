<?php
require('fpdf.php');
require '../../../../connect/connect.php';
$conn->set_charset("UTF-8");


           // echo "chkColor $i = ".$_POST["check"][$i]."<br>";
          
            $pdf=new FPDF('P','mm','A5');
            // ตั้งค่าขอบกระดาษทุกด้าน 20 มิลลิเมตร
            $pdf->SetMargins(25, 15,20);
            $pdf->AddFont('angsana','','angsa.php');

            //สร้างหน้าเอกสาร
            $pdf->AddPage();
            
            $pdf->Addfont('angsa','','angsa.php');
            // กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
            $pdf->SetFont('angsana','',12);
            
            
            $month=$_GET['month'];
            $year=$_GET['year'];
            //datetime
            
            $query_date="SELECT * FROM meter_management WHERE MONTH(datatime)='$month' AND YEAR(datatime)='$year'";
            $objq_date=mysqli_query($conn, $query_date);
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
            
            //วนแสดงใบบิลแต่ล่ะบ้าน
            for($i=0;$i<count($_POST["check"]);$i++)
            {
                if(trim($_POST["check"][$i]) != "")
                {   
                    $house_id=$_POST["check"][$i];
                    $query_meter = "SELECT *  FROM meter_management WHERE MONTH(datatime)=$month AND YEAR(datatime)=$year AND house_id=$house_id";
                    $objq_meter=mysqli_query($conn, $query_meter);
                    $objr_meter=mysqli_fetch_array($objq_meter);
                    
                    $query_address="SELECT * FROM house INNER JOIN customer ON house.customer_id=customer.customer_id WHERE house.house_id = $house_id";
                    $objq_address=mysqli_query($conn, $query_address);
                    $objr_address=mysqli_fetch_array($objq_address);
                    require 'unit_water.php';

                    //สร้างตาราง
                    $pdf->Text(45,23,iconv('UTF-8','cp874',DateThai($objr_meter['datatime'])),1,0,'C');
                    $pdf->Text(102,23,iconv('UTF-8','cp874',$objr_address['house_id']),1,0,'C');
                    $pdf->Text(45,28,iconv('UTF-8','cp874',$objr_address['name'].'    '.$objr_address['lastname']),1,0,'C');
                    $pdf->Text(43,33,iconv('UTF-8','cp874','หมู่ที่'),1,0,'C');
                    $pdf->Text(50,33,iconv('UTF-8','cp874',$objr_address['village_no']),1,0,'C');
                    $pdf->Text(55,33,iconv('UTF-8','cp874','ต.บ้้านถ้ำ   อ.ดอกคำใต้  จ.พะเยา 56120'),1,0,'C');

                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '      ใบเสร็จรับเงินค่าน้ำประปาและใบกำกับภาษี เลขที่.......' ) , 0 , 1,'C' );
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ประจำเดือน...........................................    หมายเลขผู้ใช้น้ำประปา..................' ) , 0 , 1);
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ชื่อ-นามสกุล......................................................................................................' ) , 0 , 1 );
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ที่อยู่...................................................................................................................' ) , 0 , 1 );
                    $pdf->Ln(5);

                    $pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งก่อน'),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งหลัง'),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','หน่วยที่ใช้'),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_previos']),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_after']),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_united']),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874',''),0,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','ราคาหน่วยละ'),0,0,'R');
                    $pdf->Cell(30,21,iconv('UTF-8','cp874',''),1,0,'C');
                    $pdf->Cell(-30,7,iconv('UTF-8','cp874',$unit),0,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','เป็นเงิน'),0,0,'R');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['money']),0,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','รวมเป็นเงินทั้งหมด'),0,0,'R');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['money']),1,0,'C');
                    $pdf->Ln(7);
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
                    $pdf->Text(45, 117,iconv('UTF-8','cp874',DateThai($objr_meter['datatime'])),1,0,'C');
                    $pdf->Text(102, 117,iconv('UTF-8','cp874',$objr_address['customer_id']),1,0,'C');
                    $pdf->Text(45, 122,iconv('UTF-8','cp874',$objr_address['name'].'     '.$objr_address['lastname']),1,0,'C');
                    $pdf->Text(38, 127,iconv('UTF-8','cp874',$objr_address['address']),1,0,'C');
                    $pdf->Text(43, 127,iconv('UTF-8','cp874','หมู่ที่'),1,0,'C');
                    $pdf->Text(50, 127,iconv('UTF-8','cp874',$objr_address['village_no']),1,0,'C');
                    $pdf->Text(55, 127,iconv('UTF-8','cp874','ต.บ้้านถ้ำ   อ.ดอกคำใต้  จ.พะเยา 56120'),1,0,'C');

                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '      ใบเสร็จรับเงินค่าน้ำประปาและใบกำกับภาษี เลขที่.......' ) , 0 , 1,'C' );
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ประจำเดือน...........................................    หมายเลขผู้ใช้น้ำประปา..................' ) , 0 , 1);
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ชื่อ-นามสกุล......................................................................................................' ) , 0 , 1 );
                    $pdf->Cell(0  ,  5, iconv( 'UTF-8','cp874' , '  ที่อยู่...................................................................................................................' ) , 0 , 1 );
                    $pdf->Ln(5);

                    $pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งก่อน'),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','เลขที่อ่านครั้งหลัง'),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','หน่วยที่ใช้'),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_previos']),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_after']),1,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['meter_united']),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874',''),0,0,'C');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874','จำนวนเงิน'),1,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','ราคาหน่วยละ'),0,0,'R');
                    $pdf->Cell(30,21,iconv('UTF-8','cp874',''),1,0,'C');
                    $pdf->Cell(-30,7,iconv('UTF-8','cp874',$unit),0,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','เป็นเงิน'),0,0,'R');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['money']),0,0,'C');
                    $pdf->Ln(7);

                    $pdf->Cell(60,7,iconv('UTF-8','cp874','รวมเป็นเงินทั้งหมด'),0,0,'R');
                    $pdf->Cell(30,7,iconv('UTF-8','cp874',$objr_meter['money']),1,0,'C');
                    $pdf->Ln(7);
                    $pdf->AddPage();
                }
            }
    $pdf->Output();
?>