<?php
session_start();
require '../../connect/connect.php';
$strAddress = mysqli_real_escape_string($conn,$_POST['address']);
$strVillageno = mysqli_real_escape_string($conn,$_POST['villageno']);
$strPassword = mysqli_real_escape_string($conn,$_POST['password']);

$strSQL = "SELECT * FROM house WHERE address = '".$strAddress."'and village_no = '".$strVillageno."'and password = '".$strPassword."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

if(!$objResult)
{
    header("location:../../index.php");
}
else
{
    $_SESSION["house_id"] = $objResult["house_id"];
    session_write_close();
    header("location:../customer/homepage_customer.php");

}
mysql_close();
?>