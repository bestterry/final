<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
$sql_village = "SELECT * FROM village_name";
$objq_village = mysqli_query($conn, $sql_village);
$objr_village = mysqli_fetch_array($objq_village);
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">สถิติ</a></li>
                <li class="active"> ตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- form start -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="#timeline" data-toggle="tab">สถิติการใช้น้ำรายเดือน</a></li>
                            <li><a href="#settings" data-toggle="tab">สถิติการใช้น้ำรายปี</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="timeline">
                                <div class="form-group">
                                    <div class="box box-default">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="container">
                                                    <form action="statistic_use_water_village.php" method="get">
                                                        <div class="col-md-5">
                                                            <!-- /.form-group -->
                                                            <div class="box-body">
                                                                <strong><i class="fa fa-file-text-o margin-r-5"></i> การใช้</strong>
                                                                <p> -กรุณาเลือก เดือน เเละ  ปี พ.ศ. เพื่อตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</p>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>

                                                        <!-- /.col -->
                                                        <div class="col-md-7">
                                                            <div class="form-group col-md-5">
                                                                <label>ตั้งเเต่ เดือน</label>
                                                                <select name="month_before" class="form-control select2" style="width: 80%;">
                                                                    <option selected="selected" value="01">มกราคม</option>
                                                                    <option value="02">กุมภาพันธ์</option>
                                                                    <option value="03">มีนาคม</option>
                                                                    <option value="04">เมษายน</option>
                                                                    <option value="05">พฤษภาคม</option>
                                                                    <option value="06">มิถุนายน</option>
                                                                    <option value="07">กฤกฏาคม</option>
                                                                    <option value="08">สิงหาคม</option>
                                                                    <option value="09">กันยายน</option>
                                                                    <option value="10">ตุลาคม</option>
                                                                    <option value="11">พฤศจิกายน</option>
                                                                    <option value="12">ธันวาคม</option>
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
                                                            <div class="form-group col-md-5">
                                                                <label>ปี พ.ศ.</label>
                                                                <select name="year_before" class="form-control select2" style="width: 80%;">
                                                                    <option value="2017">2560</option>
                                                                    <option selected="selected" value="2016">2559</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label>ถึง เดือน</label>
                                                                <select name="month_after" class="form-control select2" style="width: 80%;">
                                                                    <option selected="selected" value="01">มกราคม</option>
                                                                    <option value="02">กุมภาพันธ์</option>
                                                                    <option value="03">มีนาคม</option>
                                                                    <option value="04">เมษายน</option>
                                                                    <option value="05">พฤษภาคม</option>
                                                                    <option value="06">มิถุนายน</option>
                                                                    <option value="07">กฤกฏาคม</option>
                                                                    <option value="08">สิงหาคม</option>
                                                                    <option value="09">กันยายน</option>
                                                                    <option value="10">ตุลาคม</option>
                                                                    <option value="11">พฤศจิกายน</option>
                                                                    <option value="12">ธันวาคม</option>
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
                                                            <div class="form-group col-md-5">
                                                                <label>ปี พ.ศ.</label>
                                                                <select name="year_after" class="form-control select2" style="width: 80%;">
                                                                    <option selected="selected" value="2017">2560</option>
                                                                    <option value="2016">2559</option>

                                                                </select>
                                                            </div>
                                                            <div class="box-footer col-md-7">
                                                                <button type="submit" class="btn btn-success pull-left">ตกลง</button>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <div class="box box-default">
                                    <div class="box-header with-border">

                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="container">
                                                <form action="st_year.php" method="get">
                                                    <div class="col-md-5">

                                                        <!-- /.form-group -->
                                                        <div class="box-body">
                                                            <strong><i class="fa fa-file-text-o margin-r-5"></i> การใช้</strong>

                                                            <p> -กรุณาเลือกปี พ.ศ. เพื่อตรวจสอบข้อมูลสถิติการใช้น้ำย้อนหลัง</p>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>



                                                    <!-- /.col -->
                                                    <div class="col-md-5">

                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label>ตั้งเเต่ ปี พ.ศ.</label>
                                                            <select name="year_before" class="form-control select2" style="width: 40%;">
                                                                <option value="2017">2560</option>
                                                                <option selected="selected" value="2016">2559</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ถึง ปี พ.ศ.</label>
                                                            <select name="year_after" class="form-control select2" style="width: 40%;">
                                                                <option selected="selected" value="2017">2560</option>
                                                                <option value="2016">2559</option>
                                                            </select>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-success pull-left">ตกลง</button>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>


            </div>
        </section>
        <!-- /.content -->
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

