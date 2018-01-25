<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/time_format.php';
require 'menu/sesion.php';
$sql = "SELECT * FROM employee";
$address = $_GET['address'];
$villageno = $_GET['villageno'];

$sql_seach_villageid = "SELECT house_id FROM house WHERE address='$address' AND village_no='$villageno'";
$objq_seach_villageid = mysqli_query($conn, $sql_seach_villageid);
$objr_seach_villageid = mysqli_fetch_array($objq_seach_villageid);

$house_id = $objr_seach_villageid['house_id'];
$sql_search_meter = "SELECT MAX(id) FROM meter_management WHERE house_id = '$house_id'";
$objq_search_meter = mysqli_query($conn, $sql_search_meter);
$objr_search_meter = mysqli_fetch_array($objq_search_meter);

$max_meter=$objr_search_meter['MAX(id)'];
$sql_meter_max = "SELECT * FROM meter_management WHERE id = '$max_meter'";
$objq_meter_max = mysqli_query($conn, $sql_meter_max);
$objr_meter_max = mysqli_fetch_array($objq_meter_max);

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
        <a href="../homepage_admin.php" class="logo">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php if (count($_GET)==2){

        }

        else{ ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด!</strong>กรุณาตรวจสอบค่าน้ำที่ท่านกรอกถูกต้องหรือไม่
            </div>
        <?php }?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> เพิ่มค่ามิเตอร์      </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">จัดการค่าน้ำประปา</a></li>
                <li class="active">เเก้ไขค่าน้ำประปา</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">เเก้ไขค่าน้ำประปา</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <font size="3" color="red">*สามารถแก้ไขได้เฉพาะเดือนล่าสุดเท่านั้น</font><br>
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ค่่าน้ำก่อนใช้</th>
                                        <th>ค่าน้ำหลังใช้</th>
                                        <th>ค่าน้ำที่ใช้</th>
                                        <th>จำนวนเงิน</th>
                                        <th>วันที่</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $objr_meter_max['meter_id']?></td>
                                        <td><?php echo $objr_meter_max['meter_previos']?></td>
                                        <td><?php echo $objr_meter_max['meter_after']?></td>
                                        <td><?php echo $objr_meter_max['meter_united']?></td>
                                        <td><?php echo $objr_meter_max['money']?></td>
                                        <td><?php echo DateThai($objr_meter_max['datatime'])?></td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-4">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ค่ามิเตอร์ที่ต้องการเปลี่ยน</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $objr_meter_max['house_id']?></td>
                                        <td>
                                            <form action="algorithm/update_meter.php" name="form1" method="get">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="edit_meter" class="form-control" id="edit_meter" placeholder="กรุณากรอกค่ามิเตอร์">
                                                    <input type="hidden" name="max_id" class="form-control" id="id" value="<?php echo $max_meter?>">
                                                    <input type="hidden" name="house_id" class="form-control" id="villageid" value="<?php echo $house_id?>">
                                                    <input type="hidden" name="address" class="form-control" id="address" value="<?php echo $address?>">
                                                    <input type="hidden" name="villageno" class="form-control" id="villageno" value="<?php echo $villageno?>">
                                                    <span class="input-group-btn">
                                                  <button name="btnSubmit1" type="submit" value="Submit" class="btn btn-info btn-flat" onclick="return confirm('ยืนยันเก้ไขข้อมูลค่าน้ำ')">ตกลง</button>
                                                </span>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
</div>
<!-- /.content-wrapper -->
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

