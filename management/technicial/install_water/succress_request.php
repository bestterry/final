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

    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../plugins/iCheck/flat/blue.css">


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
                ใบเสร็จเบิกอุปกรณ์
            </font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">ข้อมูลอุกรณ์</a></li>
                <li class="active">ใบเสร็จเบิกอุปกรณ์</li>
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
                <form action="algorithm/update_status2.php?house_id=<?php echo $_GET['house_id']?>&user_id=<?=$obj_employee['employee_id']?>" method="post">
                    <div class="col-xs-6 table-responsive ">
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
                                <td class="text-center" width="33%"><?php echo $obj_employee['menu_duty']?></td>
                                <td class="text-center" width="33%">ติดตั้งน้ำประปา</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 table-responsive ">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" >ลำดับ</th>
                                <th class="text-center" >รหัสอุปกรณ์</th>
                                <th class="text-center" >รายการ</th>
                                <th class="text-center" >จำนวน</th>
                                <th class="text-center" width="15%">ราคา/หน่วย</th>
                                <th class="text-center" width="15%">รวมเป็นเงิน</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $num=1;
                                $money = 0;
                                for($i=0;$i<count($_POST['num_tool']);$i++){
                                    $menu=$_POST['id_tool'][$i];
                                    $sql_tool = "SELECT * FROM description_tool WHERE description_tool_id = '$menu'";
                                    $objq_tool = mysqli_query($conn, $sql_tool);
                                    $objr_tool = mysqli_fetch_array($objq_tool);
                                    $money = (int)$objr_tool['price_tool'] * (int)$_POST['num_tool'][$i];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $num;?></td>
                                    <td class="text-center"><?php echo $_POST['id_tool'][$i];?></td>
                                    <td class="text-center"><?php echo $_POST['name_tool'][$i];?></td>
                                    <td class="text-center"><?php echo $_POST['num_tool'][$i];?></td>
                                    <td class="text-center"><?php echo $objr_tool['price_tool'];?></td>
                                    <td class="text-center"><?=$money?></td>
                                    <input class = "hidden" type="text" name="num_tool[]" value="<?php echo $_POST['num_tool'][$i]?>">
                                    <input class = "hidden" type="text" name="id_tool[]" value="<?php echo $_POST['id_tool'][$i]?>">

                                </tr>

                                <?php $num++;} ?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success pull-right" value="ส่งข้อมูล" onclick="if(confirm('ยืนยันส่งข้อมูลรายการอุปกรณ์และจำนวนอุปกรณ์ที่ต้องการเบิก')) return true; else return false;">
                    </div>
                </form>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
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
<!-- page script -->
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
<script src="../../../plugins/iCheck/icheck.min.js"></script>
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
    });


</script>
</body>
</html>

