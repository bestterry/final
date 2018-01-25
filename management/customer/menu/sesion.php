<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 18:18
 */
session_start();
if($_SESSION['house_id'] == "")
{
    header("location:../../../index.php");
    exit();
}
require '../../connect/connect.php';
$strSQL_customer = "SELECT * FROM house INNER JOIN customer ON house.customer_id=customer.customer_id WHERE house.house_id = '".$_SESSION['house_id']."' ";
$objq_customer = mysqli_query($conn,$strSQL_customer);
$objr_customer = mysqli_fetch_array($objq_customer);
?>