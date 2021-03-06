<?php require 'menu/sesion.php'?>
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
            <font size="4"><B>ข้อมูลส่วนตัว</B></font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลผู้ใช้น้ำ</li>
                <li class="active">เพิ่มรายการผู้ใช้น้ำประปา</li>
            </ol>
        </section>
        <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user2-160x160.png" alt="User profile picture">
                                <h3 class="profile-username text-center"><?=$objr_customer['name']?> <?=$objr_customer['lastname']?></h3>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <a href="update_password.php">
                                            <i class="fa fa-lock"></i><span>เปลี่ยนรหัสผ่าน</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="update_data.php">
                                            <i class="fa fa-cog"></i> <span>เปลี่ยนรหัสผ่าน</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <form action="algorithm/update_password.php" method="post">
                                <div class="form-group">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Horizontal Form -->
                                                <div class="box box-info">
                                                    <div class="box-header with-border">
                                                        <font size="4">เปลี่ยนรหัสผ่าน</font>
                                                    </div>
                                                    <?php if(count($_GET)==1 ){?>
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h4><i class="icon fa fa-ban"></i> ผิดพลาด!</h4>
                                                         กรุณาตรวจสอบรหัสผ่านที่ท่านระบุถูกต้องหรือไม่
                                                    </div>
                                                    <?php }else{
                                                        echo "";
                                                    }?>
                                                    <div role="form">
                                                        <div class="box-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-4">
                                                                    <input type="password" name="beforepassword" class="form-control" id="txtaddress" placeholder="รหัสผ่านปัจจุบัน">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-4">
                                                                    <input type="password" name="newpassword" class="form-control" id="txtdistrict" placeholder="รหัสผ่านใหม่">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-4">
                                                                    <input type="password" name="renewpassword" class="form-control" id="txtdistrict" placeholder="ยืนยันรหัสผ่านใหม่">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group col-md-4">
                                                                    <input type="hidden" name="house_id" class="form-control" id="txtdistrict" value="<?=$objr_customer['house_id']?>">
                                                                    <button type="submit" class="btn btn-primary btn-block">เปลี่ยน</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){

        var obj_check=$(".css-require");
        $("#myform1").on("submit",function(){
            obj_check.each(function(i,k){
                var status_check=0;
                if(obj_check.eq(i).find(":radio").length>0 || obj_check.eq(i).find(":checkbox").length>0){
                    status_check=(obj_check.eq(i).find(":checked").length==0)?0:1;
                }else{
                    status_check=($.trim(obj_check.eq(i).val())=="")?0:1;
                }
                formCheckStatus($(this),status_check);
            });
            if($(this).find(".has-error").length>0){
                return false;
            }
        });

        obj_check.on("change",function(){
            var status_check=0;
            if($(this).find(":radio").length>0 || $(this).find(":checkbox").length>0){
                status_check=($(this).find(":checked").length==0)?0:1;
            }else{
                status_check=($.trim($(this).val())=="")?0:1;
            }
            formCheckStatus($(this),status_check);
        });

        var formCheckStatus = function(obj,status){
            if(status==1){
                obj.parent(".form-group").removeClass("has-error").addClass("has-success");
                obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
            }else{
                obj.parent(".form-group").removeClass("has-success").addClass("has-error");
                obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
            }
        }

    });
</script>
</body>
</html>
