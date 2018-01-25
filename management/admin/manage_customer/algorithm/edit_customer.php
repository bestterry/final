<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 28/11/2560
 * Time: 0:45
 */
$customer_id = $_POST['customer_id'];
$name        = $_POST['name'];
$lastname    = $_POST['lastname'];
$card_number   = $_POST['card_number'];
$birth       = $_POST['birth'];;
$email       = $_POST['email'];
$career      =  $_POST['career'];
$phone       = $_POST['phone'];
$sex         = $_POST['sex'];


echo $address     = $_POST['address'];
echo $villageno   = $_POST['villageno'];
echo $subdistrict = $_POST['subdistrict'];
echo $district    = $_POST['district'];
echo $province    = $_POST['province'];
echo $postcode     = $_POST['postcode'];

require '../../../../connect/connect.php';
$sql_check_address="SELECT * FROM house WHERE address='$address' AND village_no='$villageno'";
$objq_check_address = mysqli_query($conn,$sql_check_address);
$objr_check_address = mysqli_fetch_array($objq_check_address);

        if ($objr_check_address == null ){
            $sql="UPDATE house INNER JOIN customer ON house.customer_id=customer.customer_id SET
                  customer.name = '".$name."',
                  customer.lastname = '".$lastname."',
                  customer.card_number = '".$card_number."',
                  customer.career = '".$career."',
                  customer.Email = '".$email."',
                  customer.phone = '".$phone."',
                  customer.sex = '".$sex."',
                  house.address = '".$address."',
                  house.village_no = '".$_POST["villageno"]."',
                  house.subdistrict = '".$subdistrict."',
                  house.district = '".$district."',
                  house.province = '".$province."',
                  house.postcode = '".$postcode."'
                  WHERE customer.customer_id = '".$_POST["customer_id"]."'
                 ";
                $query=mysqli_query($conn, $sql);

                if($query){
                   header("location:../edit_customer.php?");
                }
                else {
                    echo "ผิดน่ะจ๊ะ";
                }
        }
        else{
            if($objr_check_address['customer_id'] == $_POST["customer_id"]){
                $sql="UPDATE house INNER JOIN customer ON house.customer_id=customer.customer_id SET
                  customer.name = '".$name."',
                  customer.lastname = '".$lastname."',
                  customer.card_number = '".$card_number."',
                  customer.career = '".$career."',
                  customer.Email = '".$email."',
                  customer.phone = '".$phone."',
                  customer.sex = '".$sex."',
                  house.address = '".$address."',
                  house.village_no = '".$_POST["villageno"]."',
                  house.subdistrict = '".$subdistrict."',
                  house.district = '".$district."',
                  house.province = '".$province."',
                  house.postcode = '".$postcode."'
                  WHERE customer.customer_id = '".$_POST["customer_id"]."'
                 ";
                $query=mysqli_query($conn, $sql);

                if($query){
                    header("location:../edit_customer.php?");
                }
                else {
                    echo "ผิดน่ะจ๊ะ";
                }
            }else{
                header("location:../edit_customer_update.php?status=HaveData&customer_id=$customer_id");
            }

        }
        mysqli_close($conn);