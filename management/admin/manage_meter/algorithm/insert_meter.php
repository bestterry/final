<?php

require '../../../../connect/connect.php';
echo $date=$_GET['date'];
$house_id=$_GET['house_id'];
$meter=$_GET['meter'];
$employee_id = $_GET['employee_id'];
//back address

$sql_check_house  = "SELECT * FROM house WHERE house_id =$house_id";
$objq_check_house = mysqli_query($conn, $sql_check_house);
$objr_check_house = mysqli_fetch_array($objq_check_house);
 echo $address = $objr_check_house['address'];
 echo $village_no = $objr_check_house['village_no'];

// check count of id
$sql_count_check_row = "SELECT meter_id,count(house_id) FROM meter_management WHERE house_id = $house_id"; // นับว่ามี กี่ colum
$query_count = $conn->query($sql_count_check_row);

    foreach ($query_count as $q){
        $count = $q['count(house_id)'];
    }
    if ($count==0){ // ยังไม่มีข้อมูล
        $sql_price="SELECT * FROM unit_price";
        $objq_price=mysqli_query($conn, $sql_price);
        $objr_price=mysqli_fetch_array($objq_price);

        $i=0;

        foreach ( $objq_price as $p) :
            $cal[$i]=$p['unit'];// 3 6 9 12
            $price[$i] = $p['balance_money'];
            $unit[$i] = $p['unit_price_id'];
            $i+=1;
        endforeach;

        if(($meter>= 0) && ($meter<= 80)){
            $money = $meter * $cal[0];
            $unit_price_id = $unit[0];

        }
        elseif ($meter>='81' && $meter<='100'){
            $money = (($meter-80)*$cal[1])+$price[1];
            $unit_price_id = $unit[1];
        }
        elseif ($meter>='101' && $meter<='200'){
            $money = (($meter-100)*$cal[2])+$price[2];
            $unit_price_id = $unit[2];
        }
        else {
            $money = (($meter - 200) * $cal[3]) + $price[3];
            $unit_price_id = $unit[3];
        }

         $meter_id = $house_id;
         $meter_previos = '0';
         echo $meter_after = $meter;
         $meter_united = $meter;
         $money;
         $unit_price_id;
         $meter_id = $house_id;
         $employee_id;

        $sql="INSERT INTO meter_management(meter_id,meter_previos,meter_after,meter_united,money,unit_price_id,house_id,user_id)
                                  VALUE ('$meter_id','$meter_previos','$meter_after','$meter_united','$money','$unit_price_id','$meter_id','$employee_id')";
        $objq = mysqli_query($conn,$sql);


    }
    else{ // มีข้อมูลแล้ว
        $sql_price="SELECT * FROM unit_price";
        $objq_price=mysqli_query($conn, $sql_price);
        $objr_price=mysqli_fetch_array($objq_price);

        $sql_check  = "SELECT MAX(id) FROM meter_management WHERE house_id =$house_id";
        $objq_check = mysqli_query($conn, $sql_check);
        $objr_check = mysqli_fetch_array($objq_check);
        $max_id     = $objr_check['MAX(id)'];
        $sql_seach_max   = "SELECT * FROM meter_management WHERE id=$max_id";
        $objq_search_max = mysqli_query($conn,$sql_seach_max);
        $objr_search_max = mysqli_fetch_array($objq_search_max);


        $meter_previos = $objr_search_max['meter_after'];
        $meter_united = $meter-$meter_previos;

        $i=0;

        foreach ( $objq_price as $p) :
            $cal[$i]=$p['unit'];// 3 6 9 12
            $price[$i] = $p['balance_money'];
            $unit[$i] = $p['unit_price_id'];
            $i+=1;
        endforeach;

        if(($meter_united>= 0) && ($meter_united<= 80)){
            $money = $meter_united * $cal[0];
            $unit_price_id = $unit[0];

        }
        elseif ($meter_united>='81' && $meter_united<='100'){
            $money = (($meter_united-80)*$cal[1])+$price[1];
            $unit_price_id = $unit[1];
        }
        elseif ($meter_united>='101' && $meter_united<='200'){
            $money = (($meter_united-100)*$cal[2])+$price[2];
            $unit_price_id = $unit[2];
        }
        else {
            $money = (($meter_united - 200) * $cal[3]) + $price[3];
            $unit_price_id = $unit[3];
        }

          $meter_id = $objr_search_max['meter_id'];
          $meter_previos;
          $meter_after = $meter;
          
        $sql="INSERT INTO meter_management(meter_id,meter_previos,meter_after,meter_united,money,unit_price_id,house_id,user_id,datatime) VALUE ('$meter_id','$meter_previos','$meter_after','$meter_united','$money','$unit_price_id','$house_id','$employee_id','$date')";
        $objq = mysqli_query($conn,$sql);


    }

header("location:../manage_meter_input.php?address=$address&village_no=$village_no");



?>