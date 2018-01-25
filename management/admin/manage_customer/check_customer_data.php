<?php
require 'menu/sesion.php';
require 'menu/time_format.php';
$customer_id=$_GET['customer_id'];
$sql_name = "SELECT * FROM house INNER JOIN customer ON customer.customer_id=house.customer_id  WHERE house.customer_id=$customer_id";
$objq_name = mysqli_query($conn, $sql_name);
$objr_name = mysqli_fetch_array($objq_name);

$villageid = $objr_name['house_id'];
$sql_meter = "SELECT * FROM meter_management WHERE house_id = $villageid";
$objq_meter = mysqli_query($conn, $sql_meter);
$objr_meter = mysqli_fetch_array($objq_meter);
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
                ข้อมูลส่วนตัวผู้ใช้น้ำประปา
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">จัดการข้อมูลผู้ใช้น้ำประปา</a></li>
                <li class="active">ข้อมูลส่วนตัวผู้ใช้น้ำประปา</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="../../../dist/img/customer.png" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $objr_name['name']?>  <?php echo $objr_name['lastname']?></h3>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">ที่อยู่</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <p class="text-muted">
                                บ้านเลขที่ <?php echo $objr_name['address']?>  หมู่ที่ <?php echo $objr_name['village_no']?> ตำบลบ้านถ้ำ
                            </p>
                            <p class="text-muted">อำเภอดอกคำใต้ จังหวัดพะเยา 56210</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">ประวัติการใช้น้ำ</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="post">
                                        <table id="example" class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">วันที่</th>
                                                <th class="text-center">ค่าน้ำก่อนใช้</th>
                                                <th class="text-center">ค่าน้ำหลังใช้</th>
                                                <th class="text-center">ค่าน้ำที่ใช้</th>
                                                <th class="text-center">คิดเป็นเงิน(บาท)</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            if($objr_meter == null){
                                            ?>
                                            <tr>
                                                <td width="200"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <?php
                                                }else
                                                    ?>
                                                <?php foreach ($objq_meter as $m): ?>
                                            <tr>
                                                <td width="200"><?php echo DateThai($m["datatime"])?></td>
                                                <td class="text-center"><?php echo $m["meter_previos"]?></td>
                                                <td class="text-center"><?php echo $m["meter_after"]?></td>
                                                <td class="text-center"><?php echo $m["meter_united"]?></td>
                                                <td class="text-center"><?php echo $m["money"]?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

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
