<?php require 'menu/sesion.php'?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';
          require '../font/font_style.php';
          require 'manage_statistic/menu/time_format.php';
          $sql_num = "SELECT count(status_use_water) FROM house WHERE status_use_water='N'";
          $objq_num = mysqli_query($conn,$sql_num);
          $objr_num = mysqli_fetch_array($objq_num);
          $count_num = $objr_num['count(status_use_water)'];

    $sql_numcus = "SELECT count(customer_id) FROM customer ";
    $objq_numcus = mysqli_query($conn,$sql_numcus);
    $objr_numcus = mysqli_fetch_array($objq_numcus);
    $count_numcus = $objr_numcus['count(customer_id)'];

    $sql_search_month="SELECT datatime,sum(money),sum(meter_united) FROM meter_management INNER JOIN house ON meter_management.house_id=house.house_id  WHERE (datatime between '2017-01-01' and '2017-12-31')  GROUP BY MONTH(datatime),YEAR(datatime) ORDER BY datatime ";
    $objq_search=mysqli_query($conn,$sql_search_month);

    $sql_tool = "SELECT COUNT(description_tool_id) FROM description_tool WHERE num_tool < 6";
    $objq_tool = mysqli_query($conn,$sql_tool);
    $objr_tool = mysqli_fetch_array($objq_tool);

    $num_tool = $objr_tool['COUNT(description_tool_id)'];

    ?>




</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <!-- Logo -->
        <a href="homepage_admin.php" class="logo">
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
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $count_numcus;?></h3>
                            <p>จำนวนผู้ใช้น้ำ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="manage_customer/check_customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $count_num;?></h3>
                            <p>ผู้ใช้น้ำรอการอนุมัติ</p>
                        </div>
                        <div class="icon">
                            <i class="icon ion-person"></i>
                        </div>
                        <a href="install_water/list_customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php if ($num_tool>0){?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $num_tool;?> <font size="4">รายการ</font></h3>
                            <p>ท่านมีอุปกรณ์ใกล้หมด</p>
                        </div>
                        <div class="icon">
                            <i class="icon ion-ios-gear"></i>
                        </div>
                        <a href="manage_tool/manage_tool.php" class="small-box-footer">จัดการ <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php }else{
                    echo "";
                } ?>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-10 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                        <div style="width:80%;margin:auto;">

                            <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                        </div>
                    </div>
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>

        <!-- Main content -->

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

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
                    '<?php echo DateThai($r['datatime'])?>',
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
