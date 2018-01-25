<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 15/11/2560
 * Time: 0:06
 */
$user_id = $_GET['user_id'];
$house_id = $_GET['house_id'];
$status_id = $_GET['status_id'];
require '../../../../connect/connect.php';

$sql_update  = "UPDATE status_install_water SET status_withdraw_tool='Y',withdraw_class1='$user_id' WHERE status_use_water_id = '$status_id'";
if (mysqli_query($conn, $sql_update)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
header('location:../list_customer.php');
?>