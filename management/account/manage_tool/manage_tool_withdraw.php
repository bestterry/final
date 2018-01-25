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
                เบิกอถอนุปกรณ์
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">ข้อมูลอุกรณ์</a></li>
                <li class="active">เบิกอถอนุปกรณ์</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> การประปา ตำบลบ้านถ้ำ
                    </h2>
                </div>
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
                            <td class="text-center" width="33%"> <?php echo $obj_employee['name']?>  <?php echo $obj_employee['lastname']?></td>
                            <td class="text-center" width="33%"><?php echo $obj_employee['duty_id']?></td>
                            <td class="text-center" width="33%"><?php echo $_POST['type']?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <form action="manage_tool_withdraw_confirm.php" method="post">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสอุปกรณ์</th>
                                <th>ฃื่ออุปกรณ์</th>
                                <th>จำนวน</th>
                                <th class="text-center" width="15%">จำนวนที่ต้องการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <input class = "hidden" type="text" name="type" value="<?php echo $_POST['type']?>">
                            <?php

                            for($i=0;$i<count($_POST["menu"]);$i++)

                            {
                                if(trim($_POST["menu"][$i]) != "")
                                {
                                    $menu=$_POST['menu'][$i];
                                    $sql_tool = "SELECT * FROM description_tool WHERE description_tool_id ='$menu'"; //Numเป็นลำดับที่ DBใหม่ไม่มีลำดับ
                                    $objq_tool = mysqli_query($conn, $sql_tool);
                                    $objr_tool = mysqli_fetch_array($objq_tool);

                                    ?>
                                    <tr>
                                        <td><?php echo 'test' ?></td>
                                        <td><?php echo $objr_tool['description_tool_id'] ?></td>
                                        <td><?php echo $objr_tool['name_tool'];?></td>
                                        <td><?php echo $objr_tool['num_tool']?></td>
                                        <td class="text-center" width="15%" ><input type="text" name="num_tool[]"  class="form-control col-md-2" placeholder="จำนวน">
                                            <input class = "hidden" type="text" name="id_tool[]" value="<?php echo $objr_tool['description_tool_id']?>">
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success pull-right" value="ตกลง" onclick="if(confirm('ยืนยันการเบิกอุปกรณ์')) return true; else return false;">
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

