<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
$sql_checkstatus = "SELECT * FROM house INNER JOIN status_install_water ON house.house_id = status_install_water.house_id WHERE house.status_use_water = 'N'";
$objq_checkstatus = mysqli_query($conn,$sql_checkstatus);
$objr_checkstatus = mysqli_fetch_array($objq_checkstatus);
$status_confirm_withdrawtool = $objr_checkstatus['status_confirm_withdrawtool'];
$user_id = $obj_employee['employee_id'];
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

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <font size="5">

            </font>
            <ol class="breadcrumb">

            </ol>
        </section>
        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-header">
                        รายการอุปกรณ์ที่ต้องการเบิก
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 table-responsive ">
                    <table class="table table-bordered  table-hover">
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
                            <td class="text-center" width="33%"><?php echo $obj_employee['menu_duty']?></td>
                            <td class="text-center" width="33%">ติดตั้งน้ำประปา</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <form action="algorithm/update_status5.php?house_id=<?php echo $_GET['house_id']?>&employee_id=<?=$obj_employee['employee_id'];?>" method="post">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" >ลำดับ</th>
                                <th class="text-center" >รหัสอุปกรณ์</th>
                                <th class="text-center" >รายการ</th>
                                <th class="text-center" >จำนวน</th>
                                <th class="text-center" >หน่วยนับ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'sql/select.php';
                            $house_id = $_GET['house_id'];
                            $num=1;
                            $money=0;
                            $totalmoney = 0;
                            $sql_checkaddress = select_star_inner('description_tool','receive_withdraw_tool','description_tool.description_tool_id','receive_withdraw_tool.tool_id','receive_withdraw_tool.house_id',$house_id);

                            foreach ($sql_checkaddress as $check):
                                (int)$money = $check['count_tool']*$check['price_tool'];


                                ?>
                                <tr>
                                    <td class="text-center"><?=$num;?></td>
                                    <td class="text-center"><?=$check['tool_id']?></td>
                                    <td class="text-center"><?=$check['name_tool']?></td>
                                    <td class="text-center"><?=$check['count_tool']?></td>
                                    <td class="text-center"><?=$check['unit']?></td>
                                    <input class = "hidden" type="text" name="num_tool[]" value="<?=$check['count_tool']?>">
                                    <input class = "hidden" type="text" name="id_tool[]" value="<?=$check['tool_id']?>">
                                </tr>

                                <?php $num++;
                                (int)$totalmoney = $totalmoney + $money;
                            endforeach; ?>
                            <?php ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">

                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" title="ยืนยัน" class="btn btn-primary" value="ยืนยันการเบิกอุปกรณ์">
                        <a href="../pdf_file/withdraw_tool.php?house_id=<?= $house_id?>" title="พิมพ์" class="btn btn-default" target="_blank"><i class="fa fa-print"> พิมพ์ใบเบิกอุปกรณ์ </i></a>
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

