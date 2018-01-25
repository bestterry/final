<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 27/11/2560
 * Time: 20:02
 */
function random_char($len){
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $ret_char = "";
    $num = strlen($chars);
    for($i = 0; $i < $len; $i++) {
        $ret_char.= $chars[rand()%$num];
        $ret_char.="";
    }
    return $ret_char;
}
// การใช้งาน เรียกใช้ฟังก์ชัน และกำหนดจำนวนความยาวข้อความที่ต้องการ
$random_password = random_char(6);

    $name        = $_POST['txtname'];
    $lastname    = $_POST['txtlastname'];
    $card_number = $_POST['card_number'];
    $exp_card_number = $_POST['exp_card_number'];
    $birth       = $_POST['birth'];
    $email       = $_POST['email'];
    $career      =  $_POST['career'];
    $phone       = $_POST['phone'];
    $sex         = $_POST['sex'];
    $workplace  = $_POST['workplace'];


   $address     = $_POST['address'];
   $villageno   = $_POST['villageno'];
   $subdistrict = $_POST['subdistrict'];
   $district    = $_POST['district'];
   $province    = $_POST['province'];
   $postcode    = $_POST['postcode'];

   //หาอายุ
 $date = date('Y');
  $str_birth =  substr($birth, 0,4);

   if($str_birth == $date){
       echo $age = '-';
   }else{
        $str_birth = $str_birth + 543;
        echo $age = ($date + 543) - $str_birth;
   }
   //

$str_villageno = (int)$villageno;
$str_address =  substr($address, 0);
$str_tex = (string)$str_address;

//search '/'address
if(strpos($str_tex,"/") ==TRUE){
    $rank_tex = strpos($str_tex,"/");
    $rank_tex_ans = $rank_tex+1;
    $str_rank =  substr($address, $rank_tex_ans);
    $text_tex = $str_rank;
    $arr_address_tex = str_split($text_tex);
    $num_str = COUNT($arr_address_tex);
    if ($num_str == 1){
        $str_userid_tex = "0".$str_rank;
    }
    else $str_userid_tex = $str_rank;
}
else {
    $str_userid_tex = "00";
}

//search userid
$str_userid_tex = (string)$str_userid_tex;
$str_address = (int)$str_address;
$str_userid_check = settype($str_address, "integer");
$text = $str_address;
$arr_address = str_split($text);
$num_str = COUNT($arr_address);
if ($num_str == 1){
    $str_userid_check = $str_villageno."00".$str_address.$str_userid_tex;
}else if($num_str == 2){
    $str_userid_check = $str_villageno."0".$str_address.$str_userid_tex;
}else{
    $str_userid_check = $str_villageno.$str_address.$str_userid_tex;
}

// userid //
 $str_house_id  = $str_villageno.$str_address.$str_userid_tex;
ini_set('display_errors', 1);
error_reporting(~0);

//check address
require '../../../../connect/connect.php';

    //insert user
    $sql = "INSERT INTO customer(customer_id,name,lastname,birth,age,Email,Phone,card_number,exp_card_number,career,workplace,sex)
        VALUES ('$str_userid_check','$name','$lastname','$birth','$age','$email','$phone','$card_number','$exp_card_number','$career','$workplace','$sex')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //insert address
    $sql2 = "INSERT INTO house(house_id, customer_id, password, address, village_no, status_use_water)
		VALUES ('$str_house_id','$str_userid_check','$random_password','$address','$villageno','N')";
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //insert status
    $sql2 = "INSERT INTO status_install_water(house_id)
		VALUES ('$str_house_id')";
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
header("location:../insert_customer_success.php?customer_id=$str_userid_check");

?>