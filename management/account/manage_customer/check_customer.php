<?php require 'menu/sesion.php';
$sql = "SELECT * FROM customer INNER JOIN house ON customer.customer_id=house.customer_id ORDER BY house.village_no ASC";
$objq = mysqli_query($conn,$sql);
$objR = mysqli_fetch_array($objq);
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <font size="5">ตรวจสอบข้อมูลผู้ใช้น้ำประปา</font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>จัดการข้อมูลผู้ใช้น้ำประปา</li>
                <li class="active">ตรวจสอบข้อมูลผู้ใช้น้ำประปา</li>
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
                                    <th class="text-center">ลำดับ</th>
                                    <th width="10%" class="text-center">UserID</th>
                                    <th width="25%" class="text-center">ชื่อ</th>
                                    <th width="25%" class="text-center">นามสกุล</th>
                                    <th width="10%" class="text-center">บ้านเลขที่</th>
                                    <th width="10%" class="text-center">หมู่ที่</th>
                                    <th width="15%" class="text-center">ข้อมูลส่วนตัว</th>
                                </tr>
                                </thead>

                                <?php
                                    $num=1;
                                    foreach ($objq as $r ) :?>
                                    <tr>
                                        <td class="text-center" width="5"><?php echo $num?></td>
                                        <td width="10%" class="text-center"><?php echo $r["customer_id"]?></td>
                                        <td width="25%" class="text-center"><?php echo $r["name"]?></td>
                                        <td width="25%" class="text-center"><?php echo $r["lastname"]?></td>
                                        <td width="10%" class="text-center"><?php echo $r["address"]?></td>
                                        <td width="10%" class="text-center"><?php echo $r["village_no"]?></td>
                                        <td width="15%" class="text-center"> <a href="check_customer_data.php?customer_id=<?php echo $r["customer_id"];?>"><i class="fa fa-search" data-toggle="tooltip" title="ตรวจสอบข้อมูลส่วนตัว"></i></a></td>
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
