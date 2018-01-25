<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 28/11/2560
 * Time: 13:24
 */

require '../../../../connect/connect.php';

$sql = "DELETE FROM customer WHERE customer_id = ".$_GET['customer_id'];
$query = mysqli_query($conn,$sql);
$sql2 = "DELETE FROM house WHERE customer_id = ".$_GET['customer_id'];
$query = mysqli_query($conn,$sql2);

if ($query){
    header("location:../edit_customer.php");
}else{
    echo "ไม่สามารถลบข้อมูลได้<br>";
    echo mysqli_error($conn);
}