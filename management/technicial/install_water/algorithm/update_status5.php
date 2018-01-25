<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/12/2560
 * Time: 3:48
 */

 $house_id = $_GET['house_id'];
 $employee_id = $_GET['employee_id'];
require '../../../../connect/connect.php';
require '../sql/select.php';
for($i=0;$i<count($_POST["id_tool"]);$i++) {
    $tool_id = $_POST['id_tool'][$i];
    $num_tool = $_POST['num_tool'][$i];
    $sql = select_star_where('description_tool', 'description_tool_id', $tool_id);
    $objr_tool = mysqli_fetch_array($sql);
    $data_tool = $objr_tool['num_tool'];
    $balance_tool = $data_tool - $num_tool;

     $sql_update_tool = "UPDATE description_tool SET num_tool='$balance_tool' WHERE description_tool_id='$tool_id'";
     mysqli_query($conn,$sql_update_tool);

    $sql_update_status5 = "UPDATE status_install_water SET status_confirm_withdrawtool='Y',withdraw_class5='$employee_id' WHERE house_id='$house_id'";
    mysqli_query($conn,$sql_update_status5);

    $sql_insert_withdraw = "INSERT INTO add_withdraw_tool (num, description_tool_id, employee_id, status_manage_tool)
                           VALUES ('$num_tool', '$tool_id', '$employee_id', 'withdraw' )";
    mysqli_query($conn, $sql_insert_withdraw);

    }

$conn->close();
header('location:../list_customer.php');