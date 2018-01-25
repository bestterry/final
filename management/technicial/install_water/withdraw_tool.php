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
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <form action="succress_request.php?house_id=<?php echo $_GET['house_id']?>" method="post">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">รหัสอุปกรณ์</th>
                                <th class="text-center">ฃื่ออุปกรณ์</th>
                                <th class="text-center">จำนวนคงเหลือ</th>
                                <th class="text-center" width="15%">จำนวนที่ต้องการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <input class = "hidden" type="text" name="type" value="<?php echo $_POST['type']?>">
                            <input class = "hidden" type="text" name="house_id" value="<?php echo $_GET['house_id']?>">
                            <?php
                            $num=1;
                            for($i=0;$i<count($_POST["menu"]);$i++)

                            {
                                if(trim($_POST["menu"][$i]) != "")
                                {
                                    $menu=$_POST['menu'][$i];
                                    $sql_tool = "SELECT * FROM description_tool WHERE description_tool_id = '$menu'";
                                    $objq_tool = mysqli_query($conn, $sql_tool);
                                    $objr_tool = mysqli_fetch_array($objq_tool);

                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $num;?></td>
                                        <td class="text-center"><?php echo $objr_tool['description_tool_id'] ?></td>
                                        <td class="text-center"><?php echo $objr_tool['name_tool'];?></td>
                                        <td class="text-center"><?php echo $objr_tool['num_tool']?></td>
                                        <td class="text-center" width="15%" ><input type="text" name="num_tool[]"  class="form-control col-md-2" placeholder="จำนวน">
                                            <input class = "hidden" type="text" name="name_tool[]" value="<?php echo $objr_tool['name_tool']?>">
                                            <input class = "hidden" type="text" name="id_tool[]" value="<?php echo $objr_tool['description_tool_id']?>">
                                        </td>
                                    </tr>
                                <?php }?>
                                <?php $num++;}?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success pull-right" value="ตกลง" onclick="return confirm('ยืนยันจำนวนอุปกรณ์ที่ต้องการเบิก')">
                    </div>
                </div>
            </form>
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

