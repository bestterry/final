<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 18:18
 */
session_start();
if($_SESSION['employee_id'] == "")
{
    header("location:../../../index.php");
    exit();
}

if($_SESSION['status'] != "admin")
{
    header("location:../../../index.php");
    exit();
}
require '../../../connect/connect.php';
$strSQL = "SELECT * FROM employee INNER JOIN duty ON employee.duty_id=duty.duty_id WHERE employee.employee_id = '".$_SESSION['employee_id']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$obj_employee = mysqli_fetch_array($objQuery);
?>