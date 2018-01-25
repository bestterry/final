<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';


$sql_tool="SELECT * FROM description_tool";
$objq_tool=mysqli_query($conn, $sql_tool);
$num = 1;

$sql_edit_tool="SELECT * FROM description_tool WHERE description_tool_id = '$_GET[description_tool_id]'";
$objq_edit_tool=mysqli_query($conn, $sql_edit_tool);
$objr_edit_tool=mysqli_fetch_array($objq_edit_tool);

//$keytool = $objr_edit_tool['Num'];
$idtool=$objr_edit_tool['description_tool_id'];
$nametool=$objr_edit_tool['name_tool'];
$numtool=$objr_edit_tool['num_tool'];
$pricetool=$objr_edit_tool['price_tool'];

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
        <a href="../homepage_technicial.php" class="logo">
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
            <font size="5">
                เพิ่มอุปกรณ์
            </font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">อุปกรณ์</a></li>
                <li class="active">เพิ่มอุปกรณ์</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">รายการอุปกรณ์</h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="mailbox-read-message">
                                <form action="algorithm/insert_num_tool.php" method="get">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <th width="20%">รหัสอุปกรณ์</th>
                                            <th class="text-center" width="40%">ชื่ออุปกรณ์</th>
                                            <th class="text-center" width="15%">จำนวนที่มีอยู่</th>
                                            <th class="text-center" width="15%">จำนวนที่เพิ่ม</th>

                                        <tr>
                                            <td width="20%">
                                                <div class="form-group">
                                                    <input type="text" name="txtidtool" class="form-control" value="<?php echo $idtool?>" disabled>
                                                    <input type="hidden" name="id_tool" class="form-control" value="<?php echo $idtool?>">
                                                    <input type="hidden" name="employee_id" class="form-control" value="<?php echo $employee_id?>">
                                                </div>
                                            </td>
                                            <td width="40%">
                                                <div class="form-group">
                                                    <input type="text" name="txtnametool" class="form-control "  value="<?php echo $nametool?>" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center" width="15%">
                                                <div class="form-group">
                                                    <input type="text" name="txtnumtool" class="form-control" value="<?php echo $numtool?>" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center" width="15%">
                                                <div class="form-group">
                                                    <input type="text" name="addtool" class="form-control" value="0">
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="box-footer">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary" onclick="if(confirm('ยืนยันการบันทึก')) return true; else return false;"> บันทึก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  <!-- /.mailbox-read-message -->
                    </div>
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

