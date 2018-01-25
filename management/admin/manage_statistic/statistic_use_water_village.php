<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
require 'menu/time_format.php';
     $month_before=$_GET['month_before'];
     $year_before=$_GET['year_before'];
     $month_after=$_GET['month_after'];
     $year_after=$_GET['year_after'];
   //ค้นหาชื่อหมู่บ้านหมู่บ้าน
//echo DateThaiMonth($month_before);
//die();
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
    <aside class="main-sidebar" style="background: rgba(255, 255, 255, 0.1)";>
        <!-- sidebar: style can be found in sidebar.less -->
        <?php require 'menu/navbar.php';?>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <dl class="dl-horizontal">

                                <dt>ชื่อพนักงาน</dt>
                                <dd><?php echo $obj_employee['name']?>  <?php echo $obj_employee['lastname']?></dd>
                                <dt>หน้าที่</dt>
                                <dd><?php  echo $obj_employee['menu_duty']?></dd>
                                <dt>ข้อมูลใช้น้ำประจำเดือน</dt>
                                <dd><?php echo DateThaiMonth($month_before).'-'?><?php echo DateThaiYear($year_before)?> ถึง  <?php echo DateThaiMonth($month_after).'-'?><?php echo DateThaiYear($year_after)?> </dd>
                            </dl>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- form start -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="box-body">
                                    <div class="box-header">
                                        <h3 class="box-title">เลือกหมู่บ้าน หรือ ดูทั้งหมด</h3> <a type="button" href="all_stat.php?month_before=<?php echo $month_before?>&year_before=<?php echo $year_before?>&month_after=<?php echo $month_after?>&year_after=<?php echo $year_after?>" target="_blank"" title="ดูทั้งหมด" class="btn btn-success"><i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="mailbox-read-message">
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center" width="20%">หมู่ที่</th>
                                                <th class="text-center" width="60%">ชื่อหมู่บ้าน</th>
                                                <th class="text-center" width="20%">รายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($objq_village as $village):?>
                                                <tr>
                                                    <td class="text-center" width="20%"><?php echo $village['village_no']?></td>
                                                    <td class="text-center" width="60%"><?php echo $village['name']?></td>
                                                    <td class="text-center" width="20%"><a href="st_month.php?village_no=<?php echo $village["village_no"]?>&month_before=<?php echo $month_before?>&year_before=<?php echo $year_before?>&month_after=<?php echo $month_after?>&year_after=<?php echo $year_after?>" target="_blank">
                                                            <i class="fa fa-check-circle-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><br><br>

                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>

        </section>
    </div>
    <!-- /.content -->
</div>
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

