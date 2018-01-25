<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
    <meta name="keywords" content="web design, affordable web design, professional web design">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/5a964a889a.js"></script>
    <meta name="author" content="Brad Traversy">
    <title>การประปา : เทศบาบตำบลบ้านถ้ำ</title>
    <link rel="stylesheet" href="./css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

    <style>
        p{text-shadow: 0.1em 0.1em 0.2em black}
        b{text-shadow: 0.1em 0.1em 0.2em black}

        div.transbox
        {
            width: 100%;
            margin:30px;
            background-color: #ffffff;
            border: 1px solid #40404080;
            background: rgba(64, 64, 64, 0.5);
        }

        div.transbox p {
            margin: 2%;
            font-weight: bold;
            /*color: #000000;*/
        }
        body{font-family: 'Athiti', sans-serif;}
    </style>

</head>
<body>

<!--nav-->
<div style="background-color: #286090; color: white;">
    <div class="container">
    <img src="1514-1.png" width="60px">
    <b>การประปาเทศบาลตำบลบ้านถ้ำ</b>
    </div>
</div>
<!--nav-->

<section id="showcase">
    <div class="container">
        <div class="transbox">
            <img src="1514-1.png" width="220px">
            <p>ระบบสารสนเทศเพื่อการบริหารงานประปาขององค์กรปกครองส่วนท้องถิ่น</p>
            <p>Information System For Waterworks Management Of Local Government</p>
        </div>
    </div>
</section>

<!--logo-->
<!--<div style="background-color: #ddd; padding-bottom: 20px;">-->
<!--<div class="text-center">-->
<!--    <img src="1514-1.png" width="200px">-->
<!--</div>-->
<!--<font color="blue"><h1>ยินดีต้อนรับเข้าสู่เว็บไซต์การประปาเทศบาลตำบลบ้านถ้ำ</h1></font>-->
<!--</div>-->
<!--logo-->

<div style="background-color: #337ab7; height: 20px;"></div>

<section id="boxes">
<!--    <div style="background-color: #337ab7">-->
<!--        <hr><hr>-->
<!--    </div>-->

    <div style="background-color: #0b97c4; padding-top: 10px;">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-2"></div>

            <div class="col-md-4">
                <a  href="#" data-toggle="modal" title="เข้าสู่ระบบพนักงาน" data-target="#login-admin-modal">
                    <img src="./img/1-1.png" width="40%">
                    <font color="white"><p>เข้าสู่ระบบพนักงาน</p></font>
                </a>
            </div>

            <div class="col-md-4">
                <a  href="#" data-toggle="modal" title="เข้าสู่ระบบผู้ใช้งาน" data-target="#login-user-modal">
                    <img src="./img/2-1.png" width="39%">
                    <font color="white"><p>เข้าสู่ระบบผู้ใช้น้ำ</p></font>
                </a>
            </div>

            <div class="col-md-2"></div>
        </div>
    </div>
    </div>

<!--    <div style="background-color: #0b93d5">-->
<!--        <hr><hr>-->
<!--    </div>-->
</section>

<!--start login-admin-modal
_______________________________________________________________________________________-->
<div class="modal fade" id="login-admin-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <h3 class="text-center" style="padding-top: 12px; margin-top: auto; margin-bottom: auto;"><!-- พนักงาน --></h3>
            <div class="modal-body">
                <img src="1514.png" width="100%">
                <form action="management/login/check_login.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                  </span>
                            <input type="text" name="username" class="form-control " placeholder="username">
                        </div>
                    </div>

                    <!--form admin
                      ________________________________________________________________________-->
                    <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                          </span>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>

                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
<!--end login-admin-modal -->


<!--start login-user-modal user
_____________________________________________________________________________________-->
<div class="modal fade" id="login-user-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <!-- <div class="modal-header" style="background-color:#4169E1">

            </div> -->
            <h3 class="text-center" style="padding-top: 12px; margin-top: auto; margin-bottom: auto;""><!-- ผู้ใช้น้ำ --></h3>
            <div class="modal-body">
                <img src="1514.png" width="100%">
                <form action="management/login/check_login_user.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                            <input type="text" name="address" class="form-control" placeholder="บ้านเลขที่">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                            <input type="text" name="villageno" class="form-control" placeholder="หมู่ที่">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                            <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
                        </div>
                    </div>
                    <p class = "text-center">*สำหรับผู้ใช้น้ำในพื้นที่ตำบลบ้านถ้ำเท่านั้น </p >

                    <!--button
                    _____________________________________________________________________-->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!--end login-user-modal-->


<div class="footer">
    <p>Copyright &copy; 2017 | Contact <a href="https://www.facebook.com/banthammunicipality/?ref=br_rs" class="fa fa-facebook-square" aria-hidden="true"></a> | By</p>
    <p>Computer Engineering University Of Phayao</p>
    <p><img src="1514-1.png" width="30px"> ระบบการจัดการประปาเทศบาลตำบลบ้านถ้ำ</p>
</div>

</body>
<html>
