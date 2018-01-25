<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 20:23
 */
   $username = $_POST['username'];
   $password = $_POST['password'];
   $name        = $_POST['name'];
   $lastname    = $_POST['lastname'];
   $email       = $_POST['email'];
   $career      =  $_POST['menu_duty'];
   $phone       = $_POST['phone'];

   $address     = $_POST['address'];
   $villageno   = $_POST['villageno'];
   $subdistrict = $_POST['subdistrict'];
   $district    = $_POST['district'];
   $province    = $_POST['province'];
   $postcode     = $_POST['postcode'];

?>
<?php require 'menu/sesion.php'; ?>

    <!DOCTYPE html>
    <html>
    <head>
        <?php require 'menu/head_link.php'; ?>
        <!-- Select2 -->
        <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
        <?php require '../../font/font_style.php'; ?>
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
                        <?php require 'menu/topbar.php'; ?>
                        <!-- /account -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php require 'menu/navbar.php'; ?>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <font size="5"><B>เพิ่มรายการผู้ใช้น้ำประปา</B></font>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                    <li>ข้อมูลผู้ใช้น้ำ</li>
                    <li class="active">เพิ่มรายการผู้ใช้น้ำประปา</li>
                </ol>
            </section>
            <!-- Main content -->
            <form action="algorithm/insert_employee.php" method="post">
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3><B>ยืนยันข้อมูล</B></h3>
                                </div>
                                <div role="form">
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-3">
                                                <font size="4" color="red"><B>Username : </B><?=$username?></font>
                                                <input type="hidden" name="username" class="form-control" id="txtname"
                                                       value="<?=$username?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <font size="4" color="red"><B>Password : </B><?=$password?></font>
                                                <input type="hidden" name="password" class="form-control" id="txtname"
                                                       value="<?=$password?>">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12">
                                                <h4><B>ชื่อ-นามสกุล :</B><?= $name ?>  <?=$lastname ?></h4>
                                                <input type="hidden" name="name" class="form-control" id="txtname"
                                                       value="<?=$name?>">
                                                <input type="hidden" name="lastname" class="form-control" id="txtname"
                                                       value="<?=$lastname?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group col-md-12">
                                                <h4><B>อาชีพ :</B> <?= $career ?></h4>
                                                <input type="hidden" name="menu_duty" class="form-control" id="duty"
                                                      value="<?=$career?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h4><B>โทรศัพท์ :</B> <?= $phone ?></h4>
                                                <input type="hidden" name="phone" class="form-control"
                                                       data-inputmask='"mask": "(999) 999-9999"' value="<?=$phone?>" data-mask >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h4><B>e-mail :</B> <?= $email ?></h4>
                                                <input type="hidden" name="email" class="form-control" id="email"
                                                       value="<?=$email?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h4><B>ที่อยู่ :</B> บ้านเลขที่<?= $address ?> หมู่ที่<?= $villageno ?>
                                                    ตำบล<?= $subdistrict ?> อำเภอ<?= $district ?> จังหวัด<?= $province ?>
                                                    รหัสไปรษณีย์ <?= $postcode ?> </h4>
                                                <input type="hidden" name="address" class="form-control" id="email"
                                                       value="<?=$address?>">
                                                <input type="hidden" name="villageno" class="form-control" id="email"
                                                       value="<?=$villageno?>">
                                                <input type="hidden" name="subdistrict" class="form-control" id="email"
                                                       value="<?=$subdistrict?>">
                                                <input type="hidden" name="district" class="form-control" id="email"
                                                       value="<?=$district?>">
                                                <input type="hidden" name="province" class="form-control" id="email"
                                                       value="<?=$province?>">
                                                <input type="hidden" name="postcode" class="form-control" id="email"
                                                       value="<?=$postcode?>">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.box-body -->
                                <div class="box-footer">
                                    <button name="btnSubmit1" type="submit" value="Submit"
                                            class="btn btn-success pull-left">บันทึกข้อมูล
                                    </button>
                                </div>
                                <!-- /.box-footer -->
                            </div>

                        </div>
                    </div>

                    <!-- /.row -->

                </section>
            </form>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>CPE XIII-UP</strong>
        </footer>

    </div>
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="../../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
    </body>
    </html>
