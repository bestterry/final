<?php
     $date = $_GET['year'];
     require 'menu/sesion.php';
     require 'menu/time_format.php';
     $customer_id = $objr_customer['customer_id'];
     $sql_meter = "SELECT * FROM meter_management INNER JOIN house ON meter_management.house_id=house.house_id WHERE house.customer_id = $customer_id AND  datatime like '$date%' ORDER BY meter_management.id ASC";
     $objq_meter = mysqli_query($conn,$sql_meter);
     $objr_meter = mysqli_fetch_array($objq_meter);
  ?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';?>
    <?php require '../font/font_style.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <!-- Logo -->
        <a href="homepage_customer.php" class="logo">
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
            <h1>
                <B>ประวัติการใช้น้ำ</B>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li class="active"><a href="#">ประวัติการใช้น้ำ</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div style="width:80%;margin:auto;">

                                    <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                                </div>
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="post">
                                        <table id="example" class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">วันที่</th>
                                                <th class="text-center">ค่าน้ำก่อนใช้</th>
                                                <th class="text-center">ค่าน้ำหลังใช้</th>
                                                <th class="text-center">ค่าน้ำที่ใช้</th>
                                                <th class="text-center">คิดเป็นเงิน(บาท)</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            if($objr_meter == null){
                                            ?>
                                            <tr>
                                                <td width="200"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <?php
                                                }else
                                                    ?>
                                                <?php foreach ($objq_meter as $m): ?>
                                            <tr>
                                                <td class="text-center" width="200"><?php echo DateThai($m["datatime"])?></td>
                                                <td class="text-center"><?php echo $m["meter_previos"]?></td>
                                                <td class="text-center"><?php echo $m["meter_after"]?></td>
                                                <td class="text-center"><?php echo $m["meter_united"]?></td>
                                                <td class="text-center"><?php echo $m["money"]?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

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
                    <?php foreach ($objq_meter as $r):?>
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
                data: [<?php foreach ($objq_meter as $t):?>
                    <?php echo $t['meter_united']?>,
                    <?php endforeach;?>]

            } ]
        });
    });
</script>
</body>
</html>
