<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 19:01
 */
require 'menu/sesion.php';

$sql_tool="SELECT * FROM add_withdraw_tool INNER JOIN description_tool ON add_withdraw_tool.description_tool_id=description_tool.description_tool_id GROUP BY add_withdraw_tool_id DESC";
$objq_tool=mysqli_query($conn, $sql_tool);
$objr_tool=mysqli_fetch_array($objq_tool);



$datatime=$objr_tool['datatime'];
$datatime = new DateTime($datatime);
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
$strDate = $datatime->format('M-Y');
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
            <h1>
                ประวัติเพิ่ม-เบิกอุปกรณ์
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li><a href="#">อุปกรณ์</a></li>
                <li class="active">ประวัติเพิ่ม-เบิกอุปกรณ์</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">ประวัติเพิ่ม-ถอนอุปกรณ์</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-message">
                                <table class="table table-hover table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <th class="text-center" width="25%">ชื่ออุปกรณ์</th>
                                        <th class="text-center" width="25%">จำนวนเพิ่ม-ถอน</th>
                                        <th class="text-center" width="25%">วันที่</th>
                                        <th class="text-center" width="25%">ชื่อพนักงานเพิ่ม-เบิกอุปกรณ์</th>
                                        <?php foreach ($objq_tool as $tool):?>
                                    <tr>
                                        <td class="text-center" width="25%"><?php echo $tool['name_tool']?></td>
                                        <td class="text-center" width="25%"><?php  if($tool['status_manage_tool']=='add'){
                                                echo '<b><font color="green">';
                                                echo '+'; echo  $tool['num'] ;
                                                echo '</font><b>';
                                            }

                                            else {
                                                echo '<b><font color="red">';
                                                echo '-'; echo  $tool['num'] ;
                                                echo '</font><b>';
                                            }
                                            ?></td>
                                        <td class="text-center" width="25%"><?php  echo DateThai($tool['datatime'])?></td>
                                        <td class="text-center" width="25%">

                                            <?php
                                            $sql_name="SELECT * FROM employee WHERE employee_id = '$tool[employee_id]'";
                                            $obq_name= mysqli_query($conn,$sql_name);
                                            $obj_name = mysqli_fetch_array($obq_name);
                                            echo $obj_name['name'];?>
                                            &nbsp; <?php echo $obj_name['lastname']?>


                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.box-body -->
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

