<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/12/2560
 * Time: 14:59
 */

echo $house_id = $_GET['house_id'];
echo $employee_id = $_GET['employee_id'];
require '../../../../connect/connect.php';
require '../sql/select.php';


    $sql_update_status6 = "UPDATE status_install_water SET status_manage_install='Y',withdraw_class6='$employee_id' WHERE house_id='$house_id'";
    mysqli_query($conn,$sql_update_status6);

    $sql_update_usewater = "UPDATE house SET status_use_water = 'Y' WHERE house_id='$house_id'";
    mysqli_query($conn,$sql_update_usewater);

header('location:../list_customer.php');







