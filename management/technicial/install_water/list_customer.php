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

    $sql_checkcount = "SELECT COUNT(status_use_water_id) FROM status_install_water WHERE  status_manage_install = 'N'";
    $objq_checkcount = mysqli_query($conn,$sql_checkcount);
    $objr_check_count = mysqli_fetch_array($objq_checkcount);
    $count_id = $objr_check_count["COUNT(status_use_water_id)"];

    $sql_status_numtool = "SELECT COUNT(status_use_water_id) FROM status_install_water WHERE status_withdraw_tool='Y' AND status_num_withdraw_tool = 'N'";
    $objq_status_numtool = mysqli_query($conn,$sql_status_numtool);
    $objr_status_numtool = mysqli_fetch_array($objq_status_numtool);
    $count_numtool = $objr_status_numtool["COUNT(status_use_water_id)"];

    $sql_status_confirm = "SELECT COUNT(status_use_water_id) FROM status_install_water WHERE status_payment='Y' AND status_confirm_withdrawtool = 'N'";
    $objq_status_confirm = mysqli_query($conn,$sql_status_confirm);
    $objr_status_confirm = mysqli_fetch_array($objq_status_confirm);
    $count_confirm = $objr_status_confirm["COUNT(status_use_water_id)"];

    $sql_status_install = "SELECT COUNT(status_use_water_id) FROM status_install_water WHERE status_confirm_withdrawtool = 'Y' AND status_manage_install = 'N'";
    $objq_status_install = mysqli_query($conn,$sql_status_install);
    $objr_status_install = mysqli_fetch_array($objq_status_install);
    $count_install = $objr_status_install["COUNT(status_use_water_id)"];

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
            <h1>
                <B>จัดการเเก้ไขสถานะผู้ใช้น้ำประปา</B>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลผู้ใช้น้ำ</li>
                <li class="active">จัดการเเก้ไขสถานะผู้ใช้น้ำประปา</li>
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
                            <div class="col-md-12">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#activity" data-toggle="tab"> รายละเอียดสถานะติดตั้งน้ำประปา &nbsp;
                                                <?php if($count_id==0){
                                                    echo '';
                                                    }
                                                    else{
                                                    ?>
                                                     <small class="label pull-right bg-red"> <?php echo $count_id;?></small>
                                                <?php }?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#timeline" data-toggle="tab">ส่งรายการและจำนวนอุปกรณ์ &nbsp;
                                                <?php if($count_numtool==0){
                                                    echo '';
                                                }
                                                else{
                                                    ?>
                                                    <small class="label pull-right bg-red"> <?php echo $count_numtool;?></small>
                                                <?php }?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings" data-toggle="tab">ดำเนินการถอนอุปกรณ์ &nbsp;
                                                <?php if($count_confirm==0){
                                                    echo '';
                                                }
                                                else{
                                                    ?>
                                                    <small class="label pull-right bg-red"> <?php echo $count_confirm;?></small>
                                                <?php }?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#install" data-toggle="tab">ดำเนินการติดตั้งอุปกรณ์ &nbsp;
                                                <?php if($count_install==0){
                                                    echo '';
                                                }
                                                else{
                                                    ?>
                                                    <small class="label pull-right bg-red"> <?php echo $count_install;?></small>
                                                <?php }?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <!-- รายละเอียดสถานะ -->
                                        <div class="active tab-pane" id="activity">
                                            <!-- Post -->
                                            <div class="box-body">
                                                <table id="example" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">บ้านเลขที่</th>
                                                        <th class="text-center">หมู่ที่</th>
                                                        <th class="text-center">สถานะขอใช้น้ำประปา</th>
                                                        <th class="text-center">สถานะติดตั้งอุปกรณ์</th>
                                                        <th class="text-center">ตรวจสอบสถานะติดตั้งอุปกรณ์</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    $sql_checkstatus = "SELECT * FROM house INNER JOIN status_install_water ON house.house_id = status_install_water.house_id ";
                                                    $objq_checkstatus = mysqli_query($conn,$sql_checkstatus);
                                                    $objr_checkstatus = mysqli_fetch_array($objq_checkstatus);
                                                    foreach ($objq_checkstatus as $r ) :?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $r["address"]?></td>
                                                            <td class="text-center"><?php echo $r["village_no"]?></td>
                                                            <td class="text-center"><span class="label label-success">เสร็จสิ้น</span></td>
                                                            <td class="text-center">
                                                                <?php
                                                                    if($r["status_manage_install"] == 'N'){
                                                                        echo '<span class="label label-danger"> ';
                                                                        echo "ไม่เสร้จสิ้น" ;
                                                                        echo '</span>';
                                                                    }
                                                                    else    {
                                                                        echo '<span class="label label-success"> ';
                                                                        echo "เสร็จสิ้น";
                                                                        echo '</span>';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a type="button" class="btn btn-warning btn-sm" title="ตรวจสอบสถานะติดตั้งอุปกรณ์" href="check_status.php?house_id=<?php echo $r["house_id"]?>"><i class="fa fa-search"></i></a>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach;?>
                                                </table>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /รายละเอียดสถานะ -->

                                        <!-- ส่งรายการและจำนวนอุปกรณ์ -->
                                        <div class="tab-pane" id="timeline">
                                            <div class="box-body">
                                                <table id="example" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">บ้านเลขที่</th>
                                                        <th class="text-center">หมู่ที่</th>
                                                        <th class="text-center">สถานะสรุปรายการอุปกรณ์ที่ต้องใช้</th>
                                                        <th class="text-center">ส่งข้อมูลอุปกรณ์ที่ต้องใช้</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                        $sql_check_sent_withdraw = "SELECT * FROM house INNER JOIN status_install_water ON house.house_id = status_install_water.house_id WHERE status_install_water.status_withdraw_tool = 'Y' AND status_install_water.status_num_withdraw_tool = 'N'";
                                                        $objq_check_sent_withdraw = mysqli_query($conn,$sql_check_sent_withdraw);
                                                        $objr_check_sent_withdraw = mysqli_fetch_array($objq_check_sent_withdraw);
                                                        foreach ($objq_check_sent_withdraw as $sent ) :
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $sent["address"]?></td>
                                                            <td class="text-center"><?php echo $sent["village_no"]?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                    echo '<span class="label label-danger"> ';
                                                                    echo "ยังไม่ได้ส่ง" ;
                                                                    echo '</span>';
                                                                ?>
                                                            </td>
                                                            <td class="text-center"> <a type="button" class="btn btn-warning btn-sm" title="ส่งข้อมูลอุปกรณ์ที่ต้องใช้" href="pick_tool.php?user_id=<?=$user_id?>&house_id=<?=$sent["customer_id"]?>&status_id=<?=$sent["status_use_water_id"]?>" id="myHref" ><i class="fa fa-upload"></i></a> </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </table>
                                            </div>
                                        </div>
                                        <!--  /ส่งรายการและจำนวนอุปกรณ์ -->

                                        <!-- ดำเนินการเบิกอุปกรณ์ -->
                                        <div class="tab-pane" id="settings">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="row">
                                                    <table id="example" class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">บ้านเลขที่</th>
                                                            <th class="text-center">หมู่ที่</th>
                                                            <th class="text-center">สถานะถอนอุปกรณ์</th>
                                                            <th class="text-center">จัดการถอนอุปกรณ์ะ</th>
                                                        </tr>
                                                        </thead>
                                                        <tr>
                                                            <?php
                                                                $check_succress = "SELECT * FROM status_install_water INNER JOIN house ON house.house_id = status_install_water.house_id WHERE status_install_water.status_payment='Y' AND status_install_water.status_confirm_withdrawtool='N'";
                                                                $objq_check_succress = mysqli_query($conn,$check_succress);
                                                                foreach ($objq_check_succress as $succress):
                                                            ?>
                                                            <td class="text-center"><?=$succress['address'];?></td>
                                                            <td class="text-center"><?=$succress['village_no'] ?></td>
                                                            <td class="text-center"><span class="label label-danger">ยังไม่ได้อนุมัติ</span></td>
                                                            <td class="text-center"> <a type="button" class="btn btn-warning btn-sm" title="จัดการถอนอุปกรณ์" href="confirm_withdraw.php?house_id=<?=$succress['house_id']?>"><i class="fa fa-upload"></i></a> </td>
                                                        </tr>
                                                        <?php
                                                            endforeach;
                                                        ?>
                                                    </table>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /ดำเนินการเบิกอุปกรณ์ -->

                                        <!-- ดำเนินการติดตั้งอุปกรณ์ -->
                                        <div class="tab-pane" id="install">
                                            <div class="box-body">
                                                <table id="example" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">บ้านเลขที่</th>
                                                        <th class="text-center">หมู่ที่</th>
                                                        <th class="text-center">สถานะติดตั้งการอุปกรณ์</th>
                                                        <th class="text-center">ยืนยันติดตั้งน้ำประปา</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                        $sql_check_sent_withdraw = "SELECT * FROM house INNER JOIN status_install_water ON house.house_id = status_install_water.house_id WHERE status_install_water.status_confirm_withdrawtool = 'Y' AND status_install_water.status_manage_install = 'N'";
                                                        $objq_check_sent_withdraw = mysqli_query($conn,$sql_check_sent_withdraw);
                                                        $objr_check_sent_withdraw = mysqli_fetch_array($objq_check_sent_withdraw);
                                                        foreach ($objq_check_sent_withdraw as $sent ) :
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $sent["address"]?></td>
                                                            <td class="text-center"><?php echo $sent["village_no"]?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                    echo '<span class="label label-danger"> ';
                                                                    echo "ยังไม่ได้ติดตั้ง" ;
                                                                    echo '</span>';
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a type="button" class="btn btn-warning btn-sm" title="ยืนยันติดตั้งน้ำประปา" href="algorithm/update_status6.php?employee_id=<?=$user_id?>&house_id=<?=$sent["customer_id"]?>&status_id=<?=$sent["status_use_water_id"]?>" onclick="return confirm('ยืนยันติดตั้งอุปกรณ์น้ำประปา')"><i class="fa fa-upload"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /ดำเนินการติดตั้งอุปกรณ์ -->

                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
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

