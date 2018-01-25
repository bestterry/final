<?php require 'menu/sesion.php';
$customer_id = $_GET['customer_id'];
$sql = "SELECT * FROM house INNER JOIN customer ON customer.customer_id=house.customer_id WHERE customer.customer_id = $customer_id ";
$objq = mysqli_query($conn,$sql);
$objR = mysqli_fetch_array($objq);

?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'menu/head_link.php';?>
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
    <?php require '../../font/font_style.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<script language="javascript">
    function fncSubmit()
    {
        if(document.form1.name.value == "")
        {
            alert('กรูณากรอกชื่อ');
            document.form1.name.focus();
            return false;
        }
        if(document.form1.lastname.value == "")
        {
            alert('กรุณากรอกนามสกุล');
            document.form1.lastname.focus();
            return false;
        }
        if(document.form1.card_number.value == "")
        {
            alert('กรุณากรอกบัตรประชาชน');
            document.form1.card_number.focus();
            return false;
        }
        if(document.form1.sex.value == "")
        {
            alert('กรุณาเลือกเพศ');
            document.form1.sex.focus();
            return false;
        }
        if(document.form1.duty.value == "")
        {
            alert('กรุณากรอกอาชีพ');
            document.form1.duty.focus();
            return false;
        }
        if(document.form1.phone.value == "")
        {
            alert('กรุณากรอกเบอร์โทรศัพท์');
            document.form1.phone.focus();
            return false;
        }
        if(document.form1.birth.value == "")
        {
            alert('กรุณากรอกวันเกิด');
            document.form1.birth.focus();
            return false;
        }
        if(document.form1.email.value == "")
        {
            alert('กรุณากรอก e-mail');
            document.form1.email.focus();
            return false;
        }
        document.form1.submit();
    }
</script>

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
        <?php if (count($_GET)==1){}

        else{ ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด!</strong>ที่อยู่ที่ท่านกรอกมีอยู่แล้ว
            </div>
        <?php }?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <font size="5" ><B>แก้ไขข้อมูลผู้ใช้น้ำประปา</B></font>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li>ข้อมูลผู้ใช้น้ำ</li>
                <li class="active">แก้ไขข้อมูลผู้ใช้น้ำประปา</li>
            </ol>
        </section>
        <!-- Main content -->
        <form action="algorithm/edit_customer.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <font size="4">ข้อมูลส่วนตัว</font>
                            </div>
                            <div role="form">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-3">
                                            <label for="txtname">ชื่อ :</label>
                                            <input type="text" name="name" class="form-control" id="txtname" value="<?=$objR['name']?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="txtlastname">นามสกุล :</label>
                                            <input type="text" name="lastname" class="form-control" id="txtlastname" value="<?=$objR['lastname']?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="txtlastname">รหัสบัตรประชาชน :</label>
                                            <input type="text" name="card_number" class="form-control" id="txtlastname" value="<?=$objR['card_number']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword3">เพศ :</label>
                                            <select class="form-control select2" style="width: 100%;" name="sex">
                                                <option selected="selected" name="men">ชาย</option>
                                                <option name="women">หญิง</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="age">อาชีพ :</label>
                                            <input type="text" name="career" class="form-control" id="duty" value="<?=$objR['career']?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone">เบอร์โทร :</label>
                                            <input type="text" name="phone" class="form-control css-require" id="phone" value="<?=$objR['Phone']?>">
                                        </div>
                                        <!-- Date -->
                                        <div class="form-group col-md-4">
                                            <label>วันเกิด :</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="birth" class="form-control pull-right" id="datepicker" value="<?=$objR['birth']?>">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="form-group col-md-4">
                                            <label for="age">e-mail :</label>
                                            <input type="text" name="email" class="form-control" id="email" value="<?=$objR['Email']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <font size="4">ที่อยู่</font>
                            </div>
                            <div role="form">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-2">
                                            <label for="txtaddress">บ้านเลขที่</label>
                                            <input type="text" name="address" class="form-control" id="txtaddress" value="<?=$objR['address']?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="txtvillageno">หมู่ที่</label>
                                            <input type="text" name="villageno" class="form-control" id="txtvillageno" value="<?=$objR['village_no']?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="subdistrict">ตำบล</label>
                                            <input type="text" name="subdistrict" class="form-control" id="subdistrict" value="บ้านถ้ำ">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="district">อำเภอ</label>
                                            <input type="text" name="district" class="form-control" id="district" value="ดอกคำใต้">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="province">จังหวัด</label>
                                            <input type="text" name="province" class="form-control" id="province" value="พะเยา">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="txtZipcode">รหัสไปรษณีย์</label>
                                            <input type="text" name="postcode" class="form-control" id="txtZipcode" value="56210">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">

                                        <div class="form-group col-md-3">
                                            <font color="red"><label for="password" class="">*รหัสผ่านเข้าสู่ระบบ</label></font>
                                            <input type="password" name="password" class="form-control" id="password" value="<?=$objR['password']?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-5">
                                        <input type="hidden" name="customer_id" class="form-control" id="txtZipcode" value="<?=$customer_id?>">
                                        <button type="submit" name="btnSubmit1" value="Submit" class="btn btn-primary pull-left" onclick="return confirm('ยืนยันการแก้ไขข้อมูล')"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                                <!-- /.box-footer -->
                                <!-- /.box-body -->
                            </div>
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
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
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
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
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
