<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 17:33
 */
  session_start();
       require '../../connect/connect.php';

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $strSQL = "SELECT * FROM employee INNER JOIN duty ON employee.duty_id=duty.duty_id  WHERE employee.username = '$username' and employee.password = '$password'";
        $objQuery = mysqli_query($conn,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);
        echo $duty = $objResult['menu_duty'];
        echo $employee_id = $objResult['employee_id'];

            if(!$objResult)
            {
                header("location:../../index.php");
            }
            else
            {
                $_SESSION["employee_id"] = $employee_id;
                $_SESSION["status"] = $duty;

                session_write_close();

                if($duty == "admin"){
                    header("location:../admin/homepage_admin.php");
                }
                elseif ($duty =="account"){
                    header("location:../account/homepage_account.php");
                }
                else{
                    header("location:../technicial/homepage_technicial.php");
                }
            }
            mysql_close();
?>