<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';

  $house_id = $_GET['house_id'];
  $meter = $_GET['meter'];
  $meter_sent = $meter;
    $sql_address = "SELECT * FROM house WHERE house_id='$house_id'";
    $objq_address = mysqli_query($conn,$sql_address);
    $objr_address = mysqli_fetch_array($objq_address);
    $address = $objr_address['address'];
    $village_no = $objr_address['village_no'];


 $sql_meter = "SELECT * FROM house INNER JOIN meter_management ON house.house_id = meter_management.house_id WHERE meter_management.house_id= $house_id ";
 $objq_meter = mysqli_query($conn,$sql_meter);
 $objr_meter = mysqli_fetch_array($objq_meter);
 require 'algorithm/cal_money.php';

 if($objr_meter == NULL){
     require 'algorithm/cal_money.php';
     $meter_id = $house_id;
     $meter_previos = 0;
     $meter_after = $meter;
     $meter_united = $meter;
     $money_cal = $money ;
     $datatime = date("d-m-Y");
 }else
 {
     $sql_maxid = "SELECT MAX(id) FROM meter_management WHERE house_id= $house_id ";
     $objq_maxid = mysqli_query($conn,$sql_maxid);
     $objr_maxid = mysqli_fetch_array($objq_maxid);
     $max_id = $objr_maxid['MAX(id)'];
     $sql_meter = "SELECT * FROM meter_management WHERE id=$max_id";
     $objq_meter = mysqli_query($conn,$sql_meter);
     $objr_meter = mysqli_fetch_array($objq_meter);
     $meter_after = $meter;
     $meter_previos = $objr_meter['meter_after'];

    if ($meter < $meter_previos){
        header("location:manage_meter_input.php?address=$address&village_no=$village_no&err='erro'");
    }else

     $total_meter =$meter_after - $meter_previos;
     $meter = $meter - $meter_previos;
     require 'algorithm/cal_money.php';
     $meter_id = $house_id;
     $meter_united = $total_meter;
     $money_cal = $money;
     $datatime = date("d-m-Y");
 }

?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';?>
    <?php require '../../font/font_style.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <!-- Logo -->
        <a href="../homepage_account.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Waterwork</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <?php require 'menu/topbar.php';?>
                    <!-- /account -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php require 'menu/navbar.php';?>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> ยืนยันการบันทึกข้อมุล
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">

                    <address>
                        <strong>  ที่อยู่</strong><br>

                        บ้านเลขที่ <?php echo $objr_address['address']?> หมู่ที่ <?php echo $objr_address['village_no']?><br>
                        ตำบลบ้านถ้ำ, อำเภอดอกคำใต้<br>
                        จังหวัดพะเยา: 65000<br>
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ค่่าน้ำก่อนใช้</th>
                            <th>ค่าน้ำหลังใช้</th>
                            <th>ค่าน้ำที่ใช้</th>
                            <th>ค่าน้ำ/หน่วย</th>
                            <th>จำนวนเงิน</th>
                            <th>วันที่</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $meter_id?></td>
                                <td><?php echo $meter_previos?></td>
                                <td><?php echo $meter_after?></td>
                                <td><?php echo $meter_united?></td>
                                <td><?php echo $unit_price_id?></td>
                                <td><?php echo $money?></td>
                                <td><?php echo $datatime?></td>
                            </tr>

                        </tbody>

                    </table>
                    <font size="2" color="red">*โปรดตรวจสอบข้อมูลให้ถูกต้อง</font>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="algorithm/insert_meter.php?house_id=<?=$house_id?>&meter=<?=$meter_sent ?>&employee_id=<?=$obj_employee['employee_id']?>" type="button" class="btn btn-success pull-right" onclick="return confirm('ยืนยันบันทึกค่าน้ำ')"><i class="fa fa-success" ></i> บันทึกข้อมูล</a>
                </div>
            </div>
        </section>
        <!-- /.conten
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>CPE XIII-UP</strong>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
</body>
</html>

