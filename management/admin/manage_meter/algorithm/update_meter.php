<?php
require '../../../../connect/connect.php';

 $max_id = $_GET['max_id'];
 $villageid = $_GET['house_id'];
 $address = $_GET['address'];
 $villageno = $_GET['villageno'];

//   $sql_count = "SELECT COUNT(ID) FROM datameter WHERE villageid = '$villageid'";
//   $objq_count = mysqli_query($conn, $sql_count);
//   echo $objr_count['COUNT(ID)'];
//   die();

//QUERY MONEY
$sql_price="SELECT * FROM unit_price";
$objq_price=mysqli_query($conn, $sql_price);
$objr_price=mysqli_fetch_array($objq_price);
$i=0;
foreach ( $objq_price as $p) :
    $cal[$i]=$p['unit'];// 3 6 9 12
    $price[$i] = $p['balance_money'];
    $i+=1;
endforeach;
//-----------------------------------------------------


$sql_meter = "SELECT * FROM meter_management WHERE id = '$max_id'";
$objq_meter = mysqli_query($conn, $sql_meter);
$objr_meter = mysqli_fetch_array($objq_meter);


 $meter_use = $objr_meter['meter_united'];
  $meter_before = $objr_meter['meter_previos'];
  $meter_after = $_GET['edit_meter'];
$meter = 0;
$money = 0;

  $check_meter = $meter_after-$meter_before;

    if ($check_meter < 0){
        header("location:../edit_meter.php?address=$address&villageno=$villageno&data='error'");
    }
    else
    {
            $meter = $meter_after-$meter_before;
            $total_meter = $check_meter;

                if(($total_meter>= 0) && ($total_meter<= 80)){
                    $money = $total_meter * $cal[0];
                }
                elseif ($total_meter>='81' && $total_meter<='100'){
                    $money = (($total_meter-80)*$cal[1])+$price[1];
                }
                elseif ($total_meter>='101' && $total_meter<='200'){
                    $money = (($total_meter-100)*$cal[2])+$price[2];
                }
                else $money = (($total_meter-200)*$cal[3])+$price[3];


        $sql_update = "UPDATE meter_management SET meter_after='$meter_after',meter_united='$total_meter',money='$money' WHERE id='$max_id'";
        mysqli_query($conn, $sql_update);

        header("location:../edit_meter.php?address=$address&villageno=$villageno");

    }

?>