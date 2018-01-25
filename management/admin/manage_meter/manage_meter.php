<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
require 'menu/time_format.php';
$sql = "SELECT * FROM employee";
$objq = mysqli_query($conn,$sql);
$objr_employee = mysqli_fetch_array($objq);
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
    <div class="content-wrapper">
        <?php if (count($_GET)==0){}

        else{ ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด!</strong>ไม่พบที่อยู่ที่ท่านระบุ
            </div>
        <?php }?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <font size="5" >
                <B>จัดการมิเตอร์น้ำประปา</B>
            </font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ระบบจัดการน้ำประปา</li>
                <li class="active">จัดการมิเตอร์น้ำประปา</li>
            </ol>
        </section>
        <section class="content">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">เพิ่มค่าน้ำประปา</a></li>
                        <li><a href="#timeline" data-toggle="tab">แก้ไขค่าน้ำประปา</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <!-- /.user-block -->
                                <form action="manage_meter_input.php" method="get" name="form1" onSubmit="JavaScript:return fncSubmit();">
                                    <div class="post">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">กรุณากรอกบ้านเลขที่เเละหมู่ที่</h3>
                                        </div>
                                        <div role="form">
                                            <div class="box-body">
                                                <div class="form-group col-md-3">
                                                    <label for="address">บ้านเลขที่</label>
                                                    <input type="text" name="address" class="form-control" id="address" placeholder="บ้านเลขที่">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="villageno">หมู่ที่</label>
                                                    <input type="text" name="village_no" class="form-control" id="villageno" placeholder="หมู่ที่">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <address>
                                                        <strong><font color="red">&nbsp;&nbsp;การใช้งาน</font></strong><br>
                                                        &nbsp;&nbsp; -กรุณากรอกบ้านเลขที่และหมู่ที่เพื่อเข้าไปเพิ่มค่าน้ำ<br>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success pull-left">ตกลง</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <form action="edit_meter.php" method="get">
                                <div class="post">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">กรุณากรอกบ้านเลขที่เเละหมู่ที่</h3>
                                    </div>
                                    <div role="form">
                                        <div class="box-body">
                                            <div class="form-group col-md-3">
                                                <label for="txtaddress">บ้านเลขที่</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="บ้านเลขที่">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="txtvillageno">หมู่ที่</label>
                                                <input type="text" name="villageno" class="form-control" id="village_no" placeholder="หมู่ที่">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <address>
                                                    <strong><font color="red">&nbsp;&nbsp;การใช้งาน</font></strong><br>
                                                    &nbsp;&nbsp;&nbsp; -กรุณากรอกบ้านเลขที่และหมู่ที่เพื่อเข้าไปแก้ไขค่าน้ำ<br>
                                                    &nbsp;&nbsp;&nbsp; -สามารถแก้ไขได้เฉพาะเดือนล่าสุดเท่านั้น<br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success pull-left"> ตกลง</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </section>
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

