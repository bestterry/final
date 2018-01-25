<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 10/12/2560
 * Time: 22:59
 */

 $email = $_POST['email'];
 $sex = $_POST['sex'];
 $province = $_POST['province'];
 $phone = $_POST['phone'];
 $customer_id = $_POST['customer_id'];

require '../../../connect/connect.php';
        $update_customer = "UPDATE customer SET Email = '$email',sex = '$sex',career = '$province',Phone='$phone' WHERE customer_id = '$customer_id'";

if ($conn->query($update_customer) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

        header("location:../data_customer.php");