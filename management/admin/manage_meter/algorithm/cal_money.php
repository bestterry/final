<?php
require '../../../connect/connect.php';
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
?>