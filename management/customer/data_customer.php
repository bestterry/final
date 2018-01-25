<?php require 'menu/sesion.php'?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';?>
    <?php require '../font/font_style.php'; ?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <!-- Logo -->
        <a href="homepage_customer.php" class="logo">
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
            <font size="4"><B>ข้อมูลส่วนตัว</B></font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลส่วนตัว</li>
            </ol>
        </section>
        <!-- Main content -->
        <form action="algorithm/insert_customer.php" method="post" name="form1"
              onSubmit="JavaScript:return fncSubmit();">
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user2-160x160.png" alt="User profile picture">

                                <h3 class="profile-username text-center"><?=$objr_customer['name']?> <?=$objr_customer['lastname']?></h3>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <a href="update_password.php">
                                            <i class="fa fa-lock"></i> <span>เปลี่ยนรหัสผ่าน</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="update_data.php">
                                            <i class="fa fa-cog"></i> <span>แก้ไขข้อมูลส่วนตัว</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                    <div class="form-group">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="box box-info">
                                                    <div role="form">
                                                        <div class="box-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>ชื่อ-นามสกุล :</B> <?= $objr_customer['name'] ?> <?= $objr_customer['lastname'] ?></h5>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>รหัสบัตรประชาชน :</B> <?= $objr_customer['card_number'] ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>เพศ :</B> <?= $objr_customer['sex'] ?></h5>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>อาชีพ :</B> <?= $objr_customer['career'] ?></h5>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>โทรศัพท์ :</B> <?= $objr_customer['Phone'] ?></h5>
                                                                </div>
                                                                <!-- Date -->
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>วันเกิด :</B> <?= $objr_customer['birth'] ?></h5>
                                                                </div>
                                                                <!-- /.form group -->
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>e-mail :</B> <?= $objr_customer['Email'] ?></h5>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <h5><B>ที่อยู่ :</B> บ้านเลขที่ <?= $objr_customer['address'] ?> หมู่ที่ <?= $objr_customer['village_no'] ?>
                                                                        ตำบล<?= $objr_customer['subdistrict'] ?> อำเภอ<?= $objr_customer['district'] ?>  จังหวัด<?= $objr_customer['province'] ?>
                                                                        รหัสไปรษณีย์ <?= $objr_customer['postcode'] ?> </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>

                </div>

                <!-- /.row -->

            </section>
        </form>
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

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
