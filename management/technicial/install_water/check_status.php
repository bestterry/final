<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
require 'sql/select.php';
$house_id = $_GET['house_id'];
$sql_checkstatus = "SELECT * FROM house INNER JOIN status_install_water ON house.house_id = status_install_water.house_id WHERE house.house_id='$house_id'";
$objq_checkstatus = mysqli_query($conn,$sql_checkstatus);
$objr_checkstatus = mysqli_fetch_array($objq_checkstatus);

$status_withdraw_tool = $objr_checkstatus['status_withdraw_tool'];
$status_num_withdraw_tool = $objr_checkstatus['status_num_withdraw_tool'];
$status_confirm_with_boss = $objr_checkstatus['status_confirm_with_boss'];
$status_payment = $objr_checkstatus['status_payment'];
$status_confirm_withdrawtool = $objr_checkstatus['status_confirm_withdrawtool'];
$status_manage_install = $objr_checkstatus['status_manage_install'];

$withdraw_class1 = $objr_checkstatus['withdraw_class1'];
$withdraw_class2 = $objr_checkstatus['withdraw_class2'];
$withdraw_class3 = $objr_checkstatus['withdraw_class3'];
$withdraw_class4 = $objr_checkstatus['withdraw_class4'];
$withdraw_class5 = $objr_checkstatus['withdraw_class5'];
$withdraw_class6 = $objr_checkstatus['withdraw_class6'];
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
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form class="form-horizontal" action="../algorithm/update_status.php" method="post">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <font size="3">สถานะติดตั้งน้ำประปา</font>
                            </div>
                            <div class="box-body">
                                <div class="form-group col-sm-6">

                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <dl><?php
                                            $sql_checkcustomer = "SELECT * FROM house INNER JOIN customer ON house.customer_id = customer.customer_id WHERE house.house_id='$house_id'";
                                            $objq_customer = mysqli_query($conn,$sql_checkcustomer);
                                            $objr_customer = mysqli_fetch_array($objq_customer);
                                            ?>
                                            <dt>ชื่อ-นามสกุล</dt>
                                            <dd><?= $objr_customer['name']?> <?=$objr_customer['lastname']?></dd>
                                            <dt>ที่อยู่</dt>
                                            <dd><?php echo $objr_customer['address']?> หมู่ที่ <?php echo $objr_customer['village_no']?> ต.บ้านถ้ำ อ.ดอกคำใต้ จ.พะเยา 56120
                                            </dd>

                                        </dl>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                                <div class="form-group col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th width="35%" class="text-center">รายการ</th>
                                        <th width="25%" class="text-center">ผู้รับเรื่องรายการ</th>
                                        <th width="15%" class="text-center">สถานะอนุมัติรายการ</th>
                                        <th width="25%" class="text-center">ผู้อนุมัติรายการ</th>
                                        </thead>
                                        <tbody>

                                        <!--สถานะส่งเรื่องถอนอุปกรณ์-->
                                        <tr>
                                            <td>ส่งเรื่องถอนอุปกรณ์</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class1);
                                                $user_name = mysqli_fetch_array($select_position);

                                                if($status_withdraw_tool == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php if ($status_withdraw_tool == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?></td>
                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class1);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_withdraw_tool == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!--สถานะย่งเรื่องถอนอุปกรณ์-->

                                        <!--สถานะยืนยันรายการอุปกรณ์-->
                                        <tr>
                                            <td>พนักงานสรุปรายการอุปกรณ์ที่ต้องใช้</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class2);
                                                $user_name = mysqli_fetch_array($select_position);

                                                if($status_withdraw_tool == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($status_num_withdraw_tool == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class2);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_num_withdraw_tool == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                        <!--สถานะยืนยันรายการอุปกรณ์-->

                                        <!--สถานะยืนยันจำนวนอุปกรณ์-->
                                        <tr>
                                            <td>ยืนยันจำนวนอุปกรณ์ที่ต้องใช้</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class3);
                                                $user_name = mysqli_fetch_array($select_position);

                                                if($status_withdraw_tool == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($status_confirm_with_boss == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?>
                                            </td>

                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class3);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_confirm_with_boss == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!--สถานะยืนยันจำนวนอุปกรณ์-->

                                        <!--สถานะจ่ายเงิน-->
                                        <tr>
                                            <td>ชำระค่าอุปกรณ์</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class4);
                                                $user_name = mysqli_fetch_array($select_position);
                                                if($status_payment == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($status_payment == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class4);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_payment == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!--สถานะจ่ายเงิน-->

                                        <!--สถานะดำเนินการเบิกอุปกรณ์-->
                                        <tr>
                                            <td>ดำเนินการเบิกอุปกรณ์</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class5);
                                                $user_name = mysqli_fetch_array($select_position);

                                                if($status_confirm_withdrawtool == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($status_confirm_withdrawtool == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class5);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_confirm_withdrawtool == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!--สถานะดำเนินการเบิกอุปกรณ์-->

                                        <!--สถานะติดตั้งอุปกรณ์-->
                                        <tr>
                                            <td>ดำเนินการติดตั้งน้ำประปา</td>
                                            <td class="text-center">
                                                <?php
                                                $select_position = select_star_inner('employee','duty','employee.duty_id','duty.duty_id','employee.employee_id',$withdraw_class6);
                                                $user_name = mysqli_fetch_array($select_position);

                                                if($status_manage_install == 'Y'){
                                                    echo $user_name['menu_duty'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($status_manage_install == 'Y'){
                                                    echo '<span class="fa fa-check"></span>' ;
                                                }else{echo '';}
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $select_name = select_star_where('employee','employee_id',$withdraw_class6);
                                                $user_name = mysqli_fetch_array($select_name);

                                                if($status_manage_install == 'Y'){
                                                    echo $user_name['name'];
                                                    echo '&nbsp;&nbsp';
                                                    echo $user_name['lastname'];
                                                }else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!--สถานะติดตั้งอุปกรณ์-->

                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer">

                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </section>
    </div>
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

