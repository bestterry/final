<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';
 $month=$_GET['month'];
 $year=$_GET['year'];
 $village_no = $_GET['village_no'];

$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strmonth = $strMonthCut[(int)$month];
$stryear = (int)$year + 543;

$sql_village = "SELECT * FROM village_name ";
$objq_village = mysqli_query($conn, $sql_village);
$objr_village = mysqli_fetch_array($objq_village);

$sql_time = "SELECT * FROM meter_management INNER JOIN house ON meter_management.house_id=house.house_id WHERE DATE_FORMAT(datatime,'%Y-%m')='$year-$month' AND village_no = '$village_no'";
$objq_village = mysqli_query($conn, $sql_time);
$objr_village = mysqli_fetch_array($objq_village);

$datatime=$objr_village['datatime'];
$datatime = new DateTime($datatime);
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    return " $strMonthThai $strYear";
}
$strDate = $datatime->format('M-Y');

?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';?>
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../plugins/iCheck/flat/blue.css">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="col-md-12">
                <div class="box box-solid">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>ชื่อพนักงาน</dt>
                            <dd><?php echo $obj_employee['name']?>  <?php echo $obj_employee['lastname']?></dd>
                            <dt>หน้าที่</dt>
                            <dd><?php echo $obj_employee['menu_duty']?></dd>
                            <dt>ข้อมูลใช้น้ำประจำเดือน</dt>
                            <dd><?php echo $strmonth;?>  พ.ศ.<?php echo $stryear;?></dd>
                        </dl>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">เมนู</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="pdf_file/bill.php?village=<?php echo $village_no?>&month=<?php echo $month?>&year=<?php echo $year?>" Target="_blank"><i class="fa fa-minus-square"></i> พิมพ์ใบชำระเงินทั้งหมด </a></li>
                                <li><a href="owe_bill.php?village_no=<?php echo $village_no?>&month=<?php echo $month?>&year=<?php echo $year?>" data-target="#myModal3"><i class="fa fa-filter"></i> ติดค้างชำระ</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">ข้อมูลการใช้น้ำ หมู่ที่<?php echo $village_no?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <span> เลือกทั้งหมด</span>
                            </div>
                            <!--data table -->
                            <form action="pdf_file/choose_bill.php?month=<?php echo $month?>&year=<?php echo $year?>" method="post" Target="_blank">
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center" width="15%">รหัสมิเตอร์</th>
                                            <th class="text-center" width="15%">บ้านเลขที่</th>
                                            <th class="text-center" width="15%">หมู่ที่</th>
                                            <th class="text-center" width="15%">หน่วยน้ำที่ใช้</th>
                                            <th class="text-center" width="15%">จำนวนเงิน</th>
                                            <th class="text-center" width="20%">วันที่</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $num=1; foreach ($objq_village as $village):?>
                                            <tr>
                                                <td><input type="checkbox" name="check[]" value="<?php echo $village['house_id']?>"></td>
                                                <td class="text-center" width="15%"><?php echo $village['meter_id']?></td>
                                                <td class="text-center" width="15%"><?php echo $village['address']?></td>
                                                <td class="text-center" width="15%"><?php echo $village['village_no']?></td>
                                                <td class="text-center" width="15%"><?php echo $village['meter_united']?></td>
                                                <td class="text-center" width="15%"><?php echo $village['money']?></td>
                                                <td class="text-center" width="15%"><?php echo DateThai($objr_village['datatime'])?></td>
                                            </tr>
                                            <?php $num+=1; endforeach;?>

                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>

                                    <div class="col-md-5"></div>
                                    <div class="box-footer col-md-2">
                                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-print"></i> พิมพ์ใบชำระค่าน้ำ
                                        </button>
                                    </div>
                                    <div class="col-md-5"></div>
                                    <!-- /.table -->
                                </div>
                            </form>
                            <!-- /.mail-box-messages -->
                        </div>


                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
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
    <!-- Slimscroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
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

