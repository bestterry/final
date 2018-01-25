
<?php
        session_start();
       require '../../connect/connect2.php';
   
        $strUsername = mysqli_real_escape_string($conn,$_POST['txtUsername']);
        $strPassword = mysqli_real_escape_string($conn,$_POST['txtPassword']);
	
        $strSQL = "SELECT * FROM member INNER JOIN duty ON member.duty_id=duty.duty_id  WHERE member.Username = '$strUsername' and member.Password = '$strPassword'";
        $objQuery = mysqli_query($conn,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);
        echo $duty = $objResult['name_duty'];
        echo $userid = $objResult['UserID'];

            if(!$objResult)
            {
                header("location:../../index.php");
            }
            else
            {
                    $_SESSION["UserID"] = $userid;
                    $_SESSION["Status"] = $duty;

                    session_write_close();

                    if($duty == "admin")
                    {
                        header("location:../../admin/homepage_admin.php");
                    }
                    elseif ($duty == "technicial")
                    {
                        header("location:../../technicial/home_page.php");
                    }
                    else
                    {
                        header("location:user_page.php");
                    }
            }
            mysql_close();
?>