<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 28/11/2560
 * Time: 17:58
 */

require '../../../../connect/connect.php';

$sql = "DELETE FROM employee WHERE employee_id = ".$_GET['employee_id'];
$query = mysqli_query($conn,$sql);

if ($query){
    header("location:../edit_employee.php");
}else{
    echo "ไม่สามารถลบข้อมูลได้<br>";
    echo mysqli_error($conn);
}