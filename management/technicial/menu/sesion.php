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
    header("location:../../index.php");
    exit();
}

if($_SESSION['status'] != "technicial")
{
    header("location:../../index.php");
    exit();
}
require '../../connect/connect.php';
$strSQL = "SELECT * FROM employee WHERE employee_id = '".$_SESSION['employee_id']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$obj_employee = mysqli_fetch_array($objQuery);
?>