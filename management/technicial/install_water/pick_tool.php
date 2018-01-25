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

//select tool form database.
$sql_tool="SELECT * FROM description_tool";
$objq_tool=mysqli_query($conn, $sql_tool);

$status_confirm_withdrawtool = $objr_checkstatus['status_confirm_withdrawtool'];
$user_id = $_GET['user_id'];



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
            <font size="4"><B>
                    ถอนอุปกรณ์
                </B>
            </font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>อุปกรณ์</li>
                <li class="active">ถอนอุปกรณ์</li>
            </ol>
        </section>

        <!-- Main content -->
        <form action="withdraw_tool.php?house_id=<?php echo $_GET['house_id']?>" method="post" target="_blank">
            <section class="invoice">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> การประปา ตำบลบ้านถ้ำ
                        </h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive mailbox-messages">
                                    <font size="3" color="red">*กรุณาเลือกรายการที่ต้องการถอน</font>
                                    <table class="table table-hover table-striped table-bordered ">
                                        <tbody>
                                        <tr>
                                            <th width="15%">
                                                <div class="mailbox-controls">
                                                    <!-- Check all button -->
                                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                                        <i class="fa fa-square-o"></i>
                                                    </button>
                                                    <span> เลือกทั้งหมด</span>
                                                </div>
                                            </th>
                                            <th class="text-center" width="10%">ลำดับ</th>
                                            <th class="text-center"width="10%">รหัสอุปกรณ์</th>
                                            <th class="text-center" width="35%">ชื่ออุปกรณ์</th>
                                            <th class="text-center" width="10%">จำนวนคงเหลือ</th>
                                            <?php $num=1; foreach ($objq_tool as $tool):?>
                                        <tr>
                                            <td width="15%"><input type="checkbox" name="menu[]" value="<?php echo $tool['description_tool_id']?>"></td>
                                            <td class="text-center" width="10%"><?php  echo $num;?></td>
                                            <td class="text-center" width="10%"><?php echo $tool['description_tool_id']?></td>
                                            <td class="text-center" width="35%"><?php echo $tool['name_tool']?></td>
                                            <td class="text-center" width="15%"><?php echo $tool['num_tool']?></td>
                                        </tr>
                                        <?php $num++?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit"  class="btn btn-success pull-right" onclick="return confirm('ยืนยันสรายการอุปกรณ์')">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
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
    })
    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");

            //Switch states
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }

            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });
    });
</script>
</body>
</html>

