<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                จัดการเเก้ไขข้อมูลผู้ใช้น้ำประปา
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลผู้ใช้น้ำ</li>
                <li class="active">จัดการเเก้ไขข้อมูลผู้ใช้น้ำประปา</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายชื่อผู้ใช้น้ำ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">นามสกุล</th>
                                    <th class="text-center">ชื่อบัญชี</th>
                                    <th class="text-center">รหัสผ่าน</th>
                                    <th class="text-center">ตำเเหน่ง</th>
                                    <th class="text-center">เเก้ไข</th>

                                </tr>
                                </thead>
                                <?php
                                $num=1;
                                foreach ($objq as $r ) :
                                    $employee_id = $r['employee_id'];
                                    $duty = "SELECT * FROM duty INNER JOIN employee ON duty.duty_id = employee.duty_id WHERE employee.employee_id=$employee_id";
                                    $objq_duty = mysqli_query($conn,$duty);
                                    $objr_duty  =mysqli_fetch_array($objq_duty);
                                    ?>
                                    <tr>

                                        <td class="text-center"><?php echo $r["employee_id"]?></td>
                                        <td class="text-center"><?php echo $r["name"]?></td>
                                        <td class="text-center"><?php echo $r["lastname"]?></td>
                                        <td class="text-center"><?php echo $r["username"]?></td>
                                        <td class="text-center"><?php echo $r["password"]?></td>
                                        <td class="text-center"><?php echo $objr_duty["menu_duty"]?></td>
                                        <td class="text-center"> <a  type="button" data-toggle="tooltip" title="แก้ไขข้อมูล" class="btn btn-warning btn-sm" href="edit_employee_update.php?employee_id=<?php echo $r["employee_id"];?>"" ><i class="fa fa-eyedropper"></i></a>
                                            <a type="button" data-toggle="tooltip" title="ลบข้อมูล" class="btn btn-danger btn-sm" href="algorithm/delete_employee.php?employee_id=<?php echo $r["employee_id"]?>" onclick="return confirm('ยืนยันการลบข้อมูล')"><i class="fa fa-trash-o "></i></a> </td>
                                    </tr>
                                    <?php $num+=1; endforeach;?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
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

