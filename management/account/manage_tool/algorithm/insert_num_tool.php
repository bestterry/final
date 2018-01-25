<?php
require '../../../../connect/connect.php';

 $id_tool = $_GET['id_tool'];
 $num1 = $_GET['addtool'];
 $employee_id = $_GET['employee_id'];

//เพิ่มข้อมูลรายการเพิ่มถอนอุปกรณ์
$sql_tool_wd = "INSERT INTO add_withdraw_tool (num,description_tool_id,employee_id,status_manage_tool) 
                VALUES ('$num1','$id_tool','$employee_id','add')";
mysqli_query($conn, $sql_tool_wd);

//ดึงข้อมูล จำนวนอุปกรณ์
$sql_search_tool ="SELECT num_tool FROM description_tool WHERE description_tool_id='$id_tool'";
$objq_search = mysqli_query($conn, $sql_search_tool);
$objr_search = mysqli_fetch_array($objq_search);

$num2 = $objr_search['num_tool'];
$total=0;
$total = $num1+$num2;

//update num_tool
$sql_update="UPDATE description_tool SET num_tool = '$total' WHERE description_tool_id = '$id_tool'";
mysqli_query($conn, $sql_update);


header('location:../manage_tool.php');
?>