<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 15/11/2560
 * Time: 0:06
 */
    $house_id = $_GET['house_id'];
    $user_id = $_GET['user_id'];
    require '../../../../connect/connect.php';

        for($i=0;$i<count($_POST["id_tool"]);$i++) {
            $tool_id = $_POST['id_tool'][$i];
            $num_tool = $_POST['num_tool'][$i];

            $insert_tool = "INSERT INTO receive_withdraw_tool(house_id,tool_id,count_tool)
                                         VALUES ('$house_id','$tool_id','$num_tool')";
            mysqli_query($conn,$insert_tool);
        }

    $sql = "UPDATE status_install_water SET status_num_withdraw_tool='Y',status_confirm_with_boss='Y',withdraw_class2='$user_id',withdraw_class3='$user_id' WHERE house_id=$house_id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    $conn->close();


    header('location:../list_customer.php');


?>