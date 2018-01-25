<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 10/12/2560
 * Time: 19:34
 */

 $beforepass = $_POST['beforepassword'];
 $newpass = $_POST['newpassword'];
 $renewpass = $_POST['renewpassword'];
 $house_id = $_POST['house_id'];
require '../../../connect/connect.php';
$sql_select_houseid="SELECT password FROM house WHERE house_id = '$house_id'";
$objq_select_houseid = mysqli_query($conn,$sql_select_houseid);
$objr_select_housedi = mysqli_fetch_array($objq_select_houseid);
$obpass = $objr_select_housedi['password'];

if($obpass != $beforepass){
    header("location:../update_password.php?passeror=error");
}
else{
    if ($renewpass != $newpass){
        header("location:../update_password.php?passeror=error");
    }else{
     $update_password = "UPDATE house SET password = '$newpass' WHERE house_id = '$house_id'";
     mysqli_query($conn,$update_password);
        header("location:../success_update_password.php");
    }
}