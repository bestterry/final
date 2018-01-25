<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
require 'menu/time_format.php';
$sql = "SELECT * FROM employee";
$objq = mysqli_query($conn,$sql);
$objr_employee = mysqli_fetch_array($objq);

 $address=$_GET['address'];
 $village_no=$_GET['village_no'];

/* check_address == NULL */
$sql_check = "SELECT house_id FROM house WHERE address='$address' AND village_no='$village_no'" ;
$objq_check = mysqli_query($conn,$sql_check);
$objR_check = mysqli_fetch_array($objq_check);


if($objR_check==NULL) {

    header("location:manage_meter.php?error=nodata");
}
else{

        //search Address And name
        $sql1 = "SELECT * FROM house INNER JOIN customer ON house.customer_id=customer.customer_id WHERE house.address='$address' AND house.village_no='$village_no'" ;
        $objq1 = mysqli_query($conn,$sql1);
        $objR1 = mysqli_fetch_array($objq1);

        $sql = "SELECT * FROM house INNER JOIN meter_management ON house.house_id = meter_management.house_id WHERE meter_management.house_id ='$objR1[house_id]' ORDER BY meter_management.id DESC";
        $objq = mysqli_query($conn,$sql);
        $objR = mysqli_fetch_array($objq);


}
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
        <?php if (count($_GET)==2){}

        else{ ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด!</strong>กรุณาตรวจสอบค่าน้ำที่ท่านกรอก
            </div>
        <?php }?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><B>เพิ่มค่าน้ำประปา</B></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">จัดการค่าน้ำประปา</a></li>
                <li class="active">เพิ่มค่าน้ำประปา</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">

                    <div class="col-md-5">

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> ข้อมูลส่วนตัว</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> ชื่อ</strong>

                                <p class="text-muted">
                                    <?php echo $objR1['name']?> <?php echo $objR1['lastname']?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> ที่อยู่</strong>

                                <p class="text-muted">บ้านเลขที่ :<?php echo $objR1['address']?>   หมู่ที่ : <?php echo $objR1['village_no']?></p>
                                <hr>

                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">กรุณากรอกค่าน้ำ</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="manage_meter_confirm.php" class="form-horizontal"  method="get">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">ค่ามิเตอร์:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="meter" class="form-control" id="inputEmail3" value="">
                                            <input type="hidden" name="house_id" class="form-control" id="house_id" value="<?=$objR1['house_id']?>">
                                         </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success pull-right">ตกลง</button>
                                        <a href="manage_meter.php" type="button" class="btn btn-danger pull-left" onclick="return confirm('กรุณากด ตกลง เพื่อย้อนกลับ')">ย้อนกลับ</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                        <div class="col-md-7">
                         <div class="box">
                           <div class="box-header">
                              <h3 class="box-title">ค่ามิเตอร์ย้อนหลัง</h3>
                               <div class="box-body">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ค่่าน้ำก่อนใช้</th>
                                            <th>ค่าน้ำหลังใช้</th>
                                            <th>ค่าน้ำที่ใช้</th>
                                            <th>จำนวนเงิน</th>
                                            <th>วันที่</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($objq as $r):?>
                                            <tr>
                                                <td><?php echo $r['meter_id']?></td>
                                                <td><?php echo $r['meter_previos']?></td>
                                                <td><?php echo $r['meter_after']?></td>
                                                <td><?php echo $r['meter_united']?></td>
                                                <td><?php echo $r['money']?></td>
                                                <td><?php echo DateThai($r['datatime'])?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
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

