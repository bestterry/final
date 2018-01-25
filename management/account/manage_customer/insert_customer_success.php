<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 20:23
 */
require 'menu/sesion.php';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php require 'menu/head_link.php'; ?>
        <!-- Select2 -->
        <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
        <?php require '../../font/font_style.php'; ?>
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
                        <?php require 'menu/topbar.php'; ?>
                        <!-- /account -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php require 'menu/navbar.php'; ?>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-2">

                        <!-- /.box -->
                    </div>
                    <!-- ./col -->
                    <div class="col-md-8">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <font size="4" ><i class="fa fa-warning text-yellow"></i> <B>ระบบได้ทำการบันทึกข้อมูลเรียบร้อย</B></font>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <font size="3"><B>ผู้ใช้รายนี้ยังไม่สามารถใช้งานในระบบได้ ต้องได้รับการดำเนินการดังนี้ </B></font>
                                <ol>
                                    <li> กรอกแบบฟอร์มขอติดตั้งน้ำประปารายใหม่</li>
                                    <li> พนักงานติดตั้งน้ำประปาจัดการติดตั้งน้ำประปา</li>
                                    <li> ชำระเงินติดตั้งน้ำประปา</li>
                                    <li> ระบบทำการยืนยันอนุมัติใช้น้ำประปา</li>
                                </ol>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="../pdf_file/form_insert.php" class="btn btn-info pull-left" target="_blank"> พิมพ์แบบฟอร์ม</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->

                    <!-- ./col -->
                    <div class="col-md-2">
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

    </div>
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="../../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js"></script>
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