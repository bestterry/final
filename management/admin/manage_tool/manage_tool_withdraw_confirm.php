<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ใบเสร็จเบิกอุปกรณ์
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">ข้อมูลอุกรณ์</a></li>
                <li class="active">ใบเสร็จเบิกอุปกรณ์</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">

                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> กองการประปา สำนักงานเทศบาลตำบลบ้านถ้ำ อำเภอดอกคำใต้ จังหวัดพะเยา

                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-xs-6 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" width="33%">ข้าพเจ้า</th>
                            <th class="text-center" width="33%">ตำแหน่ง</th>
                            <th class="text-center" width="33%">วัตถุประสงค์</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center" width="33%"><?php echo $obj_employee['name'];?>&nbsp;&nbsp;<?php echo $obj_employee['lastname'];?> </td>
                            <td class="text-center" width="33%"><?php echo $obj_employee['duty_id']; ?></td>
                            <td class="text-center" width="33%"><?php echo $_POST['type'] ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- Table row -->
            <form action="manage_tool_print.php" method="post">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" >รายการ</th>
                                <th class="text-center" >รหัสอุปกรณ์</th>
                                <th class="text-center" >รายการ</th>
                                <th class="text-center" >จำนวน</th>
                                <th class="text-center" width="15%">ราคา/หน่วย</th>
                                <th class="text-center" width="15%">รวมเป็นเงิน</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php require 'algorithm/bill_confirm_withdraw_tool.php';?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">รวมเป็นเงิน</th>
                                    <td><?php echo $total_money;?>
                                        <input class ="hidden" type="text" name="total_money" value="<?php echo $total_money;?>">
                                    </td>
                                    <td>บาท</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-print"></i> พิมพ์รายการ
                        </button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
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

