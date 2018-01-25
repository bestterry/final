<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 2/12/2560
 * Time: 19:46
 */
require 'menu/sesion.php';
require 'menu/time_format.php';

$year_before=$_GET['year_before'];
$year_after=$_GET['year_after'];

$i=1;
$compare= 0;
$sql_search_year="SELECT datatime,sum(money),sum(meter_united) FROM meter_management WHERE (datatime between '$year_before-01-01' and '$year_after-12-31') GROUP BY YEAR(datatime)";
$objq_search=mysqli_query($conn,$sql_search_year);
$objr_search = mysqli_fetch_assoc($objq_search);
$sql_search_sum="SELECT sum(meter_united),sum(money) FROM meter_management WHERE (datatime between '$year_before-01-01' and '$year_after-12-31')  ";
$objq_sum=mysqli_query($conn,$sql_search_sum);
$objr_sum=mysqli_fetch_array($objq_sum);
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
            <font size="5" ><B>สถิติใช้น้ำ</B></font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลสถิติ</li>
                <li class="active">สถิติใช้น้ำ</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- form start -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <font size="4">ข้อมูลสถิติใช้น้ำ</font>
                        </div>
                        <div role="form">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div style="width:80%;margin:auto;">

                                        <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center"> <font color="blue">ปี พ.ศ.</font></th>
                                                <th class="text-center"><font color="blue">ค่าน้ำที่ใช้</font></th>
                                                <th class="text-center"><font color="blue">เพิ่ม/ลด</font></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($objq_search as $m ):?>
                                            <tr>
                                                <td class="text-center" width ="200"><?php echo DateThaiYear($m['datatime'])?></td>
                                                <td class="text-center" width="200"><?php echo $m['sum(meter_united)']?></td>
                                                <td class="text-center" width="200">
                                                    <?php
                                                    if($i==1){
                                                        echo '0';
                                                    }else{
                                                        echo $m['sum(meter_united)']-$compare;
                                                    }
                                                    $i++;
                                                    $compare = $m['sum(meter_united)'];
                                                    ?>
                                                </td>
                                                <?php endforeach;?>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <table id="example" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center"><font color="blue">ปี พ.ศ.</font></th>
                                                <th class="text-center"><font color="blue">จำนวนค่าน้ำที่ใช้รวม</font></th>
                                                <th class="text-center"><font color="blue">จำนวนเงินที่ได้รับทั้งหมด</font></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td class="text-center"><?php echo DateThaiYear($year_before)?> ถึง  <?php echo DateThaiYear($year_after)?></td>
                                                <td class="text-center"><?php echo $objr_sum['sum(meter_united)']?></td>
                                                <td class="text-center"><?php echo $objr_sum['sum(money)']?></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
    </div>
    </section>
</div>

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
        $('#curve_chart')
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    $(function () {
        $('#hc_container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'กราฟแสดงประวัติใช้น้ำ'
            },

            xAxis: {
                categories: [
                    <?php foreach ($objq_search as $r):?>
                    '<?php echo DateThaiYear($r['datatime'])?>',
                    <?php endforeach;?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'ปริมาตรน้ำ (m³)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} m³</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'ปริมาณใช้น้ำ',
                data: [<?php foreach ($objq_search as $t):?>
                    <?php echo $t['sum(meter_united)']?>,
                    <?php endforeach;?>]

            } ]
        });
    });
</script>
</body>
</html>

