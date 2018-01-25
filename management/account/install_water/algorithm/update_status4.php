<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 15/11/2560
 * Time: 0:06
 */

require '../../../../connect/connect.php';

 $customer_id = $_GET['employee_id'];
 $housse_id = $_GET['house_id'];

    //update status
    $sql_update_status = "UPDATE status_install_water SET status_payment='Y',withdraw_class4=$customer_id WHERE house_id = '$housse_id'";
    mysqli_query($conn,$sql_update_status);

   header('location:../list_customer.php');