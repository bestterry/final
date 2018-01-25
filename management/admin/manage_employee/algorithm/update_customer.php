<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 28/11/2560
 * Time: 17:06
 */
 $employee_id = $_GET['employee_id'];
 $username    = $_POST['username'];
 $password    = $_POST['password'];

 $name        = $_POST['name'];
 $lastname    = $_POST['lastname'];
 $email       = $_POST['email'];
 $phone       = $_POST['phone'];
 $menu_duty   = $_POST['menu_duty'];


 $address     = $_POST['address'];
 $villageno   = $_POST['villageno'];
 $subdistrict = $_POST['subdistrict'];
 $district    = $_POST['district'];
 $province    = $_POST['province'];
 $postcode     = $_POST['postcode'];

require '../../../../connect/connect.php';

$sql_duty = "SELECT * FROM duty WHERE menu_duty = '$menu_duty'";
$objq_duty = mysqli_query($conn,$sql_duty);
$objr_duty = mysqli_fetch_array($objq_duty);
$duty_id = $objr_duty['duty_id'];
$sql="UPDATE employee SET
                 name = '$name',
                 lastname = '$lastname',
                 username = '$username',
                 password = '$password',
                 email    = '$email',
                 phone    = '$phone',
                 address  = '$address',
                 villageno = '$villageno',
                 subdistrict = '$subdistrict',
                 district  =  '$district',
                 province  = '$province',
                 postcode = '$postcode',
                 duty_id  = '$duty_id'
                 WHERE employee_id = '$employee_id'
                 ";
$query=mysqli_query($conn, $sql);

if($query){
    header("location:../edit_employee.php");
}
else {
    echo "ผิดน่ะจ๊ะ";
}