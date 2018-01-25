<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 29/11/2560
 * Time: 12:38
 */


$username = $_POST['username'];
$password = $_POST['password'];
$name        = $_POST['name'];
$lastname    = $_POST['lastname'];
$email       = $_POST['email'];
$duty     =  $_POST['menu_duty'];
$phone       = $_POST['phone'];

$address     = $_POST['address'];
$villageno   = $_POST['villageno'];
$subdistrict = $_POST['subdistrict'];
$district    = $_POST['district'];
$province    = $_POST['province'];
$postcode     = $_POST['postcode'];

require '../../../../connect/connect.php';
$sql_duty = "SELECT * FROM duty WHERE menu_duty = '$duty'";
$objq_duty = mysqli_query($conn,$sql_duty);
$objr_duty = mysqli_fetch_array($objq_duty);
$duty_id = $objr_duty['duty_id'];

//insert user
$sql = "INSERT INTO employee(username,password,name,lastname,email,phone,address,subdistrict,district,province,postcode,duty_id)
        VALUES ('$username','$password','$name','$lastname','$email','$phone','$address','$subdistrict','$district','$province','$postcode','$duty_id')";
if ($conn->query($sql) === TRUE) {
    header('location:../insert_employee.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}